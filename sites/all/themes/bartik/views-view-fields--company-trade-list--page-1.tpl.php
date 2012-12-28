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
	<input type="hidden" class="trade_id" value="<?php echo $fields['nid']->raw ?>" />
	<input type="hidden" class="talent_id" value="<?php echo $fields['nid_1']->raw ?>" />
	<input type="hidden" class="job_id" value="<?php echo $fields['nid_2']->raw ?>" />	
	<div class="trade_status" style="display:inline-block">
	</div>
	<div class="talent_photo" style="width:100px; display:inline-block">
		<?php print $fields['field_talent_photo']->content; ?>
	</div>
	<div class="talent_area" style="width:70px; display:inline-block">	
		<div><?php print $fields['title_2']->content; ?></div>
		<div><?php print $fields['name_1']->label_html; ?></div>
		<div><?php print $fields['name_1']->content; ?></div>
	</div>
	<div style="width:70px; display:inline-block">
		<div>
			<?php print $fields['title']->label_html?>
		</div>
		<div>
			<?php print $fields['title']->content; ?>
		</div>
	</div>
	<div style="width:60px; display:inline-block">
<?php
//生成已招人数
	$recruited_num = 0;
	$get_term = taxonomy_get_term_by_name('交易成功', 'term_trade_status');
	$query = new EntityFieldQuery();
	$query->entityCondition('entity_type', 'node')->entityCondition('bundle', 'trade')->propertyCondition('status', 1)->fieldCondition('field_trade_job', 'target_id', $fields['nid_2']->raw, '=')->fieldCondition('field_trade_status', 'tid',   array_pop($get_term)->tid, '=');
	$result = $query->execute();
	if (isset($result['node']))
	{
		$recruited_num = count($result['node']);
	}
?>		
		<div>已招人数:</div>
		<div><?php echo $recruited_num; ?></div>
	</div>
	<div class="dynamic" style="width:300px; display:inline-block">
	</div>
</div>

