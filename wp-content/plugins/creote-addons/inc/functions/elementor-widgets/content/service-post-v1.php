<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_service_post_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-service-post-v1';
       }
   
       public function get_title()
       {
           return __('Service Post V1' , 'creote-addons');
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
               'service_post_content',
               [
                   'label' => __('Service Content', 'creote-addons')
               ]
           );
   
           $this->add_control(
           'service_styles',
           [
             'label' => __('Service Styles', 'creote-addons'),
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
               'service_column',
               [
                 'label' => __('Service Column', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'four_column' => __( 'Four Column', 'creote-addons' ),
                   'three_column' => __( 'Three Column', 'creote-addons' ),
                   'two_column' => __( 'Two Column', 'creote-addons' ),
                   'one_column' => __( 'One Column', 'creote-addons' ),
                   ],
                 'default' => __('three_column' , 'creote-addons'),
                 ]
           );
    
        
       $this->add_control(
           'post_count',
           [
               'label' => __('Post Count', 'creote-addons'),
               'type'    => Controls_Manager::NUMBER,
               'default' => 3,
               'min'     => 1,
               'max'     => 100,
               'step'    => 1,
           ]
       );
       $this->add_control(
           'text_limit',
           [
               'label'   => esc_html__( 'Text Limit', 'creote-addons' ),
               'type'    => Controls_Manager::NUMBER,
               'default' => 12,
               'min'     => 1,
               'max'     => 100,
               'step'    => 1,
           ]
       );
       $this->add_control(
           'query_orderby',
           [
               'label'   => esc_html__( 'Order By', 'creote-addons' ),
               'type'    => Controls_Manager::SELECT,
               'default' => 'date',
               'options' => array(
                   'date'       => esc_html__( 'Date', 'creote-addons' ),
                   'title'      => esc_html__( 'Title', 'creote-addons' ),
                   'menu_order' => esc_html__( 'Menu Order', 'creote-addons' ),
                   'rand'       => esc_html__( 'Random', 'creote-addons' ),
               ),
           ]
       );
       $this->add_control(
           'query_order',
           [
               'label'   => esc_html__( 'Order', 'creote-addons' ),
               'type'    => Controls_Manager::SELECT,
               'default' => 'DESC',
               'options' => array(
                   'DESc' => esc_html__( 'DESC', 'creote-addons' ),
                   'ASC'  => esc_html__( 'ASC', 'creote-addons' ),
               ),
           ]
       );
     
       $this->add_control(
           'query_category', 
               [
                 'type' => Controls_Manager::SELECT,
                 'label' => esc_html__('Category', 'creote-addons'),
                 'options' => get_service_categories(),
               ]
       );
    
       $this->add_control(
           'read_more',
           [
               'label'       => esc_html__( 'Read More Text', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'description' => esc_html__( 'Enter Text for button' , 'creote-addons' ),
               'default' =>  esc_html__( 'Read More' , 'creote-addons'),
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
       
       $this->add_control(
           'npagination_enable_dis',
           [
               'label' => __('Pagination Enable / Disable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
         );
         $this->add_responsive_control(
           'pagination_alignment',
           [
               'label' => __('Pagination alignments', 'creote-addons'),
               'type' => Controls_Manager::CHOOSE,
               'options' => [
                 'left' => [
                   'title' => __( 'Pagination Left', 'creote-addons' ),
                   'icon' => 'fa fa-align-left',
                 ],
                 'center' => [
                   'title' => __( 'Pagination Center', 'creote-addons' ),
                   'icon' => 'fa fa-align-center',
                 ],
                 'right' => [
                   'title' => __( 'Pagination Right', 'creote-addons' ),
                   'icon' => 'fa fa-align-right',
                 ],
               ],
               'default' => 'center',
               'toggle' => true,
               'selectors' => [
                 '{{WRAPPER}} .pagination ' => 'text-align: {{VALUE}}!important;',
               ],
               'condition' => [
                   'npagination_enable_dis' => 'yes'
              ],
           ]
       );
       
   
         $this->add_control(
           'trans',
           [
           'type' => Controls_Manager::DIVIDER,
          
           ]
         );
   
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
   
         $this->end_controls_section();
   
         
       }
   
       protected function render()
       {
           $settings = $this->get_settings_for_display();
   
           $allowed_tags = wp_kses_allowed_html('post');
   
    
           $image_size = 'creote-service-full-width';
           $css_classes = '';
    
             if($settings['service_column'] == 'one_column') {
               $image_size = 'creote-service-grid-1170-520';
               $css_classes = 'one_column news_wrapper_grid';
             }
             elseif( $settings['service_column'] == 'two_column'){
               $image_size = 'creote-service-grid-570-420';
               $css_classes = 'two_column news_wrapper_grid';
             } 
             elseif( $settings['service_column'] == 'three_column'){
               $image_size = 'creote-service-grid-470-280';
               $css_classes = 'three_column  news_wrapper_grid';
             }
             elseif($settings['service_column'] == 'four_column'){
               $image_size = 'creote-service-grid-270-180';
               $css_classes = 'four_column news_wrapper_grid';
             } else{
               $image_size = 'creote-service-full-width';
             }
   
   ?>
<section class="service_section grid_all <?php echo esc_attr($css_classes); ?> <?php echo esc_attr($settings['dark_white']); ?>">
   <div class="grid_show_case grid_layout clearfix">
      <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
         $args = array(
            'post_type' => 'service',
            'ignore_sticky_posts' => true,
            'orderby' => 'date',
            'paged'             => $paged,
            'posts_per_page' => $settings['post_count'],
             'orderby'        => $settings['query_orderby'],
             'order'          =>  $settings['query_order'],
          
         );
         if( $settings['query_category'] ) $args['service_category'] = $settings['query_category'];
         $service_query = new \WP_Query( $args ); ?>
      <?php while ($service_query->have_posts()) : ?>
      <?php $service_query->the_post();?>
      <?php   
         $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']);  
         $class_icon_in = 'icon_no';
         if((get_post_meta( get_the_ID(), 'service_icon', true )) || (get_post_meta(get_the_ID() , 'service_icon_image', true))):
             $class_icon_in = 'icon_yes';
         endif;
         $service_transition =  get_post_meta( get_the_ID(), 'transition_timing_service', true );
         $service_icon =  get_post_meta( get_the_ID(), 'service_icon', true );
         $service_icon_images =   rwmb_meta( 'service_icon_image', array( 'size' => 'thumbnail' ) );
         
         $cats = get_the_terms( get_the_ID(), 'service_category' );
         ?>
      <?php if($settings['service_styles'] == 'style_one'): ?>
      <div class="grid_box _card">
         <div class="service_post style_one " <?php if(!empty($settings['transitions_enable']) == true): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_attr($service_transition); ?>"  data-aos-offset="0" <?php endif; ?>>
            <?php if(has_post_thumbnail()): ?>
            <div class="image">
               <div class="overlay"></div>
               <?php the_post_thumbnail($image_size); ?>
            </div>
            <?php endif;?>   
            <div class="service_content <?php echo esc_attr($class_icon_in); ?>">
               <?php if(!empty($service_icon)): ?>
               <div class="icon_box">
                  <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
               </div>
               <?php  elseif(!empty($service_icon_images)):
                  foreach($service_icon_images as $service_icon_image ):?>
               <div class="icon_box">
                  <img src="<?php echo esc_url($service_icon_image['url']); ?>"> 
               </div>
               <?php  endforeach;
               endif; ?>
               <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
               <?php if(!empty($myexcerpt)){?>
               <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
               <?php } ?>
               <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>"> <?php echo esc_html__($settings['read_more']); ?><i class="icon-right-arrow-long"></i></a>
            </div>
         </div>
      </div>
      <?php elseif($settings['service_styles'] == 'style_two'): ?>
      <div class="grid_box _card">
         <div class="service_post style_two" <?php if(!empty($settings['transitions_enable']) == true): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_attr($service_transition); ?>"  data-aos-offset="0" <?php endif; ?>>
            <?php if(has_post_thumbnail()): ?>
            <div class="image">
               <div class="overlay"></div>
               <?php the_post_thumbnail($image_size); ?>
               <?php if(!empty($service_icon)): ?>
               <div class="icon_box">
                  <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
                  <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-angle-right"></i></a>
               </div>
               <?php  elseif(!empty($service_icon_images)):
                  foreach($service_icon_images as $service_icon_image ):?>
               <div class="icon_box">
                  <img src="<?php echo esc_url($service_icon_image['url']); ?>"> 
                  <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-angle-right"></i></a>
               </div>
               <?php  endforeach;
                  endif;
                   ?>
            </div>
            <?php endif;?>   
            <div class="service_content">
               <?php if(!empty($cats)): ?>
               <div class="catss">
                  <?php  foreach($cats as $cat): ?>
                  <a href="<?php esc_url(get_term_link($cat->slug, 'service_category')); ?>" class="cat"><?php echo esc_attr_e($cat->name); ?><span><?php echo esc_html__($settings['read_more']); ?><span></a> 
                  <?php endforeach; ?>
               </div>
               <?php endif; ?>
               <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
            </div>
         </div>
      </div>
      <?php elseif($settings['service_styles'] == 'style_three'): ?>
      <div class="grid_box _card">
         <div class="service_post style_three" <?php if(!empty($settings['transitions_enable']) == true): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_attr($service_transition); ?>"  data-aos-offset="0" <?php endif; ?>>
            <?php if(has_post_thumbnail()): ?>
            <div class="image_box">
               <?php the_post_thumbnail($image_size); ?>
            </div>
            <?php endif;?>  
            <div class="text_box">
               <div class="text_box_inner">
                  <?php if(!empty($service_icon)): ?>
                  <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
                  <?php  elseif(!empty($service_icon_images)):
                     foreach($service_icon_images as $service_icon_image ):?>
                  <img src="<?php echo esc_url($service_icon_image['url']); ?>" alt="icon_image" class="ic_img"> 
                  <?php  endforeach;
                     endif;
                      ?>
                  <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                  <?php if(!empty($myexcerpt)){?>
                  <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                  <?php }  ?>
                  <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>"> <?php echo esc_html__($settings['read_more']); ?><i class="icon-right-arrow-long"></i></a>
                  <?php if(!empty($service_icon)): ?>
                  <div class="bg_icon">
                     <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
                  </div>
                  <?php  elseif(!empty($service_icon_images)):
                     foreach($service_icon_images as $service_icon_image ):?>
                  <div class="bg_icon">
                     <img src="<?php echo esc_url($service_icon_image['url']); ?>" alt="icon_image" class="ic_img"> 
                  </div>
                  <?php  endforeach;
                     endif;
                      ?>
               </div>
            </div>
         </div>
      </div>
      <?php elseif($settings['service_styles'] == 'style_four'): ?>
      <div class="grid_box _card">
         <div class="service_post style_four" <?php if(!empty($settings['transitions_enable']) == true): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_attr($service_transition); ?>"  data-aos-offset="0" <?php endif; ?>>
            <?php if(has_post_thumbnail()): ?>
            <div class="image_box">
               <?php the_post_thumbnail($image_size); ?>
            </div>
            <?php endif;?>  
            <div class="content_in_box">
               <?php if(!empty($service_icon)): ?>
               <div class="icon_box">
                  <span class="<?php echo esc_attr($service_icon);  ?> icons"></span>
               </div>
               <span class="<?php echo esc_attr($service_icon);  ?> bg_im"></span>
               <?php  elseif(!empty($service_icon_images)):
                  foreach($service_icon_images as $service_icon_image ):?>
               <div class="icon_box">
                  <img src="<?php echo esc_url($service_icon_image['url']); ?>"> 
               </div>
               <img src="<?php echo esc_url($service_icon_image['url']); ?>" class="bg_im"> 
               <?php  endforeach;
                  endif;
                   ?>
               <div class="content_box ">
                  <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                  <?php if(!empty($myexcerpt)){?>
                  <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                  <?php }  ?>
                  <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>"> <?php echo esc_html__($settings['read_more']); ?><i class="icon-right-arrow-long"></i></a>
               </div>
            </div>
         </div>
      </div>
      <?php elseif($settings['service_styles'] == 'style_five'): ?>
      <div class="grid_box _card" <?php if(!empty($settings['transitions_enable']) == true): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_attr($service_transition); ?>"  data-aos-offset="0" <?php endif; ?>>
         <div class="service_post style_five">
            <?php if(has_post_thumbnail()): ?>
            <div class="image_box">
               <?php the_post_thumbnail($image_size); ?>
               <div class="gradient"></div>
            </div>
            <?php endif;?>  
            <div class="content_box">
               <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
               <?php if(!empty($myexcerpt)){?>
               <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
               <?php } ?>
               <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>"> <i class="icon-right-arrow-long"></i><?php echo esc_html__($settings['read_more']); ?></a>
            </div>
            <?php if(!empty($service_icon)): ?>
            <div class="icon_box">
               <span class="<?php echo esc_attr($service_icon);  ?> icons"></span>
            </div>
            <?php  elseif(!empty($service_icon_images)):
               foreach($service_icon_images as $service_icon_image ):?>
            <div class="icon_box">
               <img src="<?php echo esc_url($service_icon_image['url']); ?>"> 
            </div>
            <?php  endforeach; endif; ?>
         </div>
      </div>
      <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
   </div>
   <?php if($settings['npagination_enable_dis'] == 'yes'):?>
   <div class="row">
      <div class="col-lg-12">
         <div class="pagination service">
            <?php
               $pagination = 999999999;
               echo paginate_links( array(
                    'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $service_query->max_num_pages,
                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                    'next_text' => '<i class="fa fa-angle-right"></i>',
                    'type'=>'list', 
                    'add_args' => false
               ) );
               ?>          
         </div>
      </div>
   </div>
   <?php endif; ?>  
</section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_service_post_v1());