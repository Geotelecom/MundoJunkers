{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if $opc}
	{assign var="back_order_page" value="order-opc.php"}
	{else}
	{assign var="back_order_page" value="order.php"}
{/if}

{if $PS_CATALOG_MODE}
	{capture name=path}{l s='Your shopping cart'}{/capture}
	<h2 id="cart_title">{l s='Your shopping cart'}</h2>
	<p class="alert alert-warning">{l s='Your new order was not accepted.'}</p>
{else}
	{if $productNumber}

	{if !$onepagecheckout}
		{include file="$tpl_dir./shopping-cart-full.tpl"}
	{else}
		<div class="step-account">
			<div class="col-xs-12 col-md-4">
				{if $is_logged AND !$is_guest}
				
					{include file="$tpl_dir./order-address.tpl"}
				{else}
					<!-- Create account / Guest account / Login block -->

					{include file="$tpl_dir./order-opc-new-account.tpl"}
					<!-- END Create account / Guest account / Login block -->
				{/if}
				{*<button class="button btn btn-default button-medium unvisible" id="btn-account-back" ><span>  <i class="icon-chevron-left left"></i> {l s='Back'}</span></button>	*}	
				<button class="button btn btn-default button-medium pull-right unvisible" id="btn-account" ><span>{l s='Go next'}  <i class="icon-chevron-right right"></i></span></button>
			</div>
		</div>

		<div class="step-carrier-pay">		
			<div class="col-xs-12 col-md-4">
				<!-- Carrier -->
				{include file="$tpl_dir./order-carrier.tpl"}
				<!-- END Carrier -->

				<!-- Payment -->
				{include file="$tpl_dir./order-payment.tpl"}
				<!-- END Payment -->
				<button class="button btn btn-default button-medium unvisible" id="btn-carrier-pay-back" ><span>  <i class="icon-chevron-left left"></i> {l s='Back'}</span></button>				

				<button class="button btn btn-default button-medium pull-right unvisible" name="btn-carrier-pay" id="btn-carrier-pay" ><span>{l s='Go next'}  <i class="icon-chevron-right right"></i></span></button>

			</div>
		</div>

		<div class="step-cart">
			<div class="col-xs-12 col-md-4">			
				<!-- Shopping Cart -->
				{include file="$tpl_dir./shopping-cart.tpl"}
				<!-- End Shopping Cart -->
			{*<button class="button btn btn-default button-medium pull-right" name="btn-one-page" id="btn-one-page" ><span>{l s='Go next'}  <i class="icon-chevron-right right"></i></span></button>*}		

			</div>
		</div>
	{literal}
	<script>

	$(document).ready(function(){

		// modificació botó comprar fixed
	    var original_position_offset = $('#buttonBuy').offset();
	    sticky_offset = original_position_offset.top;
	    $('#buttonBuy').css('position', 'fixed');

		$(window).scroll(function () {
			
		    var sticky_height = $('#buttonBuy').outerHeight();
		    var where_scroll = $(window).scrollTop();
		    var window_height = $(window).height();
		    

			if ($(window).width()>480){

			    if((where_scroll + window_height) > sticky_offset) {
			        $('#buttonBuy').css('position', 'relative');
			        $('#buttonBuy').css('width', 'auto');
			        $('#buttonBuy').css('left', 'auto');
			        $('#buttonBuy').css('background-color', '#fff');
			        $('#buttonBuy').css('padding', '20px 0px');
			        $('#buttonBuy').css('margin-left', '0');
			    }
			    
			    if((where_scroll + window_height) < (sticky_offset + sticky_height))  {
			        $('#buttonBuy').css('left', '50%');
			        $('#buttonBuy').css('margin-left', '-35%');
			        $('#buttonBuy').css('position', 'fixed');
			        $('#buttonBuy').css('width', '70%');
			        $('#buttonBuy').css('background-color', '#efefef');
			        $('#buttonBuy').css('padding', '20px');
			    }

			} else {

			    if((where_scroll + window_height) > sticky_offset) {
			        $('#buttonBuy').css('position', 'relative');
			        $('#buttonBuy').css('width', 'auto');
			        $('#buttonBuy').css('left', 'auto');
			        $('#buttonBuy').css('background-color', '#fff');
			        $('#buttonBuy').css('padding', '20px 0px');
			        $('#buttonBuy').css('margin-left', '0');
			    }
			    
			    if((where_scroll + window_height) < (sticky_offset + sticky_height))  {
			        $('#buttonBuy').css('left', '0%');
			        $('#buttonBuy').css('margin-left', '-0%');
			        $('#buttonBuy').css('position', 'fixed');
			        $('#buttonBuy').css('width', '100%');
			        $('#buttonBuy').css('background-color', '#efefef');
			        $('#buttonBuy').css('padding', '20px');
			    }
			}
		    
		});	

	});	

	</script>	
	{/literal}
	{/if}


	{literal}

	<script>

	$(document).ready(function(){

	
		//modificació mostrar i amagar opcions (missatge, cupons, etc)

		$(document).on('click', '.message_link',function(e){

			e.preventDefault();

			if($('.message_param').is(':visible'))	$('.message_param').slideUp('slow');
			else $('.message_param').slideDown('slow');		

		});


		$(document).on('click', '.gift_link',function(e){

			e.preventDefault();		
			if($('.gift_param').is(':visible'))	$('.gift_param').slideUp('slow');
			else $('.gift_param').slideDown('slow');

		});	

		$(document).on('click', '.vouchers_link',function(e){

			e.preventDefault();		
			if($('.vouchers_param').is(':visible'))	$('.vouchers_param').slideUp('slow');
			else $('.vouchers_param').slideDown('slow');

		});		

		//--> fi modificació mostrar i amagar opcions (missatge, cupons, etc)


		//modificació responive del proces one-page-chekcout
		
		$( window ).resize(function() {

			//one_page();
		});

		one_page();

		function one_page(){

			if ($(window).width()<768){



				//$('#btn-account').show(); //btn següent dades usuari

				$('#btn-carrier-pay').show(); //btn següent transport i pagament
				$('#btn-carrier-pay-back').show(); //btn tornar a dades usuari

				$('#btn-cart-back').show(); //btn tornar a transport i pagament

				$('.step-carrier-pay').hide(); //amagar transport i pagament
				$('.step-cart').hide(); //amagar cistella de one-page-checkout



				//pas 1
				$(document).on('click', '#btn-account', function(e){

					if ((typeof isLogged == 'undefined' || !isLogged) || (typeof isGuest !== 'undefined' && isGuest)) {

					// VALIDATION / CREATION AJAX
						e.preventDefault();
						$('#opc_new_account-overlay, #opc_delivery_methods-overlay, #opc_payment_methods-overlay').fadeIn('slow')
									
						var callingFile = '';
						var params = '';

						if (parseInt($('#opc_id_customer').val()) == 0)
						{
							callingFile = authenticationUrl;
							params = 'submitAccount=true&';
						}
						else
						{
							callingFile = orderOpcUrl;
							params = 'method=editCustomer&';
						}

						$('#opc_account_form input:visible, #opc_account_form input[type=hidden]').each(function() {
							if ($(this).is('input[type=checkbox]'))
							{
								if ($(this).is(':checked'))
									params += encodeURIComponent($(this).attr('name'))+'=1&';
							}
							else if ($(this).is('input[type=radio]'))
							{
								if ($(this).is(':checked'))
									params += encodeURIComponent($(this).attr('name'))+'='+encodeURIComponent($(this).val())+'&';
							}
							else
								params += encodeURIComponent($(this).attr('name'))+'='+encodeURIComponent($(this).val())+'&';
						});

						$('#opc_account_form select:visible').each(function() {
							params += encodeURIComponent($(this).attr('name'))+'='+encodeURIComponent($(this).val())+'&';
						});
						params += 'customer_lastname='+encodeURIComponent($('#customer_lastname').val())+'&';
						params += 'customer_firstname='+encodeURIComponent($('#customer_firstname').val())+'&';
						params += 'alias='+encodeURIComponent($('#alias').val())+'&';
						params += 'other='+encodeURIComponent($('#other').val())+'&';
						params += 'is_new_customer='+encodeURIComponent($('#is_new_customer').val())+'&';
						// Clean the last &
						params = params.substr(0, params.length-1);
						
						$.ajax({
							type: 'POST',
							headers: { "cache-control": "no-cache" },
							url: callingFile + '?rand=' + new Date().getTime(),
							async: false,
							cache: false,
							dataType : "json",
							data: 'ajax=true&'+params+'&token=' + static_token ,
							success: function(jsonData)
							{
								if (jsonData.hasError)
								{
									var tmp = '';
									var i = 0;
									for(var error in jsonData.errors)
										//IE6 bug fix
										if(error !== 'indexOf')
										{
											i = i+1;
											tmp += '<li>'+jsonData.errors[error]+'</li>';
										}
									tmp += '</ol>';
									var errors = '<b>'+txtThereis+' '+i+' '+txtErrors+':</b><ol>'+tmp;
									$('#opc_account_errors').slideUp('fast', function(){
										$(this).html(errors).slideDown('slow', function(){
											$.scrollTo('#opc_account_errors', 800);
										});							
									});	
								}
								else
								{
									$('#opc_account_errors').slideUp('slow', function(){
										$(this).html('');							
									});


								}

								isGuest = parseInt($('#is_new_customer').val()) == 1 ? 0 : 1;
								// update addresses id
								if(jsonData.id_address_delivery !== undefined && jsonData.id_address_delivery > 0)
									$('#opc_id_address_delivery').val(jsonData.id_address_delivery);
								if(jsonData.id_address_invoice !== undefined && jsonData.id_address_invoice > 0)
									$('#opc_id_address_invoice').val(jsonData.id_address_invoice);					
								
								if (jsonData.id_customer !== undefined && jsonData.id_customer !== 0 && jsonData.isSaved)
								{
									// update token
									static_token = jsonData.token;
									
									// It's not a new customer
									if ($('#opc_id_customer').val() !== '0')
										if (!saveAddress('delivery'))
											return false;
									
									// update id_customer
									$('#opc_id_customer').val(jsonData.id_customer);
									
									if ($('#invoice_address:checked').length !== 0)
									{
										if (!saveAddress('invoice'))
											return false;
									}
									
									// update id_customer
									$('#opc_id_customer').val(jsonData.id_customer);
									
									// force to refresh carrier list
									if (isGuest)
									{
										isLogged = 1;
										$('#opc_account_saved').fadeIn('slow');
										//$('#submitAccount').hide();
										//updateAddressSelection();

										$('.step-account').slideUp('slow'); //amagar dades usuari
										$('.step-carrier-pay').slideDown('slow'); // mostrar transport i pagament	
										$(document).scrollTo('#topcolumns');

									}
									else
										updateNewAccountToAddressBlock();
								}
								$('#opc_new_account-overlay, #opc_delivery_methods-overlay, #opc_payment_methods-overlay').fadeIn('slow');



							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if (textStatus !== 'abort')
								{
									error = "TECHNICAL ERROR: unable to save account \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus;
						            if (!!$.prototype.fancybox)
						                $.fancybox.open([
						                    {
						                        type: 'inline',
						                        autoScale: true,
						                        minHeight: 30,
						                        content: '<p class="fancybox-error">' + error + '</p>'
						                    }
						                ], {
						                    padding: 0
						                });
						            else
						                alert(error);
								}
								$('#opc_new_account-overlay, #opc_delivery_methods-overlay, #opc_payment_methods-overlay').fadeIn('slow')
							}
						});

					}

					if (isLogged){
						$('.step-account').slideUp('slow'); //amagar dades usuari
						$('.step-carrier-pay').slideDown('slow'); // mostrar transport i pagament	
						$(document).scrollTo('#topcolumns');						
					}


				});

				//pas 2 
				$(document).on('click', '#btn-carrier-pay', function(e){				
					$('.step-carrier-pay').slideUp('slow');// amagar transport i pagament
					$('.step-cart').slideDown('slow');//mostrar cistella de one-page-checkout
					$(document).scrollTo('#topcolumns');
				});


				//tornar pas 1 
				$(document).on('click', '#btn-carrier-pay-back', function(e){				
					$('.step-carrier-pay').slideUp('slow');// amagar transport i pagament
					$('.step-account').slideDown('slow');//mostrar dades usuari
				});	

				//tornar pas 2
				$(document).on('click', '#btn-cart-back', function(e){				
					$('.step-cart').slideUp('slow');//amagar cistella de one-page-checkout
					$('.step-carrier-pay').slideDown('slow');// mostrar transport i pagament
				});	

			} else {

				$('#btn-account').hide();
				$('#btn-account-back').hide();

				$('#btn-carrier-pay').hide();
				$('#btn-carrier-pay-back').hide();
				
				$('#btn-cart-back').hide();

				$('.step-account').show();
				$('.step-carrier-pay').show();
				$('.step-cart').show();
			}	
		}

		// --> fi modificació responive de la pàgina	




	});



	</script>

	{/literal}		

	{else}
		{capture name=path}{l s='Your shopping cart'}{/capture}
		<h2 class="page-heading">{l s='Your shopping cart'}</h2>
		<p class="alert alert-warning">{l s='Your shopping cart is empty.'}</p>
	{/if}
{strip}
{addJsDef imgDir=$img_dir}
{addJsDef authenticationUrl=$link->getPageLink("authentication", true)|addslashes}
{addJsDef orderOpcUrl=$link->getPageLink("order-opc", true)|addslashes}
{addJsDef historyUrl=$link->getPageLink("history", true)|addslashes}
{addJsDef guestTrackingUrl=$link->getPageLink("guest-tracking", true)|addslashes}
{addJsDef addressUrl=$link->getPageLink("address", true, NULL, "back={$back_order_page}")|addslashes}
{addJsDef orderProcess='order-opc'}
{addJsDef guestCheckoutEnabled=$PS_GUEST_CHECKOUT_ENABLED|intval}
{addJsDef currencySign=$currencySign|html_entity_decode:2:"UTF-8"}
{addJsDef currencyRate=$currencyRate|floatval}
{addJsDef currencyFormat=$currencyFormat|intval}
{addJsDef currencyBlank=$currencyBlank|intval}
{addJsDef displayPrice=$priceDisplay}
{addJsDef taxEnabled=$use_taxes}
{addJsDef conditionEnabled=$conditions|intval}
{addJsDef vat_management=$vat_management|intval}
{addJsDef errorCarrier=$errorCarrier|@addcslashes:'\''}
{addJsDef errorTOS=$errorTOS|@addcslashes:'\''}
{addJsDef checkedCarrier=$checked|intval}
{addJsDef addresses=array()}
{addJsDef isVirtualCart=$isVirtualCart|intval}
{addJsDef isPaymentStep=$isPaymentStep|intval}
{addJsDefL name=txtWithTax}{l s='(tax incl.)' js=1}{/addJsDefL}
{addJsDefL name=txtWithoutTax}{l s='(tax excl.)' js=1}{/addJsDefL}
{addJsDefL name=txtHasBeenSelected}{l s='has been selected' js=1}{/addJsDefL}
{addJsDefL name=txtNoCarrierIsSelected}{l s='No carrier has been selected' js=1}{/addJsDefL}
{addJsDefL name=txtNoCarrierIsNeeded}{l s='No carrier is needed for this order' js=1}{/addJsDefL}
{addJsDefL name=txtConditionsIsNotNeeded}{l s='You do not need to accept the Terms of Service for this order.' js=1}{/addJsDefL}
{addJsDefL name=txtTOSIsAccepted}{l s='The service terms have been accepted' js=1}{/addJsDefL}
{addJsDefL name=txtTOSIsNotAccepted}{l s='The service terms have not been accepted' js=1}{/addJsDefL}
{addJsDefL name=txtThereis}{l s='There is' js=1}{/addJsDefL}
{addJsDefL name=txtErrors}{l s='Error(s)' js=1}{/addJsDefL}
{addJsDefL name=txtDeliveryAddress}{l s='Delivery address' js=1}{/addJsDefL}
{addJsDefL name=txtInvoiceAddress}{l s='Invoice address' js=1}{/addJsDefL}
{addJsDefL name=txtModifyMyAddress}{l s='Modify my address' js=1}{/addJsDefL}
{addJsDefL name=txtInstantCheckout}{l s='Instant checkout' js=1}{/addJsDefL}
{addJsDefL name=txtSelectAnAddressFirst}{l s='Please start by selecting an address.' js=1}{/addJsDefL}
{addJsDefL name=txtFree}{l s='Free' js=1}{/addJsDefL}

{capture}{if $back}&mod={$back|urlencode}{/if}{/capture}
{capture name=addressUrl}{$link->getPageLink('address', true, NULL, 'back='|cat:$back_order_page|cat:'?step=1'|cat:$smarty.capture.default)|addslashes}{/capture}
{addJsDef addressUrl=$smarty.capture.addressUrl}
{capture}{'&multi-shipping=1'|urlencode}{/capture}
{addJsDef addressMultishippingUrl=$smarty.capture.addressUrl|cat:$smarty.capture.default}
{capture name=addressUrlAdd}{$smarty.capture.addressUrl|cat:'&id_address='}{/capture}
{addJsDef addressUrlAdd=$smarty.capture.addressUrlAdd}
{addJsDef opc=$opc|boolval}
{capture}<h3 class="page-subheading">{l s='Your billing address' js=1}</h3>{/capture}
{addJsDefL name=titleInvoice}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{capture}<h3 class="page-subheading">{l s='Your delivery address' js=1}</h3>{/capture}
{addJsDefL name=titleDelivery}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{capture}<a class="button button-small btn btn-default" href="{$smarty.capture.addressUrlAdd}" title="{l s='Update' js=1}"><span>{l s='Update' js=1}<i class="icon-chevron-right right"></i></span></a>{/capture}
{addJsDefL name=liUpdate}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{/strip}
{/if}