<?php
$banner_bg_color = get_theme_mod( 'banner_bg_color_setting', '#fff' );

$default_banner_img = esc_url(get_template_directory_uri() .'/img/header.png');

$banner_background = get_theme_mod( 'banner_img_setting', $default_banner_img );

?>

<div id="main_banner" class="master-slider" style="<?php echo !empty($banner_background) ? "background-image: url(" . $banner_background . ");" : "background-color:" . $banner_bg_color ; ?>">

	<div class="container">
		<h1 id="banner_heading"><?php echo get_theme_mod('banner_heading_setting', 'Lorem ipsum dolor sit amet, civibus conceptam cu ius. Ut odio 	eloquentiam nec, his nullam voluptua tacimates in') ?></h1>
	</div>
	<?php
	$medicalrehab_banner_link_text = get_theme_mod('banner_link_text_setting', __("SEE MORE", "medical-rehab"));
	if(!empty($medicalrehab_banner_link_text)):
	?>
		<div class="container m-t20">
			<div class="row">
				<div id="banner_link" class="content1">
					<div class="text-center"><a href="<?php echo get_theme_mod("banner_link_url_setting", "#"); ?>" id="banner_link_text" class="btn btn-lg"><?php echo $medicalrehab_banner_link_text; ?></a></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>