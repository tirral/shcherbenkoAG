<?php
add_action( 'cmb2_admin_init', 'artists_metabox' );
/**
 * Define the metabox and field configurations.
 */
function artists_metabox() {

//    Main metabox
    $cmb = new_cmb2_box(array(
        'id' => 'artists_metabox',
        'title' => __('Художник', 'odev'),
        'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
        'taxonomies'       => array( 'artists' ), // Tells CMB2 which taxonomies should have these fields
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
    ));

    $cmb->add_field( array(
      'name'       => __( 'Дата рождения художника', 'cmb2' ),
      'id'         => 'artists_date_of_birth',
      'type'       => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    $cmb->add_field( array(
    	'name'    => 'Биография художника',
    	'id'      => 'artists_biography',
    	'type'    => 'wysiwyg',
    	'options' => array(),
    ) );

    $group_field_id = $cmb->add_field( array(
    	'id'          => 'artists_exhibitions',
    	'type'        => 'group',
      'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
      'taxonomies'       => array( 'artists' ), // Tells CMB2 which taxonomies should have these fields
    	'description' => __( 'Generates reusable form entries', 'cmb2' ),
      	'options'     => array(
    		'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
    		'remove_button' => __( 'Remove Entry', 'cmb2' ),
    		'sortable'      => true, // beta
    	),
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name'       => __( 'Год проведения персональной выставки', 'cmb2' ),
      'id'         => 'artists_exhibitions_data',
      'type'       => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    $cmb->add_group_field( $group_field_id, array(
    	'name' => 'Название первой персональной выставки',
    	'id'   => 'artists_exhibitions_name_1',
    	'type' => 'textarea_small',
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Название второй персональной выставки',
      'id'   => 'artists_exhibitions_name_2',
      'type' => 'textarea_small',
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Название третей персональной выставки',
      'id'   => 'artists_exhibitions_name_3',
      'type' => 'textarea_small',
    ) );

    $group_field_id = $cmb->add_field( array(
      'id'          => 'artists_group_exhibitions',
      'type'        => 'group',
      'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
      'taxonomies'       => array( 'artists' ), // Tells CMB2 which taxonomies should have these fields
      'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'options'     => array(
        'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true, // beta
      ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name'       => __( 'Год проведения груповой выставки', 'cmb2' ),
      'id'         => 'artists_group_exhibitions_data',
      'type'       => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Название первой груповой выставки',
      'id'   => 'artists_group_exhibitions_name_1',
      'type' => 'textarea_small',
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Название второй груповой выставки',
      'id'   => 'artists_group_exhibitions_name_2',
      'type' => 'textarea_small',
    ) );

    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Название третей груповой выставки',
      'id'   => 'artists_group_exhibitions_name_3',
      'type' => 'textarea_small',
    ) );

}
