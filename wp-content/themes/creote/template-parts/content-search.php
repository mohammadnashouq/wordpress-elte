<?php
/**
* Search Content
* @package creote wordpress theme
**/
/* grab the animation effects */ 
 global $creote_theme_mod;
$animation = '';
if(!empty($creote_theme_mod['aos_animation_stop']) == true){
    $animation = 'data-aos=fade-up data-aos-delay=0';
}
$myexcerpt = wp_trim_words(get_the_excerpt('15'));  
$mycontent = wp_trim_words(get_the_content('15')); 
?>
<div class="col-xs-12">
<div class="news_box default_style list_view clearfix <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>" <?php echo esc_attr($animation); ?>>
<?php if(has_post_thumbnail()): ?>
    <div class="image img_hover-1">
    <?php the_post_thumbnail('creote-grid-1170-520'); ?>
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
            <p><?php echo esc_html($myexcerpt); ?></p>
            <?php }elseif(!empty($mycontent)){ ?>
            <p><?php  echo esc_html($mycontent); ?></p>
            <?php } ?>
    <a href="<?php echo esc_url(get_permalink()); ?>" class="link__go"><?php echo esc_html__('Read more' , 'creote');?></a>
    </div>
 
    <div class="auhtour_box">
    <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?>
    <div class="contnet_a">
      <p><?php echo esc_html__('POSTED BY' , 'creote'); ?></p>
      <h4>
       <?php the_author(); ?>
     </h4>
    </div>
    </div>
    </div>
</div>
</div>
          