<?php
/*
 * Template Name: Front Page Template
 * Description: Custom front page template
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- Master Slider -->
		<div class="master-slider">
			<div class="" id="bannerslider">
				<?php 
				$args = array(
					'post_type' => 'theme-slider',
					'orderby' => 'date',
					'order' => 'ASC'
				);
				
				$the_query = new WP_Query($args);
				
				if($the_query->have_posts()):
				while($the_query->have_posts()):
				$the_query->the_post();
				?>
				<div class="wrapper">	
					<div class="container">
						<div class="row p-t50">
							<div class="col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-5 col-xs-10 col-xs-offset-2 p-t50 content1">
								<?php
								$content = get_the_content();
								echo substr($content,0,90);
								?>		
							
							</div>
						</div>
					</div>
				</div>
				
				<?php endwhile; endif;?>
				<?php wp_reset_postdata(); ?>
			</div>
			
			<div class="container m-t20">
				<div class="row">
					<div class="col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-5 col-xs-10 col-xs-offset-2 content1">
						<a href="<?php 
							$services_title = function_get_theme_setting('banner-btn');
							$services_title = isset($services_title) && $services_title != null ? $services_title : "#" ;
							echo $services_title;
						?>" class="btn p-t15 p-b15 p-l60 p-r60 f24 f-w100">SEE MORE</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Contents -->    
		<div class="master-contents">
			
			<div class="content1">
				<div class="container text-center p-t50 p-b50">
					<p class="f30 content1-1 f-w100">
						<?php 
							$services_title = function_get_theme_setting('cta-heading');
							$services_title = isset($services_title) && $services_title != null ? $services_title : "TO FIND A TREATMENT CENTER, OR TO SPEAK WITH AN INTAKE COORDINATOR FOR A COMPLIMENTARY AND PRIVATE EVALUATION, CALL TODAY!" ;
							echo $services_title;
						?>
					</p>
					<span class="f42 f-w700 content1-2"><img src="<?php echo esc_url( get_template_directory_uri() ) ?>/img/find_treatment_phone_icon.png" class="m-r15">
						<?php echo do_shortcode('[dynamic_phone_num layout = "parenthesis"]');?>
					</span>
				</div>
			</div>

			<div class="content2 container">
				<div class="row p-t40 p-b40">
					<div class="col-md-12 text-center">
						<h2 class="f36 f-w100 m-t0 m-b40 p-b40">
							<?php 
								$services_title = function_get_theme_setting('approach-heading');
								$services_title = isset($services_title) && $services_title != null ? $services_title : "The Website 10 Approach " ;
								echo $services_title;
							?>
						</h2>
						<p class='f15 m-b40'>
							<?php 
								$services_title = function_get_theme_setting('approach-subheading');
								$services_title = isset($services_title) && $services_title != null ? $services_title : "Pork loin boudin short loin, sirloin tongue pork chop turkey picanha meatloaf t-bone hamburger pork prosciutto venison. Kevin biltong tenderloin, cow drumstick salami tri-tip jowl pork chop shoulder sausage capicola turkey brisket pork belly. Venison chuck capicola andouille. Picanha shoulder short loin beef ribs turducken tenderloin bacon boudin tri-tip sirloin cupim filet mignon leberkas. Spare ribs cow beef ribs ribeye tri-tip pork belly rump pancetta t-bone salami. Jowl ribeye beef jerky cupim. Frankfurter andouille pig boudin tri-tip turducken salami, cupim biltong meatloaf flank turkey." ;
								echo $services_title;
							?>
						</p>
						<div class="row m-b20">
						<?php
							$args = array(
								'post_type' => 'page',
								'posts_per_page'=> 3,
								'orderby' => 'date',
								'order'	=> 'ASC',
								'meta_query' => array(     
								   array(
									 'key' => 'dm_approach',     
									 'value' => 1,
									 'type' => 'INT',       
								   )
								)
							);
							   
							$the_query = new WP_Query( $args );?>
								<?php
								if($the_query->have_posts()):
									while ( $the_query->have_posts() ) :  $the_query->the_post();?>
										<div class="col-md-4 col-sm-4 col-xs-4 m-b20 content2-2"> 
						  <?php if ( has_post_thumbnail() ) {
						  the_post_thumbnail('360-240-hard', array('class'=>'img-responsive'));
							} else { ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/default-image/Default-Image-360x240.png" alt="<?php the_title(); ?>" />
						  <?php } ?>
										</div>
								<?php endwhile; endif; ?>	
								<?php wp_reset_postdata(); ?>						   
						</div>		    		
					</div>
				</div>
			</div>

			<div class="content3">
				<div class="container">
					<div class="row p-t40 p-b40 text-center">
						<div class="col-md-12">
							<h2 class="f36 f-w100 m-t0 m-b40 p-b40"> 
								<?php 
									$services_title = function_get_theme_setting('about-header');
									$services_title = isset($services_title) && $services_title != null ? $services_title : "About Website 10" ;
									echo $services_title;
								?>
							</h2>
							<p class="f15 m-b0">
								<?php 
									$services_title = function_get_theme_setting('about-subheading');
									$services_title = isset($services_title) && $services_title != null ? $services_title : "Pork loin boudin short loin, sirloin tongue pork chop turkey picanha meatloaf t-bone hamburger pork prosciutto venison. Kevin biltong tenderloin, cow drumstick salami tri-tip jowl pork chop shoulder sausage capicola turkey brisket pork belly. Venison chuck capicola andouille. Picanha shoulder short loin beef ribs turducken tenderloin bacon boudin tri-tip sirloin cupim filet mignon leberkas. Spare ribs cow beef ribs ribeye tri-tip pork belly rump pancetta t-bone salami. Jowl ribeye beef jerky cupim. Frankfurter andouille pig boudin tri-tip turducken salami, cupim biltong meatloaf flank turkey." ;
									echo $services_title;
								?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="content4 container">
				<div class="row p-t40 p-b40">
					<div class="col-md-12 f15">
						<h2 class="f36 f-w100 m-t0 m-b40 p-b40 text-center">
							<?php 
								$services_title = function_get_theme_setting('article-header');
								$services_title = isset($services_title) && $services_title != null ? $services_title : "Motivational Article" ;
								echo $services_title;
							?>
						</h2>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php the_content(); ?>

						<?php endwhile; endif;?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</main>	
</div>
<?php get_footer(); ?>