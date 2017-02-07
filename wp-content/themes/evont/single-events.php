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
    <div id="main" class="middle_container jx-evont-padding">	
            <div class="container <?php echo esc_attr($content_width); ?>">
                <div class="row">
                    <div class="<?php echo esc_attr($cols_width); ?> <?php echo esc_attr($content_class); ?> jx-evont-event-single"> 
                        <?php while ( have_posts() ) : the_post(); ?>                
                     
                            <?php get_template_part( 'template-parts/event', 'single' ); ?>
                            <?php 
                            //Get Speakers 
                            get_template_part('inc/event-speakers');
                            //End of Speakers
                            ?>

                            <div class="space30"></div>
                            <hr></hr>
                            <div class="space30"></div>                            
                            
                            <?php 
                            //Get Agenda 
                            get_template_part('inc/event-agenda');
                            //End of Agenda
                            ?>
                            
                            <div class="space30"></div>
                            <hr></hr>
                            <div class="space30"></div>
                            
                            
                            
                            <?php 
                            //Get Sponsors
                            get_template_part('inc/event-sponsors');
                            //End of Sponsors
                            ?>

                            <div class="space30"></div>
                            <hr></hr>
                            <div class="space30"></div>                            
                
                            <?php 
                            //Get Sponsors
                            get_template_part('inc/event-price');
                            //End of Sponsors
                            ?>
                            
                            
                            
                            <div class="space30"></div>
                            <hr></hr>
                            <div class="space30"></div>                            
                
                            <?php 
                            //Get Sponsors
                            get_template_part('inc/event-hotels');
                            //End of Sponsors
                            ?>
                            
                                           
                        <?php endwhile; // End of the loop. ?>
                        
                        
                    </div>
                    <!-- EOF Body Content -->
                    
                    <div id="sidebar" class="<?php echo esc_attr($sidebar_width); ?> <?php echo esc_attr($sidebar_class); ?>" style="<?php echo esc_attr($sidebar_display); ?>">
                        <?php dynamic_sidebar( 'single-events-sidebar' ); ?>
                    </div>
                    <!-- EOF sidebar -->
                </div>                
            </div>
            <!-- EOF container -->
    </div><!-- #main -->
<?php get_footer(); ?>