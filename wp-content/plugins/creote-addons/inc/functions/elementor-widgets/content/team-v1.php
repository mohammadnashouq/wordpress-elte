<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_team_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-team-v1';
       }
   
       public function get_title()
       {
           return __('Team V1 ' , 'creote-addons');
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
               'settings',
               [
                   'label' => __('Team Content', 'creote-addons')
               ]
           );
   
           $this->add_control(
               'team_styles',
               [
                   'label' => __('Team Styles', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __( 'Style One', 'creote-addons' ), 
                       'style_two' => __( 'Style Two', 'creote-addons' ), 
                       'style_three' => __( 'Style Three', 'creote-addons' ), 
                       'style_four' => __( 'Style Four', 'creote-addons' ), 
                       'style_five' => __( 'Style Five', 'creote-addons' ), 
   			   	],
                   'default' => __('style_one' , 'creote-addons'),
               ]
           );
   
         $this->add_control(
             'member_image',
             [
                 'label' => __('member Image', 'creote-addons'),
                 'type' => Controls_Manager::MEDIA,
                 'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
             ]
         );
 
   
       $this->add_control(
           'member_name',
           [
             'label'       => esc_html__( 'Member name', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Amelia Margaret' , 'creote-addons'),
           ]
       );
       $this->add_control(
           'member_designation',
           [
           'label'       => esc_html__( 'Member Designation', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Director' , 'creote-addons'),
           ]
       );
   
       $this->add_control(
           'about_member',
           [
           'label'       => esc_html__( 'About Member', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'The HR Manger of Creote, he is very intelligent and smart.' , 'creote-addons'),
           'condition' => [
               'team_styles' => 'style_two',
             ],
           ]
       );
       $this->add_control(
           'about_member_two',
           [
           'label'       => esc_html__( 'About Member', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'The HR Manger of Creote, he is very intelligent and smart.' , 'creote-addons'),
           'condition' => [
               'team_styles' => ['style_three' , 'style_five'],
             ],
           ]
       );
     
       $this->add_control(
           'button_text_s_one',
           [
           'label'       => esc_html__( 'Button Text', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'View Profile' , 'creote-addons'),
           'condition' => [
               'team_styles' => 'style_one',
             ],
           ]
       );
   
       $this->add_control(
           'button_text_s_two',
           [
           'label'       => esc_html__( 'Button Text', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'View Profile' , 'creote-addons'),
           'condition' => [
               'team_styles' => 'style_two',
             ],
           ]
       );
    
   
       $this->add_control(
           'button_link',
       [
           'label' => __('Link', 'creote-addons'),
           'type' => Controls_Manager::URL,
           'placeholder' => __('https://your-link.com', 'creote-addons'),
           'show_external' => true,
           'default' => [
               'url' => '#',
               'is_external' => true,
               'nofollow' => true,
           ],
       ]
       );  
   
       $this->add_control(
         'media_enable',
        [
           'label' => __('Media Enable', 'creote-addons'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'creote-addons'),
            'label_off' => __('No', 'creote-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
     );
      
       $repeater = new Repeater();
       $repeater->add_control(
           'media_text',
           [
             'label'       => esc_html__( 'Media name', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'fa fa-facebook' , 'creote-addons'),
           ]
       );
       $repeater->add_control(
           'media_link',
           [
           'label'       => esc_html__( 'Media Link', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '#' , 'creote-addons'),
           ]
       );
   
       $this->add_control(
           'social_media_repeater',
           [
               'label' => __('Social media Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                     'media_text' => __('fa fa-facebook', 'creote-addons'),
                     'media_link' =>  __('#', 'creote-addons'),
             
                   ],
                   [
                     'media_text' => __('fa fa-twitter', 'creote-addons'),
                     'media_link' =>  __(' Employee Compensation', 'creote-addons'),
            
                    ],
                    [
                     'media_text' => __('fa fa-skype', 'creote-addons'),
                     'media_link' =>  __('#', 'creote-addons'),
                    ],
                    [
                       'media_text' => __('fa fa-instagram', 'creote-addons'),
                       'media_link' =>  __('#', 'creote-addons'),
                      ]
                   
               ],
               'title_field' => '{{{ media_text }}}',
               'condition' => [
                  'media_enable' => 'yes',
                ],
           ]
         ); 
             $this->end_controls_section();
         
       }
   
       protected function render()
       {
           $settings = $this->get_settings_for_display();
   
           $allowed_tags = wp_kses_allowed_html('post');
           $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
   		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; 
   ?>
<div class="team_box <?php echo esc_attr($settings['team_styles']); ?>">
   <?php if($settings['team_styles'] == 'style_one'):?>
   <?php // team one end   ?>
   <div class="team_box_outer">
      <?php if(!empty($settings['member_image']['url'])): ?>
      <div class="member_image">
         <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="team image" />
      </div>
      <?php endif; ?>
      <div class="about_member">
         <?php if($settings['media_enable'] == 'yes'): ?>
         <div class="share_media">
            <ul class="first">
               <li class="text"><?php echo esc_html__('Share' , 'creote-addons'); ?></li>
               <li><i class="fa fa-share-alt"></i></li>
            </ul>
            <ul>
               <li class="shar_alt"><i class="fa fa-share-alt"></i></li>
               <?php foreach($settings['social_media_repeater'] as $social_media_repeater):   ?>
               <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i
                        class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
               <?php endforeach; ?>
            </ul>
         </div>
         <?php endif; ?>
         <div class="authour_details">
            <?php if(!empty($settings['member_designation'])): ?>
            <span><?php echo esc_attr($settings['member_designation']); ?> </span>
            <?php endif; ?>
            <?php if(!empty($settings['member_name'])): ?>
            <h6><?php echo esc_attr($settings['member_name']); ?></h6>
            <?php endif; ?>
            <?php if(!empty($settings['button_text_s_one'])): ?>
            <div class="button_view">
               <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?>
                  <?php echo esc_attr($nofollow); ?> class="theme-btn one">
                  <?php echo esc_html($settings['button_text_s_one']);?>
               </a>
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <?php // team one end   ?>
   <?php elseif($settings['team_styles'] == 'style_two'):?>
   <div class="team_box_outer">
      <div class="image_box ">
         <?php if(!empty($settings['member_image']['url'])): ?>
         <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="team image" />
         <?php endif; ?>
         <div class="overlay ">
            <?php if(!empty($settings['button_text_s_two'])): ?>
            <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?>
               <?php echo esc_attr($nofollow); ?> class="read_m">
               <?php echo esc_html($settings['button_text_s_two']);?> <i class="icon-right-arrow"></i></a>
            <?php endif; ?>
            <?php if($settings['media_enable'] == 'yes'): ?>
            <ul>
               <?php foreach($settings['social_media_repeater'] as $social_media_repeater):   ?>
               <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i
                        class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
               <?php endforeach; ?>
            </ul>
            <?php endif; ?>
         </div>
      </div>
      <div class="content_box ">
         <?php if(!empty($settings['member_name'])): ?>
         <h2> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?>
               <?php echo esc_attr($nofollow); ?>>
               <?php echo esc_attr($settings['member_name']); ?></a>
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['member_designation'])): ?>
         <p class="job_details"><?php echo esc_attr($settings['member_designation']); ?> </p>
         <?php endif; ?>
         <?php if(!empty($settings['about_member'])): ?>
         <p><?php echo wp_kses($settings['about_member'] , $allowed_tags); ?> </p>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['team_styles'] == 'style_three'):?>
   <div class="team_box_outer">
      <div class="image_box ">
         <?php if(!empty($settings['member_image']['url'])): ?>
         <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="team image" />
         <?php endif; ?>
         <?php if($settings['media_enable'] == 'yes'): ?>
         <div class="share_links ">
            <a href="#" class="shar_icon "><span class="fa fa-share-alt "></span></a>
            <ul class="clearfix ">
               <?php foreach($settings['social_media_repeater'] as $social_media_repeater):   ?>
               <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i
                        class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
               <?php endforeach; ?>
            </ul>
         </div>
         <?php endif; ?>
      </div>
      <div class="content_box ">
         <?php if(!empty($settings['member_name'])): ?>
         <h2> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?>
               <?php echo esc_attr($nofollow); ?>>
               <?php echo esc_attr($settings['member_name']); ?></a>
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['member_designation'])): ?>
         <h6 class="job_details"><?php echo esc_attr($settings['member_designation']); ?> </h6>
         <?php endif; ?>
         <?php if(!empty($settings['about_member_two'])): ?>
         <p><?php echo wp_kses($settings['about_member_two'] , $allowed_tags); ?> </p>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['team_styles'] == 'style_four'):?>
   <div class="team_box_outer">
      <div class="image_box ">
         <?php if(!empty($settings['member_image']['url'])): ?>
         <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="team image" />
         <?php endif; ?>
      </div>
      <div class="content_box ">
         <?php if($settings['media_enable'] == 'yes'): ?>
         <div class="share_links ">
            <ul class="clearfix ">
               <?php foreach($settings['social_media_repeater'] as $social_media_repeater):   ?>
               <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i
                        class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
               <?php endforeach; ?>
            </ul>
         </div>
         <?php endif; ?>
         <?php if(!empty($settings['member_name'])): ?>
         <h2> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?>
               <?php echo esc_attr($nofollow); ?>>
               <?php echo esc_attr($settings['member_name']); ?></a>
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['member_designation'])): ?>
         <h6 class="job_details"><?php echo esc_attr($settings['member_designation']); ?> </h6>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['team_styles'] == 'style_five'):?>


   <div class="team_box type_one">
      <div class="content_box">
         <?php if(!empty($settings['member_name'])): ?>
         <h2><a href="#"><?php echo esc_attr($settings['member_name']); ?></a></h2>
         <?php endif; ?>
         <?php if(!empty($settings['member_designation'])): ?>
         <h6><?php echo esc_attr($settings['member_designation']); ?></h6>
         <?php endif; ?>
         <?php if(!empty($settings['about_member_two'])): ?>
         <p><?php echo esc_attr($settings['about_member_two']); ?></p>
         <?php endif; ?>
      </div>
      <?php if(!empty($settings['member_image'])): ?>
      <div class="image_box">
         <img src="<?php echo esc_url($settings['member_image']['url']); ?>" class="img-fluid" alt="img">
         <div class="overlay">
         <?php if($settings['media_enable'] == 'yes'): ?>
            <ul class="clearfix ">
               <?php foreach($settings['social_media_repeater'] as $social_media_repeater):   ?>
               <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i
                        class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
               <?php endforeach; ?>
            </ul>
            <?php endif; ?>
         </div>
      </div>
      <?php endif; ?>
   </div>
 

   <?php endif; ?>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_team_v1());