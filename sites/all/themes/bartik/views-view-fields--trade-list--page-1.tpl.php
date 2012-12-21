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
	<div class="trade_status" style="display:inline-block">
	</div>
	<div class="talent_area" style="width:150px; display:inline-block">
		<div style="position:relative">
			<?php print $fields['title_2']->label_html.$fields['title_2']->content; ?>
			<div class="talent_abstract" style="position:absolute; display:none; z-index: 1000; background-color: #EEEEBB">
				<?php echo drupal_render(node_view(node_load($fields['nid_1']->raw), 'small')); ?>
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
	<div class="dynamic" style="width:300px; display:inline-block">
	</div>
</div>
