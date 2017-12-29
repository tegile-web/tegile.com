<?php

function post_type_release(){

	register_post_type('release',
		array(
			'labels' => array(
				'name'               => "Release",
				'singular_name'      => "Release",
				'menu_name'          => "Releases",
				'all_items'          => "Releases",
				'add_new'            => "Add Release",
				'add_new_item'       => "Add New Release",
				'edit_item'          => "Edit Release",
			    'new_item'           => "New Release",
			    'view_item'          => "View",
			    'search_items'       => "Search Releases",
			    'not_found'          => "No releases found",
			    'not_found_in_trash' => "No releases found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Release",
			'menu_icon'			  => "dashicons-format-aside",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 20,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'release','with_front' => false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_release' );
