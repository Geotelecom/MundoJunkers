<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:53
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/contact-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4056682485a98233d803a23-77136565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '341e1db3d21f0a209a7469f326760a29ce47dd7e' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/contact-form.tpl',
      1 => 1519919806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4056682485a98233d803a23-77136565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'customerThread' => 0,
    'confirmation' => 0,
    'base_dir' => 0,
    'alreadySent' => 0,
    'request_uri' => 0,
    'contacts' => 0,
    'contact' => 0,
    'email' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98233d884663_12473342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98233d884663_12473342')) {function content_5a98233d884663_12473342($_smarty_tpl) {?>﻿
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Contact'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
<h1 class="page-heading bottom-indent">
    <?php echo smartyTranslate(array('s'=>'Customer service'),$_smarty_tpl);?>
 - <?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value)&&$_smarty_tpl->tpl_vars['customerThread']->value) {?><?php echo smartyTranslate(array('s'=>'Your reply'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Contact us'),$_smarty_tpl);?>
<?php }?>
</h1>
<?php } else { ?>
<div class="capcaleracontact">
    <div class="asun"></div>
    <div class="content">
        <h1><?php echo smartyTranslate(array('s'=>'Soy Asun, ¿Te Ayudo?'),$_smarty_tpl);?>
</h1>
        <p><?php echo smartyTranslate(array('s'=>'Si te puedo ayudar de alguna forma, por favor, llámanos.'),$_smarty_tpl);?>
</p>
        <p class="telf"><?php echo smartyTranslate(array('s'=>'977 070 001'),$_smarty_tpl);?>
 <span>/</span> <?php echo smartyTranslate(array('s'=>'691 097 366'),$_smarty_tpl);?>
 <small>(también whatsapp)</small></p>
    </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
	<p class="alert alert-success"><?php echo smartyTranslate(array('s'=>'Your message has been successfully sent to our team.'),$_smarty_tpl);?>
</p>
	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
    <ul class="footer_links clearfix">
		<li>
            <a class="btn btn-default button button-small" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
">
                <span>
                    <i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

                </span>
            </a>
        </li>
	</ul>
    <?php }?>
<?php } elseif (isset($_smarty_tpl->tpl_vars['alreadySent']->value)) {?>
	<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Your message has already been sent.'),$_smarty_tpl);?>
</p>
	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
       <ul class="footer_links clearfix">
		<li>
            <a class="btn btn-default button button-small" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
">
                <span>
                    <i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

                </span>
            </a>
        </li>
	</ul>
    <?php }?>
<?php } else { ?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['request_uri']->value,'html','UTF-8');?>
" method="post" class="contact-form-box" enctype="multipart/form-data">
		<fieldset>
        <?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
        <h3 class="page-subheading"><?php echo smartyTranslate(array('s'=>'send a message'),$_smarty_tpl);?>
</h3>
        <?php } else { ?>
            <h3><?php echo smartyTranslate(array('s'=>'Si prefieres déjanos tu número de teléfono y te llamamos'),$_smarty_tpl);?>
 <span><?php echo smartyTranslate(array('s'=>'GRATIS'),$_smarty_tpl);?>
</span></h3>
        <?php }?>
        <div class="clearfix">
            <div class="col-xs-12 col-md-3">
                <div class="form-group selector1">
                    <label for="id_contact"><?php echo smartyTranslate(array('s'=>'Subject Heading'),$_smarty_tpl);?>
</label>
                <?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_contact'])) {?>
                        <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['contact']->value['id_contact']==$_smarty_tpl->tpl_vars['customerThread']->value['id_contact']) {?>
                                <input type="text" class="form-control" id="contact_name" name="contact_name" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contact']->value['name'],'html','UTF-8');?>
" readonly="readonly" />
                                <input type="hidden" name="id_contact" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id_contact'];?>
" />
                            <?php }?>
                        <?php } ?>
                <?php } else { ?>
                    <select id="id_contact" class="form-control" name="id_contact">
                        <option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
                        <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                            <option value="<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" <?php if (isset($_REQUEST['id_contact'])&&$_REQUEST['id_contact']==$_smarty_tpl->tpl_vars['contact']->value['id_contact']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contact']->value['name'],'html','UTF-8');?>
</option>
                        <?php } ?>
                    </select>
                </div>
                    <p id="desc_contact0" class="desc_contact">&nbsp;</p>
                    <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                        <p id="desc_contact<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" class="desc_contact contact-title" style="display:none;">
                            <i class="icon-comment-alt"></i><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contact']->value['description'],'html','UTF-8');?>

                        </p>
                    <?php } ?>
                <?php }?>
                 <p class="form-group">
                    <label for="email"><?php echo smartyTranslate(array('s'=>'Nombre'),$_smarty_tpl);?>
</label>
                    <input class="form-control grey" type="text" id="nombre" name="nombre" value=""/>
                </p>    
                  <p class="form-group">
                    <label for="email"><?php echo smartyTranslate(array('s'=>'Teléfono'),$_smarty_tpl);?>
</label>
                    <input class="form-control grey" type="text" id="telf" name="telf" value="" />
                </p>                            
                <p class="form-group">
                    <label for="email"><?php echo smartyTranslate(array('s'=>'Email address'),$_smarty_tpl);?>
</label>
                    <?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['email'])) {?>
                        <input class="form-control grey" type="text" id="email" name="from" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['customerThread']->value['email'],'html','UTF-8');?>
" readonly="readonly" />
                    <?php } else { ?>
                        <input class="form-control grey validate" type="text" id="email" name="from" data-validate="isEmail" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['email']->value,'html','UTF-8');?>
" />
                    <?php }?>
                </p>
                
                <?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>

                    <div class="g-recaptcha" data-sitekey="6Ld23kkUAAAAAMl8YV3pAiyRb43ONdlAwgrJMI2E"></div>

                <?php } else { ?>
                    <input type="hidden" name="content_only" class="form-control" value="1" />
                <?php }?>
            </div>
            <div class="col-xs-12 col-md-9">
                <div class="form-group">
                    <label for="message"><?php echo smartyTranslate(array('s'=>'Message'),$_smarty_tpl);?>
</label>
                    <textarea class="form-control" id="message" name="message"><?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?><?php echo stripslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['message']->value,'html','UTF-8'));?>
<?php }?></textarea>
                </div>
            </div>
        </div>
        <div class="submit">
            <button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span><?php echo smartyTranslate(array('s'=>'Send'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span></button>
		</div>
	</fieldset>
</form>
<?php }?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'contact_fileDefaultHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileDefaultHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No file selected','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileDefaultHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'contact_fileButtonHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileButtonHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Choose File','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileButtonHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
