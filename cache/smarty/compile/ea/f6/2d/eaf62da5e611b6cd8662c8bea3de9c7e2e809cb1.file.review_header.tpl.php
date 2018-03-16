<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:19:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:539684285a98281643fb56-65015890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaf62da5e611b6cd8662c8bea3de9c7e2e809cb1' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/onepagecheckoutps/views/templates/front/review_header.tpl',
      1 => 1498036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '539684285a98281643fb56-65015890',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'payment_modules_fee' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'cart' => 0,
    'js_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98281646a359_45438636',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98281646a359_45438636')) {function content_5a98281646a359_45438636($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['css_uri']->value,'html','UTF-8');?>
" type="text/css" media="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['media']->value,'html','UTF-8');?>
" />
    <?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['js_uri']->value,'html','UTF-8');?>
"></script>
    <?php } ?>
<?php }?>

<script type="text/javascript">
    var payment_modules_fee = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['payment_modules_fee']->value,'quotes','UTF-8');?>
;

    var currencySign = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['currencySign']->value,'html','UTF-8');?>
';
    var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
    var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
    var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
    var txtProduct = "<?php echo smartyTranslate(array('s'=>'product','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
";
    var txtProducts = "<?php echo smartyTranslate(array('s'=>'products','mod'=>'onepagecheckoutps','js'=>1),$_smarty_tpl);?>
";
    var deliveryAddress = <?php echo intval($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery);?>
;

    
    $(document).ready(function(){
        /*support some template that use live.*/
        $('.cart_quantity_up').die('click');
		$('.cart_quantity_down').die('click');
		$('.cart_quantity_delete').die('click');
        $('.megacart_quantity_up').die('click');
		$('.megacart_quantity_down').die('click');
		$('.megacart_quantity_delete').die('click');
    });
    
</script>

<script type="text/javascript" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['js_dir']->value,'htmlall','UTF-8');?>
cart-summary.js"></script>

<script type="text/javascript">
    

    setTimeout(function(){
        showLoadingAndAddEvent('.cart_quantity_up', function(){
            $('.cart_quantity_up').die('click').click(function(e){
                e.preventDefault();
                upQuantity($(this).attr('id').replace('cart_quantity_up_', ''));
                $('#' + $(this).attr('id').replace('_up_', '_down_')).removeClass('disabled');
            });
        });
        showLoadingAndAddEvent('.cart_quantity_down', function(){
            $('.cart_quantity_down').die('click').click(function(e){
                e.preventDefault();
                downQuantity($(this).attr('id').replace('cart_quantity_down_', ''));
            });
        });
        showLoadingAndAddEvent('.cart_quantity_delete', function(){
            $('.cart_quantity_delete').die('click').click(function(e){
                e.preventDefault();
                deleteProductFromSummary($(this).attr('id'));
            });
        });
        showLoadingAndAddEvent('.megacart_quantity_up', '');
        showLoadingAndAddEvent('.megacart_quantity_down', '');
        showLoadingAndAddEvent('.megacart_quantity_delete', '');

        updateCartSummary = function (json){
            if (typeof json !== typeof undefined){
                if (json.is_virtual_cart){
                    $('#onepagecheckoutps_step_two_container').remove();
                    $('#onepagecheckoutps_step_three_container').removeClass('col-md-6');

                    if (!OnePageCheckoutPS.SHOW_DELIVERY_VIRTUAL) {
                        $('#onepagecheckoutps_step_one #li_delivery_address').remove();
                        $('#onepagecheckoutps_step_one #li_invoice_address').addClass('active');
                        $('#onepagecheckoutps_step_one #delivery_address_container').remove();
                        $('#onepagecheckoutps_step_one #invoice_address_container').addClass('active');
                    }

                    OnePageCheckoutPS.IS_VIRTUAL_CART = true;

                    Payment.getByCountry();
                    Review.display();
                    //location.reload();
                }else{
                    if (typeof json.load === typeof undefined){
                        $('div#onepagecheckoutps #onepagecheckoutps_step_review_container .loading_small').show();

                        Carrier.getByCountry();
                    }
                }
            }
        }
    }, 1000);

	function showLoadingAndAddEvent(selector, event){
		var $selector = $(selector);

		if ($selector.length > 0){
			var events = $._data($selector[0], "events");

            if (typeof events === typeof undefined && typeof event == 'function'){
                event();
            }

			if (typeof events != typeof undefined){
				$.each(events, function(type, events) {
					if (type === 'click') {
						var original_events = [];
						$.each(events, function(e, event) {
							original_events.push(event.handler);
						});

						var new_event = function(e) {
							e.preventDefault();

							$('#onepagecheckoutps_step_review_container .loading_small').show();

							$(document).on('click', '.fancybox-close', function(){
								$('#onepagecheckoutps_step_review_container .loading_small').hide();
							});

							$(e.currentTarget).off(type, new_event);
							$.each(original_events, function(o, original_event) {
								$(e.currentTarget).on('click', original_event).trigger(type);
							});
						};

						$selector.off(type).on(type, new_event);
					}
				});
			}
		}
	}

    
</script><?php }} ?>
