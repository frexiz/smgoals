<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('contact_info_form', 'evont_contact_info_form');
	
	function evont_contact_info_form($atts, $description = null) { 
		extract(shortcode_atts(array(
				'contact_form' => ''

		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		
		
				
		$out  ='<div class="contact-form-info">
					<div class="contact-info-details">'.do_shortcode($description).'</div>
					<div class="contact-info-form">'.do_shortcode($contact_form).'</div>
				</div>'; 
					
						
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('contact_info_detail', 'evont_contact_info_detail');
	
	function evont_contact_info_detail($atts, $description = null) { 
		extract(shortcode_atts(array(
					'icon_color' => '#FF0000',
					'icon' => 'Select Icon',
					'text_a' => '',
					'text_b' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 

		
		//function code
		
		$out ='
		<div class="item">
			<div><i class="'.$icon.'"></i></div>
			<div>'.$text_a.'</div>
			<div>'.$text_b.'</div>
		</div>
		';
		
	
		
		//return output
		return $out;
	}
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_contact_info_detail' );
	
	
	function vc_contact_info_detail() {	
		
		vc_map( array(
			"name" => __("contact_info_detail Group", "evont"),
			"base" => "contact_info_form",
			"as_parent" => array('only' => 'contact_info_detail'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				array(
					"type" => "textarea",
					"class" => "",
					"heading" => esc_html__( "contact form", "evont" ),
					"param_name" => "contact_form",
					"value" => "",
					"description" => esc_html__( "Type Contact Form Here", "evont" )
				 )					
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("Single contact_info_detail", "evont"),
			"base" => "contact_info_detail",
			"content_element" => true,
			"as_child" => array('only' => 'contact_info_form'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				


			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Text color", "my-text-domain" ),
				"param_name" => "icon_color",
				"value" => '#FF0000', //Default Red color
				"description" => __( "Choose text color", "my-text-domain" )
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
				"heading" => esc_html__( "Text A", "evont" ),
				"param_name" => "text_a",
				"value" => "",
				"description" => esc_html__( "Type Text Here", "evont" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Text B", "evont" ),
				"param_name" => "text_b",
				"value" => "",
				"description" => esc_html__( "Type Text Here", "evont" )
			 )
			 
			 
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_contact_info_form extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_contact_info_detail extends WPBakeryShortCode {
			}
		}
		
	}
?>