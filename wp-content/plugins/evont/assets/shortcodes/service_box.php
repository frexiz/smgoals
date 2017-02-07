<?php 
	
		
	//Visual Composer
	
	
	add_shortcode('service_box_single', 'evont_service_box_single');
	
	function evont_service_box_single($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'title' => 'PREMIUM SLIDERS',
					'icon' => 'Select Icon',
					'icon_color' => '#FF0000',
					'readmore_link' => ''			
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$neg_class="";
		
		//function code
		

			switch($type){ 
			case '1':
			
			$out  .='						
			<div class="jx-evont-servicebox-1">
				<div class="servicebox-item"> 			
					<div class="item-position">
						<div class="icon" style="color:'.$icon_color.'"><i class="'.$icon.'"></i></div>
						<div class="title">'.$title.'</div>
						<!-- Title -->
						<div class="discription">'.do_shortcode($content).'</div>

						<div class="readmore"><a href="'.$readmore_link.'"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i></a></div>
					</div>						
				</div>
				<div class="clearfix"></div>
			</div>
			';
			
			break;
			
			case '2':
			
			$out  .='						
			<div class="jx-evont-servicebox-2">
				<div class="servicebox-item"> 			
					<div class="item-position">
						<div class="icon" style="color:'.$icon_color.'"><i class="'.$icon.'"></i></div>
						<div class="title">'.$title.'</div>
						<!-- Title -->
						<div class="discription">'.do_shortcode($content).'</div>
					</div>						
				</div>
				<div class="clearfix"></div>
			</div>
			';
			
			break;
			
			case '3':
			
			$out  .='						
				<div class="jx-evont-servicelist-1">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							<div class="icon" style="color:'.$icon_color.'"><i class="'.$icon.'"></i></div>
							<!-- Servicelist Icon -->
							<div class="item-position">
							<div class="category ">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			';
			
			break;
			}
		
		//return output
		return $out;
	}
	
	
	
	add_action( 'vc_before_init', 'vc_service_box_single' );
	
	
	function vc_service_box_single() {	
		vc_map(array(
		  "name" => esc_html__( "Service Box", "evont" ),
		  "base" => "service_box_single",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_service_box.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Service Box Single','evont'),
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
						__('Style 3', 'evont') => '3',
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
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Text color", "my-text-domain" ),
					"param_name" => "icon_color",
					"value" => '#FF0000', //Default Red color
					"description" => __( "Choose text color", "my-text-domain" )
				 ),

								
				array(
					"type" => "textfield",
					"heading" => __("Title", "evont"),
					"param_name" => "title",
					"value" =>"Type Title Here",
					"description" => __("Type title here", "evont")
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
					"heading" => __("Readmore Link", "evont"),
					"param_name" => "readmore_link",
					"value" => "#",
					"description" => __("Type readmore link", "evont")
				)
				
							
		  )
	   ));
    
	}
	
	
	?>