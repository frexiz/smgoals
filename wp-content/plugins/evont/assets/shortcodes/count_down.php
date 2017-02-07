<?php 
		/* Count Down  ---------------------------------------------*/
	
	add_shortcode('vc_counter_down', 'vc_evont_counter_down');
	
	function vc_evont_counter_down($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'color_style' => '',
					'title' => '',
					'subtitle' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$dark_light_color = "";
		
		if($color_style == "light") {
		$dark_light_color = "jx-light";
		} elseif ($color_style == "dark") {
		$dark_light_color = "jx-dark";
		}
		 
		$evont_data =  evont_globals();
		
		//function code
		
 			$id= '-'.rand(0,1000);
				
				switch($type){ 
				case '1':
				
				$out ='
				<div class="jx_evont_countdown sc '.$color_style.' styled" data-time="'.$evont_data['info_event_countdown_date'].'">
				
					<div class="jx-evont-countdown-title">'.$title.'</div>
					<div class="jx-evont-countdown-subtitle">'.$subtitle.'</div>
                            
                            	<div class="dsb-theme-wrapper countdown">
                                    <div class="dsb-theme">
                                        <div class="counter-wrapper">
                                            <ul>
                                                <li>
                                                    <div class="days count">00</div>
                                                    <div class="textDays count-text">'.esc_html__('Days','evont').'</div>
                                                </li>
                                                <li>
                                                    <div class="hours count">00</div>
                                                    <div class="textHours count-text">'.esc_html__('Hours','evont').'</div>
                                                </li>
                                                <li>
                                                    <div class="minutes count">00</div>
                                                    <div class="textmins count-text">'.esc_html__('Mins','evont').'</div>
                                                </li>
                                                <li>
                                                    <div class="seconds count">00</div>
                                                    <div class="textSecs count-text">'.esc_html__('Secs','evont').'</div>
                                                </li>
                                            </ul>
                                            <div class="jC-clear"></div>
                                        </div>
                                        
                                    </div>
                            	</div>
                            
                            </div>    
				'; 
 				
				break;
			
				case '2':
 
 				$out ='
				<div class="jx_evont_countdown style-2 '.$color_style.' styled" data-time="'.$evont_data['info_event_countdown_date'].'">
					<div class="row">
					<div class="col-sm-8">
						<div class="jx-evont-countdown-title">'.$title.'</div>
						<div class="jx-evont-countdown-subtitle">'.$subtitle.'</div>
					</div>
					
					<div class="col-sm-4">			
					<div class="dsb-theme-wrapper countdown">
						<div class="dsb-theme">
							<div class="counter-wrapper">
								<ul>
									<li>
										<div class="days count">00</div>
										<div class="textDays count-text">'.esc_html__('Days','evont').'</div>
									</li>
									<li>
										<div class="hours count">00</div>
										<div class="textHours count-text">'.esc_html__('Hours','evont').'</div>
									</li>
									<li>
										<div class="minutes count">00</div>
										<div class="textmins count-text">'.esc_html__('Mins','evont').'</div>
									</li>
									<li>
										<div class="seconds count">00</div>
										<div class="textSecs count-text">'.esc_html__('Secs','evont').'</div>
									</li>
								</ul>
								<div class="jC-clear"></div>
							</div>
							
						</div>
					</div>
					</div>
					</div>
				
				</div>    
				'; 
 				
				}
 
		//return output
		return $out;
	}
	
	add_action( 'vc_before_init', 'vc_count_down' );
	
	
	function vc_count_down() {	
		vc_map(array(
		  "name" => esc_html__( "Count Down", "evont" ),
		  "base" => "vc_counter_down",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_count.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Count Down','evont'),
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
					"type" => "textfield",
					"heading" => __("Title", "evont"),
					"param_name" => "title",
					"value" =>"Type Title Here",
					"description" => __("Type title here", "evont")
				),
				
				
			array(
					"type" => "textfield",
					"heading" => __("Sub Title", "evont"),
					"param_name" => "subtitle",
					"value" =>"Type Title Here",
					"description" => __("Type subtitle here", "evont")
				)
			
							 
		  )
	   ));
    
	}
?>