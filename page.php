<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
    <!-- Contents -->    
		<div class="container master-subpage-contents">
			<div class="row p-t40 p-b40">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-push-3">
				  <?php while(have_posts()) : the_post();  ?>   
					<?php get_template_part( 'content', 'page' ); ?>
					
					<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					
				  <?php endwhile; ?>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-md-pull-6 left-sidebar-wrapper">
					<aside class="master-sidebar-left">
						<?php get_sidebar( 'left' ); ?>
					</aside>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 right-sidebar-wrapper">
					<aside class="master-sidebar-right">
						<?php get_sidebar( 'right' ); ?>
					</aside>
				</div>
			</div>

		</div>
    </main>   
</div>


<?php get_footer(); ?>