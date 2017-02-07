<?php //Header-4 

	$evont_data =  evont_globals();
	
	$sticky_class='';
	$header_class='';
	
	if(is_page_template('template-home.php')):
		$header_class='jx-evont-header-transparent';
	endif;
	
	if (!wp_is_mobile()):
		if ($evont_data['check_sticky_header']):
		$sticky_class='jx-evont-sticky';
		endif;
	endif;
	
	
?>
  <header class="jx-evont-header jx-header-4 header <?php echo esc_attr($sticky_class);?>">
  
  <!-- START TOP BAR -->
  	<div class="jx-evont-top-bar">
          <div class="container">
            <div class="row">
            
              <div class="col-sm-6 left">
                <div class="jx-evont-left-topbar"> 
                
                    <div class="navbar-header">
                         <?php if($evont_data['evont_logo'] != ""): ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand standard-logo"><img src="<?php echo esc_url($evont_data['evont_logo']); ?>" alt="<?php bloginfo('name'); ?>" class="logo_standard"/></a>
                            <?php if($evont_data['logo_retina'] != '') : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  class="navbar-brand retina-logo"><img src="<?php echo esc_url($evont_data['logo_retina']); ?>"  alt="<?php bloginfo('name'); ?>" class="logo_retina"/></a>				
                            <?php endif; ?>
                            <!-- EOF Retina -->                    
                        <?php endif ?> 
                     </div>
                     
                     <!-- HEADER LOGO -->
                         
                    <div class="jx-header-social">
                        <ul>
                            <li class="facebook"><a href="http://www.facebook.com/#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="http://www.twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                            <li class="instagram"><a href="http://www.instagram.com/#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    
                    <!-- HEADER SOCIAL ICON -->
                         
                </div>
              </div>
              <!--.col-sm-6 end-->
              
              <div class="col-sm-6 right">
              	<div class="jx-evont-right-topbar">					
                    <div class="access-links">
                    
                    <?php								
                            
                        $default = array(
                            'theme_location'  => 'top_navigation',
                            'menu'            => '',
                            'container'       => 'div',
                            'menu_class'      => 'jx-evont-top-menu',
                            'echo'            => true,
                            'fallback_cb'     => '__return_false',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => new evont_mega_menu()
                        );
                        
                        wp_nav_menu($default);									
                        
                        
                    ?>        
                    
                    </div>
                    <!-- ACCESS LINKS -->
                    <div class="support"><span class="login"><a href="#sign-in"><?php esc_html_e('SING IN','evont');?></a></span></div>
                    <!-- SUPPORT / LOGIN -->
                </div>
              </div>
              <!--.col-sm-6 end-->
              
            </div>
            <!--.row end-->
          </div>
          <!--.container end-->
    </div>
    <!-- END TOP BAR -->


	<div class="main-header">

        <div class="container">
            <div class="row">
            
              <div class="col-sm-8 left">
                <nav class="navbar navbar-default  navbar-fixed-top">      
					<?php
                                    
                    if ( class_exists( 'WooCommerce' ) ) {
                    
                        global $woocommerce;
                        
                        // get cart quantity
                        $qty = $woocommerce->cart->get_cart_contents_count();
                        
                        // get cart total
                        $total = $woocommerce->cart->get_cart_total();
                        
                        // get cart url
                        $cart_url = $woocommerce->cart->get_cart_url();
                    }
                    ?>	
                
                    <!--/header start-->
            
            
                  
                    <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                        <div class="shopping-cart">
                          <div id="cart" class="relative"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <div class="value"><a href="#"><?php echo esc_attr($qty); ?></a></div>
                          </div>
                        </div>
                        
                        
                        <div class="shopping-carts">
                
                        <div class="shopping-carts-header">
                
                          <span><i class="fa fa-shopping-carts cart-icon"></i></span><span class="badge"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
                
                          <div class="shopping-carts-total">
                
                            <span class="lighter-text"><?php esc_html_e('Total:','foodpick');?></span>
                
                            <span class="main-color-text"><?php  echo $woocommerce->cart->total; ?></span>
                
                          </div>
                
                        </div> <!--end shopping-carts-header -->
                
                    
                
                        <div class="shopping-carts-items">
                
                            <?php echo Woocommerce_mini_cart(); ?>
                
                        </div>
                
                    
                
                      </div> 
                
                      <!--end shopping-carts -->
                    <?php endif; ?>
                    <!-- Brand and toggle get grouped for better mobile display -->
            
                      
                      
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                        <?php								
                            
                        $default = array(
                            'theme_location'  => 'primary_navigation',
                            'menu'            => '',
                            'container'       => 'div',
                            'menu_class'      => 'jx-evont-mainmenu navbar-left',
                            'echo'            => true,
                            'fallback_cb'     => '__return_false',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => new evont_mega_menu()
                        );
                        
                        wp_nav_menu($default);									
                        
                        
                    ?>                
                    
                    </div>
                    <!-- /.navbar-collapse -->
				</nav>                    
              </div>
              
              
              <div class="col-sm-4 right">
              
              	<div class="header-right">                
                    <ul>
                        <li><i class="fa fa-search"></i></li>
                        <li><i class="fa fa-bars"></i></li>
                    </ul>
                </div>
                          
              </div>
              

			</div>
      	</div>
    
    </div>
    
      	<!-- /.container-fluid -->
      

    <!--/header end-->
  </header>
  
  <?php get_template_part('inc/ajax', 'auth'); ?>
  <?php get_template_part('inc/titlebar'); ?>