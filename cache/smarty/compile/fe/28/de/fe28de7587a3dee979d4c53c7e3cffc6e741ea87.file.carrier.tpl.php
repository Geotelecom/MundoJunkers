<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/carrier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21294157455a98281155fdb4-91903258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe28de7587a3dee979d4c53c7e3cffc6e741ea87' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/carrier.tpl',
      1 => 1498036251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21294157455a98281155fdb4-91903258',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'register_customer' => 0,
    'classes' => 0,
    'IS_VIRTUAL_CART' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98281156add9_26945232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98281156add9_26945232')) {function content_5a98281156add9_26945232($_smarty_tpl) {?>

<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
    <div id="onepagecheckoutps_step_two_container" class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['classes']->value,'htmlall','UTF-8');?>
 <?php if (isset($_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value)&&$_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value) {?>hidden<?php }?>">
        <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
        <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_two">
            <i class="fa-pts fa-pts-truck fa-pts-3x"></i>
            <?php echo smartyTranslate(array('s'=>'Shipping method','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

        </h5>
        <div id="onepagecheckoutps_step_two"></div>
    </div>
<?php }?><?php }} ?>
