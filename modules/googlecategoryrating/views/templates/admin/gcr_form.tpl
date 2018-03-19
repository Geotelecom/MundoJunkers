{*
 *
 * Google Category Rating module for Prestashop by Avellana Digital
 *
 * @author     Avellana Digital SL
 * @copyright  Copyright (c) 2017 Avellana Digital - www.avellanadigital.com
 * @license    Commercial license
 * @version    1.0.0
*}
<div class="form-group">
	<label class="control-label col-lg-3">
	Ratings
	</label>
	<div class="col-lg-9">
		<div class="form-group">
			<div class="col-lg-12">
				<div class="product-tab">
					<div class="row">
						<div class="col-md-12">
							<div class="container-fluid">
								<div class="checkbox">
									<label for="rating_disabled"><input type="checkbox" name="rating_disabled" id="rating_disabled" value="1" {if !empty($rating_disabled)} checked {/if}/>
									{l s='Disable category rating' mod='googlecategoryrating'}</label>
								</div>

								<div id="div_rating_enabled" {if !empty($rating_disabled)} style="display:none;" {/if}>
									<div class="checkbox">
										<label for="from_comments_module"><input type="checkbox" name="from_comments_module" id="from_comments_module" value="1" {if !empty($from_comments_module)} checked {/if}/>
										{l s='Get information from real category rating' mod='googlecategoryrating'}</label><br/>
									</div>

									<div id="comments_module_info" {if empty($from_comments_module)} style="display:none;" {/if}>
										{if !empty($module_productcomment_enabled)}
											{if $comment_number >0}
												{if isset($avg) && isset($comment_number)}
													<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
														{l s='Average rating (out of 5)' mod='googlecategoryrating'} : <b>{$avg|escape:'htmlall':'UTF-8'}</b> . {l s='Number of reviews' mod='googlecategoryrating'}: <b>{$comment_number|escape:'htmlall':'UTF-8'}</b>
													</div>
												{else}
													<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>
														{l s='Cannot retreive category ratings' mod='googlecategoryrating'}		
													</div>
												{/if}
											{else}
												<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
													{l s='This category has not yet been evaluated' mod='googlecategoryrating'}	
												</div>
											{/if}
										{else}
											<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
												{l s='Install product comments module first' mod='googlecategoryrating'}
											</div>
										{/if}
									</div>
									<div id="div_manual_rating" {if !empty($from_comments_module)} style="display:none;" {/if}>
										<div class="row col-md-12">
											<div class="row form-group">
												<div class="col-xs-12 col-md-3">
													<label class="form-control-label">{l s='Average rating (out of 5)' mod='googlecategoryrating'}</label>
													<select name="rating_value" class="form-control"> 
													{for $var=0 to 50}
														<option value="{$var/10|escape:'htmlall':'UTF-8'}" {if isset($rating_value) && $rating_value==($var/10)} SELECTED {/if} >{$var/10|escape:'htmlall':'UTF-8'}</option>
													{/for}
													</select>
												</div>
											</div>
										</div>
										<div class="row col-md-12">
											<div class="row form-group">
												<div class="col-xs-12 col-md-3">
													<label class="form-control-label">{l s='Number of reviews' mod='googlecategoryrating'}</label>
													<input name="rating_count" type="text" value="{if isset($rating_count)}{$rating_count|escape:'htmlall':'UTF-8'}{/if}" class="form-control" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="alert alert-info" role="alert">
													<p>
													{l s='If productcomments module is not installed, the ratings have to be collected from other external modules or through alternative methods and entered manually given that it is not synchronised with that module.' mod='googlecategoryrating'}
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
				</div>
			</div>
		</div>
	</div>
</div>