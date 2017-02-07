<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evont
 */
get_header(); ?>
	<?php
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
			$sidebar_class = 'sidebar-left eft';
			$content_width ='with-sidebar';
			$cols_width='col-sm-8 col-md-9';
			$sidebar_width='col-sm-4 col-md-3';
		}
	}
	
	$bg_color='';
	
	if (get_post_meta(get_the_ID(),'evont_body_bg_color', true)!=''):
		$bg_color='style="background-color:'.get_post_meta(get_the_ID(),'evont_body_bg_color', true).'"';
	else:
		$bg_color='';
	endif;
	
	?>
    <main id="main" class="site-main" <?php echo esc_attr($bg_color); ?>>    
		<div id="primary" class="content-area">
            <div class="container <?php echo esc_attr($content_width); ?>">
                    <div class="<?php echo esc_attr($cols_width); ?> <?php echo esc_attr($content_class); ?>">
                                        
					<?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
        
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
        
                    <?php endwhile; // End of the loop. ?>
                
                </div>
                <!-- EOF Body Content -->
                
                <div id="sidebar" class="<?php echo esc_attr($sidebar_width); ?> <?php echo esc_attr($sidebar_class); ?>" style="<?php echo esc_attr($sidebar_display); ?>">
                	<div class="theiaStickySidebar">
                    <?php dynamic_sidebar( 'general-sidebar' ); ?>
                    </div>
                </div>
                <!-- EOF sidebar -->
                
            </div>
            <!-- EOF container -->
        </div><!-- #primary -->
    </main><!-- #main -->
    
<?php get_footer(); ?>
