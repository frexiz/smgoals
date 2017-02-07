<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evont
 */
 
 $evont_data =  evont_globals();	
 
 $evont_data['checkbox_slideshow']=true;
 $evont_data['text_slideshow_count']=2;
 $image_size ='evont-blog';
 
 	switch(get_post_format()) {
		case 'link':
			$format_post_class = 'link';
			break;
		case 'image':
			$format_post_class = 'photo';
			break;
		case 'quote':
			$format_post_class = 'quote-left';
			break;
		case 'video':
			$format_post_class = 'video-camera';
			break;
		case 'audio':
			$format_post_class = 'volume-up';
			break;
		case 'Aside':
			$format_post_class = 'comments';
			break;
		default:
			$format_post_class = 'file-text-o';
			break;
	}
	$post_tags = wp_get_post_tags($post->ID);	
	
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('jx-evont-blog'); ?>>
               
        <div class="jx-evont-blog-item jx-blog-large">                                
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
                                     <div class="jx-evont-image-hoverlay"></div>
                                     <div class="jx-evont-blog-btns-hover">
                                        
                                        <span class="jx-evont-btn-link"><a href="<?php esc_url(the_permalink()); ?>" data-rel="prettyPhoto"><i class="fa fa-link"></i></a></span>
                                    </div>
                                                                                                        
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
                                  
                                  <div class="jx-evont-image-hoverlay"></div>
                                  
                                  <div class="jx-evont-blog-btns-hover">
                                    <span class="jx-evont-btn-scale"><a href="<?php echo esc_url($image_url[0]); ?>" data-rel="prettyPhoto"><i class="fa fa-search"></i></a></span>
                                    <span class="jx-evont-btn-link"><a href="<?php esc_url(the_permalink()); ?>" data-rel="prettyPhoto"><i class="fa fa-link"></i></a></span>
                                </div>
                                  
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
                            <div class="jx-evont-image-hoverlay"></div>
                            <div class="jx-evont-blog-btns-hover">
                                <span class="jx-evont-btn-scale"><a href="<?php echo esc_url($image_url[0]); ?>" data-rel="prettyPhoto"><i class="fa fa-search"></i></a></span>
                                <span class="jx-evont-btn-link"><a href="<?php esc_url(the_permalink()); ?>" data-rel="prettyPhoto"><i class="fa fa-link"></i></a></span>
                            </div>
                                
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
            
            <div class="jx-evont-blog-title-metabox">
                <div class="jx-evont-date">
                    <div class="day"><?php echo get_the_time('d', $post); ?></div>
                    <div class="month"><?php echo get_the_time('M', $post); ?></div>
                </div>                            
                <div class="jx-evont-titlesec">
                    <div class="jx-evont-title"><a href="<?php echo esc_url( get_permalink()); ?>"><?php echo the_title(); ?></a></div>
                    <div class="jx-evont-blog-meta">
                    <ul>
                        <li class="jx-evont-author">
                            <div class="jx-author-label jx-meta-label"><?php esc_html_e('Author','evont');?></div>
                            <div class="jx-author jx-meta-value"><?php the_author() ?></div>
                        </li>
                        <li class="jx-evont-comments">
                            <div class="jx-comments-label jx-meta-label"><?php esc_html_e('Comments','evont');?></div>
                            <div class="jx-comments jx-meta-value"><?php comments_number(esc_html__('0 Comments', 'evont'), esc_html__('1 Comment', 'evont'), '(%) '.esc_html__('Comments', 'evont'));?></div>
                        </li>
                        <li class="jx-evont-category">
                            <div class="jx-category-label jx-meta-label"><?php esc_html_e('Category','evont');?></div>
                            <div class="jx-category jx-meta-value"><?php the_category(' , ') ?></div>					
                        </li>
                        <?php if(!empty($post_tags)) { ?>
                        <li class="jx-evont-Tag">
                            <div class="jx-tag-label jx-meta-label"><?php esc_html_e('Tag','evont');?></div>
                            <div class="jx-tag jx-meta-value"><?php the_tags( '', ', ' ); ?></div>
                        </li>
                        <?php } ?>                                    
                    </ul>
                </div>
                </div>                    
            </div>
            <!-- EOF Title -->
            
            <div class="jx-evont-description">
            <p>
                <?php echo evont_excerpt('50'); ?>
            </p>
            </div>
            <!-- EOF Description -->
            
            <div class="jx-evont-blog-more">
                <a href="<?php echo esc_url( get_permalink()); ?>"><i class="fa fa-file-text-o"></i><?php esc_html_e('Read More..','evont'); ?></a>
            </div>
            <!-- EOF Readmore--> 
            <div class="space70"></div>                   
    	</div>
        <!-- Item 01 -->
                 
    </div>
    <!-- EOF Blog -->

