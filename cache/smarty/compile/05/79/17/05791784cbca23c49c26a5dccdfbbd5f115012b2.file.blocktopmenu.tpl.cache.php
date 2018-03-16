<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:45
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7926843545a982335712812-49202249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05791784cbca23c49c26a5dccdfbbd5f115012b2' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1507794382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7926843545a982335712812-49202249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
    'meta_title' => 0,
    'MENU_SEARCH' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823357587d6_89864692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823357587d6_89864692')) {function content_5a9823357587d6_89864692($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!='') {?>
	<!-- Menu -->
	<div id="block_top_menu" class="sf-contener clearfix col-lg-12 fadeInDown">
		<div class="cat-title"><?php echo smartyTranslate(array('s'=>"Categories",'mod'=>"blocktopmenu"),$_smarty_tpl);?>
</div>
		<ul class="sf-menu clearfix menu-content">
			<li>
			<a href="https://mundojunkers.es/" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_title']->value,'html','UTF-8');?>
" class="menuhomelink"></a>
			</li>
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

			<?php if ($_smarty_tpl->tpl_vars['MENU_SEARCH']->value) {?>
				<li class="sf-search noBack" style="float:right">
					<form id="searchbox" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'),'html','UTF-8');?>
" method="get">
						<p>
							<input type="hidden" name="controller" value="search" />
							<input type="hidden" value="position" name="orderby"/>
							<input type="hidden" value="desc" name="orderway"/>
							<input type="text" name="search_query" id="search_query_menu" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocktopmenu'),$_smarty_tpl);?>
" value="<?php if (isset($_GET['search_query'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_GET['search_query'],'html','UTF-8');?>
<?php }?>" />
							<button type="submit" name="submit_search" class="button">
							<span><?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearch'),$_smarty_tpl);?>
</span>
							</button>
						</p>
					</form>
				</li>
			<?php }?>
            <li class="menu_up_li">
                <div class="menu_up"><a class="modezuparrow_link" href="#page"><span></span></a></div>
            </li>
		</ul>
	</div>
	<!--/ Menu -->
<?php }?><?php }} ?>
