<?php

function post_type_content_hub(){

	register_post_type('content_hub',
		array(
			'labels' => array(
				'name'               => "Content Hub",
				'singular_name'      => "Content Hub",
				'menu_name'          => "Content Hubs",
				'all_items'          => "Content Hubs",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Content Hub",
				'edit_item'          => "Edit Content Hub",
			    'new_item'           => "New Content Hub",
			    'view_item'          => "View",
			    'search_items'       => "Search Content Hubs",
			    'not_found'          => "No content hubs found",
			    'not_found_in_trash' => "No content hubs found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Content Hub",
			'menu_icon'           => "dashicons-layout",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 55,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'content','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_content_hub' );
