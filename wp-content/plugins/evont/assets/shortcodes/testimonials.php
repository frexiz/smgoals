<?php 
	/* Testimonials  ---------------------------------------------*/
	
	add_shortcode('testimonials', 'evont_testimonials');
	
	function evont_testimonials($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '1',
				'post_count' => '',
				'color_style' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$border='';
		
		
		
		$color_class='';
		
		if ($color_style =='light'):
		$color_class='jx-light';
		else:
		$color_class='jx-dark';
		endif;
		
		if ($border=='yes'):
		$border='border';
		else:
		$border='';
		endif;
		
		//initial variables
		$out=''; 
		
				
				
			switch($type){ 
			case '1':

		$out ='<div class="jx-evont-testimonials-1">';
		
		$args = array('post_type' => 'testimonials','orderby' => 'date', 'order' => 'ASC','showposts' => $post_count ); 
	
	
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
			//function code
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'jx_evont_testimonial_business_name', true ); 	

				$out .='
				<div class="col-sm-4">
					<div class="item">
						<div class="jx-evont-testimonial-details '.$border.'">
							<div class="icon"><i class="fa fa-quote-left"></i></div>
							<div class="description">'.get_the_content().'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>	
					</div>
				</div>
				';

				endwhile;
				
				$out .='</div>';

				
			break;
			
			case '2':
			
			
			$out .='<div class="jx-evont-testimonials-5">
			<div class="testimonial-content-5">';
				
						$args = array('post_type' => 'testimonials','orderby' => 'date', 'order' => 'ASC','showposts' => 1 ); 
						$loop = new WP_Query( $args ); 		
						while ( $loop->have_posts() ) : $loop->the_post();  
						
						//function code
						
						$testimonial_jobposition = get_post_meta( get_the_ID(), 'jx_evont_testimonial_business_name', true ); 	
			
			
						$out .='
						<div class="jx-evont-testimonial-image"> '.get_the_post_thumbnail(get_the_ID(),'themuslim_testimonial').' </div>
						<div class="icon"><i class="fa fa-quote-left"></i></div>
						<div class="item">
							<div class="description">'.get_the_content().'</div>
							<div class="jx-evont-testimonial-detail">
								<div class="name">'. get_the_title() .', </div>
								<div class="position">'.$testimonial_jobposition.'</div>
							</div>
						</div>';
			
						endwhile;
				
				
				$out .='</div>
				</div>';
				
				
				
				
					break;
				
					case '3':
			
					$out ='<div class="jx-evont-testimonials-3 '.$color_style.'">';
					
					$args = array('post_type' => 'testimonials','orderby' => 'date', 'order' => 'ASC','showposts' => $post_count ); 
				
			
					$loop = new WP_Query( $args ); 		
					while ( $loop->have_posts() ) : $loop->the_post();  
					
					//function code
						
						$testimonial_jobposition = get_post_meta( get_the_ID(), 'jx_evont_testimonial_business_name', true ); 	
		
						$out .='
						<div class="col-sm-4">
							<div class="item">
								<div class="jx-evont-testimonial-details '.$border.'">
									<div class="description">'.evont_excerpt(17).'</div>
									<div class="jx-evont-testimonial-details">
										<div class="jx-evont-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
										<div class="name">'.get_the_title().'</div>
										<div class="position">'.$testimonial_jobposition.'</div>
									</div>
									
								</div>	
							</div>
						</div>
						';
		
						endwhile;
						
						$out .='</div>';

			}
							
			
			
			
			wp_reset_query(); 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_testimonials' );
	
	
	function vc_testimonials() {	
		vc_map(array(
      "name" => esc_html__( "Testimonials", "evont" ),
      "base" => "testimonials",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_testimonials.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Testimonials','evont'),
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
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Post Count", "evont" ),
            "param_name" => "post_count",
			"value" => "4",
            "description" => esc_html__( "Set post counts", "evont" )
         )
		 
		
		
		
		
      )
   )); 
	}
	

	
	
?>