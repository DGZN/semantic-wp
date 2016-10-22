<?php
// register widget
add_action('widgets_init', 'medicalrehab_testimonial_widget');
function medicalrehab_testimonial_widget() {
    register_widget( 'medicalrehab_testimonial' );
}

// add admin scripts
add_action('admin_enqueue_scripts', 'medicalrehab_tesimonial_wdscript');
function medicalrehab_tesimonial_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('widget_img_upload_script', get_template_directory_uri() . '/js/widget-media-upload.js', false, '1.0', true);
} 

// widget class
class medicalrehab_testimonial extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'medicalrehab-testimonial-widget',
			__( 'MedicalRehab Testimonial', 'medical-rehab' )
		);
	}		

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
		
		
?>
	
	<div class="testimonial-panel">
	
		<!-- Testimonial message -->
		
		<?php 
			$medicalrehab_link_target = '_self';
			if( !empty($instance['open_new_window']) ):
				$medicalrehab_link_target = '_blank';
			endif;
		?>

		<?php if( !empty($instance['text']) ): ?>
		<div class="message">
			<blockquote class="bq-style1">
				<?php $testimonial = htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); ?>
				<p><?php string_limiter($testimonial,350); ?></p>
			</blockquote>
		</div>
		<?php endif; ?>	
		
		<!-- client info -->
		<div class="client-container">
			<div class="client-info">
				<div class="client-name">
				<?php if( ! empty($instance['author_link'])): ?>
					<a class="client-name" href="<?php echo esc_url($instance['author_link']); ?>" target="<?php echo$medicalrehab_link_target; ?>"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title'] ); endif; ?></a>
				<?php else: 
					if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title'] ); endif;
				 endif; ?>
				</div>
				<?php if( !empty($instance['author_details']) ): ?>
				<div class="client-details">

					<?php echo apply_filters('widget_title', $instance['author_details']); ?>

				</div>
				<?php endif; ?>
			</div>
			
			<?php if( !empty($instance['image_uri']) ): ?>
			<div class="client-image">
				<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="client image">
			</div>
			<?php endif; ?>
			
		</div>
	</div>
	

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['author_link'] = esc_url( $new_instance['author_link'] );
		$instance['author_details'] = strip_tags( $new_instance['author_details'] );
		$instance['text'] = strip_tags( $new_instance['text'] );
        $instance['image_uri'] = esc_url( $new_instance['image_uri'] );
		$instance['open_new_window'] = strip_tags($new_instance['open_new_window']);
        return $instance;
    }
 
    function form($instance) {
?>


	<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Author name', 'medical-rehab' ) ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('author_link'); ?>"><?php _e( 'Author link', 'medical-rehab' ) ?></label><br />
        <input type="text" placeholder="http://example.com" name="<?php echo $this->get_field_name('author_link'); ?>" id="<?php echo $this->get_field_id('author_link'); ?>" value="<?php if( !empty($instance['author_link']) ): echo $instance['author_link']; endif; ?>" class="widefat" />
    </p>	
	
	<p>
		<input type="checkbox" name="<?php echo $this->get_field_name('open_new_window'); ?>" id="<?php echo $this->get_field_id('open_new_window'); ?>" <?php if( !empty($instance['open_new_window']) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open links in new window?','medical-rehab' ); ?><br>
	</p>

	<p>
        <label for="<?php echo $this->get_field_id('author_details'); ?>"><?php _e( 'Author details', 'medical-rehab' ) ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('author_details'); ?>" id="<?php echo $this->get_field_id('author_details'); ?>" value="<?php if( !empty($instance['author_details']) ): echo $instance['author_details']; endif; ?>" class="widefat" />
    </p>	
	
	
	<p>		
		<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e( 'Testimonial', 'medical-rehab' ) ?></label><br />
		<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>		
		
    </p>

	

    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e( 'Author Image', 'medical-rehab' ) ?></label><br />

        <?php
		if ( isset($instance['image_uri']) ):
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
		endif;	
        ?>

		<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','medical-rehab'); ?>" style="margin-top:5px;" />
    </p>

<?php
    }
}
?>