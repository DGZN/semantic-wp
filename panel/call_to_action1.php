<?php
$default_cta_img = esc_url(get_template_directory_uri() .'/img/default-image/agsquare.png');

$cta_background = get_theme_mod( 'cta1_img_setting', $default_cta_img ); 

$cta_bg_color = get_theme_mod( 'cta1_setting_bg_color', '#E5E7E6' );
	
?>
<div id="cta1_panel" class="content1" style="<?php echo !empty($cta_background) ? "background-image: url(" . $cta_background . ");" : "background-color:" . $cta_bg_color ; ?>">
	<div class="container text-center p-t50 p-b50">
		<p id="cta1_content" class="f30 content1-1 f-w100">
			<?php 
				$medicalrehab_cta1_content = get_theme_mod('cta1_setting_message',__( 'TO FIND A TREATMENT CENTER, OR TO SPEAK WITH AN INTAKE COORDINATOR FOR A COMPLIMENTARY AND PRIVATE EVALUATION, CALL TODAY!' ,'medical-rehab')); 
				
				if( !empty($medicalrehab_cta1_content) ):
					echo do_shortcode($medicalrehab_cta1_content); 
				endif;			

			?>
		</p>
		<?php 
			$medicalrehab_cta1_link_text = get_theme_mod('cta1_link_text_setting',__( 'Contact Us' ,'medical-rehab')); 
			$medicalrehab_cta1_link = get_theme_mod('cta1_link_url_setting', "#"); 
		
				if( !empty($medicalrehab_cta1_link_text) ):
				
					echo '<div id="cta1_link"><a href="' . esc_url($medicalrehab_cta1_link) . '" class="btn btn-md" id="cta1_link_text" role="button">'. $medicalrehab_cta1_link_text .'</a></div>
					';
				
				endif;
		
		?>
	</div>
</div>