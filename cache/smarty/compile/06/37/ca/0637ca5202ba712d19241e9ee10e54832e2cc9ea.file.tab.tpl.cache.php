<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:45
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/homefeatured/tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13998714735a9823359037e0-96048046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0637ca5202ba712d19241e9ee10e54832e2cc9ea' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/homefeatured/tab.tpl',
      1 => 1493215251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13998714735a9823359037e0-96048046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'active_li' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982335928570_27500141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982335928570_27500141')) {function content_5a982335928570_27500141($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/function.counter.php';
?>
<?php echo smarty_function_counter(array('name'=>'active_li','assign'=>'active_li'),$_smarty_tpl);?>

<li<?php if ($_smarty_tpl->tpl_vars['active_li']->value==1) {?> class="active"<?php }?>><a data-toggle="tab" href="#homefeatured" class="homefeatured"><?php echo smartyTranslate(array('s'=>'Popular','mod'=>'homefeatured'),$_smarty_tpl);?>
</a></li><?php }} ?>
