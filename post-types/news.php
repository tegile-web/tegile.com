<?php

function post_type_news(){

	register_post_type('news',
		array(
			'labels' => array(
				'name'               => "News",
				'singular_name'      => "News",
				'menu_name'          => "News",
				'all_items'          => "News",
				'add_new'            => "Add News",
				'add_new_item'       => "Add New News",
				'edit_item'          => "Edit News",
			    'new_item'           => "New News",
			    'view_item'          => "View",
			    'search_items'       => "Search News",
			    'not_found'          => "No news found",
			    'not_found_in_trash' => "No news found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "News",
			'menu_icon'			  => "dashicons-megaphone",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 20,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'news','with_front' => false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_news' );
