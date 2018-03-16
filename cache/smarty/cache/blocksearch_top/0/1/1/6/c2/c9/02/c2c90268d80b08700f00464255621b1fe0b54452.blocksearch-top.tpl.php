<?php /*%%SmartyHeaderCode:748614845a98233533a875-48195493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2c90268d80b08700f00464255621b1fe0b54452' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/blocksearch/blocksearch-top.tpl',
      1 => 1493215247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '748614845a98233533a875-48195493',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982cfe3ac4b9_63548073',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982cfe3ac4b9_63548073')) {function content_5a982cfe3ac4b9_63548073($_smarty_tpl) {?><div id="search_block_top" class="col-sm-4 clearfix"><form id="searchbox" method="get" action="https://mundojunkers.es/buscar" > <input type="hidden" name="controller" value="search" /> <input type="hidden" name="orderby" value="position" /> <input type="hidden" name="orderway" value="desc" /> <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Buscar" value="" /> <button type="submit" name="submit_search" class="btn btn-default button-search" title="Buscar"> <span>Buscar</span> </button></form></div><?php }} ?>
