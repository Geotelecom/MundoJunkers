{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}

<div class="hidden_box">
    <input type="hidden" value="{if $extra !=''}{l s='{$' mod='gformbuilderpro'}{$extra|escape:'html':'UTF-8'}{l s='}' mod='gformbuilderpro'}{else}{$value|escape:'html':'UTF-8'}{/if}" name="{$name|escape:'html':'UTF-8'}" id="{$idatt|escape:'html':'UTF-8'}" class="{$classatt|escape:'html':'UTF-8'}" />
</div>