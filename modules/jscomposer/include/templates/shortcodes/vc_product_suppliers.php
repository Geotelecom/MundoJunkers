<?php

extract(JsComposer::shortcode_atts(
    array(
        'title' => '',
        'speed'=>'600',
        'maxslide'=>'6',
        'img_size'=>'',
        'slider_type' => 'bxslider'
    ),$atts
));
$context = Context::getContext(); 
$suppliers = Supplier::getSuppliers(false,$context->language->id, true);


$context->smarty->assign(
    array(
        'title' => $title,
        'suppliers' => $suppliers,
        'speed' => $speed,
        'maxslide' => $maxslide,
        'man_img_size' => $img_size,
        'img_sup_dir' => _PS_IMG_.'su/',
        'slider_type' => $slider_type,
        'type' => 'suppliers'
    )
);
if($slider_type == 'flexslider'){
    if(Configuration::get('vc_load_flex_css') != 'no'){
            $context->controller->addCSS(vc_asset_url( 'lib/flexslider/flexslider.css' ));
    }
    if(Configuration::get('vc_load_flex_js') != 'no'){
            $context->controller->addJS(vc_asset_url( 'lib/flexslider/jquery.flexslider-min.js' ));
    }    
}else{
    $context->controller->addJqueryPlugin(array('bxslider'));
}

$output = $context->smarty->fetch(JsComposer::getTPLPath('vc_product_suppliers.tpl'));

echo $output;