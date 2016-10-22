<?php
/*
 * TODO:	
 * check sanitizing checkbox for value with white space, having conflict with white space.
 * live preview for image.			
 */

/**
 * ----------------------------------------------------------------------
 * IMAGES
 */
define('HEALTHYREHAB_BANNER_IMAGE_DEFAULT', esc_url_raw (get_template_directory_uri() .'/img/default-image/banner-background.png') );

define('HEALTHYREHAB_TESTIMONIAL_IMAGE_DEFAULT', esc_url_raw (get_template_directory_uri() .'/img/default-image/testimonial-background.jpg') ); /*TODO : change default background for testimonial panel*/



/* Table of contents
 * 1.0.0 Banner customizer
 * 1.0.1 panel
 * 1.0.2 section
 * 1.0.3 setting
 * 1.0.4 control
 * 1.1.0 Banner customizer fallback
 * 1.1.1 section
 * 1.1.2 setting
 * 1.1.3 control
 *
 * 2.0.0 Services customizer
 */


function medicalrehab_customize_register($wp_customize) {
	
	
/*===========================
	1.0.0 Banner Customizer
===========================*/ 

	$wp_customize->add_section("banner_img_section", array(
		"title" => __("Banner Image", "medical-rehab"),
		"priority" => 20,
		"description" => "Frontpage Banner Image setting",
		"active_callback" => "is_front_page",
		"panel" => "banner_panel"
	));

	$wp_customize->add_setting( 'banner_img_setting', array(
		'default' => (get_template_directory_uri() .'/img/default-image/banner-background.png'),   
		'sanitize_callback' => 'absint',
	) );


	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control( 
			$wp_customize, 
			'banner_img_control', 
			array(
				'label' => __( 'Upload Banner Image', 'medical-rehab' ),
				'description' => __( 'Background image for banner', 'medical-rehab'),
				'section' => 'banner_img_section',
				'settings' => 'banner_img_setting',
				'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
				'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
				'width'       => 1900,
				'height'      => 490, 
			) 
		) 
	);	

	
if ( class_exists( 'WP_Customize_Panel' ) ):
	/* 1.0.1 panel */
	$wp_customize->add_panel( 'banner_panel', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __("Banner", 'medical-rehab'),
		'description'    => '',
	) );
	
	/* 1.0.2 section */
	$wp_customize->add_section("banner_content_section", array(
		"title" => __("Banner Content", "medical-rehab"),
		"priority" => 10,
		"description" => "Frontpage Banner content setting",
		"active_callback" => "is_front_page",
		"panel" => "banner_panel",
	));

	$wp_customize->add_section("banner_link_section", array(
		"title" => __("Banner Link", "medical-rehab"),
		"priority" => 30,
		"description" => "Frontpage Banner Link setting",
		"active_callback" => "is_front_page",
		"panel" => "banner_panel",
	));	
	
	/* 1.0.3 setting */

	
	$wp_customize->add_setting("banner_img_repeat_setting", array(
		"default" => "no-repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("banner_img_position_setting", array(
		"default" => "center top",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("banner_caption1_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		

	$wp_customize->add_setting("banner_caption2_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	

	$wp_customize->add_setting("banner_caption3_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_link_text_setting", array(
		"default" => "SEE MORE",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	/* 1.0.4 control */


	$wp_customize->add_control( 'banner_img_repeat_control', array(
		'section' => 'banner_img_section',
		'settings' => 'banner_img_repeat_setting',
		'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'repeat' => 'repeat',
			'repeat-x' => 'Repeat Horizontal',
			'repeat-y' => 'Repeat Vertical',
			'no-repeat' => 'Do NOT Repeat',
		),
	));

	$wp_customize->add_control( 'banner_img_position_control', array(
		'section' => 'banner_img_section',
		'settings' => 'banner_img_position_setting',
		'label'   => __( 'Background Image Position' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'left-top' => 'Top Left',
			'center-top' => 'Top Center',
			'right-top' => 'Top Right',
			'left-center' => 'Center Left',
			'center-center' => 'Center',
			'right-center' => 'Center Right',
			'left-bottom' => 'Bottom Left',
			'center-bottom' => 'Bottom Center',
			'right-bottom' => 'Bottom Right',
		),
	));	

	$wp_customize->add_control( 'banner_img_size_control', array(
		'section' => 'banner_img_section',
		'settings' => 'banner_img_size_setting',
		'label'   => __( 'Background Image Size' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'original' => 'Original',
			'cover' => 'Cover',
			'contain' => 'Contain',
		),
	));	
	
	/*banner panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_content_visibility_control",
		array(
			"label" => __("Show banner panel", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
		
	
	/*banner caption 1*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_caption1_control",
		array(
			"label" => __("Caption 1", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_caption1_setting",
			"type" => "textarea",
		)
	));	
	
	/*banner caption 2*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_caption2_control",
		array(
			"label" => __("Caption 2", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_caption2_setting",
			"type" => "textarea",
		)
	));	

	/*banner caption 3*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_caption3_control",
		array(
			"label" => __("Caption 3", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_caption3_setting",
			"type" => "textarea",
		)
	));	

	/*button label*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_link_text_control",
		array(
			"label" => __("Button label", "medical-rehab"),
			"section" => "banner_link_section",
			"settings" => "banner_link_text_setting",
			"type" => "text",
		)
	));		

	/*button link*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_link_url_control",
		array(
			"label" => __("Button link", "medical-rehab"),
			"section" => "banner_link_section",
			"settings" => "banner_link_url_setting",
			"type" => "url",
		)
	));			
	
else: /* 1.1.0 Banner customizer fallback */

	/* 1.1.1 section */
	$wp_customize->add_section("banner_content_section", array(
		"title" => __("Banner Content", "medical-rehab"),
		"priority" => 10,
		"description" => "Frontpage Banner content setting",
		"active_callback" => "is_front_page",
	));
	
	$wp_customize->add_section("banner_img_section", array(
		"title" => __("Banner Image", "medical-rehab"),
		"priority" => 20,
		"description" => "Frontpage Banner Image setting",
		"active_callback" => "is_front_page",
	));

	$wp_customize->add_section("banner_link_section", array(
		"title" => __("Banner Link", "medical-rehab"),
		"priority" => 30,
		"description" => "Frontpage Banner Link setting",
		"active_callback" => "is_front_page",
	));	
	
	/* 1.1.2 setting */
		$wp_customize->add_setting("banner_img_setting", array(
		"default" => HEALTHYREHAB_BANNER_IMAGE_DEFAULT,
		"transport" => "postMessage",
		"sanitize_callback" => "absint",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("banner_img_repeat_setting", array(
		"default" => "no-repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("banner_img_position_setting", array(
		"default" => "center top",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("banner_caption1_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		

	$wp_customize->add_setting("banner_caption2_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	

	$wp_customize->add_setting("banner_caption3_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_link_text_setting", array(
		"default" => "SEE MORE",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("banner_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	/* 1.1.3 control */
	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control( 
			$wp_customize, 
			'banner_img_control', 
			array(
				'label' => __( 'Upload Banner Image', 'medical-rehab' ),
				'description' => __( 'Background image for frontpage banner', 'medical-rehab'),
				'section' => 'banner_img_section',
				'settings' => 'banner_img_setting',
				'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
				'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
				'width'       => 1900,
				'height'      => 490,
			) 
		) 
	);

	$wp_customize->add_control( 'banner_img_repeat_control', array(
		'section' => 'banner_img_section',
		'settings' => 'banner_img_repeat_setting',
		'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'repeat' => 'repeat',
			'repeat-x' => 'Repeat Horizontal',
			'repeat-y' => 'Repeat Vertical',
			'no-repeat' => 'Do NOT Repeat',
		),
	));

	$wp_customize->add_control( 'banner_img_position_control', array(
		'section' => 'banner_img_section',
		'settings' => 'banner_img_position_setting',
		'label'   => __( 'Background Image Position' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'left-top' => 'Top Left',
			'center-top' => 'Top Center',
			'right-top' => 'Top Right',
			'left-center' => 'Center Left',
			'center-center' => 'Center',
			'right-center' => 'Center Right',
			'left-bottom' => 'Bottom Left',
			'center-bottom' => 'Bottom Center',
			'right-bottom' => 'Bottom Right',
		),
	));	

	$wp_customize->add_control( 'banner_img_size_control', array(
		'section' => 'banner_img_section',
		'settings' => 'banner_img_size_setting',
		'label'   => __( 'Background Image Size' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'original' => 'Original',
			'cover' => 'Cover',
			'contain' => 'Contain',
		),
	));	
	
	/*banner panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_content_visibility_control",
		array(
			"label" => __("Show banner panel", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
		
	
	/*banner caption 1*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_caption1_control",
		array(
			"label" => __("Caption 1", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_caption1_setting",
			"type" => "textarea",
		)
	));	
	
	/*banner caption 2*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_caption2_control",
		array(
			"label" => __("Caption 2", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_caption2_setting",
			"type" => "textarea",
		)
	));	

	/*banner caption 3*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_caption3_control",
		array(
			"label" => __("Caption 3", "medical-rehab"),
			"section" => "banner_content_section",
			"settings" => "banner_caption3_setting",
			"type" => "textarea",
		)
	));	

	/*button label*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_link_text_control",
		array(
			"label" => __("Button label", "medical-rehab"),
			"section" => "banner_link_section",
			"settings" => "banner_link_text_setting",
			"type" => "text",
		)
	));		

	/*button link*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"banner_link_url_control",
		array(
			"label" => __("Button link", "medical-rehab"),
			"section" => "banner_link_section",
			"settings" => "banner_link_url_setting",
			"type" => "url",
		)
	));			
	
endif;
	
/*=============================
	2.0.0 Services Customizer
=============================*/	
if ( class_exists( 'WP_Customize_Panel' ) ):
	/* 2.0.1 panel */
	$wp_customize->add_panel( 'services_panel', array(
		'priority'       => 42,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __("Services", 'medical-rehab'),
		'description'    => '',
	) );
	
	/* 2.0.2 section */
	$wp_customize->add_section("services_content_section", array(
		"title" => __("Services Content", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage Services content setting",
		"active_callback" => "is_front_page",
		"panel" => "services_panel",
	));
	
	/* 2.0.3 setting */
	$wp_customize->add_setting("services_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("services_heading_setting", array(
		"default" => "Services",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("services_description_setting", array(
		"default" => "Services panel description",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* 2.0.4 control */
	/*services panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"services_content_visibility_control",
		array(
			"label" => __("Show services panel", "medical-rehab"),
			"section" => "services_content_section",
			"settings" => "services_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
		
	/*services heading*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"services_heading_control",
		array(
			"label" => __("Heading", "medical-rehab"),
			"section" => "services_content_section",
			"settings" => "services_heading_setting",
			"type" => "text",
		)
	));				
	
	/*services description*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"services_description_control",
		array(
			"label" => __("Description", "medical-rehab"),
			"section" => "services_content_section",
			"settings" => "services_description_setting",
			"type" => "textarea",
		)
	));		

else: /* 2.1.0 Services customizer fallback */

	/* 2.1.1 section */
	$wp_customize->add_section("services_content_section", array(
		"title" => __("Services Content", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage Services content setting",
		"active_callback" => "is_front_page",
	));
	
	/* 2.1.2 setting */
	$wp_customize->add_setting("services_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("services_heading_setting", array(
		"default" => "Services",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("services_description_setting", array(
		"default" => "Services panel description",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* 2.1.3 control */
	/*services panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"services_content_visibility_control",
		array(
			"label" => __("Show services panel", "medical-rehab"),
			"section" => "services_content_section",
			"settings" => "services_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
		
	/*services heading*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"services_heading_control",
		array(
			"label" => __("Heading", "medical-rehab"),
			"section" => "services_content_section",
			"settings" => "services_heading_setting",
			"type" => "text",
		)
	));				
	
	/*services description*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"services_description_control",
		array(
			"label" => __("Description", "medical-rehab"),
			"section" => "services_content_section",
			"settings" => "services_description_setting",
			"type" => "textarea",
		)
	));

endif;	
	
/*==================================
	3.0.0 Call To Action Customizer
==================================*/		
	/* 3.0.1 section */
	$wp_customize->add_section("cta1_section", array(
		"title" => __("Call-to-action area", "medical-rehab"),
		"priority" => 41,
		"description" => "Call to action setting.",
		"active_callback" => "is_front_page",
	));	
	
	/*3.0.2 setting */
	/* cta 1 visibility */
	$wp_customize->add_setting("cta1_setting_visibility",array(
		"default" => '1',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));

	/* cta 1 setting for message */
	$wp_customize->add_setting("cta1_setting_message",array(
		"default" => 'TO FIND A TREATMENT CENTER, OR TO SPEAK WITH AN INTAKE COORDINATOR FOR A COMPLIMENTARY AND PRIVATE EVALUATION, CALL TODAY!',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	/* cta 1 setting for background color */
	$wp_customize->add_setting("cta1_setting_bg_color",array(
		"default" => '#E5E7E6',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		'sanitize_callback' => 'medicalrehab_sanitize_hex_color',
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* cta 1 setting for font color */
	$wp_customize->add_setting("cta1_setting_font_color",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		'sanitize_callback' => 'medicalrehab_sanitize_hex_color',
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));


	$wp_customize->add_setting("cta1_link_text_setting", array(
		"default" => "Contact Us",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("cta1_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	
	/*3.0.3 control */
	/*cta 1 visibility*/ 
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"cta1_control_visibility",
		array(
			"label" => __("Show call to action panel", "medical-rehab"),
			"section" => "cta1_section",
			"settings" => "cta1_setting_visibility",
			"type" => "checkbox",
		)
	));

	/*cta 1 message*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"cta1_control_message",
		array(
			"label" => __("Call to action Message", "medical-rehab"),
			"section" => "cta1_section",
			"settings" => "cta1_setting_message",
			"type" => "textarea",
		)
	));	

	/* cta1 font color */
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'cta1_control_font_color', 
		array(
			'label'      => __( 'Font Color', 'medical-rehab' ),
			'section'    => 'cta1_section',
			'settings'   => 'cta1_setting_font_color',
		) ) 
	);

	/*cta 1 bg color */
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'cta1_control_bg_color', 
		array(
			'label'      => __( 'Background Color', 'medical-rehab' ),
			'section'    => 'cta1_section',
			'settings'   => 'cta1_setting_bg_color',
		) ) 
	);	
	
	/*button label*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"cta1_link_text_control",
		array(
			"label" => __("Button label", "medical-rehab"),
			"section" => "cta1_section",
			"settings" => "cta1_link_text_setting",
			"type" => "text",
		)
	));		

	/*button link*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"cta1_link_url_control",
		array(
			"label" => __("Button link", "medical-rehab"),
			"section" => "cta1_section",
			"settings" => "cta1_link_url_setting",
			"type" => "url",
		)
	));		
	

/*=============================
	4.0.0 Our Team Customizer
=============================*/	
if ( class_exists( 'WP_Customize_Panel' ) ):
	/* 4.0.1 panel */
	$wp_customize->add_panel( 'ourteam_panel', array(
		'priority'       => 42,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __("Our Team", 'medical-rehab'),
		'description'    => '',
	) );
	
	/* 4.0.2 section */
	$wp_customize->add_section("ourteam_content_section", array(
		"title" => __("Our Team Content", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage Our Team content setting",
		"active_callback" => "is_front_page",
		"panel" => "ourteam_panel",
	));
	
	/* 4.0.3 setting */
	$wp_customize->add_setting("ourteam_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("ourteam_heading_setting", array(
		"default" => "Meet Our Team",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("ourteam_description_setting", array(
		"default" => "Our Team panel description",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* 4.0.4 control */
	/*ourteam panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ourteam_content_visibility_control",
		array(
			"label" => __("Show our team panel", "medical-rehab"),
			"section" => "ourteam_content_section",
			"settings" => "ourteam_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
		
	/*ourteam heading*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ourteam_heading_control",
		array(
			"label" => __("Heading", "medical-rehab"),
			"section" => "ourteam_content_section",
			"settings" => "ourteam_heading_setting",
			"type" => "text",
		)
	));				
	
	/*ourteam description*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ourteam_description_control",
		array(
			"label" => __("Description", "medical-rehab"),
			"section" => "ourteam_content_section",
			"settings" => "ourteam_description_setting",
			"type" => "textarea",
		)
	));		

else: /* 4.1.0 ourteam customizer fallback */

	/* 4.1.1 section */
	$wp_customize->add_section("ourteam_content_section", array(
		"title" => __("Our Team Content", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage Our Team content setting",
		"active_callback" => "is_front_page",
		"panel" => "ourteam_panel",
	));
	
	/* 4.1.2 setting */
	$wp_customize->add_setting("ourteam_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("ourteam_heading_setting", array(
		"default" => "Meet Our Team",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("ourteam_description_setting", array(
		"default" => "Our Team panel description",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* 4.1.3 control */
	/*ourteam panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ourteam_content_visibility_control",
		array(
			"label" => __("Show our team panel", "medical-rehab"),
			"section" => "ourteam_content_section",
			"settings" => "ourteam_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
		
	/*ourteam heading*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ourteam_heading_control",
		array(
			"label" => __("Heading", "medical-rehab"),
			"section" => "ourteam_content_section",
			"settings" => "ourteam_heading_setting",
			"type" => "text",
		)
	));				
	
	/*ourteam description*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ourteam_description_control",
		array(
			"label" => __("Description", "medical-rehab"),
			"section" => "ourteam_content_section",
			"settings" => "ourteam_description_setting",
			"type" => "textarea",
		)
	));	

endif;		
	
/*===================================
	5.0.0 Our Testimonial Customizer
===================================*/	
if ( class_exists( 'WP_Customize_Panel' ) ):
	/* 5.0.1 panel */
	$wp_customize->add_panel( 'testimonial_panel', array(
		'priority'       => 43,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __("Testimonial", 'medical-rehab'),
		'description'    => '',
	) );
	
	/* 5.0.2 section */
	$wp_customize->add_section("testimonial_img_section", array(
		"title" => __("Testimonial Image", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage testimonial image setting",
		"active_callback" => "is_front_page",
		"panel" => "testimonial_panel",
	));
	
	/* 5.0.3 setting */
	$wp_customize->add_setting("testimonial_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("testimonial_img_setting", array(
		"default" => HEALTHYREHAB_TESTIMONIAL_IMAGE_DEFAULT,
		"transport" => "postMessage",
		"sanitize_callback" => "absint",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("testimonial_img_repeat_setting", array(
		"default" => "no-repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("testimonial_img_position_setting", array(
		"default" => "center top",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("testimonial_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* 5.0.4 control */
	/*testimonial panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"testimonial_content_visibility_control",
		array(
			"label" => __("Show testimonial panel", "medical-rehab"),
			"section" => "testimonial_img_section",
			"settings" => "testimonial_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
	
	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control( 
			$wp_customize, 
			'testimonial_img_control', 
			array(
				'label' => __( 'Upload Testimonial Image', 'medical-rehab' ),
				'description' => __( 'Background image for frontpage testimonial', 'medical-rehab'),
				'section' => 'testimonial_img_section',
				'settings' => 'testimonial_img_setting',
				'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
				'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
				'width'       => 1900,
				'height'      => 490,
			) 
		) 
	);

	$wp_customize->add_control( 'testimonial_img_repeat_control', array(
		'section' => 'testimonial_img_section',
		'settings' => 'testimonial_img_repeat_setting',
		'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'repeat' => 'repeat',
			'repeat-x' => 'Repeat Horizontal',
			'repeat-y' => 'Repeat Vertical',
			'no-repeat' => 'Do NOT Repeat',
		),
	));

	$wp_customize->add_control( 'testimonial_img_position_control', array(
		'section' => 'testimonial_img_section',
		'settings' => 'testimonial_img_position_setting',
		'label'   => __( 'Background Image Position' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'left-top' => 'Top Left',
			'center-top' => 'Top Center',
			'right-top' => 'Top Right',
			'left-center' => 'Center Left',
			'center-center' => 'Center',
			'right-center' => 'Center Right',
			'left-bottom' => 'Bottom Left',
			'center-bottom' => 'Bottom Center',
			'right-bottom' => 'Bottom Right',
		),
	));	

	$wp_customize->add_control( 'testimonial_img_size_control', array(
		'section' => 'testimonial_img_section',
		'settings' => 'testimonial_img_size_setting',
		'label'   => __( 'Background Image Size' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'original' => 'Original',
			'cover' => 'Cover',
			'contain' => 'Contain',
		),
	));		
	

else: /* 5.1.0 ourteam customizer fallback */

	/* 5.1.1 section */
	$wp_customize->add_section("testimonial_img_section", array(
		"title" => __("Testimonial Image", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage testimonial image setting",
		"active_callback" => "is_front_page",
		"panel" => "testimonial_panel",
	));
	
	/* 5.1.2 setting */
	$wp_customize->add_setting("testimonial_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("testimonial_img_setting", array(
		"default" => HEALTHYREHAB_TESTIMONIAL_IMAGE_DEFAULT,
		"transport" => "postMessage",
		"sanitize_callback" => "absint",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("testimonial_img_repeat_setting", array(
		"default" => "no-repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("testimonial_img_position_setting", array(
		"default" => "center top",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("testimonial_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_select",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/* 5.1.3 control */
	/*testimonial panel visibility*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"testimonial_content_visibility_control",
		array(
			"label" => __("Show testimonial panel", "medical-rehab"),
			"section" => "testimonial_img_section",
			"settings" => "testimonial_content_visibility_setting",
			"type" => "checkbox",
		)
	));	
	
	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control( 
			$wp_customize, 
			'testimonial_img_control', 
			array(
				'label' => __( 'Upload Testimonial Image', 'medical-rehab' ),
				'description' => __( 'Background image for frontpage testimonial', 'medical-rehab'),
				'section' => 'testimonial_img_section',
				'settings' => 'testimonial_img_setting',
				'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
				'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
				'width'       => 1900,
				'height'      => 490,
			) 
		) 
	);

	$wp_customize->add_control( 'testimonial_img_repeat_control', array(
		'section' => 'testimonial_img_section',
		'settings' => 'testimonial_img_repeat_setting',
		'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'repeat' => 'repeat',
			'repeat-x' => 'Repeat Horizontal',
			'repeat-y' => 'Repeat Vertical',
			'no-repeat' => 'Do NOT Repeat',
		),
	));

	$wp_customize->add_control( 'testimonial_img_position_control', array(
		'section' => 'testimonial_img_section',
		'settings' => 'testimonial_img_position_setting',
		'label'   => __( 'Background Image Position' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'left-top' => 'Top Left',
			'center-top' => 'Top Center',
			'right-top' => 'Top Right',
			'left-center' => 'Center Left',
			'center-center' => 'Center',
			'right-center' => 'Center Right',
			'left-bottom' => 'Bottom Left',
			'center-bottom' => 'Bottom Center',
			'right-bottom' => 'Bottom Right',
		),
	));	

	$wp_customize->add_control( 'testimonial_img_size_control', array(
		'section' => 'testimonial_img_section',
		'settings' => 'testimonial_img_size_setting',
		'label'   => __( 'Background Image Size' , 'medical-rehab'),
		'type'    => 'select',
		'choices'    => array(
			'original' => 'Original',
			'cover' => 'Cover',
			'contain' => 'Contain',
		),
	));		

endif;			
	

/*==================================
	6.0.0 Latest Article Customizer
==================================*/		
	/* 6.0.1 section */
	$wp_customize->add_section("latest_article_section", array(
		"title" => __("Latest Article", "medical-rehab"),
		"priority" => 44,
		"description" => "Frontpage Latest Article setting.",
		"active_callback" => "is_front_page",
	));	
	
	/*6.0.2 setting */
	/* latest article visibility */
	$wp_customize->add_setting("article_content_visibility_setting",array(
		"default" => '1',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));
	
	$wp_customize->add_setting("latest_article_heading_setting", array(
		"default" => "Latest Article",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("latest_article_description_setting", array(
		"default" => "Latest Article description",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));			
	
	$wp_customize->add_setting("latest_article_link_text_setting", array(
		"default" => "VIEW MORE",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("latest_article_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	
	/*6.0.3 control */
	/*latest article visibility*/ 
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"latest_article_control_visibility",
		array(
			"label" => __("Show latest article panel", "medical-rehab"),
			"section" => "latest_article_section",
			"settings" => "article_content_visibility_setting",
			"type" => "checkbox",
		)
	));

	/*latest article heading*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"latest_article_heading_control",
		array(
			"label" => __("Heading", "medical-rehab"),
			"section" => "latest_article_section",
			"settings" => "latest_article_heading_setting",
			"type" => "text",
		)
	));				
	
	/*latest article description*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"latest_article_description_control",
		array(
			"label" => __("Description", "medical-rehab"),
			"section" => "latest_article_section",
			"settings" => "latest_article_description_setting",
			"type" => "textarea",
		)
	));		
	
	/*latest article button label*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"latest_article_link_text_control",
		array(
			"label" => __("Button label", "medical-rehab"),
			"section" => "latest_article_section",
			"settings" => "latest_article_link_text_setting",
			"type" => "text",
		)
	));		

	/*button link*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"latest_article_link_url_control",
		array(
			"label" => __("Button link", "medical-rehab"),
			"section" => "latest_article_section",
			"settings" => "latest_article_link_url_setting",
			"type" => "url",
		)
	));			
	
	
/*==================================
	7.0.0 Contact Us Customizer
==================================*/	
if ( class_exists( 'WP_Customize_Panel' ) ):
	/* 5.0.1 panel */
	$wp_customize->add_panel( 'contactform_panel', array(
		'priority'       => 45,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __("Contact us", 'medical-rehab'),
		'description'    => '',
	) );
	
	/* 7.0.1 section */
	$wp_customize->add_section("contactform_content_section", array(
		"title" => __("Contact us Content", "medical-rehab"),
		"priority" => 1,
		"description" => "Frontpage contact form content setting.",
		"active_callback" => "is_front_page",
		"panel" => 'contactform_panel'
	));	
	
	$wp_customize->add_section("contactform_form_section", array(
		"title" => __("Form setting", "medical-rehab"),
		"priority" => 2,
		"description" => "Frontpage contact form setting.",
		"active_callback" => "is_front_page",
		"panel" => 'contactform_panel'
	));	
	
	/*7.0.2 setting */
	/* latest article visibility */
	$wp_customize->add_setting("contactform_content_visibility_setting",array(
		"default" => '1',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));
	
	$wp_customize->add_setting("contactform_default_form_setting",array(
		"default" => '1',
		"type" => "theme_mod",
		//"theme_supports" => "" ,
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));
	
	$wp_customize->add_setting("contactform_heading_setting", array(
		"default" => "Get In Touch",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	
	
	$wp_customize->add_setting("contactform_description_setting", array(
		"default" => "Contact form description",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		


	$wp_customize->add_setting("contactform_email_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_text",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	$wp_customize->add_setting("contactform_submit_text_setting", array(
		"default" => "Submit",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));	

	$wp_customize->add_setting("contactform_shortcode_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_text",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));		
	
	/*7.0.3 control */
	/*Contact form visibility*/ 
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_control_visibility",
		array(
			"label" => __("Show contact form panel", "medical-rehab"),
			"section" => "contactform_content_section",
			"settings" => "contactform_content_visibility_setting",
			"type" => "checkbox",
		)
	));

	/*Contact form heading*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_heading_control",
		array(
			"label" => __("Heading", "medical-rehab"),
			"section" => "contactform_content_section",
			"settings" => "contactform_heading_setting",
			"type" => "text",
		)
	));				
	
	/*Contact form description*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_description_control",
		array(
			"label" => __("Description", "medical-rehab"),
			"section" => "contactform_content_section",
			"settings" => "contactform_description_setting",
			"type" => "textarea",
		)
	));		
	
	/* Default contact form */
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_default_form_control",
		array(
			"label" => __("Use default contact form", "medical-rehab"),
			"section" => "contactform_form_section",
			"settings" => "contactform_default_form_setting",
			"type" => "checkbox",
		)
	));	
	
	/*Contact form email address*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_email_control",
		array(
			"label" => __("Email Address", "medical-rehab"),
			"section" => "contactform_form_section",
			"settings" => "contactform_email_setting",
			"type" => "email",
		)
	));	
	
	/*Contact form button label*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_link_text_control",
		array(
			"label" => __("Button label", "medical-rehab"),
			"section" => "contactform_form_section",
			"settings" => "contactform_submit_text_setting",
			"type" => "text",
		)
	));		
	
	/*Contact shortcode field*/
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contactform_shotcode_control",
		array(
			"label" => __("Contact form shortcode", "medical-rehab"),
			"section" => "contactform_form_section",
			"settings" => "contactform_shortcode_setting",
			"type" => "text",
		)
	));	

else:

endif;
	
/*==================
	PANELS
===================*/	
	


/*==================
	SECTIONS
===================*/
	


/*==================
	SETTINGS
===================*/
/*
 * Phone number Setting
 */ 
	/*adding of phone number in site identity section*/
	$wp_customize->add_setting("phonenum_setting", array(
		"default" => "(888) 888-8888",
		"transport" => "postMessage",
		"sanitize_callback" => "theme_slug_sanitize_number_range",
		"capability" => "edit_theme_options",
		//"sanitize_js_callback" => "",
	));
	
/*==================
	CONTROLS
===================*/
/*
 * Phone number
 */
	$wp_customize->add_control( 'phonenum_control', array(
	  'label' => __( 'Phone Number', 'medical-rehab' ),
	  'type' => 'tel',
	  'section' => 'title_tagline',
	  'settings' => 'phonenum_setting'
	) );
	
	
}
add_action("customize_register","medicalrehab_customize_register");

//Output Customize CSS
function medicalrehab_customize_css(){?>

<?php 
	/*$default_banner_img = HEALTHYREHAB_BANNER_IMAGE_DEFAULT;

	$banner_image_src = wp_get_attachment_image_src( absint( get_theme_mod( 'banner_img_setting' ) ), 'full' ); 
	$banner_image_position = get_theme_mod('banner_img_position_setting');
	$banner_image_position = str_replace("-", " ", $banner_image_position);

	$banner_image = "";
	if(!empty($banner_image_src)){
		$banner_image = $banner_image_src[0];
	}else{
		$banner_image = $default_banner_img;
		
	}*/

?>

<style type="text/css">
	
	#main_banner{
		background-repeat:<?php echo get_theme_mod('banner_img_repeat_setting'); ?>;
		background-size: <?php echo get_theme_mod('banner_img_size_setting'); ?>;
		background-position:<?php echo get_theme_mod('banner_img_position_setting'); ?>;
	}
	
	#cta1_panel{
		background:<?php echo get_theme_mod('cta1_setting_bg_color'); ?>
	}

	#cta1_content{
		color:<?php echo get_theme_mod('cta1_setting_font_color'); ?>
	}
		
</style>

<?php }
add_action('wp_head', 'medicalrehab_customize_css');

function medicalrehab_customizer_live_preview(){
	wp_enqueue_script("medicalrehab-themecustomizer", get_template_directory_uri() . "/js/theme-customizer.js", array("jquery", "customize-preview"), '',  true);
}

add_action("customize_preview_init", "medicalrehab_customizer_live_preview");

function medicalrehab_registers() {

	wp_enqueue_script( 'medicalrehab_customizer_script', get_template_directory_uri() . '/js/medicalrehab-customizer.js', array("jquery"), '', true  );

}
add_action( 'customize_controls_enqueue_scripts', 'medicalrehab_registers' );

function medicalrehab_customizer_custom_css() {

    wp_enqueue_style('medicalrehab_customizer_custom_css', get_template_directory_uri() . '/css/medicalrehab-custom-customizer-css.css');

}
add_action('customize_controls_print_styles', 'medicalrehab_customizer_custom_css');
?>