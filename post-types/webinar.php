<?php

function post_type_webinar(){

	register_post_type('webinar',
		array(
			'labels' => array(
				'name'               => "Webinar",
				'singular_name'      => "Webinar",
				'menu_name'          => "Webinars",
				'all_items'          => "Webinars",
				'add_new'            => "Add Webinar",
				'add_new_item'       => "Add New Webinar",
				'edit_item'          => "Edit Webinar",
			    'new_item'           => "New Webinar",
			    'view_item'          => "View",
			    'search_items'       => "Search Webinars",
			    'not_found'          => "No webinars found",
			    'not_found_in_trash' => "No webinars found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Webinar",
			'menu_icon'			  => "dashicons-format-video",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 20,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'webinar','with_front' => false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

	// register_taxonomy('webinar_category', 'webinar', array(
	// 	'labels' => array(
	// 		'name'                       => 'Webinar Category',
	// 		'singular_name'              => 'Category',
	// 		'menu_name'                  => 'Categories',
	// 		'all_items'                  => 'All Webinar Categories',
	// 		'parent_item'                => 'Parent Category',
	// 		'parent_item_colon'          => 'Parent Category:',
	// 		'new_item_name'              => 'New Category Name',
	// 		'add_new_item'               => 'Add New Webinar Category',
	// 		'edit_item'                  => 'Edit Webinar Category',
	// 		'update_item'                => 'Update Webinar Category',
	// 		'separate_items_with_commas' => 'Separate webinar types with commas',
	// 		'search_items'               => 'Search webinar types',
	// 		'add_or_remove_items'        => 'Add or remove webinar types',
	// 		'choose_from_most_used'      => 'Choose from the most used types'
	// 	),
	// 	'hierarchical'      => true,
	// 	'public'            => true,
	// 	'show_ui'           => true,
	// 	'show_admin_column' => true,
	// 	'show_in_nav_menus' => true,
	// 	'show_tagcloud'     => true,
	// 	'rewrite' => array(
	// 		'slug' => 'webinar',
	// 		'with_front' => false,
	// 		'hierarchical' => true
	// 		)
	// 	)
	// );

} add_action( 'init', 'post_type_webinar' );
