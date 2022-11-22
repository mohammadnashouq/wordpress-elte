<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/* This file modifies the vc_column output to accomodate the otional URL parameter */

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode( 
   array(
	   'layout' => 'container', 
	   'layout_padding' => '' ,
	   'custom_margin' => '' ,
	   'custom_padding' => '' ,
	   'custom_border_width' => '' ,
	   'custom_border_style' => '' ,
	   'custom_border_color' => '' ,
	   'custom_background_color' => '' ,
	   'custom_background_image' => '' ,
	   'custom_background_repeat' => '' ,
	   'custom_background_position' => '' ,
	   'custom_background_size' => '' ,
	   'layout_border_width'  => '' ,
	   'layout_border_style'  => '' ,
	   'layout_border_color'  => '' ,
	   'layout_background_color'  => '' ,
	  ),
 ), $atts );
extract( $atts );



wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',

);

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
// variables 
$layout_padding = '';
$layout_padding_out = '';

$layout_border_width = '';
$layout_border_width_out = '';

$layout_border_style = '';
$layout_border_style_out = '';

$layout_border_color = '';
$layout_border_color_out = '';

$layout_background_color = '';
$layout_background_color_out = '';

$custom_margin = '';
$custom_margin_out = '';

$custom_padding = '';
$custom_padding_out = '';

$custom_border_width = '';
$custom_border_width_out = '';

$custom_border_style = '';
$custom_border_style = '';

$custom_border_color = '';
$custom_border_color_out = '';

$custom_background_color = '';
$custom_background_color_out = '';

$custom_background_image = '';
$custom_background_image_out = '';

$custom_background_repeat = '';
$custom_background_repeat_out = '';

$custom_background_position = '';
$custom_background_position_out = '';

$custom_background_size = '';
$custom_background_size_out = '';

$style_css = '';
// custom css
$custom_margin = $atts['custom_margin'];
$custom_margin_out    = ! empty( $custom_margin ) ? "margin: $custom_margin!important;" : '';

$custom_padding = $atts['custom_padding'];
$custom_padding_out    = ! empty( $custom_padding ) ? "padding: $custom_padding!important;" : '';

$custom_border_width = $atts['custom_border_width'];
$custom_border_width_out    = ! empty( $custom_border_width ) ? "border-width: $custom_border_width!important;" : '';
$custom_border_style = $atts['custom_border_style'];
$custom_border_style_out    = ! empty( $custom_border_style ) ? "border-style: $custom_border_style!important;" : '';
$custom_border_color = $atts['custom_border_color'];
$custom_border_color_out    = ! empty( $custom_border_color ) ? "border-color: $custom_border_color!important;" : '';

$custom_background_color = $atts['custom_background_color'];
$custom_background_color_out    = ! empty( $custom_background_color ) ? "background-color: $custom_background_color!important;" : '';
$custom_background_image = wp_get_attachment_image_src( intval( $atts['custom_background_image'] ), 'full' );
$custom_background_image_out           = $custom_background_image  ? "background-image: url($custom_background_image[0])!important;" : '';
$custom_background_repeat = $atts['custom_background_repeat'];
$custom_background_repeat_out    = ! empty( $custom_background_repeat ) ? "background-repeat: $custom_background_repeat!important;" : '';
$custom_background_position = $atts['custom_background_position'];
$custom_background_position_out    = ! empty( $custom_background_position ) ? "background-position: $custom_background_position!important;" : '';
$custom_background_size = $atts['custom_background_size'];
$custom_background_size_out    = ! empty( $custom_background_size ) ? "background-size: $custom_background_size!important;" : '';

$layout_padding = $atts['layout_padding'];
$layout_padding_out    = ! empty( $layout_padding ) ? "padding: $layout_padding!important;" : '';

$layout_border_width = $atts['layout_border_width'];
$layout_border_width_out    = ! empty( $layout_border_width ) ? "border-width: $layout_border_width!important;" : '';

$layout_border_style = $atts['layout_border_style'];
$layout_border_style_out    = ! empty( $layout_border_style ) ? "border-style: $layout_border_style!important;" : '';

$layout_border_color = $atts['layout_border_color'];
$layout_border_color_out    = ! empty( $layout_border_color ) ? "border-color: $layout_border_color!important;" : '';

$layout_background_color = $atts['layout_background_color'];
$layout_background_color_out    = ! empty( $layout_background_color ) ? "background-color: $layout_background_color!important;" : '';



$style_css  = "style='$custom_margin_out $custom_padding_out $custom_border_width_out $custom_border_style_out $custom_border_color_out $custom_background_size_out $custom_background_position_out  $custom_background_repeat_out $custom_background_color_out $custom_background_image_out'";
$style_two_css  = "style='$layout_padding_out $layout_border_width_out $layout_border_style_out $layout_border_color_out $layout_background_color_out'";

// custom css
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="vc_custom_r_s ' . esc_attr( trim( $css_class ) ) . ' '.esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ).'"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' '. $style_css .'>';
$output .= '<div class="'.$layout.'" '. $style_two_css .'>';
$output .= '<div class="vc_column-inner">';
if( !empty($column_link) ){
    $column_link_array = vc_build_link($column_link);
    $column_link = $column_link_array['url'];
    $output .= "<a href='$column_link' class='big_link' style='position:absolute;top:0;left:0;width:100%;height:100%;z-index:9999;'aria-hidden='true'></a>";
}
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo ! empty( $output ) ? $output : '';
