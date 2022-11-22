<?php
/**
 * Plugin Name: Creote Addons
 * Plugin URI: http://demo2.steelthemes.com/
 * Description: Extra Addons For Creote theme. It was built for Creote theme.
 * Version: 1.7
 * Author:  Steelthemes
 * Author URI: http://steelthemes.com
 * License: GPL2+
 * Text Domain: creote
 * Domain Path: /lang/
 */

if(!defined('ABSPATH')){
	die('-1');
}
if(!defined('CREOTE_ADDONS_DIR')){
	define('CREOTE_ADDONS_DIR', plugin_dir_path( __FILE__ ));
}
if(!defined('CREOTE_ADDONS_URL')){
	define('CREOTE_ADDONS_URL', plugin_dir_url( __FILE__ ));
}



final Class Creote_Addons{
  /**
  * Plugin Version
  *
  * @since 1.0.0
  *
  * @var string The plugin version.
  */
  const VERSION = '1.0.0';
  
  /**
  * Minimum Elementor Version
  *
  * @since 1.0.0
  *
  * @var string Minimum Elementor version required to run the plugin.
  */
  const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
  
  /**
  * Minimum PHP Version
  *
  * @since 1.0.0
  *
  * @var string Minimum PHP version required to run the plugin.
  */
  const MINIMUM_PHP_VERSION = '7.0';
  
  /**
  * Instance
  *
  * @since 1.0.0
  *
  * @access private
  * @static
  *
  * @var  Nfifty_elementor_extension The single instance of the class.
  */
  private static $_instance = null;
  
  /**
  * Instance
  *
  * Ensures only one instance of the class is loaded or can be loaded.
  *
  * @since 1.0.0
  *
  * @access public
  * @static
  *
  * @return  Nfifty_elementor_extension An instance of the class.
  */
  public static function instance() {
      if ( is_null( self::$_instance ) ) {
        self::$_instance = new self();
      }
      return self::$_instance;
  }
   
   
  /**
  * Constructor
  *
  * @since 1.0.0
  *
  * @access public
  */
  public function __construct() {
      add_action('init', [$this, 'i18n']);
      $this->creote_add_functions_extra_ajax();
      add_action('wp_enqueue_scripts', [$this,'creote_enqueue_scripts']);
        $this->creote_add_functions_extra();
 
      add_action('admin_enqueue_scripts', array($this,'creote_cat_meta_postbox_css'));

      
  }

  public function creote_add_functions_extra_ajax(){
    require_once CREOTE_ADDONS_DIR . '/inc/ajax-view-product.php';
  }




  /**
  * Load Textdomain
  *
  * Load plugin localization files.
  *
  * Fired by `init` action hook.
  *
  * @since 1.0.0
  *
  * @access public
  */
  public function i18n() {
    load_theme_textdomain( 'creote-addons', get_template_directory() . '/lang' );
  }
 
  /**
* Get All Elementor Widgets
*
* @return void
**/
public function creote_enqueue_scripts(){
  global $creote_theme_mod;
  /**
  * Register and enqueue styles
  **/ 
  $creotertlenable = '';
  if(!empty($creote_theme_mod['rtl_enable_all'])){
    $creotertlenable = $creote_theme_mod['rtl_enable_all'];
  }
  if($creotertlenable == true){
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.rtl.min.css', array() , '5.1.2', 'all');
  }
  elseif($creotertlenable == false){
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() , '5.1.2', 'all');
  }
  else{ 
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() , '5.1.2', 'all');   
  } 
  wp_enqueue_style('animate', CREOTE_ADDONS_URL . '/assets/css/animate.css', array() , '3.7.2', 'all');
  wp_enqueue_style('swiper-style', CREOTE_ADDONS_URL . '/assets/css/swiper.min.css', array() , '6.7.5', 'all');
  wp_enqueue_style('owl-style', CREOTE_ADDONS_URL . '/assets/css/owl.css', array() , '2.3.4', 'all');
  wp_enqueue_style('fancybox-style', CREOTE_ADDONS_URL . '/assets/css/jquery.fancybox.min.css', array() , '3.5.7', 'all');
  wp_enqueue_style('popupcss', CREOTE_ADDONS_URL . '/assets/css/popupcss.css', array() , '1.1.0', 'all');
 
  if(!empty($creote_theme_mod['aos_animation_stop']) == true){
    wp_enqueue_style('aos', CREOTE_ADDONS_URL . '/assets/css/aos.css', array() , '1.0.0', 'all');
  }
  wp_enqueue_style('icomoon-icons', get_template_directory_uri() . '/assets/css/icomoon.css', array() , '1.0.0', 'all');
  wp_enqueue_style('fontawesome-icons', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array() , '4.7.0', 'all');
  wp_enqueue_style('style', get_template_directory_uri().'/style.css' );  
  wp_enqueue_style('rtl-style', get_template_directory_uri() . '/assets/css/rtl.css', array() , '1.0', 'all');
  wp_enqueue_style('creote-theme', get_template_directory_uri().'/assets/css/scss/elements/theme-css.css' );
  wp_enqueue_style('creote-mobile-header', get_template_directory_uri().'/assets/css/scss/elements/mobile.css' ); 
  wp_add_inline_style('creote-theme', creote_customize_css());
  wp_add_inline_style('creote-theme', creote_typogrophy_css());
  if(!empty($creote_theme_mod['color_scheme_option']) == true){
    wp_enqueue_style('creote-color-switcher', get_template_directory_uri().'/assets/css/scss/elements/color-switcher/color.css');   
  }
  if(is_singular() && comments_open() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
  }
  // js
  wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery') , '5.1.2', true);
  wp_enqueue_script('TweenMax', CREOTE_ADDONS_URL . '/assets/js/TweenMax.min.js', array('jquery') , '1.18.0', true);
  wp_enqueue_script('fancybox', CREOTE_ADDONS_URL . '/assets/js/jquery.fancybox.js', array('jquery') , '3.5.7', true);
 
  wp_enqueue_script('popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array('jquery') , '3.5.7', true);
 
  wp_enqueue_script('owl-carousel', CREOTE_ADDONS_URL . '/assets/js/owl.js', array('jquery') , '2.3.4', true);
  wp_enqueue_script('swiper', CREOTE_ADDONS_URL . '/assets/js/swiper.min.js', array('jquery') , '6.7.5', true);
  wp_enqueue_script('isotope', CREOTE_ADDONS_URL . '/assets/js/isotope.min.js', array('jquery') , '3.0.6', true);
  wp_enqueue_script('countdown', CREOTE_ADDONS_URL . '/assets/js/countdown.js', array('jquery') , '0.1.0', true);
  wp_enqueue_script('simpleParallax', CREOTE_ADDONS_URL . '/assets/js/simpleParallax.min.js', array('jquery') , '5.2.0', true);
  wp_enqueue_script('appear', CREOTE_ADDONS_URL . '/assets/js/appear.js', array('jquery') , '1.0', true);
  wp_enqueue_script('counter', CREOTE_ADDONS_URL . '/assets/js/jquery.countTo.js', array('jquery') , '1.0', true);
  wp_enqueue_script('sharer', CREOTE_ADDONS_URL . '/assets/js/sharer.js', array('jquery') , '0.4.0', true);
  wp_enqueue_script('hc-sticky', CREOTE_ADDONS_URL . '/assets/js/hc-sticky.js', array('jquery') , '2.2.7', true);
  if(!empty($creote_theme_mod['color_scheme_option']) == true){
    wp_enqueue_script('color-switcher', CREOTE_ADDONS_URL . '/assets/js/jQuery.style.switcher.min.js', array('jquery') , '1.0.0', true);
    wp_enqueue_script('color-switcher-active', CREOTE_ADDONS_URL . '/assets/js/color-scheme.js', array('jquery') , '1.0.0', true);
  }
  if(!empty($creote_theme_mod['aos_animation_stop']) == true){
    wp_enqueue_script('aos-animate', CREOTE_ADDONS_URL . '/assets/js/aos.js', array('jquery') , '1.0.0', true);
    wp_enqueue_script('creote-aos-active', CREOTE_ADDONS_URL . '/assets/js/aos-active.js', array('jquery') , '1.0.0', true);
  }
  wp_enqueue_script( 'creote_quick_view', get_template_directory_uri() . '/assets/js/shop.js',array('jquery'),'1.0', true);
  wp_localize_script( 'creote_quick_view', 'CreoteAjax', array(
    'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
  ));
  wp_enqueue_script('creote-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery') , '1.0.0', true);
  wp_enqueue_script('creote-sticky-desktop', CREOTE_ADDONS_URL . '/assets/js/sticky-header-desktop.js', array('jquery') , '1.0.0', true);
  wp_enqueue_script('creote-sticky-mobile', CREOTE_ADDONS_URL . '/assets/js/sticky-header-mobile.js', array('jquery') , '1.0.0', true);
  wp_enqueue_script('creote-core-script', CREOTE_ADDONS_URL . '/assets/js/creote-elemetor-extension.js', array('jquery'), time(), true);

  wp_enqueue_script('creote-add-to-cart', CREOTE_ADDONS_URL . '/assets/js/add-to-cart-ajax.js', array('jquery'), time(), true);
  wp_enqueue_script('creote-add-to-cart-single', CREOTE_ADDONS_URL . '/assets/js/add-to-cart-ajax-single.js', array('jquery'), time(), true);
 
 

 
}
/**
* Get All the wanted files
*
* @return void
**/
public function creote_add_functions_extra(){
  if(!class_exists('Redux')) {
    require_once CREOTE_ADDONS_DIR . 'redux-framework/redux-framework.php';
  }
  if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
  }
     
  // Make theme available for translation.
  load_theme_textdomain( 'creote', get_template_directory() . '/lang' );
  require_once CREOTE_ADDONS_DIR . '/inc/plugins/plugins.php';
  require_once CREOTE_ADDONS_DIR . '/inc/widgets/widgets.php';
  require_once CREOTE_ADDONS_DIR . '/inc/functions/function.php';
  

 


  //require_once CREOTE_ADDONS_DIR . '/inc/theme-panel/theme-panel.php';
  add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style('creote-widgets-icon', get_template_directory_uri() . '/assets/css/icomoon.css', array() , '1.0.0', 'all');
    wp_enqueue_style('creote-widgets-icon-two', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', false); 
  });
  // Elementor
  require_once CREOTE_ADDONS_DIR . '/inc/elementor-code.php';
  // vc composer not in folder 
  if(is_plugin_active('js_composer/js_composer.php')){
  require_once CREOTE_ADDONS_DIR . '/inc/shortcode.php';
  }
}
  
/*
=============================================================
creote rende content Mega Menu
=============================================================
*/
 

public function creote_cat_meta_postbox_css(){
  wp_enqueue_style('meta-box-css', get_template_directory_uri().'/assets/css/metabox.css' );    
}
 
  
  
}
Creote_Addons::instance();
  












 

