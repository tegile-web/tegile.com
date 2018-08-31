<?php

function resource_custom_taxonomies(){

	// Switch these to include the 'webinar' posty type in using this taxonomy
	// register_taxonomy('use_case', array( 'case_study','product_info','report','video','webinar' ), array(
	register_taxonomy('use_case', array( 'case_study','product_info','white_paper','video' ), array(
		'labels' => array(
			'name'                       => 'Use Case',
			'singular_name'              => 'Use Case',
			'menu_name'                  => 'Use Cases',
			'all_items'                  => 'All Use Cases',
			'parent_item'                => 'Parent Use Case',
			'parent_item_colon'          => 'Parent Use Case:',
			'new_item_name'              => 'New Use Case',
			'add_new_item'               => 'Add New Use Case',
			'edit_item'                  => 'Edit Use Case',
			'update_item'                => 'Update Use Case',
			'separate_items_with_commas' => 'Separate Use Cases with commas',
			'search_items'               => 'Search Use Cases',
			'add_or_remove_items'        => 'Add or remove Use Cases',
			'choose_from_most_used'      => 'Choose from the most common Use Cases'
		),
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite' => array(
			'slug' => '',
			'with_front' => false,
			'hierarchical' => true
			)
		)
	);

} add_action( 'init', 'resource_custom_taxonomies', 15 );
