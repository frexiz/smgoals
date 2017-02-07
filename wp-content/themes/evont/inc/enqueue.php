<?php
function evont_scripts() {  
		
		
		$evont_data =  evont_globals();
		
		
		
		/*---------------- Register JS Script ------------------------*/		
		
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery','null',true);
		wp_enqueue_script('respond', get_template_directory_uri() . '/vendor/respond.js', 'jquery','null',true);
		wp_enqueue_script('appear', get_template_directory_uri() . '/vendor/jquery.appear.js', 'jquery','null',true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/vendor/prettyPhoto/jquery.prettyPhoto.js', 'jquery','null',true);
		wp_enqueue_script('flexslider', get_template_directory_uri() . '/vendor/flexslider/jquery.flexslider.js', 'jquery','null',true);
		wp_enqueue_script('isotope', get_template_directory_uri() . '/vendor/isotope/jquery.isotope.min.js', 'jquery','null',true);		
		wp_enqueue_script('owl', get_template_directory_uri() . '/vendor/owl/owl.carousel.min.js', 'jquery','null',true);		
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/vendor/modernizr.js', 'jquery','null',true);
		wp_enqueue_script('velocity', get_template_directory_uri() . '/vendor/velocity.min.js', 'jquery','null',true);
		wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', 'jquery','null',true);		
		wp_enqueue_script('form-validator', get_template_directory_uri() . '/vendor/form-validator/jquery.form-validator.min.js', 'jquery','null',true);		
		wp_enqueue_script('evont-theme', get_template_directory_uri() . '/js/theme.js', 'jquery','null',true);
		
		
		/*---------------- Enqueue JS Script ------------------------*/		
	
		$ajaxurl = admin_url('admin-ajax.php');
		$ajax_nonce = wp_create_nonce('MailChimp');
		wp_localize_script( 'jquery-core', 'ajaxVars', array( 'ajaxurl' => $ajaxurl, 'ajax_nonce' => $ajax_nonce ) );
		
		if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    	}
		
		/*------------------ Google Fint ---------------------------*/
		
		
}


//Google Font Enqueue

function evont_google_fonts() {
	
	$evont_data =  evont_globals();
	
	$fonts_url = '';
	
	
	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */

    if ( 'off' !== _x( 'on', 'Google Body font: on or off', 'evont' ) ) :
		$font_families[]= esc_attr($evont_data['google_body_font']). ":800,700,600,500,400,300,200";
	endif;
	
	if ( 'off' !== _x( 'on', 'Google Menu font: on or off', 'evont' ) ) :
		$font_families[]= esc_attr($evont_data['google_menu_font']). ':800,700,600,500,400,300,200';
	endif;
    
	if ( 'off' !== _x( 'on', 'Google Headings font: on or off', 'evont' ) ) :
    	$font_families[]= esc_attr($evont_data['google_headings_font']). ':800,700,600,500,400,300,200';
	endif;
    
	if ( 'off' !== _x( 'on', 'Google Footer Headings font: on or off', 'evont' ) ) :
    	$font_families[]= esc_attr($evont_data['google_body_font']). ':800,700,600,500,400,300,200';
	endif;
    
    if ( 'off' !== _x( 'on', 'Google Manual font: on or off', 'evont' ) ) :
		$font_families[]= esc_attr($evont_data['google_font_manual_load']). ':800,700,600,500,400,300,200'; 
	endif;
	
	if ( 'off' !== _x( 'on', 'Google Manual font: on or off', 'evont' ) ) :
		$font_families[]= esc_attr($evont_data['google_font_custom_heading']). ':800,700,600,500,400,300,200'; 
	endif;
	
	if ( 'off' !== _x( 'on', 'Google Arabic Heading Font: on or off', 'evont' ) ) :
		$font_families[]= esc_attr($evont_data['google_font_ar_heading']). ':800,700,600,500,400,300,200'; 
	endif;
	
	if ( 'off' !== _x( 'on', 'Google Arabic Body Font: on or off', 'evont' ) ) :
		$font_families[]= esc_attr($evont_data['google_font_ar_body']). ':800,700,600,500,400,300,200'; 
	endif;
			
	
		 
	$query_args = array(
	'family' => urlencode( implode( '|', $font_families ) ),
	'subset' => urlencode( 'latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' ),
	);
		 
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	 
	return esc_url_raw( $fonts_url );
}

//EOF


function evont_styles()  
{  
	$evont_data =  evont_globals();
	$theme_color=$evont_data['theme_color'];	
	$theme_base_color=esc_attr($evont_data['theme_base_color']);
	$theme_base_color_2=esc_attr($evont_data['theme_base_color_2']);
	
	
	
	/*---------------- Register CSS Styles ------------------------*/
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), '1', 'all' );	
	wp_enqueue_style( 'evont-theme-elements', get_template_directory_uri() . '/css/theme-elements.css', array(), '1', 'all' );
	wp_enqueue_style( 'evont-theme-responsive', get_template_directory_uri() . '/css/theme-responsive.css', array(), '1', 'all' );
	wp_enqueue_style( 'evont-plugins', get_template_directory_uri() . '/css/plugins.css', array(), '1', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1', 'all' );	
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/vendor/flexslider/flexslider.css', array(), '1', 'all' );
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/vendor/prettyPhoto/prettyPhoto.css', array(), '1', 'all' );
	wp_enqueue_style( 'evont-vc-style', get_template_directory_uri() . '/css/vc_style.css', array(), '1', 'all' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/vendor/owl/owl.carousel.css', array(), '1', 'all' );
	wp_enqueue_style( 'google-fonts', evont_google_fonts(), array(), null );
	
	//Default Skin
	if (($theme_color && $theme_color!="#fff300") or ($theme_base_color && $theme_base_color!="#2d283f") or ($theme_base_color_2 && $theme_base_color_2!="#e21d47") ):
		wp_enqueue_style( 'evont-dynamic', get_template_directory_uri() . '/css/dynamic_evont.css', array(), '1', 'all' );
	
	endif;

	
	if (!wp_is_mobile()):
		wp_enqueue_style( 'theme-animate', get_template_directory_uri() . '/css/theme-animate.css', array(), '1', 'all' );
	endif;
	
	function evont_ie_style_sheets () {
	wp_enqueue_style( 'ie8', get_template_directory_uri() . '/css/ie.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 9' );
	
	wp_enqueue_style( 'ie6', get_template_directory_uri() . '/css/ie-6.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie6', 'conditional', 'lt IE 7' );
	
	wp_enqueue_style( 'ie7', get_template_directory_uri() . '/css/ie-7.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie7', 'conditional', 'IE 7' );
	
	wp_enqueue_style( 'ie8', get_template_directory_uri() . '/css/ie-8.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'IE 8' );

	}
	
	add_action ('wp_enqueue_scripts','evont_ie_style_sheets');
	
		
	// Main Stylesheet
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); 
	
}  
add_action( 'wp_enqueue_scripts', 'evont_styles', 1 ); 
add_action( 'wp_enqueue_scripts', 'evont_scripts' ); 
	//----------------------------------------------------------------------------
	//-----------Event Gmap Pins 
	//----------------------------------------------------------------------------
	
	add_action( 'wp_enqueue_scripts', 'evont_enqueue_gmap' );
	
	
	function evont_enqueue_gmap() {
	
		
		$evont_data =  evont_globals();
		$google_key = $evont_data['google_map_key'];
		
		
		// script goes only in the map page template
		if ( is_single() && !is_singular( 'events' ) ) return;

		
		if (!is_single() && !is_page_template('template-events.php')) return;	
		
		//if ( is_page_template('template-events.php') or is_singular( 'events' )){
		wp_register_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key='.$google_key, false, false, true  );
		wp_register_script( 'posts_map', get_template_directory_uri().'/js/mygmap.js', false, false, true );
		wp_enqueue_script( 'google-maps-api' );
		wp_enqueue_script( 'posts_map' );
		//}
		
		
		// use a custom field on the map page to setup the zoom
		global $post;
		$zoom = (int) get_post_meta( $post->ID, 'map_zoom', true );
		if ( ! $zoom ) $zoom = 6;

		$map_data = array( 
			'markers' => array(), 
			'center'  => array( 41.890262, 12.492310 ), 
			'zoom'    => $zoom,
		);
		$lats  = array();
		$longs = array();

		// put here your query args
		$map_query = new WP_Query( array( 'post_type'=>'events','posts_per_page' => 1) );

		// Loop
		if ( $map_query->have_posts() ) : 
			
			
			while( $map_query->have_posts() ) : $map_query->the_post();
				$meta_coords = get_post_meta( get_the_id(), 'map', true );				
		
				if ( $meta_coords ) {
					$coords = array_map('floatval', array_map( 'trim', explode( ",", $meta_coords) ) );
					$title = get_the_title();
					$link  = sprintf('<a href="%s">%s</a>', get_permalink(), $title);
					$map_data['markers'][] = array(
						'latlang' => $coords,
						'title'   => $title,
						'desc'    => '<h3 class="marker-title">'.$link.'</h3><div class="marker-desc">'.get_the_excerpt().'</div>',
					);
					$lats[]  = $coords[0];
					$longs[] = $coords[1];

				}
			endwhile;
			wp_reset_postdata();
			// auto calc map center
			if ( ! empty( $lats ) )
				$map_data['center'] = array( 
					( max( $lats ) + min( $lats ) ) /2,
					( max( $longs ) + min( $longs ) ) /2 
				);
		endif; // End Loop

		
		wp_localize_script( 'posts_map', 'map_data', $map_data );
		
	}

//----------------------------------------------------------------------------
	//-----------Admin Colorpicker 
	//----------------------------------------------------------------------------
	add_action( 'admin_enqueue_scripts', 'evont_enqueue_color_picker' );
	function evont_enqueue_color_picker( $hook_suffix ) {
		// first check that $hook_suffix is appropriate for your admin page		
    	wp_enqueue_script( 'evont-walker-menu', get_template_directory_uri().'/inc/menu-walker/walker_menu.js', false, true );
		wp_enqueue_style( 'evont-walker-menu', get_template_directory_uri().'/inc/menu-walker/walker_menu.css', false, true );
		wp_enqueue_style( 'font-awesome-loader', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), '1', 'all' );
		
	}
	
	add_action( 'init', 'evont_add_editor_styles' );
	function evont_add_editor_styles() {
		add_editor_style( get_stylesheet_uri() );
	}
		
 
?>