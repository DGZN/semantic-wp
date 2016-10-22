<?php
/*
 * Template Name: Blog Page Template
 * Description: Custom blog page template
 */
 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- Contents -->    
		<div class="container master-subpage-contents">
			<!-- Contents 01 -->    
			<div class="row p-t40 p-b40 content1">
				<div class="col-sm-12 col-md-9 col-lg-9">
					<div class="row">
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
						$args = array(
							'post_type' => 'post',
							'order' => 'DESC',
							'paged' => get_query_var('paged') 
						);          
						$blog_query = new WP_Query( $args );
						// The Loop
						if ( $blog_query->have_posts() ) :
						while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							?>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<div class="col-md-12">
							<div class="nav-previous alignleft"><?php next_posts_link('&laquo; Older posts', $blog_query->max_num_pages) ?></div>
							<div class="nav-next alignright"><?php previous_posts_link('Newer posts &raquo;') ?></div>
						</div>
						<?php else: ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</div>
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