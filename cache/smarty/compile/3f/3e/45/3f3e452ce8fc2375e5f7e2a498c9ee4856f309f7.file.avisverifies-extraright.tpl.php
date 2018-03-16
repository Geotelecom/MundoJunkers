<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:00:00
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-extraright.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13245145335a98238074dcd4-26486074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f3e452ce8fc2375e5f7e2a498c9ee4856f309f7' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-extraright.tpl',
      1 => 1509971665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13245145335a98238074dcd4-26486074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'snippets_complete' => 0,
    'product_description' => 0,
    'product_price' => 0,
    'product_name' => 0,
    'url_image' => 0,
    'product_url' => 0,
    'product_id' => 0,
    'sku' => 0,
    'brand_name' => 0,
    'mpn' => 0,
    'gtin_ean' => 0,
    'gtin_upc' => 0,
    'widgetlight' => 0,
    'snippets_active' => 0,
    'modules_dir' => 0,
    'av_rate_percent' => 0,
    'av_rate' => 0,
    'av_nb_reviews' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982380898d29_33332958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982380898d29_33332958')) {function content_5a982380898d29_33332958($_smarty_tpl) {?><!--
* 2012-2017 NetReviews
*
*  @author    NetReviews SAS <contact@avis-verifies.com>
*  @copyright 2017 NetReviews SAS
*  @version   Release: $Revision: 7.4.2
*  @license   NetReviews
*  @date      16/10/2017
*  International Registered Trademark & Property of NetReviews SAS
-->

<?php if (($_smarty_tpl->tpl_vars['snippets_complete']->value=="1")) {?>
<div itemscope itemtype="http://schema.org/Product" id="av_snippets_product_tag">
   <meta itemprop="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_description']->value,'htmlall','UTF-8'));?>
">
   <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
      <meta itemprop="priceCurrency" content="EUR">
      <meta itemprop="price" content="<?php echo $_smarty_tpl->tpl_vars['product_price']->value;?>
">
      <link itemprop="availability" href="http://schema.org/InStock" />
   </span>
   <meta itemprop="name" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_name']->value,'htmlall','UTF-8');?>
" />
   <meta itemprop="description" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_description']->value,'htmlall','UTF-8');?>
" />
   <meta itemprop="image" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['url_image']->value,'htmlall','UTF-8');?>
" />
   <?php if ($_smarty_tpl->tpl_vars['product_url']->value) {?> 
      <meta itemprop="url" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_url']->value,'htmlall','UTF-8');?>
" />
   <?php }?>         
   <?php if ($_smarty_tpl->tpl_vars['product_id']->value) {?> 
      <meta itemprop="productID" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_id']->value,'htmlall','UTF-8');?>
" />
   <?php }?>    
   <?php if ($_smarty_tpl->tpl_vars['sku']->value) {?> 
       <meta itemprop="sku" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sku']->value,'htmlall','UTF-8');?>
" />
   <?php }?>    
   <?php if ($_smarty_tpl->tpl_vars['brand_name']->value) {?> 
       <meta itemprop="brand" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['brand_name']->value,'htmlall','UTF-8');?>
" />
   <?php }?>       
   <?php if ($_smarty_tpl->tpl_vars['mpn']->value) {?> 
       <meta itemprop="mpn" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['mpn']->value,'htmlall','UTF-8');?>
" />
   <?php }?>    
   <?php if ($_smarty_tpl->tpl_vars['gtin_ean']->value) {?> 
       <meta itemprop="gtin8" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['gtin_ean']->value,'htmlall','UTF-8');?>
" />
   <?php }?>   
   <?php if ($_smarty_tpl->tpl_vars['gtin_upc']->value) {?> 
       <meta itemprop="gtin12" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['gtin_upc']->value,'htmlall','UTF-8');?>
" />
   <?php }?>  
<?php }?>

   <!-- netreviews product widget new -->
   <?php if (($_smarty_tpl->tpl_vars['widgetlight']->value=='2')) {?>
   <div class="netreviewsProductWidgetNew" <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" <?php }?>>
   <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['modules_dir']->value,'htmlall','UTF-8');?>
netreviews/views/img/<?php echo smartyTranslate(array('s'=>'Sceau_100_en.png','mod'=>'netreviews'),$_smarty_tpl);?>
" class="netreviewsProductWidgetNewLogo"/>
   <div class="netreviewsProductWidgetNewRatingWrapper">
      <div class="netreviewsProductWidgetNewRatingInner" style="width:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_rate_percent']->value,'htmlall','UTF-8');?>
%"></div>
   </div>
   <div class="netreviewsProductWidgetNewRate">
      <span <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="ratingValue" <?php }?> class="ratingValue"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_rate']->value,'htmlall','UTF-8');?>
</span>/<span <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="bestRating" <?php }?> class="bestRating">5</span>
   </div>
   <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> 
   <meta itemprop= "worstRating" content= "1">
   <?php }?>
   <a href="javascript:void(0)" id="AV_button" class="netreviewsProductWidgetNewLink"><?php echo smartyTranslate(array('s'=>'See the reviews','mod'=>'netreviews'),$_smarty_tpl);?>
 
   (<span <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="reviewCount" <?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_nb_reviews']->value,'htmlall','UTF-8');?>
</span>)
   </a> 
</div>

<!--  netreviews product widget -->
<?php } elseif (($_smarty_tpl->tpl_vars['widgetlight']->value=='3')) {?>
<div class="av_product_award" <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" <?php }?>>
    <div id="top">
       <div class="ratingWrapper">
          <div class="ratingInner" style="width:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_rate_percent']->value,'htmlall','UTF-8');?>
%"></div>
       </div>
       <div class="ratingText">
          <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> 
          <meta itemprop= "ratingValue" content= "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_rate']->value,'htmlall','UTF-8');?>
">
          <meta itemprop= "bestRating" content= "5">
          <meta itemprop= "worstRating" content= "1">
          <?php }?>
          <span <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="reviewCount"<?php }?> class="reviewCount">
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_nb_reviews']->value,'htmlall','UTF-8');?>

          </span>
          <?php if ($_smarty_tpl->tpl_vars['av_nb_reviews']->value>1) {?>
          <?php echo smartyTranslate(array('s'=>'reviews','mod'=>'netreviews'),$_smarty_tpl);?>

          <?php } else { ?>
          <?php echo smartyTranslate(array('s'=>'review','mod'=>'netreviews'),$_smarty_tpl);?>

          <?php }?>
       </div>
    </div>
    <div id="bottom"><a href="javascript:void(0)" id="AV_button"><?php echo smartyTranslate(array('s'=>'See the reviews','mod'=>'netreviews'),$_smarty_tpl);?>
</a></div>
    <img id="sceau" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['modules_dir']->value,'htmlall','UTF-8');?>
netreviews/views/img/<?php echo smartyTranslate(array('s'=>'Sceau_100_en.png','mod'=>'netreviews'),$_smarty_tpl);?>
" />
</div>

<!--  netreviews stars -->
<?php } elseif (($_smarty_tpl->tpl_vars['widgetlight']->value=='1')) {?>
<div class="av_product_award light"  <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" <?php }?> >
    <a href="javascript:void(0)" id="AV_button">
       <div id="top">
          <div class="netreviewsProductWidgetNewRatingWrapper">
             <div class="netreviewsProductWidgetNewRatingInner" style="width:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_rate_percent']->value,'htmlall','UTF-8');?>
%"></div>
          </div>
          <div id="slide">
             <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> 
             <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_rate']->value,'htmlall','UTF-8');?>
">
             <meta itemprop="worstRating" content="1">
             <meta itemprop="bestRating" content="5">
             <?php }?>
             <span  <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="reviewCount" <?php }?> class="reviewCount">
             <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_nb_reviews']->value,'htmlall','UTF-8');?>

             </span>
             <?php if ($_smarty_tpl->tpl_vars['av_nb_reviews']->value>1) {?>
             <?php echo smartyTranslate(array('s'=>'reviews','mod'=>'netreviews'),$_smarty_tpl);?>

             <?php } else { ?>
             <?php echo smartyTranslate(array('s'=>'review','mod'=>'netreviews'),$_smarty_tpl);?>

             <?php }?>
          </div>
       </div>
    </a>
</div>
<?php }?>

<?php if (($_smarty_tpl->tpl_vars['snippets_complete']->value=="1")) {?>
</div> <!-- End product --> 
<?php }?><?php }} ?>
