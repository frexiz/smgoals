<?php
//Template Name: Events
get_header(); ?>		
	
    
    <?php
	$evont_data =  evont_globals();
	
	$content_class = '';
	$sidebar_class = '';
	$sidebar_display='';
	$sidebar_width='';
	$content_width ='';
	
	if(get_post_meta(get_the_ID(), 'jx_evont_sidebar', true) == 'no-sidebar') {
		$content_class = 'has-no-sidebar';
		$sidebar_class = 'no-sidebar';
		$content_width ='';
		$cols_width='col-sm-8 col-md-12';
		$sidebar_display='display:none';
	} elseif (get_post_meta(get_the_ID(),  'jx_evont_sidebar', true) == 'right-sidebar') {
		$content_class = 'content-left left';
		$sidebar_class = 'sidebar-right right';
		$content_width ='with-sidebar';
		$cols_width='col-sm-8 col-md-9';
		$sidebar_width='col-sm-4 col-md-3';
	} elseif (get_post_meta(get_the_ID(),  'jx_evont_sidebar', true) == 'left-sidebar') {
		$content_class = 'content-right right';
		$sidebar_class = 'sidebar-left left';
		$content_width ='with-sidebar';
		$cols_width='col-sm-8 col-md-9';
		$sidebar_width='col-sm-4 col-md-3';
	} elseif ( (get_post_meta(get_the_ID(),'jx_evont_sidebar', true) == 'default') || (get_post_meta(get_the_ID(),  'jx_evont_sidebar', true) == '') ) {
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
    <!-- BOF Main Content -->
    <div id="main" class="middle_container">
    	
        <div class="jx-evont-ticker">
        	<div class="container">
            <h3>
            <i id="evont-prev" class="fa fa-caret-left"></i>
            <i id="evont-next" class="fa fa-caret-right"></i>
			<?php esc_html_e('Upcoming Events //','evont'); ?></h3>        	
            <ul id="event-ticker">
        	<?php
			
				$args = array('post_type' => 'events',
						  'orderby' => 'date',
						  'order' => 'ASC',
						  'showposts' => 6 );  
			
				$loop = new WP_Query( $args );			
				while ( $loop->have_posts() ) : $loop->the_post();
			?>
            	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php 
				endwhile;
				wp_reset_query();
			?>
            </ul>
            </div>
        </div>
                 
        <div class="container  jx-evont-padding <?php echo esc_attr($content_width); ?>">
            <div class="row">
             <div class="<?php echo esc_attr($cols_width); ?> <?php echo esc_attr($content_class); ?> jx-evont-padding-bottom">          
                <div class="theiaStickySidebar">
                <?php if ( have_posts() ) : ?>
        
       
                    <?php query_posts('post_type=events&post_status=publish&"&paged='. get_query_var('paged')); ?>
                    
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php
        
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/event', get_post_format() );
                        ?>
        
                    <?php endwhile; ?>
                    <div class="row"></div>
                    <div class="jx-evont-pagination">
                        <?php the_posts_pagination(); ?>
                    </div>
                <?php else : ?>
        
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
        
                <?php endif; ?>
                </div>
            </div>
            <!-- EOF Body Content -->
            
            <div id="sidebar" class="<?php echo esc_attr($sidebar_width); ?> <?php echo esc_attr($sidebar_class); ?>" style="<?php echo esc_attr($sidebar_display); ?>">    
                <div class="theiaStickySidebar">
                    <?php dynamic_sidebar( 'events-sidebar' ); ?>
                </div>
            </div>
            <!-- EOF sidebar -->
            </div>
        </div>
    </div>
<?php get_footer(); ?>
