<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 10:14:31
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/backoffice/themes/default/template/controllers/products/helpers/tree/tree_toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11360555095a9915f7afac80-45272471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99deb43adaf46bb0c8495398d3831dd740cdd88f' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/backoffice/themes/default/template/controllers/products/helpers/tree/tree_toolbar.tpl',
      1 => 1493212376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11360555095a9915f7afac80-45272471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'actions' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9915f7b8fd12_62397102',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9915f7b8fd12_62397102')) {function content_5a9915f7b8fd12_62397102($_smarty_tpl) {?>
<div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php } ?>
	<?php }?>
</div><?php }} ?>
