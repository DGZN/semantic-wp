<div id="ourteam_panel">
	<div class="container text-center p-t50 p-b50">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
			<?php $medicalrehab_ourteam_heading = get_theme_mod('ourteam_heading_setting',__( 'MEET OUR TEAM' ,'medical-rehab')); 
				if( !empty($medicalrehab_ourteam_heading) ):
				echo '<h2 class="panel-heading">'.wp_kses_post( $medicalrehab_ourteam_heading ).'</h2>';
				endif;
			?>
					
			<?php $medicalrehab_ourteam_description = get_theme_mod('ourteam_description_setting', 'Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.'); 
				if( !empty($medicalrehab_ourteam_description) ):
				echo '<div class="panel-description">'.wp_kses_post( $medicalrehab_ourteam_description ).'</div>';
				endif;
			?>
			</div>
		</div>
		<div class="row">
			<?php /* displays the ourteam widget */
			if ( is_active_sidebar( 'sidebar-ourteam' ) ) :
				dynamic_sidebar( 'sidebar-ourteam' );
				
				else:
				
				the_widget( 'medicalrehab_ourteam','title=ASHLEY SIMMONS&author_link=#&author_position=CEO&image_uri='.get_template_directory_uri().'/img/default-image/author1.png&fb_link=#&gplus_link=#&twitter_link=#&linkedin_link=#', array('before_widget' => '', 'after_widget' => '') );
				
				the_widget( 'medicalrehab_ourteam','title=KENDRICK ESCOTE&author_link=#&author_position=Project Manager&image_uri='.get_template_directory_uri().'/img/default-image/author2.png&fb_link=#&gplus_link=#&twitter_link=#&linkedin_link=#', array('before_widget' => '', 'after_widget' => '') );
				
				the_widget( 'medicalrehab_ourteam','title=JUCHEL DE LEON&author_link=#&author_position=SEO Manager&image_uri='.get_template_directory_uri().'/img/default-image/author3.png&fb_link=#&gplus_link=#&twitter_link=#&linkedin_link=#', array('before_widget' => '', 'after_widget' => '') );
				
				the_widget( 'medicalrehab_ourteam','title=LUCKY CABARLO&author_link=#&author_position=Web Developer&image_uri='.get_template_directory_uri().'/img/default-image/author4.png&fb_link=#&gplus_link=#&twitter_link=#&linkedin_link=#', array('before_widget' => '', 'after_widget' => '') );
				
			endif;
			?>
		</div>
	</div>
</div>