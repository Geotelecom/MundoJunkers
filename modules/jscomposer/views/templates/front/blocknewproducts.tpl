{if isset($vc_products) && $vc_products}
    <div class="product-grid-wrapper vc-smart-{$elementprefix}-products-grid">
	{if !empty($vc_title)}
		<p class="title_block">{$vc_title}</p>
	{/if}
	{include file="$tpl_dir./product-list.tpl" products=$vc_products class='block'|cat:$elementprefix|cat:'products' id='smartblock'|cat:$elementprefix|cat:'products'}
    </div>
{/if}