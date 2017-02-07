<?php 
	/* cbox Player  ---------------------------------------------*/
	
	add_shortcode('cbox', 'jx_evont_cbox');
	
	function jx_evont_cbox($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'icon' => 'Select Icon',
			'number' => '80',
            'title_1' => 'Professional',
			'title_2' => 'Speakers',
			'link_text' => 'Learn More',	
			'link_url' => 'https://www.youtube.com/watch?v=W6-h1HUWBKg'		
		), $atts)); 
		 
		 
		//initial variables
		$out=''; 
		
		//function code
		
		switch($type){ 
			case '1':
		
			$out ='			
			<!--start here-->
			<div class="jx-evont-content-box style-1">
			
				<div class="jx-counter-cbox">'.$number.'</div>
				<!-- counter -->
				
				<div class="jx-content-box">
					<h1>'.$title_1.'</h1>
					<h2>'.$title_2.'</h2>
					<a href="'.$link_url.'">'.$link_text.'</a>								
				</div>
				
			
			</div>
			<!-- end here-->
			';	
		
			break;
			
			case '2':

			$out ='			
			<!--start here-->
			<div class="jx-evont-content-box style-2">
				
				<div class="jx-content-box">
					<div class="icon"><i class="'.$icon.'"></i></div>
					<h1>'.$title_1.'</h1>
					<h2>'.$title_2.'</h2>								
				</div>
			
			</div>
			<!-- end here-->
			';
			
			
			}
			
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_evont_cbox' );
	
	
	function vc_evont_cbox() {	
		vc_map(array(
		  "name" => esc_html__( "Content Box", "evont" ),
		  "base" => "cbox",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_map.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Content Box','evont'),
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
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'fontawesome',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'evont' ),
				'save_always' => true
			),


			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title 1", "evont" ),
				"param_name" => "title_1",
				"value" => "Professional", 
				"description" => esc_html__( "Type First Title", "evont" )
			 ),
             
             array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title 2", "evont" ),
				"param_name" => "title_2",
				"value" => "Speaker", 
				"description" => esc_html__( "Type 2nd Title", "evont" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Count Number", "evont" ),
				"param_name" => "number",
				"value" => "80", 
				"description" => esc_html__( "Type number", "evont" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Link Text", "evont" ),
				"param_name" => "link_text",
				"value" => "Learn More", 
				"description" => esc_html__( "Add Link Text", "evont" )
			 ),			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Link Url", "evont" ),
				"param_name" => "link_url",
				"value" => "#", 
				"description" => esc_html__( "Add Link Url", "evont" )
			 )
			
		  )
	   )); 
	}
?>