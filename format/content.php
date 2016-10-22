<?php 
/***
Standard Post Format for post
***/
?>
<!-- Contents -->    
<div class="master-subpage-contents">		
	<div class="container">
		<!-- Contents 01 -->    
		<div class="row p-t40 p-b40 content1">
			<div class="col-sm-12 col-md-9 col-lg-9">
		
				<div itemscope itemtype="http://schema.org/Article" <?php post_class() ?> id="post-<?php the_ID(); ?>">	
					
					<?php 
					/*
					 * Schema.org markup for Google+ 
					 * 	remove this metadata if dmo seo if not in use
					 */
					?>
					<meta itemprop="name" content="<?php the_title(); ?>">
					<meta itemprop="description" content="<?php
					if(!empty($gplus_desc) ){
					echo $gplus_desc;	
					}elseif (!empty($meta_desc)){
					echo $meta_desc;
					}else{
					if (function_exists('dmseo_get_page_content')){
					echo dmseo_get_page_content(200);
					}
					}?>"/>
					<meta itemprop="image" content="<?php if ( ! empty($gplus_image)){echo $gplus_image;}else{if(function_exists('the_post_thumbnail')) :	echo wp_get_attachment_url(get_post_thumbnail_id()); endif; } ?>"/>	 			
					<h1 class="f30 font-semibold entry-title m-t0 m-b0"><?php the_title(); ?></h1>
					<p class = "posted_detail">by <span class="vcard author"><span class="fn" itemprop="author" content="<?php the_author(); ?>"><?php the_author_posts_link(); ?></span><span class="date updated"> <?php the_time('m/d/y'); ?></span></span></p>  
					
					<div class="main-content m-b40">
						<?php the_content(); ?>
					</div>				
				
					<?php if ( comments_open() ) : ?>
					<div id="comments" class = "f18 f-w700 comment-header p-b10">
						<hr/>
						<span><?php echo comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></span>
					</div>
					<div class="clearfix"></div>
					<?php comments_template(); ?>
					<?php endif; ?>			
				
				</div>
				
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 right-sidebar-wrapper">
				<aside class="master-sidebar-right">
					<?php dynamic_sidebar( 'blog-right-sidebar' ); ?>            
				</aside>
			</div>		
			
		</div>
	</div>	
</div>