<?php 
	/* Contact Address  ---------------------------------------------*/
	
	add_shortcode('contact_address', 'evont_contact_address');
	
	function evont_contact_address($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'icon' => '',
					'title' => 'Type Title Here',
					'subtitle' => 'Type Subtitle Here',
					'button' => 'Read More',
					'url' => ''

				), $atts)); 
		 
		
		//initial variables
		
		$out=''; 
		
		//function code
		

		switch($type){ 
		case '1':
		$out ='
		<!-- BDF CONTACT LINKS -->
			<div class="jx-evont-contact-address">
				<div class="icon"><i class="fa '.$icon.'"></i></div>
				<div class="item-position">
					<div class="title">'.$title.'</div>
					<div class="subtitle">'.$subtitle.'</div>
					<div class="description">'.do_shortcode($content).' </div>
					<div><a href="'.$url.'" class="btn btn-default mainBtn">'.$button.'</a></div>
				</div>				
			</div>
        <!-- EDF CONTACT LINKS -->
		'; 
			
		break;
		
		case '2':			
			$out ='
			<!-- BDF CONTACT LINKS -->
				<div class="jx-evont-contact-address style-2">
					<div class="icon"><i class="fa '.$icon.'"></i></div>
					<div class="item-position">
						<div class="title">'.$title.'</div>
						<div class="description">'.do_shortcode($content).' </div>
					</div>				
				</div>
			<!-- EDF CONTACT LINKS -->
		'; 


		}		

		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_contact_address' );
	
	
	function vc_contact_address() {	
		vc_map(array(
      "name" => esc_html__( "Contact Address", "evont" ),
      "base" => "contact_address",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_contact_detail.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Contact Address','evont'),
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
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'evont' ),
			'param_name' => 'icon',
			'settings' => array(
			'emptyIcon' => false, // default true, display an "EMPTY" icon?
			'type' => 'linecons',
			'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'description' => __( 'Select icon from library.', 'evont' ),
			'save_always' => true
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
			"value" => "Airport",
            "description" => esc_html__( "Add your Subtitle Here", "evont" )
         ),
		 
		array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'evont'),
			 "param_name" => "content",
			 "value" => "",
		),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Button", "evont" ),
            "param_name" => "button",
			"value" => "Read More",
            "description" => esc_html__( "Add your Button text Here", "evont" )
         ),
		 
		  array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Button Link", "evont" ),
            "param_name" => "url",
			"value" => "",
            "description" => esc_html__( "Add your Button URL Here", "evont" )
         )
		 
		 		 
		
      )
   )); 
	}
	
	
	
?>