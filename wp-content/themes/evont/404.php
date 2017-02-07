<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package evont
 */
get_header(); ?>
    
    <!-- BOF Main Content -->
    <div class="main no-top-padding">     
        <div class="jx-evont-container jx-evont-padding-bottom">
        	
            <div class="container">
            	<div class="row">
                    <div class="col-sm-12 col-md-12 columns">                	
                        <div class="jx-evont-error-page">
                            <div class="jx-evont-error-msg"><h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'evont' ); ?></h1></div>
                            <div class="jx-evont-error-code"><?php esc_html_e( '404', 'evont' ); ?></div>
                        </div>                
                    </div>
                </div>
            </div>
        
        </div>        
    </div>
    <!-- EOF Main Content -->
<?php get_footer(); ?>
