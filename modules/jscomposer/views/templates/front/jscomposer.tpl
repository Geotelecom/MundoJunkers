{if is_array($results)}
{foreach from=$results item="res"}
	{if $res.content != ''}{$res.content}{/if}
	{assign var=vc_optname value="{Configuration::get("_wpb_vccaw_{$res.id_vccontentanywhere}_{Context::getcontext()->language->id}_css")}"}
	<style type="text/css">
		{$vc_optname|html_entity_decode}
	</style>
{/foreach}
{else}
{$results}
{/if}
