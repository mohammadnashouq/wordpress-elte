<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_title_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-title-v1';
       }
   
       public function get_title()
       {
           return __('Title V1 ' , 'creote-addons');
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
               'title_content',
               [
                   'label' => __('Title Content', 'creote-addons')
               ]
           );
   
           $this->add_control(
               'title_styles',
               [
                   'label' => __('Title Styles', 'creote-addons'),
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
             'title_alignments',
             [
                 'label' => __('Title alignments', 'creote-addons'),
                 'type' => Controls_Manager::CHOOSE,
                 'options' => [
                   'left' => [
                     'title' => __( 'Text Left', 'creote-addons' ),
                     'icon' => 'fa fa-align-left',
                   ],
                   'center' => [
                     'title' => __( 'Text Center', 'creote-addons' ),
                     'icon' => 'fa fa-align-center',
                   ],
                   'right' => [
                     'title' => __( 'Text Right', 'creote-addons' ),
                     'icon' => 'fa fa-align-right',
                   ],
                 ],
                 'default' => 'center',
                 'toggle' => true,
                 'selectors' => [
                   '{{WRAPPER}} .title_all_box ' => 'text-align: {{VALUE}}!important;',
                 ],
             ]
         );
   
           $this->add_control(
   			'title_small_heading',
   		    	[
   				'label'       => esc_html__( 'Small Heading', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Intelligent' , 'creote-addons'),
   		   	]
           );
           $this->add_responsive_control(
               'small_title_padding',
               [
                 'label' => __( 'Small Title Padding', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => [ 'px', '%', 'em' ],
                 'selectors' => [
                   '{{WRAPPER}} .title_sections .before_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
               ]
           );
   
         $this->add_control(
   			'title_heading',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Human Resources' , 'creote-addons'),
   	   	]
         );
   
         $this->add_responsive_control(
           'title_padding',
           [
             'label' => __( 'Title Padding', 'creote-addons' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
               '{{WRAPPER}} .title_sections .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
           ]
       );
   
         $this->add_control(
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.' , 'creote-addons'),
   			]
           );
   
           $this->add_responsive_control(
               'description_padding',
               [
                 'label' => __( 'Description Padding', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => [ 'px', '%', 'em' ],
                 'selectors' => [
                   '{{WRAPPER}} .title_sections p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
               ]
           );
   
           $this->add_responsive_control(
               'dark_white',
               [
                 'label' => __( 'Title Color Type', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'dark_color' => __('Dark Color', 'creote-addons'), 
                   'light_color' => __('Light Color', 'creote-addons'),
                   ],
                  'default' => 'dark_color',
               ]
             );
           
        
        $this->end_controls_section();
   
           $this->start_controls_section('title_section_css',
           [ 
               'label' => __('Title Css', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]
           );
         
           $this->add_control(
             'custom_css_enable',
            [
               'label' => __('Custom Css Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
   
          $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'name' => 'small_title_typo',
              'label' => __('Subtitle Typography ', 'creote-addons'),
              'selector' => '{{WRAPPER}} .title_all_box .title_sections .before_title ',
              'condition' => [
                'custom_css_enable' => 'yes'
            ],
            ]
          );
          
       $this->add_responsive_control(
         'small_title_color',
          [
             'label' => __('Small Title Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .title_all_box .title_sections .before_title  ' => 'color: {{VALUE}};',
             ],
             'condition' => [
               'custom_css_enable' => 'yes'
           ],
          ]
        );
        $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
            'name' => 'title_typo',
            'label' => __('Title Typography ', 'creote-addons'),
            'selector' => '{{WRAPPER}} .title_all_box .title_sections .title ',
            'condition' => [
              'custom_css_enable' => 'yes'
          ],
          ]
        );
        
        $this->add_responsive_control(
         'title_color',
          [
             'label' => __('Title Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .title_all_box .title_sections .title  ' => 'color: {{VALUE}};',
             ],
             'condition' => [
               'custom_css_enable' => 'yes'
           ],
          ]
        );
        $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
            'name' => 'desc_typo',
            'label' => __('Description Typography ', 'creote-addons'),
            'selector' => '{{WRAPPER}} .title_all_box .title_sections p ',
            'condition' => [
              'custom_css_enable' => 'yes'
          ],
          ]
        );
        $this->add_responsive_control(
         'description_color',
          [
             'label' => __('Description Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .title_all_box .title_sections p  ' => 'color: {{VALUE}};',
             ],
             'condition' => [
               'custom_css_enable' => 'yes'
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
<div class="title_all_box <?php echo esc_attr($settings['title_styles']); ?>  <?php  echo esc_attr($settings['dark_white']); ?>">
   <?php if($settings['title_styles'] == 'style_one'):?>
   <?php // title one end   ?>
   <div class="title_sections <?php echo esc_attr($settings['title_alignments']); ?>">
      <?php if(!empty($settings['title_small_heading'])):?>
      <div class="before_title">
         <?php echo wp_kses($settings['title_small_heading'] , $allowed_tags) ?>
      </div>
      <?php endif; ?>
      <?php if(!empty($settings['title_heading'])):?>
        <div class="title">  <?php echo wp_kses($settings['title_heading'] , $allowed_tags) ?></div>
      <?php endif; ?>
      <?php if(!empty($settings['description'])):?>
      <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
      <?php endif; ?>
   </div>
   <?php // title one end   ?>
   <?php elseif($settings['title_styles'] == 'style_two'):?>
   <?php // title one end   ?>
   <div class="title_sections two <?php echo esc_attr($settings['title_alignments']); ?>">
      <?php if(!empty($settings['title_small_heading'])):?>
      <div class="before_title">
         <?php echo wp_kses($settings['title_small_heading'] , $allowed_tags) ?>
      </div>
      <?php endif; ?>
      <?php if(!empty($settings['title_heading'])):?>
        <div class="title">  <?php echo wp_kses($settings['title_heading'] , $allowed_tags) ?></div>
      <?php endif; ?>
      <?php if(!empty($settings['description'])):?>
      <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
      <?php endif; ?>
   </div>
   <?php // title one end   ?>
   <?php elseif($settings['title_styles'] == 'style_three'):?>
   <?php // title one end   ?>
   <div class="title_sections three <?php echo esc_attr($settings['title_alignments']); ?>">
      <?php if(!empty($settings['title_small_heading'])):?>
      <div class="before_title">
         <?php echo wp_kses($settings['title_small_heading'] , $allowed_tags) ?>
      </div>
      <?php endif; ?>
      <?php if(!empty($settings['title_heading'])):?>
        <div class="title">   <?php echo wp_kses($settings['title_heading'] , $allowed_tags) ?></div>
      <?php endif; ?>
      <?php if(!empty($settings['description'])):?>
      <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
      <?php endif; ?>
   </div>
   <?php // title one end   ?>
   <?php elseif($settings['title_styles'] == 'style_four'):?>
   <?php // title one end   ?>
   <div class="title_sections four  <?php echo esc_attr($settings['title_alignments']); ?>">
      <?php if(!empty($settings['title_small_heading'])):?>
      <div class="before_title">
         <?php echo wp_kses($settings['title_small_heading'] , $allowed_tags) ?>
      </div>
      <?php endif; ?>
      <?php if(!empty($settings['title_heading'])):?>
        <div class="title">  <?php echo wp_kses($settings['title_heading'] , $allowed_tags) ?></div>
      <?php endif; ?>
      <?php if(!empty($settings['description'])):?>
      <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
      <?php endif; ?>
   </div>
   <?php // title one end   ?>
   <?php elseif($settings['title_styles'] == 'style_five'):?>
   <?php // title one end   ?>
   <div class="title_sections five <?php echo esc_attr($settings['title_alignments']); ?>">
      <?php if(!empty($settings['title_small_heading'])):?>
      <div class="before_title">
         <?php echo wp_kses($settings['title_small_heading'] , $allowed_tags) ?>
      </div>
      <?php endif; ?>
      <?php if(!empty($settings['title_heading'])):?>
      <div class="title">  <?php echo wp_kses($settings['title_heading'] , $allowed_tags) ?></div>
      <?php endif; ?>
      <?php if(!empty($settings['description'])):?>
      <p>  <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p>
      <?php endif; ?>
   </div>
   <?php // title one end   ?>
   <?php endif; ?>         
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_title_v1());