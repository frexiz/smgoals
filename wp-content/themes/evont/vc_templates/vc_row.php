<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $el_id = $div_wrapper = '';
extract(shortcode_atts(array(
    'el_class' =>'no-padding',
	'el_class_2' =>'no',
    'el_id'        => '',
	'el_cls'        => '',
    'div_wrapper'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'fullwidth'         => 'no',
    'margin_bottom'   => '',
	'row_pattern'   => '',
    'css' => ''
), $atts));




    wp_enqueue_style( 'js_composer_front' );
    wp_enqueue_script( 'wpb_composer_front_js' );
    wp_enqueue_style('js_composer_custom_css');
    
    $pattern='';

    $hand_sec = rand();

    $el_id =  $el_id?$el_id:'id'.$hand_sec;

   // $class_parallax = '';
//    
//
//    if( (int)$bg_image_custom > 0 && wp_get_attachment_url( $bg_image_custom, 'large' ) !== false ){
//       $class_parallax = 'parallax';
//    }
    

    $el_cls = $this->getExtraClass($el_cls);
	$el_class = $this->getExtraClass($el_class);
	$el_class_2 = $this->getExtraClass($el_class_2);
	$row_pattern = $this->getExtraClass($row_pattern);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row vc_row-fluid' . $el_cls . $el_class . $el_class_2 .$row_pattern.  vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	//$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
    $bg_image_vc = 0;
    $style = $this->buildStyle($bg_image_vc, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

     
    $output .='<section id="'.$el_id.'" class="'.$css_class.''.$style.'">';
      

            if($fullwidth == 'no'){
                $output .= '<div class="container"><div class="row">';
            }
			
			if($fullwidth == 'yes'){
                $output .= '<div class="container-fluid"><div class="row">';
            }

            $output .= wpb_js_remove_wpautop($content);

            if($fullwidth == 'no'){
                $output .='</div></div>';
            }
			
            if($fullwidth == 'yes'){
                $output .='</div></div>';
            }

           

    $output .='</section>'.$this->endBlockComment('row');



echo $output;