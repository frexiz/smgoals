<?php 

	/* Add Shortcode Buttons ---------------------------------------------*/
	add_action('init', 'olen_add_button'); 
	function olen_add_button() { 
	 global $data; 
	  if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) 
	  { 
			if ( get_user_option('rich_editing') == 'true') { 	
				add_filter('mce_external_plugins', 'olen_add_plugin'); 
				add_filter('mce_buttons_2', 'olen_register_button'); 
			} 
		} 
	} // EOF add_button
	
	
	/* Register Shortcode Buttons ---------------------------------------------*/
	
	function olen_register_button($buttons) { 
     array_push($buttons,"|","shortcode_dropdown"); 
     return $buttons; 
 	} // EOF register_button
	
	
	/* Add Shortcode Plugin ---------------------------------------------------*/
	function olen_add_plugin($plugin_array) {			
		if(get_bloginfo('version') > 3.8):
			$plugin_array['shortcode_dropdown'] = plugin_dir_url( __file__ ).'js/shortcodes-3.9.js';
		else:
			$plugin_array['shortcode_dropdown'] = plugin_dir_url( __file__ ).'js/shortcodes.js';
		endif;
		
		return $plugin_array; 
	}// EOF add_plugin
	
	
	function add_shortcode_menu() {
?>	

<div class="hidden" style="display:none">
<div class="shortcode-html">
	<a href="javascript:;" class="button-add-shortcode">[+]</a>
	<ul> 
    
    
    		<li class="parent">
			<a href="javascript:;" onclick="return false;">Columns</a>
			<ul>

                <li><a href="#" data-param='id="" container_class="" bg_color="white , grey , default" bg_image="" badge_title="Title" class="jx-rebuild-padding , jx-rebuild-padding-medium" bg_left_shape="no , yes" bg_right_shape="no , yes"' data-tag='container' data-all="" data-text="Messages text">Container</a></li>
                
                
				<li><a href="#" data-all='[one_eight]One Half Column[/one_eight]<br/>[one_eight]One Half Column[/one_eight]'>1/2 , 1/2</a></li>
                <li><a href="#" data-all='[one_third]One Third Column[/one_third]<br/>[one_third]One Third Column[/one_third]</br>[one_third]One Third Column[/one_third]'>1/3 , 1/3 , 1/3</a></li>
				<li><a href="#" data-all='[one_fourth]One fourth[/one_fourth]<br/>[one_fourth]One fourth[/one_fourth]<br/>[one_fourth]One fourth[/one_fourth]<br/>[one_fourth]One fourth[/one_fourth]'>1/4, 1/4, 1/4, 1/4</a></li>          
                <li><a href="#" data-all='[two_thirds]Two thirds[/two_thirds]</br>[one_six]One Six[/one_six]'>2/3, 1/6</a></li>
                <li><a href="#" data-all='[three_fourths]Three fourths[/three_fourths]<br/>[one_fourth]One fourth[/one_fourth]'>3/4, 1/4</a></li>
                <li><a href="#" data-all='[one_fourth]One fourth[/one_fourth]</br>[one_six]One Six[/one_six]</br>[one_six]One Six[/one_six]'>1/4, 1/6 , 1/6</a></li>
                <li><a href="#" data-all='[one_five]One Five[/one_five]</br>[one_eleven]One Eleven[/one_eleven]'>1/5, 1/11</a></li>
			</ul>	
		</li>
    
        <li><a href="#" data-all='[partners_logo post_count="6"][/partners_logo]'>Partners Logo</a></li>
        
         <li><a href="#" data-param='image="http://rebuild.janxcode.com/wp-content/uploads/2015/10/stock-1.jpg"' data-tag='image_placeholder' data-all="" data-text="Messages text">Image Placeholder</a></li> 
        
        
        
        <li><a href="#" data-all='[section_title type="1 , 2 , 3 , 4" color_style="light , dark" bracket_title="" title="Your Title" sub_title=""][/section_title]'>Section Title</a></li>
        
        <li><a href="#" data-all='[buttons type="1 , 2" button_text="Read All" url="#1"][/buttons]'>Buttons</a></li>
        
        <li><a href="#" data-all='[lists_group type="1 , 2" list_style="circle-light , circle-dark , square-light , square-dark , border-square-light , border-square-dark" color_tyle="dark , light"]</br>[lists title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit."][/lists]</br>[/lists_group]'>Lists</a></li>
        
        <li><a href="#" data-all='[subscribe title="Subscribe To Newsletter" sub_title="GET Free Quote" number="800 8080 1876"][/subscribe]'>Subscribe</a></li>

        <li><a href="#" data-all='[testimonials type="1 , 2" post_count="4"][/testimonials]'>Testimonials</a></li>
        
        
        <li><a href="#" data-all='[project_progress post_count="" category=""][/project_progress]'>Project Progress</a></li>
        
        <li><a href="#" data-all='[blog_group]</br>[blog][/blog]</br>[/blog_group]'>Blog</a></li>
        
        <li><a href="#" data-all='[counter_up_group color_style="light , dark" style="styleA , styleB "]<br/>[counter_up type="1 , 2" count_up="3,400" count_up_text="Developers"][/counter_up]<br/>[/counter_up_group]'>Counter Up</a></li>  
        
        <li><a href="#" data-all='[service_box_group color_style="light , dark"]<br/>[service_box type="1 , 2 , 3" icon="icon-paper-plane" image="http://rebuild.janxcode.com/wp-content/uploads/2015/10/stock-small-2.jpg" title="PREMIUM SLIDERS" readmore="#readmore"]Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque[/service_box]<br/>[/service_box_group]' data-tag='service_box' data-all="" data-text="Messages text">Service Box</a></li>        
        
        <li><a href="#" data-all='[tag_box type="1 , 2 , 3" title="We are Here to Hear" subtitle="LETS GO BEHIND THE FUTURE WITH BUXCORP" button_text="LEARN MORE" button_link="#1"][/tag_box]'>Tag Box</a></li>
        
        <li><a href="#" data-all='[portfolio_group]<br/>[portfolio_tab_group]<br/>[portfolio_tab title="1 Day"][/portfolio_tab]<br/>[/portfolio_tab_group]<br>[portfolio]</br>[portfolio_image_group]<br/>[portfolio_image title="lorem Ipsum" sub_title="Abstract" image="http://janxcode.com/rebuild/images/protfolio_1.jpg" width="default , grid-item-width2" height="default , grid-item-height2"][/portfolio_image]<br/>[/portfolio_image_group]<br/>[/portfolio]<br/>[/portfolio_group]'>Portfolio</a></li>
        
        <li><a href="#" data-all='[tabs_group]</br>[tabs]</br>[tabs_title title="VOLGRAISUM"][/tabs_title]</br>[/tabs]</br>[tabs_content description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum enim vel risus euismod, id condimentum neque cursus. Nunc quis semper velit, ut dapibus risus. Pellentesque vulputate lectus pellentesque ligula pretium, vitae cursus purus molestie. Sed placerat elementum eros, et vulputate tortor tincidunt ut. Nullam ac"][/tabs_content]</br>[/tabs_group]'>Tabs</a></li>
        
        <li><a href="#" data-all='[accordion_group type="1 , 2 , 3 , 4"]</br>[accordion title="Lorem ipsum dolor sit amet, consectetur" description="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo."][/accordion]</br>[/accordion_group]'>Accordion</a></li>


        <li><a href="#" data-all='[process_group type="1 , 2" title="Work Process"]</br>[process step="1" title="Lorem Ipsum Vetus" description="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore"][/process]</br>[/process_group]'>Process</a></li>
                
                
        <li><a href="#" data-all='[progress_group title="Who WE ARE" description="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes."]</br>[progress title="HTML" percent_number="60"][/progress]</br>[/progress_group]'>Progress</a></li>      
        
         <li><a href="#" data-all='[map title="VENUE" description="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. montes" place_name="MAriot Hotel, Browadway" address_a="339 Marina Street, New York, NY 10001" address_b="1 987 586-45432" address_c="4.9 mi / 7.9 km from Downtown"][/map]'>Maps</a></li> 

        <li><a href="#" data-all='[contact_us email""][/contact_us]'>Contact Us Form</a></li>
        <li><a href="#" data-all='[contact_details][/contact_details]'>Contact Details</a></li>
        
        
        <li><a href="#" data-all='[request_quote_form][/request_quote_form]'>Request Quote Form</a></li>

        <li><a href="#" data-all='[teammember post_count="4"][/teammember]'>Teammember</a></li>
        
        
        <li><a href="#" data-all='[price_table_group]</br>[price_table title="STARTER" currency_type="$" price="50" after_dot_price="99" text_a="External" sub_text_a="Storage" text_b="Unlimited" sub_text_b="Service Center" text_c="Professional" sub_text_c="Web Hosting" text_d="Unlimited" sub_text_d="Bandwidth" price_button="Sign Now"][/price_table]</br>[/price_table_group]'>Price Table</a></li>
        
        <li><a href="#" data-all='[table]</br>[tr]</br>[td]Your Text[/td]</br>[/tr]</br>[/table]'>Table</a></li>

        <li><a href="#" data-all='[blockquote type="1 , 2 , 3 , 4" author_name="Admin"]Your Text[/blockquote]'>Blockquote</a></li>

        <li><a href="#" data-all='[dropcaps color_style="dark , light" style="square , circle"]A[/dropcaps]'>Dropcaps</a></li>
        
        <li><a href="#" data-all='[mark color_style="dark , green , yellow , orange"]Your Text[/mark]'>Mark</a></li>

	</ul>
</div>
</div>

<?php 
}
add_action('admin_head', 'add_shortcode_menu');

?>