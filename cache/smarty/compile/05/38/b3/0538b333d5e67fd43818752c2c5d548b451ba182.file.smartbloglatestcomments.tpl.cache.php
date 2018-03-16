<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:42:48
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartbloglatestcomments/views/templates/front/smartbloglatestcomments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1902299565a982d88e2ec74-51738126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0538b333d5e67fd43818752c2c5d548b451ba182' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartbloglatestcomments/views/templates/front/smartbloglatestcomments.tpl',
      1 => 1493215471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1902299565a982d88e2ec74-51738126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'latesComments' => 0,
    'comment' => 0,
    'options' => 0,
    'modules_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982d88e45539_86502564',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982d88e45539_86502564')) {function content_5a982d88e45539_86502564($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['latesComments']->value)&&!empty($_smarty_tpl->tpl_vars['latesComments']->value)) {?>
<div class="block blogModule boxPlain">
   <p class='title_block'><?php echo smartyTranslate(array('s'=>'Latest Comments','mod'=>'smartbloglatestcomments'),$_smarty_tpl);?>
</p>
   <div class="block_content sdsbox-content">
      <ul class="recentComments">
	  <?php  $_smarty_tpl->tpl_vars["comment"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["comment"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['latesComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["comment"]->key => $_smarty_tpl->tpl_vars["comment"]->value) {
$_smarty_tpl->tpl_vars["comment"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["options"] = new Smarty_variable(null, null, 0);?>
            <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['id_post'] = $_smarty_tpl->tpl_vars['comment']->value['id_post'];?>
            <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['slug'] = $_smarty_tpl->tpl_vars['comment']->value['slug'];?>
               <li>
            <a title="" href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
">
	       <img class="image" alt="Avatar" src="<?php echo $_smarty_tpl->tpl_vars['modules_dir']->value;?>
/smartblog/images/avatar/avatar-author-default.jpg"></a>
            <?php echo $_smarty_tpl->tpl_vars['comment']->value['name'];?>
 <i><?php echo smartyTranslate(array('s'=>'on'),$_smarty_tpl);?>
</i>
		   <a class="title"   href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>
</a>
               </li>
          <?php } ?>
            </ul>
   </div>
   <div class="box-footer"><span></span></div>
</div>
<?php }?><?php }} ?>
