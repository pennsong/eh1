<?php

/**
 * @file
 * Display Suite 1 column template.
 */
 /**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
 
?>
<div>
	<div style="display:inline-block; width: 110px; vertical-align: top">
		<?php print render($content['field_talent_photo']); ?>
	</div>
	<div style="display:inline-block; width: 450px; vertical-align: top">
		<div style="display:inline-block; width: 70px; vertical-align: top">
			<div><?php print render($content['title']); ?></div>
			<div><?php print render($content['author']); ?></div>
		</div>
		<div style="display:inline-block; width: 120px; vertical-align: top">
			<div><?php print render($content['field_talent_sex']); ?></div>
			<div><?php print render($content['field_talent_city']); ?></div>
			<div><?php print render($content['field_talent_industry']); ?></div>
		</div>	
		<div style="display:inline-block; width: 120px; vertical-align: top">
			<div><?php print render($content['field_talent_height']); ?></div>
		</div>		
		<div style="display:inline-block; width: 130px; vertical-align: top">
			<div><?php print render($content['post_date']); ?></div>
			<div><a href="<?php echo $node_url ?>" target='_blank'>查看详情</a></div>
		</div>
	</div>
	<div style="display:inline-block; width: 100px; vertical-align: top">
		<input class="talent_id" type="hidden" value="<?php echo $node->nid; ?>" />
		<div style="position:relative">
			<input class="interview_invite_button" type="button" value="面试通知"/>
			<div class="sub" style="display:none; position:absolute; top: 20px; z-index:1000;  background-color: #EEEEBB">
				<div>时间:</div>
				<div><input class="time" id="time" type="input" /></div>
				<div>地点:</div>
				<div><input class="address" type="input" /></div>
				<div><input class="interview_time_submit" type="button" value="发布面试邀请" /></div>
				<hr />
				<div class="arrange_div">
					
				</div>
				<div><input class="interview_arrange_submit" type="button" value="发布面试安排" /></div>
				<hr />			
				<div><input class="interview_time_submit_cancel cancel" type="button" value="取消" /></div>
			</div>
		</div>
		<div style="position:relative">
			<input class="offer_button" type="button" value="offer通知"/>
			<div class="sub" style="display:none; position:absolute; top: 20px; z-index:1000;  background-color: #EEEEBB">
				<div>时间:</div>
				<div><input class="time" type="input" /></div>
				<div>地点:</div>
				<div><input class="address" type="input" /></div>
				<div>联系方式:</div>
				<div><input class="contact" type="input" /></div>
				<div>标题:</div>
				<div><input class="title" type="input" /></div>
				<div>内容:</div>
				<div><textarea class="content" rows="4" cols="20"></textarea></div>
				<div><input class="offer_submit" type="button" value="发布offer邀请" /></div>
				<div><input class="offer_submit_cancel cancel" type="button" value="取消" /></div>
			</div>
		</div>
		<div><input class="reject_button" type="button" value="不再考虑"/></div>
	</div>
</div>
