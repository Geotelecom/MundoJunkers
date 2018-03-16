<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 08:14:15
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/pdf/invoice.note-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19587421085a98f9c7910c61-25908793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0658fb451747e7b14b25ee00c8c423c40f1fccb2' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/pdf/invoice.note-tab.tpl',
      1 => 1493215124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19587421085a98f9c7910c61-25908793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98f9c791c3b4_77520693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98f9c791c3b4_77520693')) {function content_5a98f9c791c3b4_77520693($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['order_invoice']->value->note)&&$_smarty_tpl->tpl_vars['order_invoice']->value->note) {?>
	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="6" class="left">
			<table id="note-tab" style="width: 100%">
				<tr>
					<td class="grey"><?php echo smartyTranslate(array('s'=>'Note','pdf'=>'true'),$_smarty_tpl);?>
</td>
				</tr>
				<tr>
					<td class="note"><?php echo nl2br($_smarty_tpl->tpl_vars['order_invoice']->value->note);?>
</td>
				</tr>
			</table>
		</td>
		<td colspan="1">&nbsp;</td>
	</tr>
<?php }?>
<?php }} ?>
