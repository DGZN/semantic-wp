<?php
$contactform_bg_color = get_theme_mod( 'contactform_bg_color_setting', '#fff' );

$contactform_banner_img = esc_url(get_template_directory_uri() .'/img/default-image/agsquare.png');

$contactform_background = get_theme_mod( 'contactform_img_setting', $contactform_banner_img );

?>

<div id="contact_panel" style="<?php echo !empty($contactform_background) ? "background-image: url(" . $contactform_background . ");" : "background-color:" . $contactform_bg_color ; ?>">
	<div class="container p-t50 p-b50">
		<div class="row">
			<div class="col-md-12 clearfix">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
					<?php $medicalrehab_contactform_heading = get_theme_mod('contactform_heading_setting',__( 'Get In Touch' ,'medical-rehab')); 
					
						if( !empty($medicalrehab_contactform_heading) ):
						
							echo '<h2 class="panel-heading">'.wp_kses_post( $medicalrehab_contactform_heading ).'</h2>';
							
						endif;
					?>
							
					<?php $medicalrehab_contactform_description = get_theme_mod('contactform_description_setting', 'Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.'); 
					
						if( !empty($medicalrehab_contactform_description) ):
						
							echo '<div class="panel-description">'.wp_kses_post( $medicalrehab_contactform_description ).'</div>';
						
						endif;
					?>
					</div>
				</div>
			</div>
			<?php
			$medicalrehab_default_contactform_show = get_theme_mod('contactform_default_form_setting', 1);
		
			if( isset($medicalrehab_default_contactform_show) && $medicalrehab_default_contactform_show == 1 ): ?>

			<div id="default_contactform" class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<form id="contact_form" class="form-horizontal">
					<div class="notification"></div>
					<div class="form-group p-r15 p-l15">
						<label class="control-label" for="contact_name">Name</label> 
						<input id="contact_name" name="contact_name" class="form-control" placeholder="" type="text" required="">
					</div>

					<div class="form-group p-r15 p-l15">
						<label class="control-label" for="contact_email">Email</label> 
						<input id="contact_email" name="contact_email" class="form-control" placeholder="" type="text" required="">
					</div>

					<div class="form-group p-r15 p-l15">
						<label class="control-label" for="contact_subject">Subject</label> 
						<input id="contact_subject" name="contact_subject" class="form-control" placeholder="" type="text" required="">
					</div>

					<div class="form-group p-r15 p-l15">
						<label class="control-label" for="contact_message">Message</label> 
						<textarea class="form-control" id="contact_message" name="contact_message" rows="8" placeholder="Message"></textarea>
					</div>

					<div class="form-group text-right p-r15 p-l15">
						<?php 
							$submit_btn = get_theme_mod('contactform_submit_text_setting', 'Submit'); 
							if(empty($submit_btn)){
								$submit_btn = "Submit";
							}
						?>
						<button id="contact_submit" data-loading-text="Sending..." class="btn btn-black btn-md" autocomplete="off"><?php echo $submit_btn; ?></button>
					</div>
				</form>
			</div>	

			<?php else: ?>
				<div class="col-md-12 clearfix">	
					<?php
						$medicalrehab_contactform_shortcode = get_theme_mod('contactform_shortcode_setting', '');
				
						if( !empty($medicalrehab_contactform_shortcode) ):
							
							echo do_shortcode($medicalrehab_contactform_shortcode);
							
						endif;
					?>
				</div>		
			<?php endif; ?>
		</div>
	</div>
</div>