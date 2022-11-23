<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_testimonials_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-testimonial-v1';
       }
   
       public function get_title()
       {
           return __('Testimonial V1' , 'creote-addons');
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
               'textimonial_box_content',
               [
                   'label' => __('Testimonial Content', 'creote-addons')
               ]
           );
   
      
    
           $this->add_control(
               'testimonial_styles',
               [
                 'label' => __('Testimonial Styles', 'creote-addons'),
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
        
           $this->add_responsive_control(
               'dark_white',
               [
                 'label' => __( 'Color Type', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'dark_color' => __('Dark Color', 'creote-addons'), 
                   'light_color' => __('Light Color', 'creote-addons'),
                   ],
                  'default' => 'dark_color',
               ]
             );
        
           $this->end_controls_section();
   
            
           $this->start_controls_section(
               'testimonial_repeater',
               [
                   'label' => __('Testimonial Content', 'creote-addons')
               ]
           );
   
       
           
           $repeater = new Repeater();
           $repeater->add_control(
               'image_enable',
              [
                 'label' => __('Image Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
              ]
           );
           $repeater->add_control(
               'image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
                   'condition' => [
                       'image_enable' => 'yes',
                   ],
               ]
           );
           
        $repeater->add_control(
   		'name',
   		[
   		'label'       => esc_html__( 'Name', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Jacob Leonardo' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'designation',
   		[
   		'label'       => esc_html__( 'Designation', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Senior Manager of Excel Solution' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'comment',
   		[
   		'label'       => esc_html__( 'Comment', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'While running an early stage startup everything feels
           hard, that’s why it’s been so nice to have our accounting
           feel easy. We recommed Qetus.' , 'creote-addons'),
       ]);
   
      
       $repeater->add_control(
           'rating_one',
           [
               'label' => __( 'Rating', 'creote-addons' ),
               'type' => Controls_Manager::SELECT,
               'default' =>  esc_html__( 'two' , 'creote-addons'),
               'options' => [
                   'one' => __('1', 'creote-addons'),
                   'two' => __('2', 'creote-addons'),
                   'three' => __('3', 'creote-addons'),
                   'four' => __('4', 'creote-addons'),
                   'five' => __('5', 'creote-addons'),
               ],
           ]
       );
     
     
   
       $this->add_control(
           'testimonial_repeater_c',
           [
               'label' => __('Testimonial Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ]
                   
               ],
               'title_field' => '{{{ name }}}',
   
           ]
         );
   
        
           $this->end_controls_section();
   
   
   
           $this->start_controls_section('transition_css',
           [ 
               'label' => __('Transition', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]);
   
   
           $this->add_control(
               'quotes_enable',
              [
                 'label' => __('Quotes Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
                  'condition' => [
                   'testimonial_styles' => 'style_one',
                  ],
               ]
           );
           $this->add_control(
            'quotes_enable_move',
            [
              'label' => __('Quote Moving Styles', 'creote-addons'),
              'type' => Controls_Manager::SELECT,
              'options' => [
                'move_one' => __( 'Move Top Left', 'creote-addons' ),
                'move_two' => __( 'Move Top Right (Only For Rtl)', 'creote-addons' ),
                ],
              'default' => __('move_one' , 'creote-addons'),
              'condition' => [
               'quotes_enable' => 'yes',
               'testimonial_styles' => 'style_one',
               ],
            ]
         );
           $this->add_control(
               'quotes_move_top',
              [
                 'label' => __('Quotes Move Top', 'creote-addons'),
                  'type' => Controls_Manager::TEXT,
                  'default' => '0',
                  'selectors' => [
                   '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes  ' => 'top: {{VALUE}};',
                 ],
                 'condition' => [
                   'quotes_enable_move' => ['move_one' , 'move_two'],
                   'testimonial_styles' => 'style_one',
               ],
              ]
           );
           $this->add_control(
               'quotes_move_left',
              [
                 'label' => __('Quotes Move Left', 'creote-addons'),
                  'type' => Controls_Manager::TEXT,
                  'default' => '-150px',
                  'selectors' => [
                   '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes  ' => 'left: {{VALUE}};',
                 ],
                 'condition' => [
                   'quotes_enable_move' => 'move_one',
                   'testimonial_styles' => 'style_one',
               ],
              ]
           );
           $this->add_control(
            'quotes_move_right',
           [
              'label' => __('Quotes Move Right', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => '-150px',
               'selectors' => [
                '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes  ' => 'Right: {{VALUE}}!important; left:unset!imprortant;',
              ],
              'condition' => [
                'quotes_enable_move' => 'move_two',
                'testimonial_styles' => 'style_one',
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
<div class="testimonial_sec    <?php echo esc_attr($settings['dark_white']); ?> <?php echo esc_attr($settings['testimonial_styles']); ?>">
   <?php if($settings['testimonial_styles'] == 'style_one'): ?>
   <?php if($settings['quotes_enable'] == 'yes'): ?>
   <div class="icon_quotes">
      <i class="icon-quote"></i>
   </div>
   <?php endif; ?>
   <div class="swiper-container swiper_single">
      <div class="swiper-wrapper">
         <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>
         <div class="swiper-slide">
            <div class="testimonial_box">
               <div class="rating">
                  <ul>
                     <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                     <?php else: ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                     <?php endif; ?>
                  </ul>
               </div>
               <div class="authour_details <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?> image_yes <?php endif; ?>">
                  <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
                  <div class="image"> 
                     <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="image" />
                  </div>
                  <?php endif; ?>
                  <div class="details">
                     <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2>
                     <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span>
                  </div>
               </div>
               <div class="comment">
                  <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </div>
      <div class="arrows">
         <div class="prev-single-one"></div>
         <div class="next-single-one"></div>
      </div>
      <div class="num_pagination">
         <div class="number-pagination"></div>
      </div>
   </div>
   <?php elseif($settings['testimonial_styles'] == 'style_two'): ?>
   <div class="swiper-container single_swiper">
      <div class="swiper-wrapper">
         <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>
         <div class="swiper-slide">
            <div class="testimonial_box">
               <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
               <div class="authour_image">
                  <i class="icon-quote"></i>
                  <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="image" />
               </div>
               <?php endif; ?> 
               <div class="comment">
                  <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
               </div>
               <div class="rating">
                  <ul>
                     <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                     <?php else: ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                     <?php endif; ?>
                  </ul>
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>
   <div  class="swiper-container single_swiper_tab">
      <div class="swiper-wrapper">
         <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>
         <div class="swiper-slide">
            <div class="auth_details">
               <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2>
               <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span>
            </div>
         </div>
         <?php endforeach;?>
      </div>
   </div>
   <?php elseif($settings['testimonial_styles'] == 'style_three'): ?>
   <div class="swiper-container swiper__center_three_test">
      <div class="swiper-wrapper">
         <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>
         <div class="swiper-slide">
            <div class="testimonial_box">
               <i class="icon-quote"></i>
               <?php if(!empty($testimonial_repeater_c['comment'])): ?>
               <p class="description">
                  <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
               </p>
               <?php endif; ?>
               <?php if(!empty($testimonial_repeater_c['name'])): ?>
               <h3 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h3>
               <?php endif; ?>
               <?php if(!empty($testimonial_repeater_c['designation'])): ?>
               <p class="from"><?php echo esc_attr($testimonial_repeater_c['designation']); ?></p>
               <?php endif; ?>
               <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
               <div class="pic">
                  <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="image" />
               </div>
               <?php endif; ?>
               <div class="rating">
                  <ul>
                     <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                     <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                     <?php else: ?>
                     <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                     <?php endif; ?>
                  </ul>
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </div>
   </div>
   <div class="arrows">
      <div class="prev-single-one_three"></div>
      <div class="next-single-one_three"></div>
   </div>
   <?php elseif($settings['testimonial_styles'] == 'style_four'): ?>
   <div class="swiper-container swiper__center_three_test">
      <div class="swiper-wrapper">
         <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>
         <div class="swiper-slide">
            <div class="testimonial_box">
               <div class="box_inner not_ovelay">
                  <div class="rating">
                     <ul>
                        <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                        <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                        <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                        <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                        <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                        <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                        <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                        <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                        <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                        <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                        <?php else: ?>
                        <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                        <?php endif; ?>
                     </ul>
                  </div>
                  <?php if(!empty($testimonial_repeater_c['comment'])): ?>
                  <p class="description">
                     <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
                  </p>
                  <?php endif; ?>
                  <div class="client_bx">
                     <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
                     <div class="image_box">
                        <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="image" />
                     </div>
                     <?php endif; ?>
                     <div class="left_s">
                        <?php if(!empty($testimonial_repeater_c['name'])): ?>
                        <h2 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($testimonial_repeater_c['designation'])): ?>
                        <h6 class="from"><?php echo esc_attr($testimonial_repeater_c['designation']); ?></h6>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </div>
   </div>
   <?php elseif($settings['testimonial_styles'] == 'style_five'): ?>
   <div class="swiper-container swiper__center_two_test">
      <div class="swiper-wrapper">
         <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>
         <div class="swiper-slide">
            <div class="testimonial_box">
               <div class="icon_quotes">
                  <i class="icon-quote"></i>
               </div>
               <div class="lower_box ">
                  <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
                  <div class="image_box">
                     <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="image" />
                  </div>
                  <?php endif; ?>
                  <div class="content_box ">
                     <div class="rating">
                        <ul>
                           <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                           <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                           <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                           <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                           <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                           <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                           <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                           <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                           <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                           <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                           <?php else: ?>
                           <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                           <?php endif; ?>
                        </ul>
                     </div>
                     <?php if(!empty($testimonial_repeater_c['comment'])): ?>
                     <p class="description">
                        <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
                     </p>
                     <?php endif; ?>
                     <div class="authour">
                        <?php if(!empty($testimonial_repeater_c['name'])): ?>
                        <h2 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($testimonial_repeater_c['designation'])): ?>
                        <p><?php echo esc_attr($testimonial_repeater_c['designation']); ?></p>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </div>
   </div>
   <?php endif; ?>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_testimonials_v1());