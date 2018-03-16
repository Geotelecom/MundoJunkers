<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:42:48
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogrecentposts/views/templates/front/smartblogrecentposts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3152050135a982d88e63642-67001662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18d53571de33d594747c66f58f546fc5bbd956ff' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogrecentposts/views/templates/front/smartblogrecentposts.tpl',
      1 => 1493215471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3152050135a982d88e63642-67001662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
    'options' => 0,
    'modules_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982d88e80108_30685033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982d88e80108_30685033')) {function content_5a982d88e80108_30685033($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/modifier.date_format.php';
?><?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&!empty($_smarty_tpl->tpl_vars['posts']->value)) {?>
<div id="recent_article_smart_blog_block_left"  class="block blogModule boxPlain">
   <p class='title_block'><a href="<?php echo smartblog::GetSmartBlogLink('smartblog');?>
"><?php echo smartyTranslate(array('s'=>'Recent Articles','mod'=>'smartblogrecentposts'),$_smarty_tpl);?>
</a></p>
   <div class="block_content sdsbox-content">
      <ul class="recentArticles">
        <?php  $_smarty_tpl->tpl_vars["post"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["post"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["post"]->key => $_smarty_tpl->tpl_vars["post"]->value) {
$_smarty_tpl->tpl_vars["post"]->_loop = true;
?>
             <?php $_smarty_tpl->tpl_vars["options"] = new Smarty_variable(null, null, 0);?>
             <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['id_post'] = $_smarty_tpl->tpl_vars['post']->value['id_smart_blog_post'];?>
             <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['slug'] = $_smarty_tpl->tpl_vars['post']->value['link_rewrite'];?>
             <li>
                 <a class="image" title="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
" href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
">
                     <img alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['modules_dir']->value;?>
/smartblog/images/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_img'];?>
-home-small.jpg">
                 </a>
                 <a class="title"  title="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
" href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
</a>
               <span class="info"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created'],"%b %d, %Y");?>
</span>
             </li>
         <?php } ?>
            </ul>
   </div>
</div>
<?php }?><?php }} ?>
