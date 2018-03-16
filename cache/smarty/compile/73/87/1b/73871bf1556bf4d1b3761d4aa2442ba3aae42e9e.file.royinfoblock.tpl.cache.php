<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:47
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/royinfoblock/royinfoblock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6228066365a9823370c48a7-22972489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73871bf1556bf4d1b3761d4aa2442ba3aae42e9e' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/royinfoblock/royinfoblock.tpl',
      1 => 1493214263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6228066365a9823370c48a7-22972489',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'infos' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823370f6094_69155353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823370f6094_69155353')) {function content_5a9823370f6094_69155353($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['infos']->value)>0) {?>
<!-- Roy Info Block -->
<div id="royinfoblock">
		<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
			<div class="col-xs-6 pull-right"><?php echo $_smarty_tpl->tpl_vars['info']->value['text'];?>
</div>
		<?php } ?>
		<div class="triangle">&nbsp;</div>
</div>
<!-- /Roy Info Block -->
<?php }?><?php }} ?>
