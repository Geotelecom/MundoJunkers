<?php $vc_manager = vc_manager();?>
<div class="vc_column-offset" data-column-offset="true">
	<?php if(vc_settings()->get( 'not_responsive_css' ) === '1'): ?>
  	<div class="wpb_alert wpb_content_element vc_alert_rounded wpb_alert-warning">
		<div class="messagebox_text">
			<p><?php printf($vc_manager->l('Responsive design settings are currently disabled. You can enable them in Visual Composer <a href="%s">settings page</a> by unchecking "Disable responsive content elements".'), admin_url( 'options-general.php?page=vc_settings' ) ) ?></p>
		</div>
  	</div>
  	<?php endif; ?>
	<input name="<?php $vc_manager->esc_attr_e($settings['param_name']) ?>" class="wpb_vc_param_value <?php $vc_manager->esc_attr_e($settings['param_name']) ?>
	<?php $vc_manager->esc_attr_e($settings['type']) ?> '_field" type="hidden" value="<?php $vc_manager->esc_attr_e( $value ) ?>" />
	<table class="vc_table vc_column-offset-table">
		<tr>
			<th>
				<?php echo $vc_manager->l('Device') ?>
			</th>
			<th>
				<?php echo $vc_manager->l('Offset') ?>
			</th>
			<th>
				<?php echo $vc_manager->l('Width') ?>
			</th>
			<th>
				<?php echo $vc_manager->l('Hide on device?') ?>
			</th>
		</tr>
		<?php foreach($sizes as $key => $size): ?>
		<tr class="vc_size-<?php echo $key ?>">
			<td class="vc_screen-size vc_screen-size-<?php echo $key ?>">
				<span class="vc_icon" title="<?php echo $size ?>"></span>
			</td>
			<td>
				<?php echo $param->offsetControl($key) ?>
			</td>
			<td>
				<?php echo $param->sizeControl($key) ?>
			</td>
			<td>
				<label>
					<input type="checkbox" name="vc_hidden-<?php echo $key ?>" value="yes"<?php echo in_array('vc_hidden-'.$key, $data) ? ' checked="true"' : '' ?> class="vc_column_offset_field">
					<?php echo $vc_manager->l('Hide') ?>
				</label>
			</td>
		</tr>
  		<?php endforeach; ?>
	</table>
</div>
<script type="text/javascript">
	window.VcI8nColumnOffsetParam = <?php echo json_encode(array(
		'inherit' =>$vc_manager->l('Inherit: '),
		'inherit_default' =>$vc_manager->l('Inherit from default')
	)) ?>
</script>