<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:46
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/footer_av_site.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19352744805a982336066ed9-75942969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbd3f3bb2a9d94c55495b551b8c0285cd891d703' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/footer_av_site.tpl',
      1 => 1509971665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19352744805a982336066ed9-75942969',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'av_site_rating_avis' => 0,
    'rs_choice' => 0,
    'name_site' => 0,
    'category' => 0,
    'av_site_rating_rate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823360ad799_92366197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823360ad799_92366197')) {function content_5a9823360ad799_92366197($_smarty_tpl) {?><!--
* 2012-2017 NetReviews
*
*  @author    NetReviews SAS <contact@avis-verifies.com>
*  @copyright 2017 NetReviews SAS
*  @version   Release: $Revision: 7.4.0
*  @license   NetReviews
*  @date      01/09/2017
*  International Registered Trademark & Property of NetReviews SAS
-->
    <?php if ($_smarty_tpl->tpl_vars['av_site_rating_avis']->value!=0) {?>

         <?php if (($_smarty_tpl->tpl_vars['rs_choice']->value=="2")) {?>
            <script type="application/ld+json">
                {
                "@context": "http://schema.org/",
                "@type": "Website",
                "name": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['name_site']->value,'htmlall','UTF-8');?>
",
                "description": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['category']->value->description),'htmlall','UTF-8');?>
",
                    "aggregateRating": { 
                    "@type": "AggregateRating", 
                    "ratingValue": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_site_rating_rate']->value,'htmlall','UTF-8');?>
", 
                    "ratingCount": "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_site_rating_avis']->value,'htmlall','UTF-8');?>
",
                    "worstRating": "1", 
                    "bestRating": "5"
                    } 
                }
            </script>


        <?php } elseif (($_smarty_tpl->tpl_vars['rs_choice']->value=="1")) {?>
                <div id="netreviews_global_website_review" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Webpage" >
                 <span  itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    <meta content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['name_site']->value,'htmlall','UTF-8');?>
" itemprop="name" />
                <span class="bandeauServiceClientAvisNoteGros">
                    <meta content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_site_rating_rate']->value,'htmlall','UTF-8');?>
" itemprop="ratingValue"/>
                    <meta content="5" itemprop="bestRating" />
                    <meta content="1" itemprop="worstRating" >
                </span>
                    <meta content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['av_site_rating_avis']->value,'htmlall','UTF-8');?>
" itemprop="reviewCount" >
                </span>
                </div>
        <?php }?>

    <?php }?>





<?php }} ?>
