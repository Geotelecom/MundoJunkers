<div class="panel product-tab">
	<h3><i class="icon-star"></i> {l s='Ratings' mod='google_product_rating'}</h3>
	<fieldset style="border:none;">
		<input type="checkbox" name="rating_disabled" id="rating_disabled" value="1" {if !empty($rating_disabled)} checked {/if}/> <label for="rating_disabled">{l s='Disable product rating' mod='google_product_rating'}</label>
		<div id="div_rating_enabled" {if !empty($rating_disabled)} style="display:none;" {/if}>
			<input type="checkbox" name="from_comments_module" id="from_comments_module" value="1" {if !empty($from_comments_module)} checked {/if}/> <label for="from_comments_module">{l s='Get information from real product rating' mod='google_product_rating'}</label>
			<div id="comments_module_info" {if empty($from_comments_module)} style="display:none;" {/if}>
				{if !empty($module_productcomment_enabled)}
					{if $comment_number >0}
						{if isset($avg) && isset($comment_number)}
							<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
								{l s='Average rating (out of 5)' mod='google_product_rating'} : <b>{$avg}</b> . {l s='Number of reviews' mod='google_product_rating'}: <b>{$comment_number}</b>
							</div>
						{else}
							<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>
								{l s='Cannot retreive product ratings' mod='google_product_rating'}		
							</div>
						{/if}
					{else}
						<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
							{l s='This product has not yet been evaluated' mod='google_product_rating'}	
						</div>
					{/if}
				{else}
					<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
						{l s='Install product comments module first' mod='google_product_rating'}
					</div>
				{/if}
			</div>
			<div id="div_manual_rating" {if !empty($from_comments_module)} style="display:none;" {/if}>
				<h4>{l s='Average rating (out of 5)' mod='google_product_rating'}</h4>
				<select name="rating_value"> 
				{for $var=0 to 50}
					<option value="{$var/10}" {if isset($rating_value) && $rating_value==($var/10)} SELECTED {/if} >{$var/10}</option>
				{/for}
				</select>
				<h4>{l s='Number of reviews' mod='google_product_rating'}</h4><input name="rating_count" type="text" value="{if isset($rating_count)}{$rating_count}{/if}" />
			</div>
		</div>
    </fieldset>
{literal}
<script>
$(document).ready(function(){
	$('#from_comments_module').change(function(){
		$('#div_manual_rating').toggle();
		$('#comments_module_info').toggle();
	});
	$('#rating_disabled').change(function(){
		$('#div_rating_enabled').toggle();
	});
});
</script>
{/literal}

	<div class="panel-footer">
		<a href="{$link->getAdminLink('AdminProducts')|escape:'html':'UTF-8'}{if isset($smarty.request.page) && $smarty.request.page > 1}&amp;submitFilterproduct={$smarty.request.page|intval}{/if}" class="btn btn-default"><i class="process-icon-cancel"></i> {l s='Cancel'}</a>
		<button type="submit" name="submitAddproduct" class="btn btn-default pull-right" disabled="disabled"><i class="process-icon-loading"></i> {l s='Save'}</button>
		<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right" disabled="disabled"><i class="process-icon-loading"></i> {l s='Save and stay'}</button>
	</div>

	<div class="separation"></div>
	<div class="clear">&nbsp;</div>
</div>