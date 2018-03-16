<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:28
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/theme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7593371975a982810301303-46668633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7ece35ea508466db978f67589f2d3763fb217fa' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/theme.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7593371975a982810301303-46668633',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'paramsFront' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9828103c9744_61239112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9828103c9744_61239112')) {function content_5a9828103c9744_61239112($_smarty_tpl) {?>

<style>
    
    #order_step, #order_steps, div.order_delivery{
        display:none;
    }
    
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BACKGROUND_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BACKGROUND_COLOR'])) {?>
        #onepagecheckoutps {
            background: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BACKGROUND_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
        .loading_small, .loading_big, .modal-backdrop, .lock_controls {
            background-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BACKGROUND_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'])) {?>
        #onepagecheckoutps #onepagecheckoutps_contenedor {
            border: 1px solid <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
        
        div#onepagecheckoutps div#onepagecheckoutps_step_review #order-detail-content .image_zoom{
            border: 2px solid <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_ICON_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_ICON_COLOR'])) {?>
        div#onepagecheckoutps .onepagecheckoutps_p_step i.fa-pts {
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_ICON_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_TEXT_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_TEXT_COLOR'])) {?>
        #onepagecheckoutps a,
        #onepagecheckoutps span,
        #onepagecheckoutps label,
        #onepagecheckoutps h5,
        #onepagecheckoutps h4,
        #onepagecheckoutps h3,
        #onepagecheckoutps h2,
        #onepagecheckoutps h1,
        #onepagecheckoutps div,
        #onepagecheckoutps p{
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_TEXT_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_COLOR'])) {?>
        #onepagecheckoutps .module_payment_container.selected.alert.alert-info,
        #onepagecheckoutps .delivery_option.selected.alert.alert-info {
            background-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_COLOR'],'htmlall','UTF-8');?>
 !important;
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_TEXT_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_TEXT_COLOR'])) {?>
        #onepagecheckoutps .module_payment_container.selected.alert.alert-info,
        #onepagecheckoutps .delivery_option.selected.alert.alert-info {
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_SELECTED_TEXT_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_COLOR'])) {?>
        #onepagecheckoutps #btn_place_order,
        #onepagecheckoutps #payment_modal #cart_navigation button,
        #onepagecheckoutps #btn_save_customer {
            background: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_COLOR'],'htmlall','UTF-8');?>
 !important;
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_TEXT_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_TEXT_COLOR'])) {?>
        #onepagecheckoutps #btn_place_order i.fa, #onepagecheckoutps #btn_place_order,
        #onepagecheckoutps #payment_modal #cart_navigation button i, #onepagecheckoutps #payment_modal #cart_navigation button,
        #onepagecheckoutps #btn_save_customer i.fa, #onepagecheckoutps #btn_save_customer {
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_TEXT_COLOR'],'htmlall','UTF-8');?>
 !important;
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_CONFIRM_TEXT_COLOR'],'htmlall','UTF-8');?>
 !important;
        }
        #onepagecheckoutps #btn_place_order:hover,
        #onepagecheckoutps #payment_modal #cart_navigation button:hover,
        #onepagecheckoutps #btn_save_customer:hover {
            opacity: 0.8;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON'])) {?>
        #onepagecheckoutps #opc_show_login{
            background: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON'],'htmlall','UTF-8');?>
 !important;
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON_TEXT'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON_TEXT'])) {?>
        #onepagecheckoutps #opc_show_login{
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_ALREADY_REGISTER_BUTTON_TEXT'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON'])) {?>
        #onepagecheckoutps #form_login #btn_login{
            background: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON'],'htmlall','UTF-8');?>
 !important;
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON_TEXT'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON_TEXT'])) {?>
        #onepagecheckoutps #form_login #btn_login{
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_LOGIN_BUTTON_TEXT'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON'])) {?>
        #onepagecheckoutps #list-voucher-allowed #submitAddDiscount{
            background: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON'],'htmlall','UTF-8');?>
 !important;
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON_TEXT'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON_TEXT'])) {?>
        #onepagecheckoutps #list-voucher-allowed #submitAddDiscount{
            color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_VOUCHER_BUTTON_TEXT'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_BACKGROUND_BUTTON_FOOTER'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_BACKGROUND_BUTTON_FOOTER'])) {?>
        div#onepagecheckoutps div#onepagecheckoutps_step_review .stick_buttons_footer{
            background-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_BACKGROUND_BUTTON_FOOTER'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_BUTTON_FOOTER'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_BUTTON_FOOTER'])) {?>
        div#onepagecheckoutps div#onepagecheckoutps_step_review .stick_buttons_footer{
            border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_BUTTON_FOOTER'],'htmlall','UTF-8');?>
 !important;
        }
    <?php }?>

    @media (max-width: 992px) {
        #order-detail-content .cart_item {
            <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'])&&!empty($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'])) {?>
                border-bottom: 1px solid <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['paramsFront']->value['CONFIGS']['OPC_THEME_BORDER_COLOR'],'htmlall','UTF-8');?>
;
            <?php } else { ?>
                border-bottom: 1px solid #d6d4d4;
            <?php }?>
        }
    }

</style>
<script type="text/javascript">
    <?php if (isset($_smarty_tpl->tpl_vars['paramsFront']->value['paypal_ec_canceled'])&&$_smarty_tpl->tpl_vars['paramsFront']->value['paypal_ec_canceled']) {?>
        window.location = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true),'htmlall','UTF-8');?>
";
    <?php }?>
</script><?php }} ?>
