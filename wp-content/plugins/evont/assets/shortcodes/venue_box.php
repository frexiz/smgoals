<?php 

	/* Venue  ---------------------------------------------*/
	
	add_shortcode('venue', 'evont_venue');
	
	function evont_venue($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'icon' => '',
					'image' => '',
					'title' => 'Learn More About Evont',
					'price' => '$83',
					'area' => 'Park',
					'facility_a' => 'Wifi',
					'facility_b' => 'Family Rooms',
					'facility_c' => 'Smoking Rooms',
					'average_price_title' => 'Average Price Per Night',
					'url' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		 	$img = wp_get_attachment_image_src($image, "small-blog");

	 	$imgSrc = $img[0];
		
		//function code

			switch($type){ 
			case '1':
			$out ='
			<div class="jx-venue-1">			
				<div class="jx-venue-item">

					<div class="image-hover">
						<div class="image"><img src="'.$imgSrc.'" alt=""></div>
						<!-- Image -->
						
						<div class="title"><a href="'.$url.'">'.$title.'</a></div>
						<!-- Title -->
					</div>					

					<!-- Image - Hover -->					

					<div class="detail-list">
						<ul>
							<li><i class="fa fa-check-circle-o"></i> '.$facility_a.'</li>
							<li><i class="fa fa-check-circle-o"></i> '.$facility_b.'</li>
							<li><i class="fa fa-check-circle-o"></i> '.$facility_c.'</li>
						</ul>
					</div>
					<!-- Details -->
					
					<div class="average">
						<span class="average-title">'.$average_price_title.'</span>
						<span class="price">'.$price.'</span>
					</div>			
					<!-- Average Price -->
				</div>
			</div>';
			
			break;
			
			case '2':
 
 			$out ='
			<div class="jx-venue-2">			
				<div class="jx-venue-item">

					<div class="image-hover">
						<div class="image"><img src="'.$imgSrc.'" alt=""></div>
						<!-- Image -->
					</div>					
										
					<div class="details">
						<div class="icon"><i class="fa '.$icon.'"></i></div>
						<div class="title">'.$title.'</div>
						<!-- Title -->
						<div class="area">'.$area.'</div>			
						<!-- Area -->
					</div>
										
				</div>
			</div>';
			
			break;
		
		}
			
		
		//return output
		return $out;
	}







	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_venue' );
	
	
	function vc_venue() {	
	vc_map(array(
      "name" => esc_html__( "Venue", "evont" ),
      "base" => "venue",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_partners.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Venue','evont'),
      "params" => array(
	  
	  

	array(
		 "type" => "dropdown",
		 "class" => "",
		 "heading" => __("Select Style",'evont'),
		 "param_name" => "type",
		 "value" => array(   
			__('Select Style', 'evont') => 'none',
			__('Style A', 'evont') => '1',
			__('Style B', 'evont') => '2',
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
		"type" => "attach_image",
		"class" => "",
		"heading" => esc_html__( "Image", "evont" ),
		"param_name" => "image",
		"value" => "Select Image", //Default Counter Up Text
		"description" => esc_html__( "Add Image Here", "evont" )
	 ),
		 		 	
	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Title", "evont" ),
		"param_name" => "title",
		"value" => "Learn More About Ievent", //Default Counter Up Text
		"description" => esc_html__( "Add Your Title Here", "evont" )
	 ),

	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Area", "evont" ),
		"param_name" => "area",
		"value" => "Park", //Default Counter Up Text
		"description" => esc_html__( "Add Your Area name Here", "evont" )
	 ),


	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Facility A", "evont" ),
		"param_name" => "facility_a",
		"value" => "Wifi", //Default Counter Up Text
		"description" => esc_html__( "Add Facility A", "evont" )
	 ),

	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Facility B", "evont" ),
		"param_name" => "facility_b",
		"value" => "Family Rooms", //Default Counter Up Text
		"description" => esc_html__( "Add Facility B", "evont" )
	 ),

	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Facility C", "evont" ),
		"param_name" => "facility_c",
		"value" => "Smoking Rooms", //Default Counter Up Text
		"description" => esc_html__( "Add Facility C", "evont" )
	 ),
	 
	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Average Price Title", "evont" ),
		"param_name" => "average_price_title",
		"value" => "Average Price Per Night", //Default Counter Up Text
		"description" => esc_html__( "Add Price Title", "evont" )
	 ),


	array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Price", "evont" ),
		"param_name" => "price",
		"value" => "$83", //Default Counter Up Text
		"description" => esc_html__( "Add Price", "evont" )
	 ),
	array(
		 
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__( "Link", "evont" ),
		"param_name" => "url",
		"value" => "#url", //Default Counter Up Text
		"description" => esc_html__( "Add URL here", "evont" )
	 )		 
		 
		
      )
   )); 
	}
	
	
?>