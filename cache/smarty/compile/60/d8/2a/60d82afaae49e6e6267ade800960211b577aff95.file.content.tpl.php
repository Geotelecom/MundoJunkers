<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:33
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/backoffice/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14319308615a982329c0a7a3-78148726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d82afaae49e6e6267ade800960211b577aff95' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/backoffice/themes/default/template/content.tpl',
      1 => 1493212243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14319308615a982329c0a7a3-78148726',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982329c2d898_63707733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982329c2d898_63707733')) {function content_5a982329c2d898_63707733($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
