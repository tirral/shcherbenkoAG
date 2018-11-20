<?php

/**
 * This file registers the Myxi_publications custom post type
 *
 */


// Register the Myxi_publications custom post type
function shcherbenko_toolbox_register_myxi_publications() {

	$slug = apply_filters( 'shcherbenko_clients_rewrite_slug', 'myxi_publications' );

	$labels = array(
		'name'                  => _x( 'Myxi_publications', 'Post Type General Name', 'shcherbenko_toolbox' ),
		'singular_name'         => _x( 'Myxi_publications', 'Post Type Singular Name', 'shcherbenko_toolbox' ),
		'menu_name'             => __( 'Myxi_publications', 'shcherbenko_toolbox' ),
		'name_admin_bar'        => __( 'Myxi_publications', 'shcherbenko_toolbox' ),
		'archives'              => __( 'Item Archives', 'shcherbenko_toolbox' ),
		'parent_item_colon'     => __( 'Parent Item:', 'shcherbenko_toolbox' ),
		'all_items'             => __( 'All Myxi_publications', 'shcherbenko_toolbox' ),
		'add_new_item'          => __( 'Add New Myxi_publications', 'shcherbenko_toolbox' ),
		'add_new'               => __( 'Add New Myxi_publications', 'shcherbenko_toolbox' ),
		'new_item'              => __( 'New Myxi_publications', 'shcherbenko_toolbox' ),
		'edit_item'             => __( 'Edit Myxi_publications', 'shcherbenko_toolbox' ),
		'update_item'           => __( 'Update Myxi_publications', 'shcherbenko_toolbox' ),
		'view_item'             => __( 'View Myxi_publications', 'shcherbenko_toolbox' ),
		'search_items'          => __( 'Search Myxi_publications', 'shcherbenko_toolbox' ),
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
		'label'                 => __( 'Myxi_publications', 'shcherbenko_toolbox' ),
		'description'           => __( 'A post type for your myxi_publications', 'shcherbenko_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'myxi_publications_tupes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),
	);
	register_post_type( 'myxi_publications', $args );

}

add_action( 'init', 'shcherbenko_toolbox_register_myxi_publications', 0 );


// Register the Myxi_publications taxonomy
	add_action( 'init', 'create_myxi_publications_tupes_year' );

	function create_myxi_publications_tupes_year() {
		register_taxonomy(
			'myxi_year',
			'myxi_publications',
			array(
				'label' => __( 'Myxi_year' ),
				'rewrite' => array( 'slug' => 'myxi_year' ),
				'hierarchical' => true,
			)
		);
	}


  // Register the Myxi_publications taxonomy
  	add_action( 'init', 'create_myxi_publications_tupes_type' );

  	function create_myxi_publications_tupes_type() {
  		register_taxonomy(
  			'publications_type',
  			'myxi_publications',
  			array(
  				'label' => __( 'Publications_type' ),
  				'rewrite' => array( 'slug' => 'publications_type' ),
  				'hierarchical' => true,
  			)
  		);
  	}
