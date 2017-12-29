<?php

function post_type_award(){

	register_post_type('award',
		array(
			'labels' => array(
				'name'               => "Award",
				'singular_name'      => "Award",
				'menu_name'          => "Awards",
				'all_items'          => "Awards",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Award",
				'edit_item'          => "Edit Award",
			    'new_item'           => "New Award",
			    'view_item'          => "View",
			    'search_items'       => "Search Awards",
			    'not_found'          => "No awards found",
			    'not_found_in_trash' => "No awards found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Awards",
			'menu_icon'			  => "dashicons-awards",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 20,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'award','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail','page-attributes')
		)
	);

} add_action( 'init', 'post_type_award' );
