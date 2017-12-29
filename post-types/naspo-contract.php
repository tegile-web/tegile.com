<?php

function post_type_naspo_contract(){

	register_post_type('naspo_contract',
		array(
			'labels' => array(
				'name'               => "Naspo Contract",
				'singular_name'      => "Naspo Contract",
				'menu_name'          => "Naspo Contracts",
				'all_items'          => "Naspo Contracts",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Naspo Contract",
				'edit_item'          => "Edit Naspo Contract",
			    'new_item'           => "New Naspo Contract",
			    'view_item'          => "View",
			    'search_items'       => "Search Naspo Contracts",
			    'not_found'          => "No Naspo Contracts found",
			    'not_found_in_trash' => "No Naspo Contracts found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Naspo Contracts",
			'menu_icon'           => "dashicons-index-card",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 55,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'naspo','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_naspo_contract' );
