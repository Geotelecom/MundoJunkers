{*
*  @author Coccinet <web@coccinet.com>
*  @copyright  2007-2014 Coccinet
*}
{if $status == 'ok'}
<!-- Google Code for Conversiones en el Sitio Web Conversion Page -->
<script type="text/javascript" data-keepinline="true">
/* <![CDATA[ */
var google_conversion_id = 831463243;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "GFnICPGg_nUQy768jAM";
var google_conversion_value = {$total_to_pay_ga|string_format:"%.2f"};
var google_conversion_currency = "EUR";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" data-keepinline="true" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/831463243/?value={$total_to_pay_ga|string_format:"%.2f"}&amp;currency_code=EUR&amp;label=GFnICPGg_nUQy768jAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
{*} <!--
<script type="text/javascript" data-keepinline="true">
{if $page_name == 'order-confirmation'}
{literal}
    ga('require', 'ec');
{/literal}
{foreach from=$products_info item=product name=productLoop}
{literal}
    ga('ec:addProduct', {
        'id': '{/literal}{$product.id_product}{literal}',
        'name': '{/literal}{$product.product_name|escape:quotes}{literal}',
        'price': '{/literal}{$product.product_price|string_format:"%.2f"}{literal}',
        'quantity': {/literal}{$product.product_quantity}{literal}
    });

{/literal}
{/foreach}{literal}
    ga('ec:setAction', 'purchase', {
        'id': '{/literal}{$order_info->reference}{literal}',
        'affiliation': 'Mundo Junkers',
        'revenue': '{/literal}{$order_info->total_paid_tax_incl|string_format:"%.2f"}{literal}',
        'shipping': '{/literal}{$order_info->total_shipping_tax_incl|string_format:"%.2f"}{literal}'
    });

	ga('ec:setAction','checkout', {
		'step': 1,
		'option': 'Addons Payment'
	});

{/literal}
{/if}
</script> --> {*}
<p class="realexresponse"><strong>{l s='Your payment has been successful and your order is complete.' mod='realexredirect'}</strong>		
	</p>
{else}
	<p class="warning">
		{l s='We noticed a problem with your order. Please return to the checkout and try again ' mod='realexredirect'} 
		<a href="{$link->getPageLink('contact', true)|escape:'htmlall':'UTF-8'}">{l s='or contact the store administrator.' mod='realexredirect'}</a>
	</p>
{/if}
