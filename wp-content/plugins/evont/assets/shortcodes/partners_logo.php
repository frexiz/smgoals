<?php 
	/* Partners Logo  ---------------------------------------------*/
	
	add_shortcode('partners_logo', 'evont_partners_logo');
	
	function evont_partners_logo($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'title' => '',
					'category_name' => '',
					'post_count' => '6',
					'color_style' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$images_url = '';
		
		
		if ($color_style =='light'):
		$color_class='jx-light';
		else:
		$color_class='jx-dark';
		endif;
		
			if($type =="1") {
		
			if($title =="") {
			$title_line = "";
			} else {
			$title_line = "<h3>- ".$title." -</h3>";
			}
					
			$out .='
			<!--support us start-->
			<div class="jx-evont-partner supportus_area '.$color_class.'">
			'.$title_line.'
			<ul>';	
	
			
			if($category_name): 
			$args = array('post_type' => 'partners',
							'tax_query' => array(
								array(
									'taxonomy' => 'partners-category',
									'field' => 'slug',
									'terms' => $category_name,
								)
							),
						  'orderby' => 'menu_order',
						  'order' => 'ASC',
						  'showposts' => $post_count ); 
						  
			else:
			$args = array('post_type' => 'partners',
						  'orderby' => 'menu_order',
						  'order' => 'ASC',
						  'showposts' => $post_count ); 
			endif;
			
			
			
			$loop = new WP_Query( $args ); 		
			
			while ( $loop->have_posts() ) : $loop->the_post();
			
			//function code
		
			$partner_logo_link = get_post_meta(get_the_id(),'jx_evont_partner_link','evont');  
			
			$images = rwmb_meta( 'jx_evont_partner_logo', 'type=image_advanced' );
			foreach ( $images as $image ){
				$images_url=$image['full_url'];
			}	
						
			$out .='<li class="item"><a href="'.$partner_logo_link.'" target="_blank"><img src="'.esc_url($images_url).'" alt="'. get_the_title() .'"> </a></li>';
			endwhile;
			wp_reset_query();
			$out .='</ul></div> <!--support us end-->';	
		
		} 	
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_partners_logo' );
	
	
	function vc_partners_logo() {	
		vc_map(array(
      "name" => esc_html__( "Partners Logo", "evont" ),
      "base" => "partners_logo",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_partner_logo.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Partners Logo','evont'),
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
            "heading" => esc_html__( "Title", "evont" ),
            "param_name" => "title",
			"value" => "",
            "description" => esc_html__( "Add your Title here", "evont" )
         ),
		 
	    array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Category Name", "evont" ),
            "param_name" => "category_name",
			"value" => "",
            "description" => esc_html__( "Add your Category name here", "evont" )
         ),
		 
		 
       array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Post Count", "evont" ),
            "param_name" => "post_count",
			"value" => "6",
            "description" => esc_html__( "Set post counts", "evont" )
         )
		
      )
   )); 
	}
?>