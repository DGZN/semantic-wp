<?php /* TODO: need fallback for inactive sidebar */ ?>
<div id="services_panel">
	<div class="container text-center p-t50 p-b50">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
			<?php $medicalrehab_services_heading = get_theme_mod('services_heading_setting',__( 'SERVICES' ,'medical-rehab')); 
				if( !empty($medicalrehab_services_heading) ):
				echo '<h2 class="panel-heading">'.wp_kses_post( $medicalrehab_services_heading ).'</h2>';
				endif;
			?>
					
			<?php $medicalrehab_services_description = get_theme_mod('services_description_setting', 'Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.'); 
				if( !empty($medicalrehab_services_description) ):
				echo '<div class="panel-description">'.wp_kses_post( $medicalrehab_services_description ).'</div>';
				endif;
			?>
			</div>
		</div>
		<div class="row">
			<?php /* displays the services widget */
			if ( is_active_sidebar( 'sidebar-services' ) ) :
				dynamic_sidebar( 'sidebar-services' );
			
			else:
				the_widget( 'medicalrehab_services','title=Alcohol Rehab&description=Lorem ipsum dolor sit amet, ex aeterno vivendo cum, mel tamquam intellegat cu. An case saepe senserit per, at nec tritani omittam contentiones.&link=#&image_uri='.get_template_directory_uri().'/img/default-image/services-img1.jpg', array('before_widget' => '', 'after_widget' => '') );
				
				the_widget( 'medicalrehab_services','title=Intervention&description=Lorem ipsum dolor sit amet, ex aeterno vivendo cum, mel tamquam intellegat cu. An case saepe senserit per, at nec tritani omittam contentiones.&link=#&image_uri='.get_template_directory_uri().'/img/default-image/services-img2.jpg', array('before_widget' => '', 'after_widget' => '') );

				the_widget( 'medicalrehab_services','title=Detox&description=Lorem ipsum dolor sit amet, ex aeterno vivendo cum, mel tamquam intellegat cu. An case saepe senserit per, at nec tritani omittam contentiones.&link=#&image_uri='.get_template_directory_uri().'/img/default-image/services-img3.jpg', array('before_widget' => '', 'after_widget' => '') );				
				
			endif;
			?>
		</div>
	</div>
</div>