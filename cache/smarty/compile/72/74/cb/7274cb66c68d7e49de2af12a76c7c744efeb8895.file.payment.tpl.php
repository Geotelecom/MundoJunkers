<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12465303065a98281641fbd7-93274029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7274cb66c68d7e49de2af12a76c7c744efeb8895' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/payment.tpl',
      1 => 1498036241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12465303065a98281641fbd7-93274029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total_order' => 0,
    'payment_modules' => 0,
    'is_logged' => 0,
    'is_guest' => 0,
    'payment_need_register' => 0,
    'CONFIGS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982816441286_65634495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982816441286_65634495')) {function content_5a982816441286_65634495($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['total_order']->value<=0) {?>
    <span id="free_order" class="alert alert-warning col-xs-12 text-center"><?php echo smartyTranslate(array('s'=>'Free Order.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>
    
<?php } elseif (!sizeof($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_decode'][0][0]->jsonDecode($_smarty_tpl->tpl_vars['payment_modules']->value))) {?>
    <p class="alert alert-warning col-xs-12 text-center"><?php echo smartyTranslate(array('s'=>'There are no payment methods available.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</p>
<?php } elseif (!$_smarty_tpl->tpl_vars['is_logged']->value&&!$_smarty_tpl->tpl_vars['is_guest']->value&&$_smarty_tpl->tpl_vars['payment_need_register']->value&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_BUTTON_REGISTER']) {?>
    <p class="alert alert-info col-xs-12 text-center"><?php echo smartyTranslate(array('s'=>'You need to enter your data and address, to see payment methods.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</p>
<?php } else { ?>
    
    <script type="text/javascript">
        var content_payments = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['payment_modules']->value,'quotes','UTF-8');?>
;
        var payment_number = 0;
        var events_payments = new Array();

        if (OnePageCheckoutPS.PAYMENTS_WITHOUT_RADIO === true){
            initPaymentWithHTML();
        }else{
            initPayment();
        }

        //window.console.log(content_payments);

        function initPaymentWithHTML(){
            if(typeof content_payments !== typeof undefined){
                var $content = $("#payment_method_container");

                $content.html('');

                $.each(content_payments, function(k, module){
                    var module_html = module.html;

                    if($.isEmpty($.trim(module_html)) || module_html === false){
                        return;
                    }

                    events_payments[k] = new Array();

                    var $div_temporal = $('<div/>').append($('<div/>').html(module.html).text());

                    $div_temporal.appendTo($content);

                    $div_temporal.find('*').each(function(i, item){
                        if ($(this).hasClass('col-md-6'))
                            $(this).removeClass('col-md-6');

                        //quitamos los span que no tengan onclick
                        if($(item).is('span') && typeof $(item).attr('onclick') === typeof undefined){
                            return true;
                        }

                        if($(item).is('input[type=image], input[type=submit], input[type=button], a, button, span')){
                            var event = undefined;
                            if (typeof $(item).data('events') !== typeof undefined){
                                $.each($(item).data('events'), function(i, e){
                                    $.each(e, function(i, handler){
                                        if (handler['type'] == 'click'){
                                            event = handler['handler'];

                                            return false;
                                        }
                                    });
                                });
                            }

                            var onclick = undefined;
                            if (typeof $(item).attr('onclick') !== typeof undefined)
                            {
                                onclick = $(item).attr('onclick');
                            }

							//support payment module: mpmx
							if ($(item).attr('id') == 'botonMP'){
								onclick = "window.location = '" + $(item).attr('href') + "';";
								$(item).removeAttr('href');
							}

                            events_payments[k][i] = {'module_name' : module.name, 'element' : item, 'event' : event, 'onclick': onclick};

                            $(item).attr('onclick', '').unbind('click').click(function(event){
                                event.preventDefault();

                                Review.placeOrder({'validate_payment' : false, position_element : {'item_parent' : k, 'item_child' : i}});
                            });
                        }
                    });

                    if (module.name == 'stripejs'){
                        if (compareVersions(module.version, '0.9.0')){
                            var _script = document.createElement('script');
                            _script.type = 'text/javascript';
                            _script.src = baseDir + 'modules/stripejs/views/js/stripe-prestashop.js';
                            $("body").append(_script);
                        }else{
                            var _script = document.createElement('script');
                            _script.type = 'text/javascript';
                            _script.src = baseDir + 'modules/stripejs/js/stripe-prestashop.js';
                            $("body").append(_script);
                        }
                    }
                });
            }
        }

        function initPayment(){
            if(typeof content_payments !== typeof undefined){
                $.each(content_payments, function(i, module){
                    var module_html = module.html;
					var module_html_ok = $('<div/>').html(module_html).text();

                    if (!$.isEmpty(module.url_payment)){
                        var module_title = module.title_opc;
                        var module_description = module.description_opc;

                        /*if (module.name == 'sequrapayment' && $.isEmpty(module_description)){
                            var $sequra = $('<div/>').html(module_html_ok);
                            var payment = $sequra.find('.payment_module');
                            var _a = $(payment).find('a').first();

                            module_description = $(_a).find('.payment_desc-js').html();
                            module_title = $(_a).find('.payment_title-js').html();
                            module.url_image = $(_a).find('img').attr('src');
                            module.url_payment = $(_a).attr('href');
                        }*/

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, module.url_payment, '');

                        return;
                    }

                    if($.isEmpty($.trim(module_html)) || module_html === false)
                        return;

                    module_html_ok = module_html_ok.replace('&lt;noscript&gt;', '');
                    module_html_ok = module_html_ok.replace('&lt;/noscript&gt;', '');

                    if($.strpos(module_html_ok, '<iframe')){
                        $('<input/>').val(module_html_ok).attr({'id' : 'iframe_payment_module_' + module.id}).hide().prependTo('#onepagecheckoutps_contenedor');

						module_title = module.name;
						if (!$.isEmpty(module.title_opc))
                            module_title = module.title_opc;

						module_description = module.name;
                        if (!$.isEmpty(module.description_opc))
                            module_description = module.description_opc;

                        /*--------------------------------*/
                        if (!$.isEmpty(module.title_opc))
                            module_title = module.title_opc;

                        if (!$.isEmpty(module.description_opc))
                            module_description = module.description_opc;
                        /*--------------------------------*/

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, 'iframe', '');

                        return;
                    }

                    var tmp = $('#opc_temporal').html(module_html_ok);

                    //compatibilidad con modulo PayNL
                    if ($(tmp).find('.pnBlAnim').length > 0){
                        var payment = $(tmp).find('.pnBlAnim');

                        var module_title = $(payment).find('table.pnLnkTbl').text();
                        var module_description = module_title;
                        var url_module_payment = "Fronted.createPopup(true, '', $('#onepagecheckoutps_forms #pnForm'), true, false, true, false);";
                        var onclick_module_payment = '';
                        var form = '';

                        $(payment).find('#pnSendBtn').click(function(){$('#pnForm').submit();});

                        ($(payment).find('#pnForm')).hide().prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, url_module_payment, onclick_module_payment);
                    }else if ($(tmp).find('.bloc_adresses').length > 0){
                        var payment = $(tmp).find('.bloc_adresses');

                        var module_title = 'iDeal';
                        var module_description = module_title;
                        var url_module_payment = "Fronted.createPopup(true, '', $('#onepagecheckoutps_forms #pnForm'), true, false, true, false);";
                        var onclick_module_payment = '';
                        var form = '';

                        $(payment).find('#pnSendBtn').click(function(){$('#pnForm').submit();});

                        ($(payment).find('#pnForm')).hide().prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, url_module_payment, onclick_module_payment);
                    }

                    //compatibilidad con modulo postfinancecw
                    if ($.strpos(module.name, 'postfinancecw') !== false){
                        if ($(tmp).find('.payment_module').length <= 0){
                            var module_title = $(tmp).find('.payment-method-name').text();
                            var module_description = module_title;
                            url_module_payment = '$("#form_' + module.name + '").submit();';
                            var onclick_module_payment = '';
                            var url_image = baseDir + 'modules/' + module.name + '/logo.png';
                            var form = $(tmp).find('.form-horizontal');

                            form.attr('id', 'form_' + module.name);
                            form.hide();
                            form.prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');

                            createPaymentModule(module, module.id, module.name, module_title, module_description, url_image, url_module_payment, onclick_module_payment);
                        }
                    }

                    //compatibilidad con modulo simplifycommerce
                    if (module.name == 'simplifycommerce'){
                        var module_title = $(tmp).find('h3.pay-by-credit-card').text();
                        var module_description = module_title;
                        var url_module_payment = '$("form#simplify-payment-form #simplify-submit-button").trigger("click");';

                        $(tmp).html('');

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, url_module_payment, '', module_html_ok);

                        return;
                    }

                    //compatibilidad con modulo stripejs - Bellini Services - 2.11.0
                    if (module.name == 'stripejs'){
                        var module_title = !$.isEmpty(module.title_opc) ? module.title_opc : $(tmp).find('h3.stripe_title').text();
                        var module_description = !$.isEmpty(module.description_opc) ? module.description_opc : module_title;
                        var url_module_payment = '$("form#stripe-payment-form #stripe-submit-button").trigger("click");$("div#onepagecheckoutps .loading_big").hide();';

                        $(tmp).html('');

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, url_module_payment, '', module_html_ok);

                        return;
                    }

                    //compatibilidad con modulo msstripe - Leighton Whiting - 2.0.2
                    if (module.name == 'msstripe'){
                        var module_title = '';
                        var module_description = $(tmp).find('#click_msstripe img');
                        var url_module_payment = '$("form#stripe_form #stripe_submit").trigger("click");$("div#onepagecheckoutps .loading_big").hide();';

                        $(tmp).html('');

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, url_module_payment, '', module_html_ok);

                        return;
                    }

                    //compatibilidad con modulo braintreejs - Bellini Services - 1.27.0
                    if (module.name == 'braintreejs' && $('form#braintree-payment-form').length > 0){
                        var module_title = !$.isEmpty(module.title_opc) ? module.title_opc : 'Braintree';
                        var module_description = !$.isEmpty(module.description_opc) ? module.description_opc : module_title;
                        var url_module_payment = '$("form#braintree-payment-form #braintree-submit-button").trigger("click");$("div#onepagecheckoutps .loading_big").hide();';

                        $(tmp).html('');

                        createPaymentModule(module, module.id, module.name, module_title, module_description, module.url_image, url_module_payment, '', module_html_ok);

                        return;
                    }

                    payment_number = 0;
                    $(tmp).find('.payment_module, .payment_module_lust').each(function(k, payment){
                        var _a = $(payment).find('a').first();

                        var module_title = $(_a).attr('title');
                        var module_description = '';
                        var url_module_payment = $(_a).attr('href');
                        var url_image = module.url_image;
                        var onclick_module_payment = $(_a).length > 0 ? $(_a).get(0).getAttribute("onclick") : '';
                        var name_form = '';

                        if(typeof module.additional[module.id + '_' + payment_number] !== typeof undefined){
                            module_description = module.additional[module.id + '_' + payment_number].description;
                            module_title = module_description;

                            if ($.strpos(url_image, 'default.png') || $.inArray(module.name, module.modules_external_image))
                                url_image = module.additional[module.id + '_' + payment_number].img;
                        }else{
                            var module_description = $(payment).text();
                            module_description = module_description.replace(/^\s+/g,'').replace(/\s+$/g,'');//trim

                            if ($.isEmpty(module_title) && $.isEmpty(module_description)){
                                module_description = $(payment).find('img');

                                if (typeof module_description === 'object'){
                                    module_description = $(module_description).css({height : '100%', width: '100%'});
                                }
                            }
                        }

                        if($.isEmpty(url_module_payment) || url_module_payment == '#' || url_module_payment == 'javascript:void(0)' || url_module_payment == 'javascript:void(0);' || url_module_payment == 'javascript: void(0);'){
                            if (!$.isEmpty(onclick_module_payment)){
                                onclick_module_payment = onclick_module_payment.replace(/^javascript:return/, '');
                                onclick_module_payment = onclick_module_payment.replace(/return false;/, '');

                                url_module_payment = onclick_module_payment;
                            }
                        }

                        if (module.name == 'sveawebpay'){
                            if ($(_a).hasClass('sveawebpayfaktura')){
                                url_image = baseDir + 'modules/' + module.name + '/img/invoice.png';
                            }
                            if ($(_a).hasClass('sveawebpaydelbetala')){
                                url_image = baseDir + 'modules/' + module.name + '/img/paymentplan.png';
                            }
                        }

                        if (module.name == 'itaushopline'){
                            url_module_payment = url_module_payment.replace(/abrir_janela_itaushopline\('/, '');
                            url_module_payment = url_module_payment.replace(/'\);/, '');
                        }

                        if (module.name == 'realexredirect'){
                            module_title = 'Realex Direct';
                            url_module_payment = $(tmp).find('a').first().attr('href');
                        }

                        if (module.name == 'sequrapayment'){
                            url_image = $(_a).find('img').attr('src');
                            module_description = $(_a).find('.payment_desc-js').html();
                            module_title = $(_a).find('.payment_title-js').html();
                            url_module_payment = $(_a).attr('href');

                            createPaymentModule(module, module.id, module.name, module_title, module_description, url_image, url_module_payment, '');

                            return;
                        }

                        if (module.name == 'universalpay'){
                            var module_style = $(_a).css('background-image');
                                module_style = module_style.replace('url(','');
                                module_style = module_style.replace(')','');
                                module_style = module_style.replace(/"/g,'');

                            if ($.isUrl(module_style)){
                                url_image = module_style;
                            }
                        }

                        if (module.name == 'atos'){
                            module_description = $(payment).find('p.teaser').text();
                            module_title = module_description;
                            name_form = module.name;
                            url_module_payment = "$('#onepagecheckoutps_forms #form_" + name_form + " input[type=image]').trigger('click');";
                        }

                        if (module.name == 'paypalusa' || module.name == 'paypalmx'){
                            var _buttons = new Array('#paypal-express-checkout-btn-product', '#paypal-standard-btn', '#paypal-express-checkout-btn');

                            $.each(_buttons, function(i, item){
                                if ($(tmp).find(item).length > 0){
                                    url_module_payment = '$("' + item + '").trigger("click");';

                                    if (!$.isEmpty(module_title))
                                        module_title = module_title;
                                    if (!$.isEmpty(module_description))
                                        module_description = module_description;

                                    if ($.isEmpty(module_title)){
                                        module_title = 'Paypal';
                                        module_description = module_title;
                                    }

                                    $(tmp).find('form').css({'display' : 'none'});

                                    return true;
                                }
                            });
                        }

                        if (module.name == 'moneybookers'){
                            var $_input_image = $(payment).find('input[type=image]');

                            /*module_title = $(payment).find('span').html();
                            module_description = $('<img>').attr('src', $_input_image.attr('src'));*/

                            name_form = 'moneybookers';
                            if ($(payment).find('span').length > 0){
                                name_form = $(payment).find('span').html().toString();
                                name_form = name_form.replace(/\s/g,'').toLowerCase();
                            }

                            url_module_payment = "$('#onepagecheckoutps_forms #form_" + name_form + "').submit();";
                        }

                        //compatibilidad con modulo stripepayment - Fiestacode - 1.6.1
                        if (module.name == 'stripepayment'){
                            module_title = '';
                            module_description = $(tmp).find('.mz_stripe').text();
                            url_module_payment = '$("form#stripeform .mz_stripe").trigger("click");$("div#onepagecheckoutps .loading_big").hide();';
                        }

                        if (module.name == 'paypalpro'){
                            module_title = '';
                            module_description = $(payment).find('.accept_cards').html();

                            var callback = function(){
                                $('#pppro_form').show();
                            };

                            url_module_payment = "Fronted.showModal({name : 'opc_paypalpro', title : '"+module.title+"', title_icon : 'fa-credit-card', callback : "+callback+", content : $('#onepagecheckoutps_forms #pppro_form')});";
                        }

						if (module.name == 'authorizeaim'){
                            module_title = 'AuthorizeAIM';
                            module_description = module_title;

							var callback = function(){
                                $('#authorizeaim_form').show();
                            };

                            url_module_payment = "Fronted.showModal({name : 'opc_authorizeaim', title : '"+module.title+"', title_icon : 'fa-credit-card', callback : "+callback+", content : $('#onepagecheckoutps_forms #authorizeaim_form')});";
                        }

                        if (module.name == 'iyzicocheckoutform'){
                            var callback = function(){
                                toggleform();
                            };
                            url_module_payment = "Fronted.showModal({name : 'opc_iyzicocheckoutform', title : '"+module_title+"', title_icon : 'fa-credit-card', callback : "+callback+", content : $('#onepagecheckoutps #iyzipay-checkout-form')});";
                        }

                        /*if (module.name == 'chasepaymentech'){
                            url_module_payment = url_module_payment = "Fronted.createPopup(true, '', $('#onepagecheckoutps_forms #chasepaymentech_form'), true, false, true, false);";
                        }

                        if (module.name == 'alphabnk'){
                            module_title = $(payment).find('img').attr('alt');
                            module_description = module_title;

                            url_module_payment = 'javascript:$("form[name=alphabnk_confirmation]").submit()';
                        }

                        if (module.name == 'monerisapi'){
                            module_title = $(payment).find('h3.moneris_title').text();
                            module_description = module_title;
                            url_module_payment = "Fronted.createPopup(true, '', $('#onepagecheckoutps_forms #div_monerisapi'), true, false, true, false);";
                        }

                        if (module.name == 'ps_targetpay'){
                            url_image = $(payment).find('img').attr('src')
                            module_title = $(payment).find('img').attr('alt');
                            module_description = module_title;
                            name_form = (module_title.replace(/\s/g,'')).toLowerCase();

                            url_module_payment = "Fronted.createPopup(true, '', $('#onepagecheckoutps_forms #form_" + name_form + "'), true, false, true, false);";
                        }*/

                        if (module.name == 'euplatesc'){
                            url_module_payment = 'javascript:document.euplatesc_form.submit()';
                        }

                        if (module.name == 'triveneto'){
                            url_module_payment = '$("#triveneto_form").submit();';
                        }

                        if (module.name == 'trz_yadpay'){
                            url_module_payment = '$("#YaadPay").submit();';
                        }

                        //fix paypal v325
                        if (module.name == 'paypal'){
                            if (url_module_payment == 'javascript:void(0)')
                                url_module_payment = '$("#paypal_payment_form").submit();';
                        }

                        if (module.name == 'payzen'){
                            if (url_module_payment == 'javascript:void(0);')
                                url_module_payment = 'javascript:document.payzen_standard.submit()';
                        }

                        if (module.name == 'bestkit_2co'){
                            url_module_payment = '$("#twoco_form input[name=submit]").click()';
                        }

                        if (module.name == 'ogone'){
                            url_module_payment = 'document.forms["ogone_form"].submit()';
                        }

                        if (module.name == 'amzpayments'){
                            $(payment).find('.amzPayments').appendTo('#onepagecheckoutps_forms');
                            url_module_payment = 'eventFire(document.getElementById($("#payWithAmazonListDiv img").attr("id")), "click");';
                        }

                        /*--------------------------------*/
                        if (!$.isEmpty(module.title_opc))
                            module_title = module.title_opc;

                        if (!$.isEmpty(module.description_opc))
                            module_description = module.description_opc;
                        /*--------------------------------*/

                        if (!$.isEmpty(url_module_payment) || !$.isEmpty(onclick_module_payment)){
                            if (module.name == 'monerisapi'){
                                var $div_monerisapi = $('<div/>').attr({'id': 'div_monerisapi'});

                                $($div_monerisapi).append($(payment).find('.moneris_title'));
                                $($div_monerisapi).append($(payment).find('#monerisapi_form').prev().prev().attr('style', 'height: auto'));
                                $($div_monerisapi).append($(payment).find('#monerisapi_form'));
                                $($div_monerisapi).hide().prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');
                            }else if (module.name == 'moneybookers'){
                                var form = $(payment).parent();

                                form.attr('id', 'form_' + name_form);
                                form.hide();
                                form.prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');

                            }else if (module.name == 'ps_targetpay'){
                                var form = $(payment).next();

                                form.attr('id', 'form_' + name_form);
                                form.hide();
                                form.prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');
                            }else{
                                var form = $(tmp).find('form');

                                if(name_form != ''){
                                    form.attr('id', 'form_' + name_form);
                                    form.hide();
                                    form.prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');
                                }

                                if (module.name != 'alphabnk'){
                                    if (form.length > 0){
                                        form.hide();
                                        form.prependTo('#onepagecheckoutps_contenedor #onepagecheckoutps_forms');

                                        if (url_module_payment == 'javascript:void(0)' || url_module_payment == '' || url_module_payment == '#'){
                                            if (typeof $('#onepagecheckoutps_forms #' + module.name + '_form')[0] !== 'undefined') {
                                                /*url_module_payment = "Fronted.showModal({name: 'payment_modal', type:'normal', title: '"+OnePageCheckoutPS.Msg.confirm_payment_method+"', content: $('#onepagecheckoutps_forms #" + module.name + "_form'), close : true});";*/
                                                url_module_payment = "$('#onepagecheckoutps_forms #" + module.name + "_form').submit();";
                                            }
                                        }
                                    }
                                }
                            }

                            createPaymentModule(module, module.id, module.name, module_title, module_description, url_image, url_module_payment, onclick_module_payment);
                        }
                    });
                });
            }
        }

        function createPaymentModule(module, id_module, module_name, module_title, module_description, url_image, url_module_payment, onclick_module_payment, payment_content_html){
            url_module_payment = url_module_payment.replace(/^(modules)/, baseDir + 'modules'); //anade el http si le hace falta.
            url_module_payment = url_module_payment.replace(/^(\/modules)/, baseDir + 'modules'); //anade el http si le hace falta.
            url_module_payment = url_module_payment.replace(/(modules\/onepagecheckoutps\/)/, ''); //fix ie

            _position = $.strpos(url_module_payment, 'modules/');
            if (_position){
                url_module_payment = baseDir + url_module_payment.substr(_position);
            }

            if (!$.isEmpty(module.title))
                module_title = module.title;
            if (!$.isEmpty(module.description))
                module_description = module.description;

            var radio =
                $('<input/>')
                    .attr({
                        id: 'module_payment_' + id_module + '_' + payment_number,
                        name: 'method_payment',
                        class: 'payment_radio not_unifrom not_uniform',
                        type: 'radio',
                        value: module_name,
                        checked: (Object.keys(content_payments).length == 1 ? true : false)
                    })
                    .change(Payment.change);
            var input =
                $('<input/>').attr({
                    type: 'hidden',
                    id: 'url_module_payment_' + id_module,
                    value: url_module_payment
                });

            if (!$.isEmpty(onclick_module_payment) && typeof onclick_module_payment == 'string'){
                onclick_module_payment = onclick_module_payment.replace('return', '');

                input.get(0).setAttribute('onclick', onclick_module_payment);
            }

            if (typeof module_description === 'string'){
                module_description = module_description.replace(module_title, '');
            }

            var div_container =
                $('<div/>')
                .attr({
                    class: 'row module_payment_container pts-vcenter',
                    for: 'module_payment_' + id_module + '_' + payment_number
                });

            var p_description = $('<p/>').html(module_description);

            var class_extra = '';
            if(module.additional[module.id + '_' + payment_number] != undefined){
                class_extra = module.additional[module.id + '_' + payment_number]['class'];
            }

            var image =
                $('<img>')
                .attr({
                    src: url_image,
                    title: module_title,
                    class: 'img-thumbnail img-responsive ' + class_extra
                });

            $('<div/>')
                .attr('class', 'payment_input col-xs-1')
                .append(radio)
                .append(input)
                .appendTo(div_container);

            $('<div/>')
                .attr('class', 'payment_image col-lg-3 col-md-3 col-xs-2')//hidden-sm
                .append(image)
                .appendTo(div_container);

            $('<div/>')
                .attr('class', 'payment_content col-lg-8 col-md-8 col-sm-9 col-xs-8')
                .append('<span>'+module_title+'</span>')
                .append(p_description)
                .appendTo(div_container);

            if (!$.isEmpty(payment_content_html)) {
                $('<div/>')
                    .attr('id', 'payment_content_html_' + module.id + '_' + payment_number)
                    .attr('class', 'payment_content_html col-xs-11 col-xs-offset-1 hidden')
                    .html(payment_content_html)
                    .appendTo(div_container);
            }

            div_container.appendTo($('div#onepagecheckoutps #payment_method_container'));

            payment_number+= 1;
        }
    </script>
    

    <div id="payment_method_container"></div>

    <?php echo $_smarty_tpl->getSubTemplate ('./custom_html/payment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
