<?php 
	/* Video Player  ---------------------------------------------*/
	
	add_shortcode('video', 'jx_evont_video');
	
	function jx_evont_video($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'title_1' => 'Watch',
            'title_2' => 'Video',
			'description' => '',
			'video_link' => 'https://www.youtube.com/watch?v=W6-h1HUWBKg'		
		), $atts)); 
		 
		 
		//initial variables
		$out=''; 
		
		//function code
		
		switch($type){ 
		case '1':
		
		$out ='			
		<!--start here-->
		<div class="jx-evont-video-pop jx-evont-padding">
			<div class="item">
			  <h2>'.$title_1.'</h2>
			  <a href="'.$video_link.'" data-rel="prettyPhoto"><i class="fa fa-play"></i></a>
			  <h2>'.$title_2.'</h2>
			</div>
		  <div class="jx-evont-video-description">'.$description.'</div>
		  </div>
		<!-- end here-->
		';	
		
		break;
		
		case '2':
		
		$out ='			
		<!--start here-->
		 <div class="jx-evont-video-pop-2">
			<div class="item">
              <div class="icon"><a href="'.$video_link.'" data-rel="prettyPhoto"><i class="fa fa-play"></i></a></div>
              <div class="title">'.$title_1.'</div>
			  <div class="title_b">'.$title_2.'</div>
			  <div class="jx-evont-video-description">'.$description.'</div>
			</div>
		 </div>
		<!-- end here-->
		';	
		
		}
		
			
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_evont_video' );
	
	
	function vc_evont_video() {	
		vc_map(array(
		  "name" => esc_html__( "Video Player", "evont" ),
		  "base" => "video",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_map.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Video Player','evont'),
		  "params" => array(
					 

			array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("Select Style",'evont'),
			 "param_name" => "type",
			 "value" => array(   
				__('Select Style', 'evont') => 'none',
				__('Select 1', 'evont') => '1',
				__('Select 2', 'evont') => '2',
					),
			),


			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title 1", "evont" ),
				"param_name" => "title_1",
				"value" => "Watch", 
				"description" => esc_html__( "Type First Title", "evont" )
			 ),
             
             array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title 2", "evont" ),
				"param_name" => "title_2",
				"value" => "Video", 
				"description" => esc_html__( "Type 2nd Title", "evont" )
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
				"heading" => esc_html__( "Video Link", "evont" ),
				"param_name" => "video_link",
				"value" => "https://www.youtube.com/watch?v=W6-h1HUWBKg", 
				"description" => esc_html__( "Add Video Link", "evont" )
			 )
			
		  )
	   )); 
	}
?>