<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review_product_line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17480151935a982816592e78-41642964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cf66b9247a5b916e731ac1568f9347d3fee4a4e' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review_product_line.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17480151935a982816592e78-41642964',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'productLast' => 0,
    'ignoreProductLast' => 0,
    'productFirst' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'quantityDisplayed' => 0,
    'product' => 0,
    'link' => 0,
    'CONFIGS' => 0,
    'array_product_attributes' => 0,
    'attribute' => 0,
    'mega' => 0,
    'onepagecheckoutps' => 0,
    'PS_STOCK_MANAGEMENT' => 0,
    'priceDisplay' => 0,
    'currency' => 0,
    'priceReduction' => 0,
    'symbol' => 0,
    'cannotModify' => 0,
    'cart_quantity_displayed' => 0,
    'custom_data' => 0,
    'id_customization' => 0,
    'odd' => 0,
    'gift_products' => 0,
    'custom_item' => 0,
    'custom_text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9828166de170_66032541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9828166de170_66032541')) {function content_5a9828166de170_66032541($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/function.math.php';
?>

<div class="row <?php if (isset($_smarty_tpl->tpl_vars['productLast']->value)&&$_smarty_tpl->tpl_vars['productLast']->value&&(!isset($_smarty_tpl->tpl_vars['ignoreProductLast']->value)||!$_smarty_tpl->tpl_vars['ignoreProductLast']->value)) {?>last_item<?php } elseif (isset($_smarty_tpl->tpl_vars['productFirst']->value)&&$_smarty_tpl->tpl_vars['productFirst']->value) {?>first_item<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?>alternate_item<?php }?> cart_item address_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
     id="product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_0_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>_gift<?php }?>">
    <div class="col-md-1 col-xs-3 text-center nopadding-xs image_product">
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']),'htmlall','UTF-8');?>
">
            <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'small_default'),'htmlall','UTF-8');?>
"
                 alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['name'],'htmlall','UTF-8');?>
" class="img-thumbnail" />
            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_ZOOM_IMAGE_PRODUCT']) {?><i class="fa-pts fa-pts-search fa-pts-1x"></i><?php }?>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_ZOOM_IMAGE_PRODUCT']) {?>
            <div class="image_zoom">
                <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'),'htmlall','UTF-8');?>
"
                     alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['name'],'htmlall','UTF-8');?>
"/>
            </div>
        <?php }?>
    </div>
    <div class="col-md-<?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_UNIT_PRICE']) {?>4<?php } else { ?>6<?php }?> col-xs-9">
        <p class="s_title_block">
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']),'htmlall','UTF-8');?>
">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['name'],'htmlall','UTF-8');?>

            </a>
        </p>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])&&$_smarty_tpl->tpl_vars['product']->value['attributes']) {?>
            <span class="product_attributes">
                
				<?php $_smarty_tpl->tpl_vars['array_product_attributes'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['product']->value['attributes']), null, 0);?>

				<?php  $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['array_product_attributes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->key => $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->_loop = true;
?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['attribute']->value,'htmlall','UTF-8');?>
<br/>
				<?php } ?>
            </span>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value['reference']&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_REFERENCE']) {?>
            <span class="product_reference row">
                <?php echo smartyTranslate(array('s'=>'Ref.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['reference'],'htmlall','UTF-8');?>

            </span>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value['weight']!=0&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_WEIGHT']) {?>
            <span class="product_weight row">
                <?php echo smartyTranslate(array('s'=>'Weight','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
&nbsp;:&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(sprintf("%.3f",$_smarty_tpl->tpl_vars['product']->value['weight']),'htmlall','UTF-8');?>
<?php echo smartyTranslate(array('s'=>'Kg','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

            </span>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['productmega'])) {?>
            <?php  $_smarty_tpl->tpl_vars['mega'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mega']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['productmega']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mega']->key => $_smarty_tpl->tpl_vars['mega']->value) {
$_smarty_tpl->tpl_vars['mega']->_loop = true;
?>
                <?php if (isset($_smarty_tpl->tpl_vars['mega']->value['extraAttrLong'])&&$_smarty_tpl->tpl_vars['mega']->value['extraAttrLong']) {?>
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category']),'htmlall','UTF-8');?>
">
                    <?php if (isset($_smarty_tpl->tpl_vars['mega']->value['extraAttrLong'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['mega']->value['extraAttrLong'],'quotes','UTF-8');?>
<?php }?>
                </a>
            <?php }?>
            <br/>
            <i><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['mega']->value['measure'],'htmlall','UTF-8');?>
</i>
            <?php if (isset($_smarty_tpl->tpl_vars['mega']->value['personalization'])&&$_smarty_tpl->tpl_vars['mega']->value['personalization']!='') {?>
                <br/>
                <div class="mp-personalization"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['mega']->value['personalization'],'quotes','UTF-8');?>
</div>
            <?php }?>
            <?php } ?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['onepagecheckoutps']->value->isProductFreeShipping($_smarty_tpl->tpl_vars['product']->value['id_product'])) {?>
            <b><?php echo smartyTranslate(array('s'=>'Product with free shipping.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</b>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_AVAILABILITY']) {?>
            <div class="cart_avail">
                <span class="label<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_available']<=0&&isset($_smarty_tpl->tpl_vars['product']->value['allow_oosp'])&&!$_smarty_tpl->tpl_vars['product']->value['allow_oosp']) {?> label-danger<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['quantity_available']<=0) {?> label-warning<?php } else { ?> label-success<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_available']<=0) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['allow_oosp'])&&$_smarty_tpl->tpl_vars['product']->value['allow_oosp']) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['available_later'])&&$_smarty_tpl->tpl_vars['product']->value['available_later']) {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['available_later'],'htmlall','UTF-8');?>

                            <?php } else { ?>
                                <?php echo smartyTranslate(array('s'=>'In Stock','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                            <?php }?>
                        <?php } else { ?>
                            <?php echo smartyTranslate(array('s'=>'Out of stock','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php }?>
                    <?php } else { ?>
                        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['available_now'])&&$_smarty_tpl->tpl_vars['product']->value['available_now']) {?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['available_now'],'htmlall','UTF-8');?>

                        <?php } else { ?>
                            <?php echo smartyTranslate(array('s'=>'In Stock','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php }?>
                    <?php }?>
                </span>
                <?php if (!$_smarty_tpl->tpl_vars['product']->value['is_virtual']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductDeliveryTime",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>
<?php }?>
            </div>
        <?php }?>
    </div>

    <div class="visible-xs visible-sm row clear"></div>

    <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_UNIT_PRICE']) {?>
        <div class="col-xs-3 text-right visible-xs visible-sm">
            <label><b><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</b></label>
        </div>
        <div class="col-md-2 col-xs-9 text-right text-left-xs text-left-sm">
            <span class="" id="product_price_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>_nocustom<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>_gift<?php }?>">
                <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
                    <span class="gift-icon"><?php echo smartyTranslate(array('s'=>'Gift!','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>
                <?php } else { ?>
                    <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                        <span class="price<?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_discounted'])&&$_smarty_tpl->tpl_vars['product']->value['is_discounted']) {?> special-price<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_wt']),$_smarty_tpl);?>
</span>
                    <?php } else { ?>
                        <span class="price<?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_discounted'])&&$_smarty_tpl->tpl_vars['product']->value['is_discounted']) {?> special-price<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
</span>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_discounted'])&&$_smarty_tpl->tpl_vars['product']->value['is_discounted']&&isset($_smarty_tpl->tpl_vars['product']->value['reduction_applies'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_applies']) {?>
                        <br/>
                        <span class="old-price">
                            <?php if ($_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']!=0) {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']),$_smarty_tpl);?>

                                <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction_type'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_type']=='amount') {?>
                                        <?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['price_wt']-$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable($_smarty_tpl->tpl_vars['currency']->value->sign, null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable((($_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']-$_smarty_tpl->tpl_vars['product']->value['price_wt'])/$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price'])*100*-1, null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable('%', null, 0);?>
                                    <?php }?>
                                <?php } else { ?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction_type'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_type']=='amount') {?>
                                        <?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['price']-$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable($_smarty_tpl->tpl_vars['currency']->value->sign, null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable((($_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']-$_smarty_tpl->tpl_vars['product']->value['price'])/$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price'])*100*-1, null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable('%', null, 0);?>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['priceReduction']->value<0) {?>
                                    <span class="price-percent-reduction small">
                                        <?php if ($_smarty_tpl->tpl_vars['symbol']->value=='%') {?>
                                            (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(sprintf("%d",round($_smarty_tpl->tpl_vars['priceReduction']->value)),'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['symbol']->value,'htmlall','UTF-8');?>
)
                                        <?php } else { ?>
                                            (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(sprintf("%.2f",$_smarty_tpl->tpl_vars['priceReduction']->value),'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['symbol']->value,'htmlall','UTF-8');?>
)
                                        <?php }?>
                                    </span>
                                <?php }?>
                            <?php }?>
                        </span>
                    <?php }?>
                <?php }?>
            </span>
        </div>
    <?php }?>

    <div class="visible-xs visible-sm row clear"></div>

    <div class="col-xs-3 text-right visible-xs visible-sm">
        <label><b><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</b></label>
    </div>
    <div class="col-md-3 col-xs-9">
        <?php if (isset($_smarty_tpl->tpl_vars['cannotModify']->value)&&$_smarty_tpl->tpl_vars['cannotModify']->value==1) {?>
            <span>
                <?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
                    <?php echo intval(count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]));?>

                <?php } else { ?>
                    <?php echo smarty_function_math(array('assign'=>"cart_quantity_displayed",'equation'=>'a - b','a'=>$_smarty_tpl->tpl_vars['product']->value['cart_quantity'],'b'=>$_smarty_tpl->tpl_vars['quantityDisplayed']->value),$_smarty_tpl);?>

                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['cart_quantity_displayed']->value,'htmlall','UTF-8');?>

                <?php }?>
            </span>
        <?php } else { ?>
            <?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?>
                <span id="cart_quantity_custom_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="quantity_custom"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'],'htmlall','UTF-8',false,true);?>
</span>
            <?php }?>
            <?php if (!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||$_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>
                <div class="row text-center">
                    <div class="cart_quantity nopadding-xs">
                        <?php $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_variable('0', null, 0);?>
                        <?php $_smarty_tpl->tpl_vars['product_quantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['cart_quantity']-intval($_smarty_tpl->tpl_vars['quantityDisplayed']->value), null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("./review_product_line_update_quantity.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                </div>
            <?php }?>
        <?php }?>
    </div>

    <div class="visible-xs visible-sm row clear"></div>

    <div class="col-xs-3 text-right visible-xs visible-sm">
        <label><b><?php echo smartyTranslate(array('s'=>'Total','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</b></label>
    </div>
    <div class="col-md-2 col-xs-9 text-right text-left-xs text-left-sm">
        <span class="price" id="total_product_price_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>_gift<?php }?>">
            <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
                <span class="gift-icon"><?php echo smartyTranslate(array('s'=>'Gift!','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>
            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
                    <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization_wt']),$_smarty_tpl);?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization']),$_smarty_tpl);?>

                    <?php }?>
                <?php } else { ?>
                    <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_wt']),$_smarty_tpl);?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total']),$_smarty_tpl);?>

                    <?php }?>
                <?php }?>
            <?php }?>
        </span>
    </div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
    <?php $_smarty_tpl->tpl_vars['custom_data'] = new Smarty_variable($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']], null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['custom_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['custom_item']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['custom_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['custom_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['custom_item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['custom_item']->key => $_smarty_tpl->tpl_vars['custom_item']->value) {
$_smarty_tpl->tpl_vars['custom_item']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['custom_item']->key;
 $_smarty_tpl->tpl_vars['custom_item']->iteration++;
 $_smarty_tpl->tpl_vars['custom_item']->last = $_smarty_tpl->tpl_vars['custom_item']->iteration === $_smarty_tpl->tpl_vars['custom_item']->total;
?>
        <div id="product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="row cart_item product_customization_for_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if ($_smarty_tpl->tpl_vars['odd']->value) {?> odd<?php } else { ?> even<?php }?> customization alternate_item <?php if ($_smarty_tpl->tpl_vars['product']->last&&$_smarty_tpl->tpl_vars['custom_item']->last&&!count($_smarty_tpl->tpl_vars['gift_products']->value)) {?>last_item<?php }?>">
            <div class="custom-information">
                <div class="col-md-6 col-xs-12 col-md-offset-1 col-xs-offset-0">
                    <?php  $_smarty_tpl->tpl_vars['custom_text'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['custom_text']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['custom_item']->value['datas'][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['custom_text']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['custom_text']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_custom_value']['total'] = $_smarty_tpl->tpl_vars['custom_text']->total;
foreach ($_from as $_smarty_tpl->tpl_vars['custom_text']->key => $_smarty_tpl->tpl_vars['custom_text']->value) {
$_smarty_tpl->tpl_vars['custom_text']->_loop = true;
 $_smarty_tpl->tpl_vars['custom_text']->iteration++;
 $_smarty_tpl->tpl_vars['custom_text']->last = $_smarty_tpl->tpl_vars['custom_text']->iteration === $_smarty_tpl->tpl_vars['custom_text']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_custom_value']['last'] = $_smarty_tpl->tpl_vars['custom_text']->last;
?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['custom_text']->value['name'])) {?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['custom_text']->value['name'],'htmlall','UTF-8');?>
&colon;&nbsp;
                        <?php }?>
                        &quot;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['custom_text']->value['value'],'htmlall','UTF-8');?>
&quot;
                        <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['f_custom_value']['last']&&$_smarty_tpl->getVariable('smarty')->value['foreach']['f_custom_value']['total']>1) {?><br /><?php }?>
                    <?php } ?>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="row text-center">
                        <div class="cart_quantity nopadding-xs">
                            <?php $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_variable($_smarty_tpl->tpl_vars['id_customization']->value, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['product_quantity'] = new Smarty_variable(intval($_smarty_tpl->tpl_vars['custom_item']->value['quantity']), null, 0);?>
                            <?php echo $_smarty_tpl->getSubTemplate ("./review_product_line_update_quantity.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php }?>
<?php }} ?>
