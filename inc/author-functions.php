<?php
/*======================================
GOOGLE PLUS AUTHOR LINK IN USER PROFILE
======================================*/
	
	add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
	add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
	
	function my_show_extra_profile_fields( $user ) { ?>
	<?php global $user_id; ?> 
		<h3>Extra profile information</h3>
	
		<table class="form-table">
	
			<tr>
				<th><label for="gplusLink">Google+ Author Link</label></th>
	
				<td>
					<input type="text" name="gplusLink" id="gplusLink" value="<?php echo esc_attr( get_the_author_meta( 'gplusLink', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">Please enter your google plus link here.</span>
				</td>
			</tr>
	
			<tr>
				<th><label for="userTwitterLink">Twitter Account</label></th>
	
				<td>
					<input type="text" placeholder="@user_name" name="userTwitterLink" id="userTwitterLink" value="<?php echo esc_attr( get_the_author_meta( 'userTwitterLink', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">Please enter your twitter screen name.</span>
				</td>
			</tr>
			
			<tr>
				<th><label for="userTwitterLink">Facebook Author Link</label></th>
	
				<td>
					<input type="text" name="authorfb" id="authorfb" value="<?php echo esc_attr( get_the_author_meta( 'authorfb', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">Please enter your Facebook link here.</span>
				</td>
			</tr>
		</table>
	<?php }
	 
	  
	add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
	add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
	global $userID;
	
	function my_save_extra_profile_fields( $userID ) {
	
		if ( !current_user_can( 'edit_user', $userID ) )
			return false;
		/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
		update_user_meta( $userID, 'gplusLink', $_POST['gplusLink'] );
		
		update_user_meta( $userID, 'userTwitterLink', $_POST['userTwitterLink'] );
		
		update_user_meta( $userID, 'authorfb', $_POST['authorfb'] );
	}


  /***AUTHOR FOLLOW LINK FOR GOOGLE PLUS AND TWITTER***/
  if (function_exists('my_show_extra_profile_fields') && function_exists('my_save_extra_profile_fields')){
    if(!function_exists('author_follow_link')){  
      function author_follow_link(){
        global $post,$userID;
        $author_id = $post->post_author;
        
        $TwitterName =  get_the_author_meta('userTwitterLink', $author_id); 
        $TwitterLink = "https://twitter.com/" . str_replace("@","",$TwitterName);
        $GplusLink = get_the_author_meta('gplusLink', $author_id);
      
        if ( $GplusLink != "" || $TwitterName != "" ) { ?>
          <p>Connect with <?php the_author(); ?> : 
        
            <?php
              if($GplusLink != "" && $TwitterName == ""){
            ?>                             
                <a href="<?php echo $GplusLink; ?>?rel=author" target="_blank" title="Follow <?php the_author_meta( 'display_name' ); ?> on Google+"> Google+ </a>       
              
            <?php } /*end option1*/     
            
              else if($GplusLink == "" && $TwitterName != ""){
            ?>                             
                <a href="<?php echo $TwitterLink;?>" target="_blank" title="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter"> Twitter </a>
              
            <?php } /*end option2*/                                                       
            
            else{ ?>
              <a href="<?php echo $GplusLink; ?>?rel=author" target="_blank" title="Follow <?php the_author_meta( 'display_name' ); ?> on Google+"> Google+ </a> | <a href="<?php echo $TwitterLink;?>" target="_blank" title="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter"> Twitter </a>
              
             <?php } /*end option3*/                                                      
                                                       
          } /*end gplus and twiiter condition*/
        
      } /** end author follow link function ***/
    
    }
  
  }
  
?>