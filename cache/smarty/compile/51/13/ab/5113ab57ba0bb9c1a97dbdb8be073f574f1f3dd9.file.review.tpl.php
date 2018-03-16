<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/review.tpl" */ ?>
<?php /*%%SmartyHeaderCode:926962465a982811578de9-33365923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5113ab57ba0bb9c1a97dbdb8be073f574f1f3dd9' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/review.tpl',
      1 => 1498036250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '926962465a982811578de9-33365923',
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
  'unifunc' => 'content_5a982811581061_31283088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982811581061_31283088')) {function content_5a982811581061_31283088($_smarty_tpl) {?>

<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
    <div id="onepagecheckoutps_step_review_container" class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['classes']->value,'htmlall','UTF-8');?>
">
        <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
        <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_four">
            <i class="fa-pts fa-pts-check fa-pts-3x"></i>
            <?php echo smartyTranslate(array('s'=>'Order Summary','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

        </h5>
        <div id="onepagecheckoutps_step_review"></div>
    </div>
<?php }?><?php }} ?>
