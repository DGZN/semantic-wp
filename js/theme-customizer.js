(function($){
	/* Site Identity */
	wp.customize("phonenum_setting", function(value) {
		value.bind(function(to) {
			$(".customizer-phonenum").html(to);
		} );
	});
	
	
	/*
	 * Navigation 
	 */
	
	wp.customize( 'nav_home_bg_color_setting', function( value ) {
        value.bind( function( to ) {
            $('.master-nav .navbar-brand').css('background-color', to ? to : '' );
        });
    });
	
	wp.customize( 'nav_homefont_bg_color_setting', function( value ) {
        value.bind( function( to ) {
            $('.master-nav .navbar-brand span').css('color', to ? to : '' );
        });
    });	
	
	wp.customize( 'nav_link_color_setting', function( value ) {
        value.bind( function( to ) {
            $('.master-nav.navbar-inverse .navbar-nav > li > a').css('color', to ? to : '' );
        });
    });	
	
	wp.customize( 'nav_text_color_setting', function( value ) {
        value.bind( function( to ) {
            $('.master-nav-wrapper .content2 .content2-1 a').css('color', to ? to : '' );
        });
    });	
	
	
	
	/*
	 * Banner
	 */

	wp.customize("banner_img_repeat_setting", function( value ){
		value.bind(function(to){
			$("#main_banner").css('background-repeat', to ? to : '' );
		});
	});

	wp.customize("banner_img_size_setting", function( value ){
		value.bind(function(to){
			$("#main_banner").css('background-size', to ? to : '' );
		});
	});

	wp.customize("banner_img_position_setting", function( value ){
		value.bind(function(to){
			
			to = to.replace(/-/g, ' ');
			
			$("#main_banner").css('background-position', to ? to : '' );
		});
	});	
	 
	wp.customize("banner_heading_setting",function( value ) {
        value.bind(function(to) {
            $('#banner_heading').html(to);
        });
    });	 
	
	wp.customize("banner_content_visibility_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#main_banner").css("display","none");
			}else{
				$("#main_banner").css("display","block");
			}
		} );
	});	
	
	wp.customize("banner_link_text_setting", function(value) {
		value.bind(function(to) {
			if(to == ''){
				$("#banner_link").css("display","none");
			}else{
				$("#banner_link").css("display","block");
				$('#banner_link_text').html(to);
			}
		} );
	});	

	wp.customize("banner_link_url_setting",function( value ) {
        value.bind(function(to) {
            $('#banner_link a').attr("href", to);
        });
    });		
	
	wp.customize("banner_button_color_setting", function( value ){
		value.bind(function(to){
			$("#banner_link_text").css('background', to ? to : '' );
		});
	});	
	
	wp.customize("banner_button_font_color", function( value ){
		value.bind(function(to){
			$("#banner_link_text").css('color', to ? to : '' );
		});
	});	
	
	
	wp.customize( 'banner_bg_color_setting', function( value ) {
        value.bind( function( to ) {
            $('#main_banner').css('background-color', to ? to : '' );
        });
    });		
	
	wp.customize( 'banner_font_color_setting', function( value ) {
        value.bind( function( to ) {
            $('#main_banner').css('color', to ? to : '' );
        });
    });	
	
	/*
	 * call to action
	 */
	wp.customize("cta1_setting_visibility", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#cta1_panel").css("display","none");
			}else{
				$("#cta1_panel").css("display","block");
			}
		} );
	});	
	
	wp.customize("cta1_setting_message",function( value ) {
        value.bind(function(to) {
            $('#cta1_content').html(to);
        });
    });
	
	wp.customize( 'cta1_setting_font_color', function( value ) {
        value.bind( function( to ) {
            $('#cta1_content').css('color', to ? to : '' );
        });
    });
	
	wp.customize("cta1_img_repeat_setting", function( value ){
		value.bind(function(to){
			$("#cta1_panel").css('background-repeat', to ? to : '' );
		});
	});

	wp.customize("cta1_img_size_setting", function( value ){
		value.bind(function(to){
			$("#cta1_panel").css('background-size', to ? to : '' );
		});
	});

	wp.customize("cta1_img_position_setting", function( value ){
		value.bind(function(to){
			
			to = to.replace(/-/g, ' ');
			
			$("#cta1_panel").css('background-position', to ? to : '' );
		});
	});	
	
	wp.customize( 'cta1_setting_bg_color', function( value ) {
        value.bind( function( to ) {
            $('#cta1_panel').css('background-color', to ? to : '' );
        });
    });	
	
	wp.customize("cta1_link_text_setting", function(value) {
		value.bind(function(to) {
			if(to == ''){
				$("#cta1_link").css("display","none");
			}else{
				$("#cta1_link").css("display","block");
				$('#cta1_link_text').html(to);
			}
		} );
	});		
	
	wp.customize("cta1_link_url_setting",function( value ) {
        value.bind(function(to) {
            $('#cta1_link a').attr("href", to);
        });
    });		
	
	wp.customize("cta1_button_color_setting", function( value ){
		value.bind(function(to){
			$("#cta1_link_text").css('background', to ? to : '' );
		});
	});	
	
	wp.customize("cta1_button_font_color", function( value ){
		value.bind(function(to){
			$("#cta1_link_text").css('color', to ? to : '' );
		});
	});
	

	
	/*
	 * Services panel 
	 */
	wp.customize("services_content_visibility_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#services_panel").css("display","none");
			}else{
				$("#services_panel").css("display","block");
			}
		} );
	});	
	
	wp.customize("services_heading_setting",function( value ) {
        value.bind(function(to) {
            $('#services_panel .panel-heading').html(to);
        });
    });

	wp.customize("services_description_setting",function( value ) {
        value.bind(function(to) {
            $('#services_panel .panel-description').html(to);
        });
    });		
	
	wp.customize("services_heading_color_setting", function( value ){
		value.bind(function(to){
			$("#services_panel .panel-heading").css('color', to ? to : '' );
		});
	});	

	wp.customize("services_font_color_setting", function( value ){
		value.bind(function(to){
			$("#services_panel").css('color', to ? to : '' );
		});
	});	
	
	wp.customize("services_link_color_setting", function( value ){
		value.bind(function(to){
			$("#services_panel a").css('color', to ? to : '' );
		});
	});	

	
	/*
	 * Our Team Panel
	 */
	wp.customize("ourteam_content_visibility_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#ourteam_panel").css("display","none");
			}else{
				$("#ourteam_panel").css("display","block");
			}
		} );
	});		 

	wp.customize("ourteam_heading_setting",function( value ) {
        value.bind(function(to) {
            $('#ourteam_panel .panel-heading').html(to);
        });
    });

	wp.customize("ourteam_description_setting",function( value ) {
        value.bind(function(to) {
            $('#ourteam_panel .panel-description').html(to);
        });
    });		
	
	wp.customize("ourteam_img_repeat_setting", function( value ){
		value.bind(function(to){
			$("#ourteam_panel").css('background-repeat', to ? to : '' );
		});
	});

	wp.customize("ourteam_img_size_setting", function( value ){
		value.bind(function(to){
			$("#ourteam_panel").css('background-size', to ? to : '' );
		});
	});

	wp.customize("ourteam_img_position_setting", function( value ){
		value.bind(function(to){
			
			to = to.replace(/-/g, ' ');
			
			$("#ourteam_panel").css('background-position', to ? to : '' );
		});
	});		
	
	wp.customize( 'ourteam_bg_color_setting', function( value ) {
        value.bind( function( to ) {
            $('#ourteam_panel').css('background-color', to ? to : '' );
        });
    });		
	
	wp.customize("ourteam_heading_color_setting", function( value ){
		value.bind(function(to){
			$("#ourteam_panel .panel-heading").css('color', to ? to : '' );
		});
	});	

	wp.customize("ourteam_font_color_setting", function( value ){
		value.bind(function(to){
			$("#ourteam_panel").css('color', to ? to : '' );
		});
	});	
	
	wp.customize("ourteam_link_color_setting", function( value ){
		value.bind(function(to){
			$("#ourteam_panel a").css('color', to ? to : '' );
		});
	});		
	
	/*
	 * Testimonial Panel
	 */
	wp.customize("testimonial_content_visibility_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#testimonial_panel").css("display","none");
			}else{
				$("#testimonial_panel").css("display","block");
			}
		} );
	});	


	wp.customize("testimonial_img_repeat_setting", function( value ){
		value.bind(function(to){
			$("#testimonial_panel").css('background-repeat', to ? to : '' );
		});
	});

	wp.customize("testimonial_img_size_setting", function( value ){
		value.bind(function(to){
			$("#testimonial_panel").css('background-size', to ? to : '' );
		});
	});

	wp.customize("testimonial_img_position_setting", function( value ){
		value.bind(function(to){
			
			to = to.replace(/-/g, ' ');
			
			$("#testimonial_panel").css('background-position', to ? to : '' );
		});
	});
	
	
	wp.customize("testimonial_font_color_setting", function( value ){
		value.bind(function(to){
			$("#testimonial_panel").css('color', to ? to : '' );
		});
	});	
	
	wp.customize("testimonial_link_color_setting", function( value ){
		value.bind(function(to){
			$("#testimonial_panel a").css('color', to ? to : '' );
		});
	});		
	
	/*
	 * Latest Article Panel
	 */
	wp.customize("article_content_visibility_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#latest_article_panel").css("display","none");
			}else{
				$("#latest_article_panel").css("display","block");
			}
		} );
	});		
	
	wp.customize("latest_article_heading_setting",function( value ) {
        value.bind(function(to) {
            $('#latest_article_panel .panel-heading').html(to);
        });
    });

	wp.customize("latest_article_description_setting",function( value ) {
        value.bind(function(to) {
            $('#latest_article_panel .panel-description').html(to);
        });
    });		
	
	wp.customize("latest_article_link_text_setting", function(value) {
		value.bind(function(to) {
			if(to == ''){
				$("#article_more_link").css("display","none");
			}else{
				$("#article_more_link").css("display","block");
				$('#article_link_text').html(to);
			}
		} );
	});		
	
	wp.customize("latest_article_link_url_setting",function( value ) {
        value.bind(function(to) {
            $('#article_more_link a').attr("href", to);
        });
    });	
	
	
	wp.customize("latest_article_heading_color_setting", function( value ){
		value.bind(function(to){
			$("#latest_article_panel .panel-heading").css('color', to ? to : '' );
		});
	});	

	wp.customize("latest_article_text_color_setting", function( value ){
		value.bind(function(to){
			$("#latest_article_panel").css('color', to ? to : '' );
		});
	});	
	
	wp.customize("latest_article_link_color_setting", function( value ){
		value.bind(function(to){
			$(".article-listbox a").css('color', to ? to : '' );
		});
	});	
	
	wp.customize("latest_article_button_color_setting", function( value ){
		value.bind(function(to){
			$("#article_link_text").css('background', to ? to : '' );
		});
	});	
	
	wp.customize("latest_article_button_font_color", function( value ){
		value.bind(function(to){
			$("#article_link_text").css('color', to ? to : '' );
		});
	});	
	
	/* 
	 * Contact Us Panel 
	 */
	 
	wp.customize("contactform_content_visibility_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#contact_panel").css("display","none");
			}else{
				$("#contact_panel").css("display","block");
			}
		} );
	});	 

	wp.customize("contactform_heading_setting",function( value ) {
        value.bind(function(to) {
            $('#contact_panel .panel-heading').html(to);
        });
    });

	wp.customize("contactform_description_setting",function( value ) {
        value.bind(function(to) {
            $('#contact_panel .panel-description').html(to);
        });
    });		
	
	wp.customize("contactform_submit_text_setting", function(value) {
		value.bind(function(to) {
			$('#contact_submit').html(to);
		} );
	});	
	

	wp.customize("contactform_default_form_setting", function(value) {
		value.bind(function(to) {
			if(to != 1){
				$("#default_contactform").css("display","none");
			}else{
				$("#default_contactform").css("display","block");
			}
		} );
	});		
	
	wp.customize("contactform_button_color_setting", function( value ){
		value.bind(function(to){
			$("#contact_submit").css('background', to ? to : '' );
		});
	});	
	
	wp.customize("contactform_button_font_color", function( value ){
		value.bind(function(to){
			$("#contact_submit").css('color', to ? to : '' );
		});
	});		

	wp.customize("contactform_img_repeat_setting", function( value ){
		value.bind(function(to){
			$("#contact_panel").css('background-repeat', to ? to : '' );
		});
	});

	wp.customize("contactform_img_size_setting", function( value ){
		value.bind(function(to){
			$("#contact_panel").css('background-size', to ? to : '' );
		});
	});

	wp.customize("contactform_img_position_setting", function( value ){
		value.bind(function(to){
			
			to = to.replace(/-/g, ' ');
			
			$("#contact_panel").css('background-position', to ? to : '' );
		});
	});
	
	wp.customize( 'contactform_bg_color_setting', function( value ) {
        value.bind( function( to ) {
            $('#contact_panel').css('background-color', to ? to : '' );
        });
    });
	
	wp.customize("contactform_heading_color_setting", function( value ){
		value.bind(function(to){
			$("#contact_panel .panel-heading").css('color', to ? to : '' );
		});
	});	

	wp.customize("contactform_font_color_setting", function( value ){
		value.bind(function(to){
			$("#contact_panel").css('color', to ? to : '' );
		});
	});		
	
	
	/* 
	 * Footer
	 */
	/*footer top*/
	wp.customize( 'footer_top_background_setting', function( value ) {
        value.bind( function( to ) {
            $('#footer_top').css('background-color', to ? to : '' );
        });
    });	 
	
	
	wp.customize("footer_top_heading_color_setting", function( value ){
		value.bind(function(to){
			$("#footer_top h1, #footer_top h2, #footer_top h3, #footer_top h4, #footer_top h5, #footer_top h6").css('color', to ? to : '' );
		});
	});	

	wp.customize("footer_top_font_color_setting", function( value ){
		value.bind(function(to){
			$("#footer_top").css('color', to ? to : '' );
		});
	});	
	
	wp.customize("footer_top_link_color_setting", function( value ){
		value.bind(function(to){
			$("#footer_top a").css('color', to ? to : '' );
		});
	});		
	
	
	/*footer bottom*/
	wp.customize( 'footer_bottom_background_setting', function( value ) {
        value.bind( function( to ) {
            $('#footer_bottom').css('background-color', to ? to : '' );
        });
    });	
	
	wp.customize("footer_bottom_font_color_setting", function( value ){
		value.bind(function(to){
			$("#footer_bottom").css('color', to ? to : '' );
		});
	});

	wp.customize("footer_bottom_social_color_setting", function( value ){
		value.bind(function(to){
			$("#footer_bottom .footer-social li a").css('color', to ? to : '' );
		});
	});		
	
})(jQuery);