<?php 
	/* Newsletter  ---------------------------------------------*/
	
	add_shortcode('newsletter', 'evont_newsletter');
	
	function evont_newsletter($atts, $content = null) { 
		extract(shortcode_atts(array(
			'title' => 'GET UPDATES.',
			'subtitle' => 'Learn More About Evont',		
			'button' => 'SUBSCRIBE'
			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		

			$out  ='
				<!--/get updates start here-->
				
				<div class="jx-evont-get-updates">
				  <div class="col-md-offset-2 col-md-8">
					<div class="row">
					  <div class="col-md-12">
						<h2>'.$title.'</h2>
					  </div>
					</div>
					<div class="row">
					<div class="ajax-loader"></div>
					<div id="mailchimp-sign-up">
					<p></p>
					</div>
					<form action="#" method="post" id="mailchimp" name="mc-embedded-subscribe-form" target="_blank" novalidate> 
					  <div class="col-sm-10 less_right">
					  <input class="form-control" type="email" name="email" placeholder="'.esc_html__('Type Your Email','evont').'" value="" data-validation="email" data-validation="required" id="mce-EMAIL"/>
					  </div>
					  <div class="col-sm-2 less_left">
						<input class="btn btn-default btn-block" type="submit" name="subscribe" value="'.esc_html__(''.$button.'','rebuild').'" id="mc-embedded-subscribe"/>
					  </div>
					  </form>
					</div>
				  </div>
				</div>
				
				<!--/get updates end here-->
			'; 
			
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_newsletter' );
	
	
	function vc_newsletter() {	
		vc_map(array(
		  "name" => esc_html__( "Newsletter", "evont" ),
		  "base" => "newsletter",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_newsletter.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Title','evont'),
		  "params" => array(
					 
					
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title", "evont" ),
				"param_name" => "title",
				"value" => "GET UPDATES",
				"description" => esc_html__( "Type Title here", "evont" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Subtitle", "evont" ),
				"param_name" => "subtitle",
				"value" => "Learn More About Evont",
				"description" => esc_html__( "Type SubTitle here", "evont" )
			 ),
			 
			 
			  array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "Button Text", "evont" ),
				"param_name" => "button",
				"value" => "SUBSCRIBE",
				"description" => esc_html__( "Type Button Text here", "evont" )
			 )			 
		  )
	   ));
    
	}
?>