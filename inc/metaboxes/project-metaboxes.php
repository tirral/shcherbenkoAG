<?php

add_action( 'cmb2_admin_init', 'project_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function project_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'project_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ПОСТОВ ПРОЕКТОВ', 'cmb2' ),
    'object_types'  => 'project',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Время проведения', 'cmb2' ),
		'id'         => 'project_time',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value

	) );


	$cmb->add_field(array(
			'name' => '1 изображение слайдера',
			'id'   => 'project_gallery_1',
			'type' => 'file',
			'options' => array(
					'url' => false, // Hide the text input for the url
			),
			'text'    => array(
					'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
			),
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );


	$cmb->add_field(array(
			'name' => '2 изображение слайдера',
			'id'   => 'project_gallery_2',
			'type' => 'file',
			'options' => array(
					'url' => false, // Hide the text input for the url
			),
			'text'    => array(
					'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
			),
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );


	$cmb->add_field(array(
			'name' => '3 изображение слайдера',
			'id'   => 'project_gallery_3',
			'type' => 'file',
			'options' => array(
					'url' => false, // Hide the text input for the url
			),
			'text'    => array(
					'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
			),
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );


	$cmb->add_field(array(
			'name' => '4 изображение слайдера',
			'id'   => 'project_gallery_4',
			'type' => 'file',
			'options' => array(
					'url' => false, // Hide the text input for the url
			),
			'text'    => array(
					'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
			),
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );


}
