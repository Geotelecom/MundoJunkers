<!-- MODULE Roy Specials -->
<div id="roy_special_block" class="block">
    <p class="title_block">
        <a href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}" title="{l s='Specials' mod='royspecials'}">
            {l s='Specials' mod='royspecials'}
        </a>
    </p>
    <div class="block_content products-block">
        {if $specials}
            <ul id="specialsul">
                {foreach from=$specials item=special}
                    {if $special.specific_prices}
                    {assign var='specific_prices' value=$special.specific_prices}
                    {/if}
                    <li class="clearfix">
                        <a class="products-block-image" href="{$special.link|escape:'html':'UTF-8'}">
                            {if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $specific_prices.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $specific_prices.from) && ($specific_prices.to != '0000-00-00 00:00:00')}
                                <div class="countcontainer">
                                    <div class="roycountdown">
                                        <div class="roycount" style="display: none;" data-specific-price-to="{$specific_prices.to}" data-days={l s='Days' mod='royspecials'} data-hours={l s='Hours' mod='royspecials'} data-minutes={l s='Minutes' mod='royspecials'} data-seconds={l s='Seconds' mod='royspecials'}></div>
                                    </div>
                                </div>
                            {elseif ($specific_prices.to == '0000-00-00 00:00:00') && ($specific_prices.from == '0000-00-00 00:00:00')}
                                <div class="countcontainer">
                                    <div class="roycountoff">
                                        <span>{l s='Limited Special Offer' mod='royspecials'}</span>
                                    </div>
                                </div>
                            {/if}
                            <img class="replace-2x img-responsive" src="{$link->getImageLink($special.link_rewrite, $special.id_image, 'home_default')|escape:'html':'UTF-8'}"
                                 alt="{$special.legend|escape:'html':'UTF-8'}"
                                 title="{$special.name|escape:'html':'UTF-8'}" />
                        </a>
                        <div class="product-content">
                            <h5>
                                <a class="product-name" href="{$special.link|escape:'html':'UTF-8'}" title="{$special.name|escape:'html':'UTF-8'}">
                                    {$special.name|escape:'html':'UTF-8'}
                                </a>
                            </h5>
                            {if isset($special.description_short) && $special.description_short}
                                <p class="product-description">
                                    {$special.description_short|strip_tags:'UTF-8'|truncate:40}
                                </p>
                            {/if}
                            <div class="price-box">
                                {if !$PS_CATALOG_MODE}
                                    <span class="price special-price">
                                {if !$priceDisplay}
                                    {displayWtPrice p=$special.price}{else}{displayWtPrice p=$special.price_tax_exc}
                                {/if}
                            </span>
                                    <span class="old-price">
                                {if !$priceDisplay}
                                    {displayWtPrice p=$special.price_without_reduction}{else}{displayWtPrice p=$priceWithoutReduction_tax_excl}
                                    {*LyoHTBOF*}{*DEBUG:ThemeStandard16*}{if Configuration::get('LyoHT_isBlocsSpecials')==1}{if $priceDisplay >= 0 && $priceDisplay <= 1}
                                    <br/>
                                    {displayWtPrice p=($priceDisplay)?$special.price:$special.price_tax_exc}
                                    {*afterPrice*}&nbsp;
                                    {if $priceDisplay}{l s='tax incl.' mod='royspecials'}{else}{l s='tax excl.' mod='royspecials'}{/if}
                                    {*afterTaxTitle*}
                                {/if}{/if}{*LyoHTEOF*}{/if}
                            </span>
                                    {if $special.specific_prices}
                                        {*{assign var='specific_prices' value=$special.specific_prices}*}
                                        {if $specific_prices.reduction_type == 'percentage' && ($specific_prices.from == $specific_prices.to OR ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $specific_prices.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $specific_prices.from))}
                                            <span class="price-percent-reduction"><span>-{$specific_prices.reduction*100|floatval}%</span></span>
                                        {/if}
                                        {if $specific_prices.reduction_type == 'amount'}
                                            <span class="price-percent-reduction"><span>-{convertPrice price=$specific_prices.reduction|floatval}</span></span>
                                        {/if}
                                    {/if}
                                {/if}
                            </div>
                        </div>
                        {*{if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $specific_prices.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $specific_prices.from) && ($specific_prices.to != '0000-00-00 00:00:00')}*}
                            {*<div class="roycountdown">*}
                                {*<div class="roycount" style="display: none;" data-specific-price-to="{$specific_prices.to}" data-days={l s='Days' mod='royspecials'} data-hours={l s='Hours' mod='royspecials'} data-minutes={l s='Minutes' mod='royspecials'} data-seconds={l s='Seconds' mod='royspecials'}></div>*}
                            {*</div>*}
                        {*{elseif ($specific_prices.to == '0000-00-00 00:00:00') && ($specific_prices.from == '0000-00-00 00:00:00')}*}
                            {*<div class="roycountoff">*}
                                {*<span>{l s='Limited Special Offer' mod='royspecials'}</span>*}
                            {*</div>*}
                        {*{/if}*}
                    </li>
                {/foreach}
            </ul>

            <div>
                <a
                        class="btn btn-default button button-small"
                        href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}"
                        title="{l s='All specials' mod='royspecials'}">
                    <span>{l s='All specials' mod='royspecials'}<i class="icon-chevron-right right"></i></span>
                </a>
            </div>
        {else}
            <div>{l s='No specials at this time.' mod='royspecials'}</div>
        {/if}
    </div>
</div>
<!-- /MODULE Roy Specials -->