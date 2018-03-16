<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4110347965a98281678dac7-72305369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9223847d827fea8ceac0cc6700bc5e424b85033d' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review_footer.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4110347965a98281678dac7-72305369',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_option_allow_separate_package' => 0,
    'cart' => 0,
    'oldMessage' => 0,
    'CONFIGS' => 0,
    'checkedTOS' => 0,
    'total_price' => 0,
    'HOOK_SHOPPING_CART' => 0,
    'HOOK_SHOPPING_CART_EXTRA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9828167b8701_45180768',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9828167b8701_45180768')) {function content_5a9828167b8701_45180768($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['show_option_allow_separate_package']->value) {?>
    <p>
        <input type="checkbox" class="not_unifrom not_uniform" name="allow_seperated_package" id="allow_seperated_package" <?php if ($_smarty_tpl->tpl_vars['cart']->value->allow_seperated_package) {?>checked="checked"<?php }?> />
        <label for="allow_seperated_package"><?php echo smartyTranslate(array('s'=>'Send the available products first','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</label>
    </p>
<?php }?>

<div class="row clear clearfix"></div>

<div id="div_leave_message">
    <p><?php echo smartyTranslate(array('s'=>'If you would like to add a comment about your order, please write it below.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</p>
    <textarea name="message" id="message" class="form-control" rows="2"><?php if (isset($_smarty_tpl->tpl_vars['oldMessage']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['oldMessage']->value,'htmlall','UTF-8');?>
<?php }?></textarea>
</div>

<span id="container_float_review_point"></span>

<div id="container_float_review">
    <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_TERMS_CONDITIONS']) {?>
        <div id="div_cgv">
            <p id="p_cgv">
                <label for="cgv">
                    <input type="checkbox" class="not_unifrom not_uniform" name="cgv" id="cgv" value="1" <?php if ($_smarty_tpl->tpl_vars['checkedTOS']->value) {?>checked="checked"<?php }?>/>
                    <?php echo smartyTranslate(array('s'=>'I agree to the terms of service.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                    <span class="read"><?php echo smartyTranslate(array('s'=>'(read)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>
                </label>
            </p>
        </div>
    <?php }?>

    <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_PAYMENTS_WITHOUT_RADIO']||$_smarty_tpl->tpl_vars['total_price']->value<=0) {?>
        <div id="buttons_footer_review" class="row">
            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_LINK_CONTINUE_SHOPPING']) {?>
                <div class="start-xs col-xs-12 col-md-4 nopadding">
                    <button type="button" id="btn_continue_shopping" class="btn btn-default pull-left"
                            <?php if (!empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_LINK_CONTINUE_SHOPPING'])) {?>data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_LINK_CONTINUE_SHOPPING'],'htmlall','UTF-8');?>
"<?php }?>>
                        <i class="fa-pts fa-pts-chevron-left fa-pts-1x"></i>
                        <?php echo smartyTranslate(array('s'=>'Continue shopping','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                    </button>
                </div>
            <?php }?>
            <div class="end-xs col-xs-12 col-md-4 <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_LINK_CONTINUE_SHOPPING']) {?>col-md-push-8<?php } else { ?>col-md-push-4<?php }?> col-sm-offset-0 nopadding-xs">
                <button type="button" id="btn_place_order" class="btn btn-primary btn-lg pull-right" >
                    <i class="fa-pts fa-pts-shopping-cart fa-pts-1x"></i>
                    <?php echo smartyTranslate(array('s'=>'Checkout','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                </button>
            </div>
        </div>
    <?php }?>
</div>

<?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_HOOK_SHOPPING_CART']&&!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_COMPATIBILITY_REVIEW']&&!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_PAYMENTS_WITHOUT_RADIO']) {?>
    <div id="HOOK_SHOPPING_CART" class="row"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART']->value,'html','UTF-8',false,true);?>
</div>
    <p class="cart_navigation_extra row">
        <span id="HOOK_SHOPPING_CART_EXTRA"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART_EXTRA']->value,'html','UTF-8',false,true);?>
</span>
    </p>
<?php }?>

<div class="row">
    <?php echo $_smarty_tpl->getSubTemplate ('./custom_html/review.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><?php }} ?>
