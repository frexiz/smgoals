<?php get_header(); ?>

 <!-- BOF Main Content -->
    <div id="main" role="main" class="main">
        <div id="primary" class="content-area jx-evont-fullpat">
            <div class="container">
                <div class="sixteen columns jx-evont-padding no-top-padding no">
                
                
                	<?php while ( have_posts() ) : the_post(); ?>
            
                        <?php get_template_part( 'template-parts/content', 'speakers' ); ?>
            
                    <?php endwhile; // End of the loop. ?>                    

                </div>

            </div>
            <!-- EOF Container -->
        </div><!-- #primary -->
    </div>
        
<?php get_footer(); ?>