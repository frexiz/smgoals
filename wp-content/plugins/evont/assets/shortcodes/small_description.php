<?php 
	/* Small Description  ---------------------------------------------*/
	
	add_shortcode('small_description', 'evont_small_description');
	
	function evont_small_description($atts, $content = null) { 
		extract(shortcode_atts(array(
			'color_style' => '',		
			'title' => 'Type Title 1',
			'sub_title' => '',
			'description' => '',
			'button' => '',
			'url' => ''
			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$color_class='';
		
		if ($color_style =='light'):
		$color_class='jx-light';
		else:
		$color_class='jx-dark';
		endif;
		
		//function code
		
		
			$out  ='
				<div class="jx-evont-small-description '.$color_class.'">				
					<div class="subtitle">'.$sub_title.'</div>
					<div class="title"><h1>'.$title.'</h1></div>
					<div class="description">'.$description.'</div>
					<div class="jx-event-description-button"><a class="btn" href="'.$url.'">'.$button.' <i class="fa fa-chevron-right"></i></a></div>
				</div>
				<!-- Small Description -->		
			'; 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_small_description' );
	
	
	function vc_small_description() {	
		vc_map(array(
		  "name" => esc_html__( "Small Description", "evont" ),
		  "base" => "small_description",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_section_title.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Title','evont'),
		  "params" => array(
					 
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Color Style",'evont'),
				 "param_name" => "color_style",
				 "value" => array(   
						__('Select Color', 'evont') => 'none',
						__('Light', 'evont') => 'light',
						__('Dark', 'evont') => 'dark',
						),
			),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title", "evont" ),
				"param_name" => "title",
				"value" => "Projects in Progress",
				"description" => esc_html__( "Type title here", "evont" )
			 ),
			 
			 
			  array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Subtitle", "evont" ),
				"param_name" => "sub_title",
				"value" => "",
				"description" => esc_html__( "Type subtitle here", "evont" )
			 ),
			 
			 array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "Description", "evont" ),
				"param_name" => "description",
				"value" => "",
				"description" => esc_html__( "Type Description here", "evont" )
			 ),
			 
			 
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Button", "evont" ),
				"param_name" => "button",
				"value" => "",
				"description" => esc_html__( "Type Button Text here", "evont" )
			 ),
			 
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "URL", "evont" ),
				"param_name" => "url",
				"value" => "",
				"description" => esc_html__( "Type Button URL here", "evont" )
			 )
			 
			 			 
		  )
	   ));
    
	}
?>