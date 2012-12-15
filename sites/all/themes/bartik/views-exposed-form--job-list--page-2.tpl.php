<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>

<input type="hidden" id="ad_search_status" name="ad_search_status" value="<?php if(isset($_GET['ad_search_status'])) { echo $_GET['ad_search_status'];} else { echo 'false';} ?>"/>
<script>
	jQuery(document).ready(function()
	{
		if (jQuery("#ad_search_status").val() == "false")
		{
			jQuery("#cw_filter").hide();			
		}
		else
		{
			jQuery("#cw_filter").show();		
		}
		jQuery("#ad_search").click(function(e)
		{
			if (jQuery("#ad_search_status").val() == "true")
			{
				jQuery("#ad_search_status").val("false");
				jQuery("#cw_filter").hide();
			}
			else
			{
				jQuery("#ad_search_status").val("true");
				jQuery("#cw_filter").show();
			}
		});
		jQuery("#edit-sort-order").change(function() {
  			jQuery("#views-exposed-form-job-list-page-2").submit();
		});
		jQuery("#edit-flagged").change(function() {
  			jQuery("#views-exposed-form-job-list-page-2").submit();
		});
	}); 
</script>
<?php
function get_select($tmp_str)
{
	$tmp_start = strpos($tmp_str, "<select");
	if (!$tmp_start)
	{
		return '';
	}
	$tmp_end = strpos($tmp_str, "</select>");
	return substr($tmp_str, $tmp_start, ($tmp_end - $tmp_start) + 9);
}
function get_input($tmp_str)
{
	$tmp_start = strpos($tmp_str, "<input");
	if (!$tmp_start)
	{
		return '';
	}
	$tmp_end = strpos($tmp_str, "/>");
	return substr($tmp_str, $tmp_start, ($tmp_end - $tmp_start) + 2);
}
?>
<div>
	<div class="label inline_block">
		<?php echo "职位名称"; ?>
	</div>
	<div class="content inline_block">
		<?php echo get_input($widgets['filter-title']->widget); ?>
	</div>
	<div class="views-exposed-widget views-submit-button inline_block">
		<?php print $button; ?>
	</div>
	<?php if (!empty($reset_button)): ?>
		<div class="views-exposed-widget views-reset-button inline_block">
			<?php print $reset_button; ?>
		</div>
	<?php endif; ?>
</div>
<div><a id="ad_search" href="#">高级搜索</a></div>
<div id="cw_filter"> 
	<?php foreach ($widgets as $id => $widget): ?>
	<?php if ($id == 'filter-flagged' || $id == 'filter-field_job_height_from_value' || $id == 'filter-field_job_height_to_value' || $id == 'filter-title') continue; ?>
	<div>
		<div class="label inline_block">
			<?php echo $widget->label; ?>
		</div>
		<div class="content inline_block">
			<?php echo get_select($widget->widget); ?>
			<?php echo get_input($widget->widget); ?>
		</div>
	</div>
	<?php endforeach; ?>
	<div>
		<div class="label inline_block">
			<?php echo "身高"; ?>
		</div>
		<div class="content inline_block">
			<input type="text" id="edit-field-job-height-from-value" name="field_job_height_from_value" value="<?php if (isset($_GET['field_job_height_from_value'])) {echo $_GET['field_job_height_from_value'];} ?>" size="3" maxlength="3" class="form-text" />&nbsp;CM
			-
			<input type="text" id="edit-field-job-height-to-value" name="field_job_height_to_value" value="<?php if (isset($_GET['field_job_height_to_value'])) {echo $_GET['field_job_height_to_value'];} ?>" size="3" maxlength="3" class="form-text" />&nbsp;CM
		</div>
	</div>
</div>
<hr>
<div>
	<div class="inline_block" style="width:124px">职位名</div>
	<div class="inline_block" style="width:124px">企业名称</div>
	<div class="inline_block" style="width:200px">招聘摘要</div>
	<?php if (!empty($sort_by)): ?>
      	<div class="views-exposed-widget views-widget-sort-by" style="display:none">
       		<?php print $sort_by; ?>
      	</div>
		<div class="form-item form-type-select form-item-sort-order inline_block">
			<select id="edit-sort-order" class="form-select" name="sort_order" style="width:120px">
				<option <?php if (isset($_GET['sort_order']) && $_GET['sort_order'] == 'ASC') echo 'selected="selected"'; ?> value="ASC">发布时间由远到近</option>
				<option <?php if (!isset($_GET['sort_order']) || (isset($_GET['sort_order']) && $_GET['sort_order'] == 'DESC')) echo 'selected="selected"'; ?> value="DESC">发布时间由近到远</option>
			</select>
		</div>
    <?php endif; ?>
	<div class="content inline_block">
		<?php echo get_select($widgets['filter-flagged']->widget); ?>
	</div>
</div>
</div>
