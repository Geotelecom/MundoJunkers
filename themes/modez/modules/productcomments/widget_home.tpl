{*if $page_name == 'index'}
<div id="valoraciones_clientes" class="col-xs-12 col-md-4">
	{*}<div class="cont" onClick="javascript:location.href='{$link->getModuleLink('productcomments', 'opinionslist', [], true)|escape:'html'}'">
		<div class="nota">{$totalpuntuacio}/5</div>
		<div class="estrellas">
			{section name="i" start=0 loop=5 step=1}
				{if $totalpuntuacio le $smarty.section.i.index}
					<div class="estrella"></div>
				{else}
					<div class="estrella estrella_on"></div>
				{/if}
			{/section}
		</div>
	</div>{*}
	<p class="aval">{l s='Compra con confianza, nuestros clientes nos avalan' mod='productcomments'}:</p>
<meta class="netreviewsWidget" id="netreviewsWidgetNum825" data-jsurl="//cl.avis-verifies.com/es/cache/d/f/0/df058849-219f-8c74-5d4a-e11da22dcf8c/widget4/widget04-825_script.js"/><script src="//cl.avis-verifies.com/es/widget4/widget04.min.js"></script>
</div>
{/if*}