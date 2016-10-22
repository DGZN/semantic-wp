<?php
add_action('wp_ajax_medicalrehab_send_message', 'medicalrehab_send_message' );
add_action('wp_ajax_nopriv_medicalrehab_send_message', 'medicalrehab_send_message' );
add_filter('wp_mail_content_type', 'medicalrehab_mail_content_type' );
      
function medicalrehab_send_message() {
	/*$contact_name = $_POST['contact_name'];
	$contact_email = $_POST['contact_email'];
	$contact_subject = $_POST['contact_subject'];
	$contact_message = $_POST['contact_message'];*/
	
	parse_str($_POST['value'], $my_array_of_vars);
	$data_post=array();

	foreach ($my_array_of_vars as $data){
		$data_post[] = $data;
	}

	$contact_name = $data_post[0];
	$contact_email = $data_post[1];
	$contact_subject = $data_post[2];
	$contact_message = $data_post[3];
	
	if (isset($contact_message)) {
		
		$emailadd = get_theme_mod('contactform_email_setting', get_option('admin_email'));
		
		if( !empty($emailadd) ):
			$to = $emailadd;
		else:
			$to = get_option('admin_email');
		endif;
		
		//$headers = 'From: ' . $contact_name . ' <"' . $contact_email . '">';
		$subject = $contact_subject;
		
		ob_start();
		
		echo '
			<p>Name: '.$contact_name.'<p>
			<p>Email Address: '.$contact_email.'<p>
			<p>Subject: '.$contact_subject.'<p>
			<p>Message: </p>'. wpautop($contact_message);
		
		$message = ob_get_contents();
		
		ob_end_clean();

		$mail = wp_mail($to, $subject, $message);	
		
		if($mail){
			echo 'success';
		}else{
			echo 'message sending failed';
		}
	}

	die();
	
}
	
function medicalrehab_mail_content_type() {
	return "text/html";
}

?>