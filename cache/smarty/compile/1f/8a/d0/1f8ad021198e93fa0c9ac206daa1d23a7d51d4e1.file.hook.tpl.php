<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:45
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/roybanners/views/templates/hook/hook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8074887885a98233576d9a5-53422381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f8ad021198e93fa0c9ac206daa1d23a7d51d4e1' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/roybanners/views/templates/hook/hook.tpl',
      1 => 1493215466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8074887885a98233576d9a5-53422381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlitems' => 0,
    'hook' => 0,
    'hItem' => 0,
    'module_dir' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823357c5a20_40607328',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823357c5a20_40607328')) {function content_5a9823357c5a20_40607328($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['htmlitems']->value)&&$_smarty_tpl->tpl_vars['htmlitems']->value) {?>
<div id="htmlcontent_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hook']->value,'htmlall','UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['hook']->value=='top') {?> class="col-xs-12 col-md-12"<?php }?>>
	<ul class="htmlcontent-home clearfix row">
		<?php  $_smarty_tpl->tpl_vars['hItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['htmlitems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['items']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['hItem']->key => $_smarty_tpl->tpl_vars['hItem']->value) {
$_smarty_tpl->tpl_vars['hItem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['items']['iteration']++;
?>
			<li class="htmlcontent-item-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->getVariable('smarty')->value['foreach']['items']['iteration'],'htmlall','UTF-8');?>
 col-xs-4 bview bview-first">
				<?php if ($_smarty_tpl->tpl_vars['hItem']->value['url']) {?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hItem']->value['url'],'htmlall','UTF-8');?>
" class="item-link"<?php if ($_smarty_tpl->tpl_vars['hItem']->value['target']==1) {?> onclick="return !window.open(this.href);"<?php }?> title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hItem']->value['title'],'htmlall','UTF-8');?>
">
				<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['hItem']->value['image']) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)$_smarty_tpl->tpl_vars['module_dir']->value)."img/".((string)$_smarty_tpl->tpl_vars['hItem']->value['image']));?>
" class="item-img" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hItem']->value['title'],'htmlall','UTF-8');?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hItem']->value['title'],'htmlall','UTF-8');?>
" width="<?php if ($_smarty_tpl->tpl_vars['hItem']->value['image_w']) {?><?php echo intval($_smarty_tpl->tpl_vars['hItem']->value['image_w']);?>
<?php } else { ?>100%<?php }?>" height="<?php if ($_smarty_tpl->tpl_vars['hItem']->value['image_h']) {?><?php echo intval($_smarty_tpl->tpl_vars['hItem']->value['image_h']);?>
<?php } else { ?>100%<?php }?>"/>
					<?php }?>
                        <div class="mask">
                            <div class="content">
                                <h2 class="item-title"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hItem']->value['title'],'htmlall','UTF-8');?>
</h2>
                                <p>
                                <?php if ($_smarty_tpl->tpl_vars['hItem']->value['html']) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['hItem']->value['html'];?>

                                <?php }?>
                                </p>
                                <?php if ($_smarty_tpl->tpl_vars['hItem']->value['url']) {?>
                                <span class="btn binfo"><?php echo smartyTranslate(array('s'=>'Read More','mod'=>'roybanners'),$_smarty_tpl);?>
</span>
                                <?php }?>
                            </div>
                        </div>
				<?php if ($_smarty_tpl->tpl_vars['hItem']->value['url']) {?>
					</a>
				<?php }?>
			</li>
		<?php } ?>	
	</ul>
</div>
<?php }?>
<?php }} ?>
