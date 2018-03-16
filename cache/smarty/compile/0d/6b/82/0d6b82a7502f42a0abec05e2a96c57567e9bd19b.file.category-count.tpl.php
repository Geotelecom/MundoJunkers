<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:59:05
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13284639205a982349149685-84055794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d6b82a7502f42a0abec05e2a96c57567e9bd19b' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/category-count.tpl',
      1 => 1493215137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13284639205a982349149685-84055794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98234915c789_86717298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98234915c789_86717298')) {function content_5a98234915c789_86717298($_smarty_tpl) {?>
<span class="heading-counter"><?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0) {?><?php echo smartyTranslate(array('s'=>'There are no products in  this category'),$_smarty_tpl);?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1) {?><?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>
<?php }?><?php }?></span><?php }} ?>
