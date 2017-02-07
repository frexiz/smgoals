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
 $image_size ='evont_blog';
 
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
		//the_post_thumbnail($image_size);
		
		$speaker_jobposition = get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); 			

	?>
    
    
    
    
    <div id="post-<?php the_ID(); ?>" <?php post_class('jx-evont-blog-section'); ?>>
               
        <div class="jx-evont-speaker-view">
        
            <div class="row">
                <div class="content-a">
                    <div class="job-position"><?php echo get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); ?></div>
                    <div class="social-icon">
                    
                        <ul>
						<?php if (get_post_meta(get_the_id(),'jx_evont_speaker_fb','evont')): ?>
                        <li><a href="http://www.facebook.com/<?php echo get_post_meta(get_the_id(),'jx_evont_speaker_fb','evont'); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>
                        
                        <?php if (get_post_meta(get_the_id(),'jx_evont_speaker_twitter','evont')): ?>
                        <li><a href="http://www.twitter.com/<?php echo get_post_meta(get_the_id(),'jx_evont_speaker_twitter','evont'); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        
                        <?php if (get_post_meta(get_the_id(),'jx_evont_speaker_linkedin','evont')): ?>
                        <li><a href="http://www.linkedin.com/<?php echo get_post_meta(get_the_id(),'jx_evont_speaker_linkedin','evont'); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>

                        <?php if (get_post_meta(get_the_id(),'jx_evont_speaker_googleplus','evont')): ?>
                        <li><a href="http://www.linkedin.com/<?php echo get_post_meta(get_the_id(),'jx_evont_speaker_googleplus','evont'); ?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php endif; ?>


                        </ul>
                    
                    </div>
                </div>
            </div>
        
            <div class="row">
              <div class="col-sm-4">
                <div class="blog-img"><img src="<?php echo esc_url($image_small[0]); ?>" alt="<?php echo esc_attr($image_data['image_meta']['title']); ?>" class="img-responsive" /></div>
              </div>

              <div class="col-sm-8">
                <div class="content-b">              
                    <div class="title"><?php echo the_title(); ?></div>
                    <div class="job-position"><?php echo get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); ?></div>
                    <div class="description"><?php echo get_the_content(); ?></div>
                </div>              
              </div>
              
            </div>
		
        </div>
        <!-- Item 01 -->
                 
    </div>
    <!-- EOF Blog -->