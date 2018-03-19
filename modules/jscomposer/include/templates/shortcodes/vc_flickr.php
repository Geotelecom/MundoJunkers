<?php
$vc_manager = vc_manager();
$output = '';
extract(JsComposer::shortcode_atts(array(
    'el_class' => '',
    'title' => '',
    'flickr_id' => '95572727@N00',
    'count' => '6',
    'type' => 'user',
    'display' => 'latest'
), $atts));

$el_class = $this->getExtraClass( $el_class );
$css_class =  'wpb_flickr_widget wpb_content_element' . $el_class;

$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_flickr_heading'));
$output .= "\n\t\t\t".'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='. $count . '&amp;display='. $display .'&amp;size=s&amp;layout=x&amp;source='. $type .'&amp;'. $type .'='. $flickr_id .'"></script>';
$output .= "\n\t\t\t".'<p class="flickr_stream_wrap"><a class="wpb_follow_btn wpb_flickr_stream" href="http://www.flickr.com/photos/'. $flickr_id .'">'.$vc_manager->l("View stream on flickr").'</a></p>';
$output .= "\n\t\t".'</div>'.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div>'.$this->endBlockComment('.wpb_flickr_widget')."\n";

echo $output;
