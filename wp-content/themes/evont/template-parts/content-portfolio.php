<?php 
	// Portfolio Grid Content
?>
		    
    <div id="post-<?php the_ID(); ?>" <?php post_class('jx-evont-portfolio-grid'); ?>>
       <div class="jx-evont-protfolio">       
           
    
           
           <div class="jx-evont-portfolio-grid">			
			   <?php
               
               $i=0;
                
                $args = array('post_type' => 'portfolio','orderby' => 'date', 'order' => 'ASC','showposts' => 13 ); 
                $loop = new WP_Query( $args ); 		
                while ( $loop->have_posts() ) : $loop->the_post();  
                
                    //Get Portfolio Categories			
                    
                    $terms_string = '';
                    $terms = get_the_terms(get_the_ID(), 'portfolio-categories'); 				 
                      
                    //build up comma delimited string 
                    if ($terms):
                        foreach($terms as $t){ 
                            $terms_string .= $t->slug . ' '; 
                        } 
                    endif;
                    
                    $post_thumbnail_id = get_post_thumbnail_id();
                    $post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id,'large', true);
                    
                    if(get_post_meta(get_the_ID(),'evont_project_photos',false )):
                        
                        $image_url 	= 	wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');					
                        $image_path	=	get_post_meta(get_the_ID(),'evont_project_photos',false );					
                        $images 	= 	rwmb_meta( 'evont_project_photos', 'type=image_advanced' );
                        
                        foreach ( $images as $image ){
                            $images_url=$image['full_url'];
                        }	
                    endif;
                    
                    if($i < 5):
                        $set_img_class='grid-item-width2 grid-item-height2';
                        $imagesize='port-1';
                    else:
                        $set_img_class='';
                        $imagesize='port-2';
                    endif;
                    
                    ?>
                    
                        <div class="grid-item <?php echo esc_attr(set_img_class); ?> jx-evont-image-wrapper <?php echo esc_attr($terms_string); ?> all">
                            <?php the_post_thumbnail(get_the_ID(),$imagesize); ?>
                            <div class="jx-evont-portfolio-hoverlayer"></div>
                            
                                <div class="jx-evont-portfolio-hover">
                                   
                                    <div class="jx-evont-portfolio-top-hover">
                                       <div class="jx-evont-title jx-evont-uppercase"><?php the_title(); ?></div>                                                
                                    </div>
                                    <!-- Top Hover Title -->                                            
                                    
                                    <div class="jx-evont-portfolio-plus-hover">
                                        <a href="<?php echo esc_url(the_permalink()); ?>"><div class="jx-evont-portfolio-link"><i class="fa fa-link"></i></div></a>
                                    </div>
                                    <!-- Bottom Hover -->
                                    
                                </div>
                            
                            <!-- EOF Hover -->
                      </div>';
                <?php
                $i++;
                endwhile;
                wp_reset_postdata();
                ?> 
            
		   </div>
           <!-- Content -->
       </div>      
                                      
    </div>
    <!-- EOF Grid Portfolio -->
