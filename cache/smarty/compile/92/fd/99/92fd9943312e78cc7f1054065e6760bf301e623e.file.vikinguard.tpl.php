<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:37
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/vikinguard/views/templates/hook/vikinguard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8245819825a98232d10dc77-02685473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92fd9943312e78cc7f1054065e6760bf301e623e' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/vikinguard/views/templates/hook/vikinguard.tpl',
      1 => 1507910713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8245819825a98232d10dc77-02685473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'customer' => 0,
    'shop' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98232d1485d9_62181541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98232d1485d9_62181541')) {function content_5a98232d1485d9_62181541($_smarty_tpl) {?>
 
<script type="text/javascript">

var heimdalparam={};

var configCallBack = function(){
	BOOMR.init({
			beacon_url: "//eum.vikinguard.com"
	});
	BOOMR.addVar("customer","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['customer']->value,'htmlall','UTF-8');?>
");
	BOOMR.addVar("shop","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['shop']->value,'htmlall','UTF-8');?>
");
	BOOMR.addVar("version","PE<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['version']->value,'htmlall','UTF-8');?>
");
    info();
};


var info =function(){
	 for (key in heimdalparam){
    	BOOMR.addVar(key,heimdalparam[key]);
    
    }
};


var heimdaladdVar=function(key,value){
	heimdalparam[key]=value;
};


loadScript("//cdn.vikinguard.com/vikinguard.js", configCallBack);

function loadScript(u, c){
    var h = document.getElementsByTagName('head')[0];
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.src = u;
    s.onreadystatechange = c;
    s.onload = c;
    h.appendChild(s);
   
}
</script>
<?php }} ?>
