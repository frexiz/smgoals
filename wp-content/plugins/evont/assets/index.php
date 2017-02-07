<?php
require_once($get_plugin_dir_path.'/assets/tinymce_button.php');
require_once($get_plugin_dir_path.'/assets/inc/cpt.php');
require_once($get_plugin_dir_path.'/assets/inc/functions.php');

//One-Click Importer
require_once($get_plugin_dir_path.'/one-click-importer/evont-importer.php');

function the_content_filter($content) {
// array of custom shortcodes requiring the fix
$block = join("|",array("media_center_group","media_center","counter_up_group","counter_up","testimonials","service_box_group","service_box","partners","partners_logo","subscribe","section_title_group","section_title","contact_us","map","tabs_group","tabs","tabs_title","tabs_content","vc_counter_down","container",'one_eight','one_fourth','one_third' ,'two_thirds' , 'three_fourths' , 'one_six' , 'one_five' , 'one_eleven' ,'image_placeholder' ,'accordion_group' ,'accordion' ,'request_quote_form' , 'price_table_group' , 'price_table' , 'teammember' , 'process' , 'process_group' , 'buttons' , "lists_group" , "lists" , "progress" , "progress_group" , "table" , "tr" , "td" , "project_progress_group" , "project_progress" , "tag_box" , "dropcaps" , "mark" , "blockquote" , "flexslider_group" , "flexslider" , "table"  , "tr"  , "td" , "projects" , "content_box" , "contact_details","gridimage","gridimage_group","alerts" ,"dividers" ,"banner_fx","event" ,"interactive_map" , "progress_bar" ,"modalbox" ,"v_timeline","currency_table","currency_conv","vc_counter_up","speakers","newsletter","price_table_single","owl_group","owl"));
// opening tag
$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
// closing tag
$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
} 
add_filter("the_content", "the_content_filter");
//Shortcodes Include
include('shortcodes/media_center.php');
include('shortcodes/testimonials.php');
include('shortcodes/service_box.php');
include('shortcodes/partners_logo.php');
include('shortcodes/section_title.php');
include('shortcodes/map.php');
include('shortcodes/map_route.php');
include('shortcodes/contact_us.php');
include('shortcodes/contact_details.php');
include('shortcodes/count_down.php');
include('shortcodes/speakers.php');
include('shortcodes/newsletter.php');
include('shortcodes/price.php');
include('shortcodes/agenda.php');
include('shortcodes/tagline.php');
include('shortcodes/counter_up.php');
include('shortcodes/teammember.php');
include('shortcodes/venue_box.php');
include('shortcodes/contact_address.php');
include('shortcodes/image_placeholder.php');
include('shortcodes/gallery.php');
include('shortcodes/owl_slider.php');
include('shortcodes/video_player.php');
include('shortcodes/timeline.php');
include('shortcodes/small_description.php');
include('shortcodes/content_box.php');
include('shortcodes/faq.php');
include('shortcodes/contact_info.php');

?>