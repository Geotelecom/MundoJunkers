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
* @author PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2014 PrestaShop SA

* @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}
{counter name=active_ul assign=active_ul}
<li class="hbest" data-auto="{$roythemes.nc_auto_best}" data-max-slides="{$roythemes.nc_items_best}">
{if isset($best_sellers) && $best_sellers}
    <div class="home_products_title">
        <i class="hp_icon" title="{l s='Top sellers' mod='blockbestsellers'}"></i><a href="{$link->getPageLink('best-sales')|escape:'html':'UTF-8'}" title="{l s='Top sellers' mod='blockbestsellers'}"><span>{l s='Top sellers' mod='blockbestsellers'}</span></a>
         <p class="fletxes">
            <span class="botocarusel" onClick="pasa('ant', '.productesblock_bestsellers', '#producte_bestsellers_');"><i class="icon-chevron-left" title="{l s='Top sellers' mod='blockbestsellers'} {l s='previous' mod='blockbestsellers'}"></i></span>
            <span class="botocarusel" onClick="pasa('sig', '.productesblock_bestsellers', '#producte_bestsellers_');"><i class="icon-chevron-right" title="{l s='Top sellers' mod='blockbestsellers'} {l s='next' mod='blockbestsellers'}"></i></span>
        </p>        
    </div>  
    <div class="rv_carousel_container">
        {include file="$tpl_dir./product-list.tpl" products=$best_sellers class="rv_carousel {if isset($roythemes.nc_carousel_best) && $roythemes.nc_carousel_best == "1"}car-best{/if} blockbestsellers tab-pane" id='blockbestsellers' active=$active_ul identifica="bestsellers"}
    </div>
{else}
<ul id="blockbestsellers" class="rv_carousel blockbestsellers tab-pane{if isset($active_ul) && $active_ul == 1} active{/if}">
	<li class="alert alert-info">{l s='No best sellers at this time.' mod='blockbestsellers'}</li>
</ul>
{/if}
</li>