<?php 
	
		//Body Start Hook-----------------------------//
		function evont_theme_header_start() {
			
		$evont_data =  evont_globals();	
			
		if (!is_page_template('template-blank.php')):
	
			if($evont_data['select_header']) {
				if(is_page('header-1')) {
					include_once get_template_directory().'/inc/header/header-1.php';
				}elseif(is_page('home-2')) {
					include_once get_template_directory().'/inc/header/header-2.php';
				}elseif(is_page('home-course')) {
					include_once get_template_directory().'/inc/header/header-3.php';
				}elseif(is_page('home-9')) {
					include_once get_template_directory().'/inc/header/header-4.php';
				}elseif(is_page('intro-page')) {
					include_once get_template_directory().'/inc/header/intro-header.php';
				}else{
					include_once get_template_directory().'/inc/header/'.$evont_data['select_header'].'.php';
				}
			} else {
				if(is_page('header-1')) {
					include_once get_template_directory().'/inc/header/header-1.php';
				}elseif(is_page('home-course')) {
					include_once get_template_directory().'/inc/header/header-3.php';
				}elseif(is_page('home-9')) {
					include_once get_template_directory().'/inc/header/header-4.php';
				}elseif(is_page('header-2')) {
					include_once get_template_directory().'/inc/header/header-2.php';
				}			
					
			}
	
		endif;
		
		}
		
		add_action('evont_body_start', 'evont_theme_header_start');
		
		//EOF Body Start Hook-----------------------------//
		
		
		//Body End Hook-----------------------------//
		function evont_theme_footer_end() {
			
		$evont_data =  evont_globals();	

		if (!is_page_template('template-blank.php')):	
			if($evont_data['select_footer']) {
				if(is_page('footer-1')) {
					include_once get_template_directory().'/inc/footer/footer-1.php';				
				}elseif(is_page('footer-2')) {
					include_once get_template_directory().'/inc/footer/footer-2.php';
				}elseif(is_page('home-9')) {
					include_once get_template_directory().'/inc/footer/footer-3.php';
				}else{
					include_once get_template_directory().'/inc/footer/'.$evont_data['select_footer'].'.php';
				}
			} else {
				if(is_page('footer-1')) {
					include_once get_template_directory().'/inc/footer/footer-1.php';
				}elseif(is_page('footer-2')) {
					include_once get_template_directory().'/inc/footer/footer-2.php';
				}elseif(is_page('home-9')) {
					include_once get_template_directory().'/inc/footer/footer-3.php';
				}
				
			}
		endif;
		}
		
		
		
		
		add_action('evont_body_end', 'evont_theme_footer_end');		
		
		
		add_filter('body_class','evont_body_class');
		function evont_body_class($classes) {
			global $post;
			
			$evont_data =  evont_globals();
			
			if ( is_front_page() ) :
				$classes[] = 'home';
			elseif ( is_page() ) :
				$classes[] = $post->post_name;
			elseif( is_archive() ) :
				$classes[] = 'archive';
			elseif( is_404() ) :
				$classes[] = 'error';
			elseif( is_search() ) :
				$classes[] = 'search';
			endif;
			
			
			//Boxed Options
			if ($evont_data['select_layout']=='boxed'): 
				$classes[]='jx-evont-boxed';
			endif;
			
			// return the $classes array
			return $classes;
		}
		
		
	
	?>