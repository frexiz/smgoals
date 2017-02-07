<?php 
$evont_data =  evont_globals(); 		
$theme_color=$evont_data['theme_color'];
$theme_color_hex=evont_hex2rgb($theme_color);
// ----------- STYLES -----------
if($theme_color && $theme_color!="#fff300"): ?>


/* ------------------------------------------------------------------------ */
/* Yellow Color
/* ------------------------------------------------------------------------ */

.jx-evont-hero-title h2 , .jx_evont_countdown ul li .count-text , .jx_evont_countdown ul li .count-text , .programs_item.style-2:hover .time , form input[type="submit"]:hover
{
	color: <?php echo $theme_color ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Yellow Background
/* ------------------------------------------------------------------------ */

.jx-evont-title-1 h1 , .jx-evont-mainmenu .submenu li:hover > a , .jx-evont-contactmap-section .contactDetails , .jx-evont-pagetitle h1 , .programs_item:hover .right-side , .jx-evont-portfolio-hover i , .mainBtn:hover,.jx-evont-blog-section .jx-evont-blog-date
{
	background: <?php echo $theme_color ?> !important;
}


<?php		
endif;
?>


<?php 

$theme_base_color=$evont_data['theme_base_color'];
$theme_base_color_hex=evont_hex2rgb($theme_base_color); 
 
if($theme_base_color && ($theme_base_color!="#2d283f")): ?>

/* ------------------------------------------------------------------------ */
/* Purple Color
/* ------------------------------------------------------------------------ */

.jx-venue-1 .average .price , .jx-venue-1 .detail-list ul li i , .jx-evont-blog-section h3 a , .programs_item.style-2 .time , #sidebar .widget_recent_entries ul li , .widget ul li a , .jx-evont-blog-section h3
{
	color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}

.programs_item.style-2 .name {
	color: <?php echo esc_attr( $theme_base_color ) ?>;
}

/* ------------------------------------------------------------------------ */
/* Purple Background
/* ------------------------------------------------------------------------ */

.jx-evont-footer.jx-footer-1 , .jx-evont-sticky.fixed , .plan-column , .jx-evont-blog-section .date_tag , .mainBtn , .widget .widget_tag_cloud a , .jx-evont-pagination .page-numbers , .widget_search input.search-submit , .jx-evont-header.jx-header-1 , .programs_item:hover .left-side , .jx-evont-contact-address .mainBtn:hover , .jx-evont-blog-section .readmore , .jx-evont-share-box-icon .share-title
{
	background: <?php echo esc_attr( $theme_base_color ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Purple Background Color
/* ------------------------------------------------------------------------ */

.evont-bg-right-small , .widget .widget-title::before , .jx-evont-mainmenu li .submenu
{
	background-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}

/* ------------------------------------------------------------------------ */
/* Purple Background Color RGB
/* ------------------------------------------------------------------------ */

.jx-venue-1 .jx-venue-item .title , .jx-evont-portfolio-hoverlayer , .jx-evont-tint::before,.jx-evont-blog-section .overlay
{
	background: rgba(<?php echo esc_attr( $theme_base_color_hex[0] ); ?>, <?php echo esc_attr( $theme_base_color_hex[1] ); ?>, <?php echo esc_attr( $theme_base_color_hex[2] ); ?>, 0.80) !important;
}

<?php		
endif;
?>


<?php 

$theme_base_color_2=$evont_data['theme_base_color_2'];
$theme_base_color_2_hex=evont_hex2rgb($theme_base_color_2); 
 
if($theme_base_color_2 && ($theme_base_color_2!="#e21d47")): 

?>

/* ------------------------------------------------------------------------ */
/* Pink Color
/* ------------------------------------------------------------------------ */

.jx-venue-1 .jx-venue-item .title a:hover , .jx-evont-tagline-2 .jx-evont-tagline-title , .jx-evont-tagline-2 .jx-event-tagline-button , .jx-evont-tagline-section .jx-evont-heading .number , .jx-evont-blog-section h3 a:hover , .widget ul li a:hover , .jx-evont-contact-form button:hover
{
	color: <?php echo esc_attr( $theme_base_color_2 ) ?> !important;
}

.nav-tabs > li > a {
	color: <?php echo esc_attr( $theme_base_color_2 ) ?>;
}


/* ------------------------------------------------------------------------ */
/* Pink Background
/* ------------------------------------------------------------------------ */

.jx-evont-contact-address .mainBtn , .jx-evont-get-updates .btn-default , .nav-tabs > li.active > a , .nav-tabs > li.open > a, .nav-tabs > li:hover > a , .jx-evont-ticket-from form , .standard-column , .widget .widget_tag_cloud a:hover , .jx-evont-pagination .page-numbers.current , .jx-evont-pagination .page-numbers:hover , .jx-evont-contact-form button , .jx-evont-speaker-item:hover
{
	background: <?php echo esc_attr( $theme_base_color_2 ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Pink Background Color RGB
/* ------------------------------------------------------------------------ */

.jx-evont-speakers-area .overlay , .jx-evont-teammember .overlay
{
	background: rgba(<?php echo esc_attr( $theme_base_color_2_hex[0] ); ?>, <?php echo esc_attr( $theme_base_color_2_hex[1] ); ?>, <?php echo esc_attr( $theme_base_color_2_hex[2] ); ?>, 0.90) !important;
}


/* ------------------------------------------------------------------------ */
/* Pink Border
/* ------------------------------------------------------------------------ */

.nav-tabs > li > a , .jx-evont-tagline-2 .jx-event-tagline-button , .jx-evont-speaker-item:hover
{
	border-color: <?php echo esc_attr( $theme_base_color_2 ) ?> !important;
}



<?php		
endif;
?>