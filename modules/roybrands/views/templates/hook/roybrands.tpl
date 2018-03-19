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

<div id="roybrands" class="block">
    <p class="brandstitle"><span>{l s='Product Brands' mod='roybrands'}</span>
    <span class="fletxes">
        <span class="botocarusel" onClick="pasa('ant', '.marquesblock', '#marca_');"><i class="icon-chevron-left"></i></span>
        <span class="botocarusel" onClick="pasa('sig', '.marquesblock', '#marca_');"><i class="icon-chevron-right"></i></span>
    </span>   
    </p>
 
    <div id="roybrandscarousel" class="clearfix">
    {if $manufacturers}

        {$num = 1}
        {$bloc = 1}
        <div id="roybrandsul">
        {foreach from=$manufacturers item=manufacturer name=manufacturers}
            {if $num == 1}
            <div id="marca_{$bloc}" class="marquesblock"{if $bloc > 1} style="display:none;"{/if}>
                 <ul class="roybrandsul">

            {/if}
            <li class="{if $smarty.foreach.manufacturers.first}first_item{elseif $smarty.foreach.manufacturers.last}last_item{else}item{/if}">
                <div class="col-xs-6 col-sm-2">
                    <a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html'}" title="{l s='Products of %s' sprintf=[$manufacturer.name] mod='roybrands'}"><img class="img-responsive" src="{$img_manu_dir}{$manufacturer.id_manufacturer}-medium_default.jpg" alt="{$manufacturer.name}"  /></a>
                </div>
            </li>
        {if $num == 6 || $smarty.foreach.manufacturers.last eq true}
            </ul>

            </div>
            {$num = 1}
            {$bloc = $bloc+1}
        {else}
            {$num = $num+1}
        {/if}   

        {/foreach}
         </div>
    {else}
        <p>{l s='There are no manufacturers' mod='roybrands'}</p>
    {/if}
    </div>
</div>