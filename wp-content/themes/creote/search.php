<?php
/*
 *=================================
 * The Search template file .
 * @package Creote WordPress Theme
 *==================================
*/
get_header(); ?>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) { ?>
<div id="primary" class="content-area blog_masonry    <?php creote_column_for_blog(); ?>">
<main id="main" class="site-main" role="main">
		<?php if(have_posts()) : ?>
			<?php /* Start the Loop */ ?>
			<?php while( have_posts()) : the_post(); ?>
				<?php
				/**
				 * Run the loop for the search to output the results.
				 * ifyou want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part('template-parts/content', 'search');
				?>
			<?php endwhile; ?>
			<?php creote_numeric_posts_nav(); ?>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php } ?>
<?php get_footer(); ?>