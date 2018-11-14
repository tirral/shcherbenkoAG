<?php

add_action( 'cmb2_admin_init', 'home_page_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function home_page_metaboxes() {


	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'test_metabox',
		'title'         => __( 'НАСТРОЙКИ ГЛАВНОЙ СТРАНИЦЫ', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
    'show_on'       => array( 'key' => 'page-template', 'value' => "page-templates/page_home.php" ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Блок Художников', 'cmb2' ),
		'desc'       => __( 'Введите заголовок для блока художников', 'cmb2' ),
		'id'         => 'home_page_artists_header',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );




  // Regular text field
  $cmb->add_field( array(
    'name'       => __( 'Блок Публикаций', 'cmb2' ),
    'desc'       => __( 'Введите заголовок для блока публикаций', 'cmb2' ),
    'id'         => 'home_page_publications_header',
    'type'       => 'text',
    'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
    // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
    // 'on_front'        => false, // Optionally designate a field to wp-admin only
    // 'repeatable'      => true,
  ) );

}
