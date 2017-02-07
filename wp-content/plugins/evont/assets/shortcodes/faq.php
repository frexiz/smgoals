<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('toggle_group', 'evont_toggle_group');
	
	function evont_toggle_group($atts, $description = null) { 
		extract(shortcode_atts(array(

		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		
		
				
		$out  ='<div class="jx-evont-toggle">'.do_shortcode($description).'</div>'; 
					
						
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('toggle', 'evont_toggle');
	
	function evont_toggle($atts, $description = null) { 
		extract(shortcode_atts(array(
					'color_style' => '',
					'title' => '',
					'description' => ''
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
		
		$out ='<h3 class="evont-toggle-trigger '.$color_class.'"><a href="#">'.$title.'</a></h3>
		<div class="evont-toggle_container">'.$description.'</div>';
		
	
		
		//return output
		return $out;
	}
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_toggle' );
	
	
	function vc_toggle() {	
		
		vc_map( array(
			"name" => __("toggle Group", "evont"),
			"base" => "toggle_group",
			"as_parent" => array('only' => 'toggle'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
								
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("Single toggle", "evont"),
			"base" => "toggle",
			"content_element" => true,
			"as_child" => array('only' => 'toggle_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				
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
				"value" => "",
				"description" => esc_html__( "Type Title here", "evont" )
			 ),
			 
			 
			  array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "Description", "evont" ),
				"param_name" => "description",
				"value" => "",
				"description" => esc_html__( "Type Description Here", "evont" )
			 )	
			 
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_toggle_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_toggle extends WPBakeryShortCode {
			}
		}
		
	}
?>