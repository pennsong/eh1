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
	jQuery(document).ready(function() {
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
		jQuery(".dynamic").each(function(){
			var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/interview_dynamic_area/' + jQuery(this).siblings(".trade_id").val();
			jQuery(this).load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
				if(textStatus == 'success') {
					var this_interview_info = jQuery(this).children(".interview_info");
					var this_date_choose = jQuery(this).children(".interview_info").children(".date_choose");
					var interview_invite_id = jQuery(this).children(".interview_info").children(".date_choose").children(".interview_invite_id").val();
					jQuery(this).children(".interview_info").children(".date_choose").children(".day").children(".choose_day").change(function(){
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
					jQuery('.accept', this_interview_info.siblings(".reply").children("div")).click(function(){
						if (jQuery(this).parent().parent().siblings(".interview_info").children(".field-name-field-interview-time-start").children(".date-display-single").length > 0)
						{
							var date_str = jQuery(this).parent().parent().siblings(".interview_info").children(".field-name-field-interview-time-start").children(".date-display-single").html();
							var year = date_str.substr(0, 4);
							var month = date_str.substr(5, 2);
							var day = date_str.substr(8, 2);
							var hour = date_str.substr(11, 2);
							var minute = date_str.substr(14, 2);				
							var choose_date = new Date(year, month-1, day, hour, minute, 0).getTime()/1000;
						}
						else
						{
							var date_element = jQuery(this).parent().parent().siblings(".interview_info").children(".date_choose");
							var day = date_element.children(".day").children(".choose_day").val();
							var hour = date_element.children(".hour").children(".choose_hour").val();
							var minute = date_element.children(".minute").children(".choose_minute").val();
							if (day == '' || hour == '' || minute == '')
							{
								alert('请选择时间');
								return false;
							}
							var day_array = day.split('_');
							var choose_date = new Date(day_array[0],day_array[1]-1,day_array[2],hour,minute,0).getTime()/1000;
						}
						var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/interview_reply/' + jQuery(this).parent().siblings("input").val() + "/accept/" + choose_date;
						jQuery(this).parent().parent().parent(".dynamic").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
							if(textStatus == 'success') {
							}
						}); 
					});
					jQuery('.reject', this_interview_info.siblings(".reply").children("div")).click(function(){
						var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/interview_reply/' + jQuery(this).parent().siblings("input").val() + "/reject/" + "0";
						jQuery(this).parent().parent().parent(".dynamic").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
							if(textStatus == 'success') {
							}
						}); 
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
