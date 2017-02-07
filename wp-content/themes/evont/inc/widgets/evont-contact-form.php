<?php
/*
Plugin Name: Evont Contact From Widget
Plugin URI: http://janxcode.com/
Description: janxcode Evont Contact From Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_evontcontactform extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_evontcontactform', 'description' => 'Displays Evont Contact From','category_id','show_date' );
    parent::__construct('widget_evontcontactform', esc_html__('Evont Contact From','evont'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Contact From', 'number' => 5, 'categ_id' => '','btn' => '') );
 
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
      //echo $before_title . $title . $after_title;;
	  
?>

    <div class="jx-evont-contact-form no-bg">
        <form action="" id="contactForm" method="post" class="has-validation-callback">
            <div class="row-1">
                <div class="contact-full-name">
                    <input id="full-name-contact" name="full_name" placeholder="Full Name" class="jx-evont-form-text" data-validation="required" type="text">
                    <!-- First Name Textbox -->
                </div>
                <div class="contact-email">
                    <input id="email-contact" name="email" placeholder="Email Address" class="jx-evont-form-text" data-validation="required" validation="email" type="text">
                    <!-- Email Name Textbox -->
                </div>
            </div>
            
            <div class="row-1">
                <div class="contact-subject">
                    <input id="subject-contact" name="subject" placeholder="Subject" class="jx-evont-form-text" data-validation="required" type="text">
                    <!-- Subject Textbox -->
                </div>
            </div>
            
            <div class="row-1">
                <div class="contact-message">
                    <textarea id="message-contact" name="message" class="jx-evont-form-textarea" rows="5" cols="30" placeholder="Enter Your Message Here..." data-validation="required"></textarea>
                    <!-- Message Box -->
                </div>  
                <div class="contact-submit">
                    
                    <button type="submit">SUBMIT</button>
                    <!-- Submit Button -->
                </div>
            </div> 
        </form>
    </div>

<?php
		   
 
    echo $after_widget;
  }
  
 
}
// Add Widget
function widget_evontcontactform_init() {
	register_widget('widget_evontcontactform');
}
add_action('widgets_init', 'widget_evontcontactform_init');
?>