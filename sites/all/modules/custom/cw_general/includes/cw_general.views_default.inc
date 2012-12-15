<?php
function cw_general_views_default_views()
{
	$view = new view();
	$view->name = 'job_list';
	$view->description = '';
	$view->tag = 'default';
	$view->base_table = 'node';
	$view->human_name = 'job_list';
	$view->core = 7;
	$view->api_version = '3.0';
	$view->disabled = FALSE;
	/* Edit this to true to make a default view disabled initially */
	/* Display: Master */
	$handler = $view->new_display('default', 'Master', 'default');
	$handler->display->display_options['title'] = 'job_list';
	$handler->display->display_options['use_more_always'] = FALSE;
	$handler->display->display_options['access']['type'] = 'none';
	$handler->display->display_options['cache']['type'] = 'none';
	$handler->display->display_options['query']['type'] = 'views_query';
	$handler->display->display_options['exposed_form']['type'] = 'basic';
	$handler->display->display_options['exposed_form']['options']['reset_button'] = TRUE;
	$handler->display->display_options['pager']['type'] = 'full';
	$handler->display->display_options['pager']['options']['items_per_page'] = '20';
	$handler->display->display_options['pager']['options']['offset'] = '0';
	$handler->display->display_options['pager']['options']['id'] = '0';
	$handler->display->display_options['pager']['options']['quantity'] = '9';
	$handler->display->display_options['style_plugin'] = 'default';
	$handler->display->display_options['style_options']['default_row_class'] = FALSE;
	$handler->display->display_options['style_options']['row_class_special'] = FALSE;
	$handler->display->display_options['row_plugin'] = 'fields';
	/* Field: Content: Title */
	$handler->display->display_options['fields']['title']['id'] = 'title';
	$handler->display->display_options['fields']['title']['table'] = 'node';
	$handler->display->display_options['fields']['title']['field'] = 'title';
	$handler->display->display_options['fields']['title']['label'] = '';
	$handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
	$handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
	/* Field: Content: 性别 */
	$handler->display->display_options['fields']['field_job_sex']['id'] = 'field_job_sex';
	$handler->display->display_options['fields']['field_job_sex']['table'] = 'field_data_field_job_sex';
	$handler->display->display_options['fields']['field_job_sex']['field'] = 'field_job_sex';
	$handler->display->display_options['fields']['field_job_sex']['label'] = 'sex';
	/* Field: Content: 身高下限 */
	$handler->display->display_options['fields']['field_job_height_from']['id'] = 'field_job_height_from';
	$handler->display->display_options['fields']['field_job_height_from']['table'] = 'field_data_field_job_height_from';
	$handler->display->display_options['fields']['field_job_height_from']['field'] = 'field_job_height_from';
	$handler->display->display_options['fields']['field_job_height_from']['label'] = 'height from';
	$handler->display->display_options['fields']['field_job_height_from']['settings'] = array(
		'thousand_separator'=>' ',
		'prefix_suffix'=>1,
	);
	/* Field: Content: 身高上限 */
	$handler->display->display_options['fields']['field_job_height_to']['id'] = 'field_job_height_to';
	$handler->display->display_options['fields']['field_job_height_to']['table'] = 'field_data_field_job_height_to';
	$handler->display->display_options['fields']['field_job_height_to']['field'] = 'field_job_height_to';
	$handler->display->display_options['fields']['field_job_height_to']['label'] = 'height to';
	$handler->display->display_options['fields']['field_job_height_to']['settings'] = array(
		'thousand_separator'=>' ',
		'prefix_suffix'=>1,
	);
	/* Field: Content: 城市 */
	$handler->display->display_options['fields']['field_job_city']['id'] = 'field_job_city';
	$handler->display->display_options['fields']['field_job_city']['table'] = 'field_data_field_job_city';
	$handler->display->display_options['fields']['field_job_city']['field'] = 'field_job_city';
	$handler->display->display_options['fields']['field_job_city']['label'] = 'city';
	/* Field: Content: Post date */
	$handler->display->display_options['fields']['created']['id'] = 'created';
	$handler->display->display_options['fields']['created']['table'] = 'node';
	$handler->display->display_options['fields']['created']['field'] = 'created';
	$handler->display->display_options['fields']['created']['date_format'] = 'short';
	/* Sort criterion: Content: Updated date */
	$handler->display->display_options['sorts']['changed']['id'] = 'changed';
	$handler->display->display_options['sorts']['changed']['table'] = 'node';
	$handler->display->display_options['sorts']['changed']['field'] = 'changed';
	$handler->display->display_options['sorts']['changed']['exposed'] = TRUE;
	$handler->display->display_options['sorts']['changed']['expose']['label'] = 'Updated date';
	/* Filter criterion: Content: Published */
	$handler->display->display_options['filters']['status']['id'] = 'status';
	$handler->display->display_options['filters']['status']['table'] = 'node';
	$handler->display->display_options['filters']['status']['field'] = 'status';
	$handler->display->display_options['filters']['status']['value'] = 1;
	$handler->display->display_options['filters']['status']['group'] = 1;
	$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
	/* Filter criterion: Content: Type */
	$handler->display->display_options['filters']['type']['id'] = 'type';
	$handler->display->display_options['filters']['type']['table'] = 'node';
	$handler->display->display_options['filters']['type']['field'] = 'type';
	$handler->display->display_options['filters']['type']['value'] = array('job'=>'job', );
	$handler->display->display_options['filters']['type']['group'] = 1;
	/* Filter criterion: Content: 城市 (field_job_city) */
	$handler->display->display_options['filters']['field_job_city_tid']['id'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['table'] = 'field_data_field_job_city';
	$handler->display->display_options['filters']['field_job_city_tid']['field'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_city_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator_id'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['label'] = 'city (field_job_city)';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['identifier'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_city_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_city_tid']['vocabulary'] = 'term_city';
	$handler->display->display_options['filters']['field_job_city_tid']['hierarchy'] = 1;
	/* Filter criterion: Content: 工作类型 (field_job_job_type) */
	$handler->display->display_options['filters']['field_job_job_type_tid']['id'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['table'] = 'field_data_field_job_job_type';
	$handler->display->display_options['filters']['field_job_job_type_tid']['field'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_job_type_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator_id'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['label'] = 'job type (field_job_job_type)';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['identifier'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_job_type_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_job_type_tid']['vocabulary'] = 'term_job_type';
	/* Filter criterion: Content: 性别 (field_job_sex) */
	$handler->display->display_options['filters']['field_job_sex_tid']['id'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['table'] = 'field_data_field_job_sex';
	$handler->display->display_options['filters']['field_job_sex_tid']['field'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator_id'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['label'] = 'sex (field_job_sex)';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['identifier'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_sex_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_sex_tid']['vocabulary'] = 'term_sex';
	/* Filter criterion: Content: 身高下限 (field_job_height_from) */
	$handler->display->display_options['filters']['field_job_height_from_value']['id'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['table'] = 'field_data_field_job_height_from';
	$handler->display->display_options['filters']['field_job_height_from_value']['field'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['operator'] = '<=';
	$handler->display->display_options['filters']['field_job_height_from_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator_id'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['label'] = 'height from (field_job_height_from)';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['identifier'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: 身高上限 (field_job_height_to) */
	$handler->display->display_options['filters']['field_job_height_to_value']['id'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['table'] = 'field_data_field_job_height_to';
	$handler->display->display_options['filters']['field_job_height_to_value']['field'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['operator'] = '>=';
	$handler->display->display_options['filters']['field_job_height_to_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator_id'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['label'] = 'height to (field_job_height_to)';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['identifier'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: Title */
	$handler->display->display_options['filters']['title']['id'] = 'title';
	$handler->display->display_options['filters']['title']['table'] = 'node';
	$handler->display->display_options['filters']['title']['field'] = 'title';
	$handler->display->display_options['filters']['title']['operator'] = 'word';
	$handler->display->display_options['filters']['title']['exposed'] = TRUE;
	$handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
	$handler->display->display_options['filters']['title']['expose']['label'] = 'Job title';
	$handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
	$handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
	$handler->display->display_options['filters']['title']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Display: All job */
	$handler = $view->new_display('page', 'All job', 'page');
	$handler->display->display_options['defaults']['title'] = FALSE;
	$handler->display->display_options['title'] = 'All job list';
	$handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
	$handler->display->display_options['defaults']['access'] = FALSE;
	$handler->display->display_options['access']['type'] = 'role';
	$handler->display->display_options['access']['role'] = array(3=>'3', );
	$handler->display->display_options['defaults']['relationships'] = FALSE;
	$handler->display->display_options['defaults']['filter_groups'] = FALSE;
	$handler->display->display_options['defaults']['filters'] = FALSE;
	/* Filter criterion: Content: Published */
	$handler->display->display_options['filters']['status']['id'] = 'status';
	$handler->display->display_options['filters']['status']['table'] = 'node';
	$handler->display->display_options['filters']['status']['field'] = 'status';
	$handler->display->display_options['filters']['status']['value'] = 1;
	$handler->display->display_options['filters']['status']['group'] = 1;
	$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
	/* Filter criterion: Content: Type */
	$handler->display->display_options['filters']['type']['id'] = 'type';
	$handler->display->display_options['filters']['type']['table'] = 'node';
	$handler->display->display_options['filters']['type']['field'] = 'type';
	$handler->display->display_options['filters']['type']['value'] = array('job'=>'job', );
	$handler->display->display_options['filters']['type']['group'] = 1;
	/* Filter criterion: Content: 城市 (field_job_city) */
	$handler->display->display_options['filters']['field_job_city_tid']['id'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['table'] = 'field_data_field_job_city';
	$handler->display->display_options['filters']['field_job_city_tid']['field'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_city_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator_id'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['label'] = 'city (field_job_city)';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['identifier'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_city_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_city_tid']['vocabulary'] = 'term_city';
	$handler->display->display_options['filters']['field_job_city_tid']['hierarchy'] = 1;
	/* Filter criterion: Content: 工作类型 (field_job_job_type) */
	$handler->display->display_options['filters']['field_job_job_type_tid']['id'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['table'] = 'field_data_field_job_job_type';
	$handler->display->display_options['filters']['field_job_job_type_tid']['field'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_job_type_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator_id'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['label'] = 'job type (field_job_job_type)';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['identifier'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_job_type_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_job_type_tid']['vocabulary'] = 'term_job_type';
	/* Filter criterion: Content: 性别 (field_job_sex) */
	$handler->display->display_options['filters']['field_job_sex_tid']['id'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['table'] = 'field_data_field_job_sex';
	$handler->display->display_options['filters']['field_job_sex_tid']['field'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_sex_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator_id'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['label'] = 'sex (field_job_sex)';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['identifier'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_sex_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_sex_tid']['vocabulary'] = 'term_sex';
	/* Filter criterion: Content: 身高下限 (field_job_height_from) */
	$handler->display->display_options['filters']['field_job_height_from_value']['id'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['table'] = 'field_data_field_job_height_from';
	$handler->display->display_options['filters']['field_job_height_from_value']['field'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['operator'] = '<=';
	$handler->display->display_options['filters']['field_job_height_from_value']['group'] = 1;
	$handler->display->display_options['filters']['field_job_height_from_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator_id'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['label'] = 'height from (field_job_height_from)';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['identifier'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: 身高上限 (field_job_height_to) */
	$handler->display->display_options['filters']['field_job_height_to_value']['id'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['table'] = 'field_data_field_job_height_to';
	$handler->display->display_options['filters']['field_job_height_to_value']['field'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['operator'] = '>=';
	$handler->display->display_options['filters']['field_job_height_to_value']['group'] = 1;
	$handler->display->display_options['filters']['field_job_height_to_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator_id'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['label'] = 'height to (field_job_height_to)';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['identifier'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: Title */
	$handler->display->display_options['filters']['title']['id'] = 'title';
	$handler->display->display_options['filters']['title']['table'] = 'node';
	$handler->display->display_options['filters']['title']['field'] = 'title';
	$handler->display->display_options['filters']['title']['operator'] = 'word';
	$handler->display->display_options['filters']['title']['group'] = 1;
	$handler->display->display_options['filters']['title']['exposed'] = TRUE;
	$handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
	$handler->display->display_options['filters']['title']['expose']['label'] = 'Job title';
	$handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
	$handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
	$handler->display->display_options['filters']['title']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['path'] = 'all_job_list';
	$handler->display->display_options['menu']['type'] = 'normal';
	$handler->display->display_options['menu']['title'] = '招聘信息';
	$handler->display->display_options['menu']['description'] = 'show open job list';
	$handler->display->display_options['menu']['weight'] = '0';
	$handler->display->display_options['menu']['name'] = 'main-menu';
	$handler->display->display_options['menu']['context'] = 0;
	/* Display: My job list */
	$handler = $view->new_display('page', 'My job list', 'page_1');
	$handler->display->display_options['defaults']['title'] = FALSE;
	$handler->display->display_options['title'] = 'My job list';
	$handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
	$handler->display->display_options['defaults']['access'] = FALSE;
	$handler->display->display_options['access']['type'] = 'role';
	$handler->display->display_options['access']['role'] = array(3=>'3', );
	$handler->display->display_options['defaults']['relationships'] = FALSE;
	/* Relationship: Content: Author */
	$handler->display->display_options['relationships']['uid']['id'] = 'uid';
	$handler->display->display_options['relationships']['uid']['table'] = 'node';
	$handler->display->display_options['relationships']['uid']['field'] = 'uid';
	$handler->display->display_options['relationships']['uid']['required'] = TRUE;
	$handler->display->display_options['defaults']['filter_groups'] = FALSE;
	$handler->display->display_options['defaults']['filters'] = FALSE;
	/* Filter criterion: Content: Published */
	$handler->display->display_options['filters']['status']['id'] = 'status';
	$handler->display->display_options['filters']['status']['table'] = 'node';
	$handler->display->display_options['filters']['status']['field'] = 'status';
	$handler->display->display_options['filters']['status']['value'] = 1;
	$handler->display->display_options['filters']['status']['group'] = 1;
	$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
	/* Filter criterion: Content: Type */
	$handler->display->display_options['filters']['type']['id'] = 'type';
	$handler->display->display_options['filters']['type']['table'] = 'node';
	$handler->display->display_options['filters']['type']['field'] = 'type';
	$handler->display->display_options['filters']['type']['value'] = array('job'=>'job', );
	$handler->display->display_options['filters']['type']['group'] = 1;
	/* Filter criterion: Content: 城市 (field_job_city) */
	$handler->display->display_options['filters']['field_job_city_tid']['id'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['table'] = 'field_data_field_job_city';
	$handler->display->display_options['filters']['field_job_city_tid']['field'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_city_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator_id'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['label'] = 'city (field_job_city)';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['identifier'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_city_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_city_tid']['vocabulary'] = 'term_city';
	$handler->display->display_options['filters']['field_job_city_tid']['hierarchy'] = 1;
	/* Filter criterion: Content: 工作类型 (field_job_job_type) */
	$handler->display->display_options['filters']['field_job_job_type_tid']['id'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['table'] = 'field_data_field_job_job_type';
	$handler->display->display_options['filters']['field_job_job_type_tid']['field'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_job_type_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator_id'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['label'] = 'job type (field_job_job_type)';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['identifier'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_job_type_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_job_type_tid']['vocabulary'] = 'term_job_type';
	/* Filter criterion: Content: 性别 (field_job_sex) */
	$handler->display->display_options['filters']['field_job_sex_tid']['id'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['table'] = 'field_data_field_job_sex';
	$handler->display->display_options['filters']['field_job_sex_tid']['field'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator_id'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['label'] = 'sex (field_job_sex)';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['identifier'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_sex_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_sex_tid']['vocabulary'] = 'term_sex';
	/* Filter criterion: Content: 身高下限 (field_job_height_from) */
	$handler->display->display_options['filters']['field_job_height_from_value']['id'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['table'] = 'field_data_field_job_height_from';
	$handler->display->display_options['filters']['field_job_height_from_value']['field'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['operator'] = '<=';
	$handler->display->display_options['filters']['field_job_height_from_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator_id'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['label'] = 'height from (field_job_height_from)';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['identifier'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: 身高上限 (field_job_height_to) */
	$handler->display->display_options['filters']['field_job_height_to_value']['id'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['table'] = 'field_data_field_job_height_to';
	$handler->display->display_options['filters']['field_job_height_to_value']['field'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['operator'] = '>=';
	$handler->display->display_options['filters']['field_job_height_to_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator_id'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['label'] = 'height to (field_job_height_to)';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['identifier'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: User: Current */
	$handler->display->display_options['filters']['uid_current']['id'] = 'uid_current';
	$handler->display->display_options['filters']['uid_current']['table'] = 'users';
	$handler->display->display_options['filters']['uid_current']['field'] = 'uid_current';
	$handler->display->display_options['filters']['uid_current']['relationship'] = 'uid';
	$handler->display->display_options['filters']['uid_current']['value'] = '1';
	$handler->display->display_options['path'] = 'company_job_list';
	$handler->display->display_options['menu']['type'] = 'normal';
	$handler->display->display_options['menu']['title'] = 'My job list';
	$handler->display->display_options['menu']['weight'] = '0';
	$handler->display->display_options['menu']['name'] = 'main-menu';
	$handler->display->display_options['menu']['context'] = 0;
	/* Display: Hunter all job */
	$handler = $view->new_display('page', 'Hunter all job', 'page_2');
	$handler->display->display_options['defaults']['title'] = FALSE;
	$handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
	$handler->display->display_options['defaults']['access'] = FALSE;
	$handler->display->display_options['access']['type'] = 'role';
	$handler->display->display_options['access']['role'] = array(4=>'4', );
	$handler->display->display_options['defaults']['exposed_form'] = FALSE;
	$handler->display->display_options['exposed_form']['type'] = 'basic';
	$handler->display->display_options['exposed_form']['options']['reset_button'] = TRUE;
	$handler->display->display_options['defaults']['style_plugin'] = FALSE;
	$handler->display->display_options['style_plugin'] = 'default';
	$handler->display->display_options['style_options']['default_row_class'] = FALSE;
	$handler->display->display_options['defaults']['style_options'] = FALSE;
	$handler->display->display_options['defaults']['row_plugin'] = FALSE;
	$handler->display->display_options['row_plugin'] = 'fields';
	$handler->display->display_options['defaults']['row_options'] = FALSE;
	$handler->display->display_options['defaults']['header'] = FALSE;
	$handler->display->display_options['defaults']['relationships'] = FALSE;
	/* Relationship: Flags: star_job */
	$handler->display->display_options['relationships']['flag_content_rel']['id'] = 'flag_content_rel';
	$handler->display->display_options['relationships']['flag_content_rel']['table'] = 'node';
	$handler->display->display_options['relationships']['flag_content_rel']['field'] = 'flag_content_rel';
	$handler->display->display_options['relationships']['flag_content_rel']['required'] = 0;
	$handler->display->display_options['relationships']['flag_content_rel']['flag'] = 'star_job';
	/* Relationship: Content: Author */
	$handler->display->display_options['relationships']['uid']['id'] = 'uid';
	$handler->display->display_options['relationships']['uid']['table'] = 'node';
	$handler->display->display_options['relationships']['uid']['field'] = 'uid';
	$handler->display->display_options['relationships']['uid']['required'] = TRUE;
	/* Relationship: User: Profile */
	$handler->display->display_options['relationships']['profile']['id'] = 'profile';
	$handler->display->display_options['relationships']['profile']['table'] = 'users';
	$handler->display->display_options['relationships']['profile']['field'] = 'profile';
	$handler->display->display_options['relationships']['profile']['relationship'] = 'uid';
	$handler->display->display_options['relationships']['profile']['bundle_types'] = array('company_normal_profile'=>'company_normal_profile', );
	$handler->display->display_options['defaults']['fields'] = FALSE;
	/* Field: Content: Title */
	$handler->display->display_options['fields']['title']['id'] = 'title';
	$handler->display->display_options['fields']['title']['table'] = 'node';
	$handler->display->display_options['fields']['title']['field'] = 'title';
	$handler->display->display_options['fields']['title']['label'] = '';
	$handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
	$handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
	$handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
	/* Field: User: Name */
	$handler->display->display_options['fields']['name']['id'] = 'name';
	$handler->display->display_options['fields']['name']['table'] = 'users';
	$handler->display->display_options['fields']['name']['field'] = 'name';
	$handler->display->display_options['fields']['name']['relationship'] = 'uid';
	$handler->display->display_options['fields']['name']['label'] = '';
	$handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
	/* Field: Content: 性别 */
	$handler->display->display_options['fields']['field_job_sex']['id'] = 'field_job_sex';
	$handler->display->display_options['fields']['field_job_sex']['table'] = 'field_data_field_job_sex';
	$handler->display->display_options['fields']['field_job_sex']['field'] = 'field_job_sex';
	$handler->display->display_options['fields']['field_job_sex']['label'] = 'Sex';
	$handler->display->display_options['fields']['field_job_sex']['exclude'] = TRUE;
	$handler->display->display_options['fields']['field_job_sex']['element_default_classes'] = FALSE;
	$handler->display->display_options['fields']['field_job_sex']['type'] = 'taxonomy_term_reference_plain';
	/* Field: Content: 身高下限 */
	$handler->display->display_options['fields']['field_job_height_from']['id'] = 'field_job_height_from';
	$handler->display->display_options['fields']['field_job_height_from']['table'] = 'field_data_field_job_height_from';
	$handler->display->display_options['fields']['field_job_height_from']['field'] = 'field_job_height_from';
	$handler->display->display_options['fields']['field_job_height_from']['label'] = 'height from';
	$handler->display->display_options['fields']['field_job_height_from']['exclude'] = TRUE;
	$handler->display->display_options['fields']['field_job_height_from']['settings'] = array(
		'thousand_separator'=>' ',
		'prefix_suffix'=>1,
	);
	/* Field: Content: 身高上限 */
	$handler->display->display_options['fields']['field_job_height_to']['id'] = 'field_job_height_to';
	$handler->display->display_options['fields']['field_job_height_to']['table'] = 'field_data_field_job_height_to';
	$handler->display->display_options['fields']['field_job_height_to']['field'] = 'field_job_height_to';
	$handler->display->display_options['fields']['field_job_height_to']['label'] = 'height to';
	$handler->display->display_options['fields']['field_job_height_to']['exclude'] = TRUE;
	$handler->display->display_options['fields']['field_job_height_to']['settings'] = array(
		'thousand_separator'=>' ',
		'prefix_suffix'=>1,
	);
	/* Field: Content: 城市 */
	$handler->display->display_options['fields']['field_job_city']['id'] = 'field_job_city';
	$handler->display->display_options['fields']['field_job_city']['table'] = 'field_data_field_job_city';
	$handler->display->display_options['fields']['field_job_city']['field'] = 'field_job_city';
	$handler->display->display_options['fields']['field_job_city']['label'] = 'city';
	$handler->display->display_options['fields']['field_job_city']['exclude'] = TRUE;
	$handler->display->display_options['fields']['field_job_city']['type'] = 'taxonomy_term_reference_plain';
	/* Field: Content: 备注 */
	$handler->display->display_options['fields']['field_job_note']['id'] = 'field_job_note';
	$handler->display->display_options['fields']['field_job_note']['table'] = 'field_data_field_job_note';
	$handler->display->display_options['fields']['field_job_note']['field'] = 'field_job_note';
	$handler->display->display_options['fields']['field_job_note']['exclude'] = TRUE;
	$handler->display->display_options['fields']['field_job_note']['type'] = 'text_trimmed';
	$handler->display->display_options['fields']['field_job_note']['settings'] = array('trim_length'=>'10', );
	/* Field: Content: Updated date */
	$handler->display->display_options['fields']['changed']['id'] = 'changed';
	$handler->display->display_options['fields']['changed']['table'] = 'node';
	$handler->display->display_options['fields']['changed']['field'] = 'changed';
	$handler->display->display_options['fields']['changed']['label'] = '';
	$handler->display->display_options['fields']['changed']['alter']['alter_text'] = TRUE;
	$handler->display->display_options['fields']['changed']['alter']['text'] = '<div class="left">
  <div>
    <div class="sex">性别:[field_job_sex]</div>
    <div class="city">城市:[field_job_city]</div>
  </div>
  <div class="height">身高:[field_job_height_from]-[field_job_height_to]</div>
  <div class="city">备注:[field_job_note]</div>
</div>
<div class="date">[changed]</div>';
	$handler->display->display_options['fields']['changed']['element_label_colon'] = FALSE;
	$handler->display->display_options['fields']['changed']['date_format'] = 'custom';
	$handler->display->display_options['fields']['changed']['custom_date_format'] = 'Y-m-d';
	/* Field: Flags: Flag link */
	$handler->display->display_options['fields']['ops']['id'] = 'ops';
	$handler->display->display_options['fields']['ops']['table'] = 'flag_content';
	$handler->display->display_options['fields']['ops']['field'] = 'ops';
	$handler->display->display_options['fields']['ops']['relationship'] = 'flag_content_rel';
	$handler->display->display_options['fields']['ops']['label'] = '';
	$handler->display->display_options['fields']['ops']['element_label_colon'] = FALSE;
	$handler->display->display_options['defaults']['sorts'] = FALSE;
	/* Sort criterion: Content: Updated date */
	$handler->display->display_options['sorts']['changed']['id'] = 'changed';
	$handler->display->display_options['sorts']['changed']['table'] = 'node';
	$handler->display->display_options['sorts']['changed']['field'] = 'changed';
	$handler->display->display_options['sorts']['changed']['order'] = 'DESC';
	$handler->display->display_options['sorts']['changed']['exposed'] = TRUE;
	$handler->display->display_options['sorts']['changed']['expose']['label'] = '发布日期';
	$handler->display->display_options['defaults']['filter_groups'] = FALSE;
	$handler->display->display_options['defaults']['filters'] = FALSE;
	/* Filter criterion: Content: Published */
	$handler->display->display_options['filters']['status']['id'] = 'status';
	$handler->display->display_options['filters']['status']['table'] = 'node';
	$handler->display->display_options['filters']['status']['field'] = 'status';
	$handler->display->display_options['filters']['status']['value'] = 1;
	$handler->display->display_options['filters']['status']['group'] = 1;
	$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
	/* Filter criterion: Content: Type */
	$handler->display->display_options['filters']['type']['id'] = 'type';
	$handler->display->display_options['filters']['type']['table'] = 'node';
	$handler->display->display_options['filters']['type']['field'] = 'type';
	$handler->display->display_options['filters']['type']['value'] = array('job'=>'job', );
	$handler->display->display_options['filters']['type']['group'] = 1;
	/* Filter criterion: Content: 城市 (field_job_city) */
	$handler->display->display_options['filters']['field_job_city_tid']['id'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['table'] = 'field_data_field_job_city';
	$handler->display->display_options['filters']['field_job_city_tid']['field'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_city_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator_id'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['label'] = '城市';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['operator'] = 'field_job_city_tid_op';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['identifier'] = 'field_job_city_tid';
	$handler->display->display_options['filters']['field_job_city_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_city_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_city_tid']['vocabulary'] = 'term_city';
	$handler->display->display_options['filters']['field_job_city_tid']['hierarchy'] = 1;
	/* Filter criterion: Profile: 行业 (field_company_profile_industry) */
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['id'] = 'field_company_profile_industry_tid';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['table'] = 'field_data_field_company_profile_industry';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['field'] = 'field_company_profile_industry_tid';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['relationship'] = 'profile';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['expose']['operator_id'] = 'field_company_profile_industry_tid_op';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['expose']['label'] = '行业类型';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['expose']['operator'] = 'field_company_profile_industry_tid_op';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['expose']['identifier'] = 'field_company_profile_industry_tid';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_company_profile_industry_tid']['vocabulary'] = 'term_industry';
	/* Filter criterion: Content: 工作类型 (field_job_job_type) */
	$handler->display->display_options['filters']['field_job_job_type_tid']['id'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['table'] = 'field_data_field_job_job_type';
	$handler->display->display_options['filters']['field_job_job_type_tid']['field'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_job_type_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator_id'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['label'] = '职位类别';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['operator'] = 'field_job_job_type_tid_op';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['identifier'] = 'field_job_job_type_tid';
	$handler->display->display_options['filters']['field_job_job_type_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_job_type_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_job_type_tid']['vocabulary'] = 'term_job_type';
	/* Filter criterion: Content: 学历 (field_job_education) */
	$handler->display->display_options['filters']['field_job_education_value']['id'] = 'field_job_education_value';
	$handler->display->display_options['filters']['field_job_education_value']['table'] = 'field_data_field_job_education';
	$handler->display->display_options['filters']['field_job_education_value']['field'] = 'field_job_education_value';
	$handler->display->display_options['filters']['field_job_education_value']['group'] = 1;
	$handler->display->display_options['filters']['field_job_education_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_education_value']['expose']['operator_id'] = 'field_job_education_value_op';
	$handler->display->display_options['filters']['field_job_education_value']['expose']['label'] = '最高学历';
	$handler->display->display_options['filters']['field_job_education_value']['expose']['operator'] = 'field_job_education_value_op';
	$handler->display->display_options['filters']['field_job_education_value']['expose']['identifier'] = 'field_job_education_value';
	$handler->display->display_options['filters']['field_job_education_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: 性别 (field_job_sex) */
	$handler->display->display_options['filters']['field_job_sex_tid']['id'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['table'] = 'field_data_field_job_sex';
	$handler->display->display_options['filters']['field_job_sex_tid']['field'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['group'] = 1;
	$handler->display->display_options['filters']['field_job_sex_tid']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator_id'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['label'] = '性别';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['operator'] = 'field_job_sex_tid_op';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['identifier'] = 'field_job_sex_tid';
	$handler->display->display_options['filters']['field_job_sex_tid']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['filters']['field_job_sex_tid']['type'] = 'select';
	$handler->display->display_options['filters']['field_job_sex_tid']['vocabulary'] = 'term_sex';
	/* Filter criterion: Content: 身高下限 (field_job_height_from) */
	$handler->display->display_options['filters']['field_job_height_from_value']['id'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['table'] = 'field_data_field_job_height_from';
	$handler->display->display_options['filters']['field_job_height_from_value']['field'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['operator'] = '<=';
	$handler->display->display_options['filters']['field_job_height_from_value']['group'] = 1;
	$handler->display->display_options['filters']['field_job_height_from_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator_id'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['label'] = '身高下限';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['operator'] = 'field_job_height_from_value_op';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['identifier'] = 'field_job_height_from_value';
	$handler->display->display_options['filters']['field_job_height_from_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: 身高上限 (field_job_height_to) */
	$handler->display->display_options['filters']['field_job_height_to_value']['id'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['table'] = 'field_data_field_job_height_to';
	$handler->display->display_options['filters']['field_job_height_to_value']['field'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['operator'] = '>=';
	$handler->display->display_options['filters']['field_job_height_to_value']['group'] = 1;
	$handler->display->display_options['filters']['field_job_height_to_value']['exposed'] = TRUE;
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator_id'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['label'] = '身高上限';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['operator'] = 'field_job_height_to_value_op';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['identifier'] = 'field_job_height_to_value';
	$handler->display->display_options['filters']['field_job_height_to_value']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Content: Title */
	$handler->display->display_options['filters']['title']['id'] = 'title';
	$handler->display->display_options['filters']['title']['table'] = 'node';
	$handler->display->display_options['filters']['title']['field'] = 'title';
	$handler->display->display_options['filters']['title']['operator'] = 'word';
	$handler->display->display_options['filters']['title']['group'] = 1;
	$handler->display->display_options['filters']['title']['exposed'] = TRUE;
	$handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
	$handler->display->display_options['filters']['title']['expose']['label'] = '职位名称';
	$handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
	$handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
	$handler->display->display_options['filters']['title']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	/* Filter criterion: Flags: Flagged */
	$handler->display->display_options['filters']['flagged']['id'] = 'flagged';
	$handler->display->display_options['filters']['flagged']['table'] = 'flag_content';
	$handler->display->display_options['filters']['flagged']['field'] = 'flagged';
	$handler->display->display_options['filters']['flagged']['relationship'] = 'flag_content_rel';
	$handler->display->display_options['filters']['flagged']['value'] = 'All';
	$handler->display->display_options['filters']['flagged']['group'] = 1;
	$handler->display->display_options['filters']['flagged']['exposed'] = TRUE;
	$handler->display->display_options['filters']['flagged']['expose']['operator_id'] = '';
	$handler->display->display_options['filters']['flagged']['expose']['label'] = '收藏';
	$handler->display->display_options['filters']['flagged']['expose']['operator'] = 'flagged_op';
	$handler->display->display_options['filters']['flagged']['expose']['identifier'] = 'flagged';
	$handler->display->display_options['filters']['flagged']['expose']['remember_roles'] = array(
		2=>'2',
		1=>0,
		3=>0,
		4=>0,
	);
	$handler->display->display_options['path'] = 'hunter_all_job_list';
	$handler->display->display_options['menu']['type'] = 'normal';
	$handler->display->display_options['menu']['title'] = '招聘信息';
	$handler->display->display_options['menu']['description'] = 'show open job list';
	$handler->display->display_options['menu']['weight'] = '0';
	$handler->display->display_options['menu']['name'] = 'main-menu';
	$handler->display->display_options['menu']['context'] = 0;
	$translatables['job_list'] = array(
		t('Master'),
		t('job_list'),
		t('more'),
		t('Apply'),
		t('Reset'),
		t('Sort by'),
		t('Asc'),
		t('Desc'),
		t('Items per page'),
		t('- All -'),
		t('Offset'),
		t('« first'),
		t('‹ previous'),
		t('next ›'),
		t('last »'),
		t('sex'),
		t('height from'),
		t('height to'),
		t('city'),
		t('Post date'),
		t('Updated date'),
		t('city (field_job_city)'),
		t('job type (field_job_job_type)'),
		t('sex (field_job_sex)'),
		t('height from (field_job_height_from)'),
		t('height to (field_job_height_to)'),
		t('Job title'),
		t('All job'),
		t('All job list'),
		t('My job list'),
		t('author'),
		t('Hunter all job'),
		t('flag'),
		t('Profile'),
		t('Sex'),
		t('备注'),
		t('<div class="left">
  <div>
    <div class="sex">性别:[field_job_sex]</div>
    <div class="city">城市:[field_job_city]</div>
  </div>
  <div class="height">身高:[field_job_height_from]-[field_job_height_to]</div>
  <div class="city">备注:[field_job_note]</div>
</div>
<div class="date">[changed]</div>'),
		t('发布日期'),
		t('城市'),
		t('行业类型'),
		t('职位类别'),
		t('最高学历'),
		t('性别'),
		t('身高下限'),
		t('身高上限'),
		t('职位名称'),
		t('收藏'),
	);
	$views[$view->name] = $view;
	return $views;
}
