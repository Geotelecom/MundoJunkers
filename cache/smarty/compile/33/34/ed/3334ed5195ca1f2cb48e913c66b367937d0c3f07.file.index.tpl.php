<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:46
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13797579315a982336ec13e7-92004523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3334ed5195ca1f2cb48e913c66b367937d0c3f07' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/index.tpl',
      1 => 1493215140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13797579315a982336ec13e7-92004523',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME_TAB_CONTENT' => 0,
    'HOOK_HOME_TAB' => 0,
    'left_column_size' => 0,
    'right_column_size' => 0,
    'HOOK_HOME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982336f1aa04_82561101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982336f1aa04_82561101')) {function content_5a982336f1aa04_82561101($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)) {?>
        <ul id="home-page-tabs" class="nav nav-tabs clearfix">
			<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value;?>

		</ul>
	<?php }?>
	<div class="tab-content"><ul class="homeproducts"><?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value;?>
</ul></div>
<?php }?>
	  </div>	
	</div>
  </div>
  <div id="additionalcolumn" class="container">
      <div class="row">
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdditionalHome'),$_smarty_tpl);?>

      </div>
  </div>
</div>
<?php $_smarty_tpl->tpl_vars['left_column_size'] = new Smarty_variable(0, null, 0);?><?php $_smarty_tpl->tpl_vars['right_column_size'] = new Smarty_variable(0, null, 0);?>

<div class="columns-container-bottom">
				<div id="bottomcolumns" class="container">
					<div class="row">
						<div id="bottom_center_column" class="center_column col-xs-12 col-sm-<?php echo 12-$_smarty_tpl->tpl_vars['left_column_size']->value-$_smarty_tpl->tpl_vars['right_column_size']->value;?>
">
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME']->value)) {?>
	<div class="clearfix newsrow">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

    </div>
<?php }?>
<?php }} ?>
