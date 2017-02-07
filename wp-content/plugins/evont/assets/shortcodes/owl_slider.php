<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('owl_group', 'evont_owl_group');
	
	function evont_owl_group($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'list_style' => '',
			'font_size' => 'default',
			'icon_bg' => 'none',
			'color_style' => 'dark',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		
		$style = "";
		$font_size_class="";
		$icon_bg_class="";
		$color_style_class="";
		
				
		$out  ='
			<div class="jx-evont-owl-slider owl-carousel owl-theme owl-center owl-loaded">
			'.do_shortcode($content).'
			</div>
		'; 
					
						
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('owl', 'evont_owl');
	
	function evont_owl($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => '',
					'subtitle' => '',
					'image' => '',
					'icon' => 'fa fa-check',
					'readmore_text' =>'',
					'readmore_link' =>''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$readmore_btn='';
		
		
		//function code
		$img = wp_get_attachment_image_src($image, "evont_small-blog");
	 	$imgSrc = $img[0];
		
		$out ='<div><a href="'.$readmore_link.'"><img src="'.$imgSrc.'" alt=""></a></div>';
		
	
		
		//return output
		return $out;
	}
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_owl' );
	
	
	function vc_owl() {	
		
		vc_map( array(
			"name" => __("owl Group", "evont"),
			"base" => "owl_group",
			"as_parent" => array('only' => 'owl'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
			"name" => __("Single owl", "evont"),
			"base" => "owl",
			"content_element" => true,
			"as_child" => array('only' => 'owl_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( "Image", "evont" ),
					"param_name" => "image",
					"value" => "Select Image", //Default Counter Up Text
					"description" => esc_html__( "Add image", "evont" )
				 ),	
				
				array(
					"type" => "textfield",
					"heading" => __("Readmore Link", "evont"),
					"param_name" => "readmore_link",
					"value" => "#",
					"description" => __("Type readmore link", "evont")
				),
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_owl_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_owl extends WPBakeryShortCode {
			}
		}
		
	}
?>