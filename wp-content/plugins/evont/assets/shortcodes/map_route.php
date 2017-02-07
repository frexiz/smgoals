<?php 
	/* Subscribe  ---------------------------------------------*/
	
	add_shortcode('map_route', 'jx_evont_map_route');
	
	function jx_evont_map_route($atts, $content = null) { 
		extract(shortcode_atts(array(
			'title' => 'VENUE',
			'description' => '',
			"direction_from" =>"40.6700",
			"lat" =>"40.6700",
			"lng" =>"-73.9400",
			"start" =>"kingman, az",
			"end" =>"Flagstaff, AZ",
			"npoints" =>"Flagstaff, AZ",
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
                    zoom: '.$zoom.',
                    center: new google.maps.LatLng('.$lat.', '.$lng.'), // New York
                    styles: '.$google_map_style.'
                };
				
				var directionsService = new google.maps.DirectionsService;
       			var directionsDisplay = new google.maps.DirectionsRenderer;
                
				var mapElement = document.getElementById("map");
                var map = new google.maps.Map(mapElement, mapOptions);
               	
				directionsDisplay.setMap(map);
				calculateAndDisplayRoute(directionsService, directionsDisplay);
				
				function calculateAndDisplayRoute(directionsService, directionsDisplay) {
				
				var waypts = [];
				var checkboxArray = "'.$npoints.'";
				
				//console.log("array="+checkboxArray);
				
				var temp = checkboxArray.split("//");							
				
				for (var i = 0; i < temp.length; i++) {					
					
					//console.log("temp[i]="+temp[i]);
					waypts.push({
					  location: temp[i],
					  stopover: true
					});				
				}
				
				//console.log(JSON.stringify(waypts));
				
				directionsService.route({
				  origin: "'.$start.'",
				  destination: "'.$end.'",
				  waypoints: waypts,
         		 optimizeWaypoints: true,
				  travelMode: "DRIVING"
				}, function(response, status) {
				  		  
				  if (status === "OK") {
					directionsDisplay.setDirections(response);
				  } else {
					window.alert("Directions request failed due to " + status);
				  }
				});
			  }

				

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
	
	
	add_action( 'vc_before_init', 'vc_evont_map_route' );
	
	
	function vc_evont_map_route() {	
		vc_map(array(
		  "name" => esc_html__( "Google Map Route", "evont" ),
		  "base" => "map_route",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_map.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Map Route','evont'),
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
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "Multiple Route", "evont" ),
				"param_name" => "npoints",
				"value" => "kingman, az/Flagstaff, AZ/Manama, Bahrain", 
				"description" => esc_html__( "Set multiple routes seperated with / ", "evont" )
			 ),	
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Start Route", "evont" ),
				"param_name" => "start",
				"value" => "kingman, az", 
				"description" => esc_html__( "Set Start Route", "evont" )
			 ),	
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "End Route", "evont" ),
				"param_name" => "end",
				"value" => "Flagstaff, AZ", 
				"description" => esc_html__( "Set End Route", "evont" )
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