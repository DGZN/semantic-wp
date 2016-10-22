<?php 
/***
Image Post Format for post
***/
?>
<?php 
/***
Standard Post Format for post
***/
?>


<!-- Contents -->    
<div class="master-subpage-contents">		
	<div class="container">
		<!-- Contents 01 -->    
		<div class="row m-t50 content1">
			<div class="col-xs-12 col-sm-12 col-md-12">
		
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
					<h1 class="entry-title"><?php the_title(); ?></h1>
										
					<div class = "main-content">
						<?php the_content(); ?>
					</div>				
				
					<?php if ( comments_open() ) : ?>
					<div id="comments" class = "comment_header">
						<span><?php echo comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></span>
					</div>
					<div class="clearfix"></div>
					<?php comments_template(); ?>
					<?php endif; ?>			
				</div>
			</div>
		</div>
	</div>	
</div>