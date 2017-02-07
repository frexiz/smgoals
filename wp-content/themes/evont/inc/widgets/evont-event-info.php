<?php
/*
Plugin Name: Event Event Info Widget
Plugin URI: http://janxcode.com/
Description: janxcode Event Event Info Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_eventinfo extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_eventinfo', 'description' => 'Displays Events Info','category_id','show_date' );
    parent::__construct('widget_eventinfo', esc_html__('Evont Event Info','evont'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Event Info', 'number' => 5, 'categ_id' => '','btn' => '') );
 
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
	  
	  	global $post;
		setup_postdata( $post );
		//echo "Post's ID: " . get_the_ID();
        	
		$args = array('post_type' => 'events',
				  'p' => get_the_ID(),
				  'orderby' => 'date',
				  'order' => 'ASC' );  
	
		$loop = new WP_Query( $args );			
		while ( $loop->have_posts() ) : $loop->the_post();
	
		$event_address_1 = get_post_meta(get_the_id() , 'jx_evont_address_1',true);
		$event_address_2 = get_post_meta(get_the_id() , 'jx_evont_address_2',true);
		$event_address_3 = get_post_meta(get_the_id() , 'jx_evont_address_3',true);
	 			
	echo '<div>
	<ul>
	<li>'.$event_address_1.'</li>
	<li>'.$event_address_2.'</li>
	<li>'.$event_address_3.'</li>
	</ul>
	</div>'; 

	endwhile;
	wp_reset_query();

		   
 
    echo $after_widget;
  }
  
 
}
// Add Widget
function widget_eventinfo_init() {
	register_widget('widget_eventinfo');
}
add_action('widgets_init', 'widget_eventinfo_init');
?>