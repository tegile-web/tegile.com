<?php

function post_type_case_study(){

	register_post_type('case_study',
		array(
			'labels' => array(
				'name'               => "Case Study",
				'singular_name'      => "Case Study",
				'menu_name'          => "Case Studies",
				'all_items'          => "Case Studies",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Case Study",
				'edit_item'          => "Edit Case Study",
			    'new_item'           => "New Case Study",
			    'view_item'          => "View",
			    'search_items'       => "Search Case Studies",
			    'not_found'          => "No Case Studies found",
			    'not_found_in_trash' => "No Case Studies found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Case Studies",
			'menu_icon'           => "dashicons-groups",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 45,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'resources/case-studies','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_case_study' );
