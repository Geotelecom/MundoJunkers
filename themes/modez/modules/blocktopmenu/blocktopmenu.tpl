{if $MENU != ''}
	<!-- Menu -->
	<div id="block_top_menu" class="sf-contener clearfix col-lg-12 fadeInDown">
		<div class="cat-title">{l s="Categories" mod="blocktopmenu"}</div>
		<ul class="sf-menu clearfix menu-content">
			<li>
			<a href="https://mundojunkers.es/" title="{$meta_title|escape:'html':'UTF-8'}" class="menuhomelink"></a>
			</li>
			{$MENU}
			{if $MENU_SEARCH}
				<li class="sf-search noBack" style="float:right">
					<form id="searchbox" action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" method="get">
						<p>
							<input type="hidden" name="controller" value="search" />
							<input type="hidden" value="position" name="orderby"/>
							<input type="hidden" value="desc" name="orderway"/>
							<input type="text" name="search_query" id="search_query_menu" placeholder="{l s='Search' mod='blocktopmenu'}" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|escape:'html':'UTF-8'}{/if}" />
							<button type="submit" name="submit_search" class="button">
							<span>{l s='Search' mod='blocksearch'}</span>
							</button>
						</p>
					</form>
				</li>
			{/if}
            <li class="menu_up_li">
                <div class="menu_up"><a class="modezuparrow_link" href="#page"><span></span></a></div>
            </li>
		</ul>
	</div>
	<!--/ Menu -->
{/if}