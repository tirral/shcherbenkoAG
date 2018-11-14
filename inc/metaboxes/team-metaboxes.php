<?php

add_action( 'cmb2_admin_init', 'team_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function team_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'team_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ПОСТОВ КОМАНДЫ', 'cmb2' ),
    'object_types'  => 'team',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Должность', 'cmb2' ),
		'desc'       => __( 'Введите заголовок для блока художников', 'cmb2' ),
		'id'         => 'team_position',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value

	) );

  $cmb->add_field( array(
		'name'       => __( 'Номер телефона 1', 'cmb2' ),
		'desc'       => __( 'Введите заголовок для блока художников', 'cmb2' ),
		'id'         => 'team_phone_number_1',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value

	) );

  $cmb->add_field( array(
		'name'       => __( 'Номер телефона 2', 'cmb2' ),
		'desc'       => __( 'Введите заголовок для блока художников', 'cmb2' ),
		'id'         => 'team_phone_number_2',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value

	) );

  $cmb->add_field( array(
    'name'       => __( 'E-Mail', 'cmb2' ),
    'desc'       => __( 'Введите заголовок для блока художников', 'cmb2' ),
    'id'         => 'team_email',
    'type'       => 'text',
    'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value

  ) );
}
