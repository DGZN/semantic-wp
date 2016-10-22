<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package medical-rehab
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- Contents -->    
		<div class="container master-subpage-contents">
			<!-- Contents 01 -->    
			<div class="row p-t40 p-b40 content1">
				<div class="col-sm-12 col-md-9 col-lg-9">
					<header class="entry-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
						?>
					</header>

					<div class="row">
						<?php if ( have_posts() ) : ?>
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
								?>

							<?php endwhile; ?>

							<div class="col-md-12 clearfix">
								<?php //the_posts_navigation(); 
								echo get_the_posts_navigation( ); ?>
							</div>

						<?php else : ?>

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
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
