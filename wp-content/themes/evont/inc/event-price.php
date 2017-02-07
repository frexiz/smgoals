<?php 
	//Visual Composer
		global $evont_data;
		
				
		//function code
		?>
		
       	<!--plan section start here-->
        <div class="jx-evont-plan-section">	
            
            
            <div class="jx-evont-event-title">
	       		 <div class="jx-evont-title"><?php esc_html_e('Registration Fees','evont'); ?></div>
        	</div>
            
		<?php
		$i = "0";

		$count ="3";
		$args = array('post_type' => 'price','orderby' => 'date', 'order' => 'ASC','showposts' => $count); 		
		
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
		//function code        
        ?>
        <div class="col-sm-4">

            <?php the_content(); ?>

        </div>
				
        
        <?php			
            $i++;
                
            endwhile;
            wp_reset_query(); 
        
        ?>
		
    </div>
<!--plan section end here--> 

    <div class="space30"></div>
    <div class="space30"></div>