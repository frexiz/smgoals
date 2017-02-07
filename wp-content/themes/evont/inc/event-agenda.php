<?php
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
		

?>



		<!--programs section start-->
		
		<div class="programs-section daigram-left">
		
		
		 	<div class="jx-evont-event-title">
	        <div class="jx-evont-title jx-evont-uppercase small-text"><?php esc_html_e('Agenda','evont'); ?></div>
        	</div>
        
			<div class="daigram-right">
		
				  <!-- Nav tabs -->
				
				  <div class="program-panel">
				  
					<div class="row">
					  <div class="col-sm-6 col-sm-offset-3">
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<?php echo $main_tab; ?>				
                        </ul>
                      </div>
                    </div>
                            
                    <div class="space20"></div>
                    
                    <!-- Tab panes -->
                    <div class="col-md-12">
                    
                    <div class="tab-content">


				<?php
                          
							
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
                
                ?>                    
                
                
                
                
            <div role="tabpanel" class="tab-pane <?php echo $active; ?>" id="<?php echo $tab_id ;?>">
						
			<?php
				$n_child_posts = get_pages( array( 'post_type' => 'agenda', 'numberposts' => -1, 'sort_column' => 'menu_order', 'sort_order' => 'ASC', 'child_of' => $p_child->ID, 'parent' => $p_child->ID) );
			
			$agenda_jobposition = get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); 	
			
			foreach( $n_child_posts as $p_child ) {

			?>
            
			<div class="programs_item style-1">
				<div class="row">
				  <div class="col-sm-3 left">
					<div class="time"><?php echo get_post_meta($p_child->ID,'jx_evont_session_time',true); ?></div>
				  </div>
				  <div class="col-sm-3 left">
					<div class="row">
					  <div class="speaker-image"><?php echo get_the_post_thumbnail( $p_child->ID ); ?></div>
					  <div class="speaker-name">
						<div class="name"><?php echo get_the_title( $p_child->ID ); ?></div>
						<div class="des"><?php echo get_post_meta($p_child->ID,'jx_evont_session_icon',true); ?></div>
					  </div>
					</div>
				  </div>
				  <div class="col-sm-6 left">
					<h3><?php echo get_post_meta($p_child->ID,'jx_evont_session_title',true); ?></h3>
					<p><?php echo $p_child->post_content; ?></p>
				  </div>
				</div>
			  </div>

<?php
			}
			//EOF loop item
			?>			
			</div>
			
			<?php
			$m++;
						
			}
			
			//$out .='</div></div>';		

		}

?>




		</div>
        
        			</div>
		
					</div>
				
					<div class="clearfix"></div>
				
				</div>
                
		</div>
        
        <!--programs section end-->