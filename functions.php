<?php

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if( ! function_exists( 'blank_setup' ) ):
function blank_setup() {

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	if ( function_exists('add_theme_support') ) {
		add_theme_support('post-thumbnails');
		add_image_size('120-60-hard',120,60,true);
		add_image_size('360-240-hard',360,240,true);
		add_image_size('420-240-hard',420,240,true);
		add_image_size('555-240-hard',555,240,true);
		add_image_size('960-640-hard',960,640,true);
	}

	if(!function_exists('register_blank_menus')){
		function register_blank_menus() {
		   register_nav_menus(
		  array(
		  'main_menu' => __( 'Main Menu', 'blank-template' ),
		  //'footer_menu' => __( 'Footer Menu', 'blank-template' )
		  )
		  );
		}
	}
	add_action( 'init', 'register_blank_menus' );

	/*Register Custom Navigation Walker*/
	if(!function_exists('main_menu_nav')){
		function main_menu_nav() {
		  wp_nav_menu( array(
			'theme_location'    => 'main_menu',
			'depth'             => 2, /*bootstrap 3 only support 2 depths*/
			'container'         => '',
			'container_class'   => '',
      'items_wrap'        => '<div id="%1$s" class="%2$s">%3$s</div>',
			'container_id'      => 'bs-example-navbar-collapse-1',
			'menu_class'        => 'ui secondary pointing stackable fixed menu',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker())
		  );
		}
	}

	if(!function_exists('footer_menu_nav')){
		function footer_menu_nav() {
		  wp_nav_menu( array('theme_location' => 'footer_menu','container' => '','items_wrap' => '%3$s'));
		}
	}

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

}
endif; // blank_setup
add_action( 'after_setup_theme', 'blank_setup' );

/**
 * Enqueue scripts and styles.
 */
function blank_scripts() {

  wp_register_script('semantic', get_template_directory_uri() .'/js/semantic.js',array('jquery'),'3.3.2',true);

	wp_register_script('mainjs',  get_template_directory_uri() ."/js/theme_js/main.js",array('jquery'),'',true);

	wp_enqueue_script( array('jquery','semantic', 'mainjs') );

	wp_enqueue_script( array('jquery','semantic') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if( is_front_page() ){


	}

	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '4.5.0');

  wp_enqueue_style('semantic', get_template_directory_uri() . '/css/semantic.min.css', '', '3.3.2');

	wp_enqueue_style('main-css', get_stylesheet_uri(), '', '012516');

}

add_action('wp_enqueue_scripts', 'blank_scripts');

/**
 * breadcrumbs
 */
include('inc/bootstrap-breadcrumbs-v2.php');

/**
 * Wp navigation menu nav walker for bootstrap
 */

require_once('inc/wp_bootstrap_navwalker.php');

/**
 * template tags
 */

require_once('inc/template-tags.php');
