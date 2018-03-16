<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:00:00
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4548008025a9823808a6015-53917436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5bf1e2086ebf4c94f2369bd263f78f06493ffae' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-tab.tpl',
      1 => 1509971665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4548008025a9823808a6015-53917436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'count_reviews' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823808b09d0_08435705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823808b09d0_08435705')) {function content_5a9823808b09d0_08435705($_smarty_tpl) {?><!--
* 2012-2017 NetReviews
*
*  @author    NetReviews SAS <contact@avis-verifies.com>
*  @copyright 2017 NetReviews SAS
*  @version   Release: $Revision: 7.4.0
*  @license   NetReviews
*  @date      01/09/2017
*  International Registered Trademark & Property of NetReviews SAS
-->
<li>
    <a href="#idTabavisverifies" class="avisverifies_tab" data-toggle="tab" id="tab_avisverifies" >
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['count_reviews']->value,'htmlall','UTF-8');?>

        <?php if ($_smarty_tpl->tpl_vars['count_reviews']->value>1) {?>
            <?php echo smartyTranslate(array('s'=>'reviews','mod'=>'netreviews'),$_smarty_tpl);?>

        <?php } else { ?>
            <?php echo smartyTranslate(array('s'=>'review','mod'=>'netreviews'),$_smarty_tpl);?>

        <?php }?>
    </a>
</li><?php }} ?>
