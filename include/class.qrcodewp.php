<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class QRcodeWP_Addons_Elementor {
    const MINIMUM_PHP_VERSION = '7.0';
    
    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function __construct() {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
        add_action('wp_enqueue_scripts', [ $this,'assets_management'] );
    }

    public function i18n() {
        load_plugin_textdomain( 'qrcode-wp' );
    }

    public function init() {
        
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Plugins Required File
        $this->includes();

        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'qrcode-wp' ),
            '<strong>' . esc_html__( 'WP QRCode Addons', 'qrcode-wp' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'qrcode-wp' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }


    /**
     * Enqueue scripts and styles
     */
    function admin_enqueue_scripts() {
        wp_enqueue_style('wp-admin-qrcode-style', QRCODEWP_PL_URL .'assets/css/admin-min.css', '', QRCODEWP_PL_URL );
        wp_enqueue_media();
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'wp-admin-qrcode', QRCODEWP_PL_URL . 'assets/js/admin-min.js',array(), QRCODEWP_VERSION, TRUE );
    }

    /*
    * Assest Management
    */
    public function assets_management( $hook ){
        wp_enqueue_script( 'easy-qrcode', QRCODEWP_PL_URL . 'assets/js/easy.qrcode.min.js',array('jquery'), QRCODEWP_VERSION, TRUE );
    }

    public function includes() {
        require_once QRCODEWP_PL_PATH.'include/default_widgets.php';
        require_once QRCODEWP_PL_PATH.'include/qrshortcode.php';
    }

     public function init_widgets() {
        // Include Widget files
        include( QRCODEWP_PL_INCLUDE.'/elementor_widgets.php' );
        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wpqrcode_Elementor_Widget_QRCode() );
    }
}


