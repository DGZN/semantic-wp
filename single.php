<?php
/**
 * The template for displaying all single posts.
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="master-subpage-contents">	
			<div class="container">
				<!-- Contents 01 -->    
				<div class="row p-t40 p-b40 content1">
					<div class="col-sm-12 col-md-9 col-lg-9">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'single' ); ?>
							
							<?php medicalrehab_post_nav(); ?>
							
							<?php if ( comments_open() || get_comments_number() ) : ?>
							
							<div id="comments" class = "f18 comment_header p-b10">
								<span><?php echo comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
							</div>
							<div class="clearfix"></div>

							<?php comments_template(); ?>

							<?php endif; ?>								

						<?php endwhile; // end of the loop. ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<aside class="master-sidebar-right">
							<?php get_sidebar( 'right' ); ?>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>