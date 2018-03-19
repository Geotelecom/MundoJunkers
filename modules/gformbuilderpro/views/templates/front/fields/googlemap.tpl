{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}
{if isset($value) && $value!=''}
{if $labelpos == 0 || $labelpos == 3}
<div class="form-group googlemap_box">
    {if $labelpos == 0}
	<label>{$label|escape:'html':'UTF-8'}</label>
    {/if}
	<div id='google-maps-{$name|escape:'html':'UTF-8'}' class="google-maps"></div>
</div>
{else}
    <div class="form-group fileupload_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label>{$label|escape:'html':'UTF-8'}</label>
            </div>  
            {/if}
            <div class="col-xs-12 col-md-8">
                <div id='google-maps-{$name|escape:'html':'UTF-8'}' class="google-maps"></div>
    	    </div>
            {if $labelpos == 2}
            <div class="col-xs-12 col-md-4">
        	   <label>{$label|escape:'html':'UTF-8'}</label>
            </div>  
            {/if}
        </div>
    </div>
{/if}
{l s='{literal}' mod='gformbuilderpro'}
<script type="text/javascript">
    function init_map() {
        map_description = '{$description}';
        var myOptions = {
            zoom: 10,
            center: new google.maps.LatLng({$value|escape:'html':'UTF-8'}),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('google-maps-{$name|escape:'html':'UTF-8'}'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng({$value|escape:'html':'UTF-8'})
        });
        infowindow = new google.maps.InfoWindow({
            content: "<strong>{$label|escape:'html':'UTF-8'}</strong><br/>"+map_description
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
    google.maps.event.addDomListener(window, 'load', init_map);
</script>
{l s='{/literal}' mod='gformbuilderpro'}
{/if}