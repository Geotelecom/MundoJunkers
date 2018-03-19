{*
* 2007-2015 PrestaShop
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
*  @copyright 2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}


{*Displaying a button or the iframe*}
{if $payment_hss_solution == $smarty.const.PAYPAL_HSS_REDIRECTION}
	<div class="row">
		<div class="col-xs-12">
		<p class="payment_module paypal" >
			<a href="javascript:void(0)" onclick="$('#paypal_form').submit();" id="paypal_process_payment" title="{$PayPal_content.payment_choice|escape:'htmlall':'UTF-8'}">
				{$PayPal_content.payment_choice|escape:'htmlall':'UTF-8'}
				{if $fee > 0}
					<span>{l s='Administration fees' mod='paypal'}{if $feedetail neq ''} ({$feedetail}){/if}: <span style="font-weight:bold">{convertPrice price=$fee}</span></span>
				{/if}
			</a>
		</p>
		</div>
	</div>
{else}
	<div class="row">
		<div class="col-xs-12">
		<p class="payment_module">
			<iframe name="hss_iframe" width="556px" height="540px" style="overflow: hidden; border: none" class="payment_module"></iframe>	
		</p>
		</div>
	</div>
{/if}

<style>
	p.payment_module.paypal a 
	{ldelim}
		padding-left:180px;
		{if isset($use_mobile) && $use_mobile}
			background: url("{$base_dir_ssl|escape:'htmlall':'UTF-8'}modules/paypal/img/logos/express_checkout_mobile/CO_{$PayPal_lang_code|escape:'htmlall':'UTF-8'}_orange_295x43.png") no-repeat scroll #FBFBFB;
		{else}
			{if isset($logos.LocalPayPalHorizontalSolutionPP)}
				background: url("{$logos.LocalPayPalHorizontalSolutionPP|escape:'htmlall':'UTF-8'}") no-repeat scroll #FBFBFB;
			{else}
				background: url({$logos.LocalPayPalLogoMedium|escape:'htmlall':'UTF-8'}) no-repeat scroll #FBFBFB;
			{/if}
		{/if}
		background-position: 4px;
		background-size: 170px;
	{rdelim}

	p.payment_module.paypal a:after
	{ldelim}
		display: block;
		content: "";
		position: absolute;
		right: 15px;
		margin-top: -11px;
		top: 50%;
		font-family: "FontAwesome";
		font-size: 25px;
		height: 22px;
		width: 14px;
		color: #777;
	{rdelim}
	
	@media(max-width: 360px)
	{ldelim}
		p.payment_module.paypal a 
		{ldelim}
			padding: 85px 40px 30px;
			background-position: center 30px;
		{rdelim}
	{rdelim}
</style>


<form style="display: none" {if $payment_hss_solution == $smarty.const.PAYPAL_HSS_IFRAME}target="hss_iframe"{/if} id="paypal_form" name="paypal_form" method="post" action="{$action_url|escape:'htmlall':'UTF-8'}">
	<input type="hidden" name="cmd" value="_hosted-payment" />

	<input type="hidden" name="billing_first_name" value="{$billing_address->firstname|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="billing_last_name" value="{$billing_address->lastname|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="billing_address1" value="{$billing_address->address1|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="billing_address2" value="{$billing_address->address2|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="billing_city" value="{$billing_address->city|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="billing_zip" value="{$billing_address->postcode|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="billing_country" value="{$billing_address->country->iso_code|escape:'htmlall':'UTF-8'}" />
	{if ($billing_address->id_state != 0)}
		<input type="hidden" name="billing_state" value="{$billing_address->state->name|escape:'htmlall':'UTF-8'}" />
	{/if}
	<input type="hidden" name="first_name" value="{$delivery_address->firstname|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="last_name" value="{$delivery_address->lastname|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="buyer_email" value="{$customer->email|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="address1" value="{$delivery_address->address1|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="address2" value="{$delivery_address->address2|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="city" value="{$delivery_address->city|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="zip" value="{$delivery_address->postcode|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="country" value="{$delivery_address->country->iso_code|escape:'htmlall':'UTF-8'}" />
	{if ($delivery_address->id_state != 0)}
		<input type="hidden" name="billing_state" value="{$delivery_address->state->name|escape:'htmlall':'UTF-8'}" />
	{/if}

	<input type="hidden" name="address_override" value="true" />
	<input type="hidden" name="showShippingAddress" value="true" />

	<input type="hidden" name="currency_code" value="{$currency->iso_code|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="invoice" value="{$customer->id|intval}_{$time|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="shipping" value="{$shipping|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="tax" value="{$cart_details.total_tax|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="subtotal" value="{$subtotal|escape:'htmlall':'UTF-8'}" />

	<input type="hidden" name="custom" value="{$custom|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="notify_url" value="{$notify_url|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="paymentaction" value="sale" />
	<input type="hidden" name="business" value="{$business_account|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="template" value="template{$payment_hss_template}" />
	<input type="hidden" name="cbt" value="{l s='Return back to the merchant\'s website' mod='paypal'}" />
	<input type="hidden" name="cancel_return" value="{$cancel_return|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="return" value="{$return_url|escape:'htmlall':'UTF-8'}" />
    <input type="hidden" name="bn" value="{$tracking_code|escape:'htmlall':'UTF-8'}" />
    <input type="hidden" name="lc" value="{$iso_code|escape:'htmlall':'UTF-8'}" />
</form>

{if $payment_hss_solution == $smarty.const.PAYPAL_HSS_IFRAME}
{literal}
<script type="text/javascript">
	$(document).ready( function() {
		$('#paypal_form').submit();
	});
</script>
{/literal}
{/if}
