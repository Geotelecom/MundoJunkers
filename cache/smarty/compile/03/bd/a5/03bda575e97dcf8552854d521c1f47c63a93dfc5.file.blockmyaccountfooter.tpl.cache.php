<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:45
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/blockmyaccountfooter/blockmyaccountfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4996745675a982335baadb0-82029410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03bda575e97dcf8552854d521c1f47c63a93dfc5' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1493215245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4996745675a982335baadb0-82029410',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
    'is_logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982335bdfc32_80270847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982335bdfc32_80270847')) {function content_5a982335bdfc32_80270847($_smarty_tpl) {?>

<!-- Block myaccount module -->
<div class="footer-block col-xs-12 col-sm-4" id="block_myaccount_footer">
	<h4><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Manage my customer account','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My account','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></h4>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'My orders','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My orders','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['returnAllowed']->value) {?><li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-follow',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'My merchandise returns','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My merchandise returns','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li><?php }?>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-slip',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Manage my personal information','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My personal info','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?><li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true),'html','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'My vouchers','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'My vouchers','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li><?php }?>
			<?php echo $_smarty_tpl->tpl_vars['HOOK_BLOCK_MY_ACCOUNT']->value;?>

            <?php if ($_smarty_tpl->tpl_vars['is_logged']->value) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index');?>
?mylogout" title="<?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
" rel="follow"><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockmyaccountfooter'),$_smarty_tpl);?>
</a></li><?php }?>
		</ul>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>
