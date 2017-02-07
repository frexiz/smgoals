<!--footer start here-->

<?php 
    $bg_image_class='';
    
    if($evont_data['footer_bg_image']):
	
		$bg_image_class='background:url('.esc_url($evont_data['footer_bg_image']).');';
	
	endif;
?>

<div class="jx-evont-footer jx-footer-3" style="<?php echo $bg_image_class; ?>">
    <div class="container">
          
        <div class="col-sm-6">
            <div class="jx-evont-logo"><img src="<?php echo esc_url($evont_data['evont_footer_logo']); ?>" alt=""></div>
            <!-- FOOTER LOGO -->
            
            <div class="jx-footer-text"><?php dynamic_sidebar( 'evont-footer-1' ); ?></div>
            
            <!-- CONTENT -->
            
            <div class="contact-detail"><?php dynamic_sidebar( 'evont-footer-2' ); ?></div>
            
            <!-- CONTACT DETAIL -->
            
            
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
            
            <!-- SOCIAL ICON -->
            
            
        </div>
        <!-- /.row -->
          
        <div class="col-sm-6">			
            <?php dynamic_sidebar( 'evont-footer-3' ); ?>
        </div>
        <!-- Social Icon /.row -->
    
    </div>
    <!--/.container-->
</div>

<!-- footer end here-->