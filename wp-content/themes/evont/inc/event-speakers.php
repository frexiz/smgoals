<!--spaekers area start here-->
    <div class="jx-evont-speakers-area jx-dark">
		
        <div class="jx-evont-event-title">
	        <div class="jx-evont-title">EVENT SPEAKERS</div>
        </div>
<?php		

		$i=0;
		$intro_class='';
		$count ="8";		
		global $evont_data;

		$speaker_id = "";

		if ($speaker_id):				
			$related_speakers = array_map( 'trim', explode( ',', $speaker_id ) );			
			$args = array('post_type' => 'speakers','orderby' => 'post__in', 'showposts' => $count,'post__in' => $related_speakers ); 		
		else:		
			$args = array('post_type' => 'speakers','orderby' => 'date', 'order' => 'ASC','showposts' => $count); 		
		endif;
		
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
		//function code
			
			

		$speaker_permalink='<a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a>';
		
		$teammember_jobposition = get_post_meta(get_the_id(),'jx_evont_speaker_position','evont'); 			

?>


                <div class="jx-evont-speaker-cols">
                <div class="jx-evont-speaker-item">
                <div class="speaker-img"><?php echo get_the_post_thumbnail(get_the_ID(),'evont-small-speaker'); ?></div>
                <h3><?php echo $speaker_permalink ;?></h3>
                </div>
                </div>	
                <!-- Item -->
                        
                <?php			
                    $i++;
                        
                    endwhile;
                    wp_reset_query(); 
                
                ?>
		
	</div>
	<!--spaekers area end here-->