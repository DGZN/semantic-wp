<?php
$testimonial_bg_color = get_theme_mod( 'testimonial_bg_color_setting', '#fff' );

$default_testimonial_img = esc_url(get_template_directory_uri() .'/img/default-image/testimonial-background.jpg');

$testimonial_background = get_theme_mod( 'testimonial_img_setting', $default_testimonial_img );

?>

<?php /* TODO: need fallback for inactive sidebar */ ?>
<div id="testimonial_panel" style="<?php echo !empty($testimonial_background) ? "background-image: url(" . $testimonial_background . ");" : "background-color:" . $testimonial_bg_color ; ?>">
	<div class="container p-t50 p-b50">
		<div class="row">
			<div class="col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-5 col-xs-10 col-xs-offset-2 p-t50">
				<div id="testimonial_slider">
					<?php /* displays the testimonial widget */
					if ( is_active_sidebar( 'sidebar-testimonials' ) ) :
						dynamic_sidebar( 'sidebar-testimonials' );
					else:	
						the_widget( 'medicalrehab_testimonial','title=Lucky Cabarlo&author_link=#&author_details=Web Developer&text=Lorem ipsum dolor sit amet, ex aeterno vivendo cum, mel tamquam intellegat cu. An case saepe senserit per, at nec tritani omittam contentiones. Mea id modo comprehensam, his aliquip accusata ex. Mel ea hinc illud putent. Pri nihil praesent no, nam odio alia dolore no. Usu ei volutpat praesent mediocritatem, eius nostro efficiantur ut per.&image_uri='.get_template_directory_uri().'/img/default-image/author4.png', array('before_widget' => '', 'after_widget' => '') );
						
						the_widget( 'medicalrehab_testimonial','title=Juchel De Leon&author_link=#&author_details=SEO Manager&text=Lorem ipsum dolor sit amet, ex aeterno vivendo cum, mel tamquam intellegat cu. An case saepe senserit per, at nec tritani omittam contentiones.&image_uri='.get_template_directory_uri().'/img/default-image/author3.png', array('before_widget' => '', 'after_widget' => '') );
						
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>