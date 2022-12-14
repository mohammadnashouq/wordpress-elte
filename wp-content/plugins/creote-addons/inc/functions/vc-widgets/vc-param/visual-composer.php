<?php

add_action( 'vc_before_init', 'vc_add_customopton' );
function vc_add_customopton() {
$attributes = array(

	array(
			'type' => 'textfield',
			'heading' => esc_html__('Margin', 'creote-addons') ,
			'param_name' => 'custom_margin',
			'value' => esc_html__('0px 0px 0px 0px', 'creote-addons') ,
			'group' => esc_html__('Design Options', 'creote-addons') ,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Padding', 'creote-addons') ,
		'param_name' => 'custom_padding',
		'value' => esc_html__('0px 0px 0px 0px', 'creote-addons') ,
		'group' => esc_html__('Design Options', 'creote-addons') ,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Padding', 'creote-addons') ,
		'param_name' => 'custom_padding',
		'value' => esc_html__('0px 0px 0px 0px', 'creote-addons') ,
		'group' => esc_html__('Design Options', 'creote-addons') ,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Border Width', 'creote-addons') ,
		'param_name' => 'custom_border_width',
		'value' => esc_html__('0px', 'creote-addons') ,
		'group' => esc_html__('Design Options', 'creote-addons') ,
	),
	array(
		"type" => "dropdown",
		'group' => esc_html__('Design Options', 'creote-addons') ,
		"heading" => "Border Style",
		"param_name" => "custom_border_style",
		"value" => array(
			'Select Border Style'  => "solid",
			"Solid" => "solid",
			"Dotted" => "dotted",
			"Dashed" => "dashed",
			"None" => "none",
			"Hidden" => "hidden",
			"Double" => "double",
			"Groove" => "groove",
			"Ridge" => "ridge",
			"Inset" => "inset",
			"Outset" => "outset",
			"Initial" => "initial",
			"Inherit" => "inherit" 
		) ,
	),
	array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Border Color', 'creote-addons') ,
        'param_name' => 'custom_border_color',
        'value' => '',
        'group' => esc_html__('Design Options', 'creote-addons') ,
    ),

	array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Background Color', 'creote-addons') ,
        'param_name' => 'custom_background_color',
        'value' => '',
        'group' => esc_html__('Design Options', 'creote-addons') ,
    ),

	array(
        'type' => 'attach_image',
        'heading' => esc_html__('Background Image', 'creote-addons') ,
        'param_name' => 'custom_background_image',
		'group' => esc_html__('Design Options', 'creote-addons') ,
    ),

	array(
		"type" => "dropdown",
		'group' => esc_html__('Design Options', 'creote-addons') ,
		"heading" => "Background Repeat",
		"param_name" => "custom_background_repeat",
		"value" => array(
			'Select  Option'  => "",
			"Repeat" => "repeat",
			"No Repeat" => "no-repeat",
			"Repeat X" => "repeat-x",
			"Repeat Y" => "repeat-y",
			"Inherit" => "inherit", 
		) ,
	),
	array(
		"type" => "dropdown",
		'group' => esc_html__('Design Options', 'creote-addons') ,
		"heading" => "Background Position",
		"param_name" => "custom_background_position",
		"value" => array(
			'Select  Option'  => "",
			"Center" => "center",
			"Left" => "left",
			"Right" => "right",
			"top" => "top",
			"bottom" => "bottom", 
		) ,
	),
	array(
		"type" => "dropdown",
		"group" => "Design Options",
		"heading" => "Background Size",
		"param_name" => "custom_background_size",
		"value" => array(
			'Select  Option'  => "",
			"Contain" => "contain",
			"Cover" => "cover",
			"Auto" => "auto",
		) ,
	),

	array(
		"type" => "dropdown",
		'group' => esc_html__('Custom Layout Options', 'creote-addons') ,
		"heading" => "Contnet Spacing",
		"param_name" => "layout",
		"value" => array(
			"In Container" => "auto_container",
			"Full Width Content" => "container-fluid"
		) ,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Layout Padding', 'creote-addons') ,
		'param_name' => 'layout_padding',
		'value' => esc_html__('0px 0px 0px 0px', 'creote-addons') ,
		'group' => esc_html__('Custom Layout Options', 'creote-addons') ,
	),

	array(
		'type' => 'textfield',
		'heading' => esc_html__('Layout Border Width', 'creote-addons') ,
		'param_name' => 'layout_border_width',
		'value' => esc_html__('0px', 'creote-addons') ,
		'group' => esc_html__('Custom Layout Options', 'creote-addons') ,
	),
	array(
		"type" => "dropdown",
		'group' => esc_html__('Custom Layout Options', 'creote-addons') ,
		"heading" => "Border Style",
		"param_name" => "layout_border_style",
		"value" => array(
			'Select Border Style'  => "solid",
			"Solid" => "solid",
			"Dotted" => "dotted",
			"Dashed" => "dashed",
			"None" => "none",
			"Hidden" => "hidden",
			"Double" => "double",
			"Groove" => "groove",
			"Ridge" => "ridge",
			"Inset" => "inset",
			"Outset" => "outset",
			"Initial" => "initial",
			"Inherit" => "inherit" 
		) ,
	),
	array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Layout Border Color', 'creote-addons') ,
        'param_name' => 'layout_border_color',
        'value' => '',
        'group' => esc_html__('Custom Layout Options', 'creote-addons') ,
    ),

	array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Layout Background Color', 'creote-addons') ,
        'param_name' => 'layout_background_color',
        'value' => '',
        'group' => esc_html__('Custom Layout Options', 'creote-addons') ,
    ),
  
  );
  vc_add_params( 'vc_row', $attributes );
}
