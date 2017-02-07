<?php 
	/* Section Title  ---------------------------------------------*/
	
	add_shortcode('timeline', 'evont_timeline');
	
	function evont_timeline($atts, $content = null) { 
		extract(shortcode_atts(array(

			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$timeline_date='';
		
		global $post;
		//function code
		$main_tab='';
		
		$evont_data =  evont_globals();
		
		$i=1;
		$j=1;
		
		$args = array('post_type' => 'timeline','orderby' => 'date', 'order' => 'ASC','post_parent' => 0 ); 
			
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();				
			
			$timeline_date = get_post_meta(get_the_id(),'jx_evont_session_date','evont');
			
			$explode_date=explode('/',$timeline_date);
			
				$timeline_date_a = esc_attr($explode_date[0]);
				$timeline_date_b = esc_attr($explode_date[1]);
				$timeline_date_c = esc_attr(substr($explode_date[2], -2));
			
			$month='';
			
			switch ($timeline_date_b):
			
			case '1':
			
			$month = esc_html__('Jan','evont');
			
			break;
			
			case '02':
			
			$month = esc_html__('Feb','evont');
			
			break;
			
			case '03':
			
			$month = esc_html__('Mar','evont');
			
			break;
			
			case '04':
			
			$month = esc_html__('Apr','evont');
			
			break;
			
			case '05':
			
			$month = esc_html__('May','evont');
			
			break;
			
			case '06':
			
			$month = esc_html__('Jun','evont');
			
			break;
			
			case '07':
			
			$month = esc_html__('Jul','evont');
			
			break;
			
			case '08':
			
			$month = esc_html__('Aug','evont');
			
			break;
			
			case '09':
			
			$month = esc_html__('Sep','evont');
			
			break;
			
			case '10':
			
			$month = esc_html__('Ouc','evont');
			
			break;
			
			case '11':
			
			$month = esc_html__('Nov','evont');
			
			break;
			
			case '12':
			
			$month = esc_html__('Dec','evont');
			
			break;
			
			endswitch;
			
			
			if ($i==1):
			$active ='class="selected"';
			else:
			$active ='';
			endif;
		
			$main_tab .="<li ".$active."><a href='#0' data-date=".$timeline_date." ".$active."><div class='time-date'><span class='date'>".$timeline_date_a."</span><span class='month'>".$month." '".$timeline_date_c."</span></div></a></li>"; 				
 			
			$i++;
			
		endwhile;
		wp_reset_query();
		
			$out .='
			<div class="jx-evont-horizontal-timeline">
				<div class="timeline">
					<div class="events-wrapper">
						<div class="events">
							<ol>';
								$out .= $main_tab;
					$out .='</ol>
			
							<span class="filling-line" aria-hidden="true"></span>
						</div> <!-- .events -->
					</div> <!-- .events-wrapper -->
						
					<ul class="jx-evont-timeline-navigation">
						<li><a href="#0" class="prev inactive">Prev</a></li>
						<li><a href="#0" class="next">Next</a></li>
					</ul> <!-- .jx-evont-timeline-navigation -->
				</div> <!-- .timeline -->
			
				<div class="events-content">
					<ol>';

						$args = array('post_type' => 'timeline','orderby' => 'date', 'order' => 'ASC','post_parent' => 0 ); 
							
						$loop = new WP_Query( $args ); 		
						while ( $loop->have_posts() ) : $loop->the_post();	
						
						$timeline_date = get_post_meta(get_the_id(),'jx_evont_session_date','evont');

						if ($j==1):
						$active ='class="selected"';
						else:
						$active ='';
						endif;
			
						$out .='<li '.$active.' data-date="'.$timeline_date.'">
							<h2>'.get_the_title().'</h2>
							<em>'.$timeline_date.'</em>
							<p>	
								'.get_the_content().'
							</p>
						</li>';
						
						$j++;
			
			endwhile;
			
					$out .='</ol>
				</div> <!-- .events-content -->
			</div>
			'; 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_timeline' );
	
	
	function vc_timeline() {	
		vc_map(array(
		  "name" => esc_html__( "Timeline", "evont" ),
		  "base" => "timeline",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_section_title.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Title','evont'),
		  "params" => array(
					 
			
		  )
	   ));
    
	}
?>
