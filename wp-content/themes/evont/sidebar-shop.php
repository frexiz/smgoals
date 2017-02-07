<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evont
 */
if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
	return;
}
?>
<!-- Woocommerce Sidebar -->
    <?php if ( ! dynamic_sidebar( 'shop-sidebar' ) ) :
			dynamic_sidebar( 'shop-sidebar' );
		endif; // end sidebar widget area
	?>
    