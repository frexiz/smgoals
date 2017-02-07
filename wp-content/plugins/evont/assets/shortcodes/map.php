<?php 
	/* Subscribe  ---------------------------------------------*/
	
	add_shortcode('map', 'jx_evont_map');
	
	function jx_evont_map($atts, $content = null) { 
		extract(shortcode_atts(array(
			'title' => 'VENUE',
			'description' => '',
			'place_name' => 'Sheraton Hotel',
			'address_a' => '49 West 32nd Street, New York, NY 10001 1 212 736-3800 4.9 mi / 7.9 km from Downtown',
			"link" => '',
			"lat" =>"40.6700",
			"lng" =>"-73.9400",
			"zoom" =>"14",
			"marker_image"=>'',
			"google_map_style"=>'[{"stylers":[{"visibility":"on"},{"saturation":-100},{"gamma":0.54}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#4d4946"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"gamma":0.48}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"gamma":7.18}]}]',
			"show_address_box"=>'yes',
			"map_height"=>'450px',
		
		), $atts)); 
		 
		 
		$evont_data =  evont_globals();
		$google_key = $evont_data['google_map_key'];
		
		$lat_info='';
		$lng_info='';
		$out=''; 
		$show_map_code='';
		
	
		//initial variables
		
		
		
		
		//function code
		
			$out ='
			
			<!--contact map start here-->

			<div class="jx-evont-contactmap-section relative">
			  <div id="map-default"></div>

			  <div class="contact">
				<div class="container relative">

				  <div class="row">
						<div class="col-md-4 col-sm-6">
							  <div class="contactDetails">
								<h2>'.$title.'</h2>
								<hr>
								<p>'.$description.'</p>
								<h3>'.$place_name.'</h3>
								<p>'.$address_a.'</p>
								<a class="btn btn-default more_info" href="'.$link.'">'.esc_html__('More Information','evont').'</a>
							</div>
						</div>
						<div class="col-md-8 col-sm-6 hidden-xs"> </div>
				  </div>

				</div>
			  </div>

			</div>

			<!--contact map end here-->
			
			
			';
			
		
			if($show_address_box=='yes'):
			$show_map_code='
			
			<div class="contact">
				<div class="container relative">

				  <div class="row">
						<div class="col-md-4 col-sm-6">
							  <div class="contactDetails">
								<h2>'.$title.'</h2>
								<hr>
								<p>'.$description.'</p>
								<h3>'.$place_name.'</h3>
								<p>'.$address_a.'</p>
								<a class="btn btn-default more_info" href="'.$link.'">'.esc_html__('More Information','evont').'</a>
							</div>
						</div>
						<div class="col-md-8 col-sm-6 hidden-xs"> </div>
				  </div>

				</div>
			  </div>
			
			  ';
			endif;
			
			$out ='
			<!--contact map start here-->

			<div class="jx-evont-contactmap-section relative">

					'.$show_map_code.'

					<div class="jx-evont-google-map">
						<div id="map" class="jx-evont-map" style="height:'.$map_height.';"></div>
					</div>

			</div>

			<!--contact map end here-->
			';

			
			$out.='
			
			 <script type="text/javascript">
			 
			 var map;
						
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                
				var isDraggable = jQuery(document).width() > 480 ? true : false;
				
				var mapOptions = {
                    scrollwheel: false,
					draggable: isDraggable,
					// How zoomed in you want the map to start at (always required)
                    zoom: '.$zoom.',
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng('.$lat.', '.$lng.'), // New York
                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: '.$google_map_style.'
                };
                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
    
                var mapElement = document.getElementById("map");
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
                // Lets also add a marker while we are at it
               
				var latlng = new google.maps.LatLng('.$lat.', '.$lng.');
				new google.maps.Marker({
					position: latlng,
					icon: "'.$evont_data['map_location_pointer'].'",
					map: map
				});

            }
      </script>
			
			';
		$out .='<script src="https://maps.googleapis.com/maps/api/js?key='.$google_key.'&callback=init" async defer></script>';
			
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_evont_map' );
	
	
	function vc_evont_map() {	
		vc_map(array(
		  "name" => esc_html__( "Google Map", "evont" ),
		  "base" => "map",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_map.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Map','evont'),
		  "params" => array(
					 


			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title", "evont" ),
				"param_name" => "title",
				"value" => "VENUE", 
				"description" => esc_html__( "Add Place Name", "evont" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Description", "evont" ),
				"param_name" => "description",
				"value" => "", 
				"description" => esc_html__( "Type short description", "evont" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Place Name", "evont" ),
				"param_name" => "place_name",
				"value" => "Mariot Hotel, Browadway", 
				"description" => esc_html__( "Add Place Name", "evont" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Address A", "evont" ),
				"param_name" => "address_a",
				"value" => "339 Marina Street, New York, NY 10001", 
				"description" => esc_html__( "Add Address A", "evont" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Link", "evont" ),
				"param_name" => "link",
				"value" => "", 
				"description" => esc_html__( "Link", "evont" )
			 ),
		

			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Lat", "evont" ),
				"param_name" => "lat",
				"value" => "40.6700", 
				"description" => esc_html__( "Add Lat", "evont" )
			 ),	
			 
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Lng", "evont" ),
				"param_name" => "lng",
				"value" => "-73.9400", 
				"description" => esc_html__( "Add Lng", "evont" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "zoom", "evont" ),
				"param_name" => "zoom",
				"value" => "14", 
				"description" => esc_html__( "Set Google map zoom value from 1 to 20", "evont" )
			 ),
			 
			 array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Show Address Box",'evont'),
				"param_name" => "show_address_box",
				"value" => array(   
					__('Yes', 'evont') => 'yes',
					__('No', 'evont') => 'no',
					),
				),
				
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Map Height", "evont" ),
				"param_name" => "map_height",
				"value" => "450px", 
				"description" => esc_html__( "Set Google map height in px", "evont" )
			 ),
			 
	
			 
		  )
	   )); 
	}
?>