<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/onepagecheckoutps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13322340825a9828112011d6-72586231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ac462e15f5afc640efaf6e7641cb7f5ee91f6a6' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/onepagecheckoutps.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13322340825a9828112011d6-72586231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_old_browser' => 0,
    'IS_LOGGED' => 0,
    'show_authentication' => 0,
    'no_products' => 0,
    'register_customer' => 0,
    'token' => 0,
    'link' => 0,
    'cod_id_module_payment' => 0,
    'bnkplus_id_module_payment' => 0,
    'paypal_id_module_payment' => 0,
    'tpv_id_module_payment' => 0,
    'sequra_id_module_payment' => 0,
    'CONFIGS' => 0,
    'attributewizardpro' => 0,
    'payment_modules_fee' => 0,
    'have_ship_to_pay' => 0,
    'CONFIGS_JS' => 0,
    'ONEPAGECHECKOUTPS_DIR' => 0,
    'ONEPAGECHECKOUTPS_IMG' => 0,
    'IS_VIRTUAL_CART' => 0,
    'IS_GUEST' => 0,
    'id_address_delivery' => 0,
    'id_address_invoice' => 0,
    'date_format_language' => 0,
    'id_country_delivery_default' => 0,
    'iso_code_country_delivery_default' => 0,
    'PS_GUEST_CHECKOUT_ENABLED' => 0,
    'lang_iso' => 0,
    'is_need_invoice' => 0,
    'is_rtl' => 0,
    'PS_TAX_ADDRESS_TYPE' => 0,
    'countries' => 0,
    'country' => 0,
    'state' => 0,
    'logged' => 0,
    'cookie' => 0,
    'position_steps' => 0,
    'column' => 0,
    'row' => 0,
    'HOOK_SHOPPING_CART' => 0,
    'HOOK_SHOPPING_CART_EXTRA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98281131fa90_78761693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98281131fa90_78761693')) {function content_5a98281131fa90_78761693($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['is_old_browser']->value) {?>
    <div class="alert alert-danger warning bold">
        <?php echo smartyTranslate(array('s'=>'You are using an older browser, please try a newer version or other web browser (Google Chrome, Mozilla Firefox, Safari, etc) to proceed with the purchase, thanks.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

    </div>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars['register_customer'] = new Smarty_variable((isset($_GET['rc'])&&$_GET['rc']==1&&!$_smarty_tpl->tpl_vars['IS_LOGGED']->value)||($_smarty_tpl->tpl_vars['show_authentication']->value&&!$_smarty_tpl->tpl_vars['IS_LOGGED']->value&&isset($_smarty_tpl->tpl_vars['no_products']->value)&&$_smarty_tpl->tpl_vars['no_products']->value>0) ? true : false, null, 0);?>

    <?php if ((isset($_smarty_tpl->tpl_vars['no_products']->value)&&$_smarty_tpl->tpl_vars['no_products']->value>0)||$_smarty_tpl->tpl_vars['register_customer']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
            <style>
            
                #order-opc #left_column,
                #order-opc #right_column{
                    display: none !important;
                }
            
            </style>
        <?php }?>
        <script type="text/javascript">
            var pts_static_token = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['token']->value,'htmlall','UTF-8');?>
';

            var orderOpcUrl= "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true),'htmlall','UTF-8',false,true);?>
";
            var orderProcess = 0;
            var cod_id_module_payment = <?php if (isset($_smarty_tpl->tpl_vars['cod_id_module_payment']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['cod_id_module_payment']->value);?>
<?php } else { ?>0<?php }?>;
            var bnkplus_id_module_payment = <?php if (isset($_smarty_tpl->tpl_vars['bnkplus_id_module_payment']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['bnkplus_id_module_payment']->value);?>
<?php } else { ?>0<?php }?>;
            var paypal_id_module_payment = <?php if (isset($_smarty_tpl->tpl_vars['paypal_id_module_payment']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['paypal_id_module_payment']->value);?>
<?php } else { ?>0<?php }?>;
            var tpv_id_module_payment = <?php if (isset($_smarty_tpl->tpl_vars['tpv_id_module_payment']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['tpv_id_module_payment']->value);?>
<?php } else { ?>0<?php }?>;
            var sequra_id_module_payment = <?php if (isset($_smarty_tpl->tpl_vars['sequra_id_module_payment']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['sequra_id_module_payment']->value);?>
<?php } else { ?>0<?php }?>;
            var payments_without_popup = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_MODULES_WITHOUT_POPUP'],'htmlall','UTF-8');?>
';
            var attributewizardpro = <?php if (isset($_smarty_tpl->tpl_vars['attributewizardpro']->value)) {?>true<?php } else { ?>false<?php }?>;
            var payment_modules_fee = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['payment_modules_fee']->value,'quotes','UTF-8');?>
;
            var have_ship_to_pay = <?php echo intval($_smarty_tpl->tpl_vars['have_ship_to_pay']->value);?>
;
            var OnePageCheckoutPS = {
                REGISTER_CUSTOMER : <?php if ($_smarty_tpl->tpl_vars['register_customer']->value) {?>true<?php } else { ?>false<?php }?>,
                CONFIGS : <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['CONFIGS_JS']->value,'quotes','UTF-8');?>
,
                ONEPAGECHECKOUTPS_DIR: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['ONEPAGECHECKOUTPS_DIR']->value,'htmlall','UTF-8');?>
',
                ONEPAGECHECKOUTPS_IMG: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['ONEPAGECHECKOUTPS_IMG']->value,'htmlall','UTF-8');?>
',
                ENABLE_INVOICE_ADDRESS: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_INVOICE_ADDRESS']);?>
),
                REQUIRED_INVOICE_ADDRESS: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_REQUIRED_INVOICE_ADDRESS']);?>
),
                ENABLE_TERMS_CONDITIONS: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_TERMS_CONDITIONS']);?>
),
                ENABLE_PRIVACY_POLICY: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_PRIVACY_POLICY']);?>
),
                SHOW_DELIVERY_VIRTUAL: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DELIVERY_VIRTUAL']);?>
),
                USE_SAME_NAME_CONTACT_DA: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_USE_SAME_NAME_CONTACT_DA']);?>
),
                USE_SAME_NAME_CONTACT_BA: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_USE_SAME_NAME_CONTACT_BA']);?>
),
                OPC_SHOW_POPUP_PAYMENT: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_POPUP_PAYMENT']);?>
),
                PAYMENTS_WITHOUT_RADIO: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_PAYMENTS_WITHOUT_RADIO']);?>
),
                IS_VIRTUAL_CART: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value);?>
),
                IS_LOGGED: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['IS_LOGGED']->value);?>
),
                IS_GUEST: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['IS_GUEST']->value);?>
),
                id_address_delivery: <?php echo intval($_smarty_tpl->tpl_vars['id_address_delivery']->value);?>
,
                id_address_invoice: <?php echo intval($_smarty_tpl->tpl_vars['id_address_invoice']->value);?>
,
                date_format_language: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['date_format_language']->value,'htmlall','UTF-8');?>
',
				id_country_delivery_default: <?php echo intval($_smarty_tpl->tpl_vars['id_country_delivery_default']->value);?>
,
				iso_code_country_delivery_default: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['iso_code_country_delivery_default']->value,'htmlall','UTF-8');?>
',
                PS_GUEST_CHECKOUT_ENABLED: Boolean(<?php echo intval($_smarty_tpl->tpl_vars['PS_GUEST_CHECKOUT_ENABLED']->value);?>
),
                LANG_ISO: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['lang_iso']->value,'htmlall','UTF-8');?>
',
                LANG_ISO_ALLOW : ['es', 'en', 'ca', 'br', 'eu', 'pt', 'eu', 'mx'],
                IS_NEED_INVOICE : Boolean(<?php echo intval($_smarty_tpl->tpl_vars['is_need_invoice']->value);?>
),
                GUEST_TRACKING_URL : '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink("guest-tracking",true),'htmlall','UTF-8');?>
',
                HISTORY_URL : '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink("history",true),'htmlall','UTF-8');?>
',
                IS_RTL : Boolean(<?php echo intval($_smarty_tpl->tpl_vars['is_rtl']->value);?>
),
                PS_TAX_ADDRESS_TYPE : '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['PS_TAX_ADDRESS_TYPE']->value,'htmlall','UTF-8');?>
',
                Msg: {
                    there_are: "<?php echo smartyTranslate(array('s'=>'There are','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    there_is: "<?php echo smartyTranslate(array('s'=>'There is','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    error: "<?php echo smartyTranslate(array('s'=>'Error','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    errors: "<?php echo smartyTranslate(array('s'=>'Errors','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    field_required: "<?php echo smartyTranslate(array('s'=>'Required','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    dialog_title: "<?php echo smartyTranslate(array('s'=>'Confirm Order','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    no_payment_modules: "<?php echo smartyTranslate(array('s'=>'There are no payment methods available.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    validating: "<?php echo smartyTranslate(array('s'=>'Validating, please wait','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    error_zipcode: "<?php echo smartyTranslate(array('s'=>'The Zip / Postal code is invalid','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    error_registered_email: "<?php echo smartyTranslate(array('s'=>'An account is already registered with this e-mail','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    error_registered_email_guest: "<?php echo smartyTranslate(array('s'=>'This email is already registered, you can login or fill form again.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    delivery_billing_not_equal: "<?php echo smartyTranslate(array('s'=>'Delivery address alias cannot be the same as billing address alias','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    errors_trying_process_order: "<?php echo smartyTranslate(array('s'=>'The following error occurred while trying to process the order','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    agree_terms_and_conditions: "<?php echo smartyTranslate(array('s'=>'You must agree to the terms of service before continuing.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    agree_privacy_policy: "<?php echo smartyTranslate(array('s'=>'You must agree to the privacy policy before continuing.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    fields_required_to_process_order: "<?php echo smartyTranslate(array('s'=>'You must complete the required information to process your order.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    check_fields_highlighted: "<?php echo smartyTranslate(array('s'=>'Check the fields that are highlighted and marked with an asterisk.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    error_number_format: "<?php echo smartyTranslate(array('s'=>'The format of the number entered is not valid.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    oops_failed: "<?php echo smartyTranslate(array('s'=>'Oops! Failed','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    continue_with_step_3: "<?php echo smartyTranslate(array('s'=>'Continue with step 3.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    email_required: "<?php echo smartyTranslate(array('s'=>'Email address is required.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    email_invalid: "<?php echo smartyTranslate(array('s'=>'Invalid e-mail address.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    password_required: "<?php echo smartyTranslate(array('s'=>'Password is required.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    password_too_long: "<?php echo smartyTranslate(array('s'=>'Password is too long.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    password_invalid: "<?php echo smartyTranslate(array('s'=>'Invalid password.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    addresses_same: "<?php echo smartyTranslate(array('s'=>'You must select a different address for shipping and billing.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    create_new_address: "<?php echo smartyTranslate(array('s'=>'Are you sure you wish to add a new delivery address? You can use the current address and modify the information.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    cart_empty: "<?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    dni_spain_invalid: "<?php echo smartyTranslate(array('s'=>'DNI/CIF/NIF is invalid.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    payment_method_required: "<?php echo smartyTranslate(array('s'=>'Please select a payment method to proceed.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    shipping_method_required: "<?php echo smartyTranslate(array('s'=>'Please select a shipping method to proceed.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    select_pickup_point: "<?php echo smartyTranslate(array('s'=>'To select a pick up point is necessary to complete your information and delivery address in the first step.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    need_select_pickup_point: "<?php echo smartyTranslate(array('s'=>'You need to select on shipping a pickup point to continue with the purchase.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    select_date_shipping: "<?php echo smartyTranslate(array('s'=>'Please select a date for shipping.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    confirm_payment_method: "<?php echo smartyTranslate(array('s'=>'Confirmation payment','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    to_determinate: "<?php echo smartyTranslate(array('s'=>'To determinate','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                    login_customer: "<?php echo smartyTranslate(array('s'=>'Loggin','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
"
                }
            };
            var messageValidate = {
                errorGlobal         : "<?php echo smartyTranslate(array('s'=>'This is not a valid.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsName         : "<?php echo smartyTranslate(array('s'=>'This is not a valid name.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsEmail        : "<?php echo smartyTranslate(array('s'=>'This is not a valid email address.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsPostCode     : "<?php echo smartyTranslate(array('s'=>'This is not a valid post code.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsAddress      : "<?php echo smartyTranslate(array('s'=>'This is not a valid address.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsCityName     : "<?php echo smartyTranslate(array('s'=>'This is not a valid city.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                isMessage           : "<?php echo smartyTranslate(array('s'=>'This is not a valid message.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsDniLite      : "<?php echo smartyTranslate(array('s'=>'This is not a valid document identifier.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsPhoneNumber  : "<?php echo smartyTranslate(array('s'=>'This is not a valid phone.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorIsPasswd       : "<?php echo smartyTranslate(array('s'=>'This is not a valid password. Minimum 5 characters.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorisBirthDate    : "<?php echo smartyTranslate(array('s'=>'This is not a valid birthdate.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                errorisDate			: "<?php echo smartyTranslate(array('s'=>'This is not a valid date.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                badUrl              : "<?php echo smartyTranslate(array('s'=>'This is not a valid url.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
 ex: http://www.domain.com",
                badInt              : "<?php echo smartyTranslate(array('s'=>'This is not a valid.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                notConfirmed        : "<?php echo smartyTranslate(array('s'=>'The values do not match.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
",
                lengthTooLongStart  : "<?php echo smartyTranslate(array('s'=>'It is only possible enter','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
 ",
                lengthTooShortStart : "<?php echo smartyTranslate(array('s'=>'The input value is shorter than ','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
 ",
                lengthBadEnd        : " <?php echo smartyTranslate(array('s'=>'characters.','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
"
            };

            var countries = new Array();
            var countriesNeedIDNumber = new Array();
            var countriesNeedZipCode = new Array();
            var countriesIsoCode = new Array();
            <?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
                countriesIsoCode[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['country']->value['iso_code'],'htmlall','UTF-8');?>
';
                <?php if (isset($_smarty_tpl->tpl_vars['country']->value['states'])&&$_smarty_tpl->tpl_vars['country']->value['contains_states']) {?>
                    countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = new Array();
                    <?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['states']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['state']->value['active']==1) {?>countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
].push({id : '<?php echo intval($_smarty_tpl->tpl_vars['state']->value['id_state']);?>
', name:'<?php echo trim($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['state']->value['name'],'html','UTF-8'));?>
', iso_code:'<?php echo trim($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['state']->value['iso_code'],'html','UTF-8'));?>
'});<?php }?>
                    <?php } ?>
                <?php }?>
                countriesNeedIDNumber[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = <?php echo intval($_smarty_tpl->tpl_vars['country']->value['need_identification_number']);?>
;
                <?php if ($_smarty_tpl->tpl_vars['country']->value['need_zip_code']) {?>
                    countriesNeedZipCode[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['country']->value['zip_code_format'],'htmlall','UTF-8');?>
';
                <?php }?>
            <?php } ?>
        </script>
        <div id="onepagecheckoutps" class="pts bootstrap <?php if ($_smarty_tpl->tpl_vars['register_customer']->value) {?>rc<?php }?>">
            <div class="loading_big"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-4x"></i></div>
            <input type="hidden" id="logged" value="<?php echo intval($_smarty_tpl->tpl_vars['logged']->value);?>
" />

            <div class="row">
                <?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
                    <div id="onepagecheckoutps_header" class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div id="div_onepagecheckoutps_info" class="col-md-7 col-sm-12 col-xs-12">
                                <h2><?php echo smartyTranslate(array('s'=>'Quick Checkout','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h2>
                                <h4><?php echo smartyTranslate(array('s'=>'Complete the following fields to process your order.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h4>
                            </div><!--
                            --><?php if ($_smarty_tpl->tpl_vars['IS_LOGGED']->value) {?><div id="div_onepagecheckoutps_login" class="col-md-5 col-sm-12 col-xs-12">
                                <div class="row end-md text-right">
									<p>
										<i class="fa-pts fa-pts-lock fa-pts-1x"></i>
										<?php echo smartyTranslate(array('s'=>'Welcome','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
,&nbsp;
										<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true),'htmlall','UTF-8');?>
">
											<b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['cookie']->value->customer_firstname,'htmlall','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['cookie']->value->customer_lastname,'htmlall','UTF-8');?>
</b>
										</a>
										<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"),'htmlall','UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
" class="btn btn-default btn-xs">
											<i class="fa-pts fa-pts-sign-out fa-pts-1x"></i>
											<?php echo smartyTranslate(array('s'=>'Log out','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

										</a>
									</p>
                                </div>
                            </div><?php }?>
                        </div>
                    </div>
                <?php }?>

                <div class="row">
                    <?php echo $_smarty_tpl->getSubTemplate ('./custom_html/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>

                <div id="onepagecheckoutps_contenedor" class="col-md-12 col-sm-12 col-xs-12">
                    <div id="onepagecheckoutps_forms" class="hidden"></div>
                    <div id="opc_temporal" class="hidden"></div>

                    <?php if (!$_smarty_tpl->tpl_vars['IS_LOGGED']->value) {?>
                        <div id="opc_login" class="hidden" title="<?php echo smartyTranslate(array('s'=>'Login','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
">
                            <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
                            <div class="login-box">
                                <form id="form_login" autocomplete="off">
                                    <div class="form-group input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa-pts fa-pts-envelope-o fa-pts-fw"></i></span>
                                        <input
                                            id="txt_login_email"
                                            class="form-control"
                                            type="text"
                                            placeholder="<?php echo smartyTranslate(array('s'=>'E-mail','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
"
                                            data-validation="isEmail"
                                        />
                                    </div>
                                    <div class="form-group input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa-pts fa-pts-key fa-pts-fw"></i></span>
                                        <input
                                            id="txt_login_password"
                                            class="form-control"
                                            type="password"
                                            placeholder="<?php echo smartyTranslate(array('s'=>'Password','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
"
                                            data-validation="length"
                                            data-validation-length="min5"
                                        />
                                    </div>

                                    <div class="alert alert-warning hidden"></div>

                                    <button type="button" id="btn_login" class="btn btn-primary btn-block">
                                        <i class="fa-pts fa-pts-lock fa-pts-lg"></i>
                                        <?php echo smartyTranslate(array('s'=>'Login','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                                    </button>

                                    <p class="forget_password">
                                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('password'),'htmlall','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Forgot your password?','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    <?php }?>
                    <form id="form_onepagecheckoutps" autocomplete="on">
                        <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position_steps']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
                            <div class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value['classes'],'htmlall','UTF-8');?>
 nopadding">
                                <div class="row">
                                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <?php echo $_smarty_tpl->getSubTemplate ((('./steps/').($_smarty_tpl->tpl_vars['row']->value['name_step'])).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('classes'=>$_smarty_tpl->tpl_vars['row']->value['classes'],'configs'=>$_smarty_tpl->tpl_vars['CONFIGS']->value), 0);?>

                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-xs-12 clear clearfix">
                            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_HOOK_SHOPPING_CART']&&!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_COMPATIBILITY_REVIEW']&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_PAYMENTS_WITHOUT_RADIO']) {?>
                                <div id="HOOK_SHOPPING_CART" class="row"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART']->value,'html','UTF-8',false,true);?>
</div>
                                <p class="cart_navigation_extra row">
                                    <span id="HOOK_SHOPPING_CART_EXTRA"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART_EXTRA']->value,'html','UTF-8',false,true);?>
</span>
                                </p>
                            <?php }?>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <?php echo $_smarty_tpl->getSubTemplate ('./custom_html/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>

                <div class="clear clearfix"></div>
            </div>
        </div>
    <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./shopping-cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>''), 0);?>

    <?php }?>
<?php }?><?php }} ?>
