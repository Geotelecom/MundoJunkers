<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 08:14:15
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/pdf/invoice.addresses-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17325023185a98f9c77bd763-37335209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c91ffa075d640bbddb74754df003e8c58aa9e6f' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/pdf/invoice.addresses-tab.tpl',
      1 => 1493215123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17325023185a98f9c77bd763-37335209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
    'delivery_address' => 0,
    'invoice_address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98f9c77d4428_92036498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98f9c77d4428_92036498')) {function content_5a98f9c77d4428_92036498($_smarty_tpl) {?>
<table id="addresses-tab" cellspacing="0" cellpadding="0">
	<tr>
		<td width="33%"><span class="bold"> </span><br/><br/>
			<?php if (isset($_smarty_tpl->tpl_vars['order_invoice']->value)) {?><?php echo $_smarty_tpl->tpl_vars['order_invoice']->value->shop_address;?>
<?php }?>
		</td>
		<td width="33%"><?php if ($_smarty_tpl->tpl_vars['delivery_address']->value) {?><span class="bold"><?php echo smartyTranslate(array('s'=>'Delivery Address','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
				<?php echo $_smarty_tpl->tpl_vars['delivery_address']->value;?>

			<?php }?>
		</td>
		<td width="33%"><span class="bold"><?php echo smartyTranslate(array('s'=>'Billing Address','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
				<?php echo $_smarty_tpl->tpl_vars['invoice_address']->value;?>

		</td>
	</tr>
</table>
<?php }} ?>
