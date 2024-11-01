<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Wpqrcode_Elementor_Widget_QRCode extends Widget_Base {

    public function get_name() {
        return 'qrcodewp-addons';
    }
    
    public function get_title() {
        return esc_html__( 'QR Code', 'qrcode-wp' );
    }

    public function get_icon() {
        return 'fas fa-qrcode';
    }

    public function get_categories() {
        return [ 'general' ];
    }
    protected function _register_controls() {
       

        $this->start_controls_section(
                'wp_qr_alignment',
                [
                    'label' => esc_html__( 'QR Code', 'qrcode-wp' ),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
            'wp_qr_align',
                [
                    'label' => esc_html__( 'Alignment', 'qrcode-wp' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'qrcode-wp' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'qrcode-wp' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'qrcode-wp' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                ]
            );

            $this->add_control(
            'wp_qr_style_title',
                [
                    'label' => esc_html__( 'QR Code Style:', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
            'wp_qr_hr_style_2',
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );

            $this->add_control(
                'wp_qr_style',
                [
                    'label' => esc_html__( 'QR Code Style:', 'qrcode-wp' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '0',
                    'options' => [
                        '0' => esc_html__( '0. Custom', 'qrcode-wp' ),
                        '1' => esc_html__( '1. Normal', 'qrcode-wp' ),
                        '2' => esc_html__( '2. Color', 'qrcode-wp' ),
                        '3' => esc_html__( '3. Dot Scale', 'qrcode-wp' ),
                        '4' => esc_html__( '4. Position Color + Alignment Color', 'qrcode-wp' ),
                        '5' => esc_html__( '5. Position Color + Dot Scale', 'qrcode-wp' ),
                        '6' => esc_html__( '6. Timing + Dot Scale', 'qrcode-wp' ),
                        '7' => esc_html__( '7. Background Image', 'qrcode-wp' ),
                        '8' => esc_html__( '8. Auto Color + Background Image + Dot Scale', 'qrcode-wp' ),
                        '9' => esc_html__( '9. AutoColor + background Image Alpha', 'qrcode-wp' ),
                        '10' => esc_html__( '10. Logo + quietZone Color', 'qrcode-wp' ),
                        '11' => esc_html__( '11. Logo + Dot Scale', 'qrcode-wp' ),
                        '12' => esc_html__( '12. Logo + Colorful Style 1', 'qrcode-wp' ),
                        '13' => esc_html__( '13. Logo + Colorful Style 2', 'qrcode-wp' ),
                        '14' => esc_html__( '14. QuietZone + Logo + Background', 'qrcode-wp' ),
                    ],
                ]
            );
            
            $this->add_control(
            'wp_qr_general_options_title',
                [
                    'label' => esc_html__( 'General Options:', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
            'wp_qr_general_options_hr',
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );

           
            $this->add_control(
                'wp_custom_qrcode_text',
                [
                    'label' => esc_html__( 'Custom URL Or Text:', 'qrcode-wp' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 3,
                    'placeholder' => esc_html__( 'Type your URL or Text here. Ex: https://www.mdmasudsikdar.com', 'qrcode-wp' ),
                ]
            );

            $this->add_control(
            'wp_qr_size',
                [
                    'label' => esc_html__( 'QR Code Size:', 'qrcode-wp' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 50,
                    'max' => 600,
                    'step' => 50,
                    'default' => 300,
                    'placeholder' => esc_html__( 'Example: 300', 'qrcode-wp' ),
                ]
            );

            $this->add_control(
            'wp_qr_dot_scale',
                [
                    'label' => esc_html__( 'QR Code Dot Scale:', 'qrcode-wp' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0.1,
                    'max' => 1,
                    'step' => 0.1,
                    'placeholder' => esc_html__( '1', 'qrcode-wp' ),
                    'condition' =>[
                        'wp_qr_style' => ['0','3','4','5','6','7','8'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_zone',
                [
                    'label' => esc_html__( 'QR Quiet Zone:', 'qrcode-wp' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 40,
                    'step' => 1,
                    'default' => 0,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_zone_color',
                [
                    'label' => esc_html__( 'QR Quiet Zone Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => "#00CED1",
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );
            

            $this->add_control(
                'wp_qr_ec_level',
                [
                    'label' => esc_html__( 'QR EC Level', 'qrcode-wp' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'L',
                    'options' => [
                        'L'  => esc_html__( 'Low', 'qrcode-wp' ),
                        'M' => esc_html__( 'Medium ', 'qrcode-wp' ),
                        'Q' => esc_html__( 'Quartile', 'qrcode-wp' ),
                        'H' => esc_html__( 'High', 'qrcode-wp' ),
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_more_options_logo',
                [
                    'label' => esc_html__( 'QR Code Image', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'wp_qr_style' => ['0','7','8','9','10','11','12','13','14']
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_hr',
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );

            $this->add_control(
            'wp_qr_logo',
                [
                    'label' => esc_html__( 'Choose Logo', 'qrcode-wp' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                    'url' => QRCODEWP_PL_URL."assets/img/logo.png",
                    ],
                    'condition' =>[
                        'wp_qr_style' => ['0','8','9','10','11','12','13','14']
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_logo_size',
                [
                    'label' => esc_html__( 'Logo size: (Max Size 100px)', 'qrcode-wp' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 50,
                    'condition' =>[
                        'wp_qr_style' => ['0','8','9','10','11','12','13','14']
                    ],
                ]
            );

            $this->add_control(
                'wp_qr_logo_bg_transparent',
                [
                    'label' => esc_html__( 'Background Transparent', 'qrcode-wp' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'true',
                    'options' => [
                        'true'  => esc_html__( 'True', 'qrcode-wp' ),
                        'false' => esc_html__( 'False ', 'qrcode-wp' ),
                    ],
                    'condition' =>[
                        'wp_qr_style' => ['0','8','9','10','11','12','13','14']
                    ],
                    
                ]
            );

            $this->add_control(
            'wp_qr_logo_bg_color',
                [
                    'label' => esc_html__( 'Logo Background Color', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => "#ffffff",
                    'condition' =>[
                        'wp_qr_logo_bg_transparent' => 'false',
                        'wp_qr_style' => ['0','8','9','10','11','12','13','14']
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_bg_image',
                [
                    'label' => esc_html__( 'Choose Background Image:', 'qrcode-wp' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => QRCODEWP_PL_URL."assets/img/background_logo.png",
                    ],
                    'condition' =>[
                        'wp_qr_style' => ['0','7','8','9','10','14']
                    ],
                ]
            );
            
             $this->add_control(
            'wp_qr_bg_opacity',
                [
                    'label' => esc_html__( 'Background Image Opacity:', 'qrcode-wp' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                    'placeholder' => esc_html__( '1', 'qrcode-wp' ),
                    'condition' =>[
                        'wp_qr_style' => ['0','7','8','9','10','14']
                    ],
                ]
            );

            $this->add_control(
                'wp_qr_bg_autocolor',
                [
                    'label' => esc_html__( 'Background Auto Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::SELECT,

                    'options' => [
                        'true'  => esc_html__( 'True', 'qrcode-wp' ),
                        'false' => esc_html__( 'False ', 'qrcode-wp' ),
                    ],
                    'condition' =>[
                        'wp_qr_style' => ['0','7','10']
                    ],

                ]
            );


            /*
            * QR code Style
            */
            $this->add_control(
            'more_options_style',
                [
                    'label' => esc_html__( 'QR Code Style', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'wp_qr_style' => ['0','3','4','7'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_hr_style',
                [
                    'type' => Controls_Manager::DIVIDER,
                    'condition' =>[
                        'wp_qr_style' => ['0','3','4','7'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_colordark_dot',
                [
                    'label' => esc_html__( 'QR Dot Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,                    
                    'condition' =>[
                        'wp_qr_style' => ['0','2','3','4','5','6','7','8'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_colorlight_bg',
                [
                    'label' => esc_html__( 'Background Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','2']
                    ],

                ]
            );

            /*
            * Pasotion Pattern Global Color:
            */
             $this->add_control(
            'ht_pattern_global_style',
                [
                    'label' => esc_html__( 'Pasotion Pattern Global Style', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'wp_qr_style' => ['0','4','5'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_hr_pattern_global_style',
                [
                    'type' => Controls_Manager::DIVIDER,
                    'condition' =>[
                        'wp_qr_style' => ['0','4','5'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_po',
                [
                    'label' => esc_html__( 'Pattern Outer Global Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','4','5','8'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_pi',
                [
                    'label' => esc_html__( 'Pattern Inner Global Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','4','5'],
                    ],
                ]
            );

            /*
            * Pasotion Pattern Individual Color:
            */
             $this->add_control(
            'ht_pattern_individual_style',
                [
                    'label' => esc_html__( 'Pasotion Pattern Individual Style', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'wp_qr_style' => ['0','5'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_hr_pattern_individual_style',
                [
                    'type' => Controls_Manager::DIVIDER,
                    'condition' =>[
                        'wp_qr_style' => ['0','5'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_po_tl',
                [
                    'label' => esc_html__( 'Pattern Outer Top Left Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','5'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_pi_tl',
                [
                    'label' => esc_html__( 'Pattern Inner Top Left Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','5'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_po_tr',
                [
                    'label' => esc_html__( 'Pattern Outer Top Right Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_pi_tr',
                [
                    'label' => esc_html__( 'Pattern Inner Top Right Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_po_bl',
                [
                    'label' => esc_html__( 'Pattern Outer Bottom Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_pi_bl',
                [
                    'label' => esc_html__( 'Pattern Inner Bottom Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            /*
            *  Aligment color
            */
            $this->add_control(
            'wp_qr_hr_aligment_style',
                [
                    'type' => Controls_Manager::DIVIDER,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_ao',
                [
                    'label' => esc_html__( 'Aligment Outer Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','4'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_ai',
                [
                    'label' => esc_html__( 'Aligment Inner Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','4'],
                    ],
                ]
            );

            /*
            *  Timing Pattern Color
            */
             $this->add_control(
            'ht_timing_pattern_style',
                [
                    'label' => esc_html__( 'Timing Pattern Style (Global & Individual)', 'qrcode-wp' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'wp_qr_style' => ['0','6'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_hr_timing_style_1',
                [
                    'type' => Controls_Manager::DIVIDER,
                    'condition' =>[
                        'wp_qr_style' => ['0','6'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_timing',
                [
                    'label' => esc_html__( 'Timing Global Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => '0',
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_timing_h',
                [
                    'label' => esc_html__( 'Timing Horizontal Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','6'],
                    ],
                ]
            );

            $this->add_control(
            'wp_qr_timing_v',
                [
                    'label' => esc_html__( 'Timing Vertical Color:', 'qrcode-wp' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' =>[
                        'wp_qr_style' => ['0','6'],
                    ],
                ]
            );

        $this->end_controls_section();
    }
  
    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();

        if( empty( $settings['wp_custom_qrcode_text'] ) ) { $settings['wp_custom_qrcode_text'] = get_permalink(); }
        if( empty( $settings['wp_qr_size'] )) { $settings['wp_qr_size'] = 300; }
        if( empty( $settings['wp_qr_dot_scale'] ) ) { $settings['wp_qr_dot_scale'] = 1; }
        if( empty( $settings['wp_qr_logo_size'] ) ) { $settings['wp_qr_logo_size'] = 0; }
        if( empty( $settings['wp_qr_colordark_dot'] ) ) { $settings['wp_qr_colordark_dot'] = "#000000"; }
        if( empty( $settings['wp_qr_colorlight_bg'] ) ) { $settings['wp_qr_colorlight_bg'] = "#ffffff"; }
        if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
        if( empty( $settings['wp_qr_logo_bg_transparent'] ) ) { $settings['wp_qr_logo_bg_transparent'] = "true"; }
        if( empty( $settings['wp_qr_bg_autocolor'] ) ) { $settings['wp_qr_bg_autocolor'] = "false"; }

        switch ($settings['wp_qr_style']) {
            case "0":
                if( empty( $settings['wp_qr_dot_scale'] ) ) { $settings['wp_qr_dot_scale'] = 1; }
                if( empty( $settings['wp_qr_colordark_dot'] ) ) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                if( empty( $settings['wp_qr_colorlight_bg'] ) ) { $settings['wp_qr_colorlight_bg'] = "#ffffff"; }
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 1; }
               
                break;
            case "1":
                $settings['wp_qr_dot_scale'] = 1;
                $settings['wp_qr_logo']['url']= "";
                $settings['wp_qr_bg_image']['url'] = "";
                $settings['wp_qr_colordark_dot'] = "#000000";
                $settings['wp_qr_colorlight_bg'] ="#ffffff";
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
                $settings['wp_qr_po'] ="";
                $settings['wp_qr_pi'] ="";
                $settings['wp_qr_po_tl'] ="";
                $settings['wp_qr_pi_tl'] ="";
                $settings['wp_qr_po_tr'] ="";
                $settings['wp_qr_pi_tr'] ="";
                $settings['wp_qr_po_bl'] ="";
                $settings['wp_qr_pi_bl'] ="";
                $settings['wp_qr_ao'] ="";
                $settings['wp_qr_ai'] ="";
                $settings['wp_qr_timing'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "2":
                $settings['wp_qr_dot_scale'] = 1;
                if( empty( $settings['wp_qr_colordark_dot'] ) ){ $settings['wp_qr_colordark_dot'] = "#473C8B"; }
                if( empty( $settings['wp_qr_colorlight_bg'] ) ) { $settings['wp_qr_colorlight_bg'] = "#FFFACD"; }
                $settings['wp_qr_logo']['url'] = "";
                $settings['wp_qr_bg_image']['url'] = "";
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
                $settings['wp_qr_po'] ="";
                $settings['wp_qr_pi'] ="";
                $settings['wp_qr_po_tl'] ="";
                $settings['wp_qr_pi_tl'] ="";
                $settings['wp_qr_po_tr'] ="";
                $settings['wp_qr_pi_tr'] ="";
                $settings['wp_qr_po_bl'] ="";
                $settings['wp_qr_pi_bl'] ="";
                $settings['wp_qr_ao'] ="";
                $settings['wp_qr_ai'] ="";
                $settings['wp_qr_timing'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "3":
                if(empty($settings['wp_qr_dot_scale'])) { $settings['wp_qr_dot_scale'] = 0.4; }
                if (empty($settings['wp_qr_colordark_dot'])) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                if (empty($settings['wp_qr_colorlight_bg'])) { $settings['wp_qr_colorlight_bg'] ="#ffffff"; }
                $settings['wp_qr_logo']['url'] = "";
                $settings['wp_qr_bg_image']['url'] = "";
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
                $settings['wp_qr_po'] ="";
                $settings['wp_qr_pi'] ="";
                $settings['wp_qr_po_tl'] ="";
                $settings['wp_qr_pi_tl'] ="";
                $settings['wp_qr_po_tr'] ="";
                $settings['wp_qr_pi_tr'] ="";
                $settings['wp_qr_po_bl'] ="";
                $settings['wp_qr_pi_bl'] ="";
                $settings['wp_qr_ao'] ="";
                $settings['wp_qr_ai'] ="";
                $settings['wp_qr_timing'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "4":
                if (empty($settings['wp_qr_dot_scale'])) { $settings['wp_qr_dot_scale'] = 1; }
                if (empty( $settings['wp_qr_colordark_dot'])) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                $settings['wp_qr_colorlight_bg'] ="#ffffff";
                $settings['wp_qr_logo']['url'] = "";
                $settings['wp_qr_bg_image']['url'] = "";
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
                if (empty($settings['wp_qr_po'])) { $settings['wp_qr_po'] ="#269926"; }
                if (empty($settings['wp_qr_pi'])) { $settings['wp_qr_pi'] ="#BF3030"; }
                $settings['wp_qr_po_tl'] ="";
                $settings['wp_qr_pi_tl'] ="";
                $settings['wp_qr_po_tr'] ="";
                $settings['wp_qr_pi_tr'] ="";
                $settings['wp_qr_po_bl'] ="";
                $settings['wp_qr_pi_bl'] = "";
                if (empty($settings['wp_qr_ao'])) { $settings['wp_qr_ao'] = "#B03060"; }
                if (empty($settings['wp_qr_ai'])) { $settings['wp_qr_ai'] = "#009ACD"; }
                $settings['wp_qr_timing'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "5":
                if (empty($settings['wp_qr_dot_scale'])) { $settings['wp_qr_dot_scale'] = 0.4; }
                if (empty( $settings['wp_qr_colordark_dot'])) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                $settings['wp_qr_colorlight_bg'] = "#ffffff";
                $settings['wp_qr_logo']['url'] = "";
                $settings['wp_qr_bg_image']['url'] = "";
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
                $settings['wp_qr_po'] = "";
                if (empty( $settings['wp_qr_pi'] )) { $settings['wp_qr_pi'] = "#f55066"; }
                if (empty( $settings['wp_qr_po_tl'] )) { $settings['wp_qr_po_tl'] = "#aa5b71"; }
                if (empty( $settings['wp_qr_pi_tl'] )) { $settings['wp_qr_pi_tl'] = "#b7d28d"; }
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "6":
                if (empty($settings['wp_qr_dot_scale'])) { $settings['wp_qr_dot_scale'] = 0.4; }
                if (empty($settings['wp_qr_colordark_dot'])) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                $settings['wp_qr_colorlight_bg'] = "#ffffff";
                $settings['wp_qr_logo']['url'] = "";
                $settings['wp_qr_bg_image']['url'] = "";
                if( empty( $settings['wp_qr_bg_opacity'] ) ) { $settings['wp_qr_bg_opacity'] = 0; }
                $settings['wp_qr_po'] = "";
                $settings['wp_qr_pi'] = "";
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                if (empty($settings['wp_qr_timing_h'])) { $settings['wp_qr_timing_h'] = "#e1622f"; }
                if (empty($settings['wp_qr_timing_v'])) { $settings['wp_qr_timing_v'] = "#00C12B"; }
                $settings['wp_qr_zone'] = 0;
                break;

            case "7":
                if (empty($settings['wp_qr_dot_scale'])) { $settings['wp_qr_dot_scale'] = 1; }
                if (empty($settings['wp_qr_bg_opacity'])) { $settings['wp_qr_bg_opacity'] = 1; }
                $settings['wp_qr_logo']['url'] = "";
                $settings['wp_qr_bg_autocolor'] = "false";
                if (empty($settings['wp_qr_colordark_dot'])) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                $settings['wp_qr_colorlight_bg'] = "#ffffff";
                $settings['wp_qr_po'] = "";
                $settings['wp_qr_pi'] = "";
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_v'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "8":
                if (empty($settings['wp_qr_dot_scale'])) {$settings['wp_qr_dot_scale'] = 0.5;}
                if (empty($settings['wp_qr_bg_opacity'])) {$settings['wp_qr_bg_opacity'] = 1;}
                $settings['wp_qr_bg_autocolor'] = "true";
                if (empty($settings['wp_qr_colordark_dot'])) { $settings['wp_qr_colordark_dot'] = "#000000"; }
                if (empty($settings['wp_qr_colorlight_bg'])) { $settings['wp_qr_colorlight_bg'] = "#ffffff"; }
                $settings['wp_qr_po'] = "";
                if (empty($settings['wp_qr_pi'])) { $settings['wp_qr_pi'] = "#f55066"; }
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_v'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

            case "9":
                $settings['wp_qr_dot_scale'] = 0.5;
                $settings['wp_qr_bg_opacity'] = 0.3;
                
                $settings['wp_qr_bg_autocolor'] = "true";
                $settings['wp_qr_colordark_dot'] = "#000000";
                $settings['wp_qr_colorlight_bg'] = "#ffffff";
                $settings['wp_qr_po'] = "";
                $settings['wp_qr_pi'] = "#f55066";
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_v'] ="";
                $settings['wp_qr_zone'] = 0;
                break;

             case "10":
                $settings['wp_qr_dot_scale'] = 1;
                $settings['wp_qr_logo_bg_color'] = "ffffff";
                $settings['wp_qr_logo_bg_transparent'] = "false";
                $settings['wp_qr_bg_opacity'] = 1;
                $settings['wp_qr_colordark_dot'] = "#000000";
                $settings['wp_qr_colorlight_bg'] = "#ffffff";
                $settings['wp_qr_po'] = "";
                $settings['wp_qr_pi'] = "";
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_v'] ="";
                $settings['wp_qr_zone'] = 10;
                $settings['wp_qr_zone_color'] = "#00CED1";
                break;

            case "11":
                 $settings['wp_qr_colordark_dot'] = "#000000";
                $settings['wp_qr_colorlight_bg'] = "#ffffff";
                $settings['wp_qr_dot_scale'] = 0.5;
                $settings['wp_qr_bg_image']['url'] = "";
                $settings['wp_qr_bg_opacity'] = 1;
                $settings['wp_qr_bg_autocolor'] = "false";
                $settings['wp_qr_po'] = "";
                $settings['wp_qr_pi'] = "";
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="";
                $settings['wp_qr_timing_v'] ="#00B2EE";
                $settings['wp_qr_zone'] = 0;
                break;

            case "12":
                 $settings['wp_qr_colordark_dot'] = "#27408B";
                $settings['wp_qr_colorlight_bg'] = "#FFF8DC";
                $settings['wp_qr_dot_scale'] = 0.5;
                $settings['wp_qr_bg_image']['url'] = "";
                $settings['wp_qr_bg_opacity'] = 1;
                $settings['wp_qr_bg_autocolor'] = "false";
                $settings['wp_qr_po'] = "#e1622f";
                $settings['wp_qr_pi'] = "#aa5b71";
                $settings['wp_qr_po_tl'] = "";
                $settings['wp_qr_pi_tl'] = "#b7d28d";
                $settings['wp_qr_po_tr'] = "#aa5b71";
                $settings['wp_qr_pi_tr'] = "#c17e61";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "";
                $settings['wp_qr_ai'] = "";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="#ff6600";
                $settings['wp_qr_timing_v'] ="#cc0033";
                $settings['wp_qr_zone'] = 0;
                break;

             case "13":
                 $settings['wp_qr_colordark_dot'] = "#000000";
                $settings['wp_qr_colorlight_bg'] = "#FFFACD";
                $settings['wp_qr_dot_scale'] = 0.5;
                $settings['wp_qr_bg_image']['url'] = "";
                $settings['wp_qr_bg_opacity'] = 1;
                $settings['wp_qr_bg_autocolor'] = "false";
                $settings['wp_qr_po'] = "#e1622f";
                $settings['wp_qr_pi'] = "#aa5b71";
                $settings['wp_qr_po_tl'] = "#aa5b71";
                $settings['wp_qr_pi_tl'] = "#b7d28d";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "#c17e61";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "#27408B";
                $settings['wp_qr_ai'] = "#7D26CD";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="#ff6600";
                $settings['wp_qr_timing_v'] ="#cc0033";
                $settings['wp_qr_zone'] = 0;
                break;

            case "14":
                $settings['wp_qr_colordark_dot'] = "#000000";
                $settings['wp_qr_colorlight_bg'] = "#FFF8DC";
                $settings['wp_qr_dot_scale'] = 0.7;
                $settings['wp_qr_bg_opacity'] = 0.1;
                $settings['wp_qr_bg_autocolor'] = "false";
                $settings['wp_qr_po'] = "#e1622f";
                $settings['wp_qr_pi'] = "#aa5b71";
                $settings['wp_qr_po_tl'] = "#aa5b71";
                $settings['wp_qr_pi_tl'] = "#b7d28d";
                $settings['wp_qr_po_tr'] = "";
                $settings['wp_qr_pi_tr'] = "#c17e61";
                $settings['wp_qr_po_bl'] = "";
                $settings['wp_qr_pi_bl'] = "";
                $settings['wp_qr_ao'] = "#27408B";
                $settings['wp_qr_ai'] = "#7D26CD";
                $settings['wp_qr_timing'] = "";
                $settings['wp_qr_timing_h'] ="#ff6600";
                $settings['wp_qr_timing_v'] ="#cc0033";
                $settings['wp_qr_zone'] = 30;
                $settings['wp_qr_zone_color'] = "";
                break;  
        }

        echo do_shortcode('[qrcodewp alignment = "'.esc_attr_x( $settings['wp_qr_align'],'qrcode-wp' ).'" qrcode = "'.esc_html__( $settings['wp_custom_qrcode_text'],'qrcode-wp' ).'" size = "'.esc_html__( $settings['wp_qr_size'],'qrcode-wp' ).'" dot_scale = "'.esc_html__( $settings['wp_qr_dot_scale'],'qrcode-wp' ).'" qr_level = "'.esc_html__( $settings['wp_qr_ec_level'],'qrcode-wp' ).'" logo = "'.esc_html__( $settings['wp_qr_logo']['url'],'qrcode-wp' ).'" logo_size = "'.esc_html__( $settings['wp_qr_logo_size'],'qrcode-wp' ).'" logo_bg_color = "'.esc_html__( $settings['wp_qr_logo_bg_color'],'qrcode-wp' ).'" logo_bg_transparent = "'.esc_html__( $settings['wp_qr_logo_bg_transparent'],'qrcode-wp' ).'" qr_bg_image ="'.esc_html__( $settings['wp_qr_bg_image']['url'],'qrcode-wp' ).'" qr_bg_opacity = "'.esc_html__( $settings['wp_qr_bg_opacity'],'qrcode-wp' ).'" qr_bg_autocolor = "'.esc_html__( $settings['wp_qr_bg_autocolor'],'qrcode-wp' ).'" colordark = "'.esc_html__( $settings['wp_qr_colordark_dot'],'qrcode-wp' ).'" colorlight = "'.esc_html__( $settings['wp_qr_colorlight_bg'],'qrcode-wp' ).'" po = "'.esc_html__( $settings['wp_qr_po'],'qrcode-wp' ).'" pi = "'.esc_html__( $settings['wp_qr_pi'],'qrcode-wp' ).'" po_tl = "'.esc_html__( $settings['wp_qr_po_tl'],'qrcode-wp' ).'" pi_tl = "'.esc_html__( $settings['wp_qr_pi_tl'],'qrcode-wp' ).'" po_tr = "'.esc_html__( $settings['wp_qr_po_tr'],'qrcode-wp' ).'" pi_tr = "'.esc_html__( $settings['wp_qr_pi_tr'],'qrcode-wp' ).'" po_bl = "'.esc_html__( $settings['wp_qr_po_bl'],'qrcode-wp' ).'" pi_bl = "'.esc_html__( $settings['wp_qr_pi_bl'],'qrcode-wp' ).'" ao = "'.esc_html__( $settings['wp_qr_ao'],'qrcode-wp' ).'" ai = "'.esc_html__( $settings['wp_qr_ai'],'qrcode-wp' ).'" timing = "'.esc_html__( $settings['wp_qr_timing'],'qrcode-wp' ).'" timing_h = "'.esc_html__( $settings['wp_qr_timing_h'],'qrcode-wp' ).'" timing_v = "'.esc_html__( $settings['wp_qr_timing_v'],'qrcode-wp' ).'" quietzone="'.esc_html__( $settings['wp_qr_zone'],'qrcode-wp' ).'" 
            quietzonecolor = "'.esc_html__( $settings['wp_qr_zone_color'],'qrcode-wp' ).'"]');

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Wpqrcode_Elementor_Widget_QRCode() );