<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<script>
	jQuery(document).ready(function()
	{
		jQuery(".form-tags").hide();
		jQuery(".add").hide();
		jQuery(".tag-widget").hover(
			function () {
    			jQuery(".form-tags", this).show();
    			jQuery(".add", this).show();
 				 }, 
 			function () {
    			jQuery(".form-tags", this).hide();
    			jQuery(".add", this).hide();
  			});
  		jQuery(".talent_area").hover(
			function () {
    			jQuery(".talent_abstract", this).show();
 				 }, 
 			function () {
    			jQuery(".talent_abstract", this).hide();
  			});
	}); 
</script>
<?php
if (!function_exists('get_trade_status_str'))
{
	function get_trade_status_str($str)
	{
		return substr($str, strpos($str, '>')+1, -7);
	}
}
?>
<div>
	<?php print _community_tags_node_view($fields['nid']->raw, TRUE); ?>
</div>
<div>
	<?php if (get_trade_status_str($fields['field_trade_status']->content) == 'offer邀请'): ?>	
	<div style="width:50px; display:inline-block" class="offer_invite trade_status">
		<?php print 'offer<br />邀请' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '交易成功'): ?>
	<div style="width:50px; display:inline-block" class="trade_success trade_status">
		<?php print '交易<br />成功' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '已到岗'): ?>
	<div style="width:50px; display:inline-block" class="on_position trade_status">
		<?php print '已<br />到岗' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '拒绝offer'): ?>
	<div style="width:50px; display:inline-block" class="offer_reject trade_status">
		<?php print '拒绝<br />offer' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '拒绝面试'): ?>
	<div style="width:50px; display:inline-block" class="interview_reject trade_status">
		<?php print '拒绝<br />面试' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '接受offer'): ?>
	<div style="width:50px; display:inline-block" class="offer_accept trade_status">
		<?php print '接受<br />offer' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '接受面试'): ?>
	<div style="width:50px; display:inline-block" class="interview_accept trade_status">
		<?php print '接受<br />面试' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '未到岗'): ?>
	<div style="width:50px; display:inline-block" class="no_on_position trade_status">
		<?php print '未<br />到岗' ?>
	</div>
	<?php elseif (get_trade_status_str($fields['field_trade_status']->content) == '面试邀请'): ?>
	<div style="width:50px; display:inline-block" class="interview_invite trade_status">
		<?php print '面试<br />邀请' ?>
	</div>
	<?php endif; ?>
	<div class="talent_area" style="width:150px; display:inline-block">
		<div style="position:relative">
			<?php print $fields['title_2']->label_html.$fields['title_2']->content; ?>
			<div class="talent_abstract" style="position:absolute; display:none; z-index: 1000; background-color: #EEEEBB">
				<?php echo drupal_render(node_view(node_load(5245), 'small')); ?>
			</div>
		</div>
		<div>
			<?php print $fields['field_talent_mobile']->label_html.$fields['field_talent_mobile']->content; ?>
		</div>
	</div>
	<div style="width:150px; display:inline-block">
		<div>
			<?php print $fields['name']->label_html.$fields['name']->content; ?>
		</div>
		<div>
			<?php print $fields['title']->label_html.$fields['title']->content; ?>
		</div>
	</div>
	<div style="width:300px; display:inline-block">

	</div>
</div>
