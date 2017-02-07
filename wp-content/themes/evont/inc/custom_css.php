<?php 
function evont_custom_css() {
	
		wp_enqueue_style('evont-customcss', get_template_directory_uri() . '/css/custom.css');
	
		$evont_data =  evont_globals();
		//$image_path=get_post_meta(get_the_ID(),'evont_body_bg_image',false );					
		
		$custom_css='';
		$images_header_url='';
		$images_url='';	
		$images = rwmb_meta( 'evont_body_bg_image', 'type=image_advanced' );
		$images_header = rwmb_meta( 'evont_header_bg_image', 'type=image_advanced' );
		foreach ( $images as $image )
		{$images_url=$image['full_url'];}
		
		foreach ( $images_header as $image_header )
		{$images_header_url=$image_header['full_url'];}
		$image_hoverlay= evont_hex2rgb(esc_attr($evont_data['image_hoverlay']));
		$google_body_font = esc_attr($evont_data['google_body_font']);
		$google_menu_font = esc_attr($evont_data['google_menu_font']);
		$google_headings_font = esc_attr($evont_data['google_headings_font']);
		$google_subheading_font = esc_attr($evont_data['google_subheadings_font']);
		$google_footer_font = esc_attr($evont_data['google_footer_headings_font']);		
		$body_font_face = esc_attr($evont_data['body_font']['face']);
		$body_font_size = esc_attr($evont_data['body_font']['size']);
		$body_font_style = esc_attr($evont_data['body_font']['style']);
		$body_font_color = esc_attr($evont_data['body_font']['color']);
		$h1_font_face = esc_attr($evont_data['h1_font']['face']);
		$h1_font_size = esc_attr($evont_data['h1_font']['size']);
		$h1_font_style = esc_attr($evont_data['h1_font']['style']);
		$h1_font_color = esc_attr($evont_data['h1_font']['color']);		
		$h2_font_face = esc_attr($evont_data['h2_font']['face']);
		$h2_font_size = esc_attr($evont_data['h2_font']['size']);
		$h2_font_style = esc_attr($evont_data['h2_font']['style']);
		$h2_font_color = esc_attr($evont_data['h2_font']['color']);		
		$h3_font_face = esc_attr($evont_data['h3_font']['face']);
		$h3_font_size = esc_attr($evont_data['h3_font']['size']);
		$h3_font_style = esc_attr($evont_data['h3_font']['style']);
		$h3_font_color = esc_attr($evont_data['h3_font']['color']);		
		$h4_font_face = esc_attr($evont_data['h4_font']['face']);
		$h4_font_size = esc_attr($evont_data['h4_font']['size']);
		$h4_font_style = esc_attr($evont_data['h4_font']['style']);
		$h4_font_color = esc_attr($evont_data['h4_font']['color']);		
		$h5_font_face = esc_attr($evont_data['h5_font']['face']);
		$h5_font_size = esc_attr($evont_data['h5_font']['size']);
		$h5_font_style = esc_attr($evont_data['h5_font']['style']);
		$h5_font_color = esc_attr($evont_data['h5_font']['color']);		
		$h6_font_face = esc_attr($evont_data['h6_font']['face']);
		$h6_font_size = esc_attr($evont_data['h6_font']['size']);
		$h6_font_style = esc_attr($evont_data['h6_font']['style']);
		$h6_font_color = esc_attr($evont_data['h6_font']['color']);		
?>

<?php	
if($google_body_font || $google_headings_font || $google_menu_font || $google_footer_font ):
		
		if($google_body_font && $google_body_font !="Select Font"):
        	$custom_css ="body{ font-family: {$google_body_font}, Arial, Helvetica, sans-serif ;}";
		endif;
		
		if($google_headings_font && $google_headings_font !="Select Font"):
			$custom_css .="h1,h2,h3,h4,h5,h6,h7{ font-family: {$google_headings_font}, Arial, Helvetica, sans-serif !important;}";
		endif;		
		
		if($google_subheading_font && $google_subheading_font !="Select Font"):
			$custom_css .="div.subtitle{ font-family: {$google_subheading_font}, Arial, Helvetica, sans-serif !important;}";
		endif;		
		
		if($google_menu_font && $google_menu_font !="Select Font"):
        	$custom_css .="nav ul li a{ font-family: {$google_menu_font}, Arial, Helvetica, sans-serif !important;}";
		endif;		
		
		if($google_footer_font && $google_footer_font !="Select Font"):
        	$custom_css .="footer h1,footer h2,footer h3,footer h4,footer h5,footer h6,{ font-family: {$google_footer_font}, Arial, Helvetica, sans-serif !important;}";
		endif;
		
		else:
			$custom_css .="body{ font-family: {$body_font_face}, Arial, Helvetica, sans-serif;}";
			$custom_css .="h1{ font-family: {$h1_font_face}, Arial, Helvetica, sans-serif;}";
			$custom_css .="h2{ font-family: {$h2_font_face}, Arial, Helvetica, sans-serif;}";
			$custom_css .="h3{ font-family: {$h3_font_face}, Arial, Helvetica, sans-serif;}";
			$custom_css .="h4{ font-family: {$h4_font_face}, Arial, Helvetica, sans-serif;}";
			$custom_css .="h5{ font-family: {$h5_font_face}, Arial, Helvetica, sans-serif;}";
			$custom_css .="h6{ font-family: {$h6_font_face}, Arial, Helvetica, sans-serif;}";
		endif;	
			
	
		    $custom_css .="body{font-size: {$body_font_size}; font-weight: {$body_font_style}; color: <?php  echo $body_font_color ?>; }";
			$custom_css .="h1{ font-size: {$h1_font_size}; font-weight: {$h1_font_style}; color: {$h1_font_color}; line-height: 30px;font-weight: 300;}";
			$custom_css .="h2{ font-size: {$h2_font_size}; font-weight: {$h2_font_style}; color: {$h2_font_color}; }";
			$custom_css .="h3{ font-size: {$h3_font_size}; font-weight: {$h3_font_style}; color: {$h3_font_color}; }";
			$custom_css .="h4{ font-size: {$h4_font_size}; font-weight: {$h4_font_style}; color: {$h4_font_color}; }";
			$custom_css .="h5{ font-size: {$h5_font_size}; font-weight: {$h5_font_style}; color: {$h5_font_color}; }";
			$custom_css .="h6{ font-size: {$h6_font_size}; font-weight: {$h6_font_style}; color: {$h6_font_color}; }";
			$custom_css .="h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited  { font-weight: inherit; color: inherit; }";

$custom_css .="body{";
 if(($evont_data['select_layout'] == 'boxed') || (get_post_meta(get_the_ID(),'evont_layout_mode',true))=='boxlayout'):
		if(get_post_meta(get_the_ID(), 'evont_body_bg_color', true)):
		$custom_css .="background-color:{get_post_meta(get_the_ID(), 'evont_body_bg_color', true)}";
		else:
		$custom_css .="background-color:".esc_attr($evont_data['bg_boxbody_color']);
		endif;		
		
		if(get_post_meta(get_the_ID(), 'evont_body_bg_image', true)):
		$custom_css .="background-image:url({$images_url})";
		$custom_css .="background-repeat:{get_post_meta(get_the_ID(), 'evont_body_bg_repeat', true)}";
			if(get_post_meta(get_the_ID(), 'evont_bg_fullwidth_page', true)):
			$custom_css .="background-attachment:fixed;
			background-position:center center;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;";
			endif;
		elseif($evont_data['meida_bg_boxbody_image']):
		$custom_css .="background-image:url(".esc_attr($evont_data['meida_bg_boxbody_image']).")";
		$custom_css .="background-repeat:".esc_attr($evont_data['select_bg_repeat']);
			if($evont_data['check_bg_fullwidth']):
			$custom_css .="background-attachment:fixed;
			background-position:center center;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;";
			endif;
		endif;
		
endif;
$custom_css .="}";


	if ($evont_data['custom_css_style']):
	$custom_css .=esc_attr($evont_data['custom_css_style']);
	endif;


wp_add_inline_style( 'evont-customcss', $custom_css );

 }
add_action( 'wp_enqueue_scripts', 'evont_custom_css' );
