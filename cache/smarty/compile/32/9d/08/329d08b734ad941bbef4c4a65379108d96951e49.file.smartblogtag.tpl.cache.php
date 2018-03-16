<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:42:48
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogtag/views/templates/front/smartblogtag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15219583765a982d88ea3b24-87579475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '329d08b734ad941bbef4c4a65379108d96951e49' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogtag/views/templates/front/smartblogtag.tpl',
      1 => 1493215473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15219583765a982d88ea3b24-87579475',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tags' => 0,
    'tag' => 0,
    'options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982d88eb84b6_90750563',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982d88eb84b6_90750563')) {function content_5a982d88eb84b6_90750563($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['tags']->value)&&!empty($_smarty_tpl->tpl_vars['tags']->value)) {?>
<div  id="tags_blog_block_left"  class="block blogModule boxPlain">
    <p class='title_block'><a href="<?php echo smartblog::GetSmartBlogLink('smartblog');?>
"><?php echo smartyTranslate(array('s'=>'Tags Post','mod'=>'smartblogtag'),$_smarty_tpl);?>
</a></p>
    <div class="block_content">
            <?php  $_smarty_tpl->tpl_vars["tag"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["tag"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["tag"]->key => $_smarty_tpl->tpl_vars["tag"]->value) {
$_smarty_tpl->tpl_vars["tag"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["options"] = new Smarty_variable(null, null, 0);?>
                <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['tag'] = $_smarty_tpl->tpl_vars['tag']->value['name'];?>
                <?php if ($_smarty_tpl->tpl_vars['tag']->value!='') {?>
                    <a href="<?php echo smartblog::GetSmartBlogLink('smartblog_tag',$_smarty_tpl->tpl_vars['options']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a>
                <?php }?>
            <?php } ?>
   </div>
</div>
<?php }?><?php }} ?>
