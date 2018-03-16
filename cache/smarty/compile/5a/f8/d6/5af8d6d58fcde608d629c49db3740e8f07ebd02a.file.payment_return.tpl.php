<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 08:14:23
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/realexredirect/views/templates/hook/payment_return.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13467345785a98f9cfdb3e98-76647863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5af8d6d58fcde608d629c49db3740e8f07ebd02a' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/realexredirect/views/templates/hook/payment_return.tpl',
      1 => 1517474740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13467345785a98f9cfdb3e98-76647863',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'total_to_pay_ga' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98f9cfe00084_73852044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98f9cfe00084_73852044')) {function content_5a98f9cfe00084_73852044($_smarty_tpl) {?>
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

<p class="realexresponse"><strong><?php echo smartyTranslate(array('s'=>'Your payment has been successful and your order is complete.','mod'=>'realexredirect'),$_smarty_tpl);?>
</strong>		
	</p>
<?php } else { ?>
	<p class="warning">
		<?php echo smartyTranslate(array('s'=>'We noticed a problem with your order. Please return to the checkout and try again ','mod'=>'realexredirect'),$_smarty_tpl);?>
 
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'htmlall','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'or contact the store administrator.','mod'=>'realexredirect'),$_smarty_tpl);?>
</a>
	</p>
<?php }?>
<?php }} ?>
