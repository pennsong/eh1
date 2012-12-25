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
	$recruited_num = 0;
	$field = $fields['status'];
	if ($field->raw == 1)
	{
		$publish_mark = '<div style="color:green">已发布</div>';
	}
	else
	{
		$publish_mark = '<div style="color:red">未发布</div>';
	}
	//生成已招人数
	$get_term = taxonomy_get_term_by_name('交易成功', 'term_trade_status');
	
	$query = new EntityFieldQuery();
	$query->entityCondition('entity_type', 'node')
	->entityCondition('bundle', 'trade')
	->propertyCondition('status', 1)
	->fieldCondition('field_trade_job', 'target_id', $fields['nid']->raw, '=')
	->fieldCondition('field_trade_status', 'tid', array_pop($get_term)->tid, '=');

	$result = $query->execute();
	if (isset($result['node']))
	{
		$recruited_num = count($result['node']);
	}
?>
<div style="display:inline-block; width:70px">
<?php echo $publish_mark; ?>
</div>
<div style="display:inline-block; width:80px">
<?php $field = $fields['field_job_city'] ?>
 <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
</div>
<div style="display:inline-block; width:150px">
<?php $field = $fields['title'] ?>
 <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
</div>
<div style="display:inline-block; width:170px">
<?php $field = $fields['field_job_salary_from'] ?>
 <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
  -
  <?php $field = $fields['field_job_salary_to'] ?>
 <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
</div>
<div style="display:inline-block; width:50px">
	<?php global $base_url; ?>
	<a href="<?php echo $base_url.'/node/'.$fields['nid']->raw; ?>">查看</a>
</div>
<div style="display:inline-block; width:50px">
	<?php global $base_url; ?>
	<a href="<?php echo $base_url.'/node/'.$fields['nid']->raw.'/edit'; ?>">编辑</a>
</div>
<div style="display:inline-block; width:100px">
	已招<?php echo $recruited_num; ?>人
</div>