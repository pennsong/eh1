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
<script>
	jQuery(document).ready(function()
	{		
		jQuery("#talent_name_sort").change(function() {
  			if (jQuery(this).val() == 0)
  			{
  				jQuery("#edit-sort-by").val('changed');
    			jQuery("#edit-sort-order").val('ASC');
    			jQuery("#views-exposed-form-trade-list-page-1").submit();			
  			}
  			else if (jQuery(this).val() == 1)
  			{
  				jQuery("#edit-sort-by").val('title');
    			jQuery("#edit-sort-order").val('ASC');
    			jQuery("#views-exposed-form-trade-list-page-1").submit();
  			}
  			else if (jQuery(this).val() == 2)
  			{
  				jQuery("#edit-sort-by").val('title');
    			jQuery("#edit-sort-order").val('DESC');
    			jQuery("#views-exposed-form-trade-list-page-1").submit();
  			}
		});
		jQuery("#edit-field-trade-status-tid").change(function() {
    		jQuery("#views-exposed-form-trade-list-page-1").submit();			
		});
		jQuery("#edit-field-trade-comm-tag-tid").change(function() {
    		jQuery("#views-exposed-form-trade-list-page-1").submit();			
		});
		jQuery("#edit-name").change(function() {
    		jQuery("#views-exposed-form-trade-list-page-1").submit();			
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
		<?php echo $widgets['filter-title']->label; ?>
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
<div id="cw_filter"> 
	<?php foreach ($widgets as $id => $widget): ?>
	<?php if ($id == 'filter-title' || $id == 'filter-field_trade_status_tid' || $id == 'filter-name' || $id == 'filter-field_trade_comm_tag_tid') continue; ?>
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
</div>
<hr>
<div>
	<div class="inline_block" style="width:80px">
		<?php echo str_replace('不限', '状态筛选', $widgets['filter-field_trade_status_tid']->widget); ?>
	</div>
	<div class="content inline_block" style="width:120px">
		<?php if (!empty($sort_by)): ?>
	      	<div style="display:none">
	       		<?php print $sort_by; ?>
	      	</div>
	    <?php endif; ?>
	    <?php if (!empty($sort_order)): ?>
	      	<div style="display:none">
	       		<?php print $sort_order; ?>
	      	</div>
	    <?php endif; ?>
    	<select id="talent_name_sort">
    		<option value="0" <?php if (!isset($_GET['sort_by']) || ($_GET['sort_by'] != 'title')) echo ('selected="selected"'); ?>>人才</option>
    		<option value="1" <?php if ((isset($_GET['sort_by']) && $_GET['sort_by'] == 'title') && (isset($_GET['sort_order']) && $_GET['sort_order'] == 'ASC')) echo ('selected="selected"'); ?>>A-Z排序</option>
    		<option value="2" <?php if ((isset($_GET['sort_by']) && $_GET['sort_by'] == 'title') && (isset($_GET['sort_order']) && $_GET['sort_order'] == 'DESC')) echo ('selected="selected"'); ?>>Z-A排序</option>    		
    	</select>
	</div>
	<div class="inline_block" style="width:140px">
		<input id="edit-name" class="form-text" type="text" maxlength="50" size="15" value="<?php echo (isset($_GET['name'])?$_GET['name']:''); ?>" name="name">
	</div>
	<div class="content inline_block" style="width:150px; padding-left: 100px">
		操作信息
	</div>
	<div class="content inline_block" style="width:60px">
		<?php
			global $user;
			$result = _community_tags_get_tag_result('user', null, $user->uid);
			$output = '<option value="All">标签</option>';
			foreach($result as $row) {
	    		if (!empty($_GET['field_trade_comm_tag_tid']) && $_GET['field_trade_comm_tag_tid'] == $row->tid)	
				{
		    		$output .= '<option value="'.$row->tid.'" selected="selected">'.$row->name.'</option>';							
				}
				else
				{
		    		$output .= '<option value="'.$row->tid.'">'.$row->name.'</option>';					
				}
			}
			$output .= '</select>';
			$tmp_str = $widgets['filter-field_trade_comm_tag_tid']->widget;
			echo substr($tmp_str, 0, strpos($tmp_str, '<option')).$output;
		?>
	</div>
</div>