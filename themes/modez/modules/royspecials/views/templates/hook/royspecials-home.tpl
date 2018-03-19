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
<li class="hspecials" data-auto="{$roythemes.nc_auto_sale}" data-max-slides="{$roythemes.nc_items_sale}">
{if isset($specials) && $specials}
    <div class="home_products_title">
        <i class="hp_icon"></i><a href="{$link->getPageLink('prices-drop')|escape:'html'}" title="{l s='Price Discounts' mod='royspecials'}"><span>{l s='Price Discounts' mod='royspecials'}</span></a>
    </div>
    <div class="rv_carousel_container">
	{include file="$tpl_dir./product-list.tpl" products=$specials class="rv_carousel {if isset($roythemes.nc_carousel_sale) && $roythemes.nc_carousel_sale == "1"}car-sale{/if} blockspecials tab-pane" id='royspecials'}
    </div>
{else}
<ul id="blockspecials" class="rv_carousel blockspecials tab-pane">
	<li class="alert alert-info">{l s='No special products at this time.' mod='royspecials'}</li>
</ul>
{/if}
</li>
