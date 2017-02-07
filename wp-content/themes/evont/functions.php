<?php
	/**
	 * evont functions and definitions
	 *
	 * @package evont
	 */
	 	 
	/* ======================================================================== */
	/* Includes																	*/
	/* ======================================================================== */		
		
		/* ------------------------------------------------------ */
		/* Include php files								      */
		/* -------------------------------------------------------*/
		require get_template_directory() . '/inc/enqueue.php'; // Includse JS and CSS 
		require get_template_directory() . '/inc/multi-post-image/multiple-featured-images.php'; // Include Multi Featuered Image 		
		require get_template_directory() . '/inc/breadcrumb.php'; //Breadcrumbs
		require get_template_directory() . '/inc/class-tgm-plugin-activation.php'; //Plugins activator
		require get_template_directory() . '/inc/custom_js.php'; // Load Custom JS
		require get_template_directory() . '/inc/custom_css.php'; // Load Custom CSS
		require get_template_directory() . '/inc/ajax_auth_function.php'; // Login & registeration
		require get_template_directory() . '/inc/hooks.php'; // Hooks
		require get_template_directory() . '/inc/menu-walker/walker_menu.php'; // Login & registeration
		require get_template_directory() . '/inc/mailchimp.php'; // Mail
		require get_template_directory() . '/inc/advance_event_search.php'; // Advance Search	
		
		
		/*------- Widgets--------*/
		require get_template_directory() . '/inc/widgets/event-gmap.php'; // Google Map
		require get_template_directory() . '/inc/widgets/evont-event-info.php'; // Event Info
		require get_template_directory() . '/inc/widgets/evont-event-organizer.php'; // Event Organizer
		require get_template_directory() . '/inc/widgets/evont-event-button.php'; // Event Button
		require get_template_directory() . '/inc/widgets/evont-event-search.php'; // Event Search
		require get_template_directory() . '/inc/widgets/evont-contact-form.php'; // Evont Contact From

		
		
		/*------- Implement the Custom Header feature--------*/
		require get_template_directory() . '/inc/custom-header.php';
		
		/*------- Custom template tags for this theme-------*/
		require get_template_directory() . '/inc/template-tags.php';
		
		/*------- Custom functions that act independently of the theme templates -------*/
		require get_template_directory() . '/inc/extras.php';
		
		/*-------- Customizer additions --------------------*/
		require get_template_directory() . '/inc/customizer.php';
		
		/*-------- Load Jetpack compatibility file ----------*/
		require get_template_directory() . '/inc/jetpack.php';
		
		/*-------- Woocommerce ----------*/
		require get_template_directory() . '/woocommerce/woocommerce.php';
		
	
		/* Global Variables*/
		if (!function_exists('evont_globals')) {
		function evont_globals() {			
			global $evont_data;				
			return $evont_data;		
		}
		}
	
		/* ------------------------------------------------------ */
		/* Include Meta Box Script 								  */
		/* -------------------------------------------------------*/

		require_once get_template_directory() . '/inc/meta-box/meta-box.php';
		require get_template_directory() .'/inc/meta-boxes.php'; // SMOF
		
		$evont_data = evont_globals(); 
		
		/* ------------------------------------------------------ */
		/* Include Slightly Modified Options Framework (SMOF)     */
		/* -------------------------------------------------------*/
		include_once get_template_directory().'/admin/index.php'; // SMOF		
		
		
		/* ------------------------------------------------------ */
		/* Theme Updates 								  */
		/* -------------------------------------------------------*/
		
		if ((isset($evont_data['envato_username'])) & (isset($evont_data['envato_apikey']))): 
			$username = esc_attr($evont_data['envato_username']);
			$apikey = esc_attr($evont_data['envato_apikey']);
			
			require get_template_directory(). '/inc/updates/envato-wp-theme-updater.php';
			Envato_WP_Theme_Updater::init( $username, $apikey, 'janxcode' );
			
		endif;	
		
		
	/* ======================================================================== */
	/* TGM Plugin Activation							   		      	        */
	/* ======================================================================== */		
	
	add_action( 'tgmpa_register', 'evont_register_required_plugins' );
	
	function evont_register_required_plugins() {
			/**
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(
		
				array(
					'name' 					=> esc_html__('evont Framework','evont'),
					'slug' 					=> 'evont',
					'source'				=> get_template_directory() . '/plugins/evont-framework.zip',
					'required' 				=> true,
					'version'				=> '1.1',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
				array(
					'name' 					=> esc_html__('Revolution Slider','evont'),
					'slug' 					=> 'revslider',
					'source'				=> get_template_directory() . '/plugins/revslider.zip',
					'required' 				=> true,
					'version'				=> '5.2.6',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
							
				array(
					'name' 					=> esc_html__( 'Visual Composer', 'evont' ),
					'slug' 					=> 'js-composer',
					'source'				=> get_template_directory() . '/plugins/js_composer.zip',
					'required' 				=> true,
					'version'				=> '4.12',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
				
				array(
					'name' 					=> esc_html__('Contact Form 7','evont'),
					'slug' 					=> 'contact-form-7',
					'required' 				=> false,
				),
				
				array(
					'name'               	=> esc_html__('WooCommerce','evont'),
					'slug'               	=> 'woocommerce', 
					'required'           	=> false					 
				),	
										
			);
		
		
			/**
			 * Array of configuration settings. Amend each line as needed.
			 * If you want the default strings to be available under your own theme domain,
			 * leave the strings uncommented.
			 * Some of the strings are added into a sprintf, so see the comments at the
			 * end of each line for what each argument will be.
			 */
			$config = array(
				'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.
				'message'      => '',                      // Message to output right before the plugins table.
				'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'evont' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'evont' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'evont' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'evont' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'evont'  ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'evont'), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'evont'), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'evont'), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'evont'), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'evont'), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'evont'), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'evont'), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'evont'),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'evont'),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer','evont'),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'evont'),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'evont'), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
				)
			);
		
			tgmpa( $plugins, $config );
		
		}
	
	
	/* ======================================================================== */
	/* Define Multiple Featuered Images			      	    					*/
	/* ======================================================================== */
		if (class_exists('kdMultipleFeaturedImages')) {
		
		$i = 2;
		$evont_data['posts_slideshow_number'] = 3;
		
			while($i <= $evont_data['posts_slideshow_number']) {
	        $args = array(
	                'post_type' => 'page',  
					'id' => 'featured-image-'.$i,    
	                'labels' => array(
	                    'name'      => esc_html__('Featured image ','evont').$i,
	                    'set'       => esc_html__('Set featured image ','evont').$i,
	                    'remove'    => esc_html__('Remove featured image ','evont').$i,
	                    'use'       => esc_html__('Use as featured image ','evont').$i,
	                )
	        );
	        new kdMultipleFeaturedImages($args);
	        $args = array(
	                'post_type' => 'post',
					'id' => 'featured-image-'.$i,      
	                'labels' => array(
	                    'name'      => esc_html__('Featured image ','evont').$i,
	                    'set'       => esc_html__('Set featured image ','evont').$i,
	                    'remove'    => esc_html__('Remove featured image ','evont').$i,
	                    'use'       => esc_html__('Use as featured image ','evont').$i,
	                )
	        );
	        new kdMultipleFeaturedImages($args);
	        $args = array(
	                'post_type' => 'portfolio',
					'id' => 'featured-image-'.$i,      
	                'labels' => array(
	                    'name'      => esc_html__('Featured image ','evont').$i,
	                    'set'       => esc_html__('Set featured image ','evont').$i,
	                    'remove'    => esc_html__('Remove featured image ','evont').$i,
	                    'use'       => esc_html__('Use as featured image ','evont').$i,
	                )
	        );
	        new kdMultipleFeaturedImages($args);
	        $i++;
    	}
		
					 
		};
		
		
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}
	if ( ! function_exists( 'evont_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */ 
	 
	function evont_setup() {	
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on expo-test, use a find and replace
	 * to change 'expo-test' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'evont', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/*------------ Woocommerce Support ---*/
	add_theme_support('woocommerce');
	
	/*----------- Add post thumbnail functionality-----------------*/
	add_theme_support( 'post-thumbnails' );
	
	if ( function_exists( 'add_image_size' ) ) { 
		
		/*--------*/
		add_image_size( 'evont-blog', 890, 430, true ); // Blog Image
		add_image_size( 'evont-small-blog', 386, 217, true ); // Small Blog Image
		add_image_size( 'evont-testimonial', 176, 178, true ); // Testimonial
		add_image_size( 'evont-service', 887, 466, true ); // Service
		add_image_size( 'evont-portfolio', 450, 450, true ); // Portfolio
		add_image_size( 'evont-portfolio-2', 600, 600, true ); // Portfolio
		add_image_size( 'evont-small-thumbnail', 118, 87, true ); // Small Service
		add_image_size( 'evont-small-speaker', 270, 262, true ); // Small Team
		add_image_size( 'evont-team', 278, 278, true ); // Small Team
		add_image_size( 'evont-team-2', 400, 400, true ); // Small Team
		add_image_size( 'evont-single-event', 630, 350, true ); // Small Team
	}
	
	/*------------------ Register Navigation --------------------*/	
	register_nav_menus( array(
		'primary_navigation' => esc_html__( 'Primary Navigation', 'evont' ),
		'intro_navigation' => esc_html__( 'Intro Navigation', 'evont' ),
		'footer_navigation' => esc_html__( 'Footer Navigation', 'evont' ),
		'onepage_navigation' => esc_html__( 'OnePage Navigation', 'evont' ),
		'top_navigation' => esc_html__( 'Top Navigation', 'evont' )
	) );
	
	
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	add_theme_support( 'custom-background', apply_filters( 'evont_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	
	}
	
	endif; // evont_setup
	
	add_action( 'after_setup_theme', 'evont_setup' );
	 
	 
		 
	 
	 function evont_comment( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>
       
       
       <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment">
                <div class="img-thumbnail">
					<?php echo get_avatar($comment, $size = '50'); ?>
                </div>
                <div class="comment-block">
                    <div class="comment-arrow"></div>
                    <span class="comment-by">
                        <strong><?php printf( esc_html__( '%s', 'evont'), get_comment_author_link() ) ?></strong>
                        <span class="right">
                            <span> <a href="#"><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
                        </span>
                    </span>
                    <p><?php comment_text() ?></p>
                    
					<?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'evont' ) ?></em>
                    <br />
                    <?php endif; ?>
                    
                    <span class="date right"><?php printf(esc_html__('%1$s at %2$s', 'evont'), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'evont'),'  ','' ) ?></span>
                </div>
            </div>
         </li>
        
	<?php
	}
	
	
					
	/* ======================================================================== */
	/* Excerpt character limit									           	    */
	/* ======================================================================== */
	
		function evont_excerpt($limit) {
			$excerpt = explode(' ', get_the_excerpt(), $limit);
			if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
			} else {
			$excerpt = implode(" ",$excerpt);
			}	
			$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
			return $excerpt;
			}
			 
			function evont_content($limit) {
			$content = explode(' ', get_the_content(), $limit);
			if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'...';
			} else {
			$content = implode(" ",$content);
			}	
			$content = preg_replace('/\[.+\]/','', $content);
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			return $content.'<readmore class="cl-effect-1">
					<a href="'.esc_url(the_permalink()) .'" rel="bookmark" title="Permanent Link to '.the_title().'">'. esc_html_e('Read More', 'evont').'</a>
					</readmore>';
		}
			
	
	/* ======================================================================== */
	/* Regsiter Widgets										           	        */
	/* ======================================================================== */	
	
	///////////////////////Footer Widgets ////////////////////////////
	function evont_register_sidebars() {		
	
			///////////////////////Sidebar Widgets ////////////////////////////
			register_sidebar( 
			array(
				'name'          => esc_html__('General Widget','evont'),
				'id'            => 'general-sidebar',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
			);
			
			register_sidebar( 
			array(
				'name'          => esc_html__('Events Sidebar','evont'),
				'id'            => 'events-sidebar',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
			);
			
			register_sidebar( 
			array(
				'name'          => esc_html__('Single Events Widget','evont'),
				'id'            => 'single-events-sidebar',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
			);
			
			
			register_sidebar( 
			array(
				'name'          =>  esc_html__('Shop Widget', 'evont' ),
				'id'            => 'shop-sidebar',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
			);		
			
			
			///////////////////////Footer Widgets ////////////////////////////
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 01','evont'),
				'id'            => 'evont-footer-1',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6>',
				'after_title'   => '<i class="fa fa-circle"></i></h6>',
			)
			);
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 02','evont'),
				'id'            => 'evont-footer-2',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6>',
				'after_title'   => '<i class="fa fa-circle"></i></h6>',
			)
			);
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 03','evont'),
				'id'            => 'evont-footer-3',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6>',
				'after_title'   => '<i class="fa fa-circle"></i></h6>',
			)
			);

			
			
	}
	add_action( 'widgets_init', 'evont_register_sidebars' );
	
	
	/* ====================================================== */
	/* Pagination 											  */
	/* ====================================================== */
	function evont_pagination($pages = '', $range = 4) {
		$showitems = ($range * 2)+1;
		
			
		global $paged;
		
		if(empty($paged)) $paged = 1;
		
		if($pages == '') {
			
			global $wp_query;
			
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
		
		if(1 != $pages) {
			
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link(1))."'>&laquo; " . esc_html__('First', 'evont') . "</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged - 1))."'>&lsaquo; " . esc_html__('Previous', 'evont') . "</a>";
			
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<span class='page-numbers current'>".$i."</span>":"<a href='".esc_url(get_pagenum_link($i))."' class='page-numbers' >".$i."</a>";
				}
			}
		
			
		}
	}	
	
	
	//Retina Support
	add_filter( 'wp_generate_attachment_metadata', 'evont_retina_support_attachment_meta', 10, 2 );
	/**
	 * Retina images
	 *
	 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
	 */
	function evont_retina_support_attachment_meta( $metadata, $attachment_id ) {
		foreach ( $metadata as $key => $value ) {
			if ( is_array( $value ) ) {
				foreach ( $value as $image => $attr ) {
					if ( is_array( $attr ) )
					evont_retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true);
				}
			}
		}
	 
		return $metadata;
	}
	
	/**
	 * Create retina-ready images
	 *
	 * Referenced via retina_support_attachment_meta().
	 */
	function evont_retina_support_create_images( $file, $width, $height, $crop = false ) {
		if ( $width || $height ) {
			$resized_file = wp_get_image_editor( $file );
			if ( ! is_wp_error( $resized_file ) ) {
				$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
	 
				$resized_file->resize( $width * 2, $height * 2, $crop );
				$resized_file->save( $filename );
	 
				$info = $resized_file->get_size();
	 
				return array(
					'file' => wp_basename( $filename ),
					'width' => $info['width'],
					'height' => $info['height'],
				);
			}
		}
		return false;
	}
	
	add_filter( 'delete_attachment', 'evont_delete_retina_support_images' );
		/**
		 * Delete retina-ready images
		 *
		 * This function is attached to the 'delete_attachment' filter hook.
		 */
	function evont_delete_retina_support_images( $attachment_id ) {
		$meta = wp_get_attachment_metadata( $attachment_id );
		if ( $meta ) {
		$upload_dir = wp_upload_dir();
		$path = pathinfo( $meta['file'] );
		foreach ( $meta as $key => $value ) {
			if ( 'sizes' === $key ) {
				foreach ( $value as $sizes => $size ) {
					$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
					$retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
					if ( file_exists( $retina_filename ) )
						unlink( $retina_filename );
					}
				}
			}
		}
	}
	
	/*====================Woocommerce======================*/
	/**
	 * Redirect users after add to cart.
	 */
	function evont_add_to_cart_redirect( $url ) {
		$url = WC()->cart->get_checkout_url();
		// $url = wc_get_checkout_url(); // since WC 2.5.0
		return $url;
	}
	add_filter( 'woocommerce_add_to_cart_redirect', 'evont_add_to_cart_redirect' );
	
	
	add_filter('woocommerce_get_price','evont_woocommerce_get_price',20,2);
	function evont_woocommerce_get_price($price,$post){
		
		if ($post->post->post_type === 'events')
			$price = get_post_meta($post->id, "jx_evont_min_price", true);
		return $price;
	}
	
	
	/*====================HEX to RGBA =====================*/
	function evont_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
		   if(strlen($hex) == 3) {
			  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
			  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
			  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
			  $r = hexdec(substr($hex,0,2));
			  $g = hexdec(substr($hex,2,2));
			  $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);
		   //return implode(",", $rgb); // returns the rgb values separated by commas
		   return $rgb; // returns an array with the rgb values
	}


	//----------------------------------------------------------------------------
	//-----------Viusal Composer
	//----------------------------------------------------------------------------
	if(function_exists('vc_add_param')){
	
	  vc_add_param('vc_row',array(
			  "type" => "textfield",
			  "heading" => esc_html__('Section ID', 'evont'),
			  "param_name" => "el_id",
			  "value" => "",
			  "description" => esc_html__("Set ID section", 'evont'),   
		)); 
		
		
		 vc_add_param('vc_row',array(
			  "type" => "textfield",
			  "heading" => esc_html__('Class', 'evont'),
			  "param_name" => "el_cls",
			  "value" => "",
			  "description" => esc_html__("Set class name", 'evont'),   
		));   
		

				
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Padding', 'evont'),
			"param_name" => "el_class",
			"value" => array(   
					esc_html__('Select', 'evont') => 'select',
					esc_html__('Default Padding', 'evont') => 'jx-evont-padding',
					esc_html__('Max Padding', 'evont') => 'jx-evont-extra-padding',    
					esc_html__('Small Padding', 'evont') => 'jx-evont-padding-small',
					esc_html__('No Padding', 'evont') => 'no-padding',
					esc_html__('Top Padding Only', 'evont') => 'jx-evont-padding no-bottom-padding',
					esc_html__('Bottom Padding Only', 'evont') => 'jx-evont-padding no-top-padding',                                                                                
					),
			"description" => esc_html__("Select Padding", 'evont'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Fullwidth', 'evont'),
			"param_name" => "fullwidth",
			"value" => array(   
					esc_html__('Select', 'evont') => 'Select',
					esc_html__('Yes', 'evont') => 'yes',  
					esc_html__('No', 'evont') => 'no',
                                                                   
					),
			"description" => esc_html__("Set container width", 'evont'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Overlayer', 'evont'),
			"param_name" => "el_class_2",
			"value" => array(   
					esc_html__('No', 'evont') => 'no',  
					esc_html__('Default', 'evont') => 'jx-evont-tint',
					esc_html__('Default Light', 'evont') => 'jx-evont-tint-light',
					esc_html__('Black', 'evont') => 'jx-evont-tint-black',
					esc_html__('Yellow', 'evont') => 'jx-evont-tint-yellow',
					esc_html__('Black Light', 'evont') => 'jx-evont-tint-black-light',
					esc_html__('Grey', 'evont') => 'jx-evont-tint-grey',                                                                                
					),
			"description" => esc_html__("Select Padding", 'evont'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Row Pattern', 'evont'),
			"param_name" => "row_pattern",
			"value" => array(   
					esc_html__('No', 'evont') => 'no',  
					esc_html__('Left Big', 'evont') => 'jx-evont-leftb',
					esc_html__('Right Big', 'evont') => 'jx-evont-rightb',
					esc_html__('Full Pattern', 'evont') => 'jx-evont-fullpat', 
					esc_html__('Polyonal Pattern', 'evont') => 'jx-evont-bg-polygon', 
					),
			"description" => esc_html__("Select Padding", 'evont'),      
		  ) 
		); 
	
	}


	//----------------------------------------------------------------------------
	//-----------Dynamic Generated css
	//----------------------------------------------------------------------------

	ob_start(); // Capture all output (output buffering)
	require get_template_directory() . '/inc/dynamic_skin.php'; // Generate CSS
	$css = ob_get_clean(); // Get generated CSS (output buffering)

	global $wp_filesystem;
		
	// Initialize the WP filesystem, no more using 'file-put-contents' function
	if (empty($wp_filesystem)) {
		require_once (ABSPATH . '/wp-admin/includes/file.php');
		WP_Filesystem();
	}
	
	if(!$wp_filesystem->put_contents( get_template_directory() . '/css/dynamic_evont.css', $css, 0644)) {
		return esc_html__('Failed to create css file','evont');
	}

//EOF

?>