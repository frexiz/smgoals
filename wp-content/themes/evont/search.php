<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package evont
 */
get_header(); ?>
	 <!-- BOF Main Content -->
    <div id="main" class="middle_container">       
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9 jx-evont-padding alpha">
                
                    <?php if ( have_posts() ) : ?>
                    
                        <div class="jx-evont-page-search wide bg-grey">
                            <form action="#" id="searchForm-1" method="post" class="jx-evont-form-wrapper cf has-validation-callback">
                            <div id="message-input-1" class="search-inline-block">
                            <input id="search-text" name="s" placeholder="Search..." class="jx-evont-form-name" type="text">
                            </div>
                            <div id="message-submit-1">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <!-- Submit Button -->	
                            </div>
                            </form>                        
                        </div>

                    
                        <header class="jx-evont-search-page-header">
                            <h1 class="page-title"><span><?php printf( esc_html__( 'Search Results for: %s', 'evont' ), '<span>' . get_search_query() . '</span>' ); ?></span></h1>
                        </header><!-- .page-header -->
                        
                        
                        
                        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );
                            ?>
                        <?php endwhile; ?>
                        <div class="jx-evont-pagination">
                        <?php the_posts_pagination(); ?>
                        </div>
                    <?php else : ?>            
                        <?php get_template_part( 'template-parts/content', 'none' ); ?>
                    <?php endif; ?>
                    
                </div>
                <!-- EOF Body Content -->
                
                <div id="sidebar" class="col-sm-4 col-md-3  right jx-evont-padding omega">
                    <?php dynamic_sidebar( 'general-sidebar' ); ?>
                </div>
                <!-- EOF sidebar-->
            </div>
        </div>
        <!-- EOF container --> 
    </div>
<?php get_footer(); ?>
