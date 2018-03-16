<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:42:48
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogrelatedposts/views/templates/front/smartblogrelatedposts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12133781125a982d88ef4897-18529934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '772e480cc157638043fde33d7890dfe6365a6c46' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogrelatedposts/views/templates/front/smartblogrelatedposts.tpl',
      1 => 1493215472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12133781125a982d88ef4897-18529934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
    'options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982d88f09953_86844661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982d88f09953_86844661')) {function content_5a982d88f09953_86844661($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/modifier.date_format.php';
?><?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&!empty($_smarty_tpl->tpl_vars['posts']->value)) {?>
<div id="articleRelated">
     <h4 class="related"><?php echo smartyTranslate(array('s'=>'Related Posts: ','mod'=>'smartblogrelatedposts'),$_smarty_tpl);?>
</h4>
     <div class="sdsbox-content"> 
            <ul class="fullwidthreleted">
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
                       <a class="title paddleftreleted"  title="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
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
