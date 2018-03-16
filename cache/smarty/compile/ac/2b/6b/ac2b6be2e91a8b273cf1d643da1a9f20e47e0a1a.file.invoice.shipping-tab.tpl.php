<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 08:14:15
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/pdf/invoice.shipping-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:400157325a98f9c7964320-78318349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac2b6be2e91a8b273cf1d643da1a9f20e47e0a1a' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/pdf/invoice.shipping-tab.tpl',
      1 => 1493215124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '400157325a98f9c7964320-78318349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'carrier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98f9c79699e3_45690001',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98f9c79699e3_45690001')) {function content_5a98f9c79699e3_45690001($_smarty_tpl) {?>
<table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo smartyTranslate(array('s'=>'Carrier','pdf'=>'true'),$_smarty_tpl);?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }} ?>
