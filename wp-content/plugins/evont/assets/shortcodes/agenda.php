<?php 
	/* Exhibition Placeholder Group  ---------------------------------------------*/
	
	add_shortcode('agenda', 'jx_evont_agenda');
	
	function jx_evont_agenda($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$day_1='';
		$tab_width='';
		$tab_id='';
		$tab_classid='';
		$hall_class='';
		$speaker_name='';
		$image='';
		
		global $post;
		
		
		$tab_id='ChildTab-1';
		$tab_classid='childtab_1';

		
		//function code

		$main_tab='';
		$child_tab='';
		$day='';
		$i=1;
		$j=1;
		
		$args = array('post_type' => 'agenda','orderby' => 'menu_order', 'order' => 'ASC','post_parent' => 0 ); 
			
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();				

			$tab_id = 'tab-'.$i;
			
			if ($i==1):
			$active ='class="active"';
			else:
			$active ='';
			endif;
			
			$main_tab .='<li '.$active.' role="presentation"><a href="#'.$tab_id.'" aria-controls="'.$tab_id.'" role="tab" data-toggle="tab">'.get_the_title().'</a></li>'; 				
 			
			$i++;
			
		endwhile;
		wp_reset_query();
		
		
		$out .='		
		<!--programs section start-->
		
		<div class="programs-section daigram-left">
			<div class="daigram-right">
		
				  <!-- Nav tabs -->
				
				  <div class="program-panel">
				  
					<div class="row">
					  <div class="col-sm-6 col-sm-offset-3">
						<ul class="nav nav-tabs nav-justified" role="tablist">';			
		$out .= $main_tab;				
		$out .='</ul>
			  </div>
			</div>
					
			<div class="space20"></div>';		

		$out .='
		<!-- Tab panes -->
		<div class="col-md-12">
		<div class="tab-content">
		';		
	
	
	
		



		$posts = get_pages( array( 'post_type' => 'agenda', 'numberposts' => -1, 'sort_column' => 'menu_order', 'sort_order' => 'ASC', 'child_of' => 0, 'parent' => 0 ) );
		
		if ( $posts ) {
			
			
			$m=1;
			$count=0;
			$active='';		
			
			foreach( $posts as $p_child ) {

			
			$tab_id = 'tab-'.$m;
			
			if ($m==1):
				$active='active';
			else:
				$active='';				
			endif;
			
			$out .='<div role="tabpanel" class="tab-pane '.$active.'" id="'.$tab_id.'">';
						
	
			$n_child_posts = get_pages( array( 'post_type' => 'agenda', 'numberposts' => -1, 'sort_column' => 'menu_order', 'sort_order' => 'ASC', 'child_of' => $p_child->ID, 'parent' => $p_child->ID) );
			
			$agenda_jobposition = get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); 	
			
			foreach( $n_child_posts as $p_child ) {
			
			switch($type){ 
			case '1':
				
			$out .='<div class="programs_item style-1">
				<div class="row">
				  <div class="col-sm-3 left">
					<div class="time">'.get_post_meta($p_child->ID,'jx_evont_session_time',true).'</div>
				  </div>
				  <div class="col-sm-3 left">
					<div class="row">
					  <div class="speaker-image">'.get_the_post_thumbnail( $p_child->ID ,'evont-team').'</div>
					  <div class="speaker-name">
						<div class="name">'.get_the_title( $p_child->ID ).'</div>
						<div class="des">'.get_post_meta($p_child->ID,'jx_evont_session_icon',true).'</div>
					  </div>
					</div>
				  </div>
				  <div class="col-sm-6 left">
					<h3>'.get_post_meta($p_child->ID,'jx_evont_session_title',true).'</h3>
					<p>'.$p_child->post_content.'</p>
				  </div>
				</div>
			  </div>';
			  
			break;
	
			case '2':
		
			$get_time =get_post_meta($p_child->ID,'jx_evont_session_time',true);
		
			$sep_time=explode(":",$get_time);
			
			$sep_text=explode(" ",$sep_time[1]);
			
			$out .='<div class="programs_item style-2">
						<div class="row">					
						
							  <div class="left-side">
							  
									<div class="time">
									<div class="time-hrs">'.$sep_time[0].'</div>
									<div class="time-minutes">
										<div class="time-mns">:'.$sep_text[0].'</div>
										<div class="time-txt">'.$sep_text[1].'</div>
									</div>
									</div>
									<div class="image">'.get_the_post_thumbnail( $p_child->ID ,'evont-team').'</div>
									
									<div class="detail">
										<div class="name">'.get_the_title( $p_child->ID ).'</div>
										<div class="des">'.get_post_meta($p_child->ID,'jx_evont_session_icon',true).'</div>
									</div>
							  </div>
							  
							  
							  <div class="right-side">
									<h3>'.get_post_meta($p_child->ID,'jx_evont_session_title',true).'</h3>
									<p>'.$p_child->post_content.'</p>
							  </div>
								  
					  	</div>
					  </div>';
						  
			break;
			}



									
			}
			//EOF loop item			
			$out .='</div>';
			
			$m++;
						
			}
			
			//$out .='</div></div>';		

		}
		
		$out .='</div></div>';
		
				$out .='</div>
				
				<div class="clearfix"></div>
				
				</div>
				</div>
				
				<!--programs section end-->
				';		
		


				
		//return output
		return $out;
	}
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_evont_agenda' );
	
	
	function vc_evont_agenda() {	
		vc_map(array(
		  "name" => esc_html__( "Agenda", "evont" ),
		  "base" => "agenda",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_agenda.png',
		  "category" => esc_html__( "evont Shortcodes", "evont"),
		  "description" => __('Add Agenda','evont'),
		  "params" => array(
		  
		  			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Style",'evont'),
				 "param_name" => "type",
				 "value" => array(   
					__('Select Style', 'evont') => 'none',
					__('Style A', 'evont') => '1',
					__('Style B', 'evont') => '2'
				
					),
				),
		  
		  
		  )
	   )); 
	}
	


?>