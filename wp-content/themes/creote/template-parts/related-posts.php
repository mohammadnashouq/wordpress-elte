<?php
/**
* The Related Posts .
* @package creote Wordpress Theme
**/  
function creote_related_posts() {
     global $creote_theme_mod;
       $post_id = get_the_ID();
       $cat_ids = array();
       $categories = get_the_category( $post_id );
       if(!empty($categories) && is_wp_error($categories)):
           foreach ($categories as $category):
               array_push($cat_ids, $category->term_id);
           endforeach;
       endif;
       $relate_post = '';
       if(!empty($creote_theme_mod['related_post_count'])){
         $relate_post = $creote_theme_mod['related_post_count'];
       }
       else{
         $relate_post = '3';
       }
       $current_post_type = get_post_type($post_id);
       $query_args = array( 
           'category__in'   => $cat_ids,
           'post_type'      => $current_post_type,
           'post_not_in'    => array($post_id),
           'posts_per_page'  => $relate_post
        );


        

        
         $related_post_query = new WP_Query( $query_args ); 
   ?>
<section class="related_post blog_slider">
   <div class="swip__stories">
      <div class="title_sections_inner">
         <h2><?php if(!empty($creote_theme_mod['related_post_title'])){ echo esc_html($creote_theme_mod['related_post_title']);} else{echo esc_html__('Related Posts' , 'creote'); } ?></h2>
      </div>
      <!-- Swiper -->
      <div class="swiper-container  <?php  if(!empty($creote_theme_mod['related_carousel_items'])): echo esc_attr($creote_theme_mod['related_carousel_items']); else: echo esc_html('related_posts_swiper_two' , 'creote'); endif;?> ">
         <div class="swiper-wrapper">
            <?php if($related_post_query->have_posts()):
               while($related_post_query->have_posts()): $related_post_query->the_post(); 
               
               $myexcerpt = wp_trim_words(get_the_excerpt(), 15);  
               $mycontent = wp_trim_words(get_the_content(), 15); 

               ?>
            <div class="swiper-slide">
               <div class="news_box default_style list_view normal_view clearfix <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>">
                  <?php if(has_post_thumbnail()): ?>
                  <div class="image img_hover-1">
                     <?php the_post_thumbnail(); ?>
                     <?php creote_category(); ?>
                  </div>
                  <?php endif;?>    
                  <div class="content_box">
                     <div class="date">
                        <span class="date_in_number"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                     </div>
                     <div class="source">
                        <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                        <?php if(!empty($myexcerpt)){?>
                  <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                  <?php }elseif(!empty($mycontent)){ ?>
                  <p class="short_desc"><?php echo  esc_html($mycontent); ?></p>
                  <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php endwhile;
               // Restore original Post Data
               wp_reset_postdata();
               endif;
               ?>
         </div>
      </div>
      <div class="arrow_related">
         <div class="related-button-prev">
            <i class="fa fa-angle-left"></i>
         </div>
         <div class="related-button-next">
            <i class="fa fa-angle-right"></i>
         </div>
      </div>
   </div>
</section>
<!-- End. section__stories -->
<?php
}