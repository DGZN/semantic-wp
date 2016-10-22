<?php 
/*
Template Name: Full Width Template
*/
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- Contents -->    
		<div class="container master-subpage-contents">
			
			<!-- Contents 01 -->    
			<div class="row p-t40 p-b40 content1">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<?php while(have_posts()) : the_post();  ?>   
						<?php get_template_part( 'content', 'page' ); ?>
						<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</main>
</div>

<?php get_footer(); ?>