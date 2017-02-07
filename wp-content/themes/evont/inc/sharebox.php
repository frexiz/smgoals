<?php $evont_data =  evont_globals(); ?>
<!-- BOF Share Box  -->
<div class="jx-evont-share-box-icon">
    <div class="share-title"><?php esc_html_e('Share this Story', 'evont'); ?></div>
    <div class="sharebox">
        <ul>						
        <?php if($evont_data['sharebox_twitter']): ?>  
        <li class="twitter-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://twitter.com/home?status=<?php the_title(); ?> <?php esc_url(the_permalink()); ?>" title="<?php esc_html__( 'Twitter', 'evont' ) ?>" target="_blank"><i class="fa fa-twitter social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Twitter', 'evont' ) ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($evont_data['sharebox_facebook']): ?>
        <li class="facebook-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink());?>&t=<?php the_title(); ?>" title="<?php esc_html__( 'Facebook', 'evont' ) ?>" target="_blank"><i class="fa fa-facebook social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Facebook', 'evont' ); ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($evont_data['sharebox_googleplus']): ?>
        <li class="googleplus-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php esc_url(the_permalink()) ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php esc_html__( 'Google+', 'evont' ) ?>" target="_blank"><i class="fa fa-google-plus social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Google+', 'evont' ); ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($evont_data['sharebox_linkedin']): ?>
        <li class="linkedin-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink());?>&amp;title=<?php the_title();?>" title="<?php esc_html__( 'LinkedIn', 'evont' ) ?>" target="_blank"><i class="fa fa-linkedin social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Linkedin', 'evont' ); ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($evont_data['sharebox_delicious']): ?>
        <li class="delicious-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://www.delicious.com/post?v=2&amp;url=<?php esc_url(the_permalink()) ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php esc_html__( 'Delicious', 'evont' ) ?>" target="_blank"><i class="fa fa-delicious social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Delicious', 'evont' ); ?></span></a></li>
        <?php endif; ?>
        <?php if($evont_data['sharebox_digg']): ?>
        <li class="digg-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://digg.com/submit?phase=2&amp;url=<?php esc_url(the_permalink()) ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank" title="<?php esc_html__( 'Digg', 'evont' ) ?>"><i class="fa fa-digg social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Digg', 'evont' ); ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($evont_data['sharebox_reddit']): ?>			
        <li class="reddit-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="http://www.reddit.com/submit?url=<?php esc_url(the_permalink()) ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php esc_html__( 'Reddit', 'evont' ) ?>" target="_blank"><i class="fa fa-reddit social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Reddit', 'evont' ); ?></span></a>
        </li>	
        <?php endif; ?>
        <?php if($evont_data['sharebox_email']): ?>
        <li class="email-share">
        <a class="evont-tooltip evont-tooltip-effect-4" href="mailto:?subject=<?php the_title();?>&amp;body=<?php esc_url(the_permalink()) ?>" title="<?php esc_html__( 'E-Mail', 'evont' ) ?>" target="_blank"><i class="fa fa-envelope social"></i><span class="evont-tooltip-content"><?php esc_html_e( 'Email', 'evont' ); ?></span></a>
        </li>
        <?php endif; ?>
        </ul>
    </div>    
</div>
<!-- EOF Share Box  -->