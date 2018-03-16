<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 17:38:13
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/bankwire/views/templates/hook/payment_return.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4164783215a997df5665165-51332783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2680c1a370163fad170c92948b71d31655333cc' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/bankwire/views/templates/hook/payment_return.tpl',
      1 => 1517474676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4164783215a997df5665165-51332783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'total_to_pay_ga' => 0,
    'shop_name' => 0,
    'total_to_pay' => 0,
    'bankwireOwner' => 0,
    'bankwireDetails' => 0,
    'reference' => 0,
    'id_order' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a997df56ca0d7_88921012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a997df56ca0d7_88921012')) {function content_5a997df56ca0d7_88921012($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['status']->value=='ok') {?>
<!-- Google Code for Conversiones en el Sitio Web Conversion Page -->
<script type="text/javascript" data-keepinline="true">
/* <![CDATA[ */
var google_conversion_id = 831463243;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "GFnICPGg_nUQy768jAM";
var google_conversion_value = <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_to_pay_ga']->value);?>
;
var google_conversion_currency = "EUR";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" data-keepinline="true" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/831463243/?value=<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_to_pay_ga']->value);?>
&amp;currency_code=EUR&amp;label=GFnICPGg_nUQy768jAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

	<div class="box">
		<p class="cheque-indent">
			<strong class="dark"><?php echo smartyTranslate(array('s'=>'Your order on %s is complete.','sprintf'=>$_smarty_tpl->tpl_vars['shop_name']->value,'mod'=>'bankwire'),$_smarty_tpl);?>
</strong>
		</p>
		<?php echo smartyTranslate(array('s'=>'Please send us a bank wire with','mod'=>'bankwire'),$_smarty_tpl);?>

		<br />- <?php echo smartyTranslate(array('s'=>'Amount','mod'=>'bankwire'),$_smarty_tpl);?>
 <span class="price"> <strong><?php echo $_smarty_tpl->tpl_vars['total_to_pay']->value;?>
</strong></span>
		<br />- <?php echo smartyTranslate(array('s'=>'Name of account owner','mod'=>'bankwire'),$_smarty_tpl);?>
  <strong><?php if ($_smarty_tpl->tpl_vars['bankwireOwner']->value) {?><?php echo $_smarty_tpl->tpl_vars['bankwireOwner']->value;?>
<?php } else { ?>___________<?php }?></strong>
		<br />- <?php echo smartyTranslate(array('s'=>'Puede elegir hacer la transferencia a cualquiera de estas cuentas','mod'=>'bankwire'),$_smarty_tpl);?>
:<br/><br/>

		<strong style="font-size:15px;"><?php if ($_smarty_tpl->tpl_vars['bankwireDetails']->value) {?><?php echo $_smarty_tpl->tpl_vars['bankwireDetails']->value;?>
<?php } else { ?>___________<?php }?></strong><br/><br/>

		
		<?php if (!isset($_smarty_tpl->tpl_vars['reference']->value)) {?>
			<br />- <?php echo smartyTranslate(array('s'=>'Do not forget to insert your order number #%d in the subject of your bank wire','sprintf'=>$_smarty_tpl->tpl_vars['id_order']->value,'mod'=>'bankwire'),$_smarty_tpl);?>

		<?php } else { ?>
			<br />- <?php echo smartyTranslate(array('s'=>'Do not forget to insert your order reference %s in the subject of your bank wire.','sprintf'=>$_smarty_tpl->tpl_vars['reference']->value,'mod'=>'bankwire'),$_smarty_tpl);?>

		<?php }?>		<br /><?php echo smartyTranslate(array('s'=>'An email has been sent with this information.','mod'=>'bankwire'),$_smarty_tpl);?>

		<br /> <strong><?php echo smartyTranslate(array('s'=>'Your order will be sent as soon as we receive payment.','mod'=>'bankwire'),$_smarty_tpl);?>
</strong>
		<br /><?php echo smartyTranslate(array('s'=>'If you have questions, comments or concerns, please contact our','mod'=>'bankwire'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'expert customer support team. ','mod'=>'bankwire'),$_smarty_tpl);?>
</a>.
	</div>
<?php } else { ?>
	<p class="alert alert-warning">
		<?php echo smartyTranslate(array('s'=>'We noticed a problem with your order. If you think this is an error, feel free to contact our','mod'=>'bankwire'),$_smarty_tpl);?>
 
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'expert customer support team. ','mod'=>'bankwire'),$_smarty_tpl);?>
</a>.
	</p>
<?php }?>
<?php }} ?>
