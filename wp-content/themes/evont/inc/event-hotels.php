<?php 
	global $evont_data;
?>            

        <div class="jx-venue-1">		
            
        <div class="jx-evont-event-title">
             <div class="jx-evont-title"><?php esc_html_e('HOTELS','evont'); ?></div>
        </div>
            
		<?php
		$i = "0";

		$count ="3";
		$args = array('post_type' => 'hotels','orderby' => 'date', 'order' => 'ASC','showposts' => $count); 		
		
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
		//function code        
 
 
 
 
        ?>
            
            <div class="col-sm-4">
            	
				<div class="jx-venue-item">

					<div class="image-hover">
						<div class="image"><?php echo get_the_post_thumbnail(get_the_ID(),'evont-small-blog'); ?></div>
						<!-- Image -->
						
						<div class="title"><a href="<?php esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></div>
						<!-- Title -->
					</div>					

					<!-- Image - Hover -->					

					<div class="detail-list">
						<ul>
							<li><i class="fa fa-check-circle-o"></i> Wifi</li>
							<li><i class="fa fa-check-circle-o"></i> Family Rooms</li>
							<li><i class="fa fa-check-circle-o"></i> Smoking Rooms</li>
						</ul>
					</div>
					<!-- Details -->
					
					<div class="average">
						<span class="average-title">Average Price Per Night</span>
						<span class="price">$83</span>
					</div>			
					<!-- Average Price -->
				</div>
			</div>
				
        
        <?php			
            $i++;
                
            endwhile;
            wp_reset_query(); 
        
        ?>
		
    </div>
    
<!-- HOTELS end here--> 
<div class="space30"></div>
<div class="space30"></div>