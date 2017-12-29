<?php

function post_type_popup(){

	register_post_type('popup',
		array(
			'labels' => array(
				'name'               => "Popup",
				'singular_name'      => "Popup",
				'menu_name'          => "Popups",
				'all_items'          => "Popups",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Popup",
				'edit_item'          => "Edit Popup",
			    'new_item'           => "New Popup",
			    'view_item'          => "View",
			    'search_items'       => "Search Popups",
			    'not_found'          => "No Popups found",
			    'not_found_in_trash' => "No Popups found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Popups",
			'menu_icon'           => "dashicons-align-center",
			'public'              => true,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 40,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			// 'rewrite'             => array('slug'=>'popups','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor'),
		)
	);

} add_action( 'init', 'post_type_popup' );
