<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8989123615a9828113aa248-70432743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff2b1e256df950506e6fbeed528b1a866a181586' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/address.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8989123615a9828113aa248-70432743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'OPC_GLOBALS' => 0,
    'OPC_FIELDS' => 0,
    'CONFIGS' => 0,
    'IS_VIRTUAL_CART' => 0,
    'IS_LOGGED' => 0,
    'social_networks' => 0,
    'item' => 0,
    'button' => 0,
    'size' => 0,
    'popup' => 0,
    'sign_in' => 0,
    'i' => 0,
    'isLogged' => 0,
    'opc_social_networks' => 0,
    'network' => 0,
    'name' => 0,
    'link' => 0,
    'HOOK_CREATE_ACCOUNT_TOP' => 0,
    'sveawebpay_md5' => 0,
    'fields' => 0,
    'field' => 0,
    'checkedTOS' => 0,
    'HOOK_CREATE_ACCOUNT_FORM' => 0,
    'addresses_tab' => 0,
    'is_need_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98281144a5b1_99811219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98281144a5b1_99811219')) {function content_5a98281144a5b1_99811219($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/modifier.capitalize.php';
?>

<?php $_smarty_tpl->tpl_vars['addresses_tab'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery])&&isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice])&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_INVOICE_ADDRESS']&&!$_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value&&sizeof($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery])>1)||$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_INVOICE_ADDRESS']&&$_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DELIVERY_VIRTUAL'], null, 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->customer])) {?>
    <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_one">
        <i class="fa-pts fa-pts-user fa-pts-3x"></i>
        <?php echo smartyTranslate(array('s'=>'Your data','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

        <?php if (!$_smarty_tpl->tpl_vars['IS_LOGGED']->value) {?>
            <button type="button" id="opc_show_login" class="btn btn-primary btn-xs pull-right" >
                
                <?php echo smartyTranslate(array('s'=>'Already registered?','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

            </button>
        <?php }?>
    </h5>

	
	<?php if (isset($_smarty_tpl->tpl_vars['social_networks']->value)) {?>
		<section id="module_sociallogin">
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['social_networks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['complete_config']) {?>
					<button type="button" class="btn btn-social<?php if ($_smarty_tpl->tpl_vars['button']->value) {?>-icon<?php }?> <?php if ($_smarty_tpl->tpl_vars['size']->value!='st') {?>btn-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['size']->value,'html','UTF-8');?>
<?php }?> btn-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value['icon_class'],'html','UTF-8');?>
" onclick="window.open('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value['connect'],'html','UTF-8');?>
', <?php if ($_smarty_tpl->tpl_vars['popup']->value) {?>'_blank'<?php } else { ?>'_self'<?php }?>, 'menubar=no, status=no, copyhistory=no, width=640, height=640, top=220, left=640')">
						<i class="fa-pts fa-pts-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value['fa_icon'],'html','UTF-8');?>
"></i>
						<?php if (!$_smarty_tpl->tpl_vars['button']->value) {?>
							<?php if ($_smarty_tpl->tpl_vars['sign_in']->value) {?><?php echo smartyTranslate(array('s'=>'Sign in with','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
<?php }?>
							<?php echo smarty_modifier_capitalize($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8'));?>

						<?php }?>
					</button>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
				<?php }?>
			<?php } ?>
		</section>
	<?php }?>

	<?php if (!$_smarty_tpl->tpl_vars['isLogged']->value&&isset($_smarty_tpl->tpl_vars['opc_social_networks']->value)&&($_smarty_tpl->tpl_vars['opc_social_networks']->value->facebook->client_id!=''||$_smarty_tpl->tpl_vars['opc_social_networks']->value->google->client_id!='')) {?>
		<section id="opc_social_networks">
			<h5><?php echo smartyTranslate(array('s'=>'Login using your social networks','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
			<?php  $_smarty_tpl->tpl_vars['network'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['network']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['opc_social_networks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['network']->key => $_smarty_tpl->tpl_vars['network']->value) {
$_smarty_tpl->tpl_vars['network']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['network']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['network']->value->client_id!='') {?>
					<button type="button" class="btn btn-sm btn-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['name']->value,'html','UTF-8');?>
" onclick="Fronted.openWindow('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getModuleLink('onepagecheckoutps','login',array('sv'=>$_smarty_tpl->tpl_vars['network']->value->network)),'htmlall','UTF-8');?>
', true)">
						<i class="fa-pts fa-pts-1x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['network']->value->class_icon,'html','UTF-8');?>
"></i>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['network']->value->name_network,'html','UTF-8');?>

					</button>
				<?php }?>
			<?php } ?>
		</section>
	<?php }?>

    
        <div id="hook_create_account_top" class="col-xs-12">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_CREATE_ACCOUNT_TOP']->value,'htmlall','UTF-8',false,true);?>

        </div>
    

    <section id="customer_container">
        <?php if (isset($_smarty_tpl->tpl_vars['sveawebpay_md5']->value)) {?>
            <div class="form-group col-xs-12 clear clearfix">
               <label for="sveawebpay_security_number">
                   <?php echo smartyTranslate(array('s'=>'Social security number','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
:
               </label>
               <input id="sveawebpay_md5" name="sveawebpay_md5" type="hidden" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sveawebpay_md5']->value,'html','UTF-8');?>
"/>
               <input id="sveawebpay_security_number" name="sveawebpay_security_number" type="text" class="form-control input-sm not_unifrom not_uniform" onblur="getAddressSveawebpay()" />
            </div>
        <?php }?>

        <?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fields']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->customer]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value) {
$_smarty_tpl->tpl_vars['fields']->_loop = true;
?>
            <div class="row">
                <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_fields']['total'] = $_smarty_tpl->tpl_vars['field']->total;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
                    <?php echo $_smarty_tpl->getSubTemplate ("./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>$_smarty_tpl->tpl_vars['field']->value,'cant_fields'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['f_fields']['total']), 0);?>

                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_PRIVACY_POLICY']&&!$_smarty_tpl->tpl_vars['IS_LOGGED']->value) {?>
            <div class="row">
                <div class="form-group col-xs-12 clear clearfix" id="div_privacy_policy">
                    <p id="p_privacy_policy">
                        <label for="privacy_policy">
                            <input type="checkbox" class="not_unifrom not_uniform" name="privacy_policy" id="privacy_policy" value="1" <?php if ($_smarty_tpl->tpl_vars['checkedTOS']->value) {?>checked="checked"<?php }?>/>
                            <?php echo smartyTranslate(array('s'=>'I have read and accept the Privacy Policy.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                            <span class="read"><?php echo smartyTranslate(array('s'=>'(read)','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</span>
                        </label>
                    </p>
                </div>
            </div>
        <?php }?>
    </section>
<?php }?>


    <div id="hook_create_account" class="col-xs-12">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['HOOK_CREATE_ACCOUNT_FORM']->value,'htmlall','UTF-8',false,true);?>

    </div>


<?php if ($_smarty_tpl->tpl_vars['addresses_tab']->value) {?>
    <ul class="nav nav-tabs">
        <li id="li_delivery_address" class="active">
            <a href="#delivery_address_container" data-toggle="tab"><?php echo smartyTranslate(array('s'=>'Delivery address','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</a>
        </li>
        <li id="li_invoice_address">
            <a href="#invoice_address_container" data-toggle="tab"><?php echo smartyTranslate(array('s'=>'Invoice address','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</a>
        </li>
    </ul>
<?php }?>

<div class="<?php if ($_smarty_tpl->tpl_vars['addresses_tab']->value) {?>tab-content<?php }?>">
    <?php if (isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery])&&sizeof($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery])>1) {?>
        <?php if (($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DELIVERY_VIRTUAL']&&$_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value)||!$_smarty_tpl->tpl_vars['IS_VIRTUAL_CART']->value) {?>
            <?php if (!$_smarty_tpl->tpl_vars['addresses_tab']->value) {?>
                <h5 id="p_delivery_address" class="onepagecheckoutps_p_step p_address"><?php echo smartyTranslate(array('s'=>'Delivery address','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
            <?php }?>
            <section id="delivery_address_container" class="<?php if ($_smarty_tpl->tpl_vars['addresses_tab']->value) {?>page-product-box tab-pane active<?php }?>">
                <div class="fields_container">
                    <?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fields']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value) {
$_smarty_tpl->tpl_vars['fields']->_loop = true;
?>
                        <div class="row">
                            <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_fields']['total'] = $_smarty_tpl->tpl_vars['field']->total;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
                                <?php echo $_smarty_tpl->getSubTemplate ("./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>$_smarty_tpl->tpl_vars['field']->value,'cant_fields'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['f_fields']['total']), 0);?>

                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php }?>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice])&&sizeof($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice])>1) {?>
        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_INVOICE_ADDRESS']) {?>
            <?php if (!$_smarty_tpl->tpl_vars['addresses_tab']->value) {?>
                <h5 id="p_invoice_address" class="onepagecheckoutps_p_step p_address"><?php echo smartyTranslate(array('s'=>'Invoice address','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
</h5>
            <?php }?>
            <section id="invoice_address_container" class="<?php if ($_smarty_tpl->tpl_vars['addresses_tab']->value) {?>page-product-box tab-pane<?php }?>">
                <div class="row <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_REQUIRED_INVOICE_ADDRESS']) {?>hidden<?php }?>">
                    <div class="form-group col-xs-12">
                        <label for="checkbox_create_invoice_address">
                            <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['is_need_invoice']->value) {?>checked="true"<?php }?> name="checkbox_create_invoice_address" id="checkbox_create_invoice_address" class="input_checkbox not_unifrom not_uniform"/>
                            <?php echo smartyTranslate(array('s'=>'I want to set another address for my invoice.','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                        </label>
                    </div>
                </div>
                <div class="fields_container">
                    <?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fields']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value) {
$_smarty_tpl->tpl_vars['fields']->_loop = true;
?>
                        <div class="row">
                            <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_fields']['total'] = $_smarty_tpl->tpl_vars['field']->total;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
                                <?php echo $_smarty_tpl->getSubTemplate ("./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>$_smarty_tpl->tpl_vars['field']->value,'cant_fields'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['f_fields']['total']), 0);?>

                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php }?>
    <?php }?>
</div>

<div class="row">
    <?php echo $_smarty_tpl->getSubTemplate ('./custom_html/address.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><?php }} ?>
