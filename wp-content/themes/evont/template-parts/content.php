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
    
    <div id="post-<?php the_ID(); ?>" <?php post_class('jx-evont-blog-section'); ?>>
               <div class="jx-evont-main-blog blog-page">

            <div class="row">
              <div class="col-sm-12">
              
              <?php if(has_post_thumbnail()):?>
              
                <div class="blog-img">
                    
                    <?php the_post_thumbnail($image_size);?>
                    <!-- IMAGE -->                    

                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="blog-hover-icon"><a href="<?php echo esc_url( get_permalink()); ?>"><i class="fa fa-plus"></i></a></div>
                        </div>
                    </div>
					
                    <div class="jx-evont-blog-date">
                        <div class="day"><?php echo get_the_time('d', $post); ?></div>
                        <div class="month"><?php echo get_the_time('M', $post); ?> <?php echo get_the_time('Y', $post); ?></div>
                    </div>
                    <!-- DATE -->
                
                </div>
                
               <?php else:
				
					$show_date= "<li><span><i class='fa fa-o-clock'></i>".get_the_date()."</span></li>";
				
				endif;?>    
                

                <h3><a href="<?php echo esc_url( get_permalink()); ?>"><?php echo the_title(); ?></a></h3>
                
                <div class="entry-meta">
                    <ul>
                        <?php echo $show_date; ?>
                        <li><span><i class="fa fa-user"></i><?php the_author() ?></span></li>
                        <li><span><i class="fa fa-folder-open"></i><?php the_category(' , ') ?></span></li>
                        <li><span><i class="fa fa-comment"></i><?php comments_number(esc_html__('0 Comments', 'evont'), esc_html__('1 Comment', 'evont'), '(%) '.esc_html__('Comments', 'evont'));?></span></li>
                    </ul>
                </div>
                                
                <?php echo the_excerpt(); ?>
                <div class="readmore"><a href="<?php echo esc_url( get_permalink()); ?>"><?php esc_html_e('READ MORE','evont');?></a></div>
              </div>
            </div>
        <!-- Item 01 -->
        
        </div>
                 
    </div>
    <!-- EOF Blog -->