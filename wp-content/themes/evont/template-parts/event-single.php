<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evont
 */
 
 $evont_data['checkbox_slideshow']=true;
 $evont_data['text_slideshow_count']=2;
 $image_size ='evont-single-event';
 $show_date='';
 
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

<div id="post-<?php the_ID(); ?>" <?php post_class('jx-evont-blog-section'); ?>>
               <div class="jx-evont-main-blog blog-page">

            <div class="row">
              <div class="col-sm-12">           
                
               <?php if(has_post_thumbnail()):?>
              
                <div class="jx-evont-event">
                    
                    <div class="jx-evont-event-date" style="background:<?php echo get_post_meta(get_the_id() , 'jx_evont_event_color',true); ?>">
                        <div class="day"><?php echo get_the_time('d', $post); ?></div>
                        <div class="month"><?php echo get_the_time('M', $post); ?> '<?php echo get_the_time('y', $post); ?></div>
                    </div>
                    <!-- DATE -->
                    
                    <div class="event-img">
                    	<?php the_post_thumbnail($image_size); ?>
                    </div>
                    <!-- IMAGE -->                    

					
                
                </div>
                
                
                
                <?php else:
				
					$show_date= "<li><span><i class='fa fa-o-clock'></i>".get_the_date()."</span></li>";
				
				endif;?> 

                <h3><?php echo the_title(); ?></h3>
                
                <div class="entry-meta">
                    <ul>
                        <li><span><i class="fa fa-clock-o"></i> 9:00am - 12:00pm</span></li>
                        <li><span><i class="fa fa-map-marker"></i> <?php echo get_post_meta(get_the_id() , 'address',true); ?></span></li>
                    </ul>
                </div>
                                
                 <div class="jx-evont-description"><?php the_content(); ?></div>


              </div>
            </div>
        <!-- Item 01 -->


        
        </div>
                 
    </div>