<?php

extract(JsComposer::shortcode_atts(array(
            'id_category' => null,
            'title' => '',
            'page' => '0',
            'per_page' => '12',
            'orderby' => 'position',
            'order' => 'DESC',
            'display_type' => 'grid',
                ), $atts));
if (empty($id_category))
    return;
$context = Context::getContext();

$cache_products = vccontentanywhere::getProductsByCategoryID($id_category, null, null, $per_page, $orderby, $order);

$context->controller->addCSS(_THEME_CSS_DIR_ . 'product.css');
$context->controller->addCSS(_THEME_CSS_DIR_ . 'product_list.css');
$context->controller->addCSS(_THEME_CSS_DIR_ . 'print.css', 'print');
$context->controller->addJqueryPlugin(array('fancybox', 'idTabs', 'scrollTo', 'serialScroll', 'bxslider'));
$context->controller->addJS(array(
    _THEME_JS_DIR_ . 'tools.js', // retro compat themes 1.5
//    _THEME_JS_DIR_ . 'product.js'
));

$context->smarty->assign(
        array(
            'vc_products' => $cache_products,
            'vc_title' => $title,
            'elementprefix' => 'productbycat',
        )
);
if ($display_type == 'sidebar')
    $output = $context->smarty->fetch(JsComposer::getTPLPath('blockviewed.tpl'));
else
    $output = $context->smarty->fetch(JsComposer::getTPLPath('blocknewproducts.tpl'));

echo $output;