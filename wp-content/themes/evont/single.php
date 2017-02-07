<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package evont
 */
$evont_data =  evont_globals();
get_header(); ?>
	<?php
	$evont_data =  evont_globals();
	
	$content_class = '';
	$sidebar_class = '';
	$sidebar_display='';
	$sidebar_width='';
	$content_width ='';
	
	if(get_post_meta(get_the_ID(), 'evont_sidebar', true) == 'no-sidebar') {
		$content_class = 'has-no-sidebar';
		$sidebar_class = 'no-sidebar';
		$content_width ='';
		$cols_width='col-sm-8 col-md-12';
		$sidebar_display='display:none';
	} elseif (get_post_meta(get_the_ID(),  'evont_sidebar', true) == 'right-sidebar') {
		$content_class = 'content-left left';
		$sidebar_class = 'sidebar-right right';
		$content_width ='with-sidebar';
		$cols_width='col-sm-8 col-md-9';
		$sidebar_width='col-sm-4 col-md-3';
	} elseif (get_post_meta(get_the_ID(),  'evont_sidebar', true) == 'left-sidebar') {
		$content_class = 'content-right right';
		$sidebar_class = 'sidebar-left left';
		$content_width ='with-sidebar';
		$cols_width='col-sm-8 col-md-9';
		$sidebar_width='col-sm-4 col-md-3';
	} elseif ( (get_post_meta(get_the_ID(),'evont_sidebar', true) == 'default') || (get_post_meta(get_the_ID(),  'evont_sidebar', true) == '') ) {
		if( $evont_data['sidebar_position'] == 'no-sidebar' ) {
			$content_class = 'has-no-sidebar';
			$sidebar_class = 'no-sidebar';
			$content_width ='';
			$cols_width='col-sm-8 col-md-12';
			$sidebar_display='display:none';
		} elseif( $evont_data['sidebar_position'] == 'right-sidebar' ) {
			$content_class = 'content-left left';
		$sidebar_class = 'sidebar-right right';
		$content_width ='with-sidebar';
		$cols_width='col-sm-8 col-md-9';
		$sidebar_width='col-sm-4 col-md-3';
		} elseif( $evont_data['sidebar_position'] == 'left-sidebar' ) {
			$content_class = 'content-right right';
			$sidebar_class = 'sidebar-left left';
			$content_width ='with-sidebar';
			$cols_width='col-sm-8 col-md-9';
			$sidebar_width='col-sm-4 col-md-3';
		}
	}
	
	?>
    <div id="main" class="middle_container">	
            <div class="container <?php echo esc_attr($content_width); ?>">
                <div class="row">
                    <div class="<?php echo esc_attr($cols_width); ?> <?php echo esc_attr($content_class); ?>"> 
                        <?php while ( have_posts() ) : the_post(); ?>
                
                            <?php get_template_part( 'template-parts/content', 'single' ); ?>
                        	
                            <?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','evont'),'after'=>'</div>')); ?>
                            
                            <?php
                            //Get Share Box                        
                            if ($evont_data['checkbox_sharebox']):			
                            get_template_part('inc/sharebox');
                            endif;
                            //End of Share Box
                            ?>
                                <hr></hr>
                                
                                <?php 
							
							$authordesc = get_the_author_meta( 'user_description' );
							
							if( ! empty ( $authordesc )): ?>
                             <div class="jx-evont-author-box jx-evont-border-thick clearfix">
                                
                                <div class="jx-evont-author-image">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?></a>
                                </div>
                                
                                <div class="jx-evont-author-details">
                                    <div class="jx-evont-author-name jx-evont-black"><a href="<?php esc_url(the_author_link()); ?>"> <?php the_author(); ?> </a></div>
                                    <div class="jx-evont-author-details"><?php echo esc_attr($authordesc); ?></div>
                                </div>
                                
                                
                            </div>
							<?php endif; ?> 
                            <div class="space30"></div>                           
                            
                            
                            <?php 
                            //Get Related Posts 
                            if ($evont_data['checkbox_relatedposts']):
                            get_template_part('inc/related_posts');
                            endif;
                            //End of related posts
                            ?>
                            
                            <div class="space30"></div>
                
                            <?php
                                if($evont_data['checkbox_comments']):
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                endif;							
                            ?>
                
                        <?php endwhile; // End of the loop. ?>
                        
                        
                    </div>
                    <!-- EOF Body Content -->
                    
                    <div id="sidebar" class="<?php echo esc_attr($sidebar_width); ?> <?php echo esc_attr($sidebar_class); ?>" style="<?php echo esc_attr($sidebar_display); ?>">
                        <?php dynamic_sidebar( 'general-sidebar' ); ?>
                    </div>
                    <!-- EOF sidebar -->
                </div>                
            </div>
            <!-- EOF container -->
    </div><!-- #main -->
<?php get_footer(); ?>
