<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:42:48
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/smartblogaddthisbutton/views/templates/front/smartblogaddthisbutton.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5704039615a982d88f1bbd3-67932074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06898758d81efd9bc48e1982d453c77ea1d16bd5' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/smartblogaddthisbutton/views/templates/front/smartblogaddthisbutton.tpl',
      1 => 1493214941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5704039615a982d88f1bbd3-67932074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addthis_api_key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982d88f41e33_04602952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982d88f41e33_04602952')) {function content_5a982d88f41e33_04602952($_smarty_tpl) {?><!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-<?php echo $_smarty_tpl->tpl_vars['addthis_api_key']->value;?>
"></script>

<div class="addthis_toolbox addthis_default_style addthis_20x20_style">
    <a class="addthis_counter_facebook"></a>
    <a class="addthis_counter_twitter"></a>
    <a class="addthis_counter_pinterest_share"></a>
    <a class="addthis_counter_reddit"></a>
    <a class="addthis_counter_linkedin"></a>   
 	<a class="addthis_counter addthis_pill_style"></a>
</div>
 
<?php }} ?>
