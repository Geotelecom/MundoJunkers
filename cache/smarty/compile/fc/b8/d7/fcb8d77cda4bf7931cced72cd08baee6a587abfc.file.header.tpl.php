<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:37
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/homeslider/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8683783655a98232d04baf4-00697793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcb8d77cda4bf7931cced72cd08baee6a587abfc' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/homeslider/views/templates/hook/header.tpl',
      1 => 1493214818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8683783655a98232d04baf4-00697793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'homeslider' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98232d09bb25_00216302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98232d09bb25_00216302')) {function content_5a98232d09bb25_00216302($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['homeslider']->value)) {?>
<script type="text/javascript">
     var homeslider_loop=<?php echo intval($_smarty_tpl->tpl_vars['homeslider']->value['loop']);?>
;
     var homeslider_width=<?php echo intval($_smarty_tpl->tpl_vars['homeslider']->value['width']);?>
;
     var homeslider_speed=<?php echo intval($_smarty_tpl->tpl_vars['homeslider']->value['speed']);?>
;
     var homeslider_pause=<?php echo intval($_smarty_tpl->tpl_vars['homeslider']->value['pause']);?>
;
</script>
<?php }?><?php }} ?>
