<div id="product_comments_block_tab">
	<div class="brandstitle">
        <span>{l s='Valoraciones de clientes' mod='productcomments'}</span>
	</div>
{if $comments}
	{foreach from=$comments item=comment}
		{if $comment.content}
		<div class="comment clearfix">
			<div class="comment_author col-xs-12 col-sm-4 col-md-3">
				<span>{l s='Calificación' mod='productcomments'}&nbsp</span>
				<div class="star_content clearfix">
				{section name="i" start=0 loop=5 step=1}
					{if $comment.grade le $smarty.section.i.index}
						<div class="star"></div>
					{else}
						<div class="star star_on"></div>
					{/if}
				{/section}
				</div>
				<div class="comment_author_infos">
					<strong>{$comment.customer_name|escape:'html':'UTF-8'}</strong><br/>
					<em>{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}</em>
				</div>
			</div>
			<div class="comment_details col-xs-12 col-sm-8 col-md-9">
				<h4 class="title_block">{$comment.title}</h4>
				<p>{$comment.content|escape:'html':'UTF-8'|nl2br}</p>
			</div>
		</div>
		{/if}
	{/foreach}

	{if $nbComments > 10}
	{if $pg > 1}<a href="{$link->getModuleLink('productcomments', 'opinionslist', [], true)|escape:'html'}?p={$pg-1}" style="float:left;">{l s='< Ver opiniones anteriores' mod='productcomments'}</a>{/if}
	<a href="{$link->getModuleLink('productcomments', 'opinionslist', [], true)|escape:'html'}?p={$pg+1}" style="float:right;">{l s='Ver más opiniones >' mod='productcomments'}</a>
	{/if}
{/if}	
</div>
<div style="clear:both;">&nbsp;</div>