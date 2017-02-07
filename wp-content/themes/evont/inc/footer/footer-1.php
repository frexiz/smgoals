<!--footer start here-->

<div class="jx-evont-footer jx-footer-1">
    <div class="container">
    
        <div class="row">			
            <div class="jx-evont-logo"><img src="<?php echo esc_url($evont_data['evont_footer_logo']); ?>" alt=""></div>
        </div>
        <!-- Logo /.row -->
          
        <div class="row">        
            <div class="jx-evont-copyright"><?php printf(esc_html__( '%s', 'evont'),esc_attr($evont_data['text_copyright'])); ?> <a href="<?php esc_url(get_site_url()); ?>"><?php bloginfo('name'); ?></a></div>
        </div>
        <!-- /.row -->
          
        <div class="row">			
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