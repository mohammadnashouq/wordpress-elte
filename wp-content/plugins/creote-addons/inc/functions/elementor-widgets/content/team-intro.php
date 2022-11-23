<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_team_intro_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-team-intro-v1';
       }
   
       public function get_title()
       {
           return __('Team Intro V1 ' , 'creote-addons');
       }
   
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
   
       public function get_categories()
       {
           return ['102'];
       }
   
       
   
       protected function register_controls()
       {
   
            
   
           $this->start_controls_section(
               'team_intro_content',
               [
                   'label' => __('Team Intro Content', 'creote-addons')
               ]
           );
   
        
   
         $this->add_control(
             'team_intro_image',
             [
                 'label' => __('Image', 'creote-addons'),
                 'type' => Controls_Manager::MEDIA,
                 'default' => [
                   'url' => CREOTE_ADDONS_URL. 'assets/images/man.png',
                  ],
             ]
         );
         $this->add_control(
           'image_width',
           [
             'label'       => esc_html__( 'Image Height', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( '400px' , 'creote-addons'),
             'selectors' => [
               '{{WRAPPER}} .team_intro_box .image_right  , {{WRAPPER}} .team_intro_box .image_right img' => 'height: {{VALUE}};',
           ],
           ]
       );
         $this->add_control(
           'image_margin',
           [
               'label' => __( 'Image Margin', 'creote-addons' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .team_intro_box .image_right ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );
     
   
       $this->add_control(
           'team_intro_sub_title',
           [
             'label'       => esc_html__( 'Intro Sub Title', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Strong Team' , 'creote-addons'),
           ]
       );
       $this->add_control(
           'team_intro_title',
           [
           'label'       => esc_html__( 'Intro Title', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Foundation of Business' , 'creote-addons'),
           ]
       );
   
       $this->add_control(
           'intro_quotes',
           [
           'label'       => esc_html__( 'Intro Quotes', 'creote-addons' ),
           'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Teamwork is the secret that makes common people achieve  uncommon results.' , 'creote-addons'),
           ]
       );
   
       $this->add_control(
           'authour_sign',
           [
               'label' => __('Signature', 'creote-addons'),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                   'url' => CREOTE_ADDONS_URL. 'assets/images/signature.png', 
                ],
           ]
       );
       $this->add_control(
           'authour_name',
           [
           'label'       => esc_html__( 'Authour Name', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Liam Oliver , ' , 'creote-addons'),
           ]
       );
       $this->add_control(
           'authour_position',
           [
           'label'       => esc_html__( 'Authour Position', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Founder & CEO of Qetus' , 'creote-addons'),
           ]
       );
   
       $this->add_control(
           'background_image',
           [
               'label' => __('Background Image', 'creote-addons'),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                 'url' => \Elementor\Utils::get_placeholder_image_src(),
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
<div class="team_intro_box">
   <div class="team_intro_inner">
      <?php if(!empty($settings['background_image']['url'])): ?> 
      <div class="image parallax_cover">
         <img src="<?php echo esc_url($settings['background_image']['url']); ?>" class="cover-parallax" alt="image" />
      </div>
      <?php endif; ?>
      <div class="team_intro_start">
         <div class="row">
            <div class="col-lg-8">
               <div class="left_content">
                  <div class="title">
                     <h6><?php echo wp_kses($settings['team_intro_sub_title'] , $allowed_tags);?></h6>
                     <h1><?php echo wp_kses($settings['team_intro_title'], $allowed_tags);?></h1>
                  </div>
                  <div class="quotes">
                     <span class="icon-quote"></span>
                     <h5><?php echo wp_kses($settings['intro_quotes'], $allowed_tags);?></h5>
                  </div>
                  <div class="authour_dtls">
                     <?php if(!empty($settings['authour_sign']['url'])): ?> 
                     <img src="<?php echo esc_url($settings['authour_sign']['url']); ?>" class="sign" alt="image" />
                     <?php endif; ?>
                     <h4><?php echo wp_kses($settings['authour_name'], $allowed_tags);?>
                        <?php if(!empty($settings['authour_position'])): ?> 
                        <span><?php echo wp_kses($settings['authour_position'], $allowed_tags);?></span>
                        <?php endif; ?>
                     </h4>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
            </div>
         </div>
      </div>
   </div>
   <?php if(!empty($settings['team_intro_image']['url'])): ?> 
   <div class="image_right">
      <img src="<?php echo esc_url($settings['team_intro_image']['url']); ?>"  alt="image" />
   </div>
   <?php endif; ?>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_team_intro_v1());