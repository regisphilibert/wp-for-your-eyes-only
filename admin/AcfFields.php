<?php
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5a284fca85a33',
		'title' => 'For Your Eyes Only',
		'fields' => array(
			array(
				'key' => 'field_5a284fefd6339',
				'label' => 'Debug Users',
				'name' => 'js_debug_users',
				'type' => 'user',
				'instructions' => 'Who are the debug users?',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'role' => '',
				'allow_null' => 0,
				'multiple' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'fyeo-admin-page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;