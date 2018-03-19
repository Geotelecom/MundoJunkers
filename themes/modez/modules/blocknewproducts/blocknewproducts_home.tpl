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
<li class="hnew" data-auto="{$roythemes.nc_auto_new}" data-max-slides="{$roythemes.nc_items_new}">
{if isset($new_products) && $new_products}
    <div class="home_products_title">
        <i class="hp_icon"></i><a href="{$link->getPageLink('new-products')|escape:'html':'UTF-8'}" title="{l s='New products' mod='blockcms'}"><span>{l s='New products' mod='blocknewproducts'}</span>
        </a>
    </div>
    <div class="rv_carousel_container">
	{include file="$tpl_dir./product-list.tpl" products=$new_products class="rv_carousel {if isset($roythemes.nc_carousel_new) && $roythemes.nc_carousel_new == "1"}car-new{/if} blocknewproducts tab-pane" id='blocknewproducts' active=$active_ul}
    </div>
{else}
<ul id="blocknewproducts" class="rv_carousel blocknewproducts tab-pane{if isset($active_ul) && $active_ul == 1} active{/if}">
	<li class="alert alert-info">{l s='No new products at this time.' mod='blocknewproducts'}</li>
</ul>
{/if}
</li>