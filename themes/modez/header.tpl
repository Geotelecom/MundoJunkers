{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="{$lang_iso}"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="{$lang_iso}"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="{$lang_iso}"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="{$lang_iso}"><![endif]-->
<html lang="{$lang_iso}" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="utf-8" />
		<title>{$meta_title|escape:'html':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}" />
{/if}
        <meta name="generator" content="PrestaShop" />
        <meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($follow) && $follow}no{/if}follow" />
        <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="p:domain_verify" content="b521c801c5dc4cb4b2e0aa8bbed5db06"/>
        {$id_shop = Context::getContext()->shop->id}
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
        <link rel="apple-touch-icon-precomposed" href="{$img_dir}climahorro-iphone.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{$img_dir}climahorro-iphone.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{$img_dir}climahorro-ipad.png" />        
        {if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
		<link rel="stylesheet" href="{$css_uri}" type="text/css" media="{$media}" />
	{/foreach}
{/if}
        <link rel="stylesheet" href="{$css_dir}ave.css" type="text/css" />
        {*}<link rel="stylesheet" href="{$css_dir}animate.css" type="text/css" />
        <link rel="stylesheet" href="{$css_dir}county.css" type="text/css" />
        <link rel="stylesheet" href="{$css_dir}owl.carousel.css" type="text/css" />{*}
        {if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
            {$js_def}
            {foreach from=$js_files item=js_uri}
                <script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
            {/foreach}
        {/if}
        <script type="text/javascript" src="{$js_dir}ave.js"></script>
       {*} <script type="text/javascript" src="{$js_dir}owl.carousel.min.js"></script>
        <script type="text/javascript" src="{$js_dir}county.js"></script>{*}
        <script type="text/javascript" src="{$js_dir}modez-mainscript.js"></script>

        <!--[if IE 8]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        {if isset($roythemes.font_include)}{$roythemes.font_include} {/if}
        {$HOOK_HEADER}

        <link rel="stylesheet" href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family=Open+Sans:300,600" type="text/css" media="all" />

        <meta property="og:title" content="{$meta_title|escape:'htmlall':'UTF-8'}"/>
        <meta property="og:site_name" content="{$shop_name|escape:'htmlall':'UTF-8'}"/>
        <meta property="og:type" content="website">
        <meta property="og:description" content="{$meta_description|escape:html:'UTF-8'}">
        {if !$page_name=='product' && !$page_name=='module-smartblog-details'}
            <meta property="og:url" content="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}"/>
            <meta property="og:image" content="{$logo_url}" />
        {/if}
        {if $page_name=='product'}
            <meta property="og:image" content="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large')}">
        {/if}
        {if $page_name=='module-smartblog-details'}
            <meta property="og:url" content="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}"/>
            <meta property="og:image" content="{$base_dir}modules/smartblog/images/{$post_img}-single-default.jpg">
        {/if}

        {*}<!--<script>
          (function(i,s,o,g,r,a,m){ i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-100146252-1', 'auto');
          ga('require', 'displayfeatures');
          ga('require', 'linkid', 'linkid.js');
          ga('send', 'pageview');

        </script>-->{*}
        {if $page_name == 'contact-form'}
        <script src='https://www.google.com/recaptcha/api.js' data-keepinline="true"></script>
        {/if}
	</head>
	<body{if isset($page_name)} id="{$page_name|escape:'html':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'html':'UTF-8'}{/if}{if isset($body_classes) && $body_classes|@count} {implode value=$body_classes separator=' '}{/if}{if $hide_left_column} hide-left-column{/if}{if $hide_right_column} hide-right-column{/if}{if $content_only} content_only{/if} lang_{$lang_iso}">
	{if !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
			<div id="restricted-country">
				<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
			</div>
		{/if}
		<div id="page">
            <div class="loaderbg"><div class="loader"></div></div>
            {hook h="displayFixed"}
			<div class="header-wrapper">
				<header id="header">
					{*}<div class="nav nav-height">
						<div class="container">
							<div class="row">
								<nav>{hook h="displayNav"}</nav>
							</div>
						</div>
					</div>{*}
                    <div class="infopanel">
                        <div class="infopanel_bg"></div>
                        <div class="infopanel_border"></div>
                        <div class="container">
                            <div class="row">
                                {hook h='displayInfoPanel' mod='royinfoblock'}
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
                                                {if $page_name == 'index'}<h1>{/if}<a href="https://mundojunkers.es/" title="{$shop_name|escape:'html':'UTF-8'}">
                                                   <img class="logo img-responsive" src="{$img_dir}logo.png" alt="{$shop_name|escape:'html':'UTF-8'}"{*if $logo_image_width} width="{$logo_image_width}"{/if}{if $logo_image_height} height="{$logo_image_height}"{/if*}/> 
                                                </a>{if $page_name == 'index'}</h1>{/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
								{if isset($HOOK_TOP)}{$HOOK_TOP}{/if}
							</div>
						</div>
					</div>
                    <div class="topmenu_container">{hook h="displayTopMenu"}</div>
				</header>
			</div>
			<div class="columns-container-top">
				<div id="topcolumns" class="container">
					{if $page_name !='index' && $page_name !='pagenotfound'}
						{include file="$tpl_dir./breadcrumb.tpl"}
					{/if}
					<div class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12">
						{hook h="displayTopColumn"}</div>
					</div>
				</div>
			</div>
            {if $page_name == 'index'}
            <div class="columns-container-subtop">
                <div id="subtopcolumns" class="container">
                    <div class="row">
                        <div id="subtop_column" class="center_column col-xs-12 col-sm-12">
                        {hook h="displaySubTopColumn"}</div>
                    </div>
                </div>
            </div>  
            {/if}         
			<div class="columns-container-middle">
                <div class="bottom_line_bg"></div>
				<div id="middlecolumns" class="container">
					<div class="row">
						{if isset($left_column_size) && !empty($left_column_size)}
						<div id="left_column" class="column col-xs-12 col-sm-{$left_column_size|intval}">{$HOOK_LEFT_COLUMN}</div>
						{/if}
						<div id="center_column" class="center_column col-xs-12 col-sm-{12 - $left_column_size - $right_column_size}">
	{/if}


                            {if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
                            {$js_def}
                            {foreach from=$js_files item=js_uri}
                                <script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
                            {/foreach}
{/if}