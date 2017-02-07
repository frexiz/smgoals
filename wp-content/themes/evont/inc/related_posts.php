    <!-- BDF Related Post -->
    <div class="jx-evont-related-blog jx-evont-post-block clearfix mt40 mt60 heading-hr">
      
    <?php  
        $orig_post = $post;  
        global $post; 
		$evont_data =  evont_globals();  
        $tags = wp_get_post_tags($post->ID);  
        
		$post_count =3; 
			  
		?>
        
		<?php
        $tag_ids = array();  
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
        $args=array(  
        'tag__in' => $tag_ids,  
        'post__not_in' => array($post->ID),  
        'posts_per_page'=>$post_count, // Number of related posts to display.  
        'ignore_sticky_posts'=>1  
        );
		
		$my_query = new wp_query( $args );  
      	$i=0;
		$alpha_class='';
		if( $my_query->have_posts() ) {?>
        
        <div class="jx-evont-blog-title-4">
        <div class="jx-evont-title jx-evont-uppercase small-text"><?php echo esc_html_e('Related Posts','evont'); ?></div>
        </div>        
        <div class="row"></div>
		
        <?php
        while( $my_query->have_posts() ) {  
        $my_query->the_post(); 
		
		$image_size='evont_small-blog';
							 
        ?>  
                <div class="col-sm-3 col-md-4 jx-evont-related-blog-item">
                
                    <div class="jx-evont-related-image">
                        <div class="jx-evont-image-holder">
            
                            <div class="flexslider">
                                <ul class="slides">
                                
                                    <?php  if(get_post_meta( get_the_ID(), 'evont_video_code', true )): // Video Post ?>
                                        <li>
                                            <div class="jx-evont-blog-image jx-evont-image-wrapper">
                                            <div class="full-video">
                                                <div class="full-widthvideo">
                                                <?php 
                                                    global $wp_embed;
                                                    
                                                    $post_embed = $wp_embed->run_shortcode('[embed height="330"]'.get_post_meta(get_the_ID(), 'evont_video_code', true).'[/embed]');															
                                                    echo $post_embed;
                                                 ?>
                                                                                                                
                                                </div><!-- EOF full-widthvideo-->
                                            </div><!-- EOF full-video-->
        
                                            </div>
                                        </li>
                                   <?php endif;?>                                     
                                   <?php if(has_post_thumbnail()): // Start of featuered image ?>
                                  
                                         <li>
                                            <div class="jx-evont-blog-image jx-evont-image-wrapper">
                                         <?php 
                                            $post_image_id = get_post_thumbnail_id(get_the_id());
                                            $image_url = wp_get_attachment_image_src($post_image_id, 'large');
                                            $image_small = wp_get_attachment_image_src($post_image_id, $image_size);
                                            $image_data = wp_get_attachment_metadata($post_image_id);
                                              the_post_thumbnail($image_size); ?>
                                              
                                             </div>
                                        </li> 
                                   
                                   <?php endif;?>                                     
                                   <?php if(kd_mfi_get_featured_image_id('featured-image-2', 'post')): ?>
                                   <?php
                                                                            
                                        $i = 2;
                                        while($i <= $evont_data['text_slideshow_count'] ):
                                        $attachment_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                        
                                        echo'<li><div class="jx-evont-blog-image jx-evont-image-wrapper">';
                                        
                                        if($attachment_id):
                                        $image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                        $image_small = wp_get_attachment_image_src($attachment_id, $image_size);
                                        $image_data = wp_get_attachment_metadata($attachment_id);
                                       // the_post_thumbnail($image_size);
                                        ?>									
                                    
                                        <img src="<?php echo esc_url($image_small[0]); ?>" alt="<?php echo esc_attr($image_data['image_meta']['title']); ?>" />									
                                            
                                    <?php
                                        echo'</div></li>';
                                    
                                        endif; $i++;
                                    endwhile;
                                        
                                    ?>
                                    
                                    
                                   <?php endif; // End of slideshow ?> 
                                 
                                </ul>
                            </div>
            
                        </div>
                        <!-- EOF Blog Image -->
                    </div>
                    
                    <div class="jx-evont-related-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></div>
                    <div class="jx-bottom-border"></div>
                    <div class="jx-evont-related-date"><?php the_time(get_option('date_format')); ?></div>
                
                </div>
                <!-- Item 01 -->
          
        <?php 
		$i++;
		}  
        
		}  
        $post = $orig_post;  
        wp_reset_postdata();  
        ?>  
    
    </div>