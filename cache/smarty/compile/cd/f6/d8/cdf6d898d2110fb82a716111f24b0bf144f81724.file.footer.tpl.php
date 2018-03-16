<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:47
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8073617805a982337148581-58815365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdf6d898d2110fb82a716111f24b0bf144f81724' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/footer.tpl',
      1 => 1508248451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8073617805a982337148581-58815365',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'right_column_size' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'page_name' => 0,
    'meta_title' => 0,
    'HOOK_FOOTER' => 0,
    'roythemes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a9823371a6055_55868055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9823371a6055_55868055')) {function content_5a9823371a6055_55868055($_smarty_tpl) {?>
<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
					</div><!-- #center_column -->
					<?php if (isset($_smarty_tpl->tpl_vars['right_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['right_column_size']->value)) {?>
						<div id="right_column" class="col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['right_column_size']->value);?>
 column"><?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>
</div>
					<?php }?>
					</div><!-- .row -->				
				</div><!-- #columns -->
                    <?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index') {?>
                    <div style="clear:both;">&nbsp;</div>
                    <div class="container">
                        <div id="bottom_center_column" class="center_column col-xs-12 col-sm-12">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"preFooter"),$_smarty_tpl);?>

                        </div>
                    </div>
                    <?php }?>					
			</div><!-- .columns-container -->
			<!-- Footer -->
			
			<div class="footer-wrapper">
                <div class="footer_topline_bg"></div>
                <div class="footer_bottomline_bg"></div>
				<footer id="footer"  class="container">
					<div class="row displayresp">
					<div class="modezuparrow"><a class="modezuparrow_link" href="#page" title="Subir - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['meta_title']->value,'html','UTF-8');?>
"><span></span></a></div>
                    <?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

                    
                    <script>

                    	$(document).ready(function(){

                    		if ($(window).width()<480){

                    			
                    			//desplegable filtre productes
                    			$('#layered_block_left .title_block').append('<span class="pull-right"><i class="icon-angle-down"></i> </span>');

								$(document).on('click','#layered_block_left .title_block', function(e){
									e.preventDefault();								
									if($('#layered_block_left .block_content').is(':visible'))	{
										$('#layered_block_left .title_block').find('i').toggleClass('icon-angle-down icon-angle-up');
										$('#layered_block_left .block_content').hide('slow');
									} else {
										$('#layered_block_left .title_block').find('i').toggleClass('icon-angle-up icon-angle-down');									
										$('#layered_block_left .block_content').show('slow');
									}
								}); 

								$('.content_sortPagiBar:last').after('<div id="bannerinf"></div>');

								//moure mes vistos fitxa producte
								$('#viewed-products_block_left').appendTo('#bannerinf');

								//moure banners sota fitxa producte
								$('#htmlcontent_left').appendTo('#bannerinf');


								//desplegables els blocs del peu 
								$('#block_myaccount_footer h4').append('<span class="pull-right"><i class="icon-chevron-down"></i></span>');



								//moure compartir a sota fitxa producte
								$('.socialsharing_product').appendTo('#more_info_block');




								$(document).on('click','#block_myaccount_footer h4', function(e){
									e.preventDefault();								
									if($('#block_myaccount_footer').find('div').is(':visible'))	{
										$('#block_myaccount_footer').find('i').toggleClass('icon-chevron-down icon-chevron-up');
										$('#block_myaccount_footer').find('div').hide('slow');
									} else {
										$('#block_myaccount_footer').find('i').toggleClass('icon-chevron-up icon-chevron-down');									
										$('#block_myaccount_footer').find('div').show('slow');
									}

								}); 

								$('.blockcategories_footer h4').append('<span class="pull-right"><i class="icon-chevron-down"></i></span>');

								$(document).on('click','.blockcategories_footer h4', function(e){
									e.preventDefault();								
									if($('.blockcategories_footer').find('div').is(':visible'))	{
										$('.blockcategories_footer').find('i').toggleClass('icon-chevron-down icon-chevron-up');	
										$('.blockcategories_footer').find('div').hide('slow');
									} else {
										$('.blockcategories_footer').find('i').toggleClass('icon-chevron-down icon-chevron-up');						
										$('.blockcategories_footer').find('div').show('slow');
									}
								}); 

								$('#block_various_links_footer h4').append('<span class="pull-right"><i class="icon-chevron-down"></i></span>');					
								$(document).on('click','#block_various_links_footer h4', function(e){
									e.preventDefault();																
									if($('#block_various_links_footer').find('ul').is(':visible'))	{
										$('#block_various_links_footer').find('i').toggleClass('icon-chevron-down icon-chevron-up');					
										$('#block_various_links_footer').find('ul').hide('slow');
									} else {
										$('#block_various_links_footer').find('i').toggleClass('icon-chevron-down icon-chevron-up');					
									 	$('#block_various_links_footer').find('ul').show('slow');
									}
								}); 

								$('#block_contact_infos h4').append('<span class="pull-right"><i class="icon-chevron-down"></i></span>');					
								$(document).on('click','#block_contact_infos h4', function(e){								
									e.preventDefault();																
									if($('#block_contact_infos').find('ul').is(':visible'))	{
										$('#block_contact_infos').find('i').toggleClass('icon-chevron-down icon-chevron-up');
										$('#block_contact_infos').find('ul').hide('slow');
									} else {
										$('#block_contact_infos').find('i').toggleClass('icon-chevron-down icon-chevron-up');
										$('#block_contact_infos').find('ul').show('slow');															
									}
								});
							} 
						}); 

					</script>
                    
                        <div id="copyright_footer">
                            <div><ul><li><?php if (isset($_smarty_tpl->tpl_vars['roythemes']->value['copyright_text'])) {?> <?php echo $_smarty_tpl->tpl_vars['roythemes']->value['copyright_text'];?>
 <?php }?></li></ul></div>
                        </div>
                    </div>
				</footer>
			</div><!-- #footer -->
		</div><!-- #page -->
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./global.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59e607684854b82732ff6151/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	</body>
</html><?php }} ?>
