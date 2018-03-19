<?php
$type = $url = '';
extract(JsComposer::shortcode_atts(array(
    'type' => 'standard',//standard, button_count, box_count
    'url' => ''
), $atts));
$id_cms = Tools::getValue('id_cms');
if ( $url == '') $url = JsComposer::getCMSLink($id_cms);
$css_class =  'fb_like wpb_content_element fb_type_' . $type;

$output = '<div class="'.$css_class.'"><iframe src="http://www.facebook.com/plugins/like.php?href='.$url.'&amp;layout='.$type.'&amp;show_faces=false&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>'.$this->endBlockComment('fb_like')."\n";

echo $output;