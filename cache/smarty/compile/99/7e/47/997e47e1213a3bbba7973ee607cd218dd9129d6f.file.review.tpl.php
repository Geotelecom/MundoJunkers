<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15441540915a9828164866a5-80347397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '997e47e1213a3bbba7973ee607cd218dd9129d6f' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15441540915a9828164866a5-80347397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONFIGS' => 0,
    'total_shipping_tax_exc' => 0,
    'virtualCart' => 0,
    'free_ship' => 0,
    'products' => 0,
    'product' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'gift_products' => 0,
    'mega' => 0,
    'attributewizardpro' => 0,
    'last_was_odd' => 0,
    'discounts' => 0,
    'discount' => 0,
    'priceDisplay' => 0,
    'total_products' => 0,
    'use_taxes' => 0,
    'total_products_wt' => 0,
    'display_tax_label' => 0,
    'value_total_products' => 0,
    'total_discounts' => 0,
    'total_discounts_tax_exc' => 0,
    'total_discounts_negative' => 0,
    'total_wrapping' => 0,
    'total_wrapping_tax_exc' => 0,
    'total_shipping' => 0,
    'total_price_without_tax' => 0,
    'total_tax' => 0,
    'total_price' => 0,
    'COD_FEE' => 0,
    'total_price_cod' => 0,
    'BNKPLUS_DISCOUNT' => 0,
    'total_price_bnkplus' => 0,
    'PAYPAL_FEE' => 0,
    'total_price_paypal' => 0,
    'TPV_FEE' => 0,
    'total_price_tpv' => 0,
    'SEQURA_FEE' => 0,
    'total_price_sequra' => 0,
    'voucherAllowed' => 0,
    'discount_name' => 0,
    'displayVouchers' => 0,
    'voucher' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98281658b502_45368814',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98281658b502_45368814')) {function content_5a98281658b502_45368814($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/function.math.php';
?>

<?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_REMAINING_FREE_SHIPPING']) {?>
    <?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value>0&&!isset($_smarty_tpl->tpl_vars['virtualCart']->value)&&$_smarty_tpl->tpl_vars['free_ship']->value>0) {?>
        <div class="alert alert-info text-center">
            <?php echo smartyTranslate(array('s'=>'Remaining amount to be added to your cart in order to obtain free shipping','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:
            <span id="free_shipping"><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['free_ship']->value),$_smarty_tpl);?>
</b></span>
        </div>
    <?php }?>
<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBeforeShoppingCartBlock"),$_smarty_tpl);?>


<div id="header-order-detail-content" class="row hidden-xs hidden-sm">
    <div class="col-md-<?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_UNIT_PRICE']) {?>4<?php } else { ?>6<?php }?> col-md-offset-1">
        <h5><?php echo smartyTranslate(array('s'=>'Description','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_UNIT_PRICE']) {?>
        <div class="col-md-2">
            <h5 class="text-right"><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
        </div>
    <?php }?>
    <div class="col-md-3">
        <h5 class="text-center"><?php echo smartyTranslate(array('s'=>'Qty','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
    </div>
    <div class="col-md-2">
        <h5 class="text-right"><?php echo smartyTranslate(array('s'=>'Total','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
    </div>
</div>
<div id="order-detail-content">
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sortby'][0][0]->smartyModifierSortby($_smarty_tpl->tpl_vars['products']->value,'name'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        <?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->iteration%2, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['ignoreProductLast'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||count($_smarty_tpl->tpl_vars['gift_products']->value), null, 0);?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['productmega'])) {?>
            <?php  $_smarty_tpl->tpl_vars['mega'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mega']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['productmega']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mega']->key => $_smarty_tpl->tpl_vars['mega']->value) {
$_smarty_tpl->tpl_vars['mega']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("./review_product_line_megaproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('CONFIGS'=>$_smarty_tpl->tpl_vars['CONFIGS']->value,'productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first,'mega'=>$_smarty_tpl->tpl_vars['mega']->value), 0);?>

            <?php } ?>
        <?php } else { ?>
			<?php if (isset($_smarty_tpl->tpl_vars['attributewizardpro']->value)) {?>
				<?php echo $_smarty_tpl->getSubTemplate ("./review_product_line_awp.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('CONFIGS'=>$_smarty_tpl->tpl_vars['CONFIGS']->value,'productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

			<?php } else { ?>
				<?php echo $_smarty_tpl->getSubTemplate ("./review_product_line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('CONFIGS'=>$_smarty_tpl->tpl_vars['CONFIGS']->value,'productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

			<?php }?>
        <?php }?>
    <?php } ?>
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sortby'][0][0]->smartyModifierSortby($_smarty_tpl->tpl_vars['gift_products']->value,'name'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        <?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->iteration+$_smarty_tpl->tpl_vars['last_was_odd']->value)%2, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['ignoreProductLast'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['cannotModify'] = new Smarty_variable(1, null, 0);?>
        
        <?php echo $_smarty_tpl->getSubTemplate ("./review_product_line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

    <?php } ?>

    <div class="nopadding order_total_items">
        <?php if (sizeof($_smarty_tpl->tpl_vars['discounts']->value)) {?>
            <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
                <div class="row middle item_total cart_discount end-xs" id="cart_discount_<?php echo intval($_smarty_tpl->tpl_vars['discount']->value['id_discount']);?>
">
                    <div class="col-xs-8 col-md-10 text-right">
                        <span class="bold cart_discount_name text-right">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['discount']->value['name'],'htmlall','UTF-8');?>
:
                        </span>
                    </div>
                    <div class="col-xs-4 col-md-2 cart_discount_price text-right">
                        <span class="price-discount price">
                            <?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])) {?>
                                <i class="fa-pts fa-pts-trash-o cart_quantity_delete pull-left"
                                   onclick="Review.processDiscount({'id_discount' : <?php echo intval($_smarty_tpl->tpl_vars['discount']->value['id_discount']);?>
, 'action' : 'delete'})"></i>
                            <?php }?>
                            <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?>
                        </span>
                    </div>
                </div>
            <?php } ?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_PRODUCT']) {?>
            <?php $_smarty_tpl->tpl_vars['value_total_products'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_products']->value, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                <?php $_smarty_tpl->tpl_vars['value_total_products'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_products_wt']->value, null, 0);?>
            <?php }?>
            <div class="row middle item_total cart_total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right row end-xs">
                        <?php echo smartyTranslate(array('s'=>'Total products','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                                <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                            <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                            <?php }?>
                        <?php }?>
                        :
                    </span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="total_product">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['value_total_products']->value),$_smarty_tpl);?>

                    </span>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_DISCOUNT']) {?>
            <div class="row middle item_total cart_total_voucher <?php if ($_smarty_tpl->tpl_vars['total_discounts']->value==0) {?>hidden<?php }?> end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right row end-xs">
                        <?php echo smartyTranslate(array('s'=>'Total vouchers','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                                <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                            <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                            <?php }?>
                        <?php }?>
                        :
                    </span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price-discount price" id="total_discount">
                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                            <?php $_smarty_tpl->tpl_vars['total_discounts_negative'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_discounts']->value*-1, null, 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars['total_discounts_negative'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_discounts_tax_exc']->value*-1, null, 0);?>
                        <?php }?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_discounts_negative']->value),$_smarty_tpl);?>

                    </span>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_WRAPPING']) {?>
            <div class="row middle item_total cart_total_voucher <?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value==0) {?>hidden<?php }?> end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right row end-xs">
                        <?php echo smartyTranslate(array('s'=>'Total gift-wrapping','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['use_taxes']->value&&!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                        <?php }?>:
                    </span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price-discount price" id="total_discount">
                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping']->value),$_smarty_tpl);?>

                            <?php }?>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

                        <?php }?>
                    </span>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_SHIPPING']) {?>
            <div class="row middle item_total cart_total_delivery end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right row end-xs">
                        <?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0&&!isset($_smarty_tpl->tpl_vars['virtualCart']->value)) {?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['use_taxes']->value&&!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span><?php }?>
                        <?php }?>:
                    </span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="total_shipping">
                        <?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0&&!isset($_smarty_tpl->tpl_vars['virtualCart']->value)) {?>
                            <?php echo smartyTranslate(array('s'=>'Free Shipping!','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['use_taxes']->value&&!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping']->value),$_smarty_tpl);?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value),$_smarty_tpl);?>

                        <?php }?>
                    </span>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_WITHOUT_TAX']) {?>
            <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
                <div class="row middle item_total cart_total_price total_without_tax end-xs">
                    <div class="col-xs-8 col-md-10 text-right">
                        <span class="bold text-right row end-xs">
                            <?php echo smartyTranslate(array('s'=>'Total','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                            <span class="tax">&nbsp;<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>:
                        </span>
                    </div>
                    <div class="col-xs-4 col-md-2 text-right">
                        <span class="price" id="total_price_without_tax"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
</span>
                    </div>
                </div>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_TAX']) {?>
            <div class="row middle item_total cart_total_tax end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total tax','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="total_tax"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_tax']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_TOTAL_PRICE']) {?>
            <div class="row middle item_total cart_total_price total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total amount of your purchase','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="bold price" id="total_price">
                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price']->value),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
<?php }?>
                    </span>
                </div>
            </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['COD_FEE']->value)) {?>
            <div class="row middle item_total cod_fee cart_total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'COD Fee','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="price_cod_fee"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['COD_FEE']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
            <div class="row middle item_total cod_fee cart_total_price total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total + COD Fee','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <?php echo smarty_function_math(array('assign'=>"total_price_cod",'equation'=>'a + b','a'=>$_smarty_tpl->tpl_vars['total_price']->value,'b'=>$_smarty_tpl->tpl_vars['COD_FEE']->value),$_smarty_tpl);?>

                    <span class="price" id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_cod']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['BNKPLUS_DISCOUNT']->value)) {?>
            <div class="row middle item_total bnkplus_discount cart_total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Discount Bank Wire','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="price_bnkplus_discount"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['BNKPLUS_DISCOUNT']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
            <div class="row middle item_total cart_total_price total_price bnkplus_discount end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total - Discount Bank Wire','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <?php echo smarty_function_math(array('assign'=>"total_price_bnkplus",'equation'=>'a - b','a'=>$_smarty_tpl->tpl_vars['total_price']->value,'b'=>$_smarty_tpl->tpl_vars['BNKPLUS_DISCOUNT']->value),$_smarty_tpl);?>

                    <span class="price" id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_bnkplus']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['PAYPAL_FEE']->value)) {?>
            <div class="row middle item_total paypal_fee cart_total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Paypal Fee','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="price_paypal_fee"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['PAYPAL_FEE']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
            <div class="row middle item_total cart_total_price total_price paypal_fee end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total + Paypal Fee','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <?php echo smarty_function_math(array('assign'=>"total_price_paypal",'equation'=>'a + b','a'=>$_smarty_tpl->tpl_vars['total_price']->value,'b'=>$_smarty_tpl->tpl_vars['PAYPAL_FEE']->value),$_smarty_tpl);?>

                    <span class="price" id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_paypal']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
        <?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['TPV_FEE']->value)) {?>
            <div class="row middle item_total tpv_fee cart_total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'TPV Fee','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="price_tpv_fee"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['TPV_FEE']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
            <div class="row middle item_total cart_total_price total_price tpv_fee end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total + TPV Fee','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <?php echo smarty_function_math(array('assign'=>"total_price_tpv",'equation'=>'a + b','a'=>$_smarty_tpl->tpl_vars['total_price']->value,'b'=>$_smarty_tpl->tpl_vars['TPV_FEE']->value),$_smarty_tpl);?>

                    <span class="price" id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_tpv']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['SEQURA_FEE']->value)) {?>
            <div class="row middle item_total sequra_fee cart_total_price end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Administration fees payment in 7 days','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <span class="price" id="price_sequra_fee"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['SEQURA_FEE']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
            <div class="row middle item_total cart_total_price total_price sequra_fee end-xs">
                <div class="col-xs-8 col-md-10 text-right">
                    <span class="bold text-right"><?php echo smartyTranslate(array('s'=>'Total fees incl','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:</span>
                </div>
                <div class="col-xs-4 col-md-2 text-right">
                    <?php echo smarty_function_math(array('assign'=>"total_price_sequra",'equation'=>'a + b','a'=>$_smarty_tpl->tpl_vars['total_price']->value,'b'=>$_smarty_tpl->tpl_vars['SEQURA_FEE']->value),$_smarty_tpl);?>

                    <span class="price" id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_sequra']->value),$_smarty_tpl);?>
</span>
                </div>
            </div>
        <?php }?>
        <div class="row middle item_total extra_fee cart_total_price end-xs hidden">
            <div class="col-xs-8 col-md-10 text-right">
                <span class="bold text-right" id="extra_fee_label"></span>
            </div>
            <div class="col-xs-4 col-md-2 text-right">
                <span class="price" id="extra_fee_price"></span>
            </div>
        </div>
        <div class="row middle item_total cart_total_price total_price extra_fee end-xs hidden">
            <div class="col-xs-8 col-md-10 text-right">
                <span class="bold text-right" id="extra_fee_total_price_label"></span>
            </div>
            <div class="col-xs-4 col-md-2 text-right">
                <span class="price" id="extra_fee_total_price"></span>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?>
            <div class="row cart_total_price" id="list-voucher-allowed">
                <div class="col-xs-12 col-md-6 nopadding">
                    <div class="row col-xs-8 col-md-8 pts-vcenter">
                        <div class="col-xs-6 col-sm-5 col-md-5">
                            <span class="bold"><?php echo smartyTranslate(array('s'=>'Voucher','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>
                        </div><!--
                        --><div class="col-xs-6 col-sm-7 col-md-7 nopadding-xs">
                            <input type="text" class="discount_name form-control" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->tpl_vars['discount_name']->value)&&$_smarty_tpl->tpl_vars['discount_name']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['discount_name']->value,'htmlall','UTF-8');?>
<?php }?>" />
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <span type="button" id="submitAddDiscount" name="submitAddDiscount" class="btn btn-default btn-small">
                            <?php echo smartyTranslate(array('s'=>'Add','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        </span>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['displayVouchers']->value) {?>
                    <div class="col-xs-12 col-md col-lg-4">
                        <div id="display_cart_vouchers">
                            <ul>
                                <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayVouchers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
                                    <li>
                                        <span data-code="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['voucher']->value['code'],'htmlall','UTF-8');?>
" class="voucher_name">
                                            <i class="fa-pts fa-pts-caret-right"></i>
                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['voucher']->value['code'],'htmlall','UTF-8');?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['voucher']->value['name'],'htmlall','UTF-8');?>

                                        </span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    </div>
</div><?php }} ?>
