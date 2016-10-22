jQuery(document).ready(function ($) {
	var ajaxurl = my_ajax_object.ajax_url;
	$('#contact_submit').click(function(e){
		var $btn = $(this).button('loading');
		$('.notification').html(''); /*clear notification area*/
		$("#contact_form").validate({
			//validation rules
			rules: {
				"contact_name": "required",
				"contact_email": {
				  required: true,
				  email: true
				},
				"contact_subject": "required",
				"contact_message": "required",
			}, 
			
			messages: {
				"contact_name": "Please specify your name",
				"contact_email": {
				  required: "We need your email address to contact you",
				  email: "Your email address must be in the format of name@domain.com"
				},
				"contact_subject" : "Please enter a subject.",
				"contact_message" : "Please enter a message"
			},
			
			errorPlacement: function(error, element) {
				error.insertBefore(element);
			},
			
			invalidHandler: function(event, validator) {
				// 'this' refers to the form
				var errors = validator.numberOfInvalids();
				if (errors) {
					$btn.button('reset');
				} 
			},	
			
			submitHandler: function(form) {
				$.ajax({
					url: ajaxurl,
					type: 'POST',
					data: {
						action:'medicalrehab_send_message',
						value:$(form).serialize(),
					},
					success: function(response) {
						if(response === 'success'){
							$('.notification').html('<span class="success">Message was sent successfully!</span>');
							$('#contact_name').val(''); $('#contact_email').val(''); $('#contact_subject').val(''); $('#contact_message').val('');
						}else{ /*email didn't send*/
							$('.notification').html('<span class="error">An error occured. Please try again later.</span>');
						}
						$btn.button('reset');
					}            
				});
			}
		});
	});
});