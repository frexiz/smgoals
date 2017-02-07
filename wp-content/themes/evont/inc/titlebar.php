<?php 
$evont_data =  evont_globals();
	$title_bg='';
	$bg_image_class='';
	$header_5_titlebar_class=''; 
	$fullheight_class='';
	
	global $post;
	
	if (get_post_meta(get_the_ID(),'jx_evont_titlebar_bg_color', true)!=''):
		$title_bg='background-color:'.get_post_meta(get_the_ID(),'jx_evont_titlebar_bg_color', true).';';
	else:
		$title_bg='';
	endif;
	
		
	if (get_post_meta(get_the_ID(),'jx_evont_tint', true)):
		$tint_class='jx-evont-tint';
	else:
		$tint_class='';
	endif;
		
	if (rwmb_meta( 'jx_evont_bg_image', 'type=image_advanced' )):
	$images = rwmb_meta( 'jx_evont_bg_image', 'type=image_advanced' );
					
	foreach ( $images as $image ){
		$images_url=$image['full_url'];
		if($images_url):
			$bg_pos=get_post_meta(get_the_ID(),'jx_evont_titlebar_bg_pos', true);
			
			$bg_image_class='background-image:url('.esc_url($images_url).'); background-position:'.$bg_pos.'';
		endif;
	}
	
	elseif($evont_data['header_bg_image']):
	
		$bg_image_class='background:url('.esc_url($evont_data['header_bg_image']).'); background-position:'.esc_attr($evont_data['header_bg_image_pos']).'';
	
	endif;
	
	$title_bg='style="'.$title_bg.''.$bg_image_class.'"';

					
	if((get_post_meta( get_the_ID(), 'jx_evont_title_bar', true )) and (get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) !='select_title_bar') and (!is_search())):?>
			
            
			<?php if(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'featuredimage'): ?>
                 <!-- BOF Titlebar -->
                <div class="jx-evont-titlebar jx-evont-double-height <?php echo esc_attr($tint_class); ?>" <?php echo $title_bg; ?>> 
                	<?php 
					$post_thumbnail_id = get_post_thumbnail_id();
                    $post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id,'full', true);
					?>
                    
                    <div class="parallax bg-pos-middle jx-evont-tint-black-light" data-velocity="-0.3"  style="background-image:url('<?php echo $post_thumbnail_url[0]; ?>');"></div>  
                    <!-- Background -->
                    <div class="container">
                        <div class="sixteen columns alpha">
                        <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                            <div class="jx-evont-breadcrumb"><?php evont_breadcrumbs(); ?></div>
                        <?php endif;?>    
                            <div class="jx-evont-page-title"><a href="<?php esc_url(home_url('/')); ?>"><?php esc_html_e('Home','evont'); ?></a><span><?php single_post_title(); ?></span></div>
                        </div>          
                    </div>                 
                </div>    
                <!-- EOF Titlebar -->
             <?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'count-down'): ?>
			 
             
             
             	<?php 
					$count_to='';
					
					$explode_date=explode(' ',$evont_data['info_event_date']);
					
					
					if (get_post_meta( get_the_ID(), 'jx_evont_full_height', true)):
						$fullheight_class='jx-evont-parallax-fullwidth';
					else:
						$fullheight_class='';
					endif;
					
					if (get_post_meta( get_the_ID(), 'jx_evont_counter_up', true)):
						$count_to = 'count';
					else:
						$count_to = '';
					endif;
					
				?>
             
             	<div class="jx-evont-common_page_header  <?php echo esc_attr($fullheight_class); ?> jx-evont-middle jx-home-slider  <?php echo esc_attr($tint_class); ?>"  <?php echo $title_bg; ?>>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 main-content-slider">
                          <div class="slider-date">
                              <div class="jx-big-date  <?php echo $count_to; ?>">
							  	<div class="jx-evont-shadow"></div>
							  <span><?php echo esc_attr($explode_date[0]);?></span>
                              </div>
                              <div class="jx-month-small">
                                  <div class="slider-month"><?php echo esc_attr($explode_date[1]);?></div>
                                  <div class="slider-year">' <?php echo esc_attr(substr($explode_date[2], -2));?></div>
                                  <div class="event-title"><?php echo esc_attr($evont_data['info_event_title']);  ?></div>
                                  <div class="event-ticket-btn"><a href='<?php echo esc_url($evont_data['info_event_ticket_link']); ?>' ><?php esc_html_e($evont_data['info_event_ticket_button'],'evont'); ?></a></div>
                                  <div class="clearfix"></div>
                              </div>
                          </div>
                          <div class="jx-evont-counter-title">
                              <div class="jx_evont_countdown styled" data-time="<?php echo esc_attr($evont_data['info_event_countdown_date']); ?>">
                                
                                    <div class="dsb-theme-wrapper countdown">
                                        <div class="dsb-theme">
                                            <div class="counter-wrapper">
                                                <ul>
                                                    <li>
                                                        <div class="days count">00</div>
                                                        <div class="textDays count-text"><?php esc_html_e('Days','evont'); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="hours count">00</div>
                                                        <div class="textHours count-text"><?php esc_html_e('Hours','evont'); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="minutes count">00</div>
                                                        <div class="textmins count-text"><?php esc_html_e('Mins','evont'); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="seconds count">00</div>
                                                        <div class="textSecs count-text"><?php esc_html_e('Secs','evont'); ?></div>
                                                    </li>
                                                </ul>
                                                <div class="jC-clear"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                
                                </div> 
                                                        </div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
             <?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'count-down-2'): ?>
			 
             
             
             	<?php 
				
					$explode_date=explode(' ',esc_attr($evont_data['info_event_date']));
					
					
					if (get_post_meta( get_the_ID(), 'jx_evont_full_height', true)):
						$fullheight_class='jx-evont-parallax-fullwidth';
					else:
						$fullheight_class='';
					endif;
					
					
				?>
             
             	<div class="jx-evont-common_page_header jx-evont-count-days  <?php echo esc_attr($fullheight_class); ?> jx-evont-middle jx-home-slider  <?php echo esc_attr($tint_class); ?>"  <?php echo $title_bg; ?>>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 main-content-slider">
                          <div class="slider-date">
                          	
                            <div class="jx-event-date">
							    <div class="day"><?php echo esc_attr($explode_date[0]);?></div>


                                <div class="slider-month"><?php echo esc_attr($explode_date[1]);?> '<?php echo esc_attr($explode_date[2]);?></div>
                              </div>                             
                          	<div class="jx-event-content">
                                  <div class="event-title"><?php echo esc_attr($evont_data['info_event_title']);  ?></div>
                                  <div class="event-ticket-btn"><a href='<?php echo esc_url($evont_data['info_event_ticket_link']); ?>' ><?php esc_html_e('Buy Ticket','evont'); ?></a></div>
                                  <div class="clearfix"></div>
                              </div>
                            
                             
                              
                          </div>
                          
                        </div>
                       
                      </div>
                    </div>
                  </div>
             				
             
			 <?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'no-titlebar'): ?>
             
             	 <!-- BOF Titlebar -->                
                <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                <!--/ start .breadcrumb-->
                <div class="beadcrumb_area">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="jx-evont-breadcrumb">
						
						<?php evont_breadcrumbs(); ?>
                        
                        
                        </div>                        
                      </div>
                      <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!--/ end .breadcrumb-->
                
                
                <div class="jx-evont-page-title">
					<div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="jx-evont-pagetitle"><h1>[<?php echo single_post_title();?>]</h1></div>                        
                          </div>
                          <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row-1 -->
                  </div>
				</div>
				<?php endif; ?>
                <!-- EOF Titlebar -->
                
                
                
             <?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'google-map'): ?>
			 
                 <div class="jx-evont-event-search">
                    <div class="search-form">
                        <form role="search" method="get" class="has-validation-callback" action="<?php esc_url( home_url('/') );?>">
                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                        <input class="search-field" placeholder="Search Event" value="" name="s" title="Search for:" type="search">
                        <input class="search-submit" value="Go" type="submit">
                        </form>                
                    </div>            
                </div>
             
              <div id="map-event" class="evont-title-bar-map xgmap"></div>
             
             <?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'titlebar'): ?>
                 <!-- BOF Titlebar -->
               
                <!--start common page header-->
                <div class="jx-evont-common_page_header jx-evont-hero-title <?php echo esc_attr($tint_class); ?>"  <?php echo $title_bg; ?>>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6">
                          <h2><?php echo esc_attr($evont_data['info_event_date']); ?></h2>
                          <h3><?php echo esc_attr($evont_data['info_event_title']); ?></h3>                          
                        </div>
                        <div class="col-lg-6">
                        	<div class="jx_evont_countdown styled" data-time="<?php echo esc_attr($evont_data['info_event_date']); ?>">
                            
                            	<div class="dsb-theme-wrapper countdown">
                                    <div class="dsb-theme">
                                        <div class="counter-wrapper">
                                            <ul>
                                                <li>
                                                    <div class="days count">00</div>
                                                    <div class="textDays count-text"><?php esc_html_e('Days','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="hours count">00</div>
                                                    <div class="textHours count-text"><?php esc_html_e('Hours','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="minutes count">00</div>
                                                    <div class="textmins count-text"><?php esc_html_e('Mins','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="seconds count">00</div>
                                                    <div class="textSecs count-text"><?php esc_html_e('Secs','evont'); ?></div>
                                                </li>
                                            </ul>
                                            <div class="jC-clear"></div>
                                        </div>
                                        
                                    </div>
                            	</div>
                            
                            </div>
                        </div>  
                      </div>
                    </div>
                  </div>              
                
                <!--end common page header-->
                
                <!--/ start .breadcrumb-->
                <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                <div class="beadcrumb_area">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="jx-evont-breadcrumb">						
						<?php evont_breadcrumbs(); ?> 
                        </div>                        
                      </div>
                      <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!--/ end .breadcrumb-->
                <?php endif; ?>

                <!-- EOF Titlebar -->
                			
			<?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'revolutionslider'): ?>
                
                <!-- BOF Slider -->
                <div class="jx-evont-slider">        
                    <div class="jx-evont-rev-slider-holder">
                            <?php if(class_exists('RevSlider')){                                 
                                 if(get_post_meta( get_the_ID(), 'jx_evont_revolutionslider', true )):
								 	putRevSlider(get_post_meta( get_the_ID(), 'jx_evont_revolutionslider', true ));
                             	 endif;
                             } ?>
                        </div>                 
                </div>    
                <!-- BOF Slider -->
                
            <?php elseif(get_post_meta( get_the_ID(), 'jx_evont_title_bar', true ) == 'no-titlebar'): ?>
                 <!-- BOF Titlebar -->    
                
            <?php endif; ?>
        <?php elseif (is_page_template('template-fullwidth-notitle.php')):?>
				
                
           <!-- BOF Titlebar -->
               
                <!--start common page header-->
                <div class="jx-evont-common_page_header jx-evont-hero-title jx-evont-tint"  <?php echo $title_bg; ?>>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 ">
                          <h2><?php echo esc_attr($evont_data['info_event_date']); ?></h2>
                          <h3><?php echo esc_attr($evont_data['info_event_title']); ?></h3>                          
                        </div>
                        <div class="col-lg-6">
                        	<div class="jx_evont_countdown styled" data-time="<?php echo esc_attr($evont_data['info_event_date']); ?>">
                            
                            	<div class="dsb-theme-wrapper countdown">
                                    <div class="dsb-theme">
                                        <div class="counter-wrapper">
                                            <ul>
                                                <li>
                                                    <div class="days count">00</div>
                                                    <div class="textDays count-text"><?php esc_html_e('Days','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="hours count">00</div>
                                                    <div class="textHours count-text"><?php esc_html_e('Hours','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="minutes count">00</div>
                                                    <div class="textmins count-text"><?php esc_html_e('Mins','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="seconds count">00</div>
                                                    <div class="textSecs count-text"><?php esc_html_e('Secs','evont'); ?></div>
                                                </li>
                                            </ul>
                                            <div class="jC-clear"></div>
                                        </div>
                                        
                                    </div>
                            	</div>
                            
                            </div>
                        </div>  
                      </div>
                    </div>
                  </div>              
                
                <!--end common page header-->
                
                
                <!--/ start .breadcrumb-->
                <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                <div class="beadcrumb_area">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="jx-evont-breadcrumb">						
						<?php evont_breadcrumbs(); ?>
                        </div>                        
                      </div>
                      <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!--/ end .breadcrumb-->
                <?php endif; ?>
                                

                <!-- EOF Titlebar -->        
	
		<?php elseif (is_home() or  is_front_page() or is_single()or is_archive() or is_search() or is_404() or (class_exists( 'WooCommerce' ) && is_shop()) or (($evont_data['header_bg_image']!='') and (get_post_meta( get_the_ID(), 'jx_evont_title_bar', true )== 'select_title_bar'))):?>
				
                <?php 
			   
			   	if(is_singular( 'events' )): ?>
				
				
					<!--start common page header-->
                <div class="jx-evont-common_page_header jx-evont-hero-title <?php echo esc_attr($tint_class); ?>"  <?php echo $title_bg; ?>>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6">
                          <h2><?php echo get_post_meta(get_the_id(),'evont_event_date',true); ?></h2>
                          <h3><?php  the_title(); ?></h3>                          
                        </div>
                        <div class="col-lg-6">
                        	<div class="jx_evont_countdown styled" data-time="<?php echo get_post_meta(get_the_id(),'evont_event_countdown_date',true); ?>">
                            
                            	<div class="dsb-theme-wrapper countdown">
                                    <div class="dsb-theme">
                                        <div class="counter-wrapper">
                                            <ul>
                                                <li>
                                                    <div class="days count">00</div>
                                                    <div class="textDays count-text"><?php esc_html_e('Days','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="hours count">00</div>
                                                    <div class="textHours count-text"><?php esc_html_e('Hours','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="minutes count">00</div>
                                                    <div class="textmins count-text"><?php esc_html_e('Mins','evont'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="seconds count">00</div>
                                                    <div class="textSecs count-text"><?php esc_html_e('Secs','evont'); ?></div>
                                                </li>
                                            </ul>
                                            <div class="jC-clear"></div>
                                        </div>
                                        
                                    </div>
                            	</div>
                            
                            </div>
                        </div>  
                      </div>
                    </div>
                  </div>              
                
                <!--end common page header-->
                <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                <!--/ start .breadcrumb-->
                <div class="beadcrumb_area">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="jx-evont-breadcrumb">						
						<?php evont_breadcrumbs(); ?>                        
                        </div>                        
                      </div>
                      <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!--/ end .breadcrumb-->
                <?php endif; ?>

                <!-- EOF Titlebar -->
				
			<?php	
				endif;
			   
			   ?>
                
                
           <!-- BOF Titlebar -->
               	
               <?php if($evont_data['select_header_titlebar']=='countdown'): ?>
                    
                    <!--start common page header-->
                    <div class="jx-evont-common_page_header jx-evont-hero-title"  <?php echo $title_bg; ?>>
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-6 ">
                              <h2><?php echo esc_attr($evont_data['info_event_date']); ?></h2>
                              <h3><?php echo esc_attr($evont_data['info_event_title']); ?></h3>                          
                            </div>
                            <div class="col-lg-6">
                                <div class="jx_evont_countdown styled" data-time="<?php echo esc_attr($evont_data['info_event_date']); ?>">
                                
                                    <div class="dsb-theme-wrapper countdown">
                                        <div class="dsb-theme">
                                            <div class="counter-wrapper">
                                                <ul>
                                                    <li>
                                                        <div class="days count">00</div>
                                                        <div class="textDays count-text"><?php esc_html_e('Days','evont'); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="hours count">00</div>
                                                        <div class="textHours count-text"><?php esc_html_e('Hours','evont'); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="minutes count">00</div>
                                                        <div class="textmins count-text"><?php esc_html_e('Mins','evont'); ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="seconds count">00</div>
                                                        <div class="textSecs count-text"><?php esc_html_e('Secs','evont'); ?></div>
                                                    </li>
                                                </ul>
                                                <div class="jC-clear"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                
                                </div>
                            </div>  
                          </div>
                        </div>
                      </div> 
                    <!--end common page header-->
                    
                     <!--/ start .breadcrumb-->
                
                    <div class="beadcrumb_area">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="jx-evont-breadcrumb">                            
                            <?php evont_breadcrumbs(); ?>                            
                            </div>                        
                          </div>
                          <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!--/ end .breadcrumb-->
                    
                        
                    <?php if ( class_exists( 'WooCommerce' ) && is_shop() ) :?>
                        <div class="jx-evont-page-title">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="jx-evont-pagetitle"><h1>[							
                                <?php 				
                                    echo evont_short_breadcrumbs();
                                ?>
                               ]</h1></div>                        
                              </div>
                              <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row-2 -->
                      </div>
                    </div>
                    <?php elseif ( !is_single() ) :?>
                        <div class="jx-evont-page-title">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="jx-evont-pagetitle"><h1>[							
                                <?php 				
                                    if(is_404()):
                                        esc_html_e('404','evont');
                                    else:
                                        echo single_post_title();
                                    endif;
                                ?>
                               ]</h1></div>                        
                              </div>
                              <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row-3 -->
                      </div>
                    </div>
                    <?php endif; ?>
                
                <?php elseif($evont_data['select_header_titlebar']=='default'):?>
                
                <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>	
                	<!--/ start .breadcrumb-->
                		<div class="beadcrumb_area">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="jx-evont-breadcrumb">						
						<?php evont_breadcrumbs(); ?>                        
                        </div>                        
                      </div>
                      <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                	<!--/ end .breadcrumb-->                
                <?php endif; ?>
                
                	<?php if(!is_singular( 'events' )): ?>
                
                    <div class="jx-evont-page-title">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="jx-evont-pagetitle"><h1>[<?php echo single_post_title();?>]</h1></div>                        
                              </div>
                              <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row-4 -->
                      </div>
                    </div>
				 <?php endif; ?>
                
                <?php else:?>
                
                	<!--/ start .breadcrumb-->
                    <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                		<div class="beadcrumb_area">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="jx-evont-breadcrumb">                                
                                <?php evont_breadcrumbs(); ?>                                
                                </div>                        
                              </div>
                              <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                          </div>
                        </div>
                            <!--/ end .breadcrumb-->                
                 <?php endif; ?>
                    <div class="jx-evont-page-title">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="jx-evont-pagetitle"><h1>[<?php echo single_post_title();?>]</h1></div>                        
                              </div>
                              <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row-5 -->
                      </div>
                    </div>


				<?php endif; ?>
                
                

                <!-- EOF Titlebar -->
                
        
		<?php else:?>
		
        <!-- BOF Titlebar -->                
                
                <!--/ start .breadcrumb-->
                <?php if(get_post_meta(get_the_ID(),'jx_evont_breadcrumbs',true)): ?>
                <div class="beadcrumb_area">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="jx-evont-breadcrumb">						
						<?php evont_breadcrumbs(); ?>
                        </div>                        
                      </div>
                      <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!--/ end .breadcrumb-->
                <?php endif; ?>
                
                
                <div class="jx-evont-page-title">
					<div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="jx-evont-pagetitle"><h1>[<?php echo single_post_title();?>]</h1></div>                        
                          </div>
                          <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row-6 -->
                  </div>
				</div>

                <!-- EOF Titlebar -->
        
		<?php endif; ?>
		
 </div>       