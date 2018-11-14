<?php

add_action( 'cmb2_admin_init', 'works_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function works_metaboxes() {


	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'works_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ РАБОТ ХУДОЖНИКОВ', 'cmb2' ),
    'object_types'  => 'works',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Описание работы', 'cmb2' ),
		'id'         => 'works_short_description',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
	) );

  $cmb->add_field( array(
  	'name'             => 'Статус продажи',
  	'id'               => 'works_sale_status',
  	'type'             => 'select',
  	'default'          => 'standard',
  	'options'          => array(
  		'Доступна' => __( 'Доступна', 'cmb2' ),
  		'Продана'   => __( 'Продана', 'cmb2' ),
  	),
  ));

}
