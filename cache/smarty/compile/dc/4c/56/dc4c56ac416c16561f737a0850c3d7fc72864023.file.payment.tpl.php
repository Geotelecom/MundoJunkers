<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:967843615a98281156dd41-40960191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc4c56ac416c16561f737a0850c3d7fc72864023' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/payment.tpl',
      1 => 1498036251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '967843615a98281156dd41-40960191',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'register_customer' => 0,
    'classes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982811575e16_80749064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982811575e16_80749064')) {function content_5a982811575e16_80749064($_smarty_tpl) {?>

<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
    <div id="onepagecheckoutps_step_three_container" class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['classes']->value,'htmlall','UTF-8');?>
">
        <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
        <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_three">
            <i class="fa-pts fa-pts-credit-card fa-pts-3x"></i>
            <?php echo smartyTranslate(array('s'=>'Payment method','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

        </h5>
        <div id="onepagecheckoutps_step_three"></div>
    </div>
<?php }?><?php }} ?>
