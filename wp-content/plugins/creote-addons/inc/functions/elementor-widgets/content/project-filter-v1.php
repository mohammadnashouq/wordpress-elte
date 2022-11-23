<?php
   namespace Elementor;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Widget_creote_project_filter_v1 extends Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-project-filter-v1';
       }
   
       public function get_title()
       {
           return __('Projetc Filter   V1' , 'creote-addons');
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
               'project_settings',
               [
                   'label' => __('Project Settings', 'creote-addons')
               ]
           );
   
           $this->add_control(
               'project_filter_style',
               [
                   'label' => __('Project style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one'   => esc_html__( 'Project Style One', 'creote-addons' ),
                       'style_two' => esc_html__( 'Project Style Two', 'creote-addons' ),
                       'style_three' => esc_html__( 'Project Style Three', 'creote-addons' ),
                       'style_four' => esc_html__( 'Project Style Four', 'creote-addons' ),
                       'style_five' => esc_html__( 'Project Style Five', 'creote-addons' ),
                       'style_six' => esc_html__( 'Project Style Six', 'creote-addons' ),
                       'style_eight' => esc_html__( 'Project Style Seven', 'creote-addons' ),
                       
                   ],
                   'default' => 'style_one',
               ]
           );
   
           $this->add_control(
               'project_column',
               [
                 'label' => __('Project Column', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'col-lg-3 col-md-6 col-sm-6 col-xs-12' => __( 'Four Column', 'creote-addons' ),
                   'col-lg-4 col-md-6 col-sm-6 col-xs-12' => __( 'Three Column', 'creote-addons' ),
                   'col-lg-6 col-md-6 col-sm-6 col-xs-12' => __( 'Two Column', 'creote-addons' ),
                   'col-lg-12 col-md-12 col-sm-12 col-xs-12' => __( 'One Column', 'creote-addons' ),
                   ],
                 'default' => __('col-lg-4 col-md-6 col-sm-6 col-xs-12' , 'creote-addons'),
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
   
           $repeater = new Repeater();
        
        
           $repeater->add_control(
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
          
           $repeater->add_control(
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
   		$repeater->add_control(
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
         
   		$repeater->add_control(
               'query_category', 
   				[
   				  'type' => Controls_Manager::SELECT,
   				  'label' => esc_html__('Category', 'creote-addons'),
   				  'options' => get_project_categories(),
   				]
           );
   
           $repeater->add_control(
               'filtertitle',
               [
                   'label'       => esc_html__( 'Filter Title', 'creote-addons' ),
                   'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Planting' , 'creote-addons'),
               ]
           );
   
           $this->add_control(
               'project_filter_repeater',
               [
                   'label' => __( 'Project Repeater', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'post_count' => __( '1', 'creote-addons' ),
                           'query_orderby' => __( 'date', 'creote-addons' ),
                       ],
                      
                   ],
                   'title_field' => '{{{filtertitle}}}',
               ]
           );
   
       
           
   
           $this->add_control(
               'stylefilter',
               [
                   'label' => __('Filter style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'dark'   => esc_html__( 'Dark', 'creote-addons' ),
                       'light' => esc_html__( 'Light', 'creote-addons' ),
                   ],
                   'default' => 'dark',
               ]
           );
           
           $this->add_control(
               'filter_enable',
               [
                 'label' => __( 'Filter Enable / Disable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
           $this->add_control(
               'alignment',
               [
                   'label' => __('Filter Alignment', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'inherit'   => esc_html__( 'Inherit', 'creote-addons' ),
                       'left' => esc_html__( 'Left', 'creote-addons' ),
                       'right' => esc_html__( 'Right', 'creote-addons' ),
                       'center' => esc_html__( 'Center', 'creote-addons' ),
                   ],
                   'default' => 'center',
               ]
           );
   
             $this->add_control(
             'tag_enable',
             [
               'label' => __( 'Offer Enable', 'creote-addons' ),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __( 'Show', 'creote-addons' ),
               'label_off' => __( 'Hide', 'creote-addons' ),
               'return_value' => 'yes',
               'default' => 'yes',
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
    
           
   
             $this->end_controls_section();
   
   
       }
   
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $alignment  = $settings['alignment'];
           $alignment    = ! empty( $alignment ) ? "text-align:$alignment!important;" : '';
           $alignmentcss  = "style='$alignment'";
    
   $project_cat = $settings['project_filter_repeater'];
   ?>
<section  class="project_all filt_<?php echo esc_attr($settings['project_filter_style']); ?> <?php if($settings['filter_enable'] == 'yes'): ?> filter_enabled    <?php endif; ?>">
   <?php if($settings['filter_enable'] == 'yes'): ?>
   <div class="row">
      <div class="col-lg-12">
         <div class="fliter_group" <?php echo __($alignmentcss); ?> >
            <ul class="project_filter <?php echo esc_attr($settings['stylefilter']); ?> clearfix" >
               <li data-filter="*" class="current"><?php echo esc_html__('View All' , 'creote-addons'); ?></li>
               <?php if (!empty( $project_cat )) {
                  foreach ($project_cat as $key => $value) { ?>
               <li  data-filter=".project_category-<?php echo esc_attr($value['query_category']);?>"><?php echo esc_attr($value['filtertitle']); ?></li>
               <?php }} ?>
            </ul>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <div class="project_container  clearfix ">
      <div class="row clearfix">
         <?php if ( ! empty( $project_cat ) ) {
            foreach ( $project_cat as $key => $value ) {
            
             $query_args = array(
                'post_type' => 'project',
                'ignore_sticky_posts' => true,
                'orderby' => 'date',
                'posts_per_page' => $value['post_count'],
                'orderby'        => $value['query_orderby'],
                'order'          =>  $value['query_order'],
                );
            
                
                if($value['query_category'] ) $query_args['project_category'] = $value['query_category'];     
            $project_query = new \WP_Query( $query_args );
            
            if ($project_query->have_posts()) {
            while ($project_query->have_posts()) : $project_query->the_post(); 
            $term_list = wp_get_post_terms(get_the_id(), 'project_category', array("fields" => "names"));
            $project_meta_date =  get_post_meta( get_the_ID(), 'date_id', true );
            $project_meta_client =  get_post_meta( get_the_ID(), 'client_id', true );
            $project_information_enable =  get_post_meta( get_the_ID(), 'project_information_enable', true );
            $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']);  
       
            ?>
         <?php 
            if ( $settings['project_filter_style'] == 'style_one' ): ?>
         <div class="project-wrapper grid-item  <?php echo esc_attr($settings['project_column']); ?>    project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_box style_two">
               <div class="entry-thumbnail image">
                  <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?>
                  <div class="overlay">
                     <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
                     <span class="fa fa-search icon"></span>
                     </a>
                  </div>
               </div>
               <div class="content_inner">
                  <h2><a href="<?php echo esc_url( get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>
                  <div class="meta_value"> 
                     <a href="#"><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></a>
                  </div>
               </div>
            </div>
         </div>
         <?php  elseif($settings['project_filter_style'] == 'style_two'):?>
         <div class="project-wrapper grid-item    <?php echo esc_attr($settings['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_box style_three clearfix">
               <div class="content_inner">
                  <div><a href="#"><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></a></div>
                  <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
                  <?php if(!empty($myexcerpt)):?>
                  <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                  <?php endif; ?>
                  <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="read_more"><?php echo esc_html__($settings['read_more']); ?> <span class="icon-right-arrow-long"></a>
                  <div class="share_me">
                     <?php creote_share_options_one(); ?>
                  </div>
               </div>
               <div class="image">
                  <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?>
                  <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="pro-link"></a>
                  <div class="overlay"> </div>
                  <?php if($project_information_enable == true): ?>
                  <div class="text">
                     <ul>
                        <?php if(!empty($project_meta_date)): ?>
                        <li><?php echo esc_html('Date :' , 'creote-addons'); ?> <span><?php echo wp_kses($project_meta_date , $allowed_tags); ?></span></li>
                        <?php endif; ?>
                        <?php if(!empty($project_meta_client)): ?>
                        <li><?php echo esc_html('Client :' , 'creote-addons'); ?><span><?php echo wp_kses($project_meta_client , $allowed_tags); ?></span></li>
                        <?php endif; ?>
                     </ul>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <?php elseif($settings['project_filter_style'] == 'style_three' ):?>
         <div class="project-wrapper grid-item   <?php echo esc_attr($settings['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_post style_one">
               <?php if ( has_post_thumbnail() ): ?>
               <div class="image">
                  <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
               </div>
               <?php endif;?>   
               <div class="project_caro_content">
                  <div class="left_side">
                     <p><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></p>
                     <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                  </div>
                  <div class="right_side">
                     <a href="<?php echo esc_url(get_permalink()); ?>"><i class="icon-right-arrow"></i></a>
                     <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <?php elseif($settings['project_filter_style'] == 'style_four' ):?>
         <div class="project-wrapper grid-item   <?php echo esc_attr($settings['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_post style_one style_four">
               <?php if(has_post_thumbnail()): ?>
               <div class="image">
                  <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
               </div>
               <?php endif;?>   
               <div class="project_caro_content">
                  <div class="left_side">
                     <p><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></p>
                     <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                  </div>
               </div>
            </div>
         </div>
         <?php elseif($settings['project_filter_style'] == 'style_five' ):?>
         <div class="project-wrapper grid-item   <?php echo esc_attr($settings['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_post style_one style_five">
               <?php if(has_post_thumbnail()): ?>
               <div class="image">
                  <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                  <div class="project_caro_content">
                     <div class="left_side">
                        <p><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></p>
                        <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                     </div>
                  </div>
               </div>
               <?php endif;?>   
            </div>
         </div>
         <?php elseif($settings['project_filter_style'] == 'style_six' ):?>
         <div class="project-wrapper grid-item   <?php echo esc_attr($settings['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_post  style_six">
               <?php if(has_post_thumbnail()): ?>
               <div class="image_box ">
                  <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                  <div class="overlay ">
                     <div class="content_box ">
                        <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                        <p><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></p>
                     </div>
                  </div>
               </div>
               <?php endif;?>  
               <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
               <span class="icon-add zoom_icon"></span>
               </a>
            </div>
         </div>
         <?php elseif($settings['project_filter_style'] == 'style_eight' ):?>
         <div class="project-wrapper grid-item   <?php echo esc_attr($settings['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
            <div class="project_post style_eight">
               <div class="inner_box">
                  <?php if(has_post_thumbnail()): ?>
                  <div class="image_box ">
                     <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                     <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
                     <span class="icon-plus zoom_icon"></span>
                     </a>
                  </div>
                  <?php endif;?>  
                  <div class="content_box ">
                     <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                     <p><?php echo esc_attr_e($value['query_category'] , 'creote-addons');?></p>
                     <a href="<?php echo esc_url(get_permalink()); ?>" class="arrow_btn "><span class="icon-right-arrow-long"></span></a>
                  </div>
               </div>
            </div>
         </div>
         <?php endif;
            endwhile;}}} ?>
      </div>
   </div>
</section>
<?php
wp_reset_postdata();
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_project_filter_v1());