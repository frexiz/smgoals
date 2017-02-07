<?php 
	/* Media Box  ---------------------------------------------*/
	
	add_shortcode('blog', 'evont_blog');
	
	function evont_blog($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'post_count' => ''
					
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$image_size ='evont-small-blog';
		global $wp_embed;
		global $data;
		
		

			

		

					switch($type){ 
					case '1':
					$out .='<!--blog section start here-->
							<div class="jx-evont-blog-section small">
								<div class="row">';					
					
								$args = array('post_type' => 'post','orderby' => 'date', 'order' => 'DESC','showposts' => 3 ); 
					$loop = new WP_Query( $args ); 		
					while ( $loop->have_posts() ) : $loop->the_post();  
								
						$categories = get_the_category(); 
						$cat_name = $categories[0]->cat_name;
							
					//function code
						switch(get_post_format()) {
							case 'link':
								$format_post_class = 'link';
								break;
							case 'image':
								$format_post_class = 'photo';
								break;
							case 'quote':
								$format_post_class = 'quote-left';
								break;
							case 'video':
								$format_post_class = 'video-camera';
								break;
							case 'audio':
								$format_post_class = 'volume-up';
								break;
							case 'Aside':
								$format_post_class = 'comments';
								break;
							default:
								$format_post_class = 'file-text-o';
								break;
						}
					
						$post_image_id = get_post_thumbnail_id(get_the_id());
						$image_url = wp_get_attachment_image_src($post_image_id, 'large');
						$image_small = wp_get_attachment_image_src($post_image_id, $image_size);
						
						if($image_small[0]):
						$show_img='';
						endif;
					
						$out .='
						<div class="blog-item">
							<div class="col-sm-4">
							  
								<div class="blog-img">
									<img src="'.$image_small[0].'" alt="">
									<!-- IMAGE -->                    
				
									<div class="overlay">
										<div class="overlay-inner">
											<div class="blog-hover-icon"><a href="'.esc_url( get_permalink()).'"><i class="fa fa-plus"></i></a></div>
										</div>
									</div>
									
									<div class="jx-evont-blog-date">
										<div class="day">'.get_the_time('d').'</div>
										<div class="month">'.get_the_time('M').' '.get_the_time('Y').'</div>
									</div>
									<!-- DATE -->						
								</div>
							
								
								<h3><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a></h3>
								
								<div class="entry-meta">
									<ul>
										<li><span><i class="fa fa-user"></i>'.get_the_author().'</span></li>
										<li><span><i class="fa fa-folder-open"></i>'.$cat_name.'</span></li>
										<li><span><i class="fa fa-comment"></i>'.get_comments_number(esc_html__('0 Comments', 'evont'), esc_html__('1 Comment', 'evont'), '(%) '.esc_html__('Comments', 'evont')).'</span></li>
									</ul>
								</div>
											 
								<p>'.evont_excerpt(15).'</p>
								<div class="readmore"><a href="'.esc_url( get_permalink()).'">'.esc_html__('Read More','evont').'</a></div>
												
							</div>
						</div>';	


					endwhile;

					$out .='</div></div>
						<!--blog section end here-->';
					
					break;
					
					case '2':


					$out .='<!--blog section start here-->
							<div class="jx-evont-news">
								<div class="row">';					
						
								$i="0";
								
								$args = array('post_type' => 'post','orderby' => 'date', 'order' => 'DESC','showposts' => 3 ); 
								$loop = new WP_Query( $args ); 		
								while ( $loop->have_posts() ) : $loop->the_post();  
											
									$categories = get_the_category(); 
									$cat_name = $categories[0]->cat_name;
										
								//function code

								
									$post_image_id = get_post_thumbnail_id(get_the_id());
									$image_url = wp_get_attachment_image_src($post_image_id, 'large');
									$image_small = wp_get_attachment_image_src($post_image_id, $image_size);
									
									if($image_small[0]):
									$show_img='';
									endif;
									
									if($i==0):
									$out .='<div class="vc_col-sm-8">';									
									elseif($i==2):
									$out .='<div class="vc_col-sm-4">';
									endif;
									
									if($i==0):
									$news_content_color="white-bg";	
									$news_image_pos ="image-left";
									$news_content_pos ="content-right";								
									elseif($i==1):
									$news_content_color="default-bg";
									$news_image_pos ="image-right";
									$news_content_pos ="content-left";
									endif;
									
									if($i<=1):
										$news_column="grid-horizontal";
										$col_class="vc_col-sm-8";
									else:
										$news_column="grid-vertical";
										$col_class="vc_col-sm-4";
									endif;
								
									$out .='
									<div class="'.$news_column.'">
										<div class="item">
										  
											<div class="news-img '.$news_image_pos.'">
												<img src="'.$image_small[0].'" alt="">
											</div>
											<!-- IMAGE -->                    
											<div class="news-details '.$news_content_color.' '.$news_content_pos.'">
												<div class="date">'.get_the_time('F d, Y').'</div>								
												<!-- DATE -->														
												<h3><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a></h3>
												<!-- TITLE -->											 
												<p>'.evont_excerpt(15).'</p>
												<!-- DESCRIPTION -->
												<div class="readmore"><a href="'.esc_url( get_permalink()).'">'.esc_html__('Read More','evont').' <i class="fa fa-long-arrow-right"></i></a></div>
											</div>
											<!-- DETAILS -->
											                    
										</div>
									</div>';	
									
									if($i==1):
									$out .='</div>';									
									elseif($i==2):
									$out .='</div>';
									endif;
									
									$i++;
							endwhile;
		
						$out .='</div></div>
						<!--blog section end here-->';
						
						
					break;
					
					case '3':


					$out .='<!--blog section start here-->
							<div class="jx-evont-blog-section style-3">
								<div class="row">';					
					
								$args = array('post_type' => 'post','orderby' => 'date', 'order' => 'DESC','showposts' => 3 ); 
					$loop = new WP_Query( $args ); 		
					while ( $loop->have_posts() ) : $loop->the_post();  
								
						$categories = get_the_category(); 
						$cat_name = $categories[0]->cat_name;
							
					//function code
						switch(get_post_format()) {
							case 'link':
								$format_post_class = 'link';
								break;
							case 'image':
								$format_post_class = 'photo';
								break;
							case 'quote':
								$format_post_class = 'quote-left';
								break;
							case 'video':
								$format_post_class = 'video-camera';
								break;
							case 'audio':
								$format_post_class = 'volume-up';
								break;
							case 'Aside':
								$format_post_class = 'comments';
								break;
							default:
								$format_post_class = 'file-text-o';
								break;
						}
					
						$post_image_id = get_post_thumbnail_id(get_the_id());
						$image_url = wp_get_attachment_image_src($post_image_id, 'large');
						$image_small = wp_get_attachment_image_src($post_image_id, $image_size);
						
						if($image_small[0]):
						$show_img='';
						endif;
					
						$out .='
						<div class="col-sm-4">
							<div class="blog-item">
								<div class="section-title">'.esc_html__('News','evont').'</div>
								<h3><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a></h3>		 
								<p>'.evont_excerpt(15).'</p>
								<div class="date">'.get_the_time('F d, Y').'</div>								
								<!-- DATE -->				
							</div>
						</div>';	


					endwhile;

					$out .='</div></div>
						<!--blog section end here-->';						

					}
			
			wp_reset_query(); 
		//return output
		return $out;

	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_blog' );
	
	
	function vc_blog() {	
		vc_map(array(
      "name" => esc_html__( "Blog", "evont" ),
      "base" => "blog",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_news.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Blog','evont'),
      "params" => array(
		 		 

        
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("Select Style",'evont'),
			 "param_name" => "type",
			 "value" => array(   
				__('Select Style', 'evont') => 'none',
				__('Select 1', 'evont') => '1',
				__('Select 2', 'evont') => '2',
				__('Select 3', 'evont') => '3',
					),
		),
		
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Post Count", "evont" ),
            "param_name" => "post_count",
			"value" => "3",
            "description" => esc_html__( "Set post numbers", "evont" )
         )
		 
		
      )
   )); 
	}
?>