<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:29
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10280757705a982811382458-16180551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8febb6e176643884e6ada1324c3f0ae5afe6f066' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/steps/customer.tpl',
      1 => 1498036251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10280757705a982811382458-16180551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'register_customer' => 0,
    'classes' => 0,
    'CONFIGS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9828113a7130_06472810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9828113a7130_06472810')) {function content_5a9828113a7130_06472810($_smarty_tpl) {?>

<div id="onepagecheckoutps_step_one_container" class="<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['classes']->value,'htmlall','UTF-8');?>
<?php } else { ?>col-xs-12<?php }?>">
    <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
    <div id="onepagecheckoutps_step_one">
        <?php echo $_smarty_tpl->getSubTemplate ("./../address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <?php if ($_smarty_tpl->tpl_vars['register_customer']->value||$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_BUTTON_REGISTER']) {?>
            <div id="div_save_customer" class="row">
                <div class="col-xs-12">
                    <button type="button" id="btn_save_customer" class="btn btn-primary btn-block">
                        <i class="fa-pts fa-pts-save fa-pts-lg"></i>
                        <?php echo smartyTranslate(array('s'=>'Save information','mod'=>'onepagecheckoutps'),$_smarty_tpl);?>

                    </button>
                </div>
            </div>
        <?php }?>
    </div>
</div><?php }} ?>
