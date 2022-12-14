<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_header_shop_v12 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-header-shop-v12';
       }
   
       public function get_title()
       {
           return __('Header V8', 'creote-addons');
       }
   
       public function get_icon()
       {
           return 'icon-creote-svg';
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
               'label' => __('Top Bar show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
           );
           $this->add_control(
               'navigations',
               [
                   'label' => __('Select Navigation', 'creote-addons'),
                   'type' => Controls_Manager::SELECT2,
                   'options' => creote_navmenu(),
               ]
           );
   
       
           $this->end_controls_section();
   
           $this->start_controls_section('top_content',
           [ 
               'label' => __('Topbar Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                   'top_bar_enable' => 'yes'
               ],
           ]
           );
           
           $this->add_control(
           'list_content_enable',
               [
               'label' => __('List show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
               ]
           );
   
           $repeater = new Repeater();
      
           $repeater->add_control(
               'list_itme_text',
           [
               'label' => esc_html__('List Item', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Item' , 'creote-addons'),
           ]);
          
           $repeater->add_control(
               'link',
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
               ]
           );
    
           $this->add_control(
               'list_content_repeater',
               [
                   'label' => __('List Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'list_itme_text' =>  __('About Us','creote-addons'),
       
                       ],
                       [
                           'list_itme_text' =>  __('Insights','creote-addons'),
                       ],
                       [
                           'list_itme_text' =>  __('Contact','creote-addons'),
   
                       ],
                   ],
                   'title_field' => '{{{ list_itme_text }}}',
                   'condition' => [
                       'list_content_enable' => 'yes'
                   ],
           ]
       );


       $this->add_control(
        'notices',
        [
            'label' => esc_html__('Notice', 'creote-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => __('COVID-19 Updates & Shipment Delays' , 'creote-addons'),
        ]);
   
        
          $this->add_responsive_control(
            'search_enable',
           [
              'label' => __('Search Button show / hide', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
            ]
          );

             
           $this->add_control(
               'scoial_media_enable',
                   [
                   'label' => __('Social Media show / hide', 'creote-addons'),
                   'type' => Controls_Manager::SWITCHER,
                   'label_on' => __('Yes', 'creote-addons'),
                   'label_off' => __('No', 'creote-addons'),
                   'return_value' => 'yes',
                   'default' => 'yes',
                   ]
           );
   
           $repeater = new Repeater();
         
           $repeater->add_control(
               'social_media_icon',
               [
                   'label' => __( 'Social Media Icon', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'fa fa-facebook', 'creote-addons' ),
                   'placeholder' => __( 'Type your Socail Media Icon Class Name', 'creote-addons' ),
               ]
           );
           $repeater->add_control(
               'socail_media_link',
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
               ]
           );
           $this->add_control(
               'social_media_repeater',
               [
                   'label' => __('Social Media Content', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                         
                          'social_media_icon' =>  __('fa fa-facebook', 'creote-addons'),
                          'socail_media_link' =>  __('#', 'creote-addons'),
                       ],
                       [
                          
                          'social_media_icon' =>  __('fa fa-twitter', 'creote-addons'),
                          'socail_media_link' =>  __('#', 'creote-addons'),
                        ],
                        [
                         
                           'social_media_icon' =>  __('fa fa-skype', 'creote-addons'),
                           'socail_media_link' =>  __('#', 'creote-addons'),
                        ],
                        [
                           'social_media_icon' =>  __('fa fa-telegram', 'creote-addons'),
                           'socail_media_link' =>  __('#', 'creote-addons'),
                        ],
                   ],
                   'title_field' => '{{{ social_media_icon }}}',
                   'condition' => [
                       'scoial_media_enable' => 'yes'
                   ],
                   
               ]
           );
           
           $this->end_controls_section();
   
   
           $this->start_controls_section('headers_content',
           [ 
               'label' => __('Header Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
           $this->add_control(
               'logo_default',
           [
               'label' => __( 'Logo Default', 'creote-addons' ),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                  'url' => CREOTE_ADDONS_URL . '/assets/images/logo-white.png',
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
                   '{{WRAPPER}} .header .header_logo_box img' => 'width: {{VALUE}}!important; min-width: {{VALUE}}!important;',
               ],
           ]
       );
   
          $this->add_control(
           'margin_logo',
           [
               'label' => __( 'Margin', 'creote-addons' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .header .header_logo_box img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                   'url' => '',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]
       );
   
            $this->add_control(
           'colo',
               [
               'type' => Controls_Manager::DIVIDER, 
               ]
           );
   
 
     
   
       $this->add_responsive_control(
           'modal_enable',
           [
               'label' => __('Modal Button show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
       );
       $this->add_responsive_control(
           'cart_enable',
           [
               'label' => __('Cart show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
       );
   
       $this->add_control(
        'button_enable',
        [
            'label' => __('Button show / hide', 'creote-addons'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'creote-addons'),
            'label_off' => __('No', 'creote-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    
    $this->add_control(
        'button_text',
        [
            'label' => __( 'Button Text', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Get In Touch', 'creote-addons' ),
            'placeholder' => __( 'Type your title here', 'creote-addons' ),
            'condition' => [
                'button_enable' => 'yes'
            ],
        ]
    );
    $this->add_control(
        'button_link',
        [
            'label' => __( 'Button Link', 'creote-addons' ),
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
       /*--
       $this->start_controls_section('custom_css_enabled',
       [ 
           'label' => __('Enable Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
       ]
       );
       $this->add_control(
           'custom_css_enable',
           [
               'label' => __('Custom Css Enable / Disable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
       );
       $this->end_controls_section();
       $this->start_controls_section('top_bar_css',
       [ 
           'label' => __('Top Bar Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
           'condition' => [
               'custom_css_enable' => 'yes'
           ],
       ]
       );
       $this->add_responsive_control(
           'top_bar_bg_color',
            [
               'label' => __('Top Bar Bg Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six' => 'background: {{VALUE}}!important;',
                 ],
            ]
         );
       $this->add_responsive_control(
           'list_iem_color',
            [
               'label' => __('List Item Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css ul li a ' => 'color: {{VALUE}}!important;',
                 ],
            ]
         );
   
         $this->add_responsive_control(
           'list_iem_color_hover',
            [
               'label' => __('List Item Hover Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css ul li a:hover ' => 'color: {{VALUE}}!important;',
                 ],
            ]
         );  
   
         $this->add_responsive_control(
           'button_text_color',
            [
               'label' => __('Button Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .btn_lf_side a ' => 'color: {{VALUE}}!important;',
                 ],
            ]
         );  
         $this->add_responsive_control(
           'button_border_color',
            [
               'label' => __('Button Border Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .btn_lf_side a ' => 'border-color: {{VALUE}}!important;',
                 ],
            ]
         );
         $this->add_responsive_control(
           'button_hover_color',
            [
               'label' => __('Button Hover Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .btn_lf_side a:hover ' => 'color: {{VALUE}}!important;',
               ],
            ]
         );
         $this->add_responsive_control(
           'button_hover_bg_color',
            [
               'label' => __('Button Hover Bg / Border Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .btn_lf_side a:hover ' => 'border-color: {{VALUE}}!important;  background: {{VALUE}}!important;',
               ],
            ]
         );
   
   
         $this->add_responsive_control(
           'social_media_color',
            [
               'label' => __('Media Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .med_rg_side ul li a ' => 'color: {{VALUE}}!important;',
                 ],
            ]
         );  
         $this->add_responsive_control(
           'media_border_color',
            [
               'label' => __('Media Border Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .med_rg_side ul li a ' => 'border-color: {{VALUE}}!important;',
                 ],
            ]
         );
         $this->add_responsive_control(
           'media_hover_color',
            [
               'label' => __('Media Hover Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .med_rg_side ul li a:hover ' => 'color: {{VALUE}}!important;',
               ],
            ]
         );
         $this->add_responsive_control(
           'media_hover_bg_color',
            [
               'label' => __('Media Hover Bg / Border Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .top_bar.style_six .top_inner .common_css.right_side .rg_content_box .med_rg_side ul li a:hover ' => 'border-color: {{VALUE}}!important;  background: {{VALUE}}!important;',
               ],
            ]
         );
   
       $this->end_controls_section();
   
   
       $this->start_controls_section('header_css',
       [ 
           'label' => __('Header Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
           'condition' => [
               'custom_css_enable' => 'yes'
           ],
       ]
       );
   
       $this->add_responsive_control(
           'header_positions',
           [
             'label' => __('Header Position', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'absolute' => __( 'Position Absolute', 'creote-addons' ),
               'relative' => __( 'Position Relative', 'creote-addons' ),
             ],
             'default' => __('absolute' , 'creote-addons'),
             'selectors' => [
               '{{WRAPPER}} .header_style_six_nw  ' => 'position: {{VALUE}};',
            ],
           ]
       );
       $this->add_responsive_control(
           'header_bg_color',
            [
               'label' => __('Header Bg Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .header' => 'background: {{VALUE}};',
                 ],
            ]
         );
       $this->add_responsive_control(
           'mennu_color',
            [
               'label' => __('Menu Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .navigation_menu .navbar_nav li a.nav-link ' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .navigation_menu  .navbar_nav li .dropdown-btn span:before ' => 'color: {{VALUE}}; opacity:.4;',
               ],
            ]
         );
       $this->add_responsive_control(
           'mennu_right_icon_color',
            [
               'label' => __('Icon Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .header_right_content ul li .search-toggler i, {{WRAPPER}}  .header_style_six_nw .header .header_content_collapse .header_right_content ul li .header_side_cart i, {{WRAPPER}}  .header_style_six_nw .header .header_content_collapse .header_right_content ul li .contact-toggler i' => 'color: {{VALUE}};',
               ],
            ]
       );
   
       $this->add_responsive_control(
           'cart_count_color',
            [
               'label' => __('Cart Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .header_right_content ul .header_side_cart .mini-cart-count ' => 'color: {{VALUE}};',
               ],
            ]
       );
       $this->add_responsive_control(
           'cart_bg_count_color',
            [
               'label' => __('Cart Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .header_right_content ul .header_side_cart .mini-cart-count ' => 'background: {{VALUE}};',
               ],
            ]
       );
   
   
       $this->add_responsive_control(
           'right_btn_color',
            [
               'label' => __('Link Text Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .header_right_content ul li.last a ' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .header_right_content ul li.last::before ' => 'background: {{VALUE}}; opacity:.09;',
                   
               ],
            ]
       );
   
       $this->end_controls_section();
         --*/
       }
   
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $url = '';
           $logo_target = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
           $logo_nofollow = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : ''; 
              if(empty($settings['logo_link']['url'])):
                  $url = home_url();
              elseif(!empty($settings['logo_link']['url'])):
                  $url = $settings['logo_link']['url'];
              endif;
           ?>
<div class="header_style_six_nw header_style_ten">
   <?php if($settings['top_bar_enable'] == 'yes'): ?>
   <div class="top_bar style_six">
      <div class="auto-container">
         <div class="row">
            <div class="col-lg-12">
               <div class="top_inner">
                  <div class="left_side common_css">
                    <?php if(!empty($settings['notices'])): ?>
                        <p class="notice"><?php echo wp_kses($settings['notices'] ,  $allowed_tags); ?></p>
                    <?php endif; ?>
                    <?php if($settings['list_content_enable'] == 'yes'): ?>
                    <ul>
                     <?php foreach($settings['list_content_repeater'] as $list_content_repeater):
                        $target = $list_content_repeater['link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $list_content_repeater['link']['nofollow'] ? ' rel="nofollow"' : '';
                        ?>
                     <li><a href="<?php echo esc_url($list_content_repeater['link']['url']) ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo wp_kses($list_content_repeater['list_itme_text'] ,  $allowed_tags); ?></a>   </li>
                     <?php endforeach; ?>
                    
                     <ul>
                     <?php endif; ?>
                  </div>
                  <div class="right_side common_css">
                     <div class="rg_content_box">

                     <?php if($settings['search_enable'] == 'yes'): ?>
                        <div  class="serch_simple">
                            <?php creote_simple_search(); ?>
                        </div>
                    <?php endif; ?>

                       
                        <?php if($settings['scoial_media_enable'] == 'yes'): ?>
                        <div class="med_rg_side">
                           <ul>
                              <?php foreach($settings['social_media_repeater'] as $media_repearter):?>
                              <?php $target_three = $media_repearter['socail_media_link']['is_external'] ? ' target="_blank"' : '';
                                 $nofollow_three = $media_repearter['socail_media_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                              <li> <a href="<?php echo esc_url($media_repearter['socail_media_link']['url']); ?>" <?php echo esc_attr($target_three); ?> <?php echo esc_attr($nofollow_three); ?>>
                                 <i class="<?php echo esc_attr($media_repearter['social_media_icon']); ?>"></i>
                                 </a>
                              </li>
                              <?php endforeach;?>
                           </ul>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif;?>
   <header class="header header_default">
      <div class="auto-container">
         <div class="row align-items-center">
            <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
               <div class="header_logo_box">
                  <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>>
                  <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default">
                   
                  </a>
               </div>
            </div>
            <div class="col-lg-10 col-md-3 col-sm-3 col-xs-3 menu_column">
               <div class="navbar_togglers hamburger_menu">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
               </div>
               <div class="header_content_collapse">
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
                  <div class="header_right_content">
                     <ul>
                       
                        <?php  if(class_exists('woocommerce')): if($settings['cart_enable'] == 'yes'): ?>
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
                        <?php endif; endif;?>
                        <?php if($settings['modal_enable'] == 'yes'): ?>
                        <li>
                           <button type="button" class="contact-toggler"><i class="icon-menu1"></i></button>
                        </li>
                        <?php endif;?>

                        <?php if($settings['button_enable'] == 'yes'): ?>
                            <li class="con_button">
                           <?php  
                              $target_two = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
                              $nofollow_two = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                              ?>
                           <a href="<?php echo esc_url($settings['button_link']['url']) ?>" class="theme-btn one" <?php echo esc_attr($target_two); ?> <?php echo esc_attr($nofollow_two); ?>> <?php echo wp_kses($settings['button_text'] ,  $allowed_tags); ?></a>   </li>
                        </li>
                        <?php endif; ?>
                      
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_header_shop_v12());