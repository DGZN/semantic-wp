<?php
/**
 * @package medical-rehab
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<p class = "posted_detail">by <span class="vcard author"><span class="fn" itemprop="author" content="<?php the_author(); ?>"><?php the_author_posts_link(); ?></span><span class="date updated"> <?php the_time('m/d/y'); ?></span></span></p> 
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'medical-rehab' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
