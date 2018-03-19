{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
 <script type="text/javascript" src="{$js_dir}modules/productcomments/js/productcomments.js"></script>
{if !$completat}


<script type="text/javascript">
var productcomments_controller_url = '{$productcomments_controller_url}';
var confirm_report_message = '{l s='Are you sure that you want to report this comment?' mod='productcomments' js=1}';
var secure_key = '{$secure_key}';
var productcomments_url_rewrite = '{$productcomments_url_rewriting_activated}';
var productcomment_added = '{l s='Gracias por su opinión' mod='productcomments' js=1}';
var productcomment_added_moderation = '{l s='Estará disponible cuando la apruebe un moderador' mod='productcomments' js=1}';
var productcomment_title = '{l s='Nueva opinión' mod='productcomments' js=1}';
var productcomment_ok = '{l s='OK' mod='productcomments' js=1}';
</script>
{/if}

{if $tipus == 1}
<div>
<div class="brandstitle">
        <span>{l s='Valoración del Servicio referente al pedido' mod='productcomments'} #{$pedido->reference} ({$pedido->date_add})</span>
</div>
{if $completat}
	<br/>
	<div class="alert alert-warning">
		<p>{l s='Ya se ha valorado el servicio, gracias.'}</p>
	</div>
		<br/>
{else}

	<br/>
	<p>{l s='Su opinión es muy importante para nosotros, le rogamos que dedique unos minutos a valorar el servicio que le hemos ofrecido. Muchas gracias.' mod='productcomments'}</p>
	<br/>


		<input type="hidden" id="starrs" value="0"/>
		<div id="new_comment_form" class="form_0">
			<form id="id_new_comment_form_0" action="#">
				<h2 class="title">{l s='Servicio de venta' mod='productcomments'}</h2>
				
				<div class="new_comment_form_content">
					<div id="new_comment_form_error_0" class="alert alert-danger" style="display:none;padding:15px 25px">
						<ul></ul>
					</div>
					{if $criterions|@count > 0}
						<ul id="criterions_list">
						{foreach from=$criterions item='criterion'}
							<li>
								<label>{$criterion.name|escape:'html':'UTF-8'}</label>
								<div class="star_content">
									<input class="star_0" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="1" />
									<input class="star_0" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="2" />
									<input class="star_0" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="3" />
									<input class="star_0" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="4" />
									<input class="star_0" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="5" checked="checked" />
								</div>
								<div class="clearfix"></div>
							</li>
						{/foreach}
						</ul>
					{/if}
					<label for="comment_title">{l s='Título opinión' mod='productcomments'}<sup class="required">*</sup></label>
					<input id="comment_title" name="title" type="text" value=""/>

					<label for="content">{l s='Comentario' mod='productcomments'}<sup class="required">*</sup></label>
					<textarea id="content" name="content"></textarea>

					<div id="new_comment_form_footer">
						<input id="id_product_comment_send" name="id_product" type="hidden" value='0' />
						<input id="id_product_comment_send" name="ref" type="hidden" value='{$pedido->reference}' />
						<p class="fl required"><sup>*</sup> {l s='Campos obligatorios' mod='productcomments'}</p>
						<p class="fr">
							<button id="submitNewMessage" name="submitMessage" type="submit" data-id="0" class="btn btn-default button button-small">{l s='Enviar' mod='productcomments'}</button>
						</p>
						<div class="clearfix"></div>
					</div>
				</div>
			</form><!-- /end new_comment_form_content -->
		</div><div style="clear:both;">&nbsp;</div>
	</div>
{/if}

{else}
<div>
<div class="brandstitle">
        <span>{l s='Valoración de Productos del pedido' mod='productcomments'} #{$pedido->reference} ({$pedido->date_add})</span>
</div>

{if $completat}
	<br/>
	<div class="alert alert-warning">
		<p>{l s='Ya se han valorado los productos del pedido, gracias.'}</p>
	</div>
	<br/>

{else}

	<br/>
	<p>{l s='Su opinión es muy importante para nosotros, le rogamos que dedique unos minutos a valorar los productos que ha adquirido en el pedido. Muchas gracias.' mod='productcomments'}</p>
	<br/>

		{if isset($productes) && $productes}	
		<input type="hidden" id="starrs" value="{$ids}"/>
		{foreach from=$productes key=id_product item=product}
		<div id="new_comment_form" class="form_{$id_product}">
			<form id="id_new_comment_form_{$id_product}" action="#">
				<h2 class="title">{$product.name}</h2>
				
				<div class="product clearfix">
					 <div class="col-xs-12 col-sm-3"><img src="{$product.cover_image}" height="{$mediumSize.height}" width="{$mediumSize.width}" alt="{$product.name|escape:html:'UTF-8'}" />
					 </div>
					<div class="product_desc col-xs-12 col-sm-9">
						{$product.description_short}
					</div>
				</div>
				<div class="new_comment_form_content">
					<div id="new_comment_form_error_{$id_product}" class="alert alert-danger" style="display:none;padding:15px 25px">
						<ul></ul>
					</div>
					{if $product.criterions|@count > 0}
						<ul id="criterions_list">
						{foreach from=$product.criterions item='criterion'}
							<li>
								<label>{$criterion.name|escape:'html':'UTF-8'}</label>
								<div class="star_content">
									<input class="star_{$id_product}" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="1" />
									<input class="star_{$id_product}" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="2" />
									<input class="star_{$id_product}" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="3" />
									<input class="star_{$id_product}" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="4" />
									<input class="star_{$id_product}" type="radio" name="criterion[{$criterion.id_product_comment_criterion|round}]" value="5" checked="checked" />
								</div>
								<div class="clearfix"></div>
							</li>
						{/foreach}
						</ul>
					{/if}
					<label for="comment_title">{l s='Título opinión' mod='productcomments'}<sup class="required">*</sup></label>
					<input id="comment_title" name="title" type="text" value=""/>

					<label for="content">{l s='Comentario' mod='productcomments'}<sup class="required">*</sup></label>
					<textarea id="content" name="content"></textarea>

					<div id="new_comment_form_footer">
						<input id="id_product_comment_send" name="id_product" type="hidden" value='{$id_product}' />
						<input id="id_product_comment_send" name="ref" type="hidden" value='{$pedido->reference}' />
						<p class="fl required"><sup>*</sup> {l s='Campos obligatorios' mod='productcomments'}</p>
						<p class="fr">
							<button id="submitNewMessage" name="submitMessage" type="submit" data-id="{$id_product}" class="btn btn-default button button-small">{l s='Enviar' mod='productcomments'}</button>
						</p>
						<div class="clearfix"></div>
					</div>
				</div>
			</form><!-- /end new_comment_form_content -->
		</div><div style="clear:both;">&nbsp;</div>{/foreach}{/if}
	</div>

{/if}


{/if}
