<?php /* Smarty version Smarty-3.1.19, created on 2018-03-03 16:31:59
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/financiacion/views/templates/hook/payment_return.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20569575285a9abfef330328-55649757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a1558c5385daf5eba5c104c26645b6a8043da11' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/financiacion/views/templates/hook/payment_return.tpl',
      1 => 1517474705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20569575285a9abfef330328-55649757',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'total_to_pay_ga' => 0,
    'shop_name' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9abfef3b1a23_99858855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9abfef3b1a23_99858855')) {function content_5a9abfef3b1a23_99858855($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['status']->value=='ok') {?>
<!-- Google Code for Conversiones en el Sitio Web Conversion Page -->
<script type="text/javascript" data-keepinline="true">
/* <![CDATA[ */
var google_conversion_id = 831463243;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "GFnICPGg_nUQy768jAM";
var google_conversion_value = <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_to_pay_ga']->value);?>
;
var google_conversion_currency = "EUR";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" data-keepinline="true" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/831463243/?value=<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_to_pay_ga']->value);?>
&amp;currency_code=EUR&amp;label=GFnICPGg_nUQy768jAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<p><?php echo smartyTranslate(array('s'=>'Su pedido en %s se ha completado.','sprintf'=>$_smarty_tpl->tpl_vars['shop_name']->value,'mod'=>'financiacion'),$_smarty_tpl);?>

<br/><?php echo smartyTranslate(array('s'=>'Ha elegido pago por Financiación','mod'=>'financiacion'),$_smarty_tpl);?>
<br/><br/>
<?php echo smartyTranslate(array('s'=>'Las tramitamos on line únicamente mediante el Banc de Sabadell .Puesto que vendemos por toda España, las financiaciones las tramitamos de forma virtual. Aunque el cliente que pretende financiar no trabaje con ellos, ésto no supone ningún inconveniente.','mod'=>'financiacion'),$_smarty_tpl);?>
</p>

<p><?php echo smartyTranslate(array('s'=>'Le pasamos al cliente una simulación como la que le adjunto al mismo, y éste nos indica el plazo escogido. Puede ser a 6 / 9 /12 /15 meses  sin interés, sólo diferentes % en concepto de comisión de apertura según los meses a financiar o hasta 60 meses con intereses, en una llamada telefónica nos dicen si está aprobada o no .','mod'=>'financiacion'),$_smarty_tpl);?>
</p>

<p><?php echo smartyTranslate(array('s'=>'Como la tramitación se hace de forma virtual, la entidad financiera envía al titutar solicitante un código pin de 6 dígitos, al móvil que facilita el cliente, y éste me lo tiene que hacer llegar a mí para introducirlo en su sistema, de esta manera queda firmado el contrato de financiación, que previamente se ha facilitado mediante correo electrónico para que lo pueda revisar el cliente antes de firmar.','mod'=>'financiacion'),$_smarty_tpl);?>
</p>

<p><?php echo smartyTranslate(array('s'=>'Adjunto una simulación de un importe "x" para que pueda ver como quedarían las cuotas a diferentes meses y al ser un excell, se modificar el importe a financiar  ','mod'=>'financiacion'),$_smarty_tpl);?>
</p>

<p><?php echo smartyTranslate(array('s'=>'También adjuntamos un documento que nos tiene que cumplimentar el cliente y firmarlo como Solicitante de la financiación. ','mod'=>'financiacion'),$_smarty_tpl);?>
</p>

<p><?php echo smartyTranslate(array('s'=>'La entidad lo envía al domicilio por correo ordinario transcurridos 15 días. ','mod'=>'financiacion'),$_smarty_tpl);?>
</p>

<p><?php echo smartyTranslate(array('s'=>'Documentación que precisamos que el cliente nos haga llegar escaneada al correo','mod'=>'financiacion'),$_smarty_tpl);?>
 <strong><?php echo smartyTranslate(array('s'=>'b.martinez@climahorro.es / info@climahorro.es:','mod'=>'financiacion'),$_smarty_tpl);?>
</strong></p><br/>

<h2><?php echo smartyTranslate(array('s'=>'DOCUMENTOS NECESARIOS PARA TRAMITAR LA FINANCIACIÓN:','mod'=>'financiacion'),$_smarty_tpl);?>
</h2>
<p>
<ul>
	<li><?php echo smartyTranslate(array('s'=>'D.N.I. EN VIGOR POR LAS DOS CARAS','mod'=>'financiacion'),$_smarty_tpl);?>
</li>

<li><?php echo smartyTranslate(array('s'=>'JUSTIFICANTE BANCARIO PARA EL CARGO DE LAS CUOTAS (20 DÍGITOS QUE APAREZCA EL MISMO TITULAR QUE SOLICITA FINANCIACIÓN)','mod'=>'financiacion'),$_smarty_tpl);?>
/li>

<li><?php echo smartyTranslate(array('s'=>'JUSTIFICANTE DE INGRESOS ( ÚLTIMA NÓMINA)','mod'=>'financiacion'),$_smarty_tpl);?>
/li>

<li><?php echo smartyTranslate(array('s'=>'ESTADO CIVIL DEL SOLICITANTE: ','mod'=>'financiacion'),$_smarty_tpl);?>
/li>

<li><?php echo smartyTranslate(array('s'=>'SITUACIÓN DE LA VIVIENDA -','mod'=>'financiacion'),$_smarty_tpl);?>
<br/>
	<?php echo smartyTranslate(array('s'=>'*  EN PROPIEDAD (CON HIPOTECA) IMPORTE APROX.','mod'=>'financiacion'),$_smarty_tpl);?>
 <br/>
	<?php echo smartyTranslate(array('s'=>'*  EN ALQUILER (IMPORTE APROX.)','mod'=>'financiacion'),$_smarty_tpl);?>
</li>

<li><?php echo smartyTranslate(array('s'=>'RELLENAR EL IMPRESO DE LA ENTIDAD BS FINANCIERA ADJUNTO','mod'=>'financiacion'),$_smarty_tpl);?>
</li>
</ul>
</p>
		<br /><br /><?php echo smartyTranslate(array('s'=>'If you have questions, comments or concerns, please contact our','mod'=>'financiacion'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'html');?>
"><?php echo smartyTranslate(array('s'=>'expert customer support team','mod'=>'financiacion'),$_smarty_tpl);?>
</a>.
	</p>
<?php } else { ?>
	<p class="warning">
		<?php echo smartyTranslate(array('s'=>'We noticed a problem with your order. If you think this is an error, feel free to contact our','mod'=>'financiacion'),$_smarty_tpl);?>
 
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'html');?>
"><?php echo smartyTranslate(array('s'=>'expert customer support team','mod'=>'financiacion'),$_smarty_tpl);?>
</a>.
	</p>
<?php }?>
<?php }} ?>
