<?php
/**
 * Register required, recommended plugins for theme
 *
 * @package Creote wordpress theme
 */

/**
 * Register required plugins
 *
 * @since  1.0
 */
function creote_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => esc_html__('Elementor', 'creote') ,
            'slug' => 'elementor',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,
        array(
            'name' => esc_html__('Wp Bakery', 'creote') ,
            'slug' => 'js_composer',
            'source'  => get_template_directory() . '/includes/plugins/js_composer.zip',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,

        array(
            'name' => esc_html__('Creote Addons', 'creote') ,
            'slug' => 'creote-addons',
            'source'  => get_template_directory() . '/includes/plugins/creote-addons.zip',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,
 
        array(
            'name' => esc_html__('Contact Form 7', 'creote') ,
            'slug' => 'contact-form-7',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,

        
       
        array(
            'name' => esc_html__('MailChimp for WordPress', 'creote') ,
            'slug' => 'mailchimp-for-wp',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,

        array(
            'name' => esc_html__('Meta Box', 'creote') ,
            'slug' => 'meta-box',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,
        
        array(
			'name' => esc_html__('Woocommerce', 'creote'),
			'slug' => 'woocommerce',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
		),
        array(
			'name' => esc_html__('YITH WooCommerce Compare', 'creote'),
			'slug' => 'yith-woocommerce-compare',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
		),
        array(
			'name' => esc_html__('YITH WooCommerce Wishlist', 'creote'),
            'slug'   => 'yith-woocommerce-wishlist',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
		),
        array(
			'name' => esc_html__('One Click Demo Import', 'creote'),
            'slug'   => 'one-click-demo-import',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
		),
        array(
			'name' => esc_html__('WP Job Manager', 'creote'),
            'slug'   => 'wp-job-manager',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
		),
        array(
            'name' => esc_html__('Revslider', 'creote') ,
            'slug' => 'revslider',
            'source'  => get_template_directory() . '/includes/plugins/revslider.zip',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ) ,

     
    );
    $config = array(
        'domain' => 'creote',
        'default_path' => '',
        'menu' => 'install-required-plugins',
        'has_notices' => true,
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'creote') ,
            'menu_title' => esc_html__('Install Plugins', 'creote') ,
            'installing' => esc_html__('Installing Plugin: %s', 'creote') ,
            'oops' => esc_html__('Something went wrong with the plugin API.', 'creote') ,
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'creote') ,
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'creote') ,
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'creote') ,
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'creote') ,
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'creote') ,
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'creote') ,
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'creote') ,
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'creote') ,
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'creote') ,
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'creote') ,
            'return' => esc_html__('Return to Required Plugins Installer', 'creote') ,
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'creote') ,
            'complete' => esc_html__('All plugins installed and activated successfully. %s', 'creote') ,
            'nag_type' => 'updated'
        )
    );

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'creote_register_required_plugins');