<?php /* Smarty version Smarty-3.1.19, created on 2018-03-03 16:31:35
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/financiacion/views/templates/front/payment_execution.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14456085985a9abfd7b43157-40197747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c30a859e2b31a42e889ab1f42628b057687d9500' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/financiacion/views/templates/front/payment_execution.tpl',
      1 => 1516636145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14456085985a9abfd7b43157-40197747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'nbProducts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9abfd7b70215_33012551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9abfd7b70215_33012551')) {function content_5a9abfd7b70215_33012551($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,"step=3"),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Go back to the Checkout','mod'=>'financiacion'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Checkout','mod'=>'financiacion'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'Pago por financiación','mod'=>'financiacion'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<h2><?php echo smartyTranslate(array('s'=>'Resumen de pedido','mod'=>'financiacion'),$_smarty_tpl);?>
</h2>

<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['nbProducts']->value<=0) {?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'financiacion'),$_smarty_tpl);?>
</p>
<?php } else { ?>

<h3><?php echo smartyTranslate(array('s'=>'Pago por financiación','mod'=>'financiacion'),$_smarty_tpl);?>
</h3>
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getModuleLink('financiacion','validation',array(),true),'html');?>
" method="post">
<p>
	<?php echo smartyTranslate(array('s'=>'Ha elegido pago por financiación','mod'=>'financiacion'),$_smarty_tpl);?>

</p>

<p>
	<?php echo smartyTranslate(array('s'=>'Va a proceder a seleccionar el pago por FINANCIACIÓN, en la siguiente página habiendo confirmado el pedido le daremos más información del proceso','mod'=>'financiacion'),$_smarty_tpl);?>

	<br /><br />
	<b><?php echo smartyTranslate(array('s'=>'Please confirm your order by clicking "I confirm my order".','mod'=>'financiacion'),$_smarty_tpl);?>
</b>
</p>
<p class="cart_navigation" id="cart_navigation">
	<input type="submit" value="<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'financiacion'),$_smarty_tpl);?>
" class="exclusive_large" />
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,"step=3"),'html');?>
" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'financiacion'),$_smarty_tpl);?>
</a>
</p>
</form>
<?php }?>
<?php }} ?>
