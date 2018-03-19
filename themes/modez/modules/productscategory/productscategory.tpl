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
{if count($categoryProducts) > 0 && $categoryProducts !== false}
<section class="page-product-box blockproductscategory hfeatured">
	<div class="home_products_title">
		{*}<i class="hp_icon" title="{l s='other products in the same category:' mod='productscategory'}"></i>{*}<span>{*$categoryProducts|@count*}{l s='other products in the same category:' mod='productscategory'}</span>
	<p class="fletxes">
		<span class="botocarusel" onClick="pasa('ant', '.productescategoria', '#producte_categoria_');"><i class="icon-chevron-left" title="{l s='other products in the same category:' mod='productscategory'} anterior"></i></span>
		<span class="botocarusel" onClick="pasa('sig', '.productescategoria', '#producte_categoria_');"><i class="icon-chevron-right" title="{l s='other products in the same category:' mod='productscategory'} siguiente"></i></span>
	</p>		
	</div>	
	<div id="productscategory_list" class="clearfix">

	{assign var='nbItemsPerLine' value=4}
	{assign var='nbItemsPerLineTablet' value=2}
	{assign var='nbItemsPerLineMobile' value=3}

	{*define numbers of product per line in other page for tablet*}
	{assign var='nbLi' value=$products|@count}
	{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
	{math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}
	<!-- Products list -->

	{$num = 1}
	{$bloc = 1}

	{foreach from=$categoryProducts item=product name=products}
		{if $num == 1}
		<div id="producte_categoria_{$bloc}" class="productescategoria"{if $bloc > 1} style="display:none;"{/if}>
		<ul{if isset($id) && $id} id="{$id}"{/if} class="product_list grid row{if isset($class) && $class} {$class}{/if}{if isset($active) && $active == 1} active{/if}">

		{/if}	


		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$nbItemsPerLine assign=totModulo}
		{math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet}
		{math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineMobile assign=totModuloMobile}
		{if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if}
		{if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if}
		{if $totModuloMobile == 0}{assign var='totModuloMobile' value=$nbItemsPerLineMobile}{/if}
		<li class="ajax_block_product{if $page_name == 'index' || $page_name == 'product'} col-xs-12 col-sm-3 col-md-3{else} col-xs-12 col-sm-6 col-md-4{/if}{if $smarty.foreach.products.iteration%$nbItemsPerLine == 0} last-in-line{elseif $smarty.foreach.products.iteration%$nbItemsPerLine == 1} first-in-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModulo)} last-line{/if}{if $smarty.foreach.products.iteration%$nbItemsPerLineTablet == 0} last-item-of-tablet-line{elseif $smarty.foreach.products.iteration%$nbItemsPerLineTablet == 1} first-item-of-tablet-line{/if}{if $smarty.foreach.products.iteration%$nbItemsPerLineMobile == 0} last-item-of-mobile-line{elseif $smarty.foreach.products.iteration%$nbItemsPerLineMobile == 1} first-item-of-mobile-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloMobile)} last-mobile-line{/if}">
			<div class="product-container">
				<div class="left-block">
					<div class="product-image-container">

				<a href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">	                      						
				<img class="first-img replace-2x img-responsive" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} itemprop="image" />
                            {assign var="pImages" value=Product::getImagesByID($product.id_product, 2)}{foreach from=$pImages item=image name=images}
                                <img src="{$link->getImageLink($product.link_rewrite, $image, 'home_default')}" {if $smarty.foreach.images.first}class="second-img img-responsive current img_{$smarty.foreach.images.index}"{else} class="img_{$smarty.foreach.images.index}" style="display:none;"{/if} alt="{$product.legend|escape:'htmlall':'UTF-8'}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if}/>
                            {/foreach}
						</a>
						
                        {if $product.quantity > 0 || $product.allow_oosp}
                            {if isset($product.new) && $product.new == 1}
                                <span class="new-box">
                                    <span class="new-label">{l s='New'}</span>
                                </span>
                            {/if}
                            {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                                <span class="sale-box">
                                    <span class="sale-label">{l s='Sale!' mod='productscategory'}</span>
                                </span>
                            {/if}
                        {else}
                            <span class="soldout-box">
                                <span class="soldout-label">{l s='Sold out!' mod='productscategory'}</span>
                            </span>
                        {/if}
					</div>
				</div>
				<div class="right-block">
					<h5 itemprop="name">
						{if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
						<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
							{$product.name|truncate:45:'...'|escape:'html':'UTF-8'}
						</a>
					</h5>
					
					<div class="product-flags">
						{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
							{if isset($product.online_only) && $product.online_only}
								<span class="online_only">{l s='Online only'}</span>
							{/if}
						{/if}
						{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
							{elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
								<span class="discount">{l s='Reduced price!'}</span>
							{/if}
					</div>
					{*}<div class="button-container">
						{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
							{if ($product.allow_oosp || $product.quantity > 0)}
								{if isset($static_token)}
									<a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="follow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}">
                                        <span class="cart_icon"></span><span>{l s='Add to cart'}</span>
									</a>
								{else}
									<a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$product.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="follow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}">
                                        <span class="cart_icon"></span><span>{l s='Add to cart'}</span>
									</a>
								{/if}						
							{else}
								<span class="button ajax_add_to_cart_button btn btn-default disabled">
									<span class="cart_icon"></span><span>{l s='Add to cart'}</span>
								</span>
							{/if}
						{/if}
					</div>{*}
					<div class="content_price">
						{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}


							{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction}
							<div class="esq">
								{if $product.specific_prices.reduction_type == 'percentage'}
									<span class="price-percent-reduction">-{$product.specific_prices.reduction * 100}%</span>
								{/if}
								{if $product.specific_prices.reduction_type == 'amount'}
                                    <span class="price-percent-reduction">-{convertPrice price=$product.specific_prices.reduction}</span>
                                {/if}
								<span class="descuento">{l s='DESCUENTO'}</span>
							</div>
							<div class="dre">
								<span itemprop="offers">

									<span itemprop="price" class="price product-price">
										{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
										<span>{l s='IVA incluído'}</span>
									</span>
									<meta itemprop="priceCurrency" content="{$currency->iso_code}" />							
									<span class="old-price product-price">
										{l s='PVP'} <span>{displayWtPrice p=$product.price_without_reduction}</span>
									</span>
								</span>
							</div>

                            {else}
                            <span itemprop="offers">
								<span itemprop="price" content="{$product.price}" class="price product-price">
									{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
								</span>
							</span>                           
							{/if}

						{/if}
					</div>
				{if $product.financiacion}
					<div class="financia">
						<div class="esq"><div class="txt1">FINÁNCIALO</div><div class="txt2"><span>0%<span>interés</span></div></span></div>
						<div class="triang"></div>
						<div class="dre">{convertPrice price=$product.financia_price} <span>x {$product.financia_mesos} meses</span></div>
					</div>		
						<div class="baix">{if $product.financia_interes != 0}{l s='solo se aplicará'} {$product.financia_interes}% {l s='de apertura'}{/if}</div>
				{/if}


				</div>
			</div><!-- .product-container> -->
		</li>
		{if $num == 4 || $smarty.foreach.products.last eq true}
		</ul>
		</div>
		{$num = 1}
			{$bloc = $bloc+1}
		{else}
			{$num = $num+1}
		{/if}	
	

		{/foreach}
	
	</div>
</section>
{/if}
