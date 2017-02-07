<?php
/*
Plugin Name: Event Event Widget
Plugin URI: http://janxcode.com/
Description: janxcode Event Event Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_eventbutton extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_eventbutton', 'description' => 'Displays Events Button','category_id','show_date' );
    parent::__construct('widget_eventbutton', esc_html__('Evont Event Button','evont'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Event Button', 'link' => 5, 'categ_id' => '','btn' => '') );
 
	$title = esc_attr($instance['title']);
	$link = $instance['link'];
	$btn = $instance['btn'];
	
	?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">
                   Title:
                </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                </p>
     		
            	 <p>
                    <label for="<?php echo $this->get_field_id('link'); ?>">
                       Button Link
                    </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
                </p>
                
                   
               
 
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance=$old_instance;
 
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['link']=$new_instance['link'];
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$link = $instance['link'];


	
 
    //if (!empty($title))
     // echo $before_title . $title . $after_title;;
	  
	 
	echo '<div class="sidebar-widget-button"><a class="button" href="'.$link.'">'.$title.'</a></div>'; 
  		
		   
 
    echo $after_widget;
  }
  
 
}
// Add Widget
function widget_eventbutton_init() {
	register_widget('widget_eventbutton');
}
add_action('widgets_init', 'widget_eventbutton_init');
?>
