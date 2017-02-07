<?php 
	/* Image Placeholder  ---------------------------------------------*/
	
	add_shortcode('image_placeholder', 'evont_image_placeholder');
	
	function evont_image_placeholder($atts, $content = null) { 
		extract(shortcode_atts(array(
					'image' => '',
					'link' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$image_link='';
		
		
		
		$img = wp_get_attachment_image_src($image,'large');
	 	$imgSrc = $img[0];
		 
		//function code
			
			if($link):
			$out.='<a href="'.$link.'">';
			endif;
			
			$out.='
			<div class="jx-evont-image-placholder jx-evont-image-wrapper">
				<img src="'.$imgSrc.'" alt="">
				'.$image_link.'				
				</div>
			';
			
			if($link):
			$out.='</a>';
			endif;
			
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_image_placeholder' );
	
	
	function vc_image_placeholder() {	
		vc_map(array(
      "name" => esc_html__( "Image Placeholder", "evont" ),
      "base" => "image_placeholder",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_image_placeholder.png',
      "category" => esc_html__( "evont Shortcodes", "evont"),
	  "description" => __('Add Image Placeholder','evont'),
      "params" => array(
	 
		 
         array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__( "Image", "evont" ),
            "param_name" => "image",
			"value" => "Select Image",
            "description" => esc_html__( "Add Image Here", "evont" )
         ),
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "link", "evont" ),
            "param_name" => "link",
			"value" => "#",
            "description" => esc_html__( "Image Link", "evont" )
         )
      )
   )); 
	}
?>