<?php

/**
 * This file registers the Capabilities custom post type
 *
 */


// Register the Capabilities custom post type
function shcherbenko_toolbox_register_capabilities() {

	$slug = apply_filters( 'shcherbenko_clients_rewrite_slug', 'capabilities' );

	$labels = array(
		'name'                  => _x( 'Capabilities', 'Post Type General Name', 'shcherbenko_toolbox' ),
		'singular_name'         => _x( 'Capabilities', 'Post Type Singular Name', 'shcherbenko_toolbox' ),
		'menu_name'             => __( 'Capabilities', 'shcherbenko_toolbox' ),
		'name_admin_bar'        => __( 'Capabilities', 'shcherbenko_toolbox' ),
		'archives'              => __( 'Item Archives', 'shcherbenko_toolbox' ),
		'parent_item_colon'     => __( 'Parent Item:', 'shcherbenko_toolbox' ),
		'all_items'             => __( 'All Capabilities', 'shcherbenko_toolbox' ),
		'add_new_item'          => __( 'Add New Capabilities', 'shcherbenko_toolbox' ),
		'add_new'               => __( 'Add New Capabilities', 'shcherbenko_toolbox' ),
		'new_item'              => __( 'New Capabilities', 'shcherbenko_toolbox' ),
		'edit_item'             => __( 'Edit Capabilities', 'shcherbenko_toolbox' ),
		'update_item'           => __( 'Update Capabilities', 'shcherbenko_toolbox' ),
		'view_item'             => __( 'View Capabilities', 'shcherbenko_toolbox' ),
		'search_items'          => __( 'Search Capabilities', 'shcherbenko_toolbox' ),
		'not_found'             => __( 'Not found', 'shcherbenko_toolbox' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'shcherbenko_toolbox' ),
		'featured_image'        => __( 'Featured Image', 'shcherbenko_toolbox' ),
		'set_featured_image'    => __( 'Set featured image', 'shcherbenko_toolbox' ),
		'remove_featured_image' => __( 'Remove featured image', 'shcherbenko_toolbox' ),
		'use_featured_image'    => __( 'Use as featured image', 'shcherbenko_toolbox' ),
		'insert_into_item'      => __( 'Insert into item', 'shcherbenko_toolbox' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'shcherbenko_toolbox' ),
		'items_list'            => __( 'Items list', 'shcherbenko_toolbox' ),
		'items_list_navigation' => __( 'Items list navigation', 'shcherbenko_toolbox' ),
		'filter_items_list'     => __( 'Filter items list', 'shcherbenko_toolbox' ),
	);



	$args = array(
		'label'                 => __( 'Capabilities', 'shcherbenko_toolbox' ),
		'description'           => __( 'A post type for your capabilities', 'shcherbenko_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'capabilities_tupes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-nametag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),
	);
	register_post_type( 'capabilities', $args );

}

add_action( 'init', 'shcherbenko_toolbox_register_capabilities', 0 );






// Register the Capabilities taxonomy
	add_action( 'init', 'create_capabilities_tupes' );

	function create_capabilities_tupes() {
		register_taxonomy(
			'capabilities_tupes',
			'capabilities',
			array(
				'label' => __( 'Capabilities_tupes' ),
				'rewrite' => array( 'slug' => 'capabilities_tupes' ),
				'hierarchical' => true,
			)
		);
	}
