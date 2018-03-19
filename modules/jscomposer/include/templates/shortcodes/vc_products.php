<?php

extract(JsComposer::shortcode_atts(array(
    'ids' => null,
    'title' => '',
    'orderby' => 'id_product',
    'order' => 'DESC',
        ), $atts));


if(empty($ids)) return ;

$exid = str_replace('-',',',$ids);
$exid = substr($exid,strlen($exid)-1) == ',' ? substr($exid,0, -1) : $exid;

$context = Context::getContext();
$out_put = '';



$context->controller->addCSS(_THEME_CSS_DIR_ . 'product.css');
$context->controller->addCSS(_THEME_CSS_DIR_ . 'product_list.css');
$context->controller->addCSS(_THEME_CSS_DIR_ . 'print.css', 'print');
$context->controller->addJqueryPlugin(array('fancybox', 'idTabs', 'scrollTo', 'serialScroll', 'bxslider'));
$context->controller->addJS(array(
    _THEME_JS_DIR_ . 'tools.js', // retro compat themes 1.5
//    _THEME_JS_DIR_ . 'product.js'
));

$products = vccontentanywhere::getSelectedProducts($exid, $orderby, $order);

$context->smarty->assign(
        array(
            'vc_products' => $products,
            'vc_title' => $title,
            'elementprefix' => 'single-product',
        )
);
$template_file_name = JsComposer::getTPLPath('blocknewproducts.tpl');
$out_put .= $context->smarty->fetch($template_file_name);


echo $out_put;