<?php
class WPBakeryShortCode_VC_Pinterest extends WPBakeryShortCode {
    protected function contentInline( $atts, $content = null ) {
        extract(JsComposer::shortcode_atts(array(
            'type' => 'horizontal'
        ), $atts));
//        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_social-placeholder wpb_pinterest wpb_content_element vc_socialtype-' . $type, $this->settings['base'], $atts );

        $css_class = 'vc_social-placeholder wpb_pinterest wpb_content_element vc_socialtype-' . $type;
        return '<div class="'.$css_class.'"></div>';
    }
}