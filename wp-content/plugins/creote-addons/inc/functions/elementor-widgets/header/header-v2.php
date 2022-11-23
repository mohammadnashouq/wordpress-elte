<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_header_v2 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-header-v2';
       }
   
       public function get_title()
       {
           return __('Header V3', 'creote-addons');
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
               ]
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
               'email_address',
               [
                   'label' => __( 'Email Id', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'sendmail@creote.com', 'creote-addons' ),
                   'placeholder' => __( 'Type your Mail Address here', 'creote-addons' ),
               ]
           );
   
           $this->add_control(
               'button_text',
               [
                   'label' => __( 'Button Text', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'Get In Touch', 'creote-addons' ),
                   'placeholder' => __( 'Type your title here', 'creote-addons' ),
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
               ]
           );
       
   
         
          
           $repeater = new Repeater();
           $repeater->add_control(
               'media_icon_enable',
               [
                   'label' => __('Media Icon type show / hide', 'creote-addons'),
                   'type' => Controls_Manager::SWITCHER,
                   'label_on' => __('Yes', 'creote-addons'),
                   'label_off' => __('No', 'creote-addons'),
                   'return_value' => 'yes',
                   'default' => 'no',
               ]
           );
           $repeater->add_control(
               'social_media_text',
               [
                   'label' => __( 'Social Media Text', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'Fb', 'creote-addons' ),
                   'placeholder' => __( 'Type your Socail Media text here', 'creote-addons' ),
                  
               ]
           );
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
                       'url' => '#',
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
                           'media_icon_enable' => 'yes' ,
                          'social_media_text' =>  __('Fb', 'creote-addons'),
                          'social_media_icon' =>  __('fa fa-facebook', 'creote-addons'),
                          'socail_media_link' =>  __('#', 'creote-addons'),
                       ],
                       [
                           'media_icon_enable' => 'yes' ,
                           'social_media_text' =>  __('Tw', 'creote-addons'),
                          'social_media_icon' =>  __('fa fa-twitter', 'creote-addons'),
                          'socail_media_link' =>  __('#', 'creote-addons'),
                        ],
                        [
                           'media_icon_enable' => 'yes' ,
                           'social_media_text' =>  __('Sk', 'creote-addons'),
                           'social_media_icon' =>  __('fa fa-skype', 'creote-addons'),
                           'socail_media_link' =>  __('#', 'creote-addons'),
                        ],
                        [
                               'media_icon_enable' => 'yes' ,
                           'social_media_text' =>  __('Te', 'creote-addons'),
                           'social_media_icon' =>  __('fa fa-telegram', 'creote-addons'),
                           'socail_media_link' =>  __('#', 'creote-addons'),
                        ],
                   ],
                   'title_field' => '{{{ social_media_text }}}',
   	
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
   
       
           $this->add_control(
               'phone_title',
               [
                   'label' => __( 'Title', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'Phone', 'creote-addons' ),
                   'placeholder' => __( 'Type your title here', 'creote-addons' ),
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
   
         
           $this->end_controls_section();
   
         
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
<?php if($settings['top_bar_enable'] == 'yes'): ?>
<div class="top_bar style_two">
   <div class="auto-container">
      <div class="row">
         <div class="col-lg-12">
            <div class="top_inner">
               <div class="left_side common_css">
                  <div class="contntent address">
                     <i class="icon-placeholder"></i>
                     <div class="text">
                        <?php if(!empty($settings['location_address'])): ?>
                        <span><?php echo esc_attr($settings['location_address']); ?></span>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="contntent email">
                     <i class="icon-email"></i>
                     <div class="text">
                        <?php if(!empty($settings['email_address'])): ?>
                        <a href="mailto:<?php echo esc_attr($settings['email_address']); ?>"><?php echo esc_attr($settings['email_address']); ?></a>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <div class="right_side common_css">
                  <div class="contntent media">
                     <div class="text">
                        <?php foreach($settings['social_media_repeater'] as  $media_repearter):?>
                        <?php $targetm = $media_repearter['socail_media_link']['is_external'] ? ' target="_blank"' : '';
                           $nofollowm = $media_repearter['socail_media_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                        <a href="<?php echo esc_url($media_repearter['socail_media_link']['url']); ?>" <?php echo esc_attr($targetm); ?> <?php echo esc_attr($nofollowm); ?>>
                        <?php if($media_repearter['media_icon_enable'] == false): ?>
                        <small><?php echo esc_attr($media_repearter['social_media_text']); ?></small>
                        <?php  elseif($media_repearter['media_icon_enable'] == true): ?>
                        <i class="<?php echo esc_attr($media_repearter['social_media_icon']); ?>"></i>
                        <?php endif; ?>
                        </a>
                        <?php endforeach;?>
                     </div>
                  </div>
                  <div class="contntent cbutton">
                     <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                     <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn three">  <?php echo esc_attr($settings['button_text']); ?> </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php endif;?>
<header class="header header_default style_two">
   <div class="auto-container">
      <div class="row align-items-center">
         <div class="col-lg-4 col-md-9 col-sm-9 col-xs-9 logo_column">
            <div class="header_log_outer">
               <div class="header_logo_box">
                  <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>>
                  <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default">
                  
                  </a>
               </div>
               <div class="phone_box">
                  <i class="icon-phone-call1"></i>
                  <div class="text">
                     <?php if(!empty($settings['phone_title'])): ?>
                     <small><?php echo esc_attr($settings['phone_title']); ?></small>
                     <?php endif; ?>
                     <?php if(!empty($settings['phone_number'])): ?>
                     <a href="tel:<?php echo esc_attr($settings['phone_number']); ?>"><?php echo esc_attr($settings['phone_number']); ?></a>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-8 col-md-3 col-sm-3 col-xs-3 menu_column">
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
                     <?php if($settings['search_enable'] == 'yes'): ?>
                     <li> 
                        <button type="button" class="search-toggler"><i class="icon-search"></i></button>
                     </li>
                     <?php endif;?>
                     <?php if($settings['modal_enable'] == 'yes'): ?>
                     <li>
                        <button type="button" class="contact-toggler"><i class="icon-setup-dots"></i></button>
                     </li>
                     <?php endif;?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_header_v2());