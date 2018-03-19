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

{counter name=active_ul assign=active_ul}
<li class="hfeatured" data-auto="{$roythemes.nc_auto_featured}" data-max-slides="{$roythemes.nc_items_featured}">
	<div class="home_products_title">
	{*}<i class="hp_icon" title="{l s='Popular products' mod='homefeatured'}"></i>{*}<span>{l s='Popular products' mod='homefeatured'}</span>
	<p class="fletxes">
		<span class="botocarusel" title="{l s='Popular products' mod='homefeatured'} {l s='previous' mod='homefeatured'}" onClick="pasa('ant', '.productesblock_homefeatured', '#producte_homefeatured_');"><i class="icon-chevron-left"></i></span>
		<span class="botocarusel" title="{l s='Popular products' mod='homefeatured'} {l s='next' mod='homefeatured'}" onClick="pasa('sig', '.productesblock_homefeatured', '#producte_homefeatured_');"><i class="icon-chevron-right"></i></span>
	</p>	
	</div>	
{if isset($products) && $products}
    <div class="rv_carousel_container">
	{include file="$tpl_dir./product-list-home.tpl" class="rv_carousel {if isset($roythemes.nc_carousel_featured) && $roythemes.nc_carousel_featured == "1"}car-featured{/if} homefeatured tab-pane" id='homefeatured' active=$active_ul identifica="homefeatured"}
    </div>
{else}

<ul id="homefeatured" class="rv_carousel homefeatured tab-pane{if isset($active_ul) && $active_ul == 1} active{/if}">
	<li class="alert alert-info">{l s='No featured products at this time.' mod='homefeatured'}</li>
</ul>
{/if}
</li>