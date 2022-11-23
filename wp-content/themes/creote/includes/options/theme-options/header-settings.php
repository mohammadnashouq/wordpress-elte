<?php
/*
 *=================================
 * Header Settings
 * @package Creote WordPress Theme
 *==================================
*/

Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Header Settings', 'creote' ),
            'id'     => 'header_versions',
            'desc'   => esc_html__( '', 'creote' ),
            'icon'   => 'el el-cog',
            'fields' => array(
           
            array(
                'id' => 'page-header-sec-start',
                'type' => 'section',
                'title' => __('Page Header  Section', 'creote'),
                'indent' => true 
            ),    
            array(
                'id'       => 'page_header_enable',
                'type'     => 'switch', 
                'title'    => __('Page Header Enable / Disable', 'creote'),
                'default'  => true,
            ),
            array(
                'id'       => 'slect_page_header_title_tag',
               'type'     => 'select',
               'title'    => __('Select Title Tag', 'creote'),  
               'options'  => array(
                   'div' => esc_html__( 'Div Tag', 'creote' ),
                   'h1' => esc_html__( 'H1 Tag', 'creote' ),
                   'h2' => esc_html__( 'H2 Tag', 'creote' ),
                   'h3' => esc_html__( 'H3 Tag', 'creote' ),
                   'h4' => esc_html__( 'H4 Tag', 'creote' ),
                   'h5' => esc_html__( 'H5 Tag', 'creote' ),
                   'h6' => esc_html__( 'H6 Tag', 'creote' ), 
               ),
               'default'  => 'div',
           ),
            array(
                'id'       => 'default_page_header_image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Pageheader Background Image', 'creote'),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/assets/images/page-header-default.jpg', 
                ),
            ),
            array(
                'id'       => 'page_header_bg',
                'type'     => 'color',
                'title'    => __('Pageheader Background Color', 'creote'), 
                'validate' => 'color',
            ),

            array(
                'id' => 'page_header_padding-start',
                'type' => 'section',
                'title' => __('Page Header Padding', 'creote'),
                'indent' => true 
            ),
            array(
                'id'       => 'page_header_css_enable',
                'type'     => 'switch', 
                'title'    => __('Page Header Css Enable / Disable', 'creote'),
                'default'  => false,
            ),
            array(
                'id'             => 'page_header_padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => __('Page Header  Padding', 'creote'),
                'desc'           => __('Page Header padding you can add padding here.', 'creote'),
                'required' => array( 'page_header_css_enable', '=', true ),
            ),


            array(
                'id'             => 'page_header_padding_mb',
                'type'           => 'spacing',
                'output'         => array('body'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => __('Page Header Padding (Mobile after 1200px)', 'creote'),
                'desc'           => __('Page Header padding you can add padding here.', 'creote'),
                'required' => array( 'page_header_css_enable', '=', true ),
            ),


            array(
                'id' => 'header-sec-start',
                'type' => 'section',
                'title' => __('Header  Section', 'creote'),
                'indent' => true 
            ),                
            array(
                'id'       => 'header_custom',
                'type'     => 'switch', 
                'title'    => __('Header Custom Enable / Disable', 'creote'),
                'default'  => false,
            ),
            array(
                'id'       => 'header_style',
                'type'     => 'select',
                'title'    => __('Select Header Style', 'creote'),  
                // Must provide key => value pairs for select options
                'options'  => creote_header_query('header'),
                'required' => array( 'header_custom', '=', true ),
            ),

            array(
                'id' => 'sticky-header-sec-start',
                'type' => 'section',
                'title' => __('Sticky Header  Section', 'creote'),
                'indent' => true 
            ),   

            array(
                'id'       => 'sticky_header_enable',
                'type'     => 'switch', 
                'title'    => __('Sticky Header Enable / Disable', 'creote'),
                'default'  => true,
            ),

            array(
                'id'       => 'select_stickt_header_type',
               'type'     => 'select',
               'title'    => __('Select Sticky Header Type', 'creote'),  
               'options'  => array(
                
                   'default_sticky_header' => esc_html__( 'Default Sticky header', 'creote' ),
                   'custom_sticky_header' => esc_html__( 'Custom Sticky Header Throught Elementor', 'creote' ),
                   
               ),
               'default'  => 'default_sticky_header',
           ),

           array(
            'id'       => 'sticky_header_style',
            'type'     => 'select',
            'title'    => __('Select Sticky Header Style', 'creote'),  
            // Must provide key => value pairs for select options
            'options'  => creote_header_query('header'),
            'required' => array( 'select_stickt_header_type', '=', 'custom_sticky_header' ),
            ),

            array(
                'id'       => 'logo_sticky',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Logo', 'creote'),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/assets/images/logo-default.png', 
                ),
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),

            array(
                'id'       => 'logo_sticky_link',
                'type'     => 'text',
                'title'    => esc_html__( ' Link (url)', 'creote' ),
                'desc'     => esc_html__( 'Enter the url here', 'creote' ),
                'default' => esc_html__('#', 'creote') ,
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),  
            array(
                'id'       => 'sticky_logo_width',
                'type'     => 'dimensions',
                'units'    => array('em','px','%'),
                'title'    => esc_html__('Logo Width', 'creote'),
                'height' => false,
                'subtitle' => esc_html__('Allow your users to choose width', 'creote'),
                'desc'     => esc_html__('Enable or disable any piece of this field. Width, or Units.', 'creote'),
                'default'  => array(
                    'Width'   => '150', 
                    'Height'  => false
                ),
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),

            array(
                'id'       => 'sticky_logo_move_top',
                'type'     => 'text',
                'title'    => __('Logo Move Top', 'creote'),
                'desc'     => __('This text box is used to move logo top eg( 10px  , -10px  or -10rem)', 'creote'),
                'default'  => '',
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),

            
            array(
                'id'       => 'sticky_logo_move_left',
                'type'     => 'text',
                'title'    => __('Logo Move Left', 'creote'),
                'desc'     => __('This text box is used to move logo Left eg( 10px  , -10px  or -10rem)', 'creote'),
                'default'  => '0px',
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),
            
            array(
                'id'       => 'sticky_search_enables',
                'type'     => 'switch', 
                'title'    => __('Search Enable', 'creote'),
                'default'  => true,
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),
            array(
                'id'       => 'sticky_smodal_enables',
                'type'     => 'switch', 
                'title'    => __('Modal  Enable', 'creote'),
                'default'  => true,
                'required' => array( 'select_stickt_header_type', '=', 'default_sticky_header' ),
            ),
            array(
                'id' => 'megamenu-sec',
                'type' => 'section',
                'title' => __('Mega Menu Section', 'creote'),
                'indent' => true 
            ),
            array(
                'id'       => 'select_mega_menus',
               'type'     => 'select',
               'title'    => __('Select Megamenu Types', 'creote'),  
               'options'  => array(
                    '' => esc_html__( 'Select Builder For Megamenu', 'creote' ),
                   'elementor_mega_menu' => esc_html__( 'Elementor Mega Menu', 'creote' ),
                   'wp_bakery_mega_menu' => esc_html__( 'Wpbakery Mega Menu ', 'creote' ),
                   
               ),
               'default'  => 'elementor_mega_menu',
        
           ),

     )
));

