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
<?php
//取得当前用户交易数目
global $user;

$sql = <<<EOD
SELECT
	count(*)
FROM
	{node} trade
JOIN
	{field_data_field_trade_talent} field_talent
ON
	field_talent.entity_id = trade.nid
JOIN
	{node} talent
ON
	field_talent.field_trade_talent_target_id = talent.nid
WHERE
	talent.uid = $user->uid
AND
	trade.type = 'trade'
AND
	trade.status = 1
EOD;

$num = db_query($sql)->fetchField();
if ($num == 0)
{
	global $base_url;
	echo '<h1><a href="'.$base_url.'/hunter_all_job_list">还没有项目？请点击招聘需求，查看最新招聘信息</a></h1>';
}
else
{
	drupal_add_css(drupal_get_path('module', 'cw_general') . '/css/jquery.multiselect.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
	drupal_add_css(drupal_get_path('module', 'cw_general') . '/css/jquery-ui.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
	drupal_add_js(drupal_get_path('module', 'cw_general') . '/js/jquery-ui.min.js');
	drupal_add_js(drupal_get_path('module', 'cw_general') . '/js/jquery.multiselect.js');
?>
	
	<script>
		function reflash_dynamic_area(element)
		{
			var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/interview_dynamic_area/' + element.siblings(".trade_id").val();
			element.load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
			});
		}
		
		function reflash_trade_status_area(element)
		{
			var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/trade_status_area/' + element.siblings(".trade_id").val();
			element.load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
			});
		}
		
		jQuery(document).ready(function() {
			jQuery("#edit-field-trade-status-tid").multiselect(
				{
					checkAllText: "全选",
					uncheckAllText: "清空",
					selectedText: "# 项",
					minWidth: "80",
					noneSelectedText: "状态",
				}
			); 
			jQuery(".form-tags").hide();
			jQuery(".add_tag").hide();
			jQuery(".tag-widget").hover(
				function () {
	    			jQuery(".form-tags", this).show();
	    			jQuery(".add_tag", this).show();
	 				 }, 
	 			function () {
	    			jQuery(".form-tags", this).hide();
	    			jQuery(".add_tag", this).hide();
	  			});
	  		jQuery(".talent_area").hover(
				function () {
	    			jQuery(".talent_abstract", this).show();
	 				 }, 
	 			function () {
	    			jQuery(".talent_abstract", this).hide();
	  		});	
	  		jQuery(".trade_status").each(function(){
				reflash_trade_status_area(jQuery(this));
			});	
			jQuery(".dynamic").each(function(){
				reflash_dynamic_area(jQuery(this));
			});
			jQuery('.dynamic').delegate('.reply > .trade_hunter_score > a','click', function(e){
				e.preventDefault();	
			});
			jQuery('.dynamic').delegate('.reply > .trade_hunter_score > a','hover', function( event ) {
			    if( event.type === 'mouseenter' ) 
			    {
					var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/trade_hunter_score/' + jQuery(this).parent().attr("id");
					jQuery(this).siblings(".score").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
						if(textStatus == 'success') {
						}		
					});					    	
			    }
			    else
			    {
			    	jQuery(this).siblings(".score").html('');
			    }
			});
			jQuery('.dynamic').delegate('.reply > div > .score_company','click', function( event ) {
				jQuery(this).siblings('div').toggle();
			});
			jQuery('.dynamic').delegate('.reply > div > .score_choose > div > input','click', function( event ) {
				var dynamic = jQuery(this).parent().parent().parent().parent().parent();
				var score = 0;
				if (jQuery(this).val() == '好评')
				{
					score = 1;
				}
				else if (jQuery(this).val() == '中评')
				{
					score = 0;
				}
				else if (jQuery(this).val() == '差评')
				{
					score = -1;
				}
				var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/score_to_company/' + jQuery(this).parent().parent().parent().parent().parent().siblings(".trade_id").val() + "/" + score;
				jQuery.ajax({
				  url: ajaxURL,
				  success: function(data) {
				    alert('给企业评价成功!');				   
				    reflash_dynamic_area(dynamic);
				  }
				});
			});			
			jQuery(".dynamic").delegate(".interview_info > .date_choose > .day > .choose_day", "change", function(){
				var this_date_choose = jQuery(this).parent().parent();
				var interview_invite_id = this_date_choose.children(".interview_invite_id").val();	
				var day_value = jQuery(this).val();
				if (day_value == '')
				{
					jQuery(".hour", this_date_choose).html('<select class="choose_hour"><option value="">请选择</option></select>');
				}
				else
				{
					var ajaxURLhour = '<?php global $base_url; echo $base_url; ?>' + '/interview_choose_option_hour/' + interview_invite_id + "/" + day_value;
					jQuery(".hour", this_date_choose).load(ajaxURLhour, function(responseText, textStatus, XMLHttpRequest) {
						if(textStatus == 'success') {
						}		
					});		
				}
				jQuery(".minute", this_date_choose).html('<select class="choose_minute"><option value="">请选择</option></select>');
			});
			jQuery(".dynamic").delegate(".interview_info > .date_choose > .hour > .choose_hour", "change", function(){
				var this_date_choose = jQuery(this).parent().parent();
				var interview_invite_id = this_date_choose.children(".interview_invite_id").val();	
				var day_value = this_date_choose.children(".day").children(".choose_day").val();
				var hour_value = jQuery(this).val();
				if (hour_value == '')
				{
					jQuery(".minute", this_date_choose).html('<select class="choose_minute"><option value="">请选择</option></select>');
				}
				else
				{
					var ajaxURLminute = '<?php global $base_url; echo $base_url; ?>' + '/interview_choose_option_minute/' + interview_invite_id + "/" + day_value + "/" + hour_value;
					jQuery(".minute", this_date_choose).load(ajaxURLminute, function(responseText, textStatus, XMLHttpRequest) {
						if(textStatus == 'success') {
						}		
					});		
				}
			});
			jQuery(".dynamic").delegate(".reply > div > .reject_interview", "click", function(){
				jQuery(this).siblings(".reject_confirm").show();
			});
			jQuery(".dynamic").delegate(".reply > div > .accept_interview", "click", function(){
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
				var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/interview_reply/' + jQuery(this).parent().siblings("input").val() + "/accept_interview/" + choose_date;
				jQuery(this).parent().parent().parent(".dynamic").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
					if(textStatus == 'success') {
						reflash_dynamic_area(jQuery(this));
						reflash_trade_status_area(jQuery(this).siblings(".trade_status"));
					}
				}); 
			});
			jQuery(".dynamic").delegate(".reply > div > .view_offer", "click", function(){
				var url = '<?php global $base_url; echo $base_url; ?>' + '/node/' + jQuery(this).parent().siblings("input").val();
				window.open(url);
	  			return false;
			});
			jQuery(".dynamic").delegate(".reply > div > .reject_offer", "click", function(){
				jQuery(this).siblings(".reject_confirm").show();
			});
			jQuery(".dynamic").delegate(".reply > div > .accept_offer", "click", function(){
				if (confirm('恭喜您获得offer。\n请通知人才于指定时间到指定地点上岗')) {
					var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/offer_reply/' + jQuery(this).parent().siblings("input").val() + "/accept_offer/" + "empty";
					jQuery(this).parent().parent().parent(".dynamic").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
						if(textStatus == 'success') {
							reflash_dynamic_area(jQuery(this));
							reflash_trade_status_area(jQuery(this).siblings(".trade_status"));
						}
					}); 
				} else {
	
				}
			});	
			jQuery(".dynamic").delegate(".reply > div > div > .no_offer", "click", function(){
				jQuery(this).parent().hide();
			});	
			jQuery(".dynamic").delegate(".reply > div > div > .yes_offer", "click", function(){
				if (!jQuery(this).siblings("div").children(".reject_note").val())
				{
					alert("请填写拒绝原因!");
					return false;
				}
				var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/offer_reply/' + jQuery(this).parent().parent().siblings("input").val() + "/reject_offer/" + jQuery(this).siblings("div").children(".reject_note").val();
				jQuery(this).parent().parent().parent().parent(".dynamic").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
					if(textStatus == 'success') {
						reflash_dynamic_area(jQuery(this));
						reflash_trade_status_area(jQuery(this).siblings(".trade_status"));
					}
				});
			});
			jQuery(".dynamic").delegate(".reply > div > div > .no_interview", "click", function(){
				jQuery(this).parent().hide();
			});
			jQuery(".dynamic").delegate(".reply > div > div > .yes_interview", "click", function(){
				if (!jQuery(this).siblings("div").children(".reject_note").val())
				{
					alert("请填写拒绝原因!");
					return false;
				}
				var ajaxURL = '<?php global $base_url; echo $base_url; ?>' + '/interview_reply/' + jQuery(this).parent().parent().siblings("input").val() + "/reject_interview/" + jQuery(this).siblings("div").children(".reject_note").val();;;
				jQuery(this).parent().parent().parent().parent(".dynamic").load(ajaxURL, function(responseText, textStatus, XMLHttpRequest) {
					if(textStatus == 'success') {
						reflash_dynamic_area(jQuery(this));
						reflash_trade_status_area(jQuery(this).siblings(".trade_status"));
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
	
	</div>
<?php } ?>
<?php /* class view */ ?>
