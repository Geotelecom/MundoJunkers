<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/controls.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12363794205a982811450757-77661480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '893d453d0e5b4f83a6a09fa8e5a3b28cf193904c' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/controls.tpl',
      1 => 1498036241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12363794205a982811450757-77661480',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cant_fields' => 0,
    'field' => 0,
    'num_col' => 0,
    'OPC_GLOBALS' => 0,
    'CONFIGS' => 0,
    'item' => 0,
    'num_col_option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982811542332_26843492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982811542332_26843492')) {function content_5a982811542332_26843492($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/vhosts/mundojunkers.es/httpdocs/tools/smarty/plugins/function.math.php';
?>
<?php echo smarty_function_math(array('assign'=>'num_col','equation'=>'12/a','a'=>$_smarty_tpl->tpl_vars['cant_fields']->value),$_smarty_tpl);?>


<div id="field_<?php if ($_smarty_tpl->tpl_vars['field']->value->object!='') {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->object,'htmlall','UTF-8');?>
_<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
     class="form-group col-xs-<?php echo intval($_smarty_tpl->tpl_vars['num_col']->value);?>
 <?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>required<?php }?> <?php if ($_smarty_tpl->tpl_vars['cant_fields']->value==1) {?>clear clearfix<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['field']->value->type_control==$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->textbox) {?>
        <label for="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->description,'htmlall','UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <input
            id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->id_control,'htmlall','UTF-8');?>
"
            name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
"
            type="<?php if ($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type}=='password'||$_smarty_tpl->tpl_vars['field']->value->name=='conf_passwd') {?>password<?php } else { ?>text<?php }?>"
            class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->classes,'htmlall','UTF-8');?>
 form-control input-sm not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
            data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
            data-validation="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->type,'htmlall','UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['field']->value->size!=0&&$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type}=='string') {?>,length<?php }?>"
            data-default-value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->default_value,'htmlall','UTF-8');?>
"
            data-required="<?php echo intval($_smarty_tpl->tpl_vars['field']->value->required);?>
"
            <?php if ($_smarty_tpl->tpl_vars['field']->value->name=='address'&&$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_AUTOCOMPLETE_GOOGLE_ADDRESS']) {?>autocomplete="off"<?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation-optional="true"<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message)&&$_smarty_tpl->tpl_vars['field']->value->error_message!='') {?>data-validation-error-msg="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->error_message,'htmlall','UTF-8');?>
"<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type}=='string') {?>data-validation-length="max<?php echo intval($_smarty_tpl->tpl_vars['field']->value->size);?>
"<?php }?>
            
        />
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control==$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->select) {?>
        <label for="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->description,'htmlall','UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <select
            id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->id_control,'htmlall','UTF-8');?>
"
            name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
"
            class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->classes,'htmlall','UTF-8');?>
 form-control input-sm not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
            data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
            data-default-value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->default_value,'htmlall','UTF-8');?>
"
            data-required="<?php echo intval($_smarty_tpl->tpl_vars['field']->value->required);?>
"
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message)&&$_smarty_tpl->tpl_vars['field']->value->error_message!='') {?>data-validation-error-msg="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->error_message,'htmlall','UTF-8');?>
"<?php }?>>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->options['empty_option'])&&$_smarty_tpl->tpl_vars['field']->value->options['empty_option']) {?>
                <option value="" data-text="" <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value=='') {?>selected<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['field']->value->name_control=='delivery_id'||$_smarty_tpl->tpl_vars['field']->value->name_control=='invoice_id') {?>
                        <?php echo smartyTranslate(array('s'=>'Create a new address','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>
....
                    <?php } else { ?>
                        --
                    <?php }?>
                </option>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->options['data'])) {?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value->options['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_options']['total'] = $_smarty_tpl->tpl_vars['item']->total;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <option
                        value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']],'htmlall','UTF-8');?>
"
                        data-text="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['description']],'htmlall','UTF-8');?>
"
                        <?php if ($_smarty_tpl->tpl_vars['field']->value->name=='id_country') {?>data-iso-code="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value['iso_code'],'htmlall','UTF-8');?>
"<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value==$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']]) {?>selected<?php }?>>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['description']],'htmlall','UTF-8');?>

                    </option>
                <?php } ?>
            <?php }?>
        </select>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control==$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->checkbox) {?>
        <label for="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
">
            <input
                id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->id_control,'htmlall','UTF-8');?>
"
                name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
"
                type="checkbox"
                class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->classes,'htmlall','UTF-8');?>
 not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
                <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value) {?>checked<?php }?>
                data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
                data-default-value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->default_value,'htmlall','UTF-8');?>
"
                data-required="<?php echo intval($_smarty_tpl->tpl_vars['field']->value->required);?>
"
                <?php if (!$_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation-optional="true"<?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message)&&$_smarty_tpl->tpl_vars['field']->value->error_message!='') {?>data-validation-error-msg="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->error_message,'htmlall','UTF-8');?>
"<?php }?>
            />
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->description,'htmlall','UTF-8');?>

        </label>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control==$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->radio) {?>
        <label>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->description,'htmlall','UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <div class="row">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value->options['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f_options']['total'] = $_smarty_tpl->tpl_vars['item']->total;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php echo smarty_function_math(array('assign'=>'num_col_option','equation'=>'12/a','a'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['f_options']['total']),$_smarty_tpl);?>

                <div class="col-xs-<?php echo intval($_smarty_tpl->tpl_vars['num_col_option']->value);?>
">
                    <label for="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
">
                        <input
                            id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->id_control,'htmlall','UTF-8');?>
_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']],'htmlall','UTF-8');?>
"
                            name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
                            type="radio"
                            class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->classes,'htmlall','UTF-8');?>
 not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
                            value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']],'htmlall','UTF-8');?>
"
                            <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value==$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']]) {?>checked<?php }?>
                            data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
                            data-required="<?php echo intval($_smarty_tpl->tpl_vars['field']->value->required);?>
"
                        />
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['description']],'htmlall','UTF-8');?>

                    </label>
                </div>
            <?php } ?>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control==$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->textarea) {?>
        <label for="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->description,'htmlall','UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <textarea
            id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->id_control,'htmlall','UTF-8');?>
"
            name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name_control,'htmlall','UTF-8');?>
"
            class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->classes,'htmlall','UTF-8');?>
 form-control input-sm not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
            data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->name,'htmlall','UTF-8');?>
"
            data-validation="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->type,'htmlall','UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['field']->value->size!=0) {?>,length<?php }?>"
            data-default-value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->default_value,'htmlall','UTF-8');?>
"
            data-required="<?php echo intval($_smarty_tpl->tpl_vars['field']->value->required);?>
"
            <?php if (!$_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation-optional="true"<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message)&&$_smarty_tpl->tpl_vars['field']->value->error_message!='') {?>data-validation-error-msg="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['field']->value->error_message,'htmlall','UTF-8');?>
"<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type}=='text') {?>data-validation-length="max<?php echo intval($_smarty_tpl->tpl_vars['field']->value->size);?>
"<?php }?>
            ></textarea>
    <?php }?>
</div>

<?php }} ?>
