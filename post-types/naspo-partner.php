<?php

function post_type_naspo_partner(){

	register_post_type('naspo_partner',
		array(
			'labels' => array(
				'name'               => "Naspo Partner",
				'singular_name'      => "Naspo Partner",
				'menu_name'          => "Naspo Partners",
				'all_items'          => "Naspo Partners",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Naspo Partner",
				'edit_item'          => "Edit Naspo Partner",
			    'new_item'           => "New Naspo Partner",
			    'view_item'          => "View",
			    'search_items'       => "Search Naspo Partners",
			    'not_found'          => "No Naspo Partners found",
			    'not_found_in_trash' => "No Naspo Partners found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Naspo Partners",
			'menu_icon'           => "dashicons-businessman",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 55,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'naspo-partner','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_naspo_partner' );
