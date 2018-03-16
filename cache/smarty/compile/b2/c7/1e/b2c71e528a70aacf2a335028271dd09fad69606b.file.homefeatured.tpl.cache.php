<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:45
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4151919795a98233593f651-63479588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2c71e528a70aacf2a335028271dd09fad69606b' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/homefeatured/homefeatured.tpl',
      1 => 1498027601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4151919795a98233593f651-63479588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'roythemes' => 0,
    'products' => 0,
    'active_ul' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98233599ade4_16096060',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98233599ade4_16096060')) {function content_5a98233599ade4_16096060($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/function.counter.php';
?>

<?php echo smarty_function_counter(array('name'=>'active_ul','assign'=>'active_ul'),$_smarty_tpl);?>

<li class="hfeatured" data-auto="<?php echo $_smarty_tpl->tpl_vars['roythemes']->value['nc_auto_featured'];?>
" data-max-slides="<?php echo $_smarty_tpl->tpl_vars['roythemes']->value['nc_items_featured'];?>
">
	<div class="home_products_title">
	<span><?php echo smartyTranslate(array('s'=>'Popular products','mod'=>'homefeatured'),$_smarty_tpl);?>
</span>
	<p class="fletxes">
		<span class="botocarusel" title="<?php echo smartyTranslate(array('s'=>'Popular products','mod'=>'homefeatured'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'previous','mod'=>'homefeatured'),$_smarty_tpl);?>
" onClick="pasa('ant', '.productesblock_homefeatured', '#producte_homefeatured_');"><i class="icon-chevron-left"></i></span>
		<span class="botocarusel" title="<?php echo smartyTranslate(array('s'=>'Popular products','mod'=>'homefeatured'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'next','mod'=>'homefeatured'),$_smarty_tpl);?>
" onClick="pasa('sig', '.productesblock_homefeatured', '#producte_homefeatured_');"><i class="icon-chevron-right"></i></span>
	</p>	
	</div>	
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
    <div class="rv_carousel_container">
	<?php ob_start();?><?php if (isset($_smarty_tpl->tpl_vars['roythemes']->value['nc_carousel_featured'])&&$_smarty_tpl->tpl_vars['roythemes']->value['nc_carousel_featured']=="1") {?><?php echo "car-featured";?><?php }?><?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list-home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('class'=>"rv_carousel ".$_tmp3." homefeatured tab-pane",'id'=>'homefeatured','active'=>$_smarty_tpl->tpl_vars['active_ul']->value,'identifica'=>"homefeatured"), 0);?>

    </div>
<?php } else { ?>

<ul id="homefeatured" class="rv_carousel homefeatured tab-pane<?php if (isset($_smarty_tpl->tpl_vars['active_ul']->value)&&$_smarty_tpl->tpl_vars['active_ul']->value==1) {?> active<?php }?>">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No featured products at this time.','mod'=>'homefeatured'),$_smarty_tpl);?>
</li>
</ul>
<?php }?>
</li><?php }} ?>
