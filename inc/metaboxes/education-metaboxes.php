<?php

add_action( 'cmb2_admin_init', 'educationon_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function educationon_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'educationon_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ПОСТОВ ОБРАЗОВАНИЯ', 'cmb2' ),
    'object_types'  => 'education',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

  $cmb->add_field( array(
  	'name' => 'Введите время работы',
  	'id' => 'education_working_hours',
  	'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => 'Введите краткое описание',
    'id' => 'education_short_description',
    'type' => 'textarea_small',
  ) );

	$cmb->add_field( array(
		'name' => 'Введите имя лектора',
		'id' => 'education_lecturer',
		'type' => 'text',
	) );

	$cmb->add_field( array(
  	'name'             => 'Статус входа',
  	'id'               => 'education_visit_mode',
  	'type'             => 'select',
  	'default'          => 'standard',
  	'options'          => array(
  	'Вхід вільний' => __( 'Вхід вільний', 'cmb2' ),
  	'Вхід платний'   => __( 'Вхід платний', 'cmb2' ),
  	),
  ));




}
