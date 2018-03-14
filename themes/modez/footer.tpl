{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if !$content_only}
					</div><!-- #center_column -->
					{if isset($right_column_size) && !empty($right_column_size)}
						<div id="right_column" class="col-xs-12 col-sm-{$right_column_size|intval} column">{$HOOK_RIGHT_COLUMN}</div>
					{/if}
					</div><!-- .row -->				
				</div><!-- #columns -->
                    {if $page_name != 'index'}
                    <div style="clear:both;">&nbsp;</div>
                    <div class="container">
                        <div id="bottom_center_column" class="center_column col-xs-12 col-sm-12">
                        {hook h="preFooter"}
                        </div>
                    </div>
                    {/if}					
			</div><!-- .columns-container -->
			<!-- Footer -->
			{*}<a id="contacto" href="{$link->getPageLink('contact-form', true)|escape:'html'}&content_only=1" rel="follow">{l s='¿Necesitas ayuda?'}</a>
			<script type="text/javascript">
			 	$("a#contacto").fancybox({
		      		'type' : 'iframe',
		      		'width':600, 
		      	});
			</script>{*}
			<div class="footer-wrapper">
                <div class="footer_topline_bg"></div>
                <div class="footer_bottomline_bg"></div>
				<footer id="footer"  class="container">
					<div class="row displayresp">
					<div class="modezuparrow"><a class="modezuparrow_link" href="#page" title="Subir - {$meta_title|escape:'html':'UTF-8'}"><span></span></a></div>
                    {$HOOK_FOOTER}
                    {literal}
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
                    {/literal}
                        <div id="copyright_footer">
                            <div><ul><li>{if isset($roythemes.copyright_text)} {$roythemes.copyright_text} {/if}</li></ul></div>
                        </div>
                    </div>
				</footer>
			</div><!-- #footer -->
		</div><!-- #page -->
{/if}
{include file="$tpl_dir./global.tpl"}
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
</html>