<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:46
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/roypaymentlogo/roypaymentlogo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10425072935a98233603d843-25179874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e64e830097d692d6b8b6f15073e1e5bc44531ae' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/roypaymentlogo/roypaymentlogo.tpl',
      1 => 1493215254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10425072935a98233603d843-25179874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_payement_logo' => 0,
    'link' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982336048e36_24724714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982336048e36_24724714')) {function content_5a982336048e36_24724714($_smarty_tpl) {?>

<!-- Block payment logo module -->
<div id="roy_payment_logo_block_footer" class="roy_payment_logo_block">

	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getCMSLink($_smarty_tpl->tpl_vars['cms_payement_logo']->value),'html');?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
paymentlogo_visa.png" class="pl_visa" alt="visa" title="visa" width="50" height="30" />
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
paymentlogo_mastercard.png" class="pl_mastercard" alt="mastercard" title="mastercard" width="50" height="30" />
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
paymentlogo_maestro.png" class="pl_maestro" alt="maestro" title="maestro" width="50" height="30" />
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
paymentlogo_discover.png" class="pl_discover" alt="discover" title="discover" width="50" height="30" />
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
paymentlogo_paypal.png" class="pl_paypal" alt="paypal" title="paypal" width="50" height="30" />
	</a>
</div>
<!-- /Block payment logo module --><?php }} ?>
