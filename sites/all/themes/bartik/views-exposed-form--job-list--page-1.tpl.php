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
	drupal_add_css(drupal_get_path('module', 'cw_general') . '/css/jquery.multiselect.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
	drupal_add_css(drupal_get_path('module', 'cw_general') . '/css/jquery-ui.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
	drupal_add_js(drupal_get_path('module', 'cw_general') . '/js/jquery-ui.min.js');
	drupal_add_js(drupal_get_path('module', 'cw_general') . '/js/jquery.multiselect.js');
?>
<script>
	jQuery(document).ready(function()
	{
		jQuery("#edit-field-job-city-tid").multiselect(
			{
				checkAllText: "全选",
				uncheckAllText: "清空",
				selectedText: "# 项",
				minWidth: "80",
				noneSelectedText: "城市",
			}
		); 
		jQuery("#edit-status").change(function(){
			jQuery("#views-exposed-form-job-list-page-1").submit();
		});
		jQuery("#edit-field-job-city-tid").change(function(){
			jQuery("#views-exposed-form-job-list-page-1").submit();			
		});
		jQuery("#edit-sort-order").change(function(){
			jQuery("#views-exposed-form-job-list-page-1").submit();			
		});		
	}); 
</script>
<div class="views-exposed-form">
	<div style="display:inline-block; width:70px">
		<?php echo $widgets['filter-status']->widget ?>
	</div>
	<div style="display:inline-block; width:80px">
		<?php echo $widgets['filter-field_job_city_tid']->widget ?>
	</div>
	<div style="display:inline-block; width:150px">
		<?php
			$tmp_str = get_select($sort_order);
			echo str_replace(array('由近到远', '由远到近'), array('Z-A', 'A-Z'), $tmp_str);
		?>
	</div>	
	<div style="display:inline-block; width:170px">
		薪资
	</div>
	<div style="display:inline-block; width:100px">
		招聘描述及要求
	</div>
	<div style="display:inline-block; width:100px">
		招聘进程
	</div>		
</div>
<div>
	&nbsp;
</div>
<div>
	<?php global $base_url; ?>
	<a href="<?php echo $base_url.'/node/add/job'?>">创建新职位</a>
</div>
<div>
	&nbsp;
</div>