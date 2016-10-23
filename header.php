<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset=utf-8>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
  <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="ui fluid container">

	<nav>
		<?php main_menu_nav(); ?>
	</nav>

  <div class="pusher">
    <!-- Site content !-->
  </div>



  <br>

	<?php /*AFTER THIS IS THE START OF YOUR MAIN CONTENT*/ ?>
