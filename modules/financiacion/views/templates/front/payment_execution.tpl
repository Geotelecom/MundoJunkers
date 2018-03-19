{capture name=path}
	<a href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'html':'UTF-8'}" title="{l s='Go back to the Checkout' mod='financiacion'}">{l s='Checkout' mod='financiacion'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Pago por financiación' mod='financiacion'}
{/capture}

{include file="$tpl_dir./breadcrumb.tpl"}

<h2>{l s='Resumen de pedido' mod='financiacion'}</h2>

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

{if $nbProducts <= 0}
	<p class="warning">{l s='Your shopping cart is empty.' mod='financiacion'}</p>
{else}

<h3>{l s='Pago por financiación' mod='financiacion'}</h3>
<form action="{$link->getModuleLink('financiacion', 'validation', [], true)|escape:'html'}" method="post">
<p>
	{l s='Ha elegido pago por financiación' mod='financiacion'}
</p>
{*}<p style="margin-top:20px;">
	- {l s='The total amount of your order is' mod='financiacion'}
	<span id="amount" class="price">{displayPrice price=$total}</span>
	{if $use_taxes == 1}
    	{l s='(tax incl.)' mod='financiacion'}
    {/if}
</p>
<p>
	-
	{if $currencies|@count > 1}
		{l s='We allow several currencies to be sent via bank wire.' mod='financiacion'}
		<br /><br />
		{l s='Choose one of the following:' mod='financiacion'}
		<select id="currency_payement" name="currency_payement" onchange="setCurrency($('#currency_payement').val());">
			{foreach from=$currencies item=currency}
				<option value="{$currency.id_currency}" {if $currency.id_currency == $cust_currency}selected="selected"{/if}>{$currency.name}</option>
			{/foreach}
		</select>
	{else}
		{l s='We allow the following currency to be sent via bank wire:' mod='financiacion'}&nbsp;<b>{$currencies.0.name}</b>
		<input type="hidden" name="currency_payement" value="{$currencies.0.id_currency}" />
	{/if}
</p>{*}
<p>
	{l s='Va a proceder a seleccionar el pago por FINANCIACIÓN, en la siguiente página habiendo confirmado el pedido le daremos más información del proceso' mod='financiacion'}
	<br /><br />
	<b>{l s='Please confirm your order by clicking "I confirm my order".' mod='financiacion'}</b>
</p>
<p class="cart_navigation" id="cart_navigation">
	<input type="submit" value="{l s='I confirm my order' mod='financiacion'}" class="exclusive_large" />
	<a href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'html'}" class="button_large">{l s='Other payment methods' mod='financiacion'}</a>
</p>
</form>
{/if}
