<?php /* Smarty version Smarty-3.1.19, created on 2018-03-06 11:48:39
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/backoffice/themes/default/template/helpers/list/list_action_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16983432805a9e7207c70928-99661661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f5db95e8dd7d6a933eb3aff14631b0bafdb6ffb' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/backoffice/themes/default/template/helpers/list/list_action_default.tpl',
      1 => 1493212312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16983432805a9e7207c70928-99661661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9e7207c9f0c4_69895192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9e7207c9f0c4_69895192')) {function content_5a9e7207c9f0c4_69895192($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['name']->value)) {?> name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['name']->value,'html','UTF-8');?>
"<?php }?> class="default">
	<i class="icon-asterisk"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>
