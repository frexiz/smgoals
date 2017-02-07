<?php 
		/* Counter Up  ---------------------------------------------*/
	
	add_shortcode('vc_counter_up', 'vc_evont_counter_up');
	
	function vc_evont_counter_up($atts, $content = null) { 
		extract(shortcode_atts(array(
					'color_style' => '',
					'icon' => 'Select Icon',
					'count_up' => '',
					'count_up_text' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$dark_light_color = "";
		
		if($color_style == "light") {
		$dark_light_color = "jx-light";
		} elseif ($color_style == "dark") {
		$dark_light_color = "jx-dark";
		}
		 
		
		//function code
		
 			$id= '-'.rand(0,1000);
				$out .='
				<div class="jx-evont-counter-up '.$dark_light_color.'">
					<div class="jx-evont-countup">
						<div class="jx-evont-counter-icon"><i class="'.$icon.'"></i></div>       
						<div class="jx-evont-counter-info">     
						<div id="count'.$id.'" class="count_number jx-evont-count-up">'.$count_up.'</div>            
						<div class="counter_text">'.$count_up_text.'</div>                     
						</div>
					</div>            
				<!--Count up #1 -->     
				</div>
				';
 
		//return output
		return $out;
	}
	
	add_action( 'vc_before_init', 'vc_count_up' );
	
	
	function vc_count_up() {	
		vc_map(array(
		  "name" => esc_html__( "Counter_up", "evont" ),
		  "base" => "vc_counter_up",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_count.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Counter Up','evont'),
		  "params" => array(
					 	
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Select Your Color Style",'evont'),
				"param_name" => "color_style",
				"value" => array(   
					__('Select Style', 'evont') => 'Select Your Color Style',
					__('Light', 'evont') => 'jx-light',
					__('Dark', 'evont') => 'jx-dark'
					),
				"description" => esc_html__( "Select Your Color Style", "evont" )
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
				"heading" => esc_html__( "Count up Number", "evont" ),
				"param_name" => "count_up",
				"value"=> "",
				"description" => esc_html__( "Add Count Up Number", "evont" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Count up Text", "evont" ),
				"param_name" => "count_up_text",
				"value"=> "",
				"description" => esc_html__( "Add Count Up Text", "evont" )
			 )					 
		  )
	   ));
    
	}
	?>