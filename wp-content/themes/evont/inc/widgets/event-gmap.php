<?php
/*
Plugin Name: Event G-Map Widget
Plugin URI: http://janxcode.com/
Description: janxcode Event G-Map Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_gmap extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_gmap', 'description' => 'Displays Events on Google Map','category_id','show_date' );
    parent::__construct('widget_gmap', esc_html__('Evont Event G-Maps','evont'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Event G-Maps', 'number' => 5, 'categ_id' => '','btn' => '') );
 
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
	  
	 
	echo '<div id="widget-map" class="evont-title-bar-map xgmap"></div>'; 
  		
		   
 
    echo $after_widget;
  }
  
 
}
// Add Widget
function widget_gmap_init() {
	register_widget('widget_gmap');
}
add_action('widgets_init', 'widget_gmap_init');
?>
