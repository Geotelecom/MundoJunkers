<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/financiacion/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16509925775a9828163a1418-73694184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '258f6977612c3925f1f9268776b849e882f2dc44' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/financiacion/views/templates/hook/payment.tpl',
      1 => 1516636145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16509925775a9828163a1418-73694184',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path_bw' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9828163e3bc7_10705184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9828163e3bc7_10705184')) {function content_5a9828163e3bc7_10705184($_smarty_tpl) {?><p class="payment_module">
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getModuleLink('financiacion','payment'),'html');?>
" title="<?php echo smartyTranslate(array('s'=>'Pago por financiación','mod'=>'financiacion'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_bw']->value;?>
financiacion.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pago por financiación','mod'=>'financiacion'),$_smarty_tpl);?>
" width="86" height="49"/>
		<?php echo smartyTranslate(array('s'=>'Pago por financiación','mod'=>'financiacion'),$_smarty_tpl);?>

	</a>
</p><?php }} ?>
