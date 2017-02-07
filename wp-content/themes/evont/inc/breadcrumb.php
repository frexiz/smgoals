<?php
		//Start of Breadcrumbs Function
		//--------------------Credit goes to http://dimox.net/wordpress-breadcrumbs-without-a-plugin/ tutorials
		
		function evont_breadcrumbs() {
 
				/* === OPTIONS === */  
		  $text['home']   = 'Home'; // text for the 'Home' link  
		  $text['category'] = 'Archive by Category "%s"'; // text for a category page  
		  $text['search']  = 'Search Results for "%s" Query'; // text for a search results page  
		  $text['tag']   = 'Posts Tagged "%s"'; // text for a tag page  
		  $text['author']  = 'Articles Posted by %s'; // text for an author page  
		  $text['404']   = 'Error 404'; // text for the 404 page  
		  $text['shop']   = 'Shop'; // text for the 404 page  
		  
		  $show_current  = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show  
		  $show_on_home  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
		  $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show  
		  $show_title   = 1; // 1 - show the title for the links, 0 - don't show  
		  $delimiter   = ''; // delimiter between crumbs  
		  //$before     = wp_kses( __( '<span class="current">', 'evont' ),array( 'span' => array( 'class' => array() ) )); 
		  //$after     = wp_kses( __( '</span>', 'evont' ),array( 'span')); // tag after the current crumb  
		  /* === END OF OPTIONS === */  
		  $parent_id='';
		  
		  global $post;  
		  
		  $home_link  = esc_url(home_url('/'));  
		  $link_before =  '<span class="pre-breadcrumb" typeof="v:Breadcrumb">';		  
		  $link_after  = '</span>'; // tag after the current crumb    
		  $link_attr  = ' rel="v:url" property="v:title"';  
		  $link     = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;  
		
		  if (!empty($post)):
		  $parent_id  = $parent_id_2 = $post->post_parent;  
		  endif;
		  
		  $frontpage_id = get_option('page_on_front');  
		  
		  if (is_home() || is_front_page()) {  
		  
			if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';  
		  
		  } else {  
		  
			//echo '<div class="breadcrumbs">';  
			if ($show_home_link == 1) {  
			  echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';  
			  if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo wp_kses_post($delimiter);  
			}  
		  
			if ( is_category() ) {  
			  $this_cat = get_category(get_query_var('cat'), false);  
			  if ($this_cat->parent != 0) {  
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);  
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);  
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
				echo wp_kses_post( $cats );  
			  }  
			  if ($show_current == 1) echo '<span class="current">' . sprintf($text['category'], single_cat_title('', false)) . '</span>';  
		  
			} elseif ( is_search() ) {  
			  echo '<span class="current">' . sprintf($text['search'], get_search_query()) . '</span>';  
		  
			} elseif ( is_day() ) {  
			  echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
			  echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;  
			  echo '<span class="current">' . get_the_time('d') . '</span>';  
		  
			} elseif ( is_month() ) {  
			  echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
			  echo '<span class="current">' . get_the_time('F') . '</span>';  
		  
			} elseif ( is_year() ) {  
			  echo '<span class="current">' . get_the_time('Y') . '</span>';  
		  
			} elseif ( is_single() && !is_attachment() ) {  
			  if ( get_post_type() != 'post' ) {  
				$post_type = get_post_type_object(get_post_type());  
				$slug = $post_type->rewrite;  
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);  
				if ($show_current == 1) 
				echo wp_kses_post($delimiter) . '<span class="current">' . get_the_title() . '</span>';  
			  } else {  
				$cat = get_the_category(); $cat = $cat[0];  
				$cats = get_category_parents($cat, TRUE, $delimiter);  
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);  
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
				echo wp_kses_post( $cats );  
				if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';  
			  }  
		  
			} elseif ( (class_exists( 'WooCommerce' ) && !is_shop()) && !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {  
			  $post_type = get_post_type_object(get_post_type());  
			  echo '<span class="current">' . $post_type->labels->singular_name . '</span>';  
		  
			} elseif ( is_attachment() ) {  
			  $parent = get_post($parent_id);  
			  $cat = get_the_category($parent->ID); $cat = $cat[0];  
			  if ($cat) {  
				$cats = get_category_parents($cat, TRUE, $delimiter);  
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);  
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
				echo wp_kses_post($cats);   
			  }  
			 printf($link, get_permalink($parent), $parent->post_title);  
			  if ($show_current == 1) echo wp_kses_post($delimiter) . '<span class="current">' . get_the_title() . '</span>';  
		  
			} elseif ( is_page() && !$parent_id ) {  
			  if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';  
		  
			} elseif ( is_page() && $parent_id ) {  
			  if ($parent_id != $frontpage_id) {  
				$breadcrumbs = array();  
				while ($parent_id) {  
				  $page = get_page($parent_id);  
				  if ($parent_id != $frontpage_id) {  
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));  
				  }  
				  $parent_id = $page->post_parent;  
				}  
				$breadcrumbs = array_reverse($breadcrumbs);  
				for ($i = 0; $i < count($breadcrumbs); $i++) {  
				  echo wp_kses_post($breadcrumbs[$i]);  
				  if ($i != count($breadcrumbs)-1) echo wp_kses_post($delimiter);  
				}  
			  }  
			  if ($show_current == 1) {  
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo wp_kses_post($delimiter);  
				echo '<span class="current">' . get_the_title() . '</span>';  
			  }  
		  
			} elseif ( is_tag() ) {  
			  echo '<span class="current">' . sprintf($text['tag'], single_tag_title('', false)) . '</span>';  
		  
			} elseif ( is_author() ) {  
			  global $author;  
			  $userdata = get_userdata($author);  
			  echo '<span class="current">' . sprintf($text['author'], $userdata->display_name) . '</span>';  
		  
			} elseif ( is_404() ) {  
			  echo '<span class="current">' . $text['404'] . '</span>';  
		  
			} elseif ( has_post_format() && !is_singular() ) {  
			  echo get_post_format_string( get_post_format() );  
			} elseif (  class_exists( 'WooCommerce' ) ) { 			 
				
			  if(is_shop())	:
			  echo '<span class="current">' . $text['shop'] . '</span>'; 
			  endif;
			}
		  	
			if ( get_query_var('paged') ) {  
			  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';  
			  echo esc_html__('Page','evont') . ' ' . get_query_var('paged');  
			  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';  
			}  
		  
			//echo '</div><!-- .breadcrumbs -->';  
		  
		  }  
		} // end dimox_evont_breadcrumbs()
		
		
		function evont_short_breadcrumbs() {
 
				/* === OPTIONS === */  
		  $text['home']   = 'Home'; // text for the 'Home' link  
		  $text['category'] = 'Archive by Category "%s"'; // text for a category page  
		  $text['search']  = 'Search Results for "%s" Query'; // text for a search results page  
		  $text['tag']   = 'Posts Tagged "%s"'; // text for a tag page  
		  $text['author']  = 'Articles Posted by %s'; // text for an author page  
		  $text['404']   = 'Error 404'; // text for the 404 page
		  $text['shop']   = 'Shop'; // text for the 404 page    
		  
		  $show_current  = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show  
		  $show_on_home  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
		  $show_home_link = 0; // 1 - show the 'Home' link, 0 - don't show  
		  $show_title   = 1; // 1 - show the title for the links, 0 - don't show  
		  $delimiter   = ''; // delimiter between crumbs  
		  $before     = '<span class="current">'; // tag before the current crumb  
		  $after     = '</span>'; // tag after the current crumb  
		  /* === END OF OPTIONS === */  
		  $parent_id='';
		  
		  global $post;  
		  $home_link  = esc_url(home_url('/'));  
		  $link_before = '';  
		  $link_after  = '';  
		  $link_attr  = '';  
		  $link     = '';  
		
		  if (!empty($post)):
		  $parent_id  = $parent_id_2 = $post->post_parent;  
		  endif;
		  
		  $frontpage_id = get_option('page_on_front');  
		  
		  if (is_home() || is_front_page()) {  
		  
			if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';  
		  
		  } else {  
		  
			//echo '<div class="breadcrumbs">';  
			if ($show_home_link == 1) {  
			  echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';  
			  if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo wp_kses_post($delimiter);  
			}  
		  
			if ( is_category() ) {  
			  $this_cat = get_category(get_query_var('cat'), false);  
			  if ($this_cat->parent != 0) {  
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);  
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);  
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
				echo wp_kses_post($cats);    
			  }  
			  if ($show_current == 1) echo '<span class="current">' . sprintf($text['category'], single_cat_title('', false)) . '</span>';  
		  
			} elseif ( is_search() ) {  
			  echo '<span class="current">' . sprintf($text['search'], get_search_query()) . '</span>';  
		  
			} elseif ( is_day() ) {  
			  echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
			  echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;  
			  echo '<span class="current">' . get_the_time('d') . '</span>';  
		  
			} elseif ( is_month() ) {  
			  echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
			  echo '<span class="current">' . get_the_time('F') . '</span>';  
		  
			} elseif ( is_year() ) {  
			  echo '<span class="current">' . get_the_time('Y') . '</span>';  
		  
					
			}elseif ( is_single() && !is_attachment() ) {  
			  if ( get_post_type() != 'post' ) {  
				$post_type = get_post_type_object(get_post_type());  
				$slug = $post_type->rewrite;  
				//printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);  
				if ($show_current == 1) echo wp_kses_post($delimiter) . '<span class="current">' . get_the_title() . '</span>';  
			  } else {  
				$cat = get_the_category(); $cat = $cat[0];  
				$cats = get_category_parents($cat, TRUE, $delimiter);  
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);  
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
				//echo esc_html_e($cats);    
				if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';  
			  }  
		  
			} elseif ( (class_exists( 'WooCommerce' ) && !is_shop()) && !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {  
			  $post_type = get_post_type_object(get_post_type());  
			  echo '<span class="current">' . $post_type->labels->singular_name . '</span>';  
		  
			} elseif ( is_attachment() ) {  
			  $parent = get_post($parent_id);  
			  $cat = get_the_category($parent->ID); $cat = $cat[0];  
			  if ($cat) {  
				$cats = get_category_parents($cat, TRUE, $delimiter);  
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);  
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
				echo wp_kses_post($cats);   
			  }  
			  printf($link, get_permalink($parent), $parent->post_title);  
			  if ($show_current == 1) echo wp_kses_post($delimiter) . '<span class="current">' . get_the_title() . '</span>';  
		  
			} elseif ( is_page() && !$parent_id ) {  
			  if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';  
		  
			} elseif ( is_page() && $parent_id ) {  
			  if ($parent_id != $frontpage_id) {  
				
			  }  
			  if ($show_current == 1) {  
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo wp_kses_post($delimiter);  
				echo '<span class="current">' . get_the_title() . '</span>';  
			  }  
		  
			} elseif ( is_tag() ) {  
			  echo '<span class="current">' . sprintf($text['tag'], single_tag_title('', false)) . '</span>';  
		  
			} elseif ( is_author() ) {  
			  global $author;  
			  $userdata = get_userdata($author);  
			  echo '<span class="current">' . sprintf($text['author'], $userdata->display_name) . '</span>';  
		  
			} elseif ( is_404() ) {  
			  echo '<span class="current">' . $text['404'] . '</span>';  

			} elseif ( class_exists( 'WooCommerce' )) {  
			  
			  if(is_shop())	:
			  echo '<span class="current">' . $text['shop'] . '</span>'; 
			  endif;

			}elseif ( has_post_format() && !is_singular() ) {  
			  echo get_post_format_string( get_post_format() );  
			}  
		  
			if ( get_query_var('paged') ) {  
			  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';  
			  echo esc_html__('Page','evont') . ' ' . get_query_var('paged');  
			  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';  
			}  
		  
			//echo '</div><!-- .breadcrumbs -->';  
		  
		  }  
		} // end dimox_evont_breadcrumbs()
?>