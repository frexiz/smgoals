<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */
/********************* META BOX DEFINITIONS ***********************/
add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
	
	global $meta_boxes;
	
	global $wpdb;
	$prefix = 'jx_evont_';
	$meta_boxes = array();		
	
	$evont_data =  evont_globals();
	$google_key = $evont_data['google_map_key'];
	
	// REVSLIDER ARRAY
	$revolutionslider = array();
	$layersliders_array = array();
	
	if(class_exists('RevSlider')){
		$revolutionslider[0] = 'Select a Slider';
	    $slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		
		foreach($arrSliders as $revSlider) { 
			$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
		}
	}
	else{
		$revolutionslider[0] = 'You have to install RevolutionSlider Plugin';
	}
	
	
	//Get Select Fields Value
	
	global $wpdb;
	$speakers_array ='';
	$agenda_array='';
	$sponsors_array='';
	$price_array='';
	$hotels_array='';
	

	if ( function_exists( 'jx_evont_cpt_speakers' ) ) :
	$speakers_array = array();
	$speakers_array[0] = 'Select Speakers List';
	$terms = get_terms( 'speakers-category' );
	$count = count( $terms );

	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$speakers_array[$term->term_id] = $term->name;
		}
	}
	
	endif;
	
	//Agenda
	if ( function_exists( 'jx_evont_cpt_agenda' ) ) :
	$agenda_array = array();
	$agenda_array[0] = 'Select Agenda List';
	$terms = get_terms( 'agenda-category' );
	$count = count( $terms );

	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$agenda_array[$term->term_id] = $term->name;
		}
	}
	endif;
	
	
	//Sponsors
	if ( function_exists( 'jx_evont_cpt_partners' ) ) :
	$sponsors_array = array();
	$sponsors_array[0] = 'Select Partners List';
	$terms = get_terms( 'partners-category' );
	$count = count( $terms );

	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$partners_array[$term->term_id] = $term->name;
		}
	}
	endif;
	
	//News
	$news_array = array();
	$news_array[0] = 'Select News List';
	$terms = get_terms( 'category' );
	$count = count( $terms );

	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$news_array[$term->term_id] = $term->name;
		}
	}
	
	//Hotels
	if ( function_exists( 'jx_evont_cpt_hotels' ) ) :
	$hotels_array = array();
	$hotels_array[0] = 'Select Hotels List';
	$terms = get_terms( 'hotels-category' );
	$count = count( $terms );

	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$hotels_array[$term->term_id] = $term->name;
		}
	}
	endif;
	
	//Price
	if ( function_exists( 'jx_evont_cpt_price' ) ) :
	$price_array = array();
	$price_array[0] = 'Select Price List';
	$terms = get_terms( 'price-category' );
	$count = count( $terms );

	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$price_array[$term->term_id] = $term->name;
		}
	}
	endif;
	
	
				
	
	/* ----------------------------------------------------- */
	// Post Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
		// HEADING of Post Option 
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Post Options', 'evont' ).'</h2>',
			'id' => 'heading_004', // Not used but needed for plugin
			),
			array(
						'name'		=> 'Video Embed Code',
						'id'   => $prefix."video_code",
						'type' => 'text',
						'desc'	=> 'Paste your video or audio link (<strong>E.g. http://www.youtube.com/watch?v=HUTXbBx765</strong>) to play.',
					
			)
			
			
		)
	);
	
	/* ----------------------------------------------------- */
	// Post Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'price' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
		// HEADING of Post Option 
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Price Options', 'evont' ).'</h2>',
			'id' => 'heading_004', // Not used but needed for plugin
			),
			array(
				'name'		=> 'Price Plan',
				'id'		=> $prefix . 'price_plan',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=>'',
				'desc'		=> '25'
			),
			
			
		)
	);
	
	/* ----------------------------------------------------- */
	// Events Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'events' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
		// HEADING of Post Option 
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Events Options', 'evont' ).'</h2>',
			'id' => 'heading_004', // Not used but needed for plugin
			),
			array(
				'name'		=> 'Date',
				'id'		=> $prefix . 'event_date_display',
				'type'		=> 'date',
				'description'		=> 'Upcoming Event Date',
				'js_options' => array(
					'appendText'      => esc_html__( '(dd MM yy)', 'your-prefix' ),
					'dateFormat'      => esc_html__( 'dd-MM-yy', 'your-prefix' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
					'autoSize'        => true,
				),
				
			),
			
			array(
				'name'		=> 'Time',
				'id'		=> $prefix . 'event_time',
				'type'		=> 'time',
				'description'		=> 'Upcoming Event Time',
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
				
			),
			
			array(
				'name'		=> 'Countdown Date',
				'id'		=> $prefix . 'event_date_counter',
				'type'		=> 'date',
				'description'		=> 'Set Countdown Date',
				'js_options' => array(
					'appendText'      => esc_html__( '(dd MM yy)', 'your-prefix' ),
					'dateFormat'      => esc_html__( 'dd-MM-yy', 'your-prefix' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
					'autoSize'        => true,
				),
				
			),			
			
			
			array(
				'id'   => 'address',
				'name' => __( 'Address', 'evont' ),
				'type' => 'text',
				'std'  => __( 'Hanoi, Vietnam', 'evont' ),
			),
			array(
				'id'            => 'map',
				'name'          => __( 'Location', 'evont' ),
				'type'          => 'map',
				// Default location: 'latitude,longitude[,zoom]' (zoom is optional)
				'std'           => '-6.233406,-35.049906,15',
				// Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
				'address_field' => 'address',
				'api_key'       => $google_key, // https://metabox.io/docs/define-fields/#section-map
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Event Related Info', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Speakers',
				'id'		=> $prefix . "event_speakers",
				'type'		=> 'select',
				'options'	=> $speakers_array,
				'multiple'	=> false
			),
			
			array(
				'name'		=> 'Agenda',
				'id'		=> $prefix . "event_agenda",
				'type'		=> 'select',
				'options'	=> $agenda_array,
				'multiple'	=> false
			),
			
			array(
				'name'		=> 'Sponsors',
				'id'		=> $prefix . "event_sponsors",
				'type'		=> 'select',
				'options'	=> $sponsors_array,
				'multiple'	=> false
			),
			
			array(
				'name'		=> 'News',
				'id'		=> $prefix . "event_news",
				'type'		=> 'select',
				'options'	=> $news_array,
				'multiple'	=> false
			),
			
			array(
				'name'		=> 'Price',
				'id'		=> $prefix . "event_price",
				'type'		=> 'select',
				'options'	=> $price_array,
				'multiple'	=> false
			),
			
			array(
				'name'		=> 'Hotels',
				'id'		=> $prefix . "event_hotels",
				'type'		=> 'select',
				'options'	=> $hotels_array,
				'multiple'	=> false
			),
			
			array(
				'name'		=> 'Event Color',
				'id'		=> $prefix . "event_color",
				'type'		=> 'color'
			),
			
			array(
				'id'   => $prefix .'min_price',
				'name' => __( 'Minimum Price', 'evont' ),
				'type' => 'text',
				'std'  => __( '50', 'evont' ),
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Address Info', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'id'   => $prefix .'address_1',
				'name' => __( 'Address 1', 'evont' ),
				'type' => 'text',
				'std'  => 'NYC - Cubic City Bank',
			),
			
			array(
				'id'   => $prefix .'address_2',
				'name' => __( 'Address 2', 'evont' ),
				'type' => 'text',
				'std'  => 'Lawrance Ave',
			),
			
			array(
				'id'   => $prefix .'address_3',
				'name' => __( 'Address 3', 'evont' ),
				'type' => 'text',
				'std'  => 'California, CA 1450',
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Organizer Details', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name' => esc_html__( 'Organizer Short Info', 'evont' ),
				'desc' => 'Type Short organizer details',
				'id'   => $prefix .'org_details',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
			
			array(
				'name'		=> 'Facebook',
				'id'		=> $prefix . 'organizer_fb',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your facebook id'
			),
			array(
				'name'		=> 'Twitter',
				'id'		=> $prefix . 'organizer_twitter',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Twitter id'
			),	
			
			array(
				'name'		=> 'Link',
				'id'		=> $prefix . 'organizer_link',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type website url'
			),	
			
		)
	);
	
	/* ----------------------------------------------------- */
	// Page Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
			// Title Bar Heading
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Title Bar Options', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),

			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix."title_bar",
					'type'		=> 'select',
					'options'	=> array(
						'no-titlebar'			=> 'Select Title Bar',
						'titlebar'			=> 'Title Bar',
						'revolutionslider'	=> 'Revolution Slider',
						'count-down'		=> 'Count Down',
						'count-down-2'		=> 'Count Days',
						'register-form'		=> 'Registration Form',
						'google-map'		=> 'Google Map',
					
					),
					'desc'		=> 'Set Title Bar style.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			
						
			
			array(
				'name'		=> 'Animated Day',
				'id'		=> $prefix."counter_up",
				'type'		=> 'checkbox',
				'desc'		=> 'Only for count down option, make the day to count up',
				'std'		=> true
			),
			
			array(
				'name'		=> 'Show Breadcrumbs?',
				'id'		=> $prefix."breadcrumbs",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Breadcrumbs.',
				'std'		=> true
			),
			
			
			array(
				'name'		=> 'Tint Background',
				'id'		=> $prefix."tint",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Tint Overlay Color.',
				'std'		=> true
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Revolution Slider Title Bar', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Revolution Slider',
				'id'		=> $prefix . "revolutionslider",
				'type'		=> 'select',
				'options'	=> $revolutionslider,
				'multiple'	=> false
			),
			
						
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Video', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Paste Video Link',
				'id'		=> $prefix . 'video_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=>'',
				'desc'		=> 'http://www.youtube.com/?v=ew4342rq21'
			),
			
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Select Sidebar', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			
			array(
					'name'		=> 'Sidebar',
					'id'		=> $prefix."sidebar",
					'type'		=> 'select',
					'options'	=> array(
						'default'			=> 'Default',
						'no-sidebar'		=> 'No Sidebar',
						'left-sidebar'		=> 'Left Sidebar',
						'right-sidebar'		=> 'Right Sidebar'						
					),
					'desc'		=> 'Set sidebar side.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),	
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Background Image', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			
			
			array(
				'name'		=> 'Background Image',
				'id'		=> "{$prefix}bg_image",
				'type'      => 'image_advanced',
				'desc'		=> 'Select Background Image.',
				'max_file_uploads' => 1,
					
			),
			
			array(
						'name'		=> 'Background Image Position',
						'id'		=> "{$prefix}bg_image_pos",
						'type'		=> 'select',
						'options'	=> array(
							'top'							=> 'Top',
							'center'							=> 'Center',
							'bottom'						=> 'Bottom'
						),
						'desc'		=> 'Set background image position.',
						'std'		=> true
			),
			
			array(
				'name'		=> 'Full Height',
				'id'		=> $prefix."full_height",
				'type'		=> 'checkbox',
				'desc'		=> 'Set Full Height.',
				'std'		=> true
			),
			
			
					
		)
	);
	
	
	
	
	
	
	/* ----------------------------------------------------- */
	// Testimonial Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'testimonial_info',
		'title' => 'Testimonials',
		'pages' => array( 'testimonials' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => '<h2>'.esc_html__( 'Testimonials Details', 'evont' ).'</h2>',
				'id' => 'heading_002', // Not used but needed for plugin
			),
					
			array(
				'name'		=> 'Business / Site Name',
				'id'		=> $prefix . 'testimonial_business_name',
				'type'		=> 'text',
				'std'		=> ''
			),
			array(
				'name'		=> 'link',
				'id'		=> $prefix . 'testimonial_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),
			// HEADING of Page Options 
			array(
				'type' => 'heading',
				'name' => '<h2>'.esc_html__( 'Sidebar Options', 'evont' ).'</h2>',
				'id' => 'heading_002', // Not used but needed for plugin
			),
			array(
				'name'		=> 'SideBar',
				'id'		=> $prefix."sidebar",
				'type'		=> 'select',
				'options'	=> array(
					'default'					=> 'Default',
					'nosidebar'					=> 'No Sidebar - Full Width',
					'leftsidebar'				=> 'Left Sidebar',
					'rightsidebar'				=> 'Right Sidebar',
				),
				'multiple'	=> false,
				'desc'		=> 'Select sidebar position Left or Right or Full width page.',
				'std'		=> array( 'title' )
			),
			
			
		)
	);

	/* ----------------------------------------------------- */
	// Participants
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'participants' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(		
			
			
			array(
				'name'		=> 'Email Address',
				'id'		=> $prefix . 'reg_email',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Phone',
				'id'		=> $prefix . 'reg_phone',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Ticket Type',
				'id'		=> $prefix . 'reg_ticket',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Amount',
				'id'		=> $prefix . 'reg_amount',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Payment',
				'id'		=> $prefix . 'reg_payment',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			)					
		)
	);	
	
	
	
	/* ----------------------------------------------------- */
	// Partners Logo
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'partners' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(		
			
			
			array(
				'name'		=> 'Link',
				'id'		=> $prefix . 'partner_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Partner Logo',
				'id'		=> "{$prefix}partner_logo",
				'type'      => 'image_advanced',
				'desc'		=> 'Upload Partner Logo.',
				'max_file_uploads' => 1,
					
			)	
						
		)
	);
	
	
	/* ----------------------------------------------------- */
	// Speakers Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'speaker_info',
		'title' => 'Add Speaker Information',
		'pages' => array( 'speakers' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Job Position',
				'id'		=> $prefix . 'speaker_position',
				'type'		=> 'text',
				'desc'			=> 'What is you job title?'
			),
			array(
				'name'		=> 'Facebook',
				'id'		=> $prefix . 'speaker_fb',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your facebook id'
			),
			array(
				'name'		=> 'Twitter',
				'id'		=> $prefix . 'speaker_twitter',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Twitter id'
			),
			array(
				'name'		=> 'Linkedin',
				'id'		=> $prefix . 'speaker_linkedin',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Linkedin id'
			),
			array(
				'name'		=> 'Google+',
				'id'		=> $prefix . 'speaker_googleplus',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Google+ id'
			),
			
			
			//Skills
			
			array(
				'name'		=> 'Skill#1 Label',
				'id'		=> $prefix . 'speaker_skilllabel_1',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#1 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_1',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
			
			array(
				'name'		=> 'Skill#2 Label',
				'id'		=> $prefix . 'speaker_skilllabel_2',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#2 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_2',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
			
			array(
				'name'		=> 'Skill#3 Label',
				'id'		=> $prefix . 'speaker_skilllabel_3',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#3 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_3',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
			
			array(
				'name'		=> 'Skill#4 Label',
				'id'		=> $prefix . 'speaker_skilllabel_4',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#4 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_4',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
		
		)
	);
	
	
	
	/* ----------------------------------------------------- */
	// Team Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'team_info',
		'title' => 'Add Team Information',
		'pages' => array( 'team' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Job Position',
				'id'		=> $prefix . 'job_position',
				'type'		=> 'text',
				'desc'			=> 'What is you job title?'
			),

			array(
				'name'		=> 'Facebook',
				'id'		=> $prefix . 'team_fb',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your facebook id'
			),
			array(
				'name'		=> 'Twitter',
				'id'		=> $prefix . 'team_twitter',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Twitter id'
			),
			array(
				'name'		=> 'Linkedin',
				'id'		=> $prefix . 'team_linkedin',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Linkedin id'
			)
		
		)
	);
	
	
	/* ----------------------------------------------------- */
	// Agenda Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'agenda_info',
		'title' => 'Add Agenda Information',
		'pages' => array( 'agenda' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Session Title',
				'id'		=> $prefix . 'session_title',
				'type'		=> 'text',
				'desc'			=> 'Session Title'
			),
			
			array(
				'name'		=> 'Session Time',
				'id'		=> $prefix . 'session_time',
				'type'		=> 'text',
				'desc'			=> 'Session Time'
			),
			
			array(
				'name'		=> 'Session Icon',
				'id'		=> $prefix . 'session_icon',
				'type'		=> 'text',
				'desc'			=> 'Session Icon eg: fa-desktop'
			)
			
			
			
					
		)
	);
	
	
	/* ----------------------------------------------------- */
	// Timline Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'timeline_info',
		'title' => 'Add Timeline Information',
		'pages' => array( 'timeline' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
		
			array(
				'name'		=> 'Date',
				'id'		=> $prefix . 'session_date',
				'type'		=> 'date',
				'desc'			=> 'Session Date',
				'js_options' => array(
					'appendText'      => esc_html__( '(dd/mm/yy)', 'evont' ),
					'dateFormat'      => esc_html__( 'dd/mm/yy', 'evont' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			)			
					
		)
	);
	
	
	
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}
	
