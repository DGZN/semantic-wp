<?php
// register widget
add_action('widgets_init', 'medicalrehab_ourteam_widget');
function medicalrehab_ourteam_widget() {
    register_widget( 'medicalrehab_ourteam' );
}

// add admin scripts
add_action('admin_enqueue_scripts', 'medicalrehab_ourteam_wdscript');
function medicalrehab_ourteam_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('widget_img_upload_script', get_template_directory_uri() . '/js/widget-media-upload.js', false, '1.0', true);
} 

// widget class
class medicalrehab_ourteam extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'medicalrehab-ourteam-widget',
			__( 'MedicalRehab Our Team', 'medical-rehab' )
		);
	}		

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
		
		
?>
	
	<div class="col-xs-6 col-sm-3 m-b20 team-infobox">
	
	<?php 
		$medicalrehab_link_target = '_self';
		if( !empty($instance['open_new_window']) ):
			$medicalrehab_link_target = '_blank';
		endif;
	?>
	
		<?php if( !empty($instance['image_uri']) ): 
			$attachment_id = medicalrehab_get_attachment_id_from_url($instance['image_uri']);
			$image_alt_data = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
			$image_alt = !empty($image_alt_data) ? $image_alt_data : "Uploaded Image";
		?>
		
			<div class="ourteam-icon">
				<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo $image_alt; ?>"> 	
			</div>
		<?php endif; ?>
		<?php if( !empty($instance['author_link']) ): ?>
			<?php if( !empty($instance['title']) ): ?>
			
				<h3 class="author-name"><a href="<?php echo esc_url($instance['author_link']); ?>" target="<?php echo $medicalrehab_link_target; ?>"><?php echo apply_filters('widget_title', $instance['title']); ?></a></h3>
			
			<?php endif; ?>
			
		
		<?php else: ?>
	
			<?php if( !empty($instance['title']) ): echo '<h3 class="author-name">' . apply_filters('widget_title', $instance['title']) . '</h3>'; endif; ?>
	
		<?php endif; ?>	

		<?php if( !empty($instance['author_position']) ): echo '<div class="author-position">' . apply_filters('widget_title', $instance['author_position']) . '</div>'; endif; ?>
		
		
		<ul class="list-unstyled social-media-btn">
		<?php 
		
			if( !empty($instance['fb_link']) ):
			
				echo '<li><a href="' . $instance['fb_link'] . '" target="' . $medicalrehab_link_target . '" rel="nofollow"><i class="fa fa-facebook-square"></i></a></li>';
				
			endif;
			
			if( !empty($instance['twitter_link']) ):
			
				echo '<li><a href="' . $instance['twitter_link'] . '" target="' . $medicalrehab_link_target . '" rel="nofollow"><i class="fa fa-twitter-square"></i></a></li>';
				
			endif;
			
			if( !empty($instance['gplus_link']) ):
			
				echo '<li><a href="' . $instance['gplus_link'] . '" target="' . $medicalrehab_link_target . '" rel="nofollow"><i class="fa fa-google-plus-square"></i></a></li>';
				
			endif;
			
			if( !empty($instance['linkedin_link']) ):
			
				echo '<li><a href="' . $instance['linkedin_link'] . '" target="' . $medicalrehab_link_target . '" rel="nofollow"><i class="fa fa-linkedin-square"></i></a></li>';
				
			endif;

		?>		
		</ul>		
	</div>
	

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['author_link'] = esc_url( $new_instance['author_link'] );
		$instance['author_position'] = strip_tags( $new_instance['author_position'] );
        $instance['image_uri'] = esc_url( $new_instance['image_uri'] );
		$instance['fb_link'] = esc_url( $new_instance['fb_link'] );
		$instance['gplus_link'] = esc_url( $new_instance['gplus_link'] );
		$instance['twitter_link'] = esc_url( $new_instance['twitter_link'] );
		$instance['linkedin_link'] = esc_url( $new_instance['linkedin_link'] );		
		$instance['open_new_window'] = strip_tags($new_instance['open_new_window']);
		
        return $instance;
    }
 
    function form($instance) {
?>

	<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author name','medical-rehab') ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('author_position'); ?>"><?php _e('Position','medical-rehab') ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('author_position'); ?>" id="<?php echo $this->get_field_id('author_position'); ?>" value="<?php if( !empty($instance['author_position']) ): echo $instance['author_position']; endif; ?>" class="widefat" />
    </p>	
	
	<p>
        <label for="<?php echo $this->get_field_id('author_link'); ?>"><?php _e('Author link','medical-rehab') ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('author_link'); ?>" id="<?php echo $this->get_field_id('author_link'); ?>" value="<?php if( !empty($instance['author_link']) ): echo $instance['author_link']; endif; ?>" class="widefat" />
    </p>	

	<p>
        <label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook link','medical-rehab') ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('fb_link'); ?>" id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php if( !empty($instance['fb_link']) ): echo $instance['fb_link']; endif; ?>" class="widefat" />
    </p>	
	
	<p>
        <label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter link','medical-rehab') ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('twitter_link'); ?>" id="<?php echo $this->get_field_id('twitter_link'); ?>" value="<?php if( !empty($instance['twitter_link']) ): echo $instance['twitter_link']; endif; ?>" class="widefat" />
    </p>	
	
	<p>
        <label for="<?php echo $this->get_field_id('gplus_link'); ?>"><?php _e('Gplus link','medical-rehab') ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('gplus_link'); ?>" id="<?php echo $this->get_field_id('gplus_link'); ?>" value="<?php if( !empty($instance['gplus_link']) ): echo $instance['gplus_link']; endif; ?>" class="widefat" />
    </p>		
	
	<p>
        <label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php _e('LinkedIn link','medical-rehab') ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('linkedin_link'); ?>" id="<?php echo $this->get_field_id('linkedin_link'); ?>" value="<?php if( !empty($instance['linkedin_link']) ): echo $instance['linkedin_link']; endif; ?>" class="widefat" />
    </p>	
	
	<p>
		<input type="checkbox" name="<?php echo $this->get_field_name('open_new_window'); ?>" id="<?php echo $this->get_field_id('open_new_window'); ?>" <?php if( !empty($instance['open_new_window']) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open links in new window?','medical-rehab' ); ?><br>
	</p>
	
    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Author Image','medical-rehab') ?></label><br />

        <?php
		 if ( isset($instance['image_uri']) ):
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
		endif;
        ?>

		<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button_ourteam" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','medical-rehab'); ?>" style="margin-top:5px;" />
    </p>

<?php
    }
}
?>