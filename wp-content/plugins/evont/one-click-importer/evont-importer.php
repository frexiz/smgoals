<?php 
defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
add_action( 'admin_init', 'janxcode_importer' );
function janxcode_importer() 
{
    global $wpdb; 
	//$demo_data = include plugin_dir_path( __FILE__ );
	
		if ( current_user_can( 'manage_options' ) && isset($_GET['imported'])){
			add_action( 'admin_notices', 'janxcode_admin_alert' );
		}
	
	
	
	if ( current_user_can( 'manage_options' ) && isset( $_GET['import_data_content'] ) ) { 
	
			if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
		
		
			if ( ! class_exists( 'WP_Importer' ) ) {
				include ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			}
		
			if ( ! class_exists( 'WP_Import' ) ) {
				include plugin_dir_path( __FILE__ ).'/wordpress-importer.php';
			}
				
			//First: Import theme posts,pages,menus,portfolios
			if ( class_exists( 'WP_Import' ) ) 
			{ 
				
				
			$theme_xml = plugin_dir_path( __FILE__ ).'/demo/evont.xml.gz' ; // Get the xml file from directory 
		
				$wp_import = new WP_Import();
				$wp_import->fetch_attachments = true;
				ob_start();
				$wp_import->import($theme_xml);
				ob_end_clean();
						
			//Second: Locate registered menus
			
			$menu_location = get_theme_mod('nav_menu_locations');
			$registered_menus = wp_get_nav_menus();
			
			if($registered_menus):			
				foreach($registered_menus as $menu) { 
						if( $menu->name == 'Main Menu' ) :
							$menu_location['primary_navigation'] = $menu->term_id;							
						elseif( $menu->name == 'Footer Menu' ) :
							$menu_location['footer_navigation'] = $menu->term_id;							
					
						endif;
					}	
			endif;
		
			
			//Set the registered menus
			set_theme_mod( 'nav_menu_locations', $menu_location );
			
			// Import Theme Options
			//$demo_data_uri = get_template_directory_uri() . '/plugins/one-click-importer/';
			$theme_options_url = plugins_url( 'demo/theme.options.txt', __FILE__ ); // theme options data file
			$get_theme_options = (array)wp_remote_get( $theme_options_url );
			if (is_wp_error($get_theme_options)) {
			$data = unserialize(base64_decode($get_theme_options['body']));
			update_option( OPTIONS, $data ); // update theme options
			}

			
			// Add sidebar widget areas
            $sidebars = array(
                'General' => 'General',
                'Blog' => 'Blog',
                'Shop' => 'Shop'
            );
            update_option( 'sbg_sidebars', $sidebars );

            foreach( $sidebars as $sidebar ) {
                
                register_sidebar(array(
                    'name'=>$sidebar,
                    'id' => 'evont-sidebar--' . strtolower( $sidebar ),
                    'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
					'after_widget'  => '</div></div>',
					'before_title'  => '<h6>',
					'after_title'   => '<i class="fa fa-circle"></i></h6>',
                ));
            }

	  			// Add data to widgets
				$widgets_json = plugins_url( 'demo/widget_data.json', __FILE__ ); // widgets data file
				$response_widgets = (array)wp_remote_get( $widgets_json );
				
				if($response_widgets){
				$widget_data = $response_widgets['body'];
				$import_widgets = janxcode_import_widgets( $widget_data );
				}
				
				// Set reading options
					$homepage = get_page_by_title( 'Home' );
					$posts_page = get_page_by_title( 'Blog' ); 
					
					if($homepage->ID && $posts_page->ID) {
						update_option('show_on_front', 'page');
						update_option('page_on_front', $homepage->ID); // Front Page
						update_option('page_for_posts', $posts_page->ID); // Blog Page
					}
		
				// finally redirect to success page
				wp_redirect( admin_url( 'themes.php?page=optionsframework&imported=success' ) );
			
			}
	}
}
		// Import Widget Settings
		// Thanks to http://wordpress.org/plugins/widget-settings-importexport/
		function janxcode_import_widgets($widget_data){
			$json_data = $widget_data;
			$json_data = json_decode( $json_data, true );
			$sidebar_data = $json_data[0];
			$widget_data = $json_data[1];
			foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
			$widgets[ $widget_data_title ] = '';
				foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
					if( is_int( $widget_data_key ) ) {
						$widgets[$widget_data_title][$widget_data_key] = 'on';
					}
				}
			}
			unset($widgets[""]);
			foreach ( $sidebar_data as $title => $sidebar ) {
			$count = count( $sidebar );
			for ( $i = 0; $i < $count; $i++ ) {
				$widget = array();
				$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
				$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
					if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
						unset( $sidebar_data[$title][$i] );
					}
			}
			$sidebar_data[$title] = array_values( $sidebar_data[$title] );
			}
			foreach ( $widgets as $widget_title => $widget_value ) {
				foreach ( $widget_value as $widget_key => $widget_value ) {
					$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
				}
			}
			$sidebar_data = array( array_filter( $sidebar_data ), $widgets );
			janxcode_parse_import_data( $sidebar_data );
		}
		//Import Widget Data
		function janxcode_parse_import_data( $import_array ) {
		$sidebars_data = $import_array[0];
		$widget_data = $import_array[1];
		$current_sidebars = get_option( 'sidebars_widgets' );
		$new_widgets = array( );
		foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :
		$current_sidebars[$import_sidebar] = array(); // clear current widgets in sidebar
			foreach ( $import_widgets as $import_widget ) :
				//if the sidebar exists
				if ( array_key_exists( $import_sidebar, $current_sidebars )) :
					$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
					$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
					$current_widget_data = get_option( 'widget_' . $title );
					$new_widget_name = janxcode_get_new_widget_name( $title, $index );
					$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );
				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
						$new_widgets[$title][$new_index] = $widget_data[$title][$index];
						$multiwidget = $new_widgets[$title]['_multiwidget'];
						unset( $new_widgets[$title]['_multiwidget'] );
						$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
						$current_widget_data[$new_index] = $widget_data[$title][$index];
						$current_multiwidget = array_key_exists('_multiwidget', $current_widget_data) ? $current_widget_data['_multiwidget'] : false;
						$new_multiwidget = array_key_exists('_multiwidget', $widget_data[$title]) ? $widget_data[$title]['_multiwidget'] : false;
						$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
						unset( $current_widget_data['_multiwidget'] );
						$current_widget_data['_multiwidget'] = $multiwidget;
						$new_widgets[$title] = $current_widget_data;
				}
				endif;
			endforeach;
		endforeach;
		if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
			update_option( 'sidebars_widgets', $current_sidebars );
			foreach ( $new_widgets as $title => $content )
			update_option( 'widget_' . $title, $content );
			return true;
		}
		return false;
		}
		
		//Get Widget Names
		function janxcode_get_new_widget_name( $widget_name, $widget_index ) {
			$current_sidebars = get_option( 'sidebars_widgets' );
			$all_widget_array = array( );
				foreach ( $current_sidebars as $sidebar => $widgets ) {
					if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
						foreach ( $widgets as $widget ) {
							$all_widget_array[] = $widget;
						}
					}
				}
				while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
					$widget_index++;
				}
				$new_widget_name = $widget_name . '-' . $widget_index;
				return $new_widget_name;
		}
		
		function janxcode_admin_alert(){
			?>
			<div class="updated">
			<p><?php esc_html_e( 'Data Successfully Imported!', 'rebuild' ); ?></p>
			</div>
			<?php
		}
?>