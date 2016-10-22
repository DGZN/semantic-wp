<?php
// register widget
add_action('widgets_init', 'medicalrehab_services_widget');
function medicalrehab_services_widget() {
    register_widget( 'medicalrehab_services' );
}
 
// add admin scripts
add_action('admin_enqueue_scripts', 'medicalrehab_services_wdscript');
function medicalrehab_services_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('widget_img_upload_script', get_template_directory_uri() . '/js/widget-media-upload.js', false, '1.0', true);
}

// widget class
class medicalrehab_services extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'medicalrehab-services-widget',
			__( 'MedicalRehab Services', 'medical-rehab' )
		);
	}	

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
?>
	
	<div class="col-sm-4">
		<?php if( !empty($instance['image_uri']) ): ?>
			<div class="services-icon">
				<i class="widget-icon" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i>
			</div>
		<?php endif; ?>


		<?php if( !empty($instance['link']) ): ?>
		
			<h3 class="service-title"><a href="<?php echo esc_url($instance['link']); ?>"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title']); endif; ?></a></h3>
		
		<?php else: ?>
		
			<h3 class="service-title"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title']); endif; ?></h3>
		
		<?php endif; ?>
		
		<?php 
			if( !empty($instance['description']) ):
			
				echo '<p>' . htmlspecialchars_decode(apply_filters('widget_title', $instance['description'])) . '</p>';
				
			endif;
		?>				
	</div>
	

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['link'] = esc_url( $new_instance['link'] );
        $instance['image_uri'] = esc_url( $new_instance['image_uri'] );
        return $instance;
    }
 
    function form($instance) {
?>

	<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'medical-rehab' ) ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat" />
    </p>

	<p>		
		<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Descriptions', 'medical-rehab' ) ?></label><br />
		<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"><?php if( !empty($instance['description']) ): echo htmlspecialchars_decode($instance['description']); endif; ?></textarea>
    </p>

	<p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e( 'Link', 'medical-rehab' ) ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat" />
    </p>	

    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e( 'Image', 'medical-rehab' ) ?></label><br />

        <?php
		if ( isset($instance['image_uri']) ):
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
		endif;
        ?>
		
		<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button_services" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','medical-rehab'); ?>" style="margin-top:5px;" />
    </p>

<?php
    }
}
?>