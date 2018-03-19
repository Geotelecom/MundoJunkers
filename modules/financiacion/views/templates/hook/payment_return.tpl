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
		'option': 'Financiación'
	});

{/literal}
{/if}
</script> --> {*}

<p>{l s='Su pedido en %s se ha completado.' sprintf=$shop_name mod='financiacion'}
<br/>{l s='Ha elegido pago por Financiación' mod='financiacion'}<br/><br/>
{l s='Las tramitamos on line únicamente mediante el Banc de Sabadell .Puesto que vendemos por toda España, las financiaciones las tramitamos de forma virtual. Aunque el cliente que pretende financiar no trabaje con ellos, ésto no supone ningún inconveniente.' mod='financiacion'}</p>

<p>{l s='Le pasamos al cliente una simulación como la que le adjunto al mismo, y éste nos indica el plazo escogido. Puede ser a 6 / 9 /12 /15 meses  sin interés, sólo diferentes % en concepto de comisión de apertura según los meses a financiar o hasta 60 meses con intereses, en una llamada telefónica nos dicen si está aprobada o no .' mod='financiacion'}</p>

<p>{l s='Como la tramitación se hace de forma virtual, la entidad financiera envía al titutar solicitante un código pin de 6 dígitos, al móvil que facilita el cliente, y éste me lo tiene que hacer llegar a mí para introducirlo en su sistema, de esta manera queda firmado el contrato de financiación, que previamente se ha facilitado mediante correo electrónico para que lo pueda revisar el cliente antes de firmar.' mod='financiacion'}</p>

<p>{l s='Adjunto una simulación de un importe "x" para que pueda ver como quedarían las cuotas a diferentes meses y al ser un excell, se modificar el importe a financiar  ' mod='financiacion'}</p>

<p>{l s='También adjuntamos un documento que nos tiene que cumplimentar el cliente y firmarlo como Solicitante de la financiación. ' mod='financiacion'}</p>

<p>{l s='La entidad lo envía al domicilio por correo ordinario transcurridos 15 días. ' mod='financiacion'}</p>

<p>{l s='Documentación que precisamos que el cliente nos haga llegar escaneada al correo' mod='financiacion'} <strong>{l s='b.martinez@climahorro.es / info@climahorro.es:' mod='financiacion'}</strong></p><br/>

<h2>{l s='DOCUMENTOS NECESARIOS PARA TRAMITAR LA FINANCIACIÓN:' mod='financiacion'}</h2>
<p>
<ul>
	<li>{l s='D.N.I. EN VIGOR POR LAS DOS CARAS' mod='financiacion'}</li>

<li>{l s='JUSTIFICANTE BANCARIO PARA EL CARGO DE LAS CUOTAS (20 DÍGITOS QUE APAREZCA EL MISMO TITULAR QUE SOLICITA FINANCIACIÓN)' mod='financiacion'}/li>

<li>{l s='JUSTIFICANTE DE INGRESOS ( ÚLTIMA NÓMINA)' mod='financiacion'}/li>

<li>{l s='ESTADO CIVIL DEL SOLICITANTE: ' mod='financiacion'}/li>

<li>{l s='SITUACIÓN DE LA VIVIENDA -' mod='financiacion'}<br/>
	{l s='*  EN PROPIEDAD (CON HIPOTECA) IMPORTE APROX.' mod='financiacion'} <br/>
	{l s='*  EN ALQUILER (IMPORTE APROX.)' mod='financiacion'}</li>

<li>{l s='RELLENAR EL IMPRESO DE LA ENTIDAD BS FINANCIERA ADJUNTO' mod='financiacion'}</li>
</ul>
</p>
		<br /><br />{l s='If you have questions, comments or concerns, please contact our' mod='financiacion'} <a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='expert customer support team' mod='financiacion'}</a>.
	</p>
{else}
	<p class="warning">
		{l s='We noticed a problem with your order. If you think this is an error, feel free to contact our' mod='financiacion'} 
		<a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='expert customer support team' mod='financiacion'}</a>.
	</p>
{/if}
