<?php 
	/* Tagline  ---------------------------------------------*/
	add_shortcode('tagline', 'evont_tagline');
	function evont_tagline($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'color_style' => '',
					'tag_icon' => '',
					'date' => '25',
					'title_a' => 'MEET UP',
					'title_b' => 'BUSINESS CONFERENCE',
					'button_text' => 'LEARN MORE',
					'button_link' => '#',
					'text_align' => ''
					
				), $atts)); 
		//initial variables
		$out=''; 
		//function code
			
			$dark_light_color = "";
			$set_text_align='';
			
			if($color_style == "light") {
			$dark_light_color = "jx-light";
			} elseif ($color_style == "dark") {
			$dark_light_color = "jx-dark";
			}
			
			if($text_align == "left") {
				$set_text_align = "jx-left";
			} elseif ($text_align == "right") {
				$set_text_align = "jx-right";
			} elseif ($text_align == "center") {
				$set_text_align = "jx-center";
			}
			switch($type){ 
			case '1':
			
			$out  ='
				<!-- Tagline START -->
					<div class="jx-evont-tagline-section '.$set_text_align.' '.$color_style.'">
					
						<div class="row">
							<div class="jx-evont-heading"> <span class="number">'.$date.'</span>
							  <div class="jx-evont-main-heading"> <span class="txt-1">'.$title_a.'<br>
								</span> <span class="txt-2">'.$title_b.'</span> </div>
							  <div class="clearfix"></div>
							</div>
							<p>'.do_shortcode($content).'</p>
							<div class="space40"></div>
							<a class="btn btn-default mainBtn" href="'.$button_link.'">'.$button_text.'</a>
							<div class="space40"></div>
						</div>
					
					</div>					
				<!-- Tagline END-->
			'; 
			
			break;
			
			case '2':
			
			$out  ='				
				<!-- Tagline START-->
					
					<div class="jx-evont-tagline-2 '.$set_text_align.' '.$color_style.'">
					
						<div class="row">
							<div class="jx-evont-tagline-title">'.$title_a.'</div>
							<div class="jx-evont-tagline-subtitle">'.$title_b.'</div>							
							<div class="jx-evont-tagline-description">'.do_shortcode($content).'</div>
							<a class="jx-event-tagline-button" href="'.$button_link.'">'.$button_text.'</a>
						</div>
					
					</div>
					
				<!-- Tagline END-->
			';
			
			
			break;
			
			case '3':
			
			$out  ='				
				<!-- Tagline START-->
					
					<div class="jx-evont-tagline-3 '.$set_text_align.' '.$color_style.'">
					
						<div class="row">
							<div class="jx-evont-tagline-title">'.$title_a.'</div>							
							<a class="jx-event-tagline-button" href="'.$button_link.'">'.$button_text.' <i class="fa-icon-chevron-right"></i></a>
						</div>
					
					</div>
					
				<!-- Tagline END-->
			';
			
			
						break;
			
			case '4':
			
			$out  ='
			
				<!-- Tagline START-->
					
					<div class="jx-evont-tagline-4 '.$set_text_align.' '.$color_style.'">
					
						<div class="row">

							<div class="left-position">
							<div class="tag_icon"><i class="'.$tag_icon.'"></i></div>
							</div>

							<div class="right-position">
								<div class="jx-evont-tagline-title">'.$title_a.'</div>
								<div class="jx-evont-tagline-subtitle">'.$title_b.'</div>							
								<a class="jx-event-tagline-button" href="'.$button_link.'">'.$button_text.' <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					
					</div>
					
				<!-- Tagline END-->
				
			'; 
			
			
			break;
			
			case '5':
			
			$out  ='
			
				<!-- Tagline START-->
					
					<div class="jx-evont-tagline-5 '.$set_text_align.' '.$color_style.'">
					
						<div class="row">

							<div class="left-position">
							<div class="tag_icon"><i class="'.$tag_icon.'"></i></div>
							</div>

							<div class="right-position">
								<div class="jx-evont-tagline-title">'.$title_a.'</div>
								<div class="jx-evont-tagline-subtitle">'.$title_b.'</div>							
								<a class="jx-event-tagline-button" href="'.$button_link.'">'.$button_text.' <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					
					</div>
					
				<!-- Tagline END-->
				
			'; 
			
			}
			
			
			
			

		//return output
		return $out;
	}
	
	
	
	//Visual Composer
	add_action( 'vc_before_init', 'vc_tagline' );
	
	function vc_tagline() {	
		vc_map(array(
		  "name" => esc_html__( "Tagline", "evont" ),
		  "base" => "tagline",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_tag.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Tagline','evont'),
		  "params" => array(
					 
	
	
	
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Style",'evont'),
				 "param_name" => "type",
				 "value" => array(   
					__('Select Style', 'evont') => 'none',
					__('Tagline 1', 'evont') => '1',
					__('Tagline 2', 'evont') => '2',
					__('Tagline 3', 'evont') => '3',
					__('Tagline 4', 'evont') => '4',
					__('Tagline 5', 'evont') => '5',
						),
			),
			
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
					'heading' => __( 'Icon', 'TEXT_DOMAIN' ),
					'param_name' => 'tag_icon',
					'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => __( 'Select icon from library.', 'TEXT_DOMAIN' ),
					'save_always' => true
				),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Date", "evont" ),
				"param_name" => "date",
				"value" => "25",
				"description" => esc_html__( "Add Your Date Here", "evont" )
			 ),
					
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title A", "evont" ),
				"param_name" => "title_a",
				"value" => "MEET UP",
				"description" => esc_html__( "Add Your Title A Here", "evont" )
			 ),


			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title B", "evont" ),
				"param_name" => "title_b",
				"value" => " BUSINESS CONFERENCE",
				"description" => esc_html__( "Add Your Title B Here", "evont" )
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
				"heading" => esc_html__( "Button Text", "evont" ),
				"param_name" => "button_text",
				"value" => "Learn More",
				"description" => esc_html__( "Add Your Title Here", "evont" )
			 ),
	
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Button link", "evont" ),
				"param_name" => "button_link",
				"value" => "#",
				"description" => esc_html__( "Add Your Sub Title Here", "evont" )
			 ),
			 
			 array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Set Text Alignment",'evont'),
				 "param_name" => "text_align",
				 "value" => array(   
					__('Select Text Alignment', 'evont') => '',
					__('Left', 'evont') => 'left',
					__('Right', 'evont') => 'right',
					__('Center', 'evont') => 'center',
						),
			),		 
				
					 
		  )
	   ));
    
	}
	
	
	
	
?>