<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 22:38:35
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/realexredirect/views/templates/front/payment_execution.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12349835975a9872dbdee116-13310532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94464a6248e8f90b8032ef285ff1cd0055b50a62' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/realexredirect/views/templates/front/payment_execution.tpl',
      1 => 1516636124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12349835975a9872dbdee116-13310532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nbProducts' => 0,
    'error' => 0,
    'total' => 0,
    'use_taxes' => 0,
    'realvault' => 0,
    'payer_exists' => 0,
    'input_registered' => 0,
    'submit_new' => 0,
    'selectAccount' => 0,
    'account' => 0,
    'input_new' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9872dbe4f604_55811049',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9872dbe4f604_55811049')) {function content_5a9872dbe4f604_55811049($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Order Payment','mod'=>'realexredirect'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h3><?php echo smartyTranslate(array('s'=>'Order summary','mod'=>'realexredirect'),$_smarty_tpl);?>
</h3>

<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['nbProducts']->value<=0) {?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'realexredirect'),$_smarty_tpl);?>
</p>
<?php } else { ?>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
	<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['error']->value,'htmlall','UTF-8');?>
</p>
<?php }?>
<p>
    <strong><?php echo smartyTranslate(array('s'=>'You have chosen to pay by Credit or Debit card.','mod'=>'realexredirect'),$_smarty_tpl);?>
</strong>
</p>
<p>
	<?php echo smartyTranslate(array('s'=>'The total amount of your order is','mod'=>'realexredirect'),$_smarty_tpl);?>

	<span id="amount" class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl);?>
</span>
	<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value==1) {?>
		<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'realexredirect'),$_smarty_tpl);?>

	<?php }?>
</p>

<?php if ($_smarty_tpl->tpl_vars['realvault']->value=="1"&&$_smarty_tpl->tpl_vars['payer_exists']->value=="1") {?>
<div class="bloc_registered_card">
	<h4><?php echo smartyTranslate(array('s'=>'Registered card','mod'=>'realexredirect'),$_smarty_tpl);?>
</h4>
	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?> <br/><span class="error"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['error']->value,'htmlall','UTF-8');?>
</span><br/><br/><?php }?>
	<?php if (!empty($_smarty_tpl->tpl_vars['input_registered']->value)) {?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['input_registered']->value,'','UTF-8');?>

	<?php } else { ?>
	<?php echo smartyTranslate(array('s'=>'No card registered','mod'=>'realexredirect'),$_smarty_tpl);?>

	<?php }?>
</div>
<?php }?>

<div class="bloc_new_card">
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['submit_new']->value,'htmlall','UTF-8');?>
" method="post">
		<h4><?php echo smartyTranslate(array('s'=>'New card','mod'=>'realexredirect'),$_smarty_tpl);?>
</h4>
		<?php echo smartyTranslate(array('s'=>'Please select your card type','mod'=>'realexredirect'),$_smarty_tpl);?>
<br/> 
		<select name='ACCOUNT'>
			<?php  $_smarty_tpl->tpl_vars['account'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['account']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectAccount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['account']->key => $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->_loop = true;
?>
				<option value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['account']->value['account'],'htmlall','UTF-8');?>
'>
					<?php if ($_smarty_tpl->tpl_vars['account']->value['card']=="MC") {?>
						MASTERCARD
						<?php } elseif ($_smarty_tpl->tpl_vars['account']->value['card']=="AMEX") {?>
						AMERICAN EXPRESS
						<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['account']->value['card'],'htmlall','UTF-8');?>

					<?php }?>
					
				</option>
			<?php } ?>
		</select>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['input_new']->value,'','UTF-8');?>

	</form>
</div>

<div style="padding-top:10px; padding-bottom:10px">
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,"step=3"),'htmlall','UTF-8');?>
" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'realexredirect'),$_smarty_tpl);?>
</a>
</div>
<?php }?>
<?php }} ?>
