<br/>
<form action="{$url_form|escape:'htmlall':'UTF-8'}" method="post">
    <fieldset style="width: 700px; margin: 0 auto;">
        <legend><img src="{$module_dir|escape:'htmlall':'UTF-8'}logo.gif" alt="" />{l s='Configure your Sitemap' mod='canonicalurl'}</legend>

        <label for="use_canonical" style="width: 526px;">{l s='Selecciona si vols una url única en cas de multishop' mod='canonicalurl'}
            <input type="checkbox" name="use_canonical" value="1" {if $use_canonical}checked{/if}></label>		
        <br class="clear" /><br/>       
        <label for="canonical_url" style="width: 526px;">{l s='Quina serà la URL principal?' mod='canonicalurl'}
            <select name="canonical_url">
                {foreach from=$shops_url item=shop_url}
                    <option{if $shop_url == $canonical_url} selected="selected"{/if} value='{$shop_url}'>{$shop_url}</option>
                {/foreach}                   
            </select>
        </label>

        <div class="margin-form" style="clear: both;">
            <input type="submit" style="margin: 20px;" class="button" name="SubmitCanonicalUrl" value="{l s='Desa' mod='canonicalurl'}" />
        </div>
    </fieldset>
</form><br />

