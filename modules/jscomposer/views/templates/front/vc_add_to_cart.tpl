{foreach from=$products item=product name=products}
    <div class="vc_add_to_cart" style="{$style}">
{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
    <div class="content_price">
            {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
    
                    <span class="price product-price">
                            {if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
                    </span>
                    {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
                            {hook h="displayProductPriceBlock" product=$product type="old_price"}
                            <span class="old-price product-price">
                                    {displayWtPrice p=$product.price_without_reduction}
                            </span>
                            {hook h="displayProductPriceBlock" id_product=$product.id_product type="old_price"}
                            {if $product.specific_prices.reduction_type == 'percentage'}
                                    <span class="price-percent-reduction">-{$product.specific_prices.reduction * 100}%</span>
                            {/if}
                    {/if}
                    
            {/if}
    </div>
{/if}    
<div class="button-container">
        {if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.customizable != 2 && !$PS_CATALOG_MODE}
                {if (!isset($product.customization_required) || !$product.customization_required) && ($product.allow_oosp || $product.quantity > 0)}
                        {capture}add=1&amp;id_product={$product.id_product|intval}{if isset($static_token)}&amp;token={$static_token}{/if}{/capture}
                        <a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart', true, NULL, $smarty.capture.default, false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}" data-minimal_quantity="{if isset($product.product_attribute_minimal_quantity) && $product.product_attribute_minimal_quantity >= 1}{$product.product_attribute_minimal_quantity|intval}{else}{$product.minimal_quantity|intval}{/if}">
                                <span>{l s='Add to cart'}</span>
                        </a>
                {else}
                        <span class="button ajax_add_to_cart_button btn btn-default disabled">
                                <span>{l s='Add to cart'}</span>
                        </span>
                {/if}
        {/if}        
</div>
        </div>
{/foreach}