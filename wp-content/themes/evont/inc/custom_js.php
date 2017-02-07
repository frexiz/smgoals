<?php function evont_custom_js(){
	
	wp_enqueue_script('evont-customjs', get_template_directory_uri() . '/js/custom.js');
		
	$evont_data =  evont_globals(); 
	$custom_js ='';
 
    $custom_js = "jQuery(document).ready(function($){";				
	$custom_js .="var prettyPhoto_parameters = {";
            
			if($evont_data["animation_speed"]):
			$custom_js .= "animation_speed: '".strtolower($evont_data["animation_speed"])."',";
			endif;
           
		    $custom_js .= "slideshow: false,";
            
			if($evont_data["lightbox_opacity"]):
			$custom_js .= "opacity: ".$evont_data['lightbox_opacity'].",";
			endif;
            
			$custom_js .="show_title:";
			
			if($evont_data["lightbox_show_title"]) 
			{ $custom_js .="true,"; } 
			else 
			{ $custom_js .="false,"; } 
            
            $custom_js .="allow_resize: true,
            default_width: 920,
            default_height: 540,
           	counter_separator_label: '/',";
            
			if($evont_data["slideshow_theme"]):
			$custom_js .="theme: '".$evont_data['slideshow_theme']."',"; 
			endif;
           
		    $custom_js .="hideflash: false,
            wmode: 'opaque',
            autoplay: true,
            modal: false,";
			
            $custom_js .="overlay_gallery: ";
			
			if($evont_data["overlay_gallery"]) 
			{ $custom_js .="true"; }
			else 
			{ $custom_js .="false"; }
			
	$custom_js .="};";	
		
		        
		
	 $custom_js .="});";

	if(function_exists( 'wp_add_inline_script' )):
		wp_add_inline_script( 'evont-customjs', $custom_js );
	else:
		echo "<script type='text/javascript'>".$custom_js."</script>";
	endif;
}
if(function_exists( 'wp_add_inline_script' )):
	add_action( 'wp_enqueue_scripts', 'evont_custom_js');
else:
	add_action( 'wp_head', 'evont_custom_js', 100 );
endif;
?>