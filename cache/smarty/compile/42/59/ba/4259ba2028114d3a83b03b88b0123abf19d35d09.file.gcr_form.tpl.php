<?php /* Smarty version Smarty-3.1.19, created on 2018-03-12 10:34:34
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/modules/googlecategoryrating/views/templates/admin/gcr_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7437948435aa649aaef7ac7-37182431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4259ba2028114d3a83b03b88b0123abf19d35d09' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/modules/googlecategoryrating/views/templates/admin/gcr_form.tpl',
      1 => 1493214816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7437948435aa649aaef7ac7-37182431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rating_disabled' => 0,
    'from_comments_module' => 0,
    'module_productcomment_enabled' => 0,
    'comment_number' => 0,
    'avg' => 0,
    'var' => 0,
    'rating_value' => 0,
    'rating_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5aa649ab009b00_07604621',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa649ab009b00_07604621')) {function content_5aa649ab009b00_07604621($_smarty_tpl) {?>
<div class="form-group">
	<label class="control-label col-lg-3">
	Ratings
	</label>
	<div class="col-lg-9">
		<div class="form-group">
			<div class="col-lg-12">
				<div class="product-tab">
					<div class="row">
						<div class="col-md-12">
							<div class="container-fluid">
								<div class="checkbox">
									<label for="rating_disabled"><input type="checkbox" name="rating_disabled" id="rating_disabled" value="1" <?php if (!empty($_smarty_tpl->tpl_vars['rating_disabled']->value)) {?> checked <?php }?>/>
									<?php echo smartyTranslate(array('s'=>'Disable category rating','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
</label>
								</div>

								<div id="div_rating_enabled" <?php if (!empty($_smarty_tpl->tpl_vars['rating_disabled']->value)) {?> style="display:none;" <?php }?>>
									<div class="checkbox">
										<label for="from_comments_module"><input type="checkbox" name="from_comments_module" id="from_comments_module" value="1" <?php if (!empty($_smarty_tpl->tpl_vars['from_comments_module']->value)) {?> checked <?php }?>/>
										<?php echo smartyTranslate(array('s'=>'Get information from real category rating','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
</label><br/>
									</div>

									<div id="comments_module_info" <?php if (empty($_smarty_tpl->tpl_vars['from_comments_module']->value)) {?> style="display:none;" <?php }?>>
										<?php if (!empty($_smarty_tpl->tpl_vars['module_productcomment_enabled']->value)) {?>
											<?php if ($_smarty_tpl->tpl_vars['comment_number']->value>0) {?>
												<?php if (isset($_smarty_tpl->tpl_vars['avg']->value)&&isset($_smarty_tpl->tpl_vars['comment_number']->value)) {?>
													<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
														<?php echo smartyTranslate(array('s'=>'Average rating (out of 5)','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
 : <b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['avg']->value,'htmlall','UTF-8');?>
</b> . <?php echo smartyTranslate(array('s'=>'Number of reviews','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
: <b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['comment_number']->value,'htmlall','UTF-8');?>
</b>
													</div>
												<?php } else { ?>
													<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>
														<?php echo smartyTranslate(array('s'=>'Cannot retreive category ratings','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
		
													</div>
												<?php }?>
											<?php } else { ?>
												<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
													<?php echo smartyTranslate(array('s'=>'This category has not yet been evaluated','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
	
												</div>
											<?php }?>
										<?php } else { ?>
											<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
												<?php echo smartyTranslate(array('s'=>'Install product comments module first','mod'=>'googlecategoryrating'),$_smarty_tpl);?>

											</div>
										<?php }?>
									</div>
									<div id="div_manual_rating" <?php if (!empty($_smarty_tpl->tpl_vars['from_comments_module']->value)) {?> style="display:none;" <?php }?>>
										<div class="row col-md-12">
											<div class="row form-group">
												<div class="col-xs-12 col-md-3">
													<label class="form-control-label"><?php echo smartyTranslate(array('s'=>'Average rating (out of 5)','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
</label>
													<select name="rating_value" class="form-control"> 
													<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 50+1 - (0) : 0-(50)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['var']->value/$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(10,'htmlall','UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['rating_value']->value)&&$_smarty_tpl->tpl_vars['rating_value']->value==($_smarty_tpl->tpl_vars['var']->value/10)) {?> SELECTED <?php }?> ><?php echo $_smarty_tpl->tpl_vars['var']->value/$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS(10,'htmlall','UTF-8');?>
</option>
													<?php }} ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row col-md-12">
											<div class="row form-group">
												<div class="col-xs-12 col-md-3">
													<label class="form-control-label"><?php echo smartyTranslate(array('s'=>'Number of reviews','mod'=>'googlecategoryrating'),$_smarty_tpl);?>
</label>
													<input name="rating_count" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['rating_count']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['rating_count']->value,'htmlall','UTF-8');?>
<?php }?>" class="form-control" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="alert alert-info" role="alert">
													<p>
													<?php echo smartyTranslate(array('s'=>'If productcomments module is not installed, the ratings have to be collected from other external modules or through alternative methods and entered manually given that it is not synchronised with that module.','mod'=>'googlecategoryrating'),$_smarty_tpl);?>

													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<script>
					$(document).ready(function(){
						$('#from_comments_module').change(function(){
							$('#div_manual_rating').toggle();
							$('#comments_module_info').toggle();
						});
						$('#rating_disabled').change(function(){
							$('#div_rating_enabled').toggle();
						});
					});
					</script>
					
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
