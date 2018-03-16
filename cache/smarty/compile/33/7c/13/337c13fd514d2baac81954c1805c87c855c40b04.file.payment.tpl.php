<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/bankwire/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12204864445a98281635d7d1-03471623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337c13fd514d2baac81954c1805c87c855c40b04' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/bankwire/views/templates/hook/payment.tpl',
      1 => 1516636154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12204864445a98281635d7d1-03471623',
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
  'unifunc' => 'content_5a982816392386_50086425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982816392386_50086425')) {function content_5a982816392386_50086425($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getModuleLink('bankwire','payment'),'html');?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_bw']->value;?>
bankwire.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
" width="86" height="49"/>
		<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
&nbsp;<span><?php echo smartyTranslate(array('s'=>'(order processing will be longer)','mod'=>'bankwire'),$_smarty_tpl);?>
</span>
	</a>
</p><?php }} ?>
