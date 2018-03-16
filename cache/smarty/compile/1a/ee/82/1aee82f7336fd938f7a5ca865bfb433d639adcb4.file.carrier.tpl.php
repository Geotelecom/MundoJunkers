<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:33
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/carrier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11484213715a982815a78247-41160708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aee82f7336fd938f7a5ca865bfb433d639adcb4' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/carrier.tpl',
      1 => 1498036241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11484213715a982815a78247-41160708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'link' => 0,
    'is_necessary_postcode' => 0,
    'is_necessary_city' => 0,
    'id_carrier_selected' => 0,
    'nacex_agcli' => 0,
    'IS_VIRTUAL_CART' => 0,
    'hasError' => 0,
    'errors' => 0,
    'error' => 0,
    'delivery_option_list' => 0,
    'option_list' => 0,
    'id_address' => 0,
    'delivery_option' => 0,
    'key' => 0,
    'CONFIGS' => 0,
    'option' => 0,
    'carrier' => 0,
    'ONEPAGECHECKOUTPS_IMG' => 0,
    'cookie' => 0,
    'free_shipping' => 0,
    'use_taxes' => 0,
    'priceDisplay' => 0,
    'display_tax_label' => 0,
    'HOOK_EXTRACARRIER_ADDR' => 0,
    'recyclablePackAllowed' => 0,
    'giftAllowed' => 0,
    'recyclable' => 0,
    'cart' => 0,
    'gift_wrapping_price' => 0,
    'total_wrapping_tax_exc_cost' => 0,
    'total_wrapping_cost' => 0,
    'HOOK_BEFORECARRIER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982815b63e14_17076851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982815b63e14_17076851')) {function content_5a982815b63e14_17076851($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['css_uri']->value,'html','UTF-8');?>
" type="text/css" media="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['media']->value,'html','UTF-8');?>
" />
    <?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['js_uri']->value,'html','UTF-8');?>
"></script>
    <?php } ?>
<?php }?>

<script type="text/javascript">
    var txtProduct = '<?php echo smartyTranslate(array('s'=>'product','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
';
    var txtProducts = '<?php echo smartyTranslate(array('s'=>'products','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
';
    var orderUrl = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true),'htmlall','UTF-8');?>
';
    var is_necessary_postcode = Boolean(<?php if (isset($_smarty_tpl->tpl_vars['is_necessary_postcode']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['is_necessary_postcode']->value);?>
<?php }?>);
    var is_necessary_city = Boolean(<?php if (isset($_smarty_tpl->tpl_vars['is_necessary_city']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['is_necessary_city']->value);?>
<?php }?>);
    var id_carrier_selected = '<?php if (isset($_smarty_tpl->tpl_vars['id_carrier_selected']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['id_carrier_selected']->value,'htmlall','UTF-8');?>
<?php }?>';

    var nacex_agcli = '<?php if (isset($_smarty_tpl->tpl_vars['nacex_agcli']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['nacex_agcli']->value,'htmlall','UTF-8');?>
<?php }?>';

    
        if (is_necessary_postcode)
            $('div#onepagecheckoutps')
                .off('blur', 'input#delivery_postcode', Carrier.getByCountry)
                .on('blur', 'input#delivery_postcode', Carrier.getByCountry);
        if (is_necessary_city)
            $('div#onepagecheckoutps')
                .off('blur', 'input#delivery_city', Carrier.getByCountry)
                .on('blur', 'input#delivery_city', Carrier.getByCountry);
    
</script>

<?php if (isset($_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value)&&$_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value) {?>
    <input id="input_virtual_carrier" class="hidden" type="hidden" name="id_carrier" value="0" />
<?php } else { ?>
    <div id="shipping_container">
        <?php if (($_smarty_tpl->tpl_vars['hasError']->value)) {?>
            <p class="alert alert-warning">
                <?php  $_smarty_tpl->tpl_vars["error"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["error"]->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["error"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["error"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["error"]->key => $_smarty_tpl->tpl_vars["error"]->value) {
$_smarty_tpl->tpl_vars["error"]->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars["error"]->key;
 $_smarty_tpl->tpl_vars["error"]->iteration++;
 $_smarty_tpl->tpl_vars["error"]->last = $_smarty_tpl->tpl_vars["error"]->iteration === $_smarty_tpl->tpl_vars["error"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["f_errors"]['last'] = $_smarty_tpl->tpl_vars["error"]->last;
?>
                    -&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['error']->value,'htmlall','UTF-8');?>

                    <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['f_errors']['last']) {?><br/><br/><?php }?>
                <?php } ?>
            </p>

			<button class="btn btn-default pull-right btn-sm" type="button" onclick="Carrier.getByCountry();">
				<i class="fa-pts fa-pts-refresh"></i>
				<?php echo smartyTranslate(array('s'=>'Reload','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

			</button>
        <?php } else { ?>
            <div class="delivery_options_address">
                <?php if (isset($_smarty_tpl->tpl_vars['delivery_option_list']->value)) {?>
                    <?php  $_smarty_tpl->tpl_vars['option_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option_list']->_loop = false;
 $_smarty_tpl->tpl_vars['id_address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['delivery_option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option_list']->key => $_smarty_tpl->tpl_vars['option_list']->value) {
$_smarty_tpl->tpl_vars['option_list']->_loop = true;
 $_smarty_tpl->tpl_vars['id_address']->value = $_smarty_tpl->tpl_vars['option_list']->key;
?>
                        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['option']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['option']->key;
 $_smarty_tpl->tpl_vars['option']->index++;
?>
                            <div class="delivery_option <?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?>selected alert alert-info<?php }?>">
                                <div class="row pts-vcenter col-xs-12 nopadding">
                                    <div class="col-xs-1">
                                        <input class="delivery_option_radio not_unifrom not_uniform" type="radio" name="delivery_option[<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
]" id="delivery_option_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['option']->index);?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['key']->value,'htmlall','UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?>checked="checked"<?php }?> />
                                    </div><!--
                                    --><div class="delivery_option_logo <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER']&&!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER']) {?>col-xs-8<?php } else { ?>col-md-3 col-xs-2<?php }?>">
                                        <?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['carrier_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['carrier']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['carrier']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier']->iteration++;
 $_smarty_tpl->tpl_vars['carrier']->last = $_smarty_tpl->tpl_vars['carrier']->iteration === $_smarty_tpl->tpl_vars['carrier']->total;
?>
                                            <?php if (($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER'])) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>
                                                    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['logo'],'htmlall','UTF-8');?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->name,'htmlall','UTF-8');?>
" class="img-thumbnail"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['ONEPAGECHECKOUTPS_IMG']->value,'htmlall','UTF-8');?>
shipping.png" class="img-thumbnail"/>
                                                <?php }?>
                                            <?php } else { ?>
                                                <div class="delivery_option_title"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->name,'htmlall','UTF-8');?>
</div>
                                                <?php if (!$_smarty_tpl->tpl_vars['carrier']->last) {?> - <?php }?>
                                            <?php }?>

                                            <?php if ($_smarty_tpl->tpl_vars['carrier']->value['instance']->external_module_name!='') {?>
                                                <input type="hidden" class="module_carrier" name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->external_module_name,'htmlall','UTF-8');?>
" value="delivery_option_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['option']->index);?>
" />
                                                <input type="hidden" name="name_carrier" id="name_carrier_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['option']->index);?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->name,'htmlall','UTF-8');?>
" />
                                            <?php }?>
                                        <?php } ?>
                                    </div><!--
                                    <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER']||$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER']) {?>
                                    --><div class="carrier_delay col-xs-6 col-md-5">
										<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['carrier_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['carrier']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['carrier']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier']->iteration++;
 $_smarty_tpl->tpl_vars['carrier']->last = $_smarty_tpl->tpl_vars['carrier']->iteration === $_smarty_tpl->tpl_vars['carrier']->total;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER']) {?>
                                                <div class="delivery_option_title"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->name,'htmlall','UTF-8');?>
</div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER']) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['carrier']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?>
                                                        <div class="delivery_option_delay">
                                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang],'htmlall','UTF-8');?>

                                                        </div>
                                                    <?php }?>
                                                <?php }?>
                                            <?php }?>
										<?php } ?>
                                        </div><!--
                                    <?php }?>
                                    --><div class="carrier_price col-xs-3">
                                        <div class="delivery_option_price text-right">
                                            <?php if ($_smarty_tpl->tpl_vars['option']->value['total_price_with_tax']&&(!isset($_smarty_tpl->tpl_vars['option']->value['is_free'])||(isset($_smarty_tpl->tpl_vars['option']->value['is_free'])&&!$_smarty_tpl->tpl_vars['option']->value['is_free']))&&(!isset($_smarty_tpl->tpl_vars['free_shipping']->value)||(isset($_smarty_tpl->tpl_vars['free_shipping']->value)&&!$_smarty_tpl->tpl_vars['free_shipping']->value))) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value==1) {?>
													<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
														<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_without_tax']),$_smarty_tpl);?>

														<span class="tax">
															<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
<?php }?>
														</span>
													<?php } else { ?>
														<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_with_tax']),$_smarty_tpl);?>

														<span class="tax">
															<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?> <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
<?php }?>
														</span>
													<?php }?>
                                                <?php } else { ?>
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_without_tax']),$_smarty_tpl);?>

                                                <?php }?>
                                            <?php } else { ?>
                                                <?php echo smartyTranslate(array('s'=>'Free!','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                                            <?php }?>
                                        </div>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['carrier']->value['instance']->external_module_name!=''&&isset($_smarty_tpl->tpl_vars['carrier']->value['extra_info_carrier'])&&isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?>
                                        <div class="extra_info_carrier pull-right" style="display:<?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?>block<?php } else { ?>none<?php }?>">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['carrier']->value['extra_info_carrier'])) {?>
                                                <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['extra_info_carrier'],'quotes','UTF-8');?>
</span>
                                                <br />
                                                <a class="edit_pickup_point" onclick="Carrier.displayPopupModule_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->external_module_name,'htmlall','UTF-8');?>
(<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['instance']->id);?>
)"><?php echo smartyTranslate(array('s'=>'Edit pickup point','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</a>
                                            <?php } else { ?>
                                                <a class="select_pickup_point" onclick="Carrier.displayPopupModule_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['carrier']->value['instance']->external_module_name,'htmlall','UTF-8');?>
(<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['instance']->id);?>
)"><?php echo smartyTranslate(array('s'=>'Select pickup point','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</a>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($_smarty_tpl->tpl_vars['HOOK_EXTRACARRIER_ADDR']->value)&&isset($_smarty_tpl->tpl_vars['HOOK_EXTRACARRIER_ADDR']->value[$_smarty_tpl->tpl_vars['id_address']->value])) {?>
                            <div class="hook_extracarrier" id="HOOK_EXTRACARRIER_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_EXTRACARRIER_ADDR']->value[$_smarty_tpl->tpl_vars['id_address']->value],'htmlall','UTF-8',false,true);?>

                                <div class="clear clearfix">&nbsp;</div>
                            </div>
                        <?php }?>
                    <?php } ?>
                <?php }?>
            </div>

            <?php if ((isset($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value)&&$_smarty_tpl->tpl_vars['recyclablePackAllowed']->value)||(isset($_smarty_tpl->tpl_vars['giftAllowed']->value)&&$_smarty_tpl->tpl_vars['giftAllowed']->value)) {?>
                <div class="row">
                    <?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
                        <div class="col-xs-12">
                            <label for="recyclable">
                                <input type="checkbox" name="recyclable" id="recyclable" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value==1) {?>checked="checked"<?php }?> class="carrier_checkbox not_unifrom not_uniform"/>
                                <?php echo smartyTranslate(array('s'=>'I agree to receive my order in recycled packaging','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                            </label>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['giftAllowed']->value) {?>
                        <div class="col-xs-12">
                            <label for="gift">
                                <input type="checkbox" name="gift" id="gift" value="1" <?php if ($_smarty_tpl->tpl_vars['cart']->value->gift==1) {?>checked="checked"<?php }?> class="carrier_checkbox not_unifrom not_uniform"/>
                                <?php echo smartyTranslate(array('s'=>'I would like the order to be gift-wrapped.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                                &nbsp;
                                <?php if ($_smarty_tpl->tpl_vars['gift_wrapping_price']->value>0) {?>
                                    <span class="price" id="gift-price">
                                        (<?php echo smartyTranslate(array('s'=>'Additional cost of','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                                        <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc_cost']->value),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_cost']->value),$_smarty_tpl);?>
<?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?> <?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
<?php } else { ?> <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
<?php }?><?php }?>)
                                    </span>
                                <?php }?>
                            </label>
                        </div>
                    <?php }?>
                </div>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['giftAllowed']->value)&&$_smarty_tpl->tpl_vars['giftAllowed']->value) {?>
                <div class="row">
                    <div class="col-xs-12">
                        <p id="gift_div_opc" class="textarea <?php if ($_smarty_tpl->tpl_vars['cart']->value->gift!=1) {?>hidden<?php }?>">
                            <label for="gift_message"><?php echo smartyTranslate(array('s'=>'If you wish, you can add a note to the gift:','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</label>
                            <textarea rows="1" id="gift_message" name="gift_message" class="form-control"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['cart']->value->gift_message,'htmlall','UTF-8');?>
</textarea>
                        </p>
                    </div>
                </div>
            <?php }?>

            <div id="HOOK_BEFORECARRIER">
                <?php if (isset($_smarty_tpl->tpl_vars['HOOK_BEFORECARRIER']->value)) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_BEFORECARRIER']->value,'htmlall','UTF-8',false,true);?>

                <?php }?>
            </div>
        <?php }?>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('./custom_html/carrier.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
