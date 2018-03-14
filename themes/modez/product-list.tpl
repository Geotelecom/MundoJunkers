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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($products) && $products}
	{*define numbers of products per line in other page for desktop*}
	{if $page_name !='index' && $page_name !='product'}
		{assign var='nbItemsPerLine' value=3}
		{assign var='nbItemsPerLineTablet' value=2}
		{assign var='nbItemsPerLineMobile' value=3}
	{else}
		{assign var='nbItemsPerLine' value=4}
		{assign var='nbItemsPerLineTablet' value=3}
		{assign var='nbItemsPerLineMobile' value=2}
	{/if}
	{*define numbers of product per line in other page for tablet*}
	{assign var='nbLi' value=$products|@count}
	{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
	{math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}

	{if $identifica == 'bestsellers' || $identifica == 'homefeatured'}
		{$num = 1}
		{$bloc = 1}	
	{/if}


	<!-- Products list -->
	{if $identifica != 'bestsellers' && $identifica != 'homefeatured'}
	<ul{if isset($id) && $id} id="{$id}"{/if} class="product_list list row{if isset($class) && $class} {$class}{/if}{if isset($active) && $active == 1} active{/if}">
	{else}
	<div {if isset($id) && $id} id="{$id}"{/if}>
	{/if}
	{foreach from=$products item=product name=products}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$nbItemsPerLine assign=totModulo}
		{math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet}
		{math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineMobile assign=totModuloMobile}
		{if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if}
		{if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if}
		{if $totModuloMobile == 0}{assign var='totModuloMobile' value=$nbItemsPerLineMobile}{/if}

		{if $identifica == 'bestsellers' || $identifica == 'homefeatured'}
			{if $num == 1}
			<div id="producte_{$identifica}_{$bloc}" class="productesblock_{$identifica}"{if $bloc > 1} style="display:none;"{/if}>
			<ul{*if isset($id) && $id} id="{$id}"{/if*} class="product_list list row{if isset($class) && $class} {$class}{/if}{if isset($active) && $active == 1} active{/if}">				
			{/if}	
		{/if}		

		<li class="ajax_block_product{if $page_name == 'index' || $page_name == 'product'} col-xs-12 col-sm-4 col-md-4{else} col-xs-12 col-sm-6 col-md-4{/if}{if $smarty.foreach.products.iteration%$nbItemsPerLine == 0} last-in-line{elseif $smarty.foreach.products.iteration%$nbItemsPerLine == 1} first-in-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModulo)} last-line{/if}{if $smarty.foreach.products.iteration%$nbItemsPerLineTablet == 0} last-item-of-tablet-line{elseif $smarty.foreach.products.iteration%$nbItemsPerLineTablet == 1} first-item-of-tablet-line{/if}{if $smarty.foreach.products.iteration%$nbItemsPerLineMobile == 0} last-item-of-mobile-line{elseif $smarty.foreach.products.iteration%$nbItemsPerLineMobile == 1} first-item-of-mobile-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloMobile)} last-mobile-line{/if}">
			<div class="product-container" itemscope itemtype="http://schema.org/Product">
				<div class="left-block">
					<div class="product-image-container">
						{*}<a itemprop="url" class="button lnk_view_mobile btn btn-default" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='View'}">
							<span>{l s='More Info'}</span>
						</a>
                        {if isset($quick_view) && $quick_view}
                            <a class="quick-view button btn btn-default" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}" title="{l s='Quick view'}">
                                <span>{l s='Quick view'}</span>
                            </a>
                        {/if}
                        <a itemprop="url" class="button lnk_view btn btn-default" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='View'}">
                            <span>{l s='More Info'}</span>
                        </a>{*}
						<a class="product_img_link"	href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
                            {if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $product.specific_prices.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $product.specific_prices.from) && ($product.specific_prices.to != '0000-00-00 00:00:00')}
                                <div class="countcontainer">
                                    <div class="roycountdown">
                                        <div class="roycount" style="display: none;" data-specific-price-to="{$product.specific_prices.to}" data-days={l s='Days'} data-hours={l s='Hours'} data-minutes={l s='Minutes'} data-seconds={l s='Seconds'}></div>
                                    </div>
                                </div>
                            {elseif ($product.specific_prices.to == '0000-00-00 00:00:00') && ($product.specific_prices.to == '0000-00-00 00:00:00')}
                                <div class="countcontainer">
                                    <div class="roycountoff">
                                        <span>{l s='Limited Special Offer'}</span>
                                    </div>
                                </div>
                            {/if}
							<span class="img_grad">{l s='More Info'}</span>
							<img class="first-img replace-2x img-responsive" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} itemprop="image" />
                            {assign var="pImages" value=Product::getImagesByID($product.id_product, 2)}{foreach from=$pImages item=image name=images}
                                <img src="{$link->getImageLink($product.link_rewrite, $image, 'home_default')}" {if $smarty.foreach.images.first}class="second-img img-responsive current img_{$smarty.foreach.images.index}"{else} class="img_{$smarty.foreach.images.index}" style="display:none;"{/if} alt="{$product.legend|escape:'htmlall':'UTF-8'}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if}/>
                            {/foreach}
						</a>
						{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
							<div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
								<div class="esq">
									{if $product.specific_prices.reduction_type == 'percentage'}
										<span class="price-percent-reduction">-{$product.specific_prices.reduction * 100}%</span>
										<span class="descuento">{l s='DESCUENTO'}</span>
									{/if}								
								</div>
								<div class="dre">
									<span itemprop="price" class="price product-price">
										{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
										<span>{l s='IVA incluído'}</span>										
									</span>
															
									<meta itemprop="priceCurrency" content="{$currency->iso_code}" />
									{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction}
										<span class="old-price product-price">
											{l s='PVP'} <span>{displayWtPrice p=$product.price_without_reduction}</span>
										</span>

									{/if}
								</div>
									<div style="display:none">
									{if $PS_STOCK_MANAGEMENT && isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
										{if ($product.allow_oosp || $product.quantity > 0)}
												<link itemprop="availability" href="http://schema.org/InStock" />{if $product.quantity <= 0}{if $product.allow_oosp}{if isset($product.available_later) && $product.available_later}{$product.available_later}{else}{l s='In Stock'}{/if}{else}{l s='Out of stock'}{/if}{else}{if isset($product.available_now) && $product.available_now}{$product.available_now}{else}{l s='In Stock'}{/if}{/if}
										{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
												<link itemprop="availability" href="http://schema.org/LimitedAvailability" />{l s='Product available with different options'}

										{else}
												<link itemprop="availability" href="http://schema.org/OutOfStock" />{l s='Out of stock'}
										{/if}
									{/if}
									</div>
								{/if}
							</div>
						{/if}
                        {if $product.quantity > 0 || $product.allow_oosp}
                            {if isset($product.new) && $product.new == 1}
                                <span class="new-box">
                                    <span class="new-label">{l s='New'}</span>
                                </span>
                            {/if}
                            {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                                <span class="sale-box">
                                    <span class="sale-label">{l s='Sale!'}</span>
                                </span>
                            {/if}
                        {else}
                            <span class="soldout-box">
                                <span class="soldout-label">{l s='Sold out!'}</span>
                            </span>
                        {/if}
					</div>
				</div>
				<div class="right-block">
					<h5 itemprop="name">
						{if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
						<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
							{$product.name|escape:'html':'UTF-8'}
						</a>
					</h5>
					{hook h='displayProductListReviews' product=$product}
					<p class="product-desc" itemprop="description">
						{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}
					</p>
					{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
					<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">
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
								<span itemprop="price" class="price product-price">
									{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
									<span>{l s='IVA incluído'}</span>
								</span>
								<meta itemprop="priceCurrency" content="{$priceDisplay}" />							
								<span class="old-price product-price">
									{l s='PVP'} <span>{displayWtPrice p=$product.price_without_reduction}</span>
								</span>
							</div>

                            {else}

								{*}<span itemprop="price" class="price product-price">
									{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
								</span>
								<meta itemprop="priceCurrency" content="{$priceDisplay}" />   {*}

								<div class="esq">
										<span class="price-percent-reduction">-30%</span>
	                                	<span class="descuento">{l s='DESCUENTO'}</span>
								</div>
								<div class="dre">
									<span itemprop="price" class="price product-price">
										{convertPrice price=$product.price}
										<span>{l s='IVA incluído'}</span>
									</span>
									<meta itemprop="priceCurrency" content="{$priceDisplay}" />							
									<span class="old-price product-price">
										{l s='PVP'} <span>{convertPrice price=(30*$product.price/100)+$product.price}</span>
									</span>
								</div>



							{/if}

						{/if}
					</div>
					{/if}
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
									<a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}">
                                        <span class="cart_icon"></span><span>{l s='Add to cart'}</span>
									</a>
								{else}
									<a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$product.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}">
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

				</div>
				{*if $page_name != 'index'}
	 				<div class="functional-buttons clearfix">
						{hook h='displayProductListFunctionalButtons' product=$product}
						{if isset($comparator_max_item) && $comparator_max_item}
							<div class="compare">
								<a class="add_to_compare" href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}">{l s='Compare'}</a>
							</div>
						{/if}
					</div>
				{/if*}
				{*if $product.financiacion*}
					<div class="financia">
						<div class="esq"><div class="txt1">FINÁNCIALO</div><div class="txt2"><span>0%<span>interés</span></span></div></div>
						<div class="triang"></div>
						<div class="dre">{convertPrice price=$product.price/15} <span>x {*$product.financia_mesos*}15 meses</span></div>
					</div>		
						<div class="baix">{*if $product.financia_interes != 0*}{l s='solo se aplicará'} {*$product.financia_interes*}3% {l s='de apertura'}{*/if*}</div>
				{*/if*}
			</div><!-- .product-container> -->
		</li>
		{if $identifica == 'bestsellers' || $identifica == 'homefeatured' }
			{if $num == 4 || $smarty.foreach.products.last eq true}
				</ul>
				</div>
				{$num = 1}
				{$bloc = $bloc+1}
			{else}
				{$num = $num+1}
			{/if}	
		{/if}	
	{/foreach}
		{if $identifica != 'bestsellers' && $identifica != 'homefeatured'}
			</ul>
		{else}
			</div>
		{/if}

{addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL}
{addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL}
{addJsDef comparator_max_item=$comparator_max_item}
{addJsDef comparedProductsIds=$compared_products}
{/if}