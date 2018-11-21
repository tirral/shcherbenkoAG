<?php

add_action( 'cmb2_admin_init', 'capabilities_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function capabilities_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'capabilities_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ПОСТОВ ВОЗМОЖНОСТИ', 'cmb2' ),
    'object_types'  => 'capabilities',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );


  $cmb->add_field( array(
  	'name' => 'Введите время работы',
  	'id' => 'capabilities_working_hours',
  	'type' => 'text',
  ) );

}
