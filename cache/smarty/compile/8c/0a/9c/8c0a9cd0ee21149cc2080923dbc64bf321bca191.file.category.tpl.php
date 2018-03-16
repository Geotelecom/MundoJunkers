<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:59:05
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8248155995a982349079725-99829209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c0a9cd0ee21149cc2080923dbc64bf321bca191' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/category.tpl',
      1 => 1498026534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8248155995a982349079725-99829209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'scenes' => 0,
    'subcategories' => 0,
    'products' => 0,
    'categoryNameComplement' => 0,
    'link' => 0,
    'n' => 0,
    'p' => 0,
    'nb_products' => 0,
    'productShowingStart' => 0,
    'productShowing' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982349143520_28443706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982349143520_28443706')) {function content_5a982349143520_28443706($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['category']->value)) {?>
    <?php if ($_smarty_tpl->tpl_vars['category']->value->id&&$_smarty_tpl->tpl_vars['category']->value->active) {?>
        <?php if ($_smarty_tpl->tpl_vars['scenes']->value||$_smarty_tpl->tpl_vars['category']->value->description||$_smarty_tpl->tpl_vars['category']->value->id_image) {?>
            <h1 class="subcategoriestitle page-heading<?php if ((isset($_smarty_tpl->tpl_vars['subcategories']->value)&&!$_smarty_tpl->tpl_vars['products']->value)||(isset($_smarty_tpl->tpl_vars['subcategories']->value)&&$_smarty_tpl->tpl_vars['products']->value)||!isset($_smarty_tpl->tpl_vars['subcategories']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?> product-listing<?php }?>"><span class="cat-name"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['category']->value->name,'html','UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)) {?>&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['categoryNameComplement']->value,'html','UTF-8');?>
<?php }?></span><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./category-count.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</h1>
            <div class="content_scene_cat">
                 <?php if ($_smarty_tpl->tpl_vars['scenes']->value) {?>
                    <div class="content_scene">
                        <!-- Scenes -->
                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./scenes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scenes'=>$_smarty_tpl->tpl_vars['scenes']->value), 0);?>

                        

                        
                             <div class="cat_desc rte">
                                 <?php if (strlen($_smarty_tpl->tpl_vars['category']->value->description)>350) {?>                   
                                     <div class="short "><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['category']->value->description),350);?>
</div>
                                     <a href="javascript:void()" class="lnk_more"><strong><?php echo smartyTranslate(array('s'=>'Ver más'),$_smarty_tpl);?>
</strong></a>
                                     <div class=" novisible" ><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                                 <?php } else { ?>
                                     <div class="" ><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                                 <?php }?>
                             </div>
                         


                        </div>
                    <?php } else { ?>
                    <!-- Category image -->
                     <?php if ($_smarty_tpl->tpl_vars['category']->value->id_image) {?><img class="content_scene_cat_bg" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value->link_rewrite,$_smarty_tpl->tpl_vars['category']->value->id_image,'category_default'),'html','UTF-8');?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['category']->value->name,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['category']->value->name,'html','UTF-8');?>
"><?php }?>

                     


                    
                         <div class="cat_desc">
                             <?php if (strlen($_smarty_tpl->tpl_vars['category']->value->description)>350) {?>                   
                                 <div class="rte short "><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['category']->value->description),350);?>
</div>
                                 <a href="javascript:void()" class="lnk_more"><strong><?php echo smartyTranslate(array('s'=>'Ver más'),$_smarty_tpl);?>
</strong></a>
                                 <div class="rte novisible" ><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                             <?php } else { ?>
                                 <div class="rte" ><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                             <?php }?>
                         </div>
                     

                  <?php }?>
            </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
            <div class="content_sortPagiBar clearfix">
                <div class="sortPagiBar clearfix">
                    <?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

            <div class="content_sortPagiBar">
                <div class="bottom-pagination-content clearfix">
                    <?php echo $_smarty_tpl->getSubTemplate ("./nbr-product-page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('paginationId'=>'bottom'), 0);?>

                </div>
                <div class="product-count">
                    <?php if (($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value)<$_smarty_tpl->tpl_vars['nb_products']->value) {?>
                        <?php $_smarty_tpl->tpl_vars['productShowing'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['productShowing'] = new Smarty_variable(($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value-$_smarty_tpl->tpl_vars['nb_products']->value-$_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value)*-1, null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['p']->value==1) {?>
                        <?php $_smarty_tpl->tpl_vars['productShowingStart'] = new Smarty_variable(1, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['productShowingStart'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value-$_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['nb_products']->value>1) {?>
                        <?php echo smartyTranslate(array('s'=>'Showing %1$d - %2$d of %3$d items','sprintf'=>array($_smarty_tpl->tpl_vars['productShowingStart']->value,$_smarty_tpl->tpl_vars['productShowing']->value,$_smarty_tpl->tpl_vars['nb_products']->value)),$_smarty_tpl);?>

                    <?php } else { ?>
                        <?php echo smartyTranslate(array('s'=>'Showing %1$d - %2$d of 1 item','sprintf'=>array($_smarty_tpl->tpl_vars['productShowingStart']->value,$_smarty_tpl->tpl_vars['productShowing']->value)),$_smarty_tpl);?>

                    <?php }?>
                </div>
            </div>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['category']->value->id) {?>
        <p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'This category is currently unavailable.'),$_smarty_tpl);?>
</p>
    <?php }?>
<?php }?>



<script>
$(document).ready(function(){


        // LOGIN FORM SENDING
        $(document).on('click', '.lnk_more', function(e){
            e.preventDefault();
            $('.short').css('display','none');
            $('.novisible').css('display','block');
            $(this).css('display','none');
        });
});

</script>
<?php }} ?>
