<div id="latest_article_panel">
	<div class="container p-t50 p-b50">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
			
				<?php $medicalrehab_latest_article_heading = get_theme_mod('latest_article_heading_setting',__( 'Latest Article' ,'medical-rehab')); 
					if( !empty($medicalrehab_latest_article_heading) ):
					echo '<h2 class="panel-heading">'.wp_kses_post( $medicalrehab_latest_article_heading ).'</h2>';
					endif;
				?>
						
				<?php $medicalrehab_latest_article_description = get_theme_mod('latest_article_description_setting', __( 'Lorem ipsum dolor sit amet, per nemore referrentur eu. Dico petentium vis ut, his nisl falli sapientem cu. Sea ei solum sonet atomorum, et sit adhuc deseruisse, usu at quod invidunt.', 'medical-rehab' )); 
					if( !empty($medicalrehab_latest_article_description) ):
					echo '<div class="panel-description">'.wp_kses_post( $medicalrehab_latest_article_description ).'</div>';
					endif;
				?>
			</div>
		</div>
		<div class="row">
			<?php
				$frontpage_loop = new WP_Query(array(
					"post" => "post",
					'posts_per_page' => 4, 
					'order' => 'DESC',
					'ignore_sticky_posts' => true
				));
			
			
				if ( $frontpage_loop->have_posts() ) : 
					while ( $frontpage_loop->have_posts() ) : $frontpage_loop->the_post(); 
					
						get_template_part( 'content', 'frontpage' );
			
					endwhile;
					
				else: 
				
					get_template_part( 'content', 'none' );
					
				endif;
				
				wp_reset_postdata();
			?>
		</div>	
	<?php 
		$medicalrehab_article_link_text = get_theme_mod('latest_article_link_text_setting',__( 'VIEW MORE' ,'medical-rehab')); 
		$medicalrehab_article_link = get_theme_mod('latest_article_link_url_setting', "#"); 
	
			if( !empty($medicalrehab_article_link_text) ):
				echo '<div class="row"><div class="col-md-12 text-center">';
				
				echo '<div id="article_more_link"><a href="' . esc_url($medicalrehab_article_link) . '" class="btn btn-black btn-lg" id="article_link_text" id="article_link_text" role="button">'. $medicalrehab_article_link_text .'</a></div>
				';
				
				echo '</div></div>';
			
			endif;
	
	?>			
	</div>
</div>