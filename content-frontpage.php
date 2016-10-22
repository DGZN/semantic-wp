<?php
/**
 * @package medical-rehab
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-xs-12 m-b30 article-listbox'); ?>>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('555-240-hard', array('class'=>'img-responsive'));
		} else { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/default-image/Default-Image-555x240.png" alt="<?php the_title(); ?>" />
		<?php } ?>
		</a>
		<span class="post-date text-center">
			<?php $dateTimestamp = strtotime(get_the_date()); ?>
			<span class="f18"><?php echo date('d', $dateTimestamp) ?></span> <br />
			<span class="f12"><?php echo date('M', $dateTimestamp) ?></span>
		</span>
	</div>
	<div class="post-contents p-t20 p-b20 p-l10 p-r10">
		<div>
			<header class="entry-header">
			  <?php the_title( sprintf( '<h2 class="entry-title f15 f-w700 m-t0 m-b15 entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>
			<div class="f14 entry-content">
			  <?php string_limiter(get_the_excerpt(),160); ?>
			</div>
			<footer class="entry-footer">
			  <p><?php the_tags(); ?></p>
			</footer>
		</div>
	</div>
</article>
