<?php

function post_type_landing_page(){

	register_post_type('landing_page',
		array(
			'labels' => array(
				'name'               => "Landing Page",
				'singular_name'      => "Landing Page",
				'menu_name'          => "Landing Pages",
				'all_items'          => "Landing Pages",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Landing Page",
				'edit_item'          => "Edit Landing Page",
			    'new_item'           => "New Landing Page",
			    'view_item'          => "View",
			    'search_items'       => "Search Landing Pages",
			    'not_found'          => "No Landing Pages found",
			    'not_found_in_trash' => "No Landing Pages found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Landing Page",
			'menu_icon'           => "dashicons-editor-table",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 55,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'launch','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_landing_page' );
