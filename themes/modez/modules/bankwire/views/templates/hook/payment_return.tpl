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
		'option': 'Transferencia'
	});

{/literal}
{/if}
</script> --> {*}
	<div class="box">
		<p class="cheque-indent">
			<strong class="dark">{l s='Your order on %s is complete.' sprintf=$shop_name mod='bankwire'}</strong>
		</p>
		{l s='Please send us a bank wire with' mod='bankwire'}
		<br />- {l s='Amount' mod='bankwire'} <span class="price"> <strong>{$total_to_pay}</strong></span>
		<br />- {l s='Name of account owner' mod='bankwire'}  <strong>{if $bankwireOwner}{$bankwireOwner}{else}___________{/if}</strong>
		<br />- {l s='Puede elegir hacer la transferencia a cualquiera de estas cuentas' mod='bankwire'}:<br/><br/>

		<strong style="font-size:15px;">{if $bankwireDetails}{$bankwireDetails}{else}___________{/if}</strong><br/><br/>

		
		{if !isset($reference)}
			<br />- {l s='Do not forget to insert your order number #%d in the subject of your bank wire' sprintf=$id_order mod='bankwire'}
		{else}
			<br />- {l s='Do not forget to insert your order reference %s in the subject of your bank wire.' sprintf=$reference mod='bankwire'}
		{/if}		<br />{l s='An email has been sent with this information.' mod='bankwire'}
		<br /> <strong>{l s='Your order will be sent as soon as we receive payment.' mod='bankwire'}</strong>
		<br />{l s='If you have questions, comments or concerns, please contact our' mod='bankwire'} <a href="{$link->getPageLink('contact', true)|escape:'html':'UTF-8'}">{l s='expert customer support team. ' mod='bankwire'}</a>.
	</div>
{else}
	<p class="alert alert-warning">
		{l s='We noticed a problem with your order. If you think this is an error, feel free to contact our' mod='bankwire'} 
		<a href="{$link->getPageLink('contact', true)|escape:'html':'UTF-8'}">{l s='expert customer support team. ' mod='bankwire'}</a>.
	</p>
{/if}
