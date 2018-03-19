<?php

extract(JsComposer::shortcode_atts(array(
            'id' => null,
            'title' => ''
                ), $atts));


if(empty($id)) return ;

$context = Context::getContext();
$out_put = '';

$exid = str_replace('-',',',$id);
$exid = substr($exid,strlen($exid)-1) == ',' ? substr($exid,0,-1) : $exid;


$context->controller->addCSS(_THEME_CSS_DIR_ . 'product.css');
$context->controller->addCSS(_THEME_CSS_DIR_ . 'product_list.css');
$context->controller->addCSS(_THEME_CSS_DIR_ . 'print.css', 'print');
$context->controller->addJqueryPlugin(array('fancybox', 'idTabs', 'scrollTo', 'serialScroll', 'bxslider'));
$context->controller->addJS(array(
    _THEME_JS_DIR_ . 'tools.js', // retro compat themes 1.5
//    _THEME_JS_DIR_ . 'product.js'
));

$product = vccontentanywhere::getSelectedProducts($exid);

$context->smarty->assign(
        array(
            'vc_products' => $product,
            'vc_title' => $title,
            'elementprefix' => 'single-product',
        )
);
$template_file_name = JsComposer::getTPLPath('blocknewproducts.tpl');
$out_put .= $context->smarty->fetch($template_file_name);


echo $out_put;