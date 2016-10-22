<?php
get_header(); 
if ( get_option( 'show_on_front' ) == 'page' ) {
	
    include( get_page_template() );
	
}else {

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- Master Slider -->
		<?php 
			/*
			 * MAIN BANNER PANEL
			 */
			$medicalrehab_banner_show = get_theme_mod('banner_content_visibility_setting', 1);

			if( isset($medicalrehab_banner_show) && $medicalrehab_banner_show == 1 ):

			get_template_part( 'panel/banner' );

			endif;		
		?>

		<!-- master content -->    
		<div class="master-contents">
		
			<?php
				/* 
				 * SERVICES PANEL 
				 */
				$medicalrehab_services_show = get_theme_mod('services_content_visibility_setting', 1);
			
				if( isset($medicalrehab_services_show) && $medicalrehab_services_show == 1 ):

				get_template_part( 'panel/services' );

				endif;		
			?>		
			
			<?php
				/* 
				 * TESTIMONIAL PANEL 
				 */
				$medicalrehab_testimonial_show = get_theme_mod('testimonial_content_visibility_setting', 1);
			
				if( isset($medicalrehab_testimonial_show) && $medicalrehab_testimonial_show == 1 ):

				get_template_part( 'panel/testimonials' );

				endif;		
			?>				
			
			<?php
				/* 
				 * OUR TEAM PANEL 
				 */
				$medicalrehab_ourteam_show = get_theme_mod('ourteam_content_visibility_setting', 1);
			
				if( isset($medicalrehab_ourteam_show) && $medicalrehab_ourteam_show == 1 ):

				get_template_part( 'panel/team' );

				endif;		
			?>		

	

			<?php 
				/*
				 * CALL TO ACTION 1 PANEL
				 */
				$medicalrehab_cta1_show = get_theme_mod('cta1_setting_visibility', 1);

				if( isset($medicalrehab_cta1_show) && $medicalrehab_cta1_show == 1 ):

				get_template_part( 'panel/call_to_action1' );

				endif;		
			?>			
			
			
			<?php
				/* 
				 * LATEST ARTICLE PANEL 
				 */
				$medicalrehab_latest_article_show = get_theme_mod('article_content_visibility_setting', 1);
			
				if( isset($medicalrehab_latest_article_show) && $medicalrehab_latest_article_show == 1 ):

				get_template_part( 'panel/latest_article' );

				endif;		
			?>	

			<?php
				/* 
				 * CONTACT FORM PANEL 
				 */
				$medicalrehab_contactform_show = get_theme_mod('contactform_content_visibility_setting', 1);
			
				if( isset($medicalrehab_contactform_show) && $medicalrehab_contactform_show == 1 ):
				
					get_template_part( 'panel/contact' );

				endif;		
			?>
			
		</div>
	</main>	
</div>
<?php 
}
get_footer(); 
?>