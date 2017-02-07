<?php
	
	
	//=========================================================================*//
	//						Ajax Contact Form 	
	//=========================================================================//
		function addme_ajaxurl() {
			?>
			<script type="text/javascript">
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			</script>
			<?php
		}
		add_action('wp_head','addme_ajaxurl');
		
		add_action('wp_ajax_submit_form', 'submit_form_callback');
		add_action('wp_ajax_nopriv_submit_form', 'submit_form_callback');
		
		function submit_form_callback(){
			
			$error='';
			$params = array();
			parse_str($_POST['data'], $params);
		
			$name = trim($params['contact_full_name']);
			$email = $params['contact_email'];
			$subject = $params['contact_subject'];
			$message = $params['contact_message'];
					
			
			$site_owners_email = $evont_data['text_email']; // Replace this with your own email address
		
			$body    = esc_html__('Name:', 'evont')." $name \n\n"; 
			$body   .= esc_html__('Email:', 'evont')." $email \n\n"; 
			$body   .= esc_html__('Message:', 'evont')." $message \n\n"; 
			
			$headers = 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n"; 
			
			if (!$error) {				
				
				$mail = mail($site_owners_email, $subject, $body,$headers);
				$success['success'] = "<div class='success'>" . $name . ", We've received your email. We'll be in touch with you as soon as possible! </div>";
				
				echo json_encode($success);				
				
			} # end if no error
			else {
		
				echo json_encode($error);
			} # end if there was an error sending
			
			die(); // this is required to return a proper result
		}
		
		//Request Form Submit
		add_action('wp_ajax_request_form', 'request_form_callback');
		add_action('wp_ajax_nopriv_request_form', 'request_form_callback');
		
		function request_form_callback(){
			
			$error='';
			$params = array();
			parse_str($_POST['data'], $params);
		
			$name = trim($params['jx-evont-service-type']);
			$email = $params['contact_email'];
			$subject = $params['contact_subject'];
			$message = $params['contact_message'];
					
			
			$site_owners_email = $evont_data['text_email']; // Replace this with your own email address
		
			$body    = esc_html__('Name:', 'evont')." $name \n\n"; 
			$body   .= esc_html__('Email:', 'evont')." $email \n\n"; 
			$body   .= esc_html__('Message:', 'evont')." $message \n\n"; 
			
			$headers = 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n"; 
			
			if (!$error) {				
				
				$mail = mail($site_owners_email, $subject, $body,$headers);
				$success['success'] = "<div class='success'>" . $name . ", We've received your email. We'll be in touch with you as soon as possible! </div>";
				
				echo json_encode($success);				
				
			} # end if no error
			else {
		
				echo json_encode($error);
			} # end if there was an error sending
			
			die(); // this is required to return a proper result
		}
		
		?>