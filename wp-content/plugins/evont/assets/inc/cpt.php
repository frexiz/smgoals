<?php

/* evont Custom Post Type */
add_action('init', 'jx_evont_cpt_team');
add_action('init', 'jx_evont_cpt_portfolio');
add_action('init', 'jx_evont_cpt_testimonial');
add_action('init', 'jx_evont_cpt_speakers');
add_action('init', 'jx_evont_cpt_partners');
add_action('init', 'jx_evont_cpt_agenda');
add_action('init', 'jx_evont_cpt_events');
add_action('init', 'jx_evont_cpt_price');
add_action('init', 'jx_evont_cpt_hotels');
add_action('init', 'jx_evont_cpt_timeline');

 function jx_evont_cpt_team(){
			global $data; 
			
			$labels = array(
			'name' => _x('Team','team','evont'),
			'singular_name' => _x('Team','team','evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Team Item','evont'),
			'edit_item' => __('Edit Item','evont'),
			'new_item' => __('New Item','evont'),
			'view_item' => __('View Item','evont'),
			'search_items' => __('Search Items','evont'),
			'not_found' =>  __('No items found','evont'),
			'not_found_in_trash' => __('No items found in Trash','evont'), 
			'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_position' => 20,
			'supports' => array('title','editor','thumbnail')
			); 
			
			register_post_type('team',$args);
			
			

			
}// EOF team CPT


function jx_evont_cpt_portfolio(){
			global $data; 
			
			$labels = array(
			'name' => _x('Portfolio','portfolio','evont'),
			'singular_name' => _x('Portfolio','portfolio','evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Portfolio Item','evont'),
			'edit_item' => __('Edit Item','evont'),
			'new_item' => __('New Item','evont'),
			'view_item' => __('View Item','evont'),
			'search_items' => __('Search Items','evont'),
			'not_found' =>  __('No items found','evont'),
			'not_found_in_trash' => __('No items found in Trash','evont'), 
			'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_position' => 20,
			'supports' => array('title','editor','thumbnail')
			); 
			
			register_post_type('portfolio',$args);
			
			
			register_taxonomy( "portfolio-categories", 
			array( 	"portfolio" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));

			
}// EOF portfolio CPT


function jx_evont_cpt_testimonial(){
			global $data; 
			$labels = array(
				'name' => __('Testimonials','Testimonials','evont'),
				'singular_name' => __('Testimonial','Testimonials','evont'),
				'add_new' => __('Add New','evont'),
				'add_new_item' => __('Add New Testimonial','evont'),
				'edit_item' => __('Edit Testimonial','evont'),
				'new_item' => __('New Testimonial','evont'),
				'view_item' => __('View Testimonial','evont'),
				'search_items' => __('Search Testimonials','evont'),
				'not_found' =>  __('No Testimonials found','evont'),
				'not_found_in_trash' => __('No Testimonials in the trash','evont'),
				'parent_item_colon' => '',
			);
		 
			$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','thumbnail')
		  );
		  
		  register_post_type('testimonials',$args);
		  
}//EOF Testimonial CPT


function jx_evont_cpt_speakers(){
			global $data; 
 			$labels = array(
			'name' => _x('Speakers','Speakers', 'evont'),
			'singular_name' => _x('Speaker','Speaker', 'evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Speaker','evont'),
			'edit_item' => __('Edit Speaker','evont'),
			'new_item' => __('New Speaker','evont'),
			'view_item' => __('View Speaker','evont'),
			'search_items' => __('Search Speaker','evont'),
			'not_found' =>  __('No Speaker found','evont'),
			'not_found_in_trash' => __('No Speaker found in Trash','evont'),
			'parent_item_colon' => ''
		  );
		  $args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','thumbnail')
		  );
		  
		  register_taxonomy( "speakers-category", 
			array( 	"speakers" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Speakers Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));
		  
		  register_post_type('speakers',$args);
		 
}//EOF Team-Member CPT		


function jx_evont_cpt_price(){
			global $data; 
 			$labels = array(
			'name' => _x('Price','price', 'evont'),
			'singular_name' => _x('Price','Price', 'evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Price','evont'),
			'edit_item' => __('Edit Price','evont'),
			'new_item' => __('New Price','evont'),
			'view_item' => __('View Price','evont'),
			'search_items' => __('Search Price','evont'),
			'not_found' =>  __('No Price found','evont'),
			'not_found_in_trash' => __('No Price found in Trash','evont'),
			'parent_item_colon' => ''
		  );
		  $args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor')
		  );
		  
		  register_taxonomy( "price-category", 
			array( 	"price" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"price Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));
		  
		  register_post_type('price',$args);
		 
}//EOF Team-Member CPT	

function jx_evont_cpt_hotels(){
			global $data; 
 			$labels = array(
			'name' => _x('Hotels','hotels', 'evont'),
			'singular_name' => _x('Hotel','Hotel', 'evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Hotel','evont'),
			'edit_item' => __('Edit Hotel','evont'),
			'new_item' => __('New Hotel','evont'),
			'view_item' => __('View Hotel','evont'),
			'search_items' => __('Search Hotel','evont'),
			'not_found' =>  __('No Hotel found','evont'),
			'not_found_in_trash' => __('No Hotel found in Trash','evont'),
			'parent_item_colon' => ''
		  );
		  $args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','thumbnail')
		  );
		  
		  register_taxonomy( "hotels-category", 
			array( 	"hotels" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"hotels Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));
		  
		  register_post_type('hotels',$args);
		 
}//EOF Team-Member CPT	


function jx_evont_cpt_partners(){
			global $data; 
			
			$labels = array(
			'name' => _x('Partners','partners','evont'),
			'singular_name' => _x('Partner','partner','evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Partner Item','evont'),
			'edit_item' => __('Edit Item','evont'),
			'new_item' => __('New Item','evont'),
			'view_item' => __('View Item','evont'),
			'search_items' => __('Search Items','evont'),
			'not_found' =>  __('No items found','evont'),
			'not_found_in_trash' => __('No items found in Trash','evont'), 
			'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_position' => 20,
			'supports' => array('title','page-attributes')
			); 
			
			register_post_type('partners',$args);
			
			register_taxonomy( "partners-category", 
			array( 	"partners" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));
			
			register_taxonomy( "partners-events", 
			array( 	"partners" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Event Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));


			
}// EOF Registered Users

function jx_evont_cpt_events(){
			
			
			$labels = array(
			'name' => _x('Events','events','evont'),
			'singular_name' => _x('Event','event','evont'),
			'add_new' => __('Add New', 'evont'),
			'add_new_item' => __('Add New Event Item','evont'),
			'edit_item' => __('Edit Item','evont'),
			'new_item' => __('New Item','evont'),
			'view_item' => __('View Item','evont'),
			'search_items' => __('Search Items','evont'),
			'not_found' =>  __('No items found','evont'),
			'not_found_in_trash' => __('No items found in Trash','evont'), 
			'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_position' => 20,
			'supports' => array('title','editor','thumbnail','page-attributes')
			); 
			
			register_post_type('events',$args);
			
			register_taxonomy( "events-category", 
			array( 	"events" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Events Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));


			
}// EOF Registered Users

function jx_evont_cpt_agenda(){
			global $data; 
			
			$labels = array(
				'name' => _x('Agenda','agenda','evont'),
				'singular_name' => _x('Agenda','agenda','evont'),
				'add_new' => __('Add New', 'evont'),
				'add_new_item' => __('Add New Agenda','evont'),
				'edit_item' => __('Edit Item','evont'),
				'new_item' => __('New Item','evont'),
				'view_item' => __('View Item','evont'),
				'search_items' => __('Search Items','evont'),
				'not_found' =>  __('No items found','evont'),
				'not_found_in_trash' => __('No items found in Trash','evont'), 
				'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'menu_position' => 15,
			'supports' => array('title','editor','thumbnail','page-attributes')
			); 
			
			register_taxonomy( "agenda-category", 
			array( 	"agenda" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Agenda Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));
			
			register_post_type('agenda',$args);


			
}// EOF Schedule

//Timeline

function jx_evont_cpt_timeline(){
			global $data; 
			
			$labels = array(
				'name' => _x('Timline','timeline','evont'),
				'singular_name' => _x('Timline','timeline','evont'),
				'add_new' => __('Add New', 'evont'),
				'add_new_item' => __('Add New Timline','evont'),
				'edit_item' => __('Edit Item','evont'),
				'new_item' => __('New Item','evont'),
				'view_item' => __('View Item','evont'),
				'search_items' => __('Search Items','evont'),
				'not_found' =>  __('No items found','evont'),
				'not_found_in_trash' => __('No items found in Trash','evont'), 
				'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'menu_position' => 15,
			'supports' => array('title','editor','thumbnail','page-attributes')
			); 
			
			register_taxonomy( "timeline-category", 
			array( 	"timeline" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"Timline Category",'add_new_item'=>"Add New Field"), 
			"singular_label" => __('Field','evont'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));
			
			register_post_type('timeline',$args);


			
}// EOF Schedule


add_filter( 'manage_participants_posts_columns', 'my_edit_participants_columns' ) ;

function my_edit_participants_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => esc_html__( 'Customer Name' ),
		'email' => esc_html__( 'Email' ),
		'phone' => esc_html__( 'Phone' ),
		'plan' => esc_html__( 'Plan' )
	);

	return $columns;
}


//Ading content to columns to participants
add_action( 'manage_posts_custom_column', 'my_manage_participants_columns', 10, 2 );

function my_manage_participants_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'email' :

			/* Get the post meta. */
			$email = get_post_meta( $post_id, 'jx_evont_reg_email', true );

			/* If no duration is found, output a default message. */
			if ( empty( $email ) )
				echo esc_html_e( 'Unknown' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $email;
			break;

		/* If displaying the 'genre' column. */
		case 'phone' :

			/* Get the genres for the post. */
			$phone = get_post_meta( $post_id, 'jx_evont_reg_phone', true );

			/* If no duration is found, output a default message. */
			if ( empty( $phone ) )
				echo esc_html_e( 'Unknown' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $phone;
			break;
		
		case 'plan' :

			/* Get the genres for the post. */
			$plan = get_post_meta( $post_id, 'jx_evont_reg_ticket', true );

			/* If no duration is found, output a default message. */
			if ( empty( $plan ) )
				echo esc_html_e( 'Unknown' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $plan;
			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}


add_filter( 'manage_edit-agenda_columns', 'my_edit_agenda_columns' ) ;

function my_edit_agenda_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => esc_html__( 'Speaker Name' ),		
		'speaker' => esc_html__( 'Speaker Photo' ),
		'session_title' => esc_html__( 'Title' ),
		'time' => esc_html__( 'Time' ),
		
	);

	return $columns;
}

//Ading content to columns to agenda
add_action( 'manage_agenda_posts_custom_column', 'my_manage_agenda_columns', 10, 2 );

function my_manage_agenda_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'time' :

			/* Get the post meta. */
			$time = get_post_meta($post_id,'jx_evont_session_time',true);

			/* If no duration is found, output a default message. */
			if ( empty( $time ) )
				echo esc_html_e( '' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $time;
			break;
	
		case 'session_title' :

			/* Get the post meta. */
			$title = get_post_meta($post_id,'jx_evont_session_title',true);

			/* If no duration is found, output a default message. */
			if ( empty( $title ) )
				echo esc_html_e( '' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $title;
			break;

		/* If displaying the 'genre' column. */
		case 'speaker' :

			/* Get the genres for the post. */
			$speaker = get_the_post_thumbnail($post_id,'testimonial');

			/* If no duration is found, output a default message. */
			if ( empty( $speaker ) )
				echo esc_html_e( '' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $speaker;
			break;
				

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}



//Agenda Collapse 

if (!class_exists('Admin_Collapse_Subpages')) {
	class Admin_Collapse_Subpages {
		public $version = '2.3';
		function __construct() {
			add_action('admin_init', array($this, 'action_init'));
			add_action('admin_enqueue_scripts', array($this, 'acs_scripts'));
		}
		public function acs_admin_body_class( $classes ) {
			$classes .= ' ' .'acs-hier';
			return $classes;
		}
		public function translation_strings() {
			return array(
				'expand_all' => __('Expand All', 'admin-collapse-subpages'),
				'collapse_all' => __('Collapse All', 'admin-collapse-subpages'),
				'children' => __('[children]', 'admin-collapse-subpages'),
			);
		}
		public function action_init() {
			load_plugin_textdomain('admin-collapse-subpages', false, basename( dirname( __FILE__ ) ) . '/languages' );
		}
		public function acs_scripts() {
			global $pagenow;
			if(isset($_GET['post_type']) ) {
				$post_type = $_GET['post_type'];
				if(is_post_type_hierarchical($post_type)) {
					add_filter( 'admin_body_class', array($this, 'acs_admin_body_class') );
				}
			}
			if ( is_admin() && isset($_GET['post_type']) && $pagenow =='edit.php' ) {
				//make sure jquery is loaded
				wp_enqueue_script('jquery');
				//cookie script for saving collapse states 
				wp_enqueue_script('jquery-cookie', plugins_url('../js/jquery.cookie.js', __FILE__ ), 'jquery', '1.4.0');
				//main collapse pages script
				wp_register_script('acs-js', plugins_url('../js/admin_collapse_subpages.js', __FILE__ ), array('jquery-cookie'), $this->version);
				wp_localize_script('acs-js', 'acs_strings', $this->translation_strings());
				wp_enqueue_script('acs-js');
				
				
			}
		}
	}
	global $collapsePages;
	$collapsePages = new Admin_Collapse_Subpages();
}



			

?>