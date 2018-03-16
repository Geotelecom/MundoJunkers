<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/realexredirect/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2559033665a9828163f57f0-41759099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41ec1d373110a940c5399f104c649895edb8c28a' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/realexredirect/views/templates/hook/payment.tpl',
      1 => 1516636124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2559033665a9828163f57f0-41759099',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982816401a03_79962715',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982816401a03_79962715')) {function content_5a982816401a03_79962715($_smarty_tpl) {?>

<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getModuleLink('realexredirect','payment',array(),'true'),'htmlall','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by Credit or Debit Card','mod'=>'realexredirect'),$_smarty_tpl);?>
">
<p class="payment_module realexredirect">    
    <?php echo smartyTranslate(array('s'=>'Pay by Credit or Debit Card','mod'=>'realexredirect'),$_smarty_tpl);?>
    
</p>
</a><?php }} ?>
