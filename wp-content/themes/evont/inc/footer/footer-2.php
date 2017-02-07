<!--footer start here-->

<div class="jx-evont-footer jx-footer-2">
    <div class="container">
    
        <div class="col-sm-2">			
            <div class="jx-evont-logo"><img src="<?php echo esc_url($evont_data['evont_footer_logo']); ?>" alt=""></div>
        </div>
        <!-- Logo /.row -->
          
        <div class="col-sm-7">        
            <div>
                          <?php								
                                
                                $default = array(
                                    'theme_location'  => 'footer_navigation',
                                    'menu'            => '',
                                    'container'       => 'div',
                                    'menu_class'      => '',
                                    'echo'            => true,
                                    'fallback_cb'     => '__return_false',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s stripMenu">%3$s</ul>',
                                    'depth'           => 0
                                );
                                
                                wp_nav_menu($default);									
                                
                                
                            ?>    
            </div>
        </div>
        <!-- /.row -->
          
        <div class="col-sm-3">			
            <div class="jx-evont-social">
                <ul>
					<?php if($evont_data['text_facebook']): ?>
                    <li class="facebook"><a href="http://www.facebook.com/<?php echo esc_attr($evont_data['text_facebook']); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_twitter']): ?>
                    <li class="twitter"><a href="http://www.twitter.com/<?php echo esc_attr($evont_data['text_twitter']); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_youtube']): ?>
                    <li class="youtube"><a href="http://www.youtube.com/<?php echo esc_attr($evont_data['text_youtube']); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_googleplus']): ?>
                    <li class="googleplus"><a href="http://www.googleplus.com/<?php echo esc_attr($evont_data['text_googleplus']); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_dribbble']): ?>
                    <li class="dribbble"><a href="http://www.dribbble.com/<?php echo esc_attr($evont_data['text_dribbble']); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_flickr']): ?>
                    <li class="flickr"><a href="http://www.flickr.com/<?php echo esc_attr($evont_data['text_flickr']); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_linkedin']): ?>
                    <li class="linkedin"><a href="http://www.linkedin.com/<?php echo esc_attr($evont_data['text_linkedin']); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_instagram']): ?>
                    <li class="instagram"><a href="http://www.instagram.com/<?php echo esc_attr($evont_data['text_instagram']); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if($evont_data['text_pinterest']): ?>
                    <li class="pinterest"><a href="http://www.pinterest.com/<?php echo esc_attr($evont_data['text_pinterest']); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <!-- Social Icon /.row -->
    
    </div>
    <!--/.container-->
</div>

<!-- footer end here-->
