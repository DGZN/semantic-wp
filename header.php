<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
  	<div id="masthead" class="master-header" class="site-header" role="banner">
  		<div class="container">
  			<div class="row p-t25 p-b25">

	 			<div class="col-md-8 col-md-push-4">

					<nav class="navbar master-nav navbar-inverse content1 col-md-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#searchform">
								<span class="sr-only">Toggle navigation</span>
								<i class="fa fa-search"></i>
							</button>
						</div>
					</nav>

					<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get" class="search-form collapse">
						<label for="s">
							<span class="screen-reader-text">Search for:</span>
							<input type="search" id="s" name="s" placeholder="Enter keywords" required />
						</label>
						<div class="pull-right submit-container">
							<button type="submit" class="search-submit" id="searchsubmit" alt="Search"></button>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#searchform">
								<span class="sr-only">Toggle navigation</span>
								<i class="fa fa-times"></i>
							</button>
						</div>
					</form>

	 			</div>

	 			<div class="col-md-4 col-md-pull-8">
					<?php
					$default_logo = get_template_directory_uri() . '/img/default-image/default-logo.png';
					$header_logo = get_theme_mod('header_logo_setting');

					if(isset($header_logo) && $header_logo != ""): ?>

						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<div class="img-container inline-block vAlignMiddle header-logo <?php echo !empty($header_logo) ? 'block' : 'hidden' ?>">
								<img src="<?php echo $header_logo ?>" alt="<?php echo get_bloginfo( 'name' ) ?>">
							</div>
						</a>

					<?php else: ?>

						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<div class="img-container inline-block vAlignMiddle header-logo">
								<img src="<?php echo $default_logo ?>" alt="<?php echo get_bloginfo( 'name' ) ?>">
							</div>
						</a>

					<?php endif; ?>

	 			</div>

			</div>
  		</div>
  	</div>


	<div class="master-nav-wrapper">
		<div class="container">


			<div class="row">

				<nav class="navbar master-nav navbar-inverse content1 col-md-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<span class="glyphicon glyphicon-home f30"></span>
						</a>
					</div>
					<?php main_menu_nav(); ?>
				</nav>

				<div class="col-md-3 main-nav-social text-right">

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

					<ul class="list-unstyled list-inline">
						<?php if(!empty($fb_link)): ?>
							<li><a href="<?php echo $fb_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-facebook"></i></a></li>
						<?php endif; ?>
						<?php if(!empty($twitter_link)): ?>
							<li><a href="<?php echo $twitter_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-twitter"></i></a></li>
						<?php endif; ?>
						<?php if(!empty($gplus_link)): ?>
							<li><a href="<?php echo $gplus_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php endif; ?>
						<?php if(!empty($linkedin_link)): ?>
							<li><a href="<?php echo $linkedin_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php endif; ?>

						<?php if(!empty($instagram_link)): ?>
							<li><a href="<?php echo $instagram_link; ?>" target="<?php echo $link_target; ?>"><i class="fa fa-instagram"></i></a></li>
						<?php endif; ?>
					</ul>

				</div>

			</div>
		</div>
	</div>


	<?php if(is_front_page()){

	} elseif (is_404()){

	} else {

		echo "<div class='breadcrumb-wrapper'>";
			echo "<div class='container'>";
				wp_custom_breadcrumbs();
			echo "</div>";
		echo "</div>";

	}
	?>


	<?php /*AFTER THIS IS THE START OF YOUR MAIN CONTENT*/ ?>
