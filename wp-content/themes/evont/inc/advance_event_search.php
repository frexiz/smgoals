<?php 
    //Advance Search
    
    /**
     * Register custom query vars */
     
    function evont_register_query_vars( $vars ) {
	    $vars[] = 'cat';
	    $vars[] = 'location';
        $vars[] = 'date';
        $vars[] = 'type';
	    return $vars;
    } 
    add_filter( 'query_vars', 'evont_register_query_vars' );
    
    
    function evont_pre_get_posts( $query ) {
	// check if the user is requesting an admin page 
	// or current query is not the main query
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}

	// edit the query only when post type is 'accommodation'
	// if it isn't, return
	if ( !is_post_type_archive( 'events' ) ){
		return;
	}
	
	$location = get_query_var( 'location' );
	$date = get_query_var( 'date' );
	
	$meta_query = array();

	// add meta_query elements
	if( !empty($location) ){
		$meta_query[] = array( 'key' => 'address', 'value' => get_query_var( 'location' ), 'compare' => 'LIKE' );
	}
    
    if( !empty($date) ){
		$meta_query[] = array( 'key' => 'evont_event_date', 'value' => get_query_var( 'date' ), 'compare' => 'LIKE' );
	}

	if( count( $meta_query ) > 1 ){
		$meta_query['relation'] = 'AND';
	}

	if( count( $meta_query ) > 0 ){
		$query->set( 'meta_query', $meta_query );
	}
}
add_action( 'pre_get_posts', 'evont_pre_get_posts', 1 );

	
	//function evont_setup() {
		add_shortcode( 'evont_search_form', 'evont_search_form' );
	////}
	//add_action( 'init', 'evont_setup' );
	
	//Shortcode Output
	function evont_search_form( $args ){
		
		// The Query
		// meta_query expects nested arrays even if you only have one query
		$evont_query = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => '-1' ) );
		
		// The Loop
		if ( $evont_query->have_posts() ) {
			$locations = array();
			while ( $evont_query->have_posts() ) {
				$evont_query->the_post();
				$location = get_post_meta( get_the_ID(), 'evont_event_location', true );
		
				// populate an array of all occurrences (non duplicated)
				if( !in_array( $location, $locations ) ){
					$locations[] = $location;    
				}
			}
		
		} else{
			   echo 'No events yet!';
			   return;
		}
		
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
		if( count($locations) == 0){
			return;
		}
		
		asort($locations);
			
		$select_location = '<select name="location" style="width: 100%">';
		$select_location .= '<option value="" selected="selected">' . esc_html__( 'Select Location', 'evont' ) . '</option>';
		foreach ($locations as $location ) {
			$select_location .= '<option value="' . $location . '">' . $location . '</option>';
		}
		$select_location .= '</select>' . "\n";
		
		reset($locations);	
		
		//Get Taxonomies
		$args = array( 'hide_empty' => false );
		$typology_terms = get_terms( 'events-category', $args );
		if( is_array( $typology_terms ) ){
			$select_typology = '<select name="category" style="width: 100%">';
			$select_typology .= '<option value="" selected="selected">' . __( 'Select Category', 'evont' ) . '</option>';
			foreach ( $typology_terms as $term ) {
				$select_typology .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
			}
			$select_typology .= '</select>' . "\n";
		}
		
		$output = '<form action="' . esc_url( home_url() ) . '" method="GET" role="search">';
		$output .= '<div class="smselectbox">' . $select_location . '</div>';
		$output .= '<div class="smselectbox">' . $select_typology . '</div>';
		$output .= '<input type="hidden" name="post_type" value="events" />';
		$output .= '<p><input type="submit" value="Go!" class="button" /></p></form>';
		
		return $output;	
			
		}
?>