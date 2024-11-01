<?php
/**
 * Plugin Name: WP QRCode Generator for Elementor
 * Description: QR Code for WordPress for Elementor page builder.
 * Plugin URI:  https://mdmasudsikdar.com/wordpress/qrcode-generator-for-elementor-page-builder/
 * Author:      MD Masud Sikdar
 * Author URI:  https://mdmasudsikdar.com/
 * Version:     1.0.1
 * License:     GPLv2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: qrcode-wp
 * Domain Path: /languages
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

define( 'QRCODEWP_VERSION', '1.0.0' );
define( 'QRCODEWP_PL_ROOT', __FILE__ );
define( 'QRCODEWP_PL_URL', plugins_url( '/', QRCODEWP_PL_ROOT ) );
define( 'QRCODEWP_PL_PATH', plugin_dir_path( QRCODEWP_PL_ROOT ) );
define( 'QRCODEWP_PL_INCLUDE', QRCODEWP_PL_PATH .'include/' );

// Required File
include( QRCODEWP_PL_INCLUDE.'/class.qrcodewp.php' );
QRcodeWP_Addons_Elementor::instance();