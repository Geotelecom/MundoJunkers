<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 17:00:00
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-tab-content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9148422225a9823808bcfa3-60143058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f96b8fee20ebd44b80ad3978a0eafafee4337d9a' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/netreviews//views/templates/hook/avisverifies-tab-content.tpl',
      1 => 1509971665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9148422225a9823808bcfa3-60143058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'snippets_complete' => 0,
    'product_description' => 0,
    'product_price' => 0,
    'product_name' => 0,
    'url_image' => 0,
    'product_url' => 0,
    'product_id' => 0,
    'sku' => 0,
    'brand_name' => 0,
    'mpn' => 0,
    'gtin_ean' => 0,
    'gtin_upc' => 0,
    'snippets_active' => 0,
    'modules_dir' => 0,
    'average_rate' => 0,
    'count_reviews' => 0,
    'widgetlight' => 0,
    'average_rate_percent' => 0,
    'url_certificat' => 0,
    'reviews' => 0,
    'i' => 0,
    'first' => 0,
    'review' => 0,
    'k_discussion' => 0,
    'discussion' => 0,
    'avisverifies_nb_reviews' => 0,
    'is_https' => 0,
    'base_dir_ssl' => 0,
    'base_dir' => 0,
    'nom_group' => 0,
    'id_shop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a982380966fa7_89277348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a982380966fa7_89277348')) {function content_5a982380966fa7_89277348($_smarty_tpl) {?><!--
* 2012-2017 NetReviews
*
*  @author    NetReviews SAS <contact@avis-verifies.com>
*  @copyright 2017 NetReviews SAS
*  @version   Release: $Revision: 7.4.2
*  @license   NetReviews
*  @date      16/10/2017
*  International Registered Trademark & Property of NetReviews SAS
-->


<div class="tab-pane tab_media" id="idTabavisverifies">
<?php if (($_smarty_tpl->tpl_vars['snippets_complete']->value=="1")) {?>
<div itemscope itemtype="http://schema.org/Product">
<meta itemprop="description" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product_description']->value),'htmlall','UTF-8');?>
">
   <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
      <meta itemprop="priceCurrency" content="EUR">
      <meta itemprop="price" content="<?php echo $_smarty_tpl->tpl_vars['product_price']->value;?>
">
      <link itemprop="availability" href="http://schema.org/InStock" />
   </span>
   <meta itemprop="name" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_name']->value,'htmlall','UTF-8');?>
" />
   <meta itemprop="image" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['url_image']->value,'htmlall','UTF-8');?>
" />
   <?php if ($_smarty_tpl->tpl_vars['product_url']->value) {?> 
      <meta itemprop="url" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_url']->value,'htmlall','UTF-8');?>
" />
   <?php }?>         
   <?php if ($_smarty_tpl->tpl_vars['product_id']->value) {?> 
      <meta itemprop="productID" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product_id']->value,'htmlall','UTF-8');?>
" />
   <?php }?>    
   <?php if ($_smarty_tpl->tpl_vars['sku']->value) {?> 
       <meta itemprop="sku" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sku']->value,'htmlall','UTF-8');?>
" />
   <?php }?>    
   <?php if ($_smarty_tpl->tpl_vars['brand_name']->value) {?> 
       <meta itemprop="brand" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['brand_name']->value,'htmlall','UTF-8');?>
" />
   <?php }?>       
   <?php if ($_smarty_tpl->tpl_vars['mpn']->value) {?> 
       <meta itemprop="mpn" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['mpn']->value,'htmlall','UTF-8');?>
" />
   <?php }?>    
   <?php if ($_smarty_tpl->tpl_vars['gtin_ean']->value) {?> 
       <meta itemprop="gtin8" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['gtin_ean']->value,'htmlall','UTF-8');?>
" />
   <?php }?>   
   <?php if ($_smarty_tpl->tpl_vars['gtin_upc']->value) {?> 
       <meta itemprop="gtin12" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['gtin_upc']->value,'htmlall','UTF-8');?>
" />
   <?php }?>  
<?php }?>


	<style type="text/css">
		.groupAvis{
			display: none;
		}
	</style>

	<div id="headerAV"><?php echo smartyTranslate(array('s'=>'Product Reviews','mod'=>'netreviews'),$_smarty_tpl);?>
</div>
	<div id="under-headerAV"  <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" <?php }?> style="background: url(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['modules_dir']->value,'htmlall','UTF-8');?>
netreviews/views/img/<?php echo smartyTranslate(array('s'=>'Sceau_100_en.png','mod'=>'netreviews'),$_smarty_tpl);?>
) no-repeat #f1f1f1;background-size:45px 45px;background-repeat:no-repeat;">
     <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> 
          <meta itemprop= "ratingValue" content= "<?php echo floatval($_smarty_tpl->tpl_vars['average_rate']->value);?>
">
          <meta itemprop= "bestRating" content= "5">
          <meta itemprop= "worstRating" content= "1">
     <?php }?>
	   <ul id="aggregateRatingAV">
	      <li>
	         <b>
	         <?php echo smartyTranslate(array('s'=>'Number of Reviews','mod'=>'netreviews'),$_smarty_tpl);?>

	         </b> : 
                  <span <?php if ($_smarty_tpl->tpl_vars['snippets_active']->value) {?> itemprop="reviewCount"<?php }?> class="reviewCount">
                   <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['count_reviews']->value,'htmlall','UTF-8');?>

                  </span>
	      </li>
	      <li>
	         <b><?php echo smartyTranslate(array('s'=>'Average Grade','mod'=>'netreviews'),$_smarty_tpl);?>
</b> : <?php echo floatval($_smarty_tpl->tpl_vars['average_rate']->value);?>
 /5 

           <!-- netreviews product widget new /netreviews stars -->
            <?php if (($_smarty_tpl->tpl_vars['widgetlight']->value=='2'||$_smarty_tpl->tpl_vars['widgetlight']->value=='1')) {?>
                     <div class="netreviewsProductWidgetNewRatingWrapper">
                         <div class="netreviewsProductWidgetNewRatingInner" style="width:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['average_rate_percent']->value,'htmlall','UTF-8');?>
%"></div>
                      </div>
           <!--  netreviews product widget -->
            <?php } elseif (($_smarty_tpl->tpl_vars['widgetlight']->value=='3')) {?>
                    <div class="ratingWrapper">
                            <div class="ratingInner" style="width:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['average_rate_percent']->value,'htmlall','UTF-8');?>
%"></div>
                    </div>
            <?php }?>

	      </li>
	   </ul>
	   <ul id="certificatAV">
	      <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['url_certificat']->value,'htmlall','UTF-8');?>
" target="_blank" class="display_certificat_review" ><?php echo smartyTranslate(array('s'=>'Show the attestation of Trust','mod'=>'netreviews'),$_smarty_tpl);?>
</a></li>
	   </ul>
	   <div class="clear"></div>
	</div>

	<div id="ajax_comment_content">

		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['first'] = new Smarty_variable(true, null, 0);?>

		<?php  $_smarty_tpl->tpl_vars['review'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['review']->_loop = false;
 $_smarty_tpl->tpl_vars['k_review'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['reviews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['review']->key => $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->_loop = true;
 $_smarty_tpl->tpl_vars['k_review']->value = $_smarty_tpl->tpl_vars['review']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['i']->value==1&&!$_smarty_tpl->tpl_vars['first']->value) {?>
				<span class="groupAvis">
			<?php }?>
			<div class="reviewAV">
				<ul class="reviewInfosAV">
					<li style="text-transform:capitalize"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['customer_name'],'htmlall','UTF-8');?>
</li>
					<li>&nbsp;<?php echo smartyTranslate(array('s'=>'the','mod'=>'netreviews'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['horodate'],'htmlall','UTF-8');?>
</li>
					<li class="rateAV">
  		   <!-- netreviews product widget new /netreviews stars -->
            <?php if (($_smarty_tpl->tpl_vars['widgetlight']->value=='2'||$_smarty_tpl->tpl_vars['widgetlight']->value=='1')) {?>
             <div class="netreviewsProductWidgetNewRatingWrapper">
                 <div class="netreviewsProductWidgetNewRatingInner" style="width:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['rate_percent'],'htmlall','UTF-8');?>
%"></div>
              </div>
           <!--  netreviews product widget -->
            <?php } elseif (($_smarty_tpl->tpl_vars['widgetlight']->value=='3')) {?>
                <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['modules_dir']->value,'htmlall','UTF-8');?>
netreviews/views/img/etoile<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['rate'],'htmlall','UTF-8');?>
.png" width="80" height="15" alt=""/> 
            <?php }?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['rate'],'htmlall','UTF-8');?>
/5
					</li>
				</ul>

				<div class="triangle-border top"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['avis'],'htmlall','UTF-8');?>
</div>

			<?php if ($_smarty_tpl->tpl_vars['review']->value['discussion']) {?>
				<?php  $_smarty_tpl->tpl_vars['discussion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discussion']->_loop = false;
 $_smarty_tpl->tpl_vars['k_discussion'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['review']->value['discussion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discussion']->key => $_smarty_tpl->tpl_vars['discussion']->value) {
$_smarty_tpl->tpl_vars['discussion']->_loop = true;
 $_smarty_tpl->tpl_vars['k_discussion']->value = $_smarty_tpl->tpl_vars['discussion']->key;
?>

				<div class="triangle-border top answer" <?php if ($_smarty_tpl->tpl_vars['k_discussion']->value>0) {?> review_number=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
 style= "display: none" <?php }?>>

					<span>&rsaquo; <?php echo smartyTranslate(array('s'=>'Comment from','mod'=>'netreviews'),$_smarty_tpl);?>
  <b style="text-transform:capitalize;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['discussion']->value['origine'],'htmlall','UTF-8');?>
</b> <?php echo smartyTranslate(array('s'=>'the','mod'=>'netreviews'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['discussion']->value['horodate'],'htmlall','UTF-8');?>
</span>
					<p class="answer-bodyAV"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['discussion']->value['commentaire'],'htmlall','UTF-8');?>
</p>

				</div>

				<?php } ?>

				<?php if ($_smarty_tpl->tpl_vars['k_discussion']->value>0) {?>
					<a href="javascript:switchCommentsVisibility('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
')" id="display<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
" class="display-all-comments" review_number=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
 ><?php echo smartyTranslate(array('s'=>'Show exchanges','mod'=>'netreviews'),$_smarty_tpl);?>
</a>

					<a href="javascript:switchCommentsVisibility('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
')" style="display: none;" id="hide<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
" class="display-all-comments" review_number=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['review']->value['id_product_av'],'htmlall','UTF-8');?>
 ><?php echo smartyTranslate(array('s'=>'Hide exchanges','mod'=>'netreviews'),$_smarty_tpl);?>
</a>
					</a>
			  	<?php }?>
			<?php }?>

			</div>
			<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['avisverifies_nb_reviews']->value&&!$_smarty_tpl->tpl_vars['first']->value) {?>
				</span>
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
			<?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['avisverifies_nb_reviews']->value&&$_smarty_tpl->tpl_vars['first']->value) {?>
                    <?php $_smarty_tpl->tpl_vars['first'] = new Smarty_variable(false, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                <?php }?>
			<?php }?>

		<?php } ?>


	</div>
	<img src="<?php if ($_smarty_tpl->tpl_vars['is_https']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['base_dir_ssl']->value,'htmlall','UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['base_dir']->value,'htmlall','UTF-8');?>
<?php }?>modules/netreviews/views/img/pagination-loader.gif" id="av_loader" style="display:none" alt="" />
	<?php if ($_smarty_tpl->tpl_vars['count_reviews']->value>$_smarty_tpl->tpl_vars['avisverifies_nb_reviews']->value) {?>
		<a href="#" id="av_load_comments" class="av-btn-morecomment" rel="1"><?php echo smartyTranslate(array('s'=>'More reviews...','mod'=>'netreviews'),$_smarty_tpl);?>
</a>
	<?php }?>


<script data-keepinline="true" type="text/javascript">


function avLoadCommentsPagination() {


    if(typeof jQuery !== 'undefined') {

        $('#av_load_comments').live("click", function(){

            vnom_group = <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['nom_group']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if (!empty($_tmp1)) {?><?php echo $_smarty_tpl->tpl_vars['nom_group']->value;?>
<?php } else { ?>0<?php }?> ;
            vid_shop = <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['id_shop']->value,'htmlall','UTF-8');?>
<?php $_tmp2=ob_get_clean();?><?php if (!empty($_tmp2)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['id_shop']->value,'htmlall','UTF-8');?>
<?php } else { ?>0<?php }?> ;

            counted_reviews = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['count_reviews']->value,'htmlall','UTF-8');?>
;
            maxpage = Math.ceil(counted_reviews / <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['avisverifies_nb_reviews']->value,'htmlall','UTF-8');?>
) ;

            console.log(counted_reviews);
            console.log(maxpage);

            if($('.groupAvis:hidden').first().length !== 0){
                $('.groupAvis:hidden').first().css({ visibility: "visible", display: "block" });

                console.log($(this).attr('rel'));
                console.log(maxpage);

                $(this).attr('rel',parseInt($(this).attr('rel')) + 1 );
                if(maxpage == parseInt($(this).attr('rel')) && $('.groupAvis:hidden').length === 0){
                    $(this).hide();
                }

                return false;
            }

            $.ajax({
                url: "<?php if ($_smarty_tpl->tpl_vars['is_https']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['base_dir_ssl']->value,'htmlall','UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['base_dir']->value,'htmlall','UTF-8');?>
<?php }?>modules/netreviews/ajax-load.php",
                type: "POST",
                data: {p : $(this).attr('rel'), id_product : $('input[name="id_product"]').val(), count_reviews : counted_reviews, id_shop : vid_shop, nom_group : vnom_group, avisverifies_nb_reviews : <?php echo $_smarty_tpl->tpl_vars['avisverifies_nb_reviews']->value;?>
},
                beforeSend: function() {
                    backup_content = $("#ajax_comment_content").html();
                   // $("#ajax_comment_content").slideUp().empty();
                   $('#av_loader').show();
                },
                success: function( html ){
                  //  $("#ajax_comment_content").empty();
                  $('#av_loader').hide();
                    $("#ajax_comment_content").append(html);
                    $('#av_load_comments').attr('rel', parseInt($('#av_load_comments').attr('rel')) + 1);
                    if(maxpage == parseInt($('#av_load_comments').attr('rel')) && $('.groupAvis:hidden').length === 0){
                        $('#av_load_comments').hide();
                    }
                },
                error: function ( jqXHR, textStatus, errorThrown ){
                    alert('something went wrong...');
                    $("#ajax_comment_content").html( backup_content );
                }
            });
            return false;
        });

    }
    else {
        setTimeout(function(){avLoadCommentsPagination();},1000);
    }
        
}

avLoadCommentsPagination();


</script>

    <?php if (($_smarty_tpl->tpl_vars['snippets_complete']->value=="1")) {?>
    </div> <!-- End product --> 
    <?php }?>
</div>
<?php }} ?>
