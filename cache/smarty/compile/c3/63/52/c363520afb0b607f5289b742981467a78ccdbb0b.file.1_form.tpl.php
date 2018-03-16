<?php /* Smarty version Smarty-3.1.19, created on 2018-03-03 03:23:07
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/gformbuilderpro/views/templates/front/formtemplates/1/1/1_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11903451935a9a070b168817-13103957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c363520afb0b607f5289b742981467a78ccdbb0b' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/gformbuilderpro/views/templates/front/formtemplates/1/1/1_form.tpl',
      1 => 1517487851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11903451935a9a070b168817-13103957',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_errors' => 0,
    '_error' => 0,
    'actionUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9a070ba99991_31842159',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9a070ba99991_31842159')) {function content_5a9a070ba99991_31842159($_smarty_tpl) {?><div class="gformbuilderpro_form"><?php if (isset($_smarty_tpl->tpl_vars['_errors']->value)) {?> <div class="alert alert-danger" id="create_account_error"><ol><?php  $_smarty_tpl->tpl_vars['_error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_error']->key => $_smarty_tpl->tpl_vars['_error']->value) {
$_smarty_tpl->tpl_vars['_error']->_loop = true;
?> <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['_error']->value,'html','UTF-8');?>
</li> <?php } ?></ol></div> <?php }?> <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['actionUrl']->value,'html','UTF-8');?>
" method="POST" class="form_using_ajax"><input type="hidden" name="usingajax" value="1"/><input type="hidden" name="idform" value="1"/><input type="hidden" name="id_lang" value="1"/><input type="hidden" name="id_shop" value="1"/><input type="hidden" name="gSubmitForm" value="1"/><div class="gformbuilderpro_content row"><div class="formbuilder_group col-md-12 col-sm-12 col-xs-12"><div class="itemfield_wp row"><div class="itemfield col-xs-12 col-sm-12 col-md-12" title="" id="gformbuilderpro_1"><div class="form-group input_box"><label for="input_1517480795" class="required_label">Nombre</label><input type="text" class="form-control input_1517480795 " id="input_1517480795" placeholder="" name="nombre" required="required"/></div></div><div class="itemfield col-xs-12 col-sm-12 col-md-12" title="" id="gformbuilderpro_2"><div class="form-group input_box"><label for="input_1517480840" class="required_label">Correo electrónico</label><input type="text" class="form-control input_1517480840 " id="input_1517480840" placeholder="" name="email" required="required"/></div></div><div class="itemfield col-xs-12 col-sm-12 col-md-12" title="" id="gformbuilderpro_3"><div class="form-group input_box"><label for="input_1517480880" class="required_label">Teléfono</label><input type="text" class="form-control input_1517480880 " id="input_1517480880" placeholder="" name="telf" required="required"/></div></div><div class="itemfield col-xs-12 col-sm-12 col-md-12" title="" id="gformbuilderpro_4"><div class="form-group select_box"><label for="select_1517481049" class=" required_label toplabel">Província</label><select name="provincia[]" id="select_1517481049" class="select_1517481049 form-control select_chosen" required="required" multiple><option value="Álava">Álava</option><option value="Albacete">Albacete</option><option value="Alicante">Alicante</option><option value="Almería">Almería</option><option value="Asturias">Asturias</option><option value="Ávila">Ávila</option><option value="Badajoz">Badajoz</option><option value="Barcelona">Barcelona</option><option value="Burgos">Burgos</option><option value="Cáceres">Cáceres</option><option value="Cádiz">Cádiz</option><option value="Cantabria">Cantabria</option><option value="Castellón">Castellón</option><option value="Ciudad Real">Ciudad Real</option><option value="Córdoba">Córdoba</option><option value="Coruña">Coruña</option><option value="Cuenca">Cuenca</option><option value="Girona">Girona</option><option value="Granada">Granada</option><option value="Guadalajara">Guadalajara</option><option value="Guipúzcoa">Guipúzcoa</option><option value="Huelva">Huelva</option><option value="Huesca">Huesca</option><option value="Baleares">Baleares</option><option value="Jaén">Jaén</option><option value="León">León</option><option value="Lleida">Lleida</option><option value="Lugo">Lugo</option><option value="Madrid">Madrid</option><option value="Málaga">Málaga</option><option value="Murcia">Murcia</option><option value="Navarra">Navarra</option><option value="Ourense">Ourense</option><option value="Palencia">Palencia</option><option value="Palmas">Palmas</option><option value="Pontevedra">Pontevedra</option><option value="Rioja">Rioja</option><option value="Salamanca">Salamanca</option><option value="Segovia">Segovia</option><option value="Sevilla">Sevilla</option><option value="Soria">Soria</option><option value="Tarragona">Tarragona</option><option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option><option value="Teruel">Teruel</option><option value="Toledo">Toledo</option><option value="Valencia">Valencia</option><option value="Valladolid">Valladolid</option><option value="Vizcaya">Vizcaya</option><option value="Zamora">Zamora</option><option value="Zaragoza">Zaragoza</option><option value="Ceuta">Ceuta</option><option value="Melilla">Melilla</option></select><p class="help-block">Seleccione província(s) donde opera</p></div></div><div class="itemfield col-xs-12 col-sm-12 col-md-12" title="" id="gformbuilderpro_5"><div class="form-group input_box"><label for="textarea_1517481681">Comentarios</label><textarea class="form-control textarea_1517481681 " name="comentarios" id="textarea_1517481681" placeholder="" rows="7"></textarea></div></div></div></div></div><div class="gformbuilderpro_action"><button type="submit" name="submitForm" id="submitForm" class="button btn btn-default button-medium"><span>Enviar<i class="icon-chevron-right right"></i></span></button></div></form></div>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'contact_fileDefaultHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileDefaultHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No file selected','js'=>1,'mod'=>'gformbuilderpro'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileDefaultHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'contact_fileButtonHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileButtonHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Choose File','js'=>1,'mod'=>'gformbuilderpro'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileButtonHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
