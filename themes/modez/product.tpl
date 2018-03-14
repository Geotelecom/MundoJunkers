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
{include file="$tpl_dir./errors.tpl"}
{if $errors|@count == 0}
	{if !isset($priceDisplayPrecision)}
		{assign var='priceDisplayPrecision' value=2}
	{/if}
	{if !$priceDisplay || $priceDisplay == 2}
		{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, $priceDisplayPrecision)}
		{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL, $priceDisplayPrecision)}
	{elseif $priceDisplay == 1}
		{assign var='productPrice' value=$product->getPrice(false, $smarty.const.NULL, $priceDisplayPrecision)}
		{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(true, $smarty.const.NULL, $priceDisplayPrecision)}
	{/if}
	<div class="primary_block row" itemscope itemtype="http://schema.org/Product">
		{if isset($adminActionDisplay) && $adminActionDisplay}
			<div id="admin-action">
				<p>{l s='This product is not visible to your customers.'}
					<input type="hidden" id="admin-action-product-id" value="{$product->id}" />
					<input type="submit" value="{l s='Publish'}" name="publish_button" class="exclusive" />
					<input type="submit" value="{l s='Back'}" name="lnk_view" class="exclusive" />
				</p>
				<p id="admin-action-result"></p>
			</div>
		{/if}
		{if isset($confirmation) && $confirmation}
			<p class="confirmation">
				{$confirmation}
			</p>
		{/if}
		<!-- left infos-->  
		<div class="pb-left-column col-xs-12 col-sm-4 col-md-4">
			<!-- product img-->        
			<div id="image-block" class="clearfix">
				{if $product->on_sale}
					<span class="sale-box no-print">
						<span class="sale-label">{l s='Sale!'}</span>
					</span>
				{elseif $product->specificPrice && $product->specificPrice.reduction && $productPriceWithoutReduction > $productPrice}
					<span class="discount">{l s='Reduced price!'}</span>
				{/if}
				{if $have_image}
					<span id="view_full_size">
						{if $jqZoomEnabled && $have_image && !$content_only}
							<a class="jqzoom" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" rel="gal1" href="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'thickbox_default')|escape:'html':'UTF-8'}" itemprop="url">
								<img itemprop="image" src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')|escape:'html':'UTF-8'}" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" alt="{$product->name|escape:'html':'UTF-8'}"/>
							</a>
						{else}
							<img id="bigpic" itemprop="image" src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')|escape:'html':'UTF-8'}" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" alt="{$product->name|escape:'html':'UTF-8'}" width="{$largeSize.width}" height="{$largeSize.height}"/>
							{if !$content_only}
								<span class="span_link no-print">{l s='View larger'}</span>
							{/if}
						{/if}
					</span>
				{else}
					<span id="view_full_size">
						<img itemprop="image" src="{$img_prod_dir}{$lang_iso}-default-large_default.jpg" id="bigpic" alt="{$product->name|escape:'html':'UTF-8'}" title="{$product->name|escape:'html':'UTF-8'}" width="{$largeSize.width}" height="{$largeSize.height}"/>
						{if !$content_only}
							<span class="span_link">
								{l s='View larger'}
							</span>
						{/if}
					</span>
				{/if}
			</div> <!-- end image-block -->
			{if isset($images) && count($images) > 0}
				<!-- thumbnails -->
				<div id="views_block" class="clearfix {if isset($images) && count($images) < 2}hidden{/if}">
					{if isset($images) && count($images) > 4}
						<span class="view_scroll_spacer">
							<a id="view_scroll_left" class="" title="{l s='Other views'}" href="javascript:{ldelim}{rdelim}">
								{l s='Previous'}
							</a>
						</span>
					{/if}
					<div id="thumbs_list">
						<ul id="thumbs_list_frame">
						{if isset($images)}
							{foreach from=$images item=image name=thumbnails}
								{assign var=imageIds value="`$product->id`-`$image.id_image`"}
								{if !empty($image.legend)}
									{assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
								{else}
									{assign var=imageTitle value=$product->name|escape:'html':'UTF-8'}
								{/if}
								<li id="thumbnail_{$image.id_image}"{if $smarty.foreach.thumbnails.last} class="last"{/if}>
									<a 
										{if $jqZoomEnabled && $have_image && !$content_only}
											href="javascript:void(0);"
											rel="{literal}{{/literal}gallery: 'gal1', smallimage: '{$link->getImageLink($product->link_rewrite, $imageIds, 'large_default')|escape:'html':'UTF-8'}',largeimage: '{$link->getImageLink($product->link_rewrite, $imageIds, 'thickbox_default')|escape:'html':'UTF-8'}'{literal}}{/literal}"
										{else}
											href="{$link->getImageLink($product->link_rewrite, $imageIds, 'thickbox_default')|escape:'html':'UTF-8'}"
											data-fancybox-group="other-views"
											class="fancybox{if $image.id_image == $cover.id_image} shown{/if}"
										{/if}
										title="{$imageTitle}">
										<img class="img-responsive" id="thumb_{$image.id_image}" src="{$link->getImageLink($product->link_rewrite, $imageIds, 'cart_default')|escape:'html':'UTF-8'}" alt="{$product->name|escape:'html':'UTF-8'}" title="{$imageTitle}" height="{$cartSize.height}" width="{$cartSize.width}" itemprop="image" />
									</a>
								</li>
							{/foreach}
						{/if}
						</ul>
					</div> <!-- end thumbs_list -->
					{if isset($images) && count($images) > 4}
						<a id="view_scroll_right" title="{l s='Other views'}" href="javascript:{ldelim}{rdelim}">
							{l s='Next'}
						</a>
					{/if}
				</div> <!-- end views-block -->
				<!-- end thumbnails -->
			{/if}
            {if isset($HOOK_EXTRA_RIGHT) && $HOOK_EXTRA_RIGHT}{$HOOK_EXTRA_RIGHT}{/if}
			{if isset($images) && count($images) > 1}
				<p class="resetimg clear no-print">
					<span id="wrapResetImages" style="display: none;">
						<a href="{$link->getProductLink($product)|escape:'html':'UTF-8'}" name="resetImages">
							<i class="icon-repeat"></i>
							{l s='Display all pictures'}
						</a>
					</span>
				</p>
			{/if}


		</div> <!-- end pb-left-column -->
		<!-- end left infos--> 
		<!-- center infos -->
		<div class="pb-center-column col-xs-7 col-sm-4">
			<h1 itemprop="name">{$product->name|escape:'html':'UTF-8'}</h1>
            {if isset($nbComments) && $nbComments > 0}
                <div class="comments_note" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    <div class="star_content clearfix">
                        {section name="i" start=0 loop=5 step=1}
                            {if $averageTotal le $smarty.section.i.index}
                                <div class="star"></div>
                            {else}
                                <div class="star star_on"></div>
                            {/if}
                        {/section}
                        <span class="nb-comments"><span itemprop="ratingCount">{l s='%s'|sprintf:$nbComments mod='productcomments'}</span> {l s='Review(s)' mod='productcomments'}</span>
                        <meta itemprop="worstRating" content = "0" />
                        <meta itemprop="ratingValue" content = "2" />
                        <meta itemprop="bestRating" content = "5" />
                    </div>
                </div>
            {/if}
            {if $product->description_short || $packItems|@count > 0}
                <div id="short_description_block">
                    {if $product->description_short}
                        <div id="short_description_content" class="rte align_justify" itemprop="description">{$product->description_short}</div>
                    {/if}

                    {if $product->description}
                        <p class="buttons_bottom_block">
                            <a href="javascript:{ldelim}{rdelim}" class="button">
                                {l s='More details'}
                            </a>
                        </p>
                    {/if}
                    <!--{if $packItems|@count > 0}
						<div class="short_description_pack">
						<h3>{l s='Pack content'}</h3>
							{foreach from=$packItems item=packItem}

							<div class="pack_content">
								{$packItem.pack_quantity} x <a href="{$link->getProductLink($packItem.id_product, $packItem.link_rewrite, $packItem.category)|escape:'html':'UTF-8'}">{$packItem.name|escape:'html':'UTF-8'}</a>
								<p>{$packItem.description_short}</p>
							</div>
							{/foreach}
						</div>
					{/if}-->
                </div> <!-- end short_description_block -->
            {/if}

                {if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $product->specificPrice.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $product->specificPrice.from) && ($product->specificPrice.to != '0000-00-00 00:00:00')}
                <div class="product_count_block">
                    <div class="countcontainer">
                        <div class="roycounttitle">
                            <span>{l s='Limited Special Offer! Expires in:'}</span>
                        </div>
                        <div class="roycountdown">
                            <div class="roycount" style="display: none;" data-specific-price-to="{$product->specificPrice.to}" data-days={l s='Days'} data-hours={l s='Hours'} data-minutes={l s='Minutes'} data-seconds={l s='Seconds'}></div>
                        </div>
                    </div>
                </div>
                {elseif ($product->specificPrice.to == '0000-00-00 00:00:00') && ($product->specificPrice.from == '0000-00-00 00:00:00')}
                <div class="product_count_block">
                    <div class="countcontainer">
                        <div class="roycountoff">
                            <span>{l s='Limited Special Offer!'}</span>
                        </div>
                    </div>
                </div>
                {/if}

             {if !$content_only}
                <!-- usefull links-->
                <ul id="usefull_link_block" class="clearfix no-print">
                    {if $HOOK_EXTRA_LEFT}{$HOOK_EXTRA_LEFT}{/if}
                	
                    <li class="opiniones">
                        <a href="#" onClick="opiniones();">
                            {l s='Opiniones de otros clientes'}
                        </a>
                    </li>  
		            <!-- Wishlist-->
		            {if isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS}{$HOOK_PRODUCT_ACTIONS}{/if}<strong></strong>
		            <!-- end Wishlist-->                                  	
                    <li class="print">
                        <a href="javascript:print();">
                            {l s='Print'}
                        </a>
                    </li>
                    {if $have_image && !$jqZoomEnabled}{/if}
                </ul>
            {/if}               

		</div>
		<!-- end center infos-->
		<div class="pb-right-column col-xs-2 col-sm-3">


           {if ($product->show_price && !isset($restricted_country_mode)) || isset($groups) || $product->reference || (isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS)}
                <!-- add to cart form-->
                <form id="buy_block" {if $PS_CATALOG_MODE && !isset($groups) && $product->quantity > 0}class="hidden"{/if} action="{$link->getPageLink('cart')|escape:'html':'UTF-8'}" method="post">
                    <!-- hidden datas -->
                    <p class="hidden">
                        <input type="hidden" name="token" value="{$static_token}" />
                        <input type="hidden" name="id_product" value="{$product->id|intval}" id="product_page_product_id" />
                        <input type="hidden" name="add" value="1" />
                        <input type="hidden" name="id_product_attribute" id="idCombination" value="" />
                    </p>
                    <div class="box-info-product">
                        <div class="content_prices clearfix">
                            {if $product->show_price && !isset($restricted_country_mode) && !$PS_CATALOG_MODE}
                                <!-- prices -->
                                <div class="price">

                                    {if (!$product->specificPrice)}
                                   
                                   {*} <div class="our_price_display" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <link itemprop="availability" {if $product->quantity <= 0}href="http://schema.org/OutOfStock"{else}href="http://schema.org/InStock"{/if}>
                                        {if $priceDisplay >= 0 && $priceDisplay <= 2}
                                            <span id="our_price_display" itemprop="price" content="{$productPrice}">{convertPrice price=$productPrice}</span>
                                            <!--{if $tax_enabled  && ((isset($display_tax_label) && $display_tax_label == 1) || !isset($display_tax_label))}
											{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}
										{/if}-->
                                            <meta itemprop="priceCurrency" content="{$currency->iso_code}" />
                                        {/if}
                                    </div>

	                                    <div id="old_price"{if (!$product->specificPrice || !$product->specificPrice.reduction) && $group_reduction == 0} class="hidden"{/if}>{strip}
	                                        {if $priceDisplay >= 0 && $priceDisplay <= 2}
	                                            <span id="old_price_display">{if $productPriceWithoutReduction > $productPrice}{convertPrice price=$productPriceWithoutReduction}{/if}</span>
	                                            <!-- {if $tax_enabled && $display_tax_label == 1}{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}{/if} -->
	                                        {/if}
	                                    </div>

	                                    {if $priceDisplay == 2}
	                                        <br />
	                                        <span id="pretaxe_price">
											<span id="pretaxe_price_display">{convertPrice price=$product->getPrice(false, $smarty.const.NULL)}</span>
	                                            {l s='tax excl.'}
										</span>
	                                    {/if}
	                                    {*}


	                                    <div class="esq">

		                                    <div id="reduccio">{strip}
											<span id="reduction_percent_display">
												-30%
											</span>
		                                    </div>
                               				 <div class="descuento">{l s='DESCUENTO'}</div>

	                                    </div>
	                                    <div class="dre"itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	                                        <link itemprop="availability" {if $product->quantity <= 0}href="http://schema.org/OutOfStock"{else}href="http://schema.org/InStock"{/if}>
	                                        {if $priceDisplay >= 0 && $priceDisplay <= 2}
	                                            <span id="our_price_display" itemprop="price" class="price product-price" content="{$productPrice}">
	                                            	{convertPrice price=$productPrice}

	                                            </span>
	                                            <span class="iva">{l s='IVA incluído'}</span>

	                                            <!--{if $tax_enabled  && ((isset($display_tax_label) && $display_tax_label == 1) || !isset($display_tax_label))}
												{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}
											{/if}-->
	                                            <meta itemprop="priceCurrency" content="{$currency->iso_code}" />
	                                        {/if}
											<span class="old-price product-price">
												{l s='PVP'} <span>{convertPrice price=(30*$productPrice/100)+$productPrice}</span>
											</span>
	                                    </div>





                                    
                                    {else}
	                                    <div class="esq">

		                                    <div id="reduction_percent" {if !$product->specificPrice || $product->specificPrice.reduction_type != 'percentage'} style="display:none;"{/if}>{strip}
											<span id="reduction_percent_display">
												{if $product->specificPrice && $product->specificPrice.reduction_type == 'percentage'}-{$product->specificPrice.reduction*100}%{/if}
											</span>
		                                    </div>
		                                    <div id="reduction_amount" {if !$product->specificPrice || $product->specificPrice.reduction_type != 'amount' || $product->specificPrice.reduction|floatval ==0} style="display:none"{/if}>{strip}
		                                    <span id="reduction_amount_display">
		                                    {if $product->specificPrice && $product->specificPrice.reduction_type == 'amount' && $product->specificPrice.reduction|intval !=0}
		                                        -{convertPrice price=$productPriceWithoutReduction-$productPrice|floatval}
		                                    {/if}
		                                    </span>
		                                    </div>
                               				 <div class="descuento">{l s='DESCUENTO'}</div>

	                                    </div>
	                                    <div class="dre"itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	                                        <link itemprop="availability" {if $product->quantity <= 0}href="http://schema.org/OutOfStock"{else}href="http://schema.org/InStock"{/if}>
	                                        {if $priceDisplay >= 0 && $priceDisplay <= 2}
	                                            <span id="our_price_display" itemprop="price" class="price product-price" content="{$productPrice}">
	                                            	{convertPrice price=$productPrice}

	                                            </span>
	                                            <span class="iva">{l s='IVA incluído'}</span>

	                                            <!--{if $tax_enabled  && ((isset($display_tax_label) && $display_tax_label == 1) || !isset($display_tax_label))}
												{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}
											{/if}-->
	                                            <meta itemprop="priceCurrency" content="{$currency->iso_code}" />
	                                        {/if}
											<span class="old-price product-price">
												{l s='PVP'} <span>{if $productPriceWithoutReduction > $productPrice}{convertPrice price=$productPriceWithoutReduction}{/if}</span>
											</span>
	                                    </div>
                                    {/if}

                                </div> <!-- end prices -->

                                {if $packItems|@count && $productPrice < $product->getNoPackPrice()}
                                    <p class="pack_price">{l s='Instead of'} <span style="text-decoration: line-through;">{convertPrice price=$product->getNoPackPrice()}</span></p>
                                {/if}
                                {if $product->ecotax != 0}
                                    <p class="price-ecotax">{l s='Include'} <span id="ecotax_price_display">{if $priceDisplay == 2}{$ecotax_tax_exc|convertAndFormatPrice}{else}{$ecotax_tax_inc|convertAndFormatPrice}{/if}</span> {l s='For green tax'}
                                        {if $product->specificPrice && $product->specificPrice.reduction}
                                            <br />{l s='(not impacted by the discount)'}
                                        {/if}
                                    </p>
                                {/if}
                                {if !empty($product->unity) && $product->unit_price_ratio > 0.000000}
                                    {math equation="pprice / punit_price"  pprice=$productPrice  punit_price=$product->unit_price_ratio assign=unit_price}
                                    <p class="unit-price"><span id="unit_price_display">{convertPrice price=$unit_price}</span> {l s='per'} {$product->unity|escape:'html':'UTF-8'}</p>
                                {/if}
                            {/if} {*close if for show price*}
                            <div class="clear"></div>
                        </div> <!-- end content_prices -->






                    </div> <!-- end box-info-product -->


            <div class="product_attributes clearfix">
                {assign var="manpic" value="img/m/{$product_manufacturer->id_manufacturer}.jpg"}
                {if file_exists($manpic)}
                    <div class="product_manufacturer_logo" style="margin-bottom:15px;">
                        <a href="{$link->getManufacturerLink($product->id_manufacturer)}" title="{l s='View all products'}">
                            <img src="{$content_dir}img/m/{$product_manufacturer->id_manufacturer}-medium_default.jpg" alt="{$product->manufacturer_name|escape:'htmlall':'UTF-8'}" /></a>
                        <div class="man_viewall"><a href="{$link->getManufacturerLink($product->id_manufacturer)}">{l s='View all products'}</a></div>
                    </div>
                {/if}

                {if $product->online_only}
                    <p class="online_only"><label>{l s='Status '} </label><span>{l s='Online only'}</span></p>
                {/if}
                <p id="product_manufacturer" {if !$product->id_manufacturer} style="display: none;"{/if}>
                    <label>{l s='Manufacturer '} </label>
                    <span class="editable">
                        <a href="{$link->getManufacturerLink($product->id_manufacturer)}">
                            {$product->manufacturer_name|escape:'htmlall':'UTF-8'}
                        </a>
                    </span>
                </p>
                <p id="product_reference"{if empty($product->reference) || !$product->reference} style="display: none;"{/if}>
                    <label>{l s='Reference '} </label>
                    <span class="editable" itemprop="sku">{if !isset($groups)}{$product->reference|escape:'html':'UTF-8'}{/if}</span>
                </p>
                {capture name=condition}
                    {if $product->condition == 'new'}{l s='New'}
                    {elseif $product->condition == 'used'}{l s='Used'}
                    {elseif $product->condition == 'refurbished'}{l s='Refurbished'}
                    {/if}
                {/capture}
                <p id="product_condition"{if !$product->condition} style="display: none;"{/if}>
                    <label>{l s='Condition '} </label>
                    <span class="editable" itemprop="itemCondition">{$smarty.capture.condition}</span>
                </p>
                {if $PS_STOCK_MANAGEMENT}
                    <!-- availability -->
                    <p id="availability_statut"{if ($product->quantity <= 0 && !$product->available_later && $allow_oosp) || ($product->quantity > 0 && !$product->available_now) || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none;"{/if}>
                        <label>{l s='Availability '} </label>
                        <span id="availability_value"{if $product->quantity <= 0} class="warning_inline"{/if}>{if $product->quantity <= 0}{if $allow_oosp}{$product->available_later}{else}{l s='This product is no longer in stock'}{/if}{else}{$product->available_now}{/if}</span>
                        <span class="warning_inline" id="last_quantities"{if ($product->quantity > $last_qties || $product->quantity <= 0) || $allow_oosp || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none"{/if} >{l s='( Last items in stock! )'}</span>
                    </p>
                {/if}
                {if ($display_qties == 1 && !$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && $product->available_for_order)}
                    <!-- number of item in stock -->
                    <p id="pQuantityAvailable"{if $product->quantity <= 0} style="display: none;"{/if}>
                        <label>{l s='Quantity '} </label>
                        <span id="quantityAvailable">{$product->quantity|intval}</span>
                        <span {if $product->quantity > 1} style="display: none;"{/if} id="quantityAvailableTxt">{l s='Item'}</span>
                        <span {if $product->quantity == 1} style="display: none;"{/if} id="quantityAvailableTxtMultiple">{l s='Items'}</span>
                    </p>
                {/if}
                <p id="availability_date"{if ($product->quantity > 0) || !$product->available_for_order || $PS_CATALOG_MODE || !isset($product->available_date) || $product->available_date < $smarty.now|date_format:'%Y-%m-%d'} style="display: none;"{/if}>
                    <label>{l s='Availability date '} </label>
                    <span id="availability_date_label">{l s='Availability date:'}</span>
                    <span id="availability_date_value">{dateFormat date=$product->available_date full=false}</span>
                </p>
                <!-- Out of stock hook -->
                <div id="oosHook"{if $product->quantity > 0} style="display: none;"{/if}>
                    {$HOOK_PRODUCT_OOS}
                </div>
                {if isset($groups)}
                    <!-- attributes -->
                    <div id="attributes">
                        <div class="clearfix"></div>
                        {foreach from=$groups key=id_attribute_group item=group}
                            {if $group.attributes|@count}
                                <fieldset class="attribute_fieldset">
                                    <label class="attribute_label" {if $group.group_type != 'color' && $group.group_type != 'radio'}for="group_{$id_attribute_group|intval}"{/if}>{$group.name|escape:'html':'UTF-8'} :&nbsp;</label>
                                    {assign var="groupName" value="group_$id_attribute_group"}
                                    <div class="attribute_list">
                                        {if ($group.group_type == 'select')}
                                            <select name="{$groupName}" id="group_{$id_attribute_group|intval}" class="form-control attribute_select no-print">
                                                {foreach from=$group.attributes key=id_attribute item=group_attribute}
                                                    <option value="{$id_attribute|intval}"{if (isset($smarty.get.$groupName) && $smarty.get.$groupName|intval == $id_attribute) || $group.default == $id_attribute} selected="selected"{/if} title="{$group_attribute|escape:'html':'UTF-8'}">{$group_attribute|escape:'html':'UTF-8'}</option>
                                                {/foreach}
                                            </select>
                                        {elseif ($group.group_type == 'color')}
                                            <ul id="color_to_pick_list" class="clearfix">
                                                {assign var="default_colorpicker" value=""}
                                                {foreach from=$group.attributes key=id_attribute item=group_attribute}
                                                    <li{if $group.default == $id_attribute} class="selected"{/if}>
                                                        <a href="{$link->getProductLink($product)|escape:'html':'UTF-8'}" id="color_{$id_attribute|intval}" name="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" class="color_pick{if ($group.default == $id_attribute)} selected{/if}" style="background: {$colors.$id_attribute.value|escape:'html':'UTF-8'};" title="{$colors.$id_attribute.name|escape:'html':'UTF-8'}">
                                                            {if file_exists($col_img_dir|cat:$id_attribute|cat:'.jpg')}
                                                                <img src="{$img_col_dir}{$id_attribute|intval}.jpg" alt="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" width="20" height="20" />
                                                            {/if}
                                                        </a>
                                                    </li>
                                                    {if ($group.default == $id_attribute)}
                                                        {$default_colorpicker = $id_attribute}
                                                    {/if}
                                                {/foreach}
                                            </ul>
                                            <input type="hidden" class="color_pick_hidden" name="{$groupName|escape:'html':'UTF-8'}" value="{$default_colorpicker|intval}" />
                                        {elseif ($group.group_type == 'radio')}
                                            <ul>
                                                {foreach from=$group.attributes key=id_attribute item=group_attribute}
                                                    <li>
                                                        <input type="radio" class="attribute_radio" name="{$groupName|escape:'html':'UTF-8'}" value="{$id_attribute}" {if ($group.default == $id_attribute)} checked="checked"{/if} />
                                                        <span>{$group_attribute|escape:'html':'UTF-8'}</span>
                                                    </li>
                                                {/foreach}
                                            </ul>
                                        {/if}
                                    </div> <!-- end attribute_list -->
                                </fieldset>
                            {/if}
                        {/foreach}
                    </div> <!-- end attributes -->
                {/if}

                <!-- quantity wanted -->
                {if !$PS_CATALOG_MODE}
					<div>
						<div class="clearfix"></div>
	                    <p id="quantity_wanted_p"{if (!$allow_oosp && $product->quantity <= 0) || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none;"{/if}>
	                        <input type="text" name="qty" id="quantity_wanted" class="text" value="{if isset($quantityBackup)}{$quantityBackup|intval}{else}{if $product->minimal_quantity > 1}{$product->minimal_quantity}{else}1{/if}{/if}" />
	                        {*}<a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down">
	                            <span><i class="icon-minus"></i></span>
	                        </a>
	                        <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up ">
	                            <span><i class="icon-plus"></i></span>
	                        </a>
	                        <span class="clearfix"></span>{*}
	                    </p>
					</div>
                {/if}
                        <div class="box-cart-bottom">
                            <div>
                                <p id="add_to_cart" class="buttons_bottom_block no-print">
                                    <button type="submit" name="Submit" class="btn button button-medium btn-default addcustom{if (!$allow_oosp && $product->quantity <= 0) || !$product->available_for_order || (isset($restricted_country_mode) && $restricted_country_mode) || $PS_CATALOG_MODE} disabled {/if}">
                                        <span>{l s='Add to cart'}</span>
                                    </button>
                                </p>
                            </div>
                        </div> <!-- end box-cart-bottom -->


                <!-- minimal quantity wanted -->
                <p id="minimal_quantity_wanted_p"{if $product->minimal_quantity <= 1 || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none;"{/if}>
                    {l s='This product is not sold individually. You must select at least'} <b id="minimal_quantity_label">{$product->minimal_quantity}</b> {l s='quantity for this product.'}
                </p>
            </div> <!-- end product_attributes -->

              </form>
            {/if}

            <div class="linia satisf">
            </div>

            {*<div class="linia">
					<div class="financia">
						<div class="esq"><div class="txt1">FINÁNCIALO</div><div class="txt2"><span>0%<span>interés</span></span></div></div>
						<div class="triang"></div>
						<div class="dre">{convertPrice price=$productPrice/15} <span>x 15 meses</span></div>
					</div>	
					<div class="baix" style="text-align:center;">{l s='solo se aplicará'} 3% {l s='de apertura'}</div>	
            </div>*}

             <div class="linia txt instala">
             	<strong>{l s='¿Necesitas instalación?'}</strong>
             	{l s='Nuestra red de colaboradores te ofrece un precio inmejorable'}
            </div>
            <div class="linia txt ayuda">
             	<strong>{l s='Nosotros te ayudamos'}</strong>
             	{l s='Si tienes alguna duda o prefieres realizar el pedido por teléfono'}
            </div>           


		</div>
	</div> <!-- end primary_block -->
	{if !$content_only}
{if (isset($quantity_discounts) && count($quantity_discounts) > 0)}
			<!-- quantity discount -->
			<section class="page-product-box">
				<h3 class="page-product-heading">{l s='Volume discounts'}</h3>
				<div id="quantityDiscount">
					<table class="std table-product-discounts">
						<thead>
							<tr>
								<th>{l s='Quantity'}</th>
								<th>{if $display_discount_price}{l s='Price'}{else}{l s='Discount'}{/if}</th>
								<th>{l s='You Save'}</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$quantity_discounts item='quantity_discount' name='quantity_discounts'}
							<tr id="quantityDiscount_{$quantity_discount.id_product_attribute}" class="quantityDiscount_{$quantity_discount.id_product_attribute}">
							<td>{$quantity_discount.quantity|intval}</td>
								<td>
									{if $quantity_discount.price >= 0 || $quantity_discount.reduction_type == 'amount'}
										{if $display_discount_price}
											{convertPrice price=$productPrice-$quantity_discount.real_value|floatval}
										{else}
											{convertPrice price=$quantity_discount.real_value|floatval}
										{/if}
									{else}
										{if $display_discount_price}
											{convertPrice price = $productPrice-($productPrice*$quantity_discount.reduction)|floatval}
										{else}
											{$quantity_discount.real_value|floatval}%
										{/if}
									{/if}
								</td>
								<td>
									<span>{l s='Up to'}</span>
									{if $quantity_discount.price >= 0 || $quantity_discount.reduction_type == 'amount'}
										{$discountPrice=$productPrice-$quantity_discount.real_value|floatval}
									{else}
										{$discountPrice=$productPrice-($productPrice*$quantity_discount.reduction)|floatval}
									{/if}
									{$discountPrice=$discountPrice*$quantity_discount.quantity}
									{$qtyProductPrice = $productPrice*$quantity_discount.quantity}
									{convertPrice price=$qtyProductPrice-$discountPrice}
								</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</section>
		{/if}

        {if (isset($product) && $product->description) || (isset($features) && $features) || (isset($accessories) && $accessories) || (isset($HOOK_PRODUCT_TAB) && $HOOK_PRODUCT_TAB) || (isset($attachments) && $attachments) || isset($product) && $product->customizable}
            <div id="more_info_block" class="col-md-12 review-tab">
                <ul id="more_info_tabs" class="idTabs idTabsShort nav nav-tabs">
                    {if $product->description}<li><a id="more_info_tab_more_info" href="#idTab1">{l s='More info'}</a></li>{/if}
                    {if $features}<li><a id="more_info_tab_data_sheet" href="#idTab2">{l s='Data sheet'}</a></li>{/if}
                    {if $attachments}<li><a id="more_info_tab_attachments" href="#idTab9">{l s='Download'}</a></li>{/if}
                    {if isset($accessories) AND $accessories}<li><a href="#idTab4">{l s='Accessories'}</a></li>{/if}
                    {if isset($product) && $product->customizable}<li><a href="#idTab10">{l s='Customization'}</a></li>{/if}
                    {if isset($HOOK_PRODUCT_TAB) && $HOOK_PRODUCT_TAB}{$HOOK_PRODUCT_TAB}{/if}
                </ul>

                <div id="more_info_sheets" class="sheets align_justify">
                    {if isset($product) && $product->description}
                        <!-- full description -->
                        <section class="page-product-box" id="idTab1">
                            {$product->description}
                        </section>
                    {/if}

                    {if isset($HOOK_PRODUCT_TAB) && $HOOK_PRODUCT_TAB}
                        

                            {if isset($HOOK_PRODUCT_TAB_CONTENT) && $HOOK_PRODUCT_TAB_CONTENT}{$HOOK_PRODUCT_TAB_CONTENT}{/if}

                    {/if}

                    {if isset($features) && $features}
                        <!-- product's features -->
                        <section class="page-product-box" id="idTab2">
                                <table class="table-data-sheet">
                                    {foreach from=$features item=feature}
                                        <tr class="{cycle values="odd,even"}">
                                            {if isset($feature.value)}
                                                <td>{$feature.name|escape:'html':'UTF-8'}</td>
                                                <td>{$feature.value|escape:'html':'UTF-8'}</td>
                                            {/if}
                                        </tr>
                                    {/foreach}
                                </table>
                        </section>
                    {/if}

                    {if isset($attachments) && $attachments}
                        <section class="page-product-box" id="idTab9">
                            <!--Download -->
                                {foreach from=$attachments item=attachment name=attachements}
                                    {if $smarty.foreach.attachements.iteration %3 == 1}<div class="row">{/if}
                                    <div class="col-lg-4">
                                        <h4><a href="{$link->getPageLink('attachment', true, NULL, "id_attachment={$attachment.id_attachment}")|escape:'html':'UTF-8'}">{$attachment.name|escape:'html':'UTF-8'}</a></h4>
                                        <p class="text-muted">{$attachment.description|escape:'html':'UTF-8'}</p>
                                        <a class="btn btn-default btn-block" href="{$link->getPageLink('attachment', true, NULL, "id_attachment={$attachment.id_attachment}")|escape:'html':'UTF-8'}">
                                            <i class="icon-download"></i>
                                            {l s="Download"} ({Tools::formatBytes($attachment.file_size, 2)})
                                        </a>
                                        <hr>
                                    </div>
                                    {if $smarty.foreach.attachements.iteration %3 == 0 || $smarty.foreach.attachements.last}</div>{/if}
                                {/foreach}
                        </section>
                            <!--end Download -->
                    {/if}

                    {if isset($accessories) AND $accessories}
                        <!-- accessories -->
                        <section class="page-product-box" id="idTab4">
                            <div class="block products_block accessories_block clearfix">
                                <div class="block_content">
                                    <ul>
                                        {foreach from=$accessories item=accessory name=accessories_list}
                                            {if ($accessory.allow_oosp || $accessory.quantity_all_versions > 0 || $accessory.quantity > 0) AND $accessory.available_for_order AND !isset($restricted_country_mode)}
                                                {assign var='accessoryLink' value=$link->getProductLink($accessory.id_product, $accessory.link_rewrite, $accessory.category)}
                                                <li class="ajax_block_product{if $smarty.foreach.accessories_list.first} first_item{elseif $smarty.foreach.accessories_list.last} last_item{else} item{/if} product_accessories_description">
                                                    <div class="product_desc">
                                                        <a href="{$accessoryLink|escape:'htmlall':'UTF-8'}" title="{$accessory.legend|escape:'htmlall':'UTF-8'}" class="product_image"><img src="{$link->getImageLink($accessory.link_rewrite, $accessory.id_image, 'home_default')|escape:'html'}" alt="{$accessory.name|escape:'htmlall':'UTF-8'}" width="{$homeSize.width}" height="{$homeSize.height}" /></a>
                                                        <p class="s_title_block">
                                                            <a href="{$accessoryLink|escape:'htmlall':'UTF-8'}">{$accessory.name|escape:'htmlall':'UTF-8'}</a>
                                                            {if $accessory.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE} - <span class="price">{if $priceDisplay != 1}{displayWtPrice p=$accessory.price}{else}{displayWtPrice p=$accessory.price_tax_exc}{/if}</span>{/if}
                                                        </p>
                                                        <div class="block_description">
                                                            <a href="{$accessoryLink|escape:'htmlall':'UTF-8'}" title="{l s='More'}" class="product_description">{$accessory.description_short|strip_tags|truncate:400:'...'}</a>
                                                        </div>
                                                        <div class="clear_product_desc">&nbsp;</div>
                                                    </div>

                                                    <p class="clearfix" style="margin-top:5px">
                                                        <a class="button btn btn-default button-medium" href="{$accessoryLink|escape:'htmlall':'UTF-8'}" title="{l s='View'}"><span>{l s='View'}</span></a>
                                                        {if !$PS_CATALOG_MODE && ($accessory.allow_oosp || $accessory.quantity > 0)}
                                                            <a class="button btn btn-default button-medium exclusive" href="{$link->getPageLink('cart', true, NULL, "qty=1&amp;id_product={$accessory.id_product|intval}&amp;token={$static_token}&amp;add")|escape:'html'}" rel="ajax_id_product_{$accessory.id_product|intval}" title="{l s='Add to cart'}"><span>{l s='Add to cart'}</span></a>
                                                        {/if}
                                                    </p>

                                                </li>
                                            {/if}
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        </section>
                    {/if}

                    <!-- Customizable products -->
                    {if isset($product) && $product->customizable}
                        <section class="page-product-box" id="idTab10">
                            <div class="bullet customization_block">
                                <form method="post" action="{$customizationFormTarget}" enctype="multipart/form-data" id="customizationForm" class="clearfix">
                                    <p class="infoCustomizable">
                                        {l s='After saving your customized product, remember to add it to your cart.'}
                                        {if $product->uploadable_files}<br />{l s='Allowed file formats are: GIF, JPG, PNG'}{/if}
                                    </p>
                                    {if $product->uploadable_files|intval}
                                        <div class="customizableProductsFile">
                                            <h3>{l s='Pictures'}</h3>
                                            <ul id="uploadable_files" class="clearfix">
                                                {counter start=0 assign='customizationField'}
                                                {foreach from=$customizationFields item='field' name='customizationFields'}
                                                    {if $field.type == 0}
                                                        <li class="customizationUploadLine{if $field.required} required{/if}">{assign var='key' value='pictures_'|cat:$product->id|cat:'_'|cat:$field.id_customization_field}
                                                            {if isset($pictures.$key)}
                                                                <div class="customizationUploadBrowse">
                                                                    <img src="{$pic_dir}{$pictures.$key}_small" alt="Imagen" />
                                                                    <a href="{$link->getProductDeletePictureLink($product, $field.id_customization_field)|escape:'html'}" title="{l s='Delete'}" >
                                                                        <img src="{$img_dir}icon/delete.gif" alt="{l s='Delete'}" class="customization_delete_icon" width="11" height="13" />
                                                                    </a>
                                                                </div>
                                                            {/if}
                                                            <div class="customizationUploadBrowse">
                                                                <label class="customizationUploadBrowseDescription">{if !empty($field.name)}{$field.name}{else}{l s='Please select an image file from your computer'}{/if}{if $field.required}<sup>*</sup>{/if}</label>
                                                                <input type="file" name="file{$field.id_customization_field}" id="img{$customizationField}" class="customization_block_input {if isset($pictures.$key)}filled{/if}" />
                                                            </div>
                                                        </li>
                                                        {counter}
                                                    {/if}
                                                {/foreach}
                                            </ul>
                                        </div>
                                    {/if}
                                    {if $product->text_fields|intval}
                                        <div class="customizableProductsText">
                                            <h3>{l s='Text'}</h3>
                                            <ul id="text_fields">
                                                {counter start=0 assign='customizationField'}
                                                {foreach from=$customizationFields item='field' name='customizationFields'}
                                                    {if $field.type == 1}
                                                        <li class="customizationUploadLine{if $field.required} required{/if}">
                                                            <label for ="textField{$customizationField}">{assign var='key' value='textFields_'|cat:$product->id|cat:'_'|cat:$field.id_customization_field} {if !empty($field.name)}{$field.name}{/if}{if $field.required}<sup>*</sup>{/if}</label>
                                                            <textarea name="textField{$field.id_customization_field}" id="textField{$customizationField}" rows="1" cols="40" class="customization_block_input">{if isset($textFields.$key)}{$textFields.$key|stripslashes}{/if}</textarea>
                                                        </li>
                                                        {counter}
                                                    {/if}
                                                {/foreach}
                                            </ul>
                                        </div>
                                    {/if}
                                    <p id="customizedDatas">
                                        <input type="hidden" name="quantityBackup" id="quantityBackup" value="" />
                                        <input type="hidden" name="submitCustomizedDatas" value="1" />
                                        <input type="button" class="button btn button-medium btn-default" value="{l s='Save'}" onclick="javascript:saveCustomization()" />
                                        <span id="ajax-loader" style="display:none"><img src="{$img_ps_dir}loader.gif" alt="Cargando" /></span>
                                    </p>
                                </form>
                                <p class="clear required"><sup>*</sup> {l s='required fields'}</p>
                            </div>
                        </section>
                    {/if}
                </div>
            </div>
        {/if}

        {if isset($HOOK_PRODUCT_FOOTER) && $HOOK_PRODUCT_FOOTER}{$HOOK_PRODUCT_FOOTER}{/if}

		<!-- description & features -->
		{if isset($packItems) && $packItems|@count > 0}
		<section id="blockpack">
			<h3 class="page-product-heading">{l s='Pack content'}</h3>
			{include file="$tpl_dir./product-list.tpl" products=$packItems}
		</section>
		{/if}
	{/if}
{strip}
{if isset($smarty.get.ad) && $smarty.get.ad}
	{addJsDefL name=ad}{$base_dir|cat:$smarty.get.ad|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{if isset($smarty.get.adtoken) && $smarty.get.adtoken}
	{addJsDefL name=adtoken}{$smarty.get.adtoken|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{addJsDef allowBuyWhenOutOfStock=$allow_oosp|boolval}
{addJsDef availableNowValue=$product->available_now|escape:'quotes':'UTF-8'}
{addJsDef availableLaterValue=$product->available_later|escape:'quotes':'UTF-8'}
{addJsDef attribute_anchor_separator=$attribute_anchor_separator|escape:'quotes':'UTF-8'}
{addJsDef attributesCombinations=$attributesCombinations}
{addJsDef currentDate=$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}
{if isset($combinations) && $combinations}
	{addJsDef combinations=$combinations}
	{addJsDef combinationsFromController=$combinations}
	{addJsDef displayDiscountPrice=$display_discount_price}
	{addJsDefL name='upToTxt'}{l s='Up to' js=1}{/addJsDefL}
{/if}
{if isset($combinationImages) && $combinationImages}
	{addJsDef combinationImages=$combinationImages}
{/if}
{addJsDef customizationId=$id_customization}
{addJsDef customizationFields=$customizationFields}
{addJsDef default_eco_tax=$product->ecotax|floatval}
{addJsDef displayPrice=$priceDisplay|intval}
{addJsDef ecotaxTax_rate=$ecotaxTax_rate|floatval}
{if isset($cover.id_image_only)}
	{addJsDef idDefaultImage=$cover.id_image_only|intval}
{else}
	{addJsDef idDefaultImage=0}
{/if}
{addJsDef img_ps_dir=$img_ps_dir}
{addJsDef img_prod_dir=$img_prod_dir}
{addJsDef id_product=$product->id|intval}
{addJsDef jqZoomEnabled=$jqZoomEnabled|boolval}
{addJsDef maxQuantityToAllowDisplayOfLastQuantityMessage=$last_qties|intval}
{addJsDef minimalQuantity=$product->minimal_quantity|intval}
{addJsDef noTaxForThisProduct=$no_tax|boolval}
{if isset($customer_group_without_tax)}
	{addJsDef customerGroupWithoutTax=$customer_group_without_tax|boolval}
{else}
	{addJsDef customerGroupWithoutTax=false}
{/if}
{if isset($group_reduction)}
	{addJsDef groupReduction=$group_reduction|floatval}
{else}
	{addJsDef groupReduction=false}
{/if}
{addJsDef oosHookJsCodeFunctions=Array()}
{addJsDef productHasAttributes=isset($groups)|boolval}
{addJsDef productPriceTaxExcluded=($product->getPriceWithoutReduct(true)|default:'null' - $product->ecotax)|floatval}
{addJsDef productPriceTaxIncluded=($product->getPriceWithoutReduct(false)|default:'null' - $product->ecotax * (1 + $ecotaxTax_rate / 100))|floatval}
{addJsDef productBasePriceTaxExcluded=($product->getPrice(false, null, 6, null, false, false) - $product->ecotax)|floatval}
{addJsDef productBasePriceTaxExcl=($product->getPrice(false, null, 6, null, false, false)|floatval)}
{addJsDef productBasePriceTaxIncl=($product->getPrice(true, null, 6, null, false, false)|floatval)}
{addJsDef productReference=$product->reference|escape:'html':'UTF-8'}
{addJsDef productAvailableForOrder=$product->available_for_order|boolval}
{addJsDef productPriceWithoutReduction=$productPriceWithoutReduction|floatval}
{addJsDef productPrice=$productPrice|floatval}
{addJsDef productUnitPriceRatio=$product->unit_price_ratio|floatval}
{addJsDef productShowPrice=(!$PS_CATALOG_MODE && $product->show_price)|boolval}
{addJsDef PS_CATALOG_MODE=$PS_CATALOG_MODE}
{if $product->specificPrice && $product->specificPrice|@count}
	{addJsDef product_specific_price=$product->specificPrice}
{else}
	{addJsDef product_specific_price=array()}
{/if}
{if $display_qties == 1 && $product->quantity}
	{addJsDef quantityAvailable=$product->quantity}
{else}
	{addJsDef quantityAvailable=0}
{/if}
{addJsDef quantitiesDisplayAllowed=$display_qties|boolval}
{if $product->specificPrice && $product->specificPrice.reduction && $product->specificPrice.reduction_type == 'percentage'}
	{addJsDef reduction_percent=$product->specificPrice.reduction*100|floatval}
{else}
	{addJsDef reduction_percent=0}
{/if}
{if $product->specificPrice && $product->specificPrice.reduction && $product->specificPrice.reduction_type == 'amount'}
	{addJsDef reduction_price=$product->specificPrice.reduction|floatval}
{else}
	{addJsDef reduction_price=0}
{/if}
{if $product->specificPrice && $product->specificPrice.price}
	{addJsDef specific_price=$product->specificPrice.price|floatval}
{else}
	{addJsDef specific_price=0}
{/if}
{addJsDef specific_currency=($product->specificPrice && $product->specificPrice.id_currency)|boolval} {* TODO: remove if always false *}
{addJsDef stock_management=$PS_STOCK_MANAGEMENT|intval}
{addJsDef taxRate=$tax_rate|floatval}
{addJsDefL name=doesntExist}{l s='This combination does not exist for this product. Please select another combination.' js=1}{/addJsDefL}
{addJsDefL name=doesntExistNoMore}{l s='This product is no longer in stock' js=1}{/addJsDefL}
{addJsDefL name=doesntExistNoMoreBut}{l s='with those attributes but is available with others.' js=1}{/addJsDefL}
{addJsDefL name=fieldRequired}{l s='Please fill in all the required fields before saving your customization.' js=1}{/addJsDefL}
{addJsDefL name=uploading_in_progress}{l s='Uploading in progress, please be patient.' js=1}{/addJsDefL}
{addJsDefL name='product_fileDefaultHtml'}{l s='No file selected' js=1}{/addJsDefL}
{addJsDefL name='product_fileButtonHtml'}{l s='Choose File' js=1}{/addJsDefL}
{/strip}
{/if}
