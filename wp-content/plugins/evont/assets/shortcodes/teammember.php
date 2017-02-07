<?php 


	/* Teammember  ---------------------------------------------*/
	
	add_shortcode('teammember', 'jx_evont_teammember');
	
	function jx_evont_teammember($atts, $content = null) { 
		extract(shortcode_atts(array(
					'count' => '8',
					'image_color' =>''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$i=0;
		$intro_class='';
		$color_class='';
		
		global $evont_data;
		

		if ($image_color =='grey'):
		$color_class='grey';
		else:
		$color_class='';
		endif;
		
		$out .='<!--Teammember area start here-->
				<div class="jx-evont-teammember '.$color_class.'">';
		
		$args = array('post_type' => 'team','orderby' => 'date', 'order' => 'ASC','showposts' => $count ); 
		
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
		//function code
			
			if($i<=3):
				$class_big="big-first";
				$image_size='evont-team-2';
			else:
				$class_big="big-first";
				$image_size='evont-team';
			endif;

			$teammember_permalink='<a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a>';
			

			$out .='			
				<div class="grid-item grid-item-width2 grid-item-height2 jx-evont-image-wrapper '.$class_big.'">
					<div class="jx-evont-teammember-item">
					  <div class="teammember-img">'.get_the_post_thumbnail(get_the_ID(),$image_size).'
						<div class="overlay">
						  <div class="overlay-inner">
							<ul class="socail">';		
							
							if (get_post_meta(get_the_id(),'jx_evont_team_fb','evont')):
								$out .='<li><a href="http://www.facebook.com/'.get_post_meta(get_the_id(),'jx_evont_team_fb','evont').'"><i class="fa fa-facebook"></i></a></li>';
								endif;
								
								if (get_post_meta(get_the_id(),'jx_evont_team_twitter','evont')):
								$out .='<li><a href="http://www.twitter.com/'.get_post_meta(get_the_id(),'jx_evont_team_twitter','evont').'"><i class="fa fa-twitter"></i></a></li>';
								endif;
								
								if (get_post_meta(get_the_id(),'jx_evont_team_linkedin','evont')):
								$out .='<li><a href="http://www.linkedin.com/'.get_post_meta(get_the_id(),'jx_evont_team_linkedin','evont').'"><i class="fa fa-linkedin"></i></a></li>';
								endif;
							
							$out .='</ul>  
							<h3>'.get_the_title().'<br>
							<span>'.get_post_meta(get_the_id(),'jx_evont_job_position','evont').'</span></h3>
						  </div>
						</div>
					  </div>
	
					</div>
				</div>
				<!-- Item -->
			';
			
			$i++;
			
		endwhile;
		wp_reset_query(); 
		
	$out .='</div><!-- Teammember area end here-->';  
		
				
	
		
		//return output
		return $out;
	}
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_teammember' );
	
	
	function vc_teammember() {	
		vc_map(array(
      "name" => esc_html__( "Teammember", "evont" ),
      "base" => "teammember",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_teammember.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Speakers','evont'),
      "params" => array(
		 
		 
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Count", "evont" ),
            "param_name" => "count",
			"value" => "8", //Default Counter Up Text
            "description" => esc_html__( "Number of teammembers", "evont" )
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
		 		 		 

		
      )
   )); 
	}
	 
	
	


?>