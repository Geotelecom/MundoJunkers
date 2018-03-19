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

<!-- Block Viewed products -->

<div class="block block-vc-{$elementprefix}-products-sidebar">
{if !empty($vc_title)}
	<p class="title_block">{$vc_title}</p>
{/if}    
	<div class="block_content products-block">
            
            {if $vc_products}
		<ul>
			{foreach from=$vc_products item=viewedProduct name=myLoop}
                            
				<li class="clearfix{if $smarty.foreach.myLoop.last} last_item{elseif $smarty.foreach.myLoop.first} first_item{else} item{/if}">
					<a
					class="products-block-image" 
					href="{$link->getProductLink($viewedProduct.id_product)|escape:'html':'UTF-8'}" 
					title="{l s='More about %s' mod='blockviewed' sprintf=[$viewedProduct.name|escape:'html':'UTF-8']}" >
						<img 
						src="{if isset($viewedProduct.id_image) && $viewedProduct.id_image}{$link->getImageLink($viewedProduct.link_rewrite, $viewedProduct.id_image, 'small_default')}{else}{$img_prod_dir}{$lang_iso}-default-medium_default.jpg{/if}" 
						alt="{$viewedProduct.legend|escape:'html':'UTF-8'}" />
					</a>
					<div class="product-content">
						<h5>
							<a class="product-name" 
							href="{$link->getProductLink($viewedProduct.id_product)|escape:'html':'UTF-8'}" 
							title="{l s='More about %s' mod='blockviewed' sprintf=[$viewedProduct.name|escape:'html':'UTF-8']}">
								{$viewedProduct.name|truncate:25:'...'|escape:'html':'UTF-8'}
							</a>
						</h5>
						<p class="product-description">{$viewedProduct.description_short|strip_tags:'UTF-8'|truncate:40}</p>
                                                <div class="price-box">
                                                    {if !$PS_CATALOG_MODE}
                                                        <span class="price special-price">
                                                            {if !$priceDisplay}
                                                                {displayWtPrice p=$viewedProduct.price}
                                                            {else}
                                                                {displayWtPrice p=$viewedProduct.price_tax_exc}
                                                            {/if}
                                                        </span>
                                                         {if $viewedProduct.specific_prices}
                                                            {assign var='specific_prices' value=$viewedProduct.specific_prices}
                                                            {if $specific_prices.reduction_type == 'percentage' && ($specific_prices.from == $specific_prices.to OR ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $specific_prices.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $specific_prices.from))}
                                                                <span class="price-percent-reduction">-{$specific_prices.reduction*100|floatval}%</span>
                                                            {/if}
                                                        {/if}
                                                         
                                                    {/if}
                                                </div>
					</div>
				</li>
			{/foreach}
		</ul>
            {/if}
	</div>
</div>
