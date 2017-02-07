<?php 


	/* Speaker  ---------------------------------------------*/
	
	add_shortcode('speakers', 'jx_evont_speakers');
	
	function jx_evont_speakers($atts, $content = null) { 
		extract(shortcode_atts(array(
					'count' => '8',
					'color_style' =>'',
					'speaker_id' =>'',
					'image_color' =>''					
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$i=0;
		$intro_class='';
		
		global $evont_data;
		
		$color_class='';
		
		if ($color_style =='light'):
		$color_class='jx-light';
		else:
		$color_class='jx-dark';
		endif;
		
		
		if ($image_color =='grey'):
		$image_colored='grey';
		else:
		$image_colored='';
		endif;
		
		$out .='<!--spaekers area start here-->
				<div class="jx-evont-speakers-area '.$color_class.'">';
		
		
		
		if ($speaker_id):				
			$related_speakers = array_map( 'trim', explode( ',', $speaker_id ) );			
			$args = array('post_type' => 'speakers','orderby' => 'post__in', 'showposts' => $count,'post__in' => $related_speakers ); 		
		else:		
			$args = array('post_type' => 'speakers','orderby' => 'date', 'order' => 'ASC','showposts' => $count); 		
		endif;
		
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
		//function code
			
			

			$speaker_permalink='<a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a>';
			
			$teammember_jobposition = get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); 			

			$out .='			
				  <div class="col-sm-3 col-xs-6">
					<div class="jx-evont-speaker-item">
					  <div class="speaker-img '.$image_colored.'">'.get_the_post_thumbnail(get_the_id(),'evont-small-speaker').'
						<div class="overlay">
						  <div class="overlay-inner">
							<ul class="socail">';			
			
								if (get_post_meta(get_the_id(),'jx_evont_speaker_fb','evont')):
								$out .='<li><a href="http://www.facebook.com/'.get_post_meta(get_the_id(),'jx_evont_speaker_fb','evont').'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
								endif;
								
								if (get_post_meta(get_the_id(),'jx_evont_speaker_twitter','evont')):
								$out .='<li><a href="http://www.twitter.com/'.get_post_meta(get_the_id(),'jx_evont_speaker_twitter','evont').'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
								endif;
								
								if (get_post_meta(get_the_id(),'jx_evont_speaker_linkedin','evont')):
								$out .='<li><a href="http://www.linkedin.com/'.get_post_meta(get_the_id(),'jx_evont_speaker_linkedin','evont').'"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
								endif;
								
								if (get_post_meta(get_the_id(),'jx_evont_speaker_googleplus','evont')):
								$out .='<li><a href="http://www.google.com/'.get_post_meta(get_the_id(),'jx_evont_speaker_googleplus','evont').'"><i class="fa  fa-google-plus" aria-hidden="true"></i></a></li>';
								endif;
						
			$out .='</ul>
              </div>
            </div>
          </div>
          <h3>'.$speaker_permalink.'<br>
            <span>'.$teammember_jobposition.'</span></h3>
        </div>
      </div>	
			<!-- Item -->
			';
			
			$i++;
			
		endwhile;
		wp_reset_query(); 
		
	$out .='</div>
	<!--spaekers area end here-->';  
		
				
	
		
		//return output
		return $out;
	}
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_speaker' );
	
	
	function vc_speaker() {	
		vc_map(array(
      "name" => esc_html__( "Speakers", "evont" ),
      "base" => "speakers",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_speaker.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Speakers','evont'),
      "params" => array(
		 
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("Select Color Style",'evont'),
			 "param_name" => "color_style",
			 "value" => array(   
					__('Select Color', 'evont') => 'none',
					__('Light', 'evont') => 'light',
					__('Dark', 'evont') => 'dark',
					),
		), 
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("Select Image Color Style",'evont'),
			 "param_name" => "image_color",
			 "value" => array(   
					__('Select Color', 'evont') => 'none',
					__('Grey', 'evont') => 'grey',
					__('Colored', 'evont') => 'colored',
					),
		), 
		
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Count", "evont" ),
            "param_name" => "count",
			"value" => "8", //Default Counter Up Text
            "description" => esc_html__( "Number of speakers", "evont" )
         ),
		 		 		 
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Speakers IDs", "evont" ),
            "param_name" => "speaker_id",
			"value" => "#", //Default Counter Up Text
            "description" => esc_html__( "Show specific speakers using post id e.g(234,345,23)", "evont" )
         )
		
      )
   )); 
	}
	 
	
	


?>