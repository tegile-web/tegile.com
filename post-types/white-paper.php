<?php

function post_type_white_paper(){

	register_post_type('white_paper',
		array(
			'labels' => array(
				'name'               => "White Paper",
				'singular_name'      => "White Paper",
				'menu_name'          => "White Papers",
				'all_items'          => "White Papers",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New White Paper",
				'edit_item'          => "Edit White Paper",
			    'new_item'           => "New White Paper",
			    'view_item'          => "View",
			    'search_items'       => "Search White Papers",
			    'not_found'          => "No White Papers found",
			    'not_found_in_trash' => "No White Papers found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "White Papers",
			'menu_icon'           => "dashicons-feedback",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 45,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'resources/white-papers','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_white_paper' );
