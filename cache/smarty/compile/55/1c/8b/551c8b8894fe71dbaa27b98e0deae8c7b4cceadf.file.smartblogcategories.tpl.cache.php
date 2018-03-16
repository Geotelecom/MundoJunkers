<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:42:48
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogcategories/views/templates/front/smartblogcategories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18889438135a982d88d85756-21501486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '551c8b8894fe71dbaa27b98e0deae8c7b4cceadf' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/smartblogcategories/views/templates/front/smartblogcategories.tpl',
      1 => 1493215470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18889438135a982d88d85756-21501486',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982d88dc47c3_73797949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982d88dc47c3_73797949')) {function content_5a982d88dc47c3_73797949($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['categories']->value)&&!empty($_smarty_tpl->tpl_vars['categories']->value)) {?>
<div id="category_blog_block_left"  class="block blogModule boxPlain">
  <p class='title_block'><a href="<?php echo smartblog::GetSmartBlogLink('smartblog_list');?>
"><?php echo smartyTranslate(array('s'=>'Blog Categories','mod'=>'smartblogcategories'),$_smarty_tpl);?>
</a></p>
   <div class="block_content list-block">
         <ul>
	<?php  $_smarty_tpl->tpl_vars["category"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["category"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["category"]->key => $_smarty_tpl->tpl_vars["category"]->value) {
$_smarty_tpl->tpl_vars["category"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["options"] = new Smarty_variable(null, null, 0);?>
            <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['id_category'] = $_smarty_tpl->tpl_vars['category']->value['id_smart_blog_category'];?>
            <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['slug'] = $_smarty_tpl->tpl_vars['category']->value['link_rewrite'];?>
                <li>
                    <a href="<?php echo smartblog::GetSmartBlogLink('smartblog_category',$_smarty_tpl->tpl_vars['options']->value);?>
">[<?php echo $_smarty_tpl->tpl_vars['category']->value['count'];?>
] <?php echo $_smarty_tpl->tpl_vars['category']->value['meta_title'];?>
</a>
                </li>
	<?php } ?>
        </ul>
   </div>
</div>
<?php }?><?php }} ?>
