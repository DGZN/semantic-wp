<?php
/**
 * ----------------------------------------------------------------------
 * IMAGES
 */
define('MEDICALREHAB_BANNER_IMAGE_DEFAULT', esc_url_raw (get_template_directory_uri() .'/img/default-image/banner-background.png') );

define('MEDICALREHAB_TESTIMONIAL_IMAGE_DEFAULT', esc_url_raw (get_template_directory_uri() .'/img/default-image/testimonial-background.jpg') ); /*TODO : change default background for testimonial panel*/

/* Table of contents
 * Misc
1.0.0 Banner Customizer
	1.1.0 Banner Panel
	1.2.0 Banner Content Section
	1.2.1 banner panel visibility
	1.2.2 banner caption 1
	1.2.3 banner caption 2
	1.2.4 banner caption 3
	
	1.3.0 Banner Background Section
	1.3.1 banner background image
	1.3.2 banner background repeat
	1.3.3 banner background position
	
	1.4.0 Banner link section
	1.4.1 button label
	1.4.2 button link

2.0.0 Services Customizer
	2.1.0 Services panel
	2.2.0 Services Content Section
	2.2.1 services panel visibility
	2.2.2 services heading
	2.2.3 services description

3.0.0 Call To Action Customizer
	3.1.0 Call to action section
	3.1.1 cta 1 visibility
	3.1.2 cta 1 setting for message
	3.1.3 cta 1 setting for background color
	3.1.4 cta 1 setting for font color
	3.1.5 button label
	3.1.6 button link

4.0.0 Our Team Customizer
	4.1.0 Our team panel
	4.2.0 our team content section
	4.2.1 ourteam panel visibility
	4.2.2 ourteam heading
	4.2.3 ourteam description

5.0.0 Our Testimonial Customizer
	5.1.0 Testimonial panel
	5.2.0 Testimonial background section
	5.2.1 testimonial panel visibility
	5.2.2 testimonial background image
	5.2.3 background image repeat
	5.2.4 background position
	5.2.5 background size

6.0.0 Latest Article Customizer
	6.1.0 Latest Article section
	6.1.2 latest article visibility
	6.1.3 latest article heading
	6.1.4 latest article description
	6.1.5 latest article button label
	6.1.6 button link

7.0.0 Contact Us Customizer
	7.1.0 contact form panel
	7.2.0 contact form content section
	7.2.1 Contact form visibility
	7.2.2 Contact form heading
	7.2.3 Contact form description
	7.3.0 Contact form formsetting section
	7.3.1 Use Default contact form
	7.3.2 Contact form email address
	7.3.3 Contact form button label
	7.3.4 Contact shortcode field
 */


function medicalrehab_customize_register($wp_customize) {
/* 
 * Site Identity
 */ 
 
 
	/* LOGO	*/
	$wp_customize->add_setting( 'header_logo_setting', array(
		'sanitize_callback' => 'esc_url_raw',
		//'transport' => 'postMessage'
	));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo_control', array(
			'label' => __( 'Logo', 'medical-rehab' ),
			'section' => 'title_tagline',
			'settings' => 'header_logo_setting',
			'priority' => 1,
		))); 

/* Color Panel */	
$wp_customize->add_section("color_section", array(
	"title" => __("Colors", "medical-rehab"),
	"priority" => 40,
	"description" => "General color setting",
));	
		
	$wp_customize->add_setting("accent_bg_color_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'accent_bg_color_control', 
			array(
				'label'      => __( 'Accent background color', 'medical-rehab' ),
				'description'	=>	__('Change background color for search, comment form buttons, etc.', 'medical-rehab'),				
				'section'    => 'color_section',
				'settings'   => 'accent_bg_color_setting',
			) ) 
		);		

	$wp_customize->add_setting("accent_font_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'accent_font_color_control', 
			array(
				'label'      => __( 'Accent font color', 'medical-rehab' ),
				'description'	=>	__('Change font color for search, comment form buttons, etc.', 'medical-rehab'),					
				'section'    => 'color_section',
				'settings'   => 'accent_font_color_setting',
			) ) 
		);	

	$wp_customize->add_setting("font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'font_color_control', 
			array(
				'label'      	=>	__( 'Font color', 'medical-rehab' ),
				'description'	=>	__('Change the color of the main text on your site.', 'medical-rehab'),
				'section'	    =>	'color_section',
				'settings'  	=>	'font_color_setting',
			) ) 
		);	

	$wp_customize->add_setting("link_color_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'link_color_control', 
			array(
				'label'			=>	__( 'Link color', 'medical-rehab' ),
				'description'	=>	__('Change color for your links', 'medical-rehab'),
				'section'		=> 'color_section',
				'settings'   	=> 'link_color_setting',
			) ) 
		);		

	$wp_customize->add_setting("link_hover_color_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'link_hover_color_control', 
			array(
				'label'      => __( 'Link hover color', 'medical-rehab' ),
				'description'	=>	__('Change hover color for your links', 'medical-rehab'),
				'section'    => 'color_section',
				'settings'   => 'link_hover_color_setting',
			) ) 
		);		
		
	$wp_customize->add_setting("link_visited_color_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'link_visited_color_control', 
			array(
				'label'      => __( 'Link visited color', 'medical-rehab' ),
				'description'	=>	__('Change visited color for your links', 'medical-rehab'),		
				'section'    => 'color_section',
				'settings'   => 'link_visited_color_setting',
			) ) 
		);		


/* Navigation */
$wp_customize->add_section("navigation_color_section", array(
	"title" => __("Navigation", "medical-rehab"),
	"priority" => 42,
	"description" => "Navigation color setting",
	//"active_callback" => "is_front_page",
));	
	/* nav background color */
	$wp_customize->add_setting("nav_bg_color_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_bg_color_control', 
			array(
				'label'      => __( 'Background Color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_bg_color_setting',
			) ) 
		);		

	/* Home background color */
	$wp_customize->add_setting("nav_home_bg_color_setting",array(
		"default" => '#2e332b',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_home_bg_color_control', 
			array(
				'label'      => __( 'Home background color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_home_bg_color_setting',
			) ) 
		);
		
	/* Home background hover color */
	$wp_customize->add_setting("nav_home_hover_color_setting",array(
		"default" => '#2e332b',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_home_hover_color_control', 
			array(
				'label'      => __( 'Home background hover color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_home_hover_color_setting',
			) ) 
		);
		
		

	/* Home icon background color */
	$wp_customize->add_setting("nav_homefont_bg_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_homefont_bg_color_control', 
			array(
				'label'      => __( 'Home icon color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_homefont_bg_color_setting',
			) ) 
		);
		
	/* Home icon background hover color */
	$wp_customize->add_setting("nav_homefont_hover_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_homefont_hover_color_control', 
			array(
				'label'      => __( 'Home icon hover color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_homefont_hover_color_setting',
			) ) 
		);		
		

	/* Link color */
	$wp_customize->add_setting("nav_link_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_link_color_control', 
			array(
				'label'      => __( 'Navigation link color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_link_color_setting',
			) ) 
		);
		
	/* Link hover color  */
	$wp_customize->add_setting("nav_link_hover_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_link_hover_control', 
			array(
				'label'      => __( 'Navigation link hover color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_link_hover_setting',
			) ) 
		);		
	
	/*Text color */
	$wp_customize->add_setting("nav_text_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_text_color_control', 
			array(
				'label'      => __( 'Navigation text color', 'medical-rehab' ),
				'section'    => 'navigation_color_section',
				'settings'   => 'nav_text_color_setting',
			) ) 
		);		
		
/*===========================
	1.0.0 Banner Customizer
===========================*/ 
/*1.1.0 Banner Panel*/
$wp_customize->add_panel( 'banner_panel', array(
	'priority'       => 43,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Banner", 'medical-rehab'),
	'description'    => '',
) );	

/*1.2.0 Banner Content Section*/
$wp_customize->add_section("banner_content_section", array(
	"title" => __("Banner Content", "medical-rehab"),
	"priority" => 10,
	"description" => "Frontpage Banner content setting",
	"active_callback" => "is_front_page",
	"panel" => "banner_panel",
));	

	/*1.2.1 banner panel visibility*/
	$wp_customize->add_setting("banner_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"banner_content_visibility_control",
			array(
				"label" 	=> __("Show banner panel", "medical-rehab"),
				"section" 	=> "banner_content_section",
				"settings"	=> "banner_content_visibility_setting",
				"type" 		=> "checkbox",
			)
		));		
		
	$wp_customize->add_setting("banner_heading_setting", array(
		"default" => __('Lorem ipsum dolor sit amet, civibus conceptam cu ius. Ut odio eloquentiam nec, his nullam voluptua tacimates in', 'medical-rehab'),
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"banner_heading_control",
			array(
				"label" => __("Banner Heading", "medical-rehab"),
				"section" => "banner_content_section",
				"settings" => "banner_heading_setting",
				"type" => "textarea",
			)
		));				
		
	/* 1.4.1 button label */
	$wp_customize->add_setting("banner_link_text_setting", array(
		"default" => "SEE MORE",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"banner_link_text_control",
			array(
				"label" => __("Button label", "medical-rehab"),
				"section" => "banner_content_section",
				"settings" => "banner_link_text_setting",
				"type" => "text",
			)
		));		
		
	/* 1.4.2 button link */
	$wp_customize->add_setting("banner_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"banner_link_url_control",
			array(
				"label" => __("Button link", "medical-rehab"),
				"section" => "banner_content_section",
				"settings" => "banner_link_url_setting",
				"type" => "url",
			)
		));	

	
	
		
/* 1.3.0 Banner Background Section*/
$wp_customize->add_section("banner_background_section", array(
	"title" => __("Banner Background", "medical-rehab"),
	"priority" => 20,
	"description" => "Frontpage Banner background setting",
	"active_callback" => "is_front_page",
	"panel" => "banner_panel"
));
	
	/* 1.3.1 banner background image */
	$wp_customize->add_setting( 'banner_img_setting', array(
		"default" => (get_template_directory_uri() .'/img/header.png'),   
		//"transport" => "postMessage",
		"sanitize_callback" => 'medicalrehab_sanitize_url',
	) );

		/*$wp_customize->add_control( 
			new WP_Customize_Cropped_Image_Control( 
				$wp_customize, 
				'banner_img_control', 
				array(
					'label' => __( 'Upload Banner Image', 'medical-rehab' ),
					'description' => __( 'Background image for banner', 'medical-rehab'),
					'section' => 'banner_background_section',
					'settings' => 'banner_img_setting',
					'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
					'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
					'width'       => 1900,
					'height'      => 490, 
				) 
			) 
		);*/
		
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'banner_img_control', 
				array(
					'label' => __( 'Upload Banner Image', 'medical-rehab' ),
					'description' => __( 'Background image for banner. Recommended image size 1900x490', 'medical-rehab'),
					'section' => 'banner_background_section',
					'settings' => 'banner_img_setting'
				) 
			) 
		);			
	
	/* 1.3.2 banner background repeat */
	$wp_customize->add_setting("banner_img_repeat_setting", array(
		"default" => "no-repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_repeat",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'banner_img_repeat_control', array(
			'section' => 'banner_background_section',
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
	
	/* 1.3.3 banner background position */
	$wp_customize->add_setting("banner_img_position_setting", array(
		"default" => "center top",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_position",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'banner_img_position_control', array(
			'section' => 'banner_background_section',
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
	
	$wp_customize->add_setting("banner_img_size_setting", array(
		"default" => "initial",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_size",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control( 'banner_img_size_control', array(
			'section' => 'banner_background_section',
			'settings' => 'banner_img_size_setting',
			'label'   => __( 'Background Image Size' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'initial' => 'Original',
				'cover' => 'Cover',
				'contain' => 'Contain',
			),
		));		

	$wp_customize->add_setting("banner_bg_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'banner_bg_color_control', 
			array(
				'label'      => __( 'Background Color', 'medical-rehab' ),
				'section'    => 'banner_background_section',
				'settings'   => 'banner_bg_color_setting',
			) ) 
		);	
	
$wp_customize->add_section("banner_color_section", array(
	"title" => __("Banner Colors", "medical-rehab"),
	"priority" => 30,
	"description" => "Banner content color setting",
	"active_callback" => "is_front_page",
	"panel" => "banner_panel",
));			

	$wp_customize->add_setting("banner_font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'banner_font_color_control', 
			array(
				'label'      => __( 'Content font color', 'medical-rehab' ),
				'section'    => 'banner_color_section',
				'settings'   => 'banner_font_color_setting',
			) ) 
		);
	
	$wp_customize->add_setting("banner_button_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'banner_button_color_control', 
			array(
				'label'      => __( 'Button color', 'medical-rehab' ),
				'section'    => 'banner_color_section',
				'settings'   => 'banner_button_color_setting',
			) ) 
		);	

	
	$wp_customize->add_setting("banner_button_font_color",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'banner_button_font_color_control', 
			array(
				'label'      => __( 'Button font color', 'medical-rehab' ),
				'section'    => 'banner_color_section',
				'settings'   => 'banner_button_font_color',
			) ) 
		);			
	
	
/*=============================
	2.0.0 Services Customizer
=============================*/	

/* 2.1.0 Services panel */
$wp_customize->add_panel( 'services_panel', array(
	'priority'       => 45,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Services", 'medical-rehab'),
	'description'    => '',
) );
	
/* 2.2.0 Services Content Section */
$wp_customize->add_section("services_content_section", array(
	"title" => __("Services Content", "medical-rehab"),
	"priority" => 1,
	"description" => "Frontpage Services content setting",
	"active_callback" => "is_front_page",
	"panel" => "services_panel",
));
	
	/* 2.2.1 services panel visibility */
	$wp_customize->add_setting("services_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));		

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
	
	/* 2.2.2 services heading */	
	$wp_customize->add_setting("services_heading_setting", array(
		"default" => "Services",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));	

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
		
	/* 2.2.3 services description */
	$wp_customize->add_setting("services_description_setting", array(
		"default" => "Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));		
	
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
	
	
$wp_customize->add_section("services_color_section", array(
	"title" => __("Services Colors", "medical-rehab"),
	"priority" => 2,
	"description" => "Services color setting",
	"active_callback" => "is_front_page",
	"panel" => "services_panel",
));			


	$wp_customize->add_setting( "services_heading_color_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'services_heading_color_control',
			array(
				'label' => __( 'Heading Color', 'medical-rehab' ),
				'section' => 'services_color_section',
				'settings' => 'services_heading_color_setting'
			) )
		);

	$wp_customize->add_setting("services_font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'services_font_color_control', 
			array(
				'label'      => __( 'Content font color', 'medical-rehab' ),
				'section'    => 'services_color_section',
				'settings'   => 'services_font_color_setting',
			) ) 
		);
	
	$wp_customize->add_setting( "services_link_color_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'services_link_color_control',
			array(
				'label' => __( 'Link color', 'medical-rehab' ),
				'section' => 'services_color_section',
				'settings' => 'services_link_color_setting'
			) )
		);
		
	$wp_customize->add_setting( "services_link_hover_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'services_link_hover_control',
			array(
				'label' => __( 'Link hover color', 'medical-rehab' ),
				'section' => 'services_color_section',
				'settings' => 'services_link_hover_setting'
			) )
		);		
	
/*===================================
	Our Testimonial Customizer
===================================*/	
/* 5.1.0 Testimonial panel */
$wp_customize->add_panel( 'testimonial_panel', array(
	'priority'       => 46,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Testimonial", 'medical-rehab'),
	'description'    => '',
) );


/* 5.2.0 Testimonial background section */
$wp_customize->add_section("testimonial_visibility_section", array(
	"title" => __("Testimonial Visibility", "medical-rehab"),
	"priority" => 1,
	"description" => "Testimonial visibility setting",
	"active_callback" => "is_front_page",
	"panel" => "testimonial_panel",
));

	/* 5.2.1 testimonial panel visibility */
	$wp_customize->add_setting("testimonial_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"testimonial_content_visibility_control",
			array(
				"label" => __("Show testimonial panel", "medical-rehab"),
				"section" => "testimonial_visibility_section",
				"settings" => "testimonial_content_visibility_setting",
				"type" => "checkbox",
			)
		));	

/* 5.2.0 Testimonial background section */
$wp_customize->add_section("testimonial_background_section", array(
	"title" => __("Testimonial Background", "medical-rehab"),
	"priority" => 2,
	"description" => "Testimonial background setting",
	"active_callback" => "is_front_page",
	"panel" => "testimonial_panel",
));

	/* 5.2.2 testimonial background image */
	$wp_customize->add_setting("testimonial_img_setting", array(
		"default" => (get_template_directory_uri() .'/img/default-image/testimonial-background.jpg'),
		"sanitize_callback" => "medicalrehab_sanitize_url",
	));	

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'testimonial_img_control', 
				array(
					'label' => __( 'Upload Background Image', 'medical-rehab' ),
					'description' => __( 'Background image for banner. Recommended image size 1900x490', 'medical-rehab'),
					'section' => 'testimonial_background_section',
					'settings' => 'testimonial_img_setting'
				) 
			) 
		);			
		
	/* 5.2.3 background image repeat */
	$wp_customize->add_setting("testimonial_img_repeat_setting", array(
		"default" => "no-repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_repeat",
		"capability" => "edit_theme_options",
	));	

		$wp_customize->add_control( 'testimonial_img_repeat_control', array(
			'section' => 'testimonial_background_section',
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
	
	/* 5.2.4 background position */
	$wp_customize->add_setting("testimonial_img_position_setting", array(
		"default" => "center top",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_position",
		"capability" => "edit_theme_options",
	));	

		$wp_customize->add_control( 'testimonial_img_position_control', array(
			'section' => 'testimonial_background_section',
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
	
	/* 5.2.5 background size */
	$wp_customize->add_setting("testimonial_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_size",
		"capability" => "edit_theme_options",
	));		

		$wp_customize->add_control( 'testimonial_img_size_control', array(
			'section' => 'testimonial_background_section',
			'settings' => 'testimonial_img_size_setting',
			'label'   => __( 'Background Image Size' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'initial' => 'Original',
				'cover' => 'Cover',
				'contain' => 'Contain',
			),
		));		
		
	$wp_customize->add_setting("testimonial_bg_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'testimonial_bg_color_control', 
			array(
				'label'      => __( 'Background Color', 'medical-rehab' ),
				'section'    => 'testimonial_background_section',
				'settings'   => 'testimonial_bg_color_setting',
			) ) 
		);	

$wp_customize->add_section("testimonial_color_section", array(
	"title" => __("Testimonial Colors", "medical-rehab"),
	"priority" => 3,
	"description" => "Testimonial color setting",
	"active_callback" => "is_front_page",
	"panel" => "testimonial_panel",
));			

	$wp_customize->add_setting("testimonial_font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'testimonial_font_color_control', 
			array(
				'label'      => __( 'Testimonial font color', 'medical-rehab' ),
				'section'    => 'testimonial_color_section',
				'settings'   => 'testimonial_font_color_setting',
			) ) 
		);
	
	$wp_customize->add_setting( "testimonial_link_color_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'testimonial_link_color_control',
			array(
				'label' => __( 'Link color', 'medical-rehab' ),
				'section' => 'testimonial_color_section',
				'settings' => 'testimonial_link_color_setting'
			) )
		);
		
	$wp_customize->add_setting( "testimonial_link_hover_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'testimonial_link_hover_control',
			array(
				'label' => __( 'Link hover color', 'medical-rehab' ),
				'section' => 'testimonial_color_section',
				'settings' => 'testimonial_link_hover_setting'
			) )
		);	
			
		

/*=============================
	4.0.0 Our Team Customizer
=============================*/	
/* 4.1.0 Our team panel */
$wp_customize->add_panel( 'ourteam_panel', array(
	'priority'       => 47,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Our Team", 'medical-rehab'),
	'description'    => '',
) );

/* 4.2.0 our team content section */
$wp_customize->add_section("ourteam_content_section", array(
	"title" => __("Our Team Content", "medical-rehab"),
	"priority" => 1,
	"description" => "Frontpage Our Team content setting",
	"active_callback" => "is_front_page",
	"panel" => "ourteam_panel",
));
	
	/* 4.2.1 ourteam panel visibility*/
	$wp_customize->add_setting("ourteam_content_visibility_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));		
		
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
	
	/* 4.2.2 ourteam heading */
	$wp_customize->add_setting("ourteam_heading_setting", array(
		"default" => "Meet Our Team",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));	
	
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
		
	/* 4.2.3 ourteam description */
	$wp_customize->add_setting("ourteam_description_setting", array(
		"default" => "Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));		

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

		
/* Background Section*/
/*$wp_customize->add_section("ourteam_background_section", array(
	"title" => __("Our Team Background", "medical-rehab"),
	"priority" => 2,
	"description" => "Our Team background setting",
	"active_callback" => "is_front_page",
	"panel" => "ourteam_panel"
));
	
	
	$wp_customize->add_setting( 'ourteam_img_setting', array(
		"default" => (get_template_directory_uri() .'/img/default-image/agsquare.png'),   
		//"transport" => "postMessage",
		"sanitize_callback" => 'medicalrehab_sanitize_url',
	) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'ourteam_img_control', 
				array(
					'label' => __( 'Upload Background Image', 'medical-rehab' ),
					'description' => __( 'Background image for our team panel.', 'medical-rehab'),
					'section' => 'ourteam_background_section',
					'settings' => 'ourteam_img_setting'
				) 
			) 
		);			
	
	$wp_customize->add_setting("ourteam_img_repeat_setting", array(
		"default" => "repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_repeat",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'ourteam_img_repeat_control', array(
			'section' => 'ourteam_background_section',
			'settings' => 'ourteam_img_repeat_setting',
			'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'repeat' => 'repeat',
				'repeat-x' => 'Repeat Horizontal',
				'repeat-y' => 'Repeat Vertical',
				'no-repeat' => 'Do NOT Repeat',
			),
		));		
	
	$wp_customize->add_setting("ourteam_img_position_setting", array(
		"default" => "center center",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_position",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'ourteam_img_position_control', array(
			'section' => 'ourteam_background_section',
			'settings' => 'ourteam_img_position_setting',
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
	
	$wp_customize->add_setting("ourteam_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_size",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control( 'ourteam_img_size_control', array(
			'section' => 'ourteam_background_section',
			'settings' => 'ourteam_img_size_setting',
			'label'   => __( 'Background Image Size' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'initial' => 'Original',
				'cover' => 'Cover',
				'contain' => 'Contain',
			),
		));		

	$wp_customize->add_setting("ourteam_bg_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'ourteam_bg_color_control', 
			array(
				'label'      => __( 'Background Color', 'medical-rehab' ),
				'section'    => 'ourteam_background_section',
				'settings'   => 'ourteam_bg_color_setting',
			) ) 
		);			
*/
$wp_customize->add_section("ourteam_color_section", array(
	"title" => __("Our Team Colors", "medical-rehab"),
	"priority" => 3,
	"description" => "Our Team color setting",
	"active_callback" => "is_front_page",
	"panel" => "ourteam_panel",
));			


	$wp_customize->add_setting( "ourteam_heading_color_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'ourteam_heading_color_control',
			array(
				'label' => __( 'Heading Color', 'medical-rehab' ),
				'section' => 'ourteam_color_section',
				'settings' => 'ourteam_heading_color_setting'
			) )
		);

	$wp_customize->add_setting("ourteam_font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'ourteam_font_color_control', 
			array(
				'label'      => __( 'Content font color', 'medical-rehab' ),
				'section'    => 'ourteam_color_section',
				'settings'   => 'ourteam_font_color_setting',
			) ) 
		);
	
	$wp_customize->add_setting( "ourteam_link_color_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'ourteam_link_color_control',
			array(
				'label' => __( 'Link color', 'medical-rehab' ),
				'section' => 'ourteam_color_section',
				'settings' => 'ourteam_link_color_setting'
			) )
		);
		
	$wp_customize->add_setting( "ourteam_link_hover_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'ourteam_link_hover_control',
			array(
				'label' => __( 'Link hover color', 'medical-rehab' ),
				'section' => 'ourteam_color_section',
				'settings' => 'ourteam_link_hover_setting'
			) )
		);		


/*==================================
	Call To Action Customizer
==================================*/	

/* Call to Action Panel*/
$wp_customize->add_panel( 'cta_panel', array(
	'priority'       => 48,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Call-to-action area", 'medical-rehab'),
	'description'    => '',
) );

	
/* 3.1.0 Call to action section */
$wp_customize->add_section("cta1_content_section", array(
	"title" => __("CTA Content", "medical-rehab"),
	"priority" => 1,
	"description" => "Call to action setting.",
	"active_callback" => "is_front_page",
	"panel" => 'cta_panel'
));	
	
	/* 3.1.1 cta 1 visibility */
	$wp_customize->add_setting("cta1_setting_visibility",array(
		"default" => '1',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"cta1_control_visibility",
			array(
				"label" => __("Show call to action panel", "medical-rehab"),
				"section" => "cta1_content_section",
				"settings" => "cta1_setting_visibility",
				"type" => "checkbox",
			)
		));	

	/* 3.1.2 cta 1 setting for message */
	$wp_customize->add_setting("cta1_setting_message",array(
		"default" => 'TO FIND A TREATMENT CENTER, OR TO SPEAK WITH AN INTAKE COORDINATOR FOR A COMPLIMENTARY AND PRIVATE EVALUATION, CALL TODAY!',
		"type" => "theme_mod",
		
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"cta1_control_message",
			array(
				"label" => __("Call to action Message", "medical-rehab"),
				"section" => "cta1_content_section",
				"settings" => "cta1_setting_message",
				"type" => "textarea",
			)
		));
		
	/* 3.1.5 button label */
	$wp_customize->add_setting("cta1_link_text_setting", array(
		"default" => "Contact Us",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"cta1_link_text_control",
			array(
				"label" => __("Button label", "medical-rehab"),
				"section" => "cta1_content_section",
				"settings" => "cta1_link_text_setting",
				"type" => "text",
			)
		));			
		
	/* 3.1.6 button link */
	$wp_customize->add_setting("cta1_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
		
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"cta1_link_url_control",
			array(
				"label" => __("Button link", "medical-rehab"),
				"section" => "cta1_content_section",
				"settings" => "cta1_link_url_setting",
				"type" => "url",
			)
		));					

/* CTA Background Section*/
$wp_customize->add_section("cta1_background_section", array(
	"title" => __("CTA Background", "medical-rehab"),
	"priority" => 2,
	"description" => "CTA background setting",
	"active_callback" => "is_front_page",
	"panel" => "cta_panel"
));
	
	/* cta1 background image */
	$wp_customize->add_setting( 'cta1_img_setting', array(
		'default' => (get_template_directory_uri() .'/img/default-image/agsquare.png'),   
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
		//"transport" => "postMessage"
	) );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'cta1_img_control', 
				array(
					'label' => __( 'Upload Background Image', 'medical-rehab' ),
					'description' => __( 'Background image for banner', 'medical-rehab'),
					'section' => 'cta1_background_section',
					'settings' => 'cta1_img_setting',
				)
			) 
		);	
	
	/* cta1 background repeat */
	$wp_customize->add_setting("cta1_img_repeat_setting", array(
		"default" => "repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_repeat",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'cta1_img_repeat_control', array(
			'section' => 'cta1_background_section',
			'settings' => 'cta1_img_repeat_setting',
			'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'repeat' => 'repeat',
				'repeat-x' => 'Repeat Horizontal',
				'repeat-y' => 'Repeat Vertical',
				'no-repeat' => 'Do NOT Repeat',
			),
		));
	
	/* cta1 background position */
	$wp_customize->add_setting("cta1_img_position_setting", array(
		"default" => "center center",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_position",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'cta1_img_position_control', array(
			'section' => 'cta1_background_section',
			'settings' => 'cta1_img_position_setting',
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
	
	/* cta background size setting */
	$wp_customize->add_setting("cta1_img_size_setting", array(
		"default" => "initial",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_size",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control( 'cta1_img_size_control', array(
			'section' => 'cta1_background_section',
			'settings' => 'cta1_img_size_setting',
			'label'   => __( 'Background Image Size' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'initial' => 'Original',
				'cover' => 'Cover',
				'contain' => 'Contain',
			),
		));		
	
	/* 3.1.3 cta 1 setting for background color */
	$wp_customize->add_setting("cta1_setting_bg_color",array(
		"default" => '#E5E7E6',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'cta1_control_bg_color', 
			array(
				'label'      => __( 'Background Color', 'medical-rehab' ),
				'section'    => 'cta1_background_section',
				'settings'   => 'cta1_setting_bg_color',
			) ) 
		);	
	
		
$wp_customize->add_section("cta1_color_section", array(
	"title" => __("CTA Colors", "medical-rehab"),
	"priority" => 3,
	"description" => "Call to action color setting.",
	"active_callback" => "is_front_page",
	"panel" => 'cta_panel'
));	

	$wp_customize->add_setting("cta1_setting_font_color",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'cta1_control_font_color', 
			array(
				'label'      => __( 'Content font color', 'medical-rehab' ),
				'section'    => 'cta1_color_section',
				'settings'   => 'cta1_setting_font_color',
			) ) 
		);	

	/* cta 1 setting for button color */
	$wp_customize->add_setting("cta1_button_color_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'cta1_button_color_control', 
			array(
				'label'      => __( 'Button color', 'medical-rehab' ),
				'section'    => 'cta1_color_section',
				'settings'   => 'cta1_button_color_setting',
			) ) 
		);	

	/* cta 1 button font color */
	$wp_customize->add_setting("cta1_button_font_color",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'cta1_button_font_color_control', 
			array(
				'label'      => __( 'Button font color', 'medical-rehab' ),
				'section'    => 'cta1_color_section',
				'settings'   => 'cta1_button_font_color',
			) ) 
		);			
	


/*==================================
	6.0.0 Latest Article Customizer
==================================*/
$wp_customize->add_panel("latest_article_panel", array(
	'priority'       => 48,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Latest Article", 'medical-rehab'),
	'description'    => '',
));

$wp_customize->add_section("latest_article_color_setting", array(
	"title" => "Latest Article Color",
	"priority" => 2,
	"description" => __("Latest article color setting", "medical-rehab"),
	"active_callback" => "is_front_page",
	"panel" => "latest_article_panel"
));

	$wp_customize->add_setting("latest_article_heading_color_setting", array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			"latest_article_heading_color_control",
			array(
				"label" => __("Heading color","medical-rehab"),
				"section" => "latest_article_color_setting",
				"settings" => "latest_article_heading_color_setting"
			)
		));
		
	$wp_customize->add_setting("latest_article_text_color_setting", array(
		"default" => "#2f342c",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			"latest_article_text_color_control",
			array(
				"label" => __("Font color","medical-rehab"),
				"section" => "latest_article_color_setting",
				"settings" => "latest_article_text_color_setting"
			)
		));		
		
	$wp_customize->add_setting("latest_article_link_color_setting", array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			"latest_article_link_color_control",
			array(
				"label" => __("Link color","medical-rehab"),
				"section" => "latest_article_color_setting",
				"settings" => "latest_article_link_color_setting"
			)
		));		

	$wp_customize->add_setting("latest_article_link_hover_setting", array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			"latest_article_link_hover_control",
			array(
				"label" => __("Link hover color","medical-rehab"),
				"section" => "latest_article_color_setting",
				"settings" => "latest_article_link_hover_setting"
			)
		));				
		
		
	$wp_customize->add_setting("latest_article_button_color_setting", array(
		"default" => "#2f342c",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			"latest_article_button_color_control",
			array(
				"label" => __("Button color","medical-rehab"),
				"section" => "latest_article_color_setting",
				"settings" => "latest_article_button_color_setting"
			)
		));			
		
	$wp_customize->add_setting("latest_article_button_font_color", array(
		"default" => "#ffffff",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			"latest_article_button_font__color_control",
			array(
				"label" => __("Button font color","medical-rehab"),
				"section" => "latest_article_color_setting",
				"settings" => "latest_article_button_font_color"
			)
		));			
	
/* 6.1.0 Latest Article section */		
$wp_customize->add_section("latest_article_section", array(
	"title" => __("Latest Article Content", "medical-rehab"),
	"priority" => 1,
	"description" => "Frontpage Latest Article setting.",
	"active_callback" => "is_front_page",
	"panel" => "latest_article_panel"
));	

	/* 6.1.2 latest article visibility */
	$wp_customize->add_setting("article_content_visibility_setting",array(
		"default" => '1',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));

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
	
	/* 6.1.3 latest article heading */	
	$wp_customize->add_setting("latest_article_heading_setting", array(
		"default" => "Latest Article",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
		
	));	
	
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
		
	/* 6.1.4 latest article description */
	$wp_customize->add_setting("latest_article_description_setting", array(
		"default" => "Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));			
	
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

	/* 6.1.5 latest article button label */		
	$wp_customize->add_setting("latest_article_link_text_setting", array(
		"default" => "VIEW MORE",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));		
	
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

	/* 6.1.6 button link */	
	$wp_customize->add_setting("latest_article_link_url_setting", array(
		"default" => "#",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
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
/* 7.1.0 contact form panel */ 
$wp_customize->add_panel( 'contactform_panel', array(
	'priority'       => 49,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Contact us", 'medical-rehab'),
	'description'    => '',
) );
	
/* 7.2.0 contact form content section */
$wp_customize->add_section("contactform_content_section", array(
	"title" => __("Contact Us Content", "medical-rehab"),
	"priority" => 1,
	"description" => "Frontpage contact form content setting.",
	"active_callback" => "is_front_page",
	"panel" => 'contactform_panel'
));	
	
	/* 7.2.1 Contact form visibility */ 
	$wp_customize->add_setting("contactform_content_visibility_setting",array(
		"default" => '1',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));	

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
	
	/* 7.2.2 Contact form heading */	
	$wp_customize->add_setting("contactform_heading_setting", array(
		"default" => "Get In Touch",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));	

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
	
	/* 7.2.3 Contact form description */
	$wp_customize->add_setting("contactform_description_setting", array(
		"default" => "Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));			
	
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
	
/* 7.3.0 Contact form formsetting section */
$wp_customize->add_section("contactform_form_section", array(
	"title" => __("Form setting", "medical-rehab"),
	"priority" => 2,
	"description" => "Frontpage contact form setting.",
	"active_callback" => "is_front_page",
	"panel" => 'contactform_panel'
));	

	/* 7.3.1 Use Default contact form */	
	$wp_customize->add_setting("contactform_default_form_setting",array(
		"default" => '1',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));
	
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
		
	/* 7.3.2 Contact form email address */	
	$wp_customize->add_setting("contactform_email_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_text",
		"capability" => "edit_theme_options",
	));		

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
	
	/* 7.3.3 Contact form button label */
	$wp_customize->add_setting("contactform_submit_text_setting", array(
		"default" => "Submit",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_nohtml",
		"capability" => "edit_theme_options",
	));	
		
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

	$wp_customize->add_setting("contactform_button_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'contactform_button_color_control', 
			array(
				'label'      => __( 'Button color', 'medical-rehab' ),
				'section'    => 'contactform_form_section',
				'settings'   => 'contactform_button_color_setting',
			) ) 
		);	

	
	$wp_customize->add_setting("contactform_button_font_color",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'contactform_button_font_color_control', 
			array(
				'label'      => __( 'Button font color', 'medical-rehab' ),
				'section'    => 'contactform_form_section',
				'settings'   => 'contactform_button_font_color',
			) ) 
		);			
	
	/* 7.3.4 Contact shortcode field */
	$wp_customize->add_setting("contactform_shortcode_setting", array(
		"default" => "",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_text",
		"capability" => "edit_theme_options",
		
	));		
	
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
		
/* Background Section*/
$wp_customize->add_section("contactform_background_section", array(
	"title" => __("Contact Us Background", "medical-rehab"),
	"priority" => 3,
	"description" => "Contact Us background setting",
	"active_callback" => "is_front_page",
	"panel" => "contactform_panel"
));
	
	
	$wp_customize->add_setting( 'contactform_img_setting', array(
		"default" => (get_template_directory_uri() .'/img/default-image/agsquare.png'),   
		//"transport" => "postMessage",
		"sanitize_callback" => 'medicalrehab_sanitize_url',
	) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'contactform_img_control', 
				array(
					'label' => __( 'Upload Background Image', 'medical-rehab' ),
					'description' => __( 'Background image for contact panel.', 'medical-rehab'),
					'section' => 'contactform_background_section',
					'settings' => 'contactform_img_setting'
				) 
			) 
		);			
	
	/* 1.3.2 banner background repeat */
	$wp_customize->add_setting("contactform_img_repeat_setting", array(
		"default" => "repeat",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_repeat",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'contactform_img_repeat_control', array(
			'section' => 'contactform_background_section',
			'settings' => 'contactform_img_repeat_setting',
			'label'   => __( 'Background Image Repeat' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'repeat' => 'repeat',
				'repeat-x' => 'Repeat Horizontal',
				'repeat-y' => 'Repeat Vertical',
				'no-repeat' => 'Do NOT Repeat',
			),
		));		
	
	/* 1.3.3 banner background position */
	$wp_customize->add_setting("contactform_img_position_setting", array(
		"default" => "center center",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_position",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 'contactform_img_position_control', array(
			'section' => 'contactform_background_section',
			'settings' => 'contactform_img_position_setting',
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
	
	$wp_customize->add_setting("contactform_img_size_setting", array(
		"default" => "original",
		"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_image_size",
		"capability" => "edit_theme_options",
		
	));		
	
		$wp_customize->add_control( 'contactform_img_size_control', array(
			'section' => 'contactform_background_section',
			'settings' => 'contactform_img_size_setting',
			'label'   => __( 'Background Image Size' , 'medical-rehab'),
			'type'    => 'select',
			'choices'    => array(
				'initial' => 'Original',
				'cover' => 'Cover',
				'contain' => 'Contain',
			),
		));		

	$wp_customize->add_setting("contactform_bg_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'contactform_bg_color_control', 
			array(
				'label'      => __( 'Background Color', 'medical-rehab' ),
				'section'    => 'contactform_background_section',
				'settings'   => 'contactform_bg_color_setting',
			) ) 
		);	

$wp_customize->add_section("contactform_color_section", array(
	"title" => __("Contact Us Colors", "medical-rehab"),
	"priority" => 3,
	"description" => "Contact Us color setting",
	"active_callback" => "is_front_page",
	"panel" => "contactform_panel",
));			


	$wp_customize->add_setting( "contactform_heading_color_setting" , array(
		"default" => "#5d963f",
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options"
	));
	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'contactform_heading_color_control',
			array(
				'label' => __( 'Heading Color', 'medical-rehab' ),
				'section' => 'contactform_color_section',
				'settings' => 'contactform_heading_color_setting'
			) )
		);

	$wp_customize->add_setting("contactform_font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'contactform_font_color_control', 
			array(
				'label'      => __( 'Content font color', 'medical-rehab' ),
				'section'    => 'contactform_color_section',
				'settings'   => 'contactform_font_color_setting',
			) ) 
		);
		
		
/* 8.1.0 Footer panel */ 
$wp_customize->add_panel( 'footer_panel', array(
	'priority'       => 50,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __("Footer", 'medical-rehab'),
	'description'    => '',
) );

$wp_customize->add_section("footer_content_section", array(
	"title" => __("Footer Content", "medical-rehab"),
	"priority" => 1,
	"description" => "Footer Content",
	"panel" => 'footer_panel'
));	
	$sitename_copyright = "&copy; " . get_bloginfo( 'name' );
	$wp_customize->add_setting("footer_copyright_setting",array(
		"default" => $sitename_copyright,
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_text",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"footer_copyright_control",
			array(
				"label" => __("Copyright Text", "medical-rehab"),
				"section" => "footer_content_section",
				"settings" => "footer_copyright_setting",
				"type" => "text",
			)
		));	
	
$wp_customize->add_section("footer_top_section", array(
	"title" => __("Footer Top", "medical-rehab"),
	"priority" => 2,
	"description" => "Footer top setting.",
	"panel" => 'footer_panel'
));	
	
	$wp_customize->add_setting("footer_top_background_setting",array(
		"default" => '#5d963f',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_top_bg_color_control', 
			array(
				'label'      => __( 'Background color', 'medical-rehab' ),
				'section'    => 'footer_top_section',
				'settings'   => 'footer_top_background_setting',
			) ) 
		);		

	$wp_customize->add_setting("footer_top_heading_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_top_heading_color_control', 
			array(
				'label'      => __( 'Heading color', 'medical-rehab' ),
				'section'    => 'footer_top_section',
				'settings'   => 'footer_top_heading_color_setting',
			) ) 
		);

	$wp_customize->add_setting("footer_top_font_color_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_top_font_color_control', 
			array(
				'label'      => __( 'Font color', 'medical-rehab' ),
				'section'    => 'footer_top_section',
				'settings'   => 'footer_top_font_color_setting',
			) ) 
		);		
		
	$wp_customize->add_setting("footer_top_link_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_top_link_color_control', 
			array(
				'label'      => __( 'Link color', 'medical-rehab' ),
				'section'    => 'footer_top_section',
				'settings'   => 'footer_top_link_color_setting',
			) ) 
		);		
		
	$wp_customize->add_setting("footer_top_link_hover_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_top_link_hover_control', 
			array(
				'label'      => __( 'Link hover color', 'medical-rehab' ),
				'section'    => 'footer_top_section',
				'settings'   => 'footer_top_link_hover_setting',
			) ) 
		);
		
$wp_customize->add_section("footer_bottom_section", array(
	"title" => __("Footer Bottom", "medical-rehab"),
	"priority" => 2,
	"description" => "Footer bottom setting.",
	"panel" => 'footer_panel'
));			
		
	$wp_customize->add_setting("footer_bottom_background_setting",array(
		"default" => '#2f342c',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_bottom_bg_color_control', 
			array(
				'label'      => __( 'Background color', 'medical-rehab' ),
				'section'    => 'footer_bottom_section',
				'settings'   => 'footer_bottom_background_setting',
			) ) 
		);		


	$wp_customize->add_setting("footer_bottom_font_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_bottom_font_color_control', 
			array(
				'label'      => __( 'Font color', 'medical-rehab' ),
				'section'    => 'footer_bottom_section',
				'settings'   => 'footer_bottom_font_color_setting',
			) ) 
		);		
		
	$wp_customize->add_setting("footer_bottom_social_color_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_bottom_social_color_control', 
			array(
				'label'      => __( 'Social link color', 'medical-rehab' ),
				'section'    => 'footer_bottom_section',
				'settings'   => 'footer_bottom_social_color_setting',
			) ) 
		);		
		
	$wp_customize->add_setting("footer_bottom_social_hover_setting",array(
		"default" => '#ffffff',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "sanitize_hex_color",
		"capability" => "edit_theme_options",
		
	));	
	
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_bottom_social_hover_control', 
			array(
				'label'      => __( 'Social link hover color', 'medical-rehab' ),
				'section'    => 'footer_bottom_section',
				'settings'   => 'footer_bottom_social_hover_setting',
			) ) 
		);		
		
		
		
$wp_customize->add_section("socialmedia_content_section", array(
	"title" => __("Social", "medical-rehab"),
	"priority" => 50,
	"description" => "Social media link setting.",
));			
		
		
	$wp_customize->add_setting("socialmedia_fb_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_fb_link_control",
			array(
				"label" => __("Facebook Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_fb_link_setting",
				"type" => "url",
			)
		));	

	$wp_customize->add_setting("socialmedia_twitter_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_twitter_link_control",
			array(
				"label" => __("Twitter Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_twitter_link_setting",
				"type" => "url",
			)
		));			
		
	$wp_customize->add_setting("socialmedia_gplus_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_gplus_link_control",
			array(
				"label" => __("Google Plus Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_gplus_link_setting",
				"type" => "url",
			)
		));	

	$wp_customize->add_setting("socialmedia_linkedin_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_linkedin_link_control",
			array(
				"label" => __("Google Plus Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_linkedin_link_setting",
				"type" => "url",
			)
		));			
		
	$wp_customize->add_setting("socialmedia_pinterest_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_pinterest_link_control",
			array(
				"label" => __("Pinterest Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_pinterest_link_setting",
				"type" => "url",
			)
		));	

	$wp_customize->add_setting("socialmedia_youtube_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_youtube_link_control",
			array(
				"label" => __("YouTube Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_youtube_link_setting",
				"type" => "url",
			)
		));		
		
	$wp_customize->add_setting("socialmedia_dribble_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_dribble_link_control",
			array(
				"label" => __("Dribble Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_dribble_link_setting",
				"type" => "url",
			)
		));			

	$wp_customize->add_setting("socialmedia_tumblr_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_tumblr_link_control",
			array(
				"label" => __("Tumblr Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_tumblr_link_setting",
				"type" => "url",
			)
		));			
		
	$wp_customize->add_setting("socialmedia_instagram_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_instagram_link_control",
			array(
				"label" => __("Instagram Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_instagram_link_setting",
				"type" => "url",
			)
		));				

	$wp_customize->add_setting("socialmedia_reddit_link_setting",array(
		"default" => '#',
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_url",
		"capability" => "edit_theme_options",
	));	
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_reddit_link_control",
			array(
				"label" => __("Reddit Link", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_reddit_link_setting",
				"type" => "url",
			)
		));			
		
	$wp_customize->add_setting("socialmedia_link_target_setting",array(
		"default" => 1,
		"type" => "theme_mod",
		//"transport" => "postMessage",
		"sanitize_callback" => "medicalrehab_sanitize_checkbox",
		"capability" => "edit_theme_options",
	));		
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"socialmedia_link_target_control",
			array(
				"label" => __("Open link in new window", "medical-rehab"),
				"section" => "socialmedia_content_section",
				"settings" => "socialmedia_link_target_setting",
				"type" => "checkbox",
			)
		));			
		
		
}
add_action("customize_register","medicalrehab_customize_register");

//Output Customize CSS
function medicalrehab_customize_css(){?>

<?php 
	/*$default_banner_img = MEDICALREHAB_BANNER_IMAGE_DEFAULT;

	$banner_image_src = wp_get_attachment_image_src( absint( get_theme_mod( 'banner_img_setting' ) ), 'full' ); 
	$banner_image_position = get_theme_mod('banner_img_position_setting');
	$banner_image_position = str_replace("-", " ", $banner_image_position);

	$banner_image = "";
	if(!empty($banner_image_src)){
		$banner_image = $banner_image_src[0];
	}else{
		$banner_image = $default_banner_img;
		
	}*/
	
	$banner_image_position = get_theme_mod('banner_img_position_setting');
	$banner_image_position = str_replace("-", " ", $banner_image_position);	
	
	$testimonial_image_position = get_theme_mod('testimonial_img_position_setting');
	$testimonial_image_position = str_replace("-", " ", $testimonial_image_position);	

?>

<style type="text/css" id="medicalrehab_customizer">

<?php 

/*$style = "";
$style .= "#masthead{";
$style .= "background-color:".get_theme_mod('header_bg_color_setting', '#E9E9E9').";";
$style .= "color:".get_theme_mod('header_font_color_setting', '#5d963f').";";
$style .= "} ";
	
$style .= "#main_banner{";
$style .= "background-repeat:".get_theme_mod('banner_img_repeat_setting', 'no-repeat').";";
$style .= "background-size:".get_theme_mod('banner_img_size_setting', 'initial').";";
$style .= "background-position:".get_theme_mod('banner_img_position_setting', 'center top').";";
$style .= "color:".get_theme_mod('banner_font_color_setting', '#2f342c').";";
$style .= "} ";

echo $style;
*/
?>

body, html{
	color:<?php echo get_theme_mod('font_color_setting', '#2f342c'); ?>;
}

a, a:link, .widget ul li cite:before, .widget_categories ul li ul li:before, .widget_pages ul li ul li:before{
	color:<?php echo get_theme_mod('link_color_setting', '#5d963f'); ?>;
}

a:hover, a:active{
	color:<?php echo get_theme_mod('link_hover_color_setting', '#5d963f'); ?>;
}

a:visited{
	color:<?php echo get_theme_mod('link_visited_color_setting', '#5d963f'); ?>;
}


button, input[type="button"], input[type="reset"], input[type="submit"], .btn, .widget .calendar_wrap table caption, .widget .calendar_wrap table tfoot, a.comment-edit-link, a.comment-reply-link{
	background-color:<?php echo get_theme_mod('accent_bg_color_setting', '#5d963f'); ?>;
}

button, input[type="button"], input[type="reset"], input[type="submit"], .widget .calendar_wrap table caption, .widget .calendar_wrap table tfoot a, a.comment-edit-link, a.comment-reply-link, a.comment-reply-link:visited .master-header .search-form .search-submit:before{
	color:<?php echo get_theme_mod('accent_font_color_setting', '#ffffff'); ?>;
}

.master-nav-wrapper, .master-nav .navbar-collapse, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus{
	background-color: <?php echo get_theme_mod('nav_bg_color_setting', '#5d963f'); ?>;
}	

.master-nav .navbar-brand,
.master-nav.navbar-inverse .navbar-brand:focus{
	background-color: <?php echo get_theme_mod('nav_home_bg_color_setting', '#2e332b'); ?>;
}

.master-nav .navbar-brand:hover{
	background-color: <?php echo get_theme_mod('nav_home_hover_color_setting', '#2e332b'); ?>;
}

.master-nav .navbar-brand span{
	color:<?php echo get_theme_mod('nav_homefont_bg_color_setting', '#ffffff'); ?>;
}

.master-nav .navbar-brand:hover span{
	color:<?php echo get_theme_mod('nav_homefont_hover_color_setting', '#ffffff'); ?>;
}

.master-nav.navbar-inverse .navbar-nav > li > a{
	color:<?php echo get_theme_mod('nav_link_color_setting', '#ffffff'); ?>;
}

.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus,.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus{
	color:<?php echo get_theme_mod('nav_link_hover_setting', '#ffffff'); ?>!important;
}

.master-nav-wrapper .content2 .content2-1 a{
	color:<?php echo get_theme_mod('nav_text_color_setting', '#ffffff'); ?>;
} 

	
#main_banner{
	background-repeat:<?php echo get_theme_mod('banner_img_repeat_setting', 'no-repeat'); ?>;
	background-size: <?php echo get_theme_mod('banner_img_size_setting', 'initial'); ?>;
	background-position:<?php echo get_theme_mod('banner_img_position_setting', 'center top'); ?>;
	color:<?php echo get_theme_mod('banner_font_color_setting', '#2f342c'); ?>;
}

#banner_link_text{
	background-color:<?php echo get_theme_mod('banner_button_color_setting', '#2f342c'); ?>;
	color:<?php echo get_theme_mod('banner_button_font_color', '#ffffff'); ?>;
}	

#cta1_panel{
	background-repeat:<?php echo get_theme_mod('cta1_img_repeat_setting', 'repeat'); ?>;
	background-size: <?php echo get_theme_mod('cta1_img_size_setting', 'initial'); ?>;
	background-position:<?php echo get_theme_mod('cta1_img_position_setting', 'center center'); ?>;
	color:<?php echo get_theme_mod('cta1_setting_font_color', '#2f342c'); ?>;
}
	
#cta1_link_text{
	background-color:<?php echo get_theme_mod('cta1_button_color_setting', '#5d963f'); ?>;
	color:<?php echo get_theme_mod('cta1_button_font_color', '#ffffff'); ?>;
}

#services_panel{
	color:<?php echo get_theme_mod('services_font_color_setting','#2f342c'); ?>;
}

#services_panel .panel-heading{
	color:<?php echo get_theme_mod('services_heading_color_setting', '#5d963f'); ?>;
}

#services_panel a{
	color:<?php echo get_theme_mod('services_link_color_setting', '#5d963f'); ?>;
}

#services_panel a:hover{
	color:<?php echo get_theme_mod('services_link_hover_setting', '#5d963f'); ?>;
}

#ourteam_panel{
	color:<?php echo get_theme_mod('ourteam_font_color_setting', '#2f342c'); ?>;
}

#ourteam_panel .panel-heading{
	color:<?php echo get_theme_mod('ourteam_heading_color_setting', '#5d963f'); ?>;
}

#ourteam_panel a{
	color:<?php echo get_theme_mod('ourteam_link_color_setting', '#5d963f'); ?>;
}

#ourteam_panel a:hover{
	color:<?php echo get_theme_mod('ourteam_link_hover_setting', '#5d963f'); ?>;
}	

#testimonial_panel{
	background-repeat:<?php echo get_theme_mod('testimonial_img_repeat_setting', 'no-repeat'); ?>;
	background-size: <?php echo get_theme_mod('testimonial_img_size_setting', 'initial'); ?>;
	background-position:<?php echo get_theme_mod('testimonial_img_position_setting', 'center top'); ?>;
	color:<?php echo get_theme_mod('testimonial_font_color_setting', '#2f342c'); ?>;
}

#testimonial_panel a{
	color:<?php echo get_theme_mod('testimonial_link_color_setting', '#5d963f'); ?>;
}

#testimonial_panel a:hover{
	color:<?php echo get_theme_mod('testimonial_link_hover_setting', '#5d963f'); ?>!important;
}

#latest_article_panel,
.article-listbox .entry-content{
	color:<?php echo get_theme_mod('latest_article_text_color_setting', '#2f342c'); ?>;
}

.article-listbox a{
	color:<?php echo get_theme_mod('latest_article_link_color_setting', '#5d963f'); ?>;
}

.article-listbox a:hover{
	color:<?php echo get_theme_mod('latest_article_link_cover_setting', '#5d963f'); ?>;
}

#latest_article_panel .panel-heading{
	color:<?php echo get_theme_mod('latest_article_heading_color_setting', '#5d963f'); ?>;
}

.article-listbox a{
	color:<?php echo get_theme_mod('latest_article_link_color_setting', '#5d963f'); ?>;	
}

.article-listbox a:hover{
	color:<?php echo get_theme_mod('latest_article_link_hover_setting', '#5d963f'); ?>;	
}

#latest_article_panel #article_link_text{
	background-color:<?php echo get_theme_mod('latest_article_button_color_setting', '#2f342c'); ?>;	
	color:<?php echo get_theme_mod('latest_article_button_font_color', '#ffffff'); ?>;		
}

#contact_panel{
	background-repeat:<?php echo get_theme_mod('contactform_img_repeat_setting', 'repeat'); ?>;
	background-size: <?php echo get_theme_mod('contactform_img_size_setting', 'initial'); ?>;
	background-position:<?php echo get_theme_mod('contactform_img_position_setting', 'center center'); ?>;	
	color:<?php echo get_theme_mod('contactform_font_color_setting', '#2f342c'); ?>;		
}

#contact_panel .panel-heading{
	color:<?php echo get_theme_mod('contactform_heading_color_setting', '#5d963f'); ?>;
}

#contact_submit{
	background-color:<?php echo get_theme_mod('contactform_button_color_setting', '#2f342c'); ?>;
	color:<?php echo get_theme_mod('contactform_button_font_color', '#ffffff'); ?>;
}

#footer_top{
	background-color:<?php echo get_theme_mod('footer_top_background_setting', '#5d963f'); ?>;
	color:<?php echo get_theme_mod('footer_top_font_color_setting', '#2f342c'); ?>;		
}

#footer_top h1,
#footer_top h2,
#footer_top h3,
#footer_top h4,
#footer_top h5,
#footer_top h6{
	color:<?php echo get_theme_mod('footer_top_heading_color_setting', '#ffffff'); ?>;
}

#footer_top a{
	color:<?php echo get_theme_mod('footer_top_link_color_setting', '#ffffff'); ?>;
}

#footer_top a:hover{
	color:<?php echo get_theme_mod('footer_top_link_hover_setting', '#ffffff'); ?>;
}


#footer_bottom{
	background-color:<?php echo get_theme_mod('footer_bottom_background_setting'); ?>;
	color:<?php echo get_theme_mod('footer_bottom_font_color_setting', '#ffffff'); ?>;	
}	
	
#footer_bottom a{
	color:<?php echo get_theme_mod('footer_bottom_social_color_setting', '#ffffff'); ?>;
}

#footer_bottom a:hover{
	color:<?php echo get_theme_mod('footer_bottom_social_hover_setting', '#ffffff'); ?>;
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