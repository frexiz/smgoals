<?php
	global $evont_data;
			$post_count ="4";
 ?>
			<!--support us start-->
			<div class="jx-evont-partner supportus_area jx-dark">
			
			<div class="jx-evont-event-title">
	       		 <div class="jx-evont-title"><?php esc_html_e('Sponsors','evont'); ?></div>
        	</div>
			
			<ul>	
	
			<?php
			$category_name = "goldcolored";
			if($category_name): 
			$args = array('post_type' => 'partners',
							'tax_query' => array(
								array(
									'taxonomy' => 'partners-category',
									'field' => 'slug',
									'terms' => $category_name,
								)
							),
						  'orderby' => 'menu_order',
						  'order' => 'ASC',
						  'showposts' => $post_count ); 
						  
			else:
			$args = array('post_type' => 'partners',
						  'orderby' => 'menu_order',
						  'order' => 'ASC',
						  'showposts' => $post_count ); 
			endif;
			
			
			
			$loop = new WP_Query( $args ); 		
			
			while ( $loop->have_posts() ) : $loop->the_post();
			
			//function code
		
			$partner_logo_link = get_post_meta(get_the_id(),'jx_evont_partner_link','evont');  
			
			$images = rwmb_meta( 'jx_evont_partner_logo', 'type=image_advanced' );
			foreach ( $images as $image ){
				$images_url=$image['full_url'];
			}	
			
			?>
						
			<li class="item"><a href="<?php echo $partner_logo_link ; ?>" target="_blank"><img src="<?php echo esc_url($images_url); ?>" alt="<?php echo get_the_title(); ?>"> </a></li>
			<?php 
			endwhile;
			wp_reset_query();
			?>
            
			</ul>
            </div>
             <!--support us end-->