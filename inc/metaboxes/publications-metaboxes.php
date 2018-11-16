<?php

add_action( 'cmb2_admin_init', 'publications_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function publications_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'publications_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ПОСТОВ ПУБЛИКАЦИЙ', 'cmb2' ),
    'object_types'  => 'publications',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

  $cmb->add_field( array(
  	'name' => 'Введите краткое описание публикации',
  	'id' => 'publications_description',
  	'type' => 'textarea_small'
  ) );

}
