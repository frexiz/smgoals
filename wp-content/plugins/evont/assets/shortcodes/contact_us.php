<?php 
	/* Contact Us  ---------------------------------------------*/
	add_shortcode('contact_us', 'evont_contact_us');
	
	function evont_contact_us($atts, $content = null) { 
		extract(shortcode_atts(array(
		
		'email_address' => ''
		
		), $atts)); 
		
		$headers='';
		$status='';
		$status_class='';
		$id = rand(0,100);
		 				
		//If the form is submitted
		if(isset($_POST['submit-contact'])) {
			
			//Subject field is not required
			$subject = trim($_POST['subject']);
			
			$name    = sanitize_text_field( $_POST["contact_name"] );
			$email   = sanitize_email( $_POST["email"] );
			$subject = sanitize_text_field( $_POST["subject"] );
			$message = esc_textarea( $_POST["msg"] );			
		
			//If there is no error, send the email
			$emailTo = get_option( ''.$email_address.'' ); //Put your own email address here 
			$body = __('Name:', 'evont')." $name \n\n"; 
			$body .= __('Email:', 'evont')." $email \n\n"; 
			$body .= __('Subject:', 'evont')." $subject \n\n"; 
			$body .= __('Message:', 'evont')."\n $message"; 
			$headers= 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n"; 
			
			if ( wp_mail($emailTo, $subject, $body, $headers) ) {
				$status= esc_html__('Thanks for contacting me, expect a response soon.','evont');
				$status_class="jx-evont-success";
			} else {
				$status = esc_html__('An unexpected error occurred','evont');
				$status_class="jx-evont-error";
			}
		
		}
		
		$out ='
					<div class="jx-evont-contact-form">
                        
                        <form action="" id="contactForm" method="post">
                            <div class="row-1">
                                <div class="contact-full-name">
                                    <input type="text" id="full-name-contact" name="full_name" placeholder="'.esc_html__('Full Name','evont').'" class="jx-evont-form-text" data-validation="required" />
                                    <!-- First Name Textbox -->
                                </div>
                                <div class="contact-email">
                                    <input type="text" id="email-contact" name="email" placeholder="'.esc_html__('Email Address','evont').'" class="jx-evont-form-text" data-validation="required" validation="email"/>
                                    <!-- Email Name Textbox -->
                                </div>
                            </div>
                            
                            <div class="row-1">
                                <div class="contact-subject">
                                    <input type="text" id="subject-contact" name="subject" placeholder="'.esc_html__('Subject','evont').'" class="jx-evont-form-text" data-validation="required" />
                                    <!-- Subject Textbox -->
                                </div>
                            </div>
                            
                            <div class="row-1">
                                <div class="contact-message">
                                    <textarea id="message-contact" name="message" class="jx-evont-form-textarea" rows="5" cols="30" placeholder="'.esc_html__('Enter Your Message Here...','evont').'" data-validation="required"></textarea>
                                    <!-- Message Box -->
                                </div>  
                                <div class="contact-submit">
                                    
                                    <button type="submit">'.esc_html__('SUBMIT','evont').'</button>
                                    <!-- Submit Button -->
                                </div>
                            </div> 
                        </form>
                        
                        </div>
		'; 
			
		
		//return output
		return $out;
	}
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_contact_us' );
	
	
	function vc_contact_us() {	
		vc_map(array(
      "name" => esc_html__( "Contact Us", "evont" ),
      "base" => "contact_us",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_contact.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Contact Us','evont'),
      "params" => array(
	 
	 
	 
	 array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Email Address", "evont" ),
		"param_name" => "email",
		"value" => "evont@gmail.com", //Default Counter Up Text
		"description" => esc_html__( "Add Your Email Address Here", "evont" )
	 )
	 
	 
		
      )
   )); 
	}
	
	
	
?>