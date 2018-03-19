<?php
$type = '';
extract(JsComposer::shortcode_atts(array(
    'type' => 'horizontal'//horizontal, vertical, none
), $atts));

$css_class =  'twitter-share-button';

$output = '<a href="http://twitter.com/share" class="'.$css_class.'" data-count="'.$type.'">'. vc_manager()->l("Tweet", "js_composer") .'</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>'.$this->endBlockComment('tweetmeme')."\n";

echo $output;