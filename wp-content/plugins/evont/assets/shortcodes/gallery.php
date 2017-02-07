<?php 
	/* Portfolio Group  ---------------------------------------------*/
	
	add_shortcode('portfolio', 'evont_portfolio');
	
	function evont_portfolio($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				'post_count' =>'13',
				'category' =>'',
				'image_color' =>''
				), $atts)); 
		 
		 
		//initial variables
		global $post;
		
		$out='';
		$id_filter=''; 
		$width_class='';

		
		if ($type =='1'):
		$protfolio_style='jx-evont-protfolio';
		else:
		$protfolio_style='jx-evont-protfolio-2';
		endif;
		
		
		if ($image_color =='grey'):
		$image_colored='grey';
		else:
		$image_colored='';
		endif;
		
		
		$out .='<div class="'.$protfolio_style.' port-grid-style">'; 
		
		
				
		//function code
		
		$out .='<div class="jx-evont-portfolio-grid '.$image_colored.'">';
			$i=1;
			
			if ($category):
			
			
			$args = array(	'post_type' => 'portfolio',
							'orderby' => 'date', 
							'order' => 'ASC',
							'showposts' => $post_count,
							'portfolio-categories' => $category
							);			
			else:
			
			$args = array(	'post_type' => 'portfolio',
							'orderby' => 'date', 
							'order' => 'ASC',
							'showposts' => $post_count ); 
			
			endif;
			
			
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
				//Get Portfolio Categories			
				
				$terms_string = '';
				$terms = get_the_terms(get_the_ID(), 'portfolio-categories'); 				 
				  
 				//build up comma delimited string 
				if ($terms):
					foreach($terms as $t){ 
						$terms_string .= $t->slug . ' '; 
					} 
				endif;
				
				
				if($i==4):
				$width_class='grid-width-2';
				$image_size="";
				$image_size='evont-portfolio-2';
				else:
				$width_class='';
				$image_size='evont-portfolio';
				endif;
				
				
				$post_thumbnail_id = get_post_thumbnail_id();
				$post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id,'large', true);
				
				if(get_post_meta(get_the_ID(),'evont_project_photos',false )):
					
					$image_url 	= 	wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');					
					$image_path	=	get_post_meta(get_the_ID(),'evont_project_photos',false );					
					$images 	= 	rwmb_meta( 'evont_project_photos', 'type=image_advanced' );
					
					foreach ( $images as $image ){
						$images_url=$image['full_url'];
					}	
				endif;
				
				
				
				$out .='
					<div class="grid-item '.$width_class.' jx-evont-image-wrapper '.$terms_string.' all">
						'. get_the_post_thumbnail(get_the_ID(),$image_size) .'
						<div class="jx-evont-portfolio-hoverlayer"></div>
						
							<div class="jx-evont-portfolio-hover">                                        
								
								<div class="jx-evont-portfolio-plus-hover">
									<a href="'.$post_thumbnail_url[0].'" data-rel="prettyPhoto">
									<div class="jx-evont-portfolio-link"><i class="fa fa-link"></i></div>
									</a>
								</div>
								<!-- Bottom Hover -->
								
							</div>
						
						<!-- EOF Hover -->
				  </div>';
			$i++;
			endwhile;
			wp_reset_query(); 
		//return output
		
		$out .='</div></div>';
		
		return $out;
	}
	
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_portfolio' );
	
	
	function vc_portfolio() {	
		vc_map(array(
      "name" => esc_html__( "Portfolio", "evont" ),
      "base" => "portfolio",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_protfolio.png',
      "category" => esc_html__( "evont Shortcodes", "evont"),
	  "description" => __('Add Portfolio','evont'),
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
            "heading" => esc_html__( "Post Count", "evont" ),
            "param_name" => "post_count",
			"value" => "13",
            "description" => esc_html__( "Set post counts", "evont" )
         ),
		 
		  array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Post Columns", "evont" ),
            "param_name" => "post_cols",
			"value" => "3",
            "description" => esc_html__( "Set number of columns", "evont" )
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Category", "evont" ),
            "param_name" => "category",
			"value" => "",
            "description" => esc_html__( "Type post category", "evont" )
         )		 
		
      )
   )); 
	}
	
	
	
?>