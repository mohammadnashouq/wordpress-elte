<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Header_v2 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'creote-header-v15';
    }

    public function get_title()
    {
        return __('Header V14', 'creote-addons');
    }

    public function get_icon()
    {
        return 'icon-c';
    }

    public function get_categories()
    {
        return ['100'];
    }

    protected function register_controls(){
       
        $this->start_controls_section('headers_settings',
        [ 
            'label' => __('Header Settings', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );

     
        $this->add_control(
            'top_bar_enable',
            [
                'label' => __('Top Bar Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
   


        $this->add_control(
            'mid_bar_enable',
            [
                'label' => __('Mid Bar Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
         
        $this->add_control(
         'header_width',
            [
            'label' => __('Header Styles', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'no-container' => __( 'No Container', 'creote-addons' ),
                'full-container' => __( 'Full With Container', 'creote-addons' ),
                'large-container' => __( 'large Container', 'creote-addons' ),
                'medium-container' => __( 'medium Container', 'creote-addons' ),
                'auto-container' => __( 'auto Container', 'creote-addons' ),
            ],
            'default' => __('medium-container' , 'creote-addons'),
            ]
        );
        
        $this->end_controls_section();


        $this->start_controls_section('top_content',
        [ 
            'label' => __('Topbar Content', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'top_bar_enable' => 'yes'
            ]
        ]
        );
    

        $this->add_control(
            'high_light_text',
            [
                'label' => __( 'Highlight Text', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Welcome to our consulting company Mentor!', 'creote-addons' ),
                'placeholder' => __( 'Type your Text Here', 'creote-addons' ),
            ]
        );

        $this->add_control(
            'location_address',
            [
                'label' => __( 'Address', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '61W Business Str Hobert, LA ', 'creote-addons' ),
                'placeholder' => __( 'Type your Address Here', 'creote-addons' ),
            ]
        );

        $this->add_control(
            'timing',
            [
                'label' => __( 'Timing', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Mon - Sat: 09.00 to 06.00 (Sun:Closed)', 'creote-addons' ),
                'placeholder' => __( 'Type your Mail Address here', 'creote-addons' ),
            ]
        );

       
      

        
        $this->add_control(
			'top_hr_two',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'meida_enable',
            [
                'label' => __('Media Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    

        $repeater = new Repeater();
       

        $repeater->add_control(
            'media_icon',
            [
                'label' => __('Media Class Name', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('fa fa-facebook', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        ); 
        $repeater->add_control(
            'media_link',
            [
                'label' => __('Media Link', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'creote-addons'),
            ]
        );

        
        $this->add_control(
            'social_media_repeater',
            [
                'label' => __('Social Box Content', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                       'media_icon' =>  __('fa fa-facebook', 'creote-addons'),                       
                       'media_link' =>  __('#', 'creote-addons'),
                    ],
                    [
                       'media_icon' =>  __('fa fa-twitter', 'creote-addons'),
                       'media_link' =>  __('#', 'creote-addons'),
                     ],
                     [
                       'media_icon' =>  __('fa fa-skype', 'creote-addons'),
                       'media_link' =>  __('#', 'creote-addons'),
                     ],
                     [
                       'media_icon' =>  __('fa fa-telegram', 'creote-addons'),
                       'media_link' =>  __('#', 'creote-addons'),
                     ] ,
                     [
                       'media_icon' =>  __('fa fa-instagram', 'creote-addons'),
                       'media_link' =>  __('#', 'creote-addons'),
                     ] 

                ],
                'title_field' => '{{{ media_icon }}}',
                'condition' => [
                    'meida_enable' => 'yes'
                ],
            ]
        );

        
        $this->end_controls_section();


        $this->start_controls_section('mid_content',
        [ 
            'label' => __('Midbar Content', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            
        ]
        );

        
        $this->add_control(
            'logo_default',
            [
            'label' => __( 'Logo Default', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => CREOTE_ADDONS_URL . '/assets/images/logo-default.png',
            ], 
        ] 
       );
   

       $this->add_control(
        'logo_width',
        [
            'label' => __( 'Logo Width', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '170px', 'creote-addons' ),
            'placeholder' => __( 'Enter logo width here in (px , rem and em )', 'creote-addons' ),
            'selectors' => [
                '{{WRAPPER}} .header.style_one  .logo_box img' => 'width: {{VALUE}}!important;',
            ],
          
        ]
        );
        $this->add_control(
            'margin_logo',
            [
                'label' => __( 'Margin', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header.style_one  .logo_box img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                
            ]
        );

     
    
        $this->add_control(
            'logo_link',
            [
                'label' => __( 'Link', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                
            ]
        );

        $this->add_control(
			'hr_logo_md',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
    

        $this->add_control(
            'email_title',
            [
                'label' => __( 'Email Title', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Send Mail Us:', 'creote-addons' ),
                'placeholder' => __( 'Type your text Here', 'creote-addons' ),
            ]
        );


        $this->add_control(
            'email_address',
            [
                'label' => __( 'Email Id', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'sendmail@creote.com', 'creote-addons' ),
                'placeholder' => __( 'Type your Mail Address here', 'creote-addons' ),
            ]
        );

        $this->add_control(
            'phone_title',
            [
                'label' => __( 'Phone Title', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Call Us Now:', 'creote-addons' ),
                'placeholder' => __( 'Type your text Here', 'creote-addons' ),
            ]
        );

       
        $this->add_control(
            'phone_number',
            [
                'label' => __( 'Phone Number', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '+98 060 712 34', 'creote-addons' ),
                'placeholder' => __( 'Type your Phone Number here', 'creote-addons' ),
            ]
        );

        
        $this->add_control(
			'top_hr_two_two',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'button_enable',
            [
                'label' => __('Button Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
   
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button text', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Free Consulting', 'creote-addons' ),
                'placeholder' => __( 'Type your text here', 'creote-addons' ),
                'condition' => [
                    'button_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'button_enable' => 'yes'
                ],
            ]
        );
    

      
        
        $this->end_controls_section();


        $this->start_controls_section('header_content',
        [ 
            'label' => __('Header Content', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );  
   

        $this->add_control(
            'navigations',
            [
                'label' => __('Select Navigation', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => creote_navmenu(),
            ]
        );
   
    
        $this->add_control(
			'hr_sear',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'search_enable',
            [
                'label' => __('Search Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'hr_five_f',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'cart_enable',
            [
                'label' => __('Cart Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
         
        $this->add_control(
			'hr_optional',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'optional_panel',
            [
                'label' => __('Optional Panel Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
      
    $this->end_controls_section();

    $this->start_controls_section('topbar_m_css',
    [ 
        'label' => __('Topbar Css', 'creote-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'top_bar_enable' => 'yes'
        ],
    ]);

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Left Content Typography', 'creote-addons' ),
            'name' => 'top_content_typo',
            'selector' => '{{WRAPPER}} .header.style_one .header_top .top_inner .common_css .contntent .text small,
             .header.style_one .header_top .top_inner .common_css .contntent .text a, 
            .header.style_one .header_top .top_inner .common_css .contntent .text span ',
        ]
    );
    $this->add_control(
        'top_icon_color',
        [
            'label' => __('Icon Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one .header_top .top_inner .common_css .contntent i ' => 'color: {{VALUE}}!important;',
            ],
        ]
    ); 
    $this->add_control(
        'social_icon_color',
        [
            'label' => __('Social Media Icon Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one .header_top .top_inner .common_css .contntent.media .text a i ' => 'color: {{VALUE}}!important;',
            ],
        ]
    ); 
    
    $this->end_controls_section();


    $this->start_controls_section('header_m_css',
    [ 
        'label' => __('Header Css', 'creote-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]);
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Language Typography', 'creote-addons' ),
            'name' => 'languagemenu_typo',
            'selector' => '{{WRAPPER}} .language_content .dropdown .dropdown-menu li a ,  .language_content .dropdown .title ',
        ]
    );
    $this->add_control(
        'lang_switch_color_icon',
         [
            'label' => __('Language Icon Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .language_content .dropdown .title i.icon-language ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'lang_stext_color',
         [
            'label' => __('Language Text Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}   .language_content .dropdown .title ,
                 .language_content .dropdown .title i.fa-angle-down ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    $this->add_control(
        'lang_drop_bg_color',
         [
            'label' => __('Language DropDown Bg Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .language_content .dropdown .dropdown-menu ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'lang_drop_text_color',
         [
            'label' => __('Language DropDown Text Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .language_content .dropdown .dropdown-menu li a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    $this->add_control(
        'hr_lang_swi',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Menu Typography', 'creote-addons' ),
            'name' => 'menu_typo',
            'selector' => '{{WRAPPER}} .header.style_one .header_main .navbar_nav > li > a',
        ]
    );
    $this->add_control(
        'menu_color',
        [
            'label' => __('Menu Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one .header_main .navbar_nav > li > a  ' => 'color: {{VALUE}}!important;',
            ],
        ]
    ); 
    
    $this->add_control(
        'menu_ac_color',
        [
            'label' => __('Menu Hover/ Active Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one .navbar_nav > li.current_page_item.active > a , {{WRAPPER}}   .header.style_one .navbar_nav > li:hover > a' => 'color: {{VALUE}}!important;',
            ],
        ]
    ); 
      
    $this->add_control(
        'menu_dot_color',
        [
            'label' => __('Menu Dot Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}   .header.style_one .navbar_nav > li.dropdown::after ' => 'background-color: {{VALUE}}!important;',
            ],
        ]
    ); 
    $this->add_control(
        'hr_one',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Menu Typography', 'creote-addons' ),
            'name' => 'drop_menu_typo',
            'selector' => '{{WRAPPER}}  .header.style_one   .navbar_nav li .dropdown_menu > li > a ',
        ]
    );
    $this->add_control(
        'drop_bg_color',
        [
            'label' => __('Dropdown Background Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one   .navbar_nav li .dropdown_menu  ' => 'background: {{VALUE}}!important;',
            ],
        ]
    ); 
    $this->add_control(
        'drop_border_color',
        [
            'label' => __('Dropdown Broder Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header.style_one  .navbar_nav li .dropdown_menu  ' => 'border-color: {{VALUE}}!important;',
            ],
        ]
    ); 
    $this->add_control(
        'drop_menu_color',
        [
            'label' => __('Dropdown Menu Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one   .navbar_nav li .dropdown_menu > li > a  ' => 'color: {{VALUE}}!important;',
            ],
        ]
    ); 
    
    $this->add_control(
        'drop_homenu_color',
        [
            'label' => __('Dropdown Menu Hover  Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one  .navbar_nav li .dropdown_menu > li > a:hover ' => 'color: {{VALUE}}!important;',
            ],
        ]
    );  
    $this->add_control(
        'drop_homenu_dor_color',
        [
            'label' => __('Dropdown Menu Arrow  Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one   .navbar_nav li .dropdown_menu > li.dropdown::after ' => 'color: {{VALUE}}!important;',
            ],
        ]
    );  
    
    $this->add_responsive_control(
        'menu_alignmentd',
        [
            'label' => __('Menu alignments', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
              '0 0 0 auto' => [
                'title' => __( 'Menu Left', 'creote-addons' ),
                'icon' => 'fa fa-align-left',
              ],
              'auto' => [
                'title' => __( 'Menu Center', 'creote-addons' ),
                'icon' => 'fa fa-align-center',
              ],
              '0 auto 0 0' => [
                'title' => __( 'Menu Right', 'creote-addons' ),
                'icon' => 'fa fa-align-right',
              ],
            ],
            'default' => 'auto',
            'toggle' => true,
            'selectors' => [
              '{{WRAPPER}}  .header.style_one  .menu_area' => 'margin: {{VALUE}}!important;',
            ],
        ]
    );
    $this->add_control(
        'hr_search',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'search_color',
         [
            'label' => __('Search Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header.style_one .header_main .inner_box .right_content button i.icon-search-1 ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    
    $this->add_control(
        'hr_three',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( ' Button One Typography', 'creote-addons' ),
            'name' => 'button_typo_one',
            'selector' => '{{WRAPPER}} .header.style_one  .theme-btn.one ',
        ]
    );
    
    $this->add_control(
        'button_one_color',
         [
            'label' => __('Button One Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one  .theme-btn.one ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    $this->add_control(
        'button_one_bg_color',
         [
            'label' => __('Button One Background Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one  .theme-btn.one ' => 'background-color: {{VALUE}}!important;',
    
            ],
         ]
    );
    
    $this->add_control(
        'button_one_bor_color',
         [
            'label' => __('Button One Border Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .header.style_one  .theme-btn.one ' => 'border-color: {{VALUE}}!important;'
            ],
         ]
    );
    $this->add_control(
        'button_padding_one',
        [
            'label' => esc_html__( 'Button One Padding', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}}  .header.style_one  .theme-btn.one ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
            ],
        ]
    );
    $this->add_control(
        'button_border_radius_one',
        [
            'label' => esc_html__( 'Button One Radius', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}}  .header.style_one  .theme-btn.one ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
            ],
        ]
    );

    $this->add_control(
        'hr_opt',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'opt_color',
         [
            'label' => __('Option Panel Menu Bar Color', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header.style_one .header_main .inner_box .right_content button i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    $this->end_controls_section();
} 
    protected function render()
    {
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
   
    ?>


<!--Header-->
<header class="main-header header header_v15">
    <?php if($settings['top_bar_enable'] == 'yes'): ?>

    <section class="header_top">
        <div class="<?php echo esc_attr($settings['header_width']); ?>">
            <div class="row align-items-center">
                <!--Top Left-->
                <div class="col-lg-9 col-md-12">
                    <div class="top_left">
                        <ul class="contact_info_two">
                            <?php if(!empty($settings['high_light_text'])): ?>
                            <li> <span class="icon-checked"></span>
                                <?php echo esc_attr($settings['high_light_text']); ?>
                            </li>
                            <?php endif; ?>
                            <?php if(!empty($settings['location_address'])): ?>
                            <li class="single">
                                <span class="icon-placeholder"></span>
                                <?php echo esc_attr($settings['location_address']); ?>
                            </li>
                            <?php endif; ?>
                            <?php if(!empty($settings['timing'])): ?>
                            <li class="single">
                                <span class="icon-clock"></span> <?php echo esc_attr($settings['timing']); ?>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>


                <!--Top Right-->
                <?php if($settings['meida_enable'] == 'yes'): ?>
                <div class="col-lg-3 col-md-12">
                    <div class="top_right text-right">
                        <ul class="clearfix">
                            <?php if(!empty($settings['social_media_repeater'])):
                             foreach($settings['social_media_repeater'] as $social_media_repeater): ?>
                            <li>
                                <a href="<?php echo esc_html($social_media_repeater['media_link']); ?>"
                                    class="has-tooltip">
                                    <span class="<?php echo esc_html($social_media_repeater['media_icon']); ?>"></span>
                                </a>
                            </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if($settings['mid_bar_enable'] == 'yes'):
        $url = '';
        $logo_target = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
        $logo_nofollow = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : ''; 
           if(empty($settings['logo_link']['url'])):
               $url = home_url();
           elseif(!empty($settings['logo_link']['url'])):
               $url = $settings['logo_link']['url'];
           endif;
           ?>
    <section class="header_mid">
        <div class="<?php echo esc_attr($settings['header_width']); ?>">
            <div class="row align-items-center">
                <!--Top Left-->
                <div class="col-lg-3">
                    <div class="logo midbar_left">
                    <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>>
                        <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default">
                    </a>
                    </div>
                </div>
                <!--Top Right-->
                <div class="col-lg-6 fullwidth_after_1200">
                    <div class="midbar_mid">
                        <div class="contact_widget">
                            <ul class="contact_info">
                                <li class="single">
                                    <span class="icon-telephone"></span>
                                    <small> <?php echo esc_attr($settings['phone_title']); ?> </small>
                                    <p><a href="tel:<?php echo esc_attr($settings['phone_number']); ?> "><?php echo esc_attr($settings['phone_number']); ?>
                                        </a></p>
                                </li>
                                <li class="single">
                                    <span class="icon-mail"></span>
                                    <small> <?php echo esc_attr($settings['email_title']); ?>
                                    </small>

                                    <p><a href="mailto:<?php echo esc_attr($settings['email_address']); ?> "><?php echo esc_attr($settings['email_address']); ?>
                                        </a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php if($settings['button_enable'] == 'yes'):
                    $targe_button_link = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow_button_link = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
                <div class="col-lg-3 display_none_after_1200">
                    <div class="text-end midbar_right">
                        <div class="theme-btn_all">
                            <a class="theme-btn one" href="<?php echo esc_url($settings['button_link']['url']); ?>"
                                <?php  echo esc_attr($targe_button_link); echo esc_attr($nofollow_button_link); ?>>
                                <?php echo esc_attr($settings['button_text']); ?><span class="flaticon-arrow"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="navbar_outer">
        
            <div class="<?php echo esc_attr($settings['header_width']); ?>">

                <div class="navbar_inner">
                    <div class="row">
                        <div class="col-lg-12">
                         
                            <div class="header_content header_content_collapse">
               
               <div class="header_menu_box">
                 <div class="navigation_menu">
                    <?php  if(!empty($settings['navigations'])):
                       wp_nav_menu(array(
                       'menu' => $settings['navigations'],
                       'container' => false,
                       'menu_class' => 'navbar_nav',
                       'menu_id' => 'myNavbar',
                       'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                       'walker' => new \WP_Bootstrap_Navwalker()
                       )
                       ); endif;
                       ?>
                 </div>
              </div>
              <ul class="navbar_nav  navbar-mobile navbar_right">
                                    <?php if($settings['search_enable'] == 'yes'): ?>
                                        <li> 
                     <button type="button" class="search-toggler"><i class="icon-search"></i></button>
                  </li>
                                    <?php endif; ?>
                                    <?php if($settings['cart_enable'] == 'yes'): 
                                    if(class_exists('woocommerce')):?>
                                   <li>
                     <?php
                        $items_counts = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : '';
                        ?>
                     <div class="mini_cart_togglers header_side_cart">
                        <div class="mini-cart-count">  
                           <?php if(!empty($items_counts)): echo $items_counts ? $items_counts : '&nbsp;'; else: echo esc_html('0'); endif; ?>
                        </div>
                        <i class="icon-shopping-bag1"></i>
                     </div>
                  </li>
                                    <?php endif; endif; ?>
                                    <?php if($settings['optional_panel'] == 'yes'): ?>
                                        <li> 
                     <button type="button" class="contact-toggler"><i class="icon-menu1"></i></button>
                  </li>
                                    <?php endif; ?>
                                </ul>
               </div>

                           

                        </div>
                    </div>

                </div>

            </div>
       
    </section>
</header>



<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Header_v2());