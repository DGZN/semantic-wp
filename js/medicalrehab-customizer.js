jQuery(document).ready(function($) {
	/* Move our services widgets area in services panel */
	wp.customize.section( 'sidebar-widgets-sidebar-services' ).panel( 'services_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-services' ).priority( '4' ); 	
	
	/* Move our ourteam widgets area in our team panel */
	wp.customize.section( 'sidebar-widgets-sidebar-ourteam' ).panel( 'ourteam_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-ourteam' ).priority( '4' ); 	
	
	/* Move our ourteam widgets area in our team panel */
	wp.customize.section( 'sidebar-widgets-sidebar-testimonials' ).panel( 'testimonial_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-testimonials' ).priority( '4' ); 

	wp.customize.section( 'sidebar-widgets-medical-rehab-footer-1' ).panel( 'footer_panel' );
	wp.customize.section( 'sidebar-widgets-medical-rehab-footer-1' ).priority( '4' ); 

	wp.customize.section( 'sidebar-widgets-medical-rehab-footer-2' ).panel( 'footer_panel' );
	wp.customize.section( 'sidebar-widgets-medical-rehab-footer-2' ).priority( '5' ); 

	wp.customize.section( 'sidebar-widgets-medical-rehab-footer-3' ).panel( 'footer_panel' );
	wp.customize.section( 'sidebar-widgets-medical-rehab-footer-3' ).priority( '6' ); 	
	
});