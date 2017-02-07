<?php
/*
Plugin Name: Event Event Organizer Widget
Plugin URI: http://janxcode.com/
Description: janxcode Event Event Organizer Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_eventorganizer extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_eventorganizer', 'description' => 'Displays Events Organizer','category_id','show_date' );
    parent::__construct('widget_eventorganizer', esc_html__('Evont Event Organizer','evont'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Event Organizer', 'number' => 5, 'categ_id' => '','btn' => '') );
 
	$title = esc_attr($instance['title']);
	$btn = $instance['btn'];
	
	?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
            Title:
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
     		

                
                   
               
 
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance=$old_instance;
 
	$instance['title'] = strip_tags($new_instance['title']);
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

	
 
   if (!empty($title))
      echo $before_title . $title . $after_title;;
	  
	  	$queried_object = get_queried_object();

		if ( $queried_object ) {
			$post_id = $queried_object->ID;
			
		}
        	
		$args = array('post_type' => 'events',
				  'p' => $post_id,
				  'orderby' => 'date',
				  'order' => 'ASC' );  
	
		$loop = new WP_Query( $args );			
		while ( $loop->have_posts() ) : $loop->the_post();

		$event_organizer_short_info = get_post_meta(get_the_id() , 'jx_evont_org_details',true);
		$event_facebook = get_post_meta(get_the_id() , 'jx_evont_organizer_fb',true);
		$event_twitter = get_post_meta(get_the_id() , 'jx_evont_organizer_twitter',true);
		$event_url = get_post_meta(get_the_id() , 'jx_evont_organizer_link',true);
	 			
	echo '<div>
	<ul>
	<li>'.$event_organizer_short_info.'</li>
	<li>'.$event_facebook.'</li>
	<li>'.$event_twitter.'</li>
	<li>'.$event_url.'</li>
	</ul>
	</div>'; 

	endwhile;
	wp_reset_query();
  		
		   
 
    echo $after_widget;
  }
  
 
}
// Add Widget
function widget_eventorganizer_init() {
	register_widget('widget_eventorganizer');
}
add_action('widgets_init', 'widget_eventorganizer_init');
?>
