<?php
/*
Plugin Name: Event Event Search Widget
Plugin URI: http://janxcode.com/
Description: janxcode Event Event Search Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_eventsearch extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_eventsearch', 'description' => 'Displays Events on Event Search','category_id','show_date' );
    parent::__construct('widget_eventsearch', esc_html__('Evont Event Search','evont'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Event Search', 'number' => 5, 'categ_id' => '','btn' => '') );
 
	$title = esc_attr($instance['title']);
	$categ_id = $instance['categ_id'];
	$number = absint($instance['number']);
	$btn = $instance['btn'];
	
	?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">
                   Title:
                </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                </p>
     		
            	 <p>
                    <label for="<?php echo $this->get_field_id('number'); ?>">
                       Number of Photos:
                    </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
                </p>
 
     
                <p>
                    <label for="<?php echo $this->get_field_id('categ_id'); ?>">
                       Category ID:
                    </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('categ_id'); ?>" name="<?php echo $this->get_field_name('categ_id'); ?>" type="text" value="<?php echo $categ_id; ?>" />
     
                </p>
                
                   
               
 
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance=$old_instance;
 
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['categ_id']=$new_instance['categ_id'];
	$instance['number']=$new_instance['number'];
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$posts_count = $instance['number'];
	$category = $instance['categ_id'];

	
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
	  
	 
  		echo do_shortcode('[evont_search_form]' ) ; 

		   
 
    echo $after_widget;
  }
  
 
}
// Add Widget
function widget_eventsearch_init() {
	register_widget('widget_eventsearch');
}
add_action('widgets_init', 'widget_eventsearch_init');
?>
