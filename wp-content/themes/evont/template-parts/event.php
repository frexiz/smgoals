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

	<?php 
		$post_image_id = get_post_thumbnail_id(get_the_id());
		$image_url = wp_get_attachment_image_src($post_image_id, 'large');
		$image_small = wp_get_attachment_image_src($post_image_id, $image_size);
		$image_data = wp_get_attachment_metadata($post_image_id);
		
	?>
    
    <div id="post-<?php the_ID(); ?>" <?php post_class('jx-evont-event-section'); ?>>
               <div class="jx-evont-event-list">

            <div class="row">
                <div class="jx-evont-event-list-left">
                
                <div class="date"><?php echo get_the_time('d', $post); ?></div>
                <div class="date-detail" style="background:<?php echo get_post_meta(get_the_id() , 'jx_evont_event_color',true); ?>">
                    <div class="month"><?php echo get_the_time('M', $post); ?></div>
                    <div class="year"><?php echo get_the_time('Y', $post); ?></div>
                </div>
                
                </div>
				<!-- DATE -->
              
              <div class="jx-evont-event-list-right">
                

                <h3><a href="<?php echo esc_url( get_permalink()); ?>"><?php echo the_title(); ?></a></h3>
                
                <div class="entry-meta">
                    <ul>
                        <li><span><i class="fa fa-clock-o"></i> 9:00am - 12:00pm</span></li>
                        <li><span><i class="fa fa-map-marker"></i> <?php echo get_post_meta(get_the_id() , 'address',true); ?></span></li>
                    </ul>
                </div>
                
                                
                <?php echo evont_excerpt(15); ?>
                <div class="readmore"><a href="<?php echo esc_url( get_permalink()); ?>"><?php esc_html_e('Details','evont');?></a></div>
                <div class="register"><a href="<?php echo esc_url( get_permalink()); ?>"><?php esc_html_e('Register Now','evont');?></a></div>
              </div>
            </div>
        <!-- Item 01 -->
        
        </div>
                 
    </div>
    <!-- EOF Blog -->
    