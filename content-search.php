<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package medical-rehab
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('m-b30'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="f18 f-w400 m-t0 m-b5 entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content clearfix">
		<div class="entry-thumbnail pull-left p-r10">
			<?php the_post_thumbnail('120-60-hard') ?>
		</div>
		<h3 class="f11 m-t0 m-b0"><?php the_permalink() ?></h3>
		<?php echo substr(get_the_excerpt(),0,200) ?>
	</div><!-- .entry-content -->
</article>	