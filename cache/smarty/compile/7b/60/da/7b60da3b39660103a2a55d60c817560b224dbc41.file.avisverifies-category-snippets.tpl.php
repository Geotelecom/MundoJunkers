<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:59:04
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-category-snippets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17442609645a9823487ee5b8-71615109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b60da3b39660103a2a55d60c817560b224dbc41' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-category-snippets.tpl',
      1 => 1509971665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17442609645a9823487ee5b8-71615109',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'count_reviews' => 0,
    'rs_choice' => 0,
    'nom_category' => 0,
    'category' => 0,
    'products' => 0,
    'product' => 0,
    'average_rate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982348a3ef62_84130630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982348a3ef62_84130630')) {function content_5a982348a3ef62_84130630($_smarty_tpl) {?><!--
* 2012-2017 NetReviews
*
*  @author    NetReviews SAS <contact@avis-verifies.com>
*  @copyright 2017 NetReviews SAS
*  @version   Release: $Revision: 7.4.1
*  @license   NetReviews
*  @date      26/09/2017
*  International Registered Trademark & Property of NetReviews SAS
-->

<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='category') {?>
    <?php if ($_smarty_tpl->tpl_vars['count_reviews']->value!=0) {?>

        <?php if (($_smarty_tpl->tpl_vars['rs_choice']->value=="2")) {?>
            <script type="application/ld+json">
                {
                "@context": "http://schema.org/",
                "@type": "Product",
                "name": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['nom_category']->value,'htmlall','UTF-8');?>
",
                "description": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['category']->value->description),'htmlall','UTF-8');?>
",
                 "offers":
            [
                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
                {
                    "@type": "Offer",
                    "priceCurrency": "EUR",
                    "price": "<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
",
                    "availability": "http://schema.org/InStock",
                    "name": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
"
                }
                <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['last']) {?> , <?php }?> 
                <?php } ?>
            ],
                "aggregateRating": { 
                "@type": "AggregateRating", 
                "ratingValue": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['average_rate']->value,'htmlall','UTF-8');?>
", 
                "reviewCount": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['count_reviews']->value,'htmlall','UTF-8');?>
",
                "worstRating": "1", 
                "bestRating": "5"
                } 
                }
            </script>

        <?php } elseif (($_smarty_tpl->tpl_vars['rs_choice']->value=="1")) {?>
            <div id="netreviews_category_review" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="itemreviewed" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['nom_category']->value,'htmlall','UTF-8');?>
" />
                    <span>
                        <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['average_rate']->value,'htmlall','UTF-8');?>
" />
                        <meta itemprop="bestRating" content="5" />
                        <meta itemprop="worstRating" content="1" />
                        <meta itemprop="reviewCount" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['count_reviews']->value,'htmlall','UTF-8');?>
" />
                    </span>
            </div>
        <?php }?>

    <?php }?>
<?php }?>






<?php }} ?>
