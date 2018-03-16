<?php /* Smarty version Smarty-3.1.19, created on 2018-03-02 00:38:36
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/guest-tracking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:840187655a988efc2fecb8-28108288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43446833033dace29ba3084eeeeb492a1136221e' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/guest-tracking.tpl',
      1 => 1493215139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '840187655a988efc2fecb8-28108288',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_collection' => 0,
    'order' => 0,
    'transformSuccess' => 0,
    'link' => 0,
    'action' => 0,
    'show_login_link' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a988efc3a9bf4_70844173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a988efc3a9bf4_70844173')) {function content_5a988efc3a9bf4_70844173($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Guest Tracking'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="page-heading"><?php echo smartyTranslate(array('s'=>'Guest Tracking'),$_smarty_tpl);?>
</h1>

<?php if (isset($_smarty_tpl->tpl_vars['order_collection']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['order_state'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->getCurrentState(), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['invoice'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->invoice, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['order_history'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->order_history, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['carrier'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->carrier, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['address_invoice'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->address_invoice, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['address_delivery'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->address_delivery, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['inv_adr_fields'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->inv_adr_fields, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['dlv_adr_fields'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->dlv_adr_fields, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['invoiceAddressFormatedValues'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->invoiceAddressFormatedValues, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['deliveryAddressFormatedValues'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->deliveryAddressFormatedValues, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['currency'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->currency, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['discounts'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->discounts, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['invoiceState'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->invoiceState, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['deliveryState'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->deliveryState, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['products'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->products, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['customizedDatas'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->customizedDatas, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['HOOK_ORDERDETAILDISPLAYED'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->hook_orderdetaildisplayed, null, 0);?>
		<?php if (isset($_smarty_tpl->tpl_vars['order']->value->total_old)) {?>
			<?php $_smarty_tpl->tpl_vars['total_old'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_old, null, 0);?>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['order']->value->followup)) {?>
			<?php $_smarty_tpl->tpl_vars['followup'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->followup, null, 0);?>
		<?php }?>
		
		<div id="block-history">
			<div id="block-order-detail" class="std">
			<?php echo $_smarty_tpl->getSubTemplate ("./order-detail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>
		</div>
	<?php } ?>

	<h2 id="guestToCustomer" class="page-heading"><?php echo smartyTranslate(array('s'=>'For more advantages...'),$_smarty_tpl);?>
</h2>

	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<?php if (isset($_smarty_tpl->tpl_vars['transformSuccess']->value)) {?>
		<p class="alert alert-success"><?php echo smartyTranslate(array('s'=>'Your guest account has been successfully transformed into a customer account. You can now login as a registered shopper. '),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'page.'),$_smarty_tpl);?>
</a></p>
	<?php } else { ?>
		<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
#guestToCustomer" class="std">
			<fieldset class="description_box box">
            	
                <p><strong class="dark"><?php echo smartyTranslate(array('s'=>'Transform your guest account into a customer account and enjoy:'),$_smarty_tpl);?>
</strong></p>
				<ul>
					<li> -<?php echo smartyTranslate(array('s'=>'Personalized and secure access'),$_smarty_tpl);?>
</li>
					<li> -<?php echo smartyTranslate(array('s'=>'Fast and easy checkout'),$_smarty_tpl);?>
</li>
					<li> -<?php echo smartyTranslate(array('s'=>'Easier merchandise return'),$_smarty_tpl);?>
</li>
				</ul>
                <div class="row">
                	<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                        <div class="text form-group">
                            <label><strong class="dark"><?php echo smartyTranslate(array('s'=>'Set your password:'),$_smarty_tpl);?>
</strong></label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                    </div>
                </div>
				
				<input type="hidden" name="id_order" value="<?php if (isset($_smarty_tpl->tpl_vars['order']->value->id)) {?><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
<?php } else { ?><?php if (isset($_GET['id_order'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_GET['id_order'],'html','UTF-8');?>
<?php } else { ?><?php if (isset($_POST['id_order'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_POST['id_order'],'html','UTF-8');?>
<?php }?><?php }?><?php }?>" />
				<input type="hidden" name="order_reference" value="<?php if (isset($_GET['order_reference'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_GET['order_reference'],'html','UTF-8');?>
<?php } else { ?><?php if (isset($_POST['order_reference'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_POST['order_reference'],'html','UTF-8');?>
<?php }?><?php }?>" />
				<input type="hidden" name="email" value="<?php if (isset($_GET['email'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_GET['email'],'html','UTF-8');?>
<?php } else { ?><?php if (isset($_POST['email'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_POST['email'],'html','UTF-8');?>
<?php }?><?php }?>" />
				
				<p>
                    <button type="submit" name="submitTransformGuestToCustomer" class="button button-medium btn btn-default"><span><?php echo smartyTranslate(array('s'=>'Send'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span></button>
                </p>
			</fieldset>
		</form>
	<?php }?>
<?php } else { ?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php if (isset($_smarty_tpl->tpl_vars['show_login_link']->value)&&$_smarty_tpl->tpl_vars['show_login_link']->value) {?>
		<p><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/userinfo.gif" alt="<?php echo smartyTranslate(array('s'=>'Information'),$_smarty_tpl);?>
" class="icon" /><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Click here to login to your customer account.'),$_smarty_tpl);?>
</a><br /><br /></p>
	<?php }?>
	<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" class="std" id="guestTracking">
		<fieldset class="description_box box">
			<h2 class="page-subheading"><?php echo smartyTranslate(array('s'=>'To track your order, please enter the following information:'),$_smarty_tpl);?>
</h2>
                    <div class="text form-group">
                        <label><?php echo smartyTranslate(array('s'=>'Order Reference:'),$_smarty_tpl);?>
 </label>
                        <input class="form-control" type="text" name="order_reference" value="<?php if (isset($_GET['id_order'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_GET['id_order'],'html','UTF-8');?>
<?php } else { ?><?php if (isset($_POST['id_order'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_POST['id_order'],'html','UTF-8');?>
<?php }?><?php }?>" size="8" />
                        <i><?php echo smartyTranslate(array('s'=>'For example: QIIXJXNUI or QIIXJXNUI#1'),$_smarty_tpl);?>
</i>
                    </div>
                    <div class="text form-group">
                        <label><?php echo smartyTranslate(array('s'=>'Email:'),$_smarty_tpl);?>
</label>
                        <input class="form-control" type="text" name="email" value="<?php if (isset($_GET['email'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_GET['email'],'html','UTF-8');?>
<?php } else { ?><?php if (isset($_POST['email'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_POST['email'],'html','UTF-8');?>
<?php }?><?php }?>" />
                    </div>
			<p>
                <button type="submit" name="submitGuestTracking" class="button btn btn-default button-medium"><span><?php echo smartyTranslate(array('s'=>'Send'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span></button>
            </p>
		</fieldset>
	</form>
<?php }?>
<?php }} ?>
