<?php

function post_type_product_info(){

	register_post_type('product_info',
		array(
			'labels' => array(
				'name'               => "Product Info",
				'singular_name'      => "Product Info",
				'menu_name'          => "Product Info",
				'all_items'          => "Product Info",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New Product Info",
				'edit_item'          => "Edit Product Info",
			    'new_item'           => "New Product Info",
			    'view_item'          => "View",
			    'search_items'       => "Search Product Info",
			    'not_found'          => "No Product Info found",
			    'not_found_in_trash' => "No Product Info found in Trash",
			    'parent_item_colon'  => ""
			),
			'description'         => "Product Info",
			'menu_icon'           => "dashicons-book",
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 45,//<-- Set back to 35 after testing
			'has_archive'         => false,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'rewrite'             => array('slug'=>'resources/product-info','with_front'=>false),
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail')
		)
	);

} add_action( 'init', 'post_type_product_info' );
