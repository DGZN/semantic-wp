<!-- Footer -->
<footer class="master-footer">
	
	<div class="content1" id="footer_top">
		<div class="container">
			<?php 
				if(is_active_sidebar( 'medical-rehab-footer-1' ) || is_active_sidebar( 'medical-rehab-footer-2' ) || is_active_sidebar( 'medical-rehab-footer-3' )):
					echo '<div class="footer-widget-wrap"><div class="row">';
					if(is_active_sidebar( 'medical-rehab-footer-1' )):
						echo '<div class="footer-widget col-xs-12 col-sm-4">';
						dynamic_sidebar( 'medical-rehab-footer-1' );
						echo '</div>';
					endif;
					if(is_active_sidebar( 'medical-rehab-footer-2' )):
						echo '<div class="footer-widget col-xs-12 col-sm-4">';
						dynamic_sidebar( 'medical-rehab-footer-2' );
						echo '</div>';
					endif;
					if(is_active_sidebar( 'medical-rehab-footer-3' )):
						echo '<div class="footer-widget col-xs-12 col-sm-4">';
						dynamic_sidebar( 'medical-rehab-footer-3' );
						echo '</div>';
					endif;
					echo '</div></div>';
				endif;
			?>
		</div>
	</div>

	<div class="content2" id="footer_bottom">
		<div class="container">
			<div class="row p-t10 p-b10 f14">
				<div class="col-md-6 col-sm-6 col-xs-12 content2-1">
					<?php 
					$sitename_copyright = "&copy; " . get_bloginfo( 'name' );
					echo get_theme_mod( 'footer_copyright_setting', $sitename_copyright ); 
					?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 content2-2 text-right">
					<!--<ul class="list-unstyled list-inline footer-nav">
						<?php //echo footer_menu_nav(); ?>
					</ul>-->
					
					<?php
					$fb_link = get_theme_mod("socialmedia_fb_link_setting", "#");
					$twitter_link = get_theme_mod("socialmedia_twitter_link_setting", "#");
					$gplus_link = get_theme_mod("socialmedia_gplus_link_setting", "#");
					$linkedin_link = get_theme_mod("socialmedia_linkedin_link_setting", "#");
					$pinterest_link = get_theme_mod("socialmedia_pinterest_link_setting", "#");
					
					$youtube_link = get_theme_mod("socialmedia_youtube_link_setting", "#");
					$dribble_link = get_theme_mod("socialmedia_dribble_link_setting", "#");
					$tumblr_link = get_theme_mod("socialmedia_tumblr_link_setting", "#");
					
					$instagram_link = get_theme_mod("socialmedia_instagram_link_setting", "#");
					$reddit_link = get_theme_mod("socialmedia_reddit_link_setting", "#");
					$link_target = get_theme_mod("socialmedia_link_target_setting", 1);

					if( isset($link_target) && $link_target == 1 ):
						$link_target = '_blank';
					else:	
						$link_target = '_self';
					endif;					
					?>
					
					<ul class="list-unstyled list-inline footer-social">
					<?php if(!empty($fb_link)): ?>
						<li><a href="<?php echo $fb_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-facebook"></i></a>
					<?php endif; ?>	
					<?php if(!empty($twitter_link)): ?>
						<li><a href="<?php echo $twitter_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if(!empty($gplus_link)): ?>
						<li><a href="<?php echo $gplus_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-google-plus"></i></a>
					<?php endif; ?>
					<?php if(!empty($linkedin_link)): ?>
						<li><a href="<?php echo $linkedin_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-linkedin"></i></a>
					<?php endif; ?>
					<?php if(!empty($pinterest_link)): ?>
						<li><a href="<?php echo $pinterest_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-pinterest-p"></i></a>
					<?php endif; ?>
					<?php if(!empty($youtube_link)): ?>
						<li><a href="<?php echo $youtube_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-youtube"></i></a>
					<?php endif; ?>
					<?php if(!empty($dribble_link)): ?>
						<li><a href="<?php echo $dribble_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-dribbble"></i></a>
					<?php endif; ?>
					<?php if(!empty($tumblr_link)): ?>
						<li><a href="<?php echo $tumblr_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-tumblr"></i></a>
					<?php endif; ?>
					<?php if(!empty($instagram_link)): ?>
						<li><a href="<?php echo $instagram_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-instagram"></i></a>
					<?php endif; ?>
					<?php if(!empty($reddit_link)): ?>
						<li><a href="<?php echo $reddit_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-reddit-alien"></i></a>
					<?php endif; ?>
					</ul>
					
					
				</div>
			</div>
		</div>
	</div>

</footer>	

</div><!-- .site -->
<?php wp_footer(); ?>
</body>

</html>