<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
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
  		jQuery('.date_choose').each(function(index) {
  			var this_date_choose = this;
    		var interview_invite_id = jQuery('input', this).val();
    		var ajaxURLday = '<?php global $base_url; echo $base_url; ?>' + '/interview_choose_option_day/' + interview_invite_id;
    		jQuery(".day", this_date_choose).load(ajaxURLday, function(responseText, textStatus, XMLHttpRequest) {
				if(textStatus == 'success') {
					jQuery(".choose_day", this).change(function()
					{
						var day_value = jQuery(this).val();
						if (day_value == '')
						{
							jQuery(".hour", this_date_choose).html('<select class="choose_hour"><option value="">请选择</option></select>');
						}
						var ajaxURLhour = '<?php global $base_url; echo $base_url; ?>' + '/interview_choose_option_hour/' + interview_invite_id + "/" + day_value;
						jQuery(".hour", this_date_choose).load(ajaxURLhour, function(responseText, textStatus, XMLHttpRequest) {
							if(textStatus == 'success') {
								jQuery(".choose_hour", this).change(function()
								{
									var hour_value = jQuery(this).val();
									if (hour_value == '')
									{
										jQuery(".minute", this_date_choose).html('<select class="choose_minute"><option value="">请选择</option></select>');
									}
									var ajaxURLminute = '<?php global $base_url; echo $base_url; ?>' + '/interview_choose_option_minute/' + interview_invite_id + "/" + day_value + "/" + hour_value;
									jQuery(".minute", this_date_choose).load(ajaxURLminute, function(responseText, textStatus, XMLHttpRequest) {
										if(textStatus == 'success') {
			
										}
									});   	
								});
							}
						}); 
						jQuery(".minute", this_date_choose).html('<select class="choose_minute"><option value="">请选择</option></select>');
					});
				}
			});   		
		});
	}); 
</script>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
