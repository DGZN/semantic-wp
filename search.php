<?php get_header(); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- Contents -->    
		<div class="container master-subpage-contents">
			
			<!-- Contents 01 -->    
			<div class="row p-t40 p-b40 search-page">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="content1-1">
						<?php get_search_form() ?>
						<div class="clearfix"></div>
					</div>
					<?php
						global $query_string;
						$query_args = explode("&", $query_string);
						$search_query = array();
						
						foreach($query_args as $key => $string) {
							$query_split = explode("=", $string);
							$search_query[$query_split[0]] = urldecode($query_split[1]);
						} // foreach
						
						$search = new WP_Query($search_query);

						global $wp_query;
						$total_results = $wp_query->found_posts;
					?>
					
					<h2 class="">See <?php $total_results ?> results about "<?php the_search_query() ?>"</h2>
					<?php
					
						if(have_posts()) : while($search->have_posts()) : $search->the_post(); ?>
						
							<?php get_template_part( 'content', 'search' ); ?>

						<?php endwhile; ?>
						<div class="col-md-12 clearfix">
							<?php echo get_the_posts_navigation( ); ?>
						</div>
						<?php else : ?>
						
							<?php get_template_part( 'content', 'none' ); ?>
							
						<?php endif; ?>						
				
				</div>

				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<aside class="master-sidebar-right">
						<?php  get_sidebar( 'right' ) ?>					
					</aside>
				</div>
			</div>
		</div>
	</main>		
</div>

<?php get_footer(); ?>	