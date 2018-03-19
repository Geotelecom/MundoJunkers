{*
* Man Carousel v1.3.1
* @author kik-off.com <support@kik-off.com>
*}

{if isset($mancarousel_items) && $mancarousel_items && $PS_DISPLAY_SUPPLIERS}
<div id="mancarousel_block">
    <p class="title_block">
        <a href="{$link->getPageLink('manufacturer')|escape:'htmlall':'UTF-8'}" title="{l s='View a list of manufacturers' mod='mancarousel'}">
            {l s='Our brands' mod='mancarousel'}
        </a>
    </p>
    <div class="mancarousel_slider mancarousel_responsive">
	    <div id="mancarousel">
		    {foreach $mancarousel_items as $item}
		        <a href="{$item.link|escape:'htmlall':'UTF-8'}" title="{$item.name|escape:'htmlall':'UTF-8'}">
				    <img{if $mancarousel.grayscale} class="logo_gray"{/if} src="{$item.img_src|escape:'htmlall':'UTF-8'}" alt="{$item.name|escape:'htmlall':'UTF-8'}" width="{$image_size.width}" height="{$image_size.height}" />
				    {if $mancarousel.nb_products}
				    <span class="mancarousel_badge badge">
				        {$item.nb_products}
				    </span>
				    {/if}
			    </a>
		    {/foreach}
	    </div>
	    <a class="prev" rel="nofollow" id="mancarousel_prev" href="#" title="{l s='prev' mod='mancarousel'}">
	        <span>
	            {l s='prev' mod='mancarousel'}
	        </span>
	    </a>
	    <a class="next" rel="nofollow" id="mancarousel_next" href="#" title="{l s='next' mod='mancarousel'}">
	        <span>
	            {l s='next' mod='mancarousel'}
	        </span>
	    </a>
    </div>
</div>
{/if}