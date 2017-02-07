<?php 
	/* Contact Derails  ---------------------------------------------*/
	
	add_shortcode('contact_details', 'evont_contact_details');
	
	function evont_contact_details($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'image' => '',
					'title' => 'Type Title Here',
					'subtitle' => 'Type Subtitle Here',
					'description' => '',
					'email' => 'info@support.com',
					'address' => 'MAKILN ROAD,4352 AVENUE STREET. CALIFORNIA, NY',
					'tel' => '+997 54 132546',
					'fax' => '+997 54 132546',
					'facebook' => 'evont',
					'twitter' => 'evont',
					'linkedin' => 'evont',
					'googleplus' => 'evont',
				), $atts)); 
		 
		
		//initial variables
		
		$out=''; 
		$facebook_class='';
		$twitter_class='';
		$linkedin_class='';
		$google_plus_class='';
		
		if($facebook):
		$facebook_class='<li><a href="http://www.facebook.com/'.$facebook.'"><i class="fa fa-facebook"></i></a></li>';
		endif;
		
		if($twitter):
		$twitter_class='<li><a href="http://www.twitter.com/'.$twitter.'"><i class="fa fa-twitter"></i></a></li>';
		endif;
		
		if($linkedin):
		$linkedin_class='<li><a href="http://www.linkedin.com/'.$linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
		endif;
		
		if($googleplus):
		$google_plus_class='<li><a href="http://www.google.com/'.$googleplus.'"><i class="fa fa-google-plus"></i></a></li>';
		endif;

		
		//function code
		
		$img = wp_get_attachment_image_src($image, "evont_small-blog");
		$imgSrc = $img[0];

		switch($type){ 
			case '1':
			
		$out ='
		<!-- BDF CONTACT LINKS -->
			<div class="jx-evont-contact-info">
											
				<div class="item-position">
					
					<div class="logo"><img src="'.$imgSrc.'" alt=""></div>
				
					<div class="title">'.$title.'</div>
					
					<div class="address">
						<div class="icon"><i class="fa fa-map-marker"></i></div>
						<div class="value">'.$address.'</div>                           
					</div>
					
					<div class="phone">
						<div class="icon"><i class="fa fa- fa-phone"></i></div>
						<div class="value">'.esc_html__('Tel','evont').': '.$tel.'</div>
						<div class="value">'.esc_html__('Fax','evont').': '.$fax.'</div>
					</div>
				</div>

					<div class="email">
						<div class="icon"><i class="fa fa-envelope"></i></div>
						<div class="value">'.esc_html__('Email','evont').': '.$email.'</div>
					</div>
				
				<div class="contact-social">
					<ul>						
						'.$facebook_class.'
						'.$twitter_class.'
						'.$linkedin_class.'
						'.$google_plus_class.'
					</ul>
				
				</div>
								
			</div>
        <!-- EDF CONTACT LINKS -->
		'; 
			
		break;
			
			case '2':
			
				$out ='
				<!-- BDF CONTACT LINKS -->
					<div class="jx-evont-contact-info">
																		
						<div class="item-position">
							
							<div class="subtitle">'.$subtitle.'</div>												
							<div class="title">'.$title.'</div>
							<div class="description">'.$description.'</div>
							
							<div class="address">
								<div class="icon"><i class="fa fa-map-marker"></i></div>
								<div class="value">'.$address.'</div>                           
							</div>
							
							<div class="phone">
								<div class="icon"><i class="fa fa- fa-phone"></i></div>
								<div class="value">'.esc_html__('Tel','evont').': '.$tel.'</div>
								<div class="value">'.esc_html__('Fax','evont').': '.$fax.'</div>
							</div>
								
						</div>	
						
						<div class="email">
							<div class="icon"><i class="fa fa-envelope"></i></div>
							<div class="value">'.esc_html__('Email','evont').': '.$email.'</div>
						</div>
							
					</div>
				<!-- EDF CONTACT LINKS -->
				'; 	
			
			}			
			
			
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_contact_details' );
	
	
	function vc_contact_details() {	
		vc_map(array(
      "name" => esc_html__( "Contact Details", "evont" ),
      "base" => "contact_details",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_contact_detail.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Contact Details','evont'),
      "params" => array(
	  



		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("Select Style",'evont'),
			 "param_name" => "type",
			 "value" => array(   
				__('Select Style', 'evont') => 'none',
				__('Style 1', 'evont') => '1',
				__('Style 2', 'evont') => '2',
				),
		),

		 array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__( "image", "evont" ),
			"param_name" => "image",
			"value" => "Select logo", //Default Counter Up Text
			"description" => esc_html__( "Add your Company Logo", "evont" )
		 ),			 		 
			 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Title", "evont" ),
            "param_name" => "title",
			"value" => " ",
            "description" => esc_html__( "Add your Title Here", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Subtitle", "evont" ),
            "param_name" => "subtitle",
			"value" => " ",
            "description" => esc_html__( "Add your Subtitle Here", "evont" )
         ),
		 
		 
		 
		  array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__( "Description", "evont" ),
			"param_name" => "description",
			"value" => " ",
			"description" => esc_html__( "Type Description Text here", "evont" )
		 ),	
		 
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Email", "evont" ),
            "param_name" => "email",
			"value" => "info@example.com",
            "description" => esc_html__( "Add your email", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Address", "evont" ),
            "param_name" => "address",
			"value" => "MAKILN ROAD,4352 AVENUE STREET. CALIFORNIA, NY",
            "description" => esc_html__( "Add your Address", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Phone Number", "evont" ),
            "param_name" => "tel",
			"value" => "(997) 54 132546",
            "description" => esc_html__( "Add your Phone Number", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Fax Number", "evont" ),
            "param_name" => "fax",
			"value" => "(997) 54 132546",
            "description" => esc_html__( "Add your Fax Number", "evont" )
         ),

		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Facebook", "evont" ),
            "param_name" => "facebook",
			"value" => "evont",
            "description" => esc_html__( "Add your Facebook Account", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Twitter", "evont" ),
            "param_name" => "twitter",
			"value" => "evont",
            "description" => esc_html__( "Add your Twitter Account", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Linkedin", "evont" ),
            "param_name" => "linkedin",
			"value" => "evont",
            "description" => esc_html__( "Add your Linkedin Account", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Google+", "evont" ),
            "param_name" => "googleplus",
			"value" => "evont",
            "description" => esc_html__( "Add your Google Plus Account", "evont" )
         ),
		 
		
      )
   )); 
	}
	
	
	
?>