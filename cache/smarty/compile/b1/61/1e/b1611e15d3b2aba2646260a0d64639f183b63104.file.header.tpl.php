<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:47
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10608961805a982337010fa1-69325213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1611e15d3b2aba2646260a0d64639f183b63104' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/header.tpl',
      1 => 1519919580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10608961805a982337010fa1-69325213',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'follow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'img_dir' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'css_dir' => 0,
    'js_defer' => 0,
    'js_files' => 0,
    'js_def' => 0,
    'js_uri' => 0,
    'js_dir' => 0,
    'roythemes' => 0,
    'HOOK_HEADER' => 0,
    'shop_name' => 0,
    'page_name' => 0,
    'logo_url' => 0,
    'product' => 0,
    'cover' => 0,
    'link' => 0,
    'base_dir' => 0,
    'post_img' => 0,
    'body_classes' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'HOOK_TOP' => 0,
    'left_column_size' => 0,
    'HOOK_LEFT_COLUMN' => 0,
    'right_column_size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823370adff8_02662881',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823370adff8_02662881')) {function content_5a9823370adff8_02662881($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/function.implode.php';
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_title']->value,'html','UTF-8');?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value) {?>
		<meta name="description" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_description']->value,'html','UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value) {?>
		<meta name="keywords" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_keywords']->value,'html','UTF-8');?>
" />
<?php }?>
        <meta name="generator" content="PrestaShop" />
        <meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)) {?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['follow']->value)&&$_smarty_tpl->tpl_vars['follow']->value) {?>no<?php }?>follow" />
        <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="p:domain_verify" content="b521c801c5dc4cb4b2e0aa8bbed5db06"/>
        <?php $_smarty_tpl->tpl_vars['id_shop'] = new Smarty_variable(Context::getContext()->shop->id, null, 0);?>
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
climahorro-iphone.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
climahorro-iphone.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
climahorro-ipad.png" />        
        <?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
	<?php } ?>
<?php }?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
ave.css" type="text/css" />
        
        <?php if (isset($_smarty_tpl->tpl_vars['js_defer']->value)&&!$_smarty_tpl->tpl_vars['js_defer']->value&&isset($_smarty_tpl->tpl_vars['js_files']->value)&&isset($_smarty_tpl->tpl_vars['js_def']->value)) {?>
            <?php echo $_smarty_tpl->tpl_vars['js_def']->value;?>

            <?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['js_uri']->value,'html','UTF-8');?>
"></script>
            <?php } ?>
        <?php }?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
ave.js"></script>
       
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
modez-mainscript.js"></script>

        <!--[if IE 8]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <?php if (isset($_smarty_tpl->tpl_vars['roythemes']->value['font_include'])) {?><?php echo $_smarty_tpl->tpl_vars['roythemes']->value['font_include'];?>
 <?php }?>
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


        <link rel="stylesheet" href="http<?php if (Tools::usingSecureMode()) {?>s<?php }?>://fonts.googleapis.com/css?family=Open+Sans:300,600" type="text/css" media="all" />

        <meta property="og:title" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_title']->value,'htmlall','UTF-8');?>
"/>
        <meta property="og:site_name" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['shop_name']->value,'htmlall','UTF-8');?>
"/>
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_description']->value,'html','UTF-8');?>
">
        <?php if (!$_smarty_tpl->tpl_vars['page_name']->value=='product'&&!$_smarty_tpl->tpl_vars['page_name']->value=='module-smartblog-details') {?>
            <meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
"/>
            <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" />
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product') {?>
            <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['cover']->value['id_image'],'large');?>
">
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='module-smartblog-details') {?>
            <meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
"/>
            <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/smartblog/images/<?php echo $_smarty_tpl->tpl_vars['post_img']->value;?>
-single-default.jpg">
        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='contact-form') {?>
        <script src='https://www.google.com/recaptcha/api.js' data-keepinline="true"></script>
        <?php }?>
	</head>
	<body<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?> id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['page_name']->value,'html','UTF-8');?>
"<?php }?> class="<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['page_name']->value,'html','UTF-8');?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['body_classes']->value)&&count($_smarty_tpl->tpl_vars['body_classes']->value)) {?> <?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['body_classes']->value,'separator'=>' '),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value) {?> hide-left-column<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value) {?> hide-right-column<?php }?><?php if ($_smarty_tpl->tpl_vars['content_only']->value) {?> content_only<?php }?> lang_<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value) {?>
			<div id="restricted-country">
				<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['geolocation_country']->value;?>
</span></p>
			</div>
		<?php }?>
		<div id="page">
            <div class="loaderbg"><div class="loader"></div></div>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFixed"),$_smarty_tpl);?>

			<div class="header-wrapper">
				<header id="header">
					
                    <div class="infopanel">
                        <div class="infopanel_bg"></div>
                        <div class="infopanel_border"></div>
                        <div class="container">
                            <div class="row">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayInfoPanel','mod'=>'royinfoblock'),$_smarty_tpl);?>

                            </div>
                        </div>
                    </div>
					<div class="head">
						<div class="container head-height">
							<div class="row">
                                <div id="logo_wrapper">
                                    <div class="logo_row">
                                        <div class="logo_cell">
                                            <div id="header_logo">
                                                <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index') {?><h1><?php }?><a href="https://mundojunkers.es/" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['shop_name']->value,'html','UTF-8');?>
">
                                                   <img class="logo img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
logo.png" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['shop_name']->value,'html','UTF-8');?>
"/> 
                                                </a><?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index') {?></h1><?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php if (isset($_smarty_tpl->tpl_vars['HOOK_TOP']->value)) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>
<?php }?>
							</div>
						</div>
					</div>
                    <div class="topmenu_container"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayTopMenu"),$_smarty_tpl);?>
</div>
				</header>
			</div>
			<div class="columns-container-top">
				<div id="topcolumns" class="container">
					<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index'&&$_smarty_tpl->tpl_vars['page_name']->value!='pagenotfound') {?>
						<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					<?php }?>
					<div class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayTopColumn"),$_smarty_tpl);?>
</div>
					</div>
				</div>
			</div>
            <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index') {?>
            <div class="columns-container-subtop">
                <div id="subtopcolumns" class="container">
                    <div class="row">
                        <div id="subtop_column" class="center_column col-xs-12 col-sm-12">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displaySubTopColumn"),$_smarty_tpl);?>
</div>
                    </div>
                </div>
            </div>  
            <?php }?>         
			<div class="columns-container-middle">
                <div class="bottom_line_bg"></div>
				<div id="middlecolumns" class="container">
					<div class="row">
						<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['left_column_size']->value)) {?>
						<div id="left_column" class="column col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['left_column_size']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value;?>
</div>
						<?php }?>
						<div id="center_column" class="center_column col-xs-12 col-sm-<?php echo 12-$_smarty_tpl->tpl_vars['left_column_size']->value-$_smarty_tpl->tpl_vars['right_column_size']->value;?>
">
	<?php }?>


                            <?php if (isset($_smarty_tpl->tpl_vars['js_defer']->value)&&!$_smarty_tpl->tpl_vars['js_defer']->value&&isset($_smarty_tpl->tpl_vars['js_files']->value)&&isset($_smarty_tpl->tpl_vars['js_def']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['js_def']->value;?>

                            <?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
                                <script type="text/javascript" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['js_uri']->value,'html','UTF-8');?>
"></script>
                            <?php } ?>
<?php }?><?php }} ?>
