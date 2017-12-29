<?php

function post_type_video(){

	register_post_type('video',
		array(
			'labels' => array(
				'name'               => "Video",
				'singular_name'      => "Video",
				'menu_name'          => "Videos",
				'all_items'          => "Videos",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Video",
				'edit_item'          => "Edit Video",
			    'new_item'           => "New Video",
			    'view_item'          => "View",
			    'search_items'       => "Search Videos",
			    'not_found'          => "No Videos found",
			    'not_found_in_trash' => "No Videos found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Videos",
			'menu_icon'           => "dashicons-video-alt",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 45,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'resources/videos','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_video' );
