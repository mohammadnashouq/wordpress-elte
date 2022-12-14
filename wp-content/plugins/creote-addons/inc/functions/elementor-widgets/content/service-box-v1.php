<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_service_box_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-service-box-v1';
       }
   
       public function get_title()
       {
           return __('Service Box V1' , 'creote-addons');
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
               'service_box_content',
               [
                   'label' => __('Service Content', 'creote-addons')
               ]
           );
   
           $this->add_control(
           'service_types',
           [
             'label' => __('Service Types', 'creote-addons'),
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
   
         // ---------- autnour box
       
         $this->add_control(
           'service_active',
          [
             'label' => __('Service Active', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'no',
              'condition' => [
               'service_types' => 'style_two',
             ],
          ]
       );
       $this->add_control(
           'image',
           [
           'label' => __('Image', 'creote-addons'),
           'type' => Controls_Manager::MEDIA,
           'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
           ],
           'condition' => [
             'service_types' => 'style_one',
           ],
           ]
        );
   
        $this->add_control(
         'image_two',
         [
         'label' => __('Image', 'creote-addons'),
         'type' => Controls_Manager::MEDIA,
         'default' => [
             'url' => \Elementor\Utils::get_placeholder_image_src(),
         ],
         'condition' => [
           'service_types' => 'style_two',
         ],
         ]
      );
      $this->add_control(
       'image_four',
       [
       'label' => __('Image', 'creote-addons'),
       'type' => Controls_Manager::MEDIA,
       'default' => [
           'url' => \Elementor\Utils::get_placeholder_image_src(),
       ],
       'condition' => [
         'service_types' => 'style_four',
       ],
       ]
    );
    $this->add_control(
     'image_five',
     [
     'label' => __('Image', 'creote-addons'),
     'type' => Controls_Manager::MEDIA,
     'default' => [
         'url' => \Elementor\Utils::get_placeholder_image_src(),
     ],
     'condition' => [
       'service_types' => 'style_five',
     ],
     ]
   );
   
   
   
        
   
        $this->add_control(
         'icon_image_two',
         [
         'label' => __('Icon Image', 'creote-addons'),
         'type' => Controls_Manager::MEDIA,
         'default' => [
           'url' => CREOTE_ADDONS_URL. 'assets/images/010-job-search.png',
         ],
         'condition' => [
           'service_types' => 'style_two',
         ],
         ]
      );
   
      
   
   
      $this->add_control(
       'icon_font_three',
       [
           'label' => __('Icon Fonts', 'creote-addons'),
           'type' => Controls_Manager::ICON,
           'options' => get_creote_icon(),
           'default' => __('icon-play' , 'creote-addons'),
            'condition' => [
               'service_types' => 'style_three',
            ]
       ]
   );
   
   $this->add_control(
     'icon_font_four',
     [
         'label' => __('Icon Fonts', 'creote-addons'),
         'type' => Controls_Manager::ICON,
         'options' => get_creote_icon(),
         'default' => __('icon-play' , 'creote-addons'),
          'condition' => [
             'service_types' => 'style_four',
          ]
     ]
   );
   
   $this->add_control(
     'icon_font_five',
     [
         'label' => __('Icon Fonts', 'creote-addons'),
         'type' => Controls_Manager::ICON,
         'options' => get_creote_icon(),
         'default' => __('icon-play' , 'creote-addons'),
          'condition' => [
             'service_types' => 'style_five',
          ]
     ]
   );
   
        $this->add_control(
           'image_fit',
          [
             'label' => __('Image Fit Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
              'condition' => [
               'service_types' => 'style_one',
             ],
          ]
       );
       $this->add_control(
         'number',
         [
         'label'       => esc_html__( 'Steps', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
         'default' =>  esc_html__( '01' , 'creote-addons'),
         'condition' => [
           'service_types' => 'style_three',
         ],
         ]);
     
        $this->add_control(
   		'heading',
   		[
   		'label'       => esc_html__( 'Heading', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
       'default' =>  esc_html__( 'Recruitment Process' , 'creote-addons'),
       ]);
   
    
       $this->add_control(
   		'description',
   		[
   		'label'       => esc_html__( 'Description', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
       'default' =>  esc_html__( 'These cases are perfectly simple and easy to distinguish.' , 'creote-addons'),
       ]);
   
       $this->add_control(
         'service_list',
         [
         'label'       => esc_html__( 'Service List', 'creote-addons' ),
         'type'        => Controls_Manager::TEXTAREA,
         'default' =>  esc_html__( 'Reducing Redundancy
         Uncovering Hidden Resources
         Increasing Company???s Agility' , 'creote-addons'),
         'condition' => [
           'service_types' => 'style_two',
         ],
       ]);
   
   
       $this->add_control(
   		'read_more',
   		[
   		    'label'       => esc_html__( 'Link Text', 'creote-addons' ),
   		    'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Read more' , 'creote-addons'),
           'condition' => [
             'service_types' => 'style_one',
           ],
       ]);
   
       
       $this->add_control(
         'read_more_three',
         [
             'label'       => esc_html__( 'Link Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Read more' , 'creote-addons'),
             'condition' => [
               'service_types' => 'style_three',
             ],
         ]);
       $this->add_control(
           'read_link',
       [
           'label' => __('Link', 'creote-addons'),
           'type' => Controls_Manager::URL,
           'placeholder' => __('https://your-link.com', 'creote-addons'),
           'show_external' => true,
           'default' => [
               'url' => '#',
               'is_external' => false,
               'nofollow' => false,
           ],
       ]
       );  
   
   
        
        $this->add_responsive_control(
         'dark_white',
         [
           'label' => __( 'Service Color Type', 'creote-addons' ),
           'type' => Controls_Manager::SELECT,
           'options' => [
             'dark_color' => __('Dark Color', 'creote-addons'), 
             'light_color' => __('Light Color', 'creote-addons'),
             ],
            'default' => 'dark_color',
         ]
       );
        
           $this->end_controls_section();
   
            
         
   
   
           $this->start_controls_section('transition_css',
           [ 
               'label' => __('Transition', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]);
   
         
   
       $this->add_control(
         'transitions_enable',
        [
           'label' => __('Transitions Enable', 'creote-addons'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'creote-addons'),
            'label_off' => __('No', 'creote-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
     );
   
       $this->add_responsive_control(
         'transitions',
         [
           'label' => __( 'Transitions', 'creote-addons' ),
           'type' => Controls_Manager::SELECT,
           'options' => [
             '0' => __('0ms', 'creote-addons'), 
             '100' => __('100ms', 'creote-addons'),
             '200' => __('200ms', 'creote-addons'),
             '300' => __('300ms', 'creote-addons'),
             '400' => __('400ms', 'creote-addons'),
             '500' => __('500ms', 'creote-addons'),
             '600' => __('600ms', 'creote-addons'),
             '700' => __('700ms', 'creote-addons'),
             '800' => __('800ms', 'creote-addons'),
             '900' => __('900ms', 'creote-addons'),
             '1000' => __('1000ms', 'creote-addons'),
             ],
            'default' => '0',
            'condition' => [
             'transitions_enable' => 'yes',
           ],
         ]
       );
       $this->end_controls_section();
         
       }
   
       protected function render()
       {
           $settings = $this->get_settings_for_display();
   
           $allowed_tags = wp_kses_allowed_html('post');
          $target = $settings['read_link']['is_external'] ? ' target="_blank"' : '';
           $nofollow = $settings['read_link']['nofollow'] ? ' rel="nofollow"' : ''; 
   ?>
<div class="service_box <?php echo esc_attr($settings['service_types']); ?> <?php echo esc_attr($settings['dark_white']); ?>" <?php if($settings['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>"  data-aos-offset="0" <?php endif;?>>
   <?php if($settings['service_types'] == 'style_one'):?>
   <div class="service_content">
      <?php if(!empty($settings['image'])): ?>
      <div class="image <?php if($settings['image_fit'] == 'yes'): ?> image_fit <?php endif; ?>">
         <img src="<?php echo esc_url($settings['image']['url']); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
      </div>
      <?php endif; ?>
      <div class="content_inner">
         <?php if(!empty($settings['heading'])): ?>
         <h2>
            <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
            <?php echo wp_kses($settings['heading'] , $allowed_tags) ?>
            </a> 
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['description'])): ?>
         <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
         <?php endif; ?>
         <?php if(!empty($settings['read_more'])): ?>
         <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="read_more">
         <?php echo wp_kses($settings['read_more'] , $allowed_tags) ?>
         </a>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['service_types'] == 'style_two'):?>
   <div class="service_content_two <?php if($settings['service_active'] == 'yes'): ?> active_ser <?php endif; ?>">
      <div class="content_inner" <?php if(!empty($settings['image_two'])): ?> style="background-image:url(<?php echo esc_url($settings['image_two']['url']); ?>);" <?php endif; ?>>
         <div class="content_inner_in">
            <?php if(!empty($settings['icon_image_two'])): ?>
            <div class="icon_image">
               <img src="<?php echo esc_url($settings['icon_image_two']['url']); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
            </div>
            <?php endif; ?>
            <?php if(!empty($settings['heading'])): ?>
            <h2>
               <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
               <?php echo wp_kses($settings['heading'] , $allowed_tags) ?>
               </a> 
            </h2>
            <?php endif; ?>
            <?php if(!empty($settings['description'])): ?>
            <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
            <?php endif; ?>
            <?php if(!empty($settings['service_list'])): ?>
            <?php $service_lists = explode("\n", ($settings['service_list']));?>
            <ul>
               <?php foreach($service_lists as $service_list):?>
               <li>
                  <?php echo wp_kses($service_list, true); ?>
               </li>
               <?php endforeach; ?>
            </ul>
            <?php endif; ?>
         </div>
      </div>
      <div class="ovarlay_link">
         <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
         <i class="icon-right-arrow"></i>
         </a> 
      </div>
      <div class="overlay_content">
         <?php if(!empty($settings['heading'])): ?>
         <h2>
            <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
            <?php echo wp_kses($settings['heading'] , $allowed_tags) ?>
            </a> 
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['description'])): ?>
         <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['service_types'] == 'style_three'):?>
   <div class="service_content">
      <div class="content_inner">
         <?php if(!empty($settings['icon_font_three'])): ?>
         <span class="<?php echo esc_attr($settings['icon_font_three']); ?>"><i></i></span>
         <?php endif; ?>
         <?php if(!empty($settings['number'])): ?>
         <small class="nom"><?php echo esc_attr($settings['number']); ?></small>
         <?php endif; ?>
         <?php if(!empty($settings['heading'])): ?>
         <h2>   <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
            <?php echo wp_kses($settings['heading'] , $allowed_tags) ?>
            </a> 
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['description'])): ?>
         <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
         <?php endif; ?>
         <?php if(!empty($settings['read_more_three'])): ?>
         <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="read_more">
         <?php echo wp_kses($settings['read_more_three'] , $allowed_tags) ?> <i class="icon-right-arrow"></i>
         </a>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['service_types'] == 'style_four'):?>
   <div class="service_content">
   <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
     <div class="image_box">
         <?php if(!empty($settings['image_four'])): ?>
         <img src="<?php echo esc_url($settings['image_four']['url']); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
         <?php endif; ?>
         <?php if(!empty($settings['icon_font_four'])): ?>
         <span class="<?php echo esc_attr($settings['icon_font_four']); ?>"></span>
         <?php endif; ?>
      </div>
         </a>
      <div class="content_inner">
         <?php if(!empty($settings['heading'])): ?>
         <h2>   <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
            <?php echo wp_kses($settings['heading'] , $allowed_tags) ?>
            </a> 
         </h2>
         <?php endif; ?>
         <?php if(!empty($settings['description'])): ?>
         <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
         <?php endif; ?>
      </div>
   </div>
   <?php elseif($settings['service_types'] == 'style_five'):?>
   <div class="service_content">
      <div class="image_box">
         <?php if(!empty($settings['image_five'])): ?>
         <img src="<?php echo esc_url($settings['image_five']['url']); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
         <?php endif; ?>
      </div>
      <div class="content_inner">
         <?php if(!empty($settings['icon_font_five'])): ?>
         <span class="<?php echo esc_attr($settings['icon_font_five']); ?>"></span>
         <?php endif; ?>
         <div class="text_box">
            <?php if(!empty($settings['heading'])): ?>
            <h2>   <a href="<?php echo esc_url($settings['read_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
               <?php echo wp_kses($settings['heading'] , $allowed_tags) ?>
               </a> 
            </h2>
            <?php endif; ?>
            <?php if(!empty($settings['description'])): ?>
            <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <?php endif; ?>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_service_box_v1());