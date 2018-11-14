<?php
add_action( 'cmb2_admin_init', 'aboutus_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function aboutus_metaboxes() {

	/**
	 * Initiate the metabox for post type team
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'aboutus_metabox',
		'title'         => __( 'НАСТРОЙКИ СТРАНИЦЫ О НАС', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
    'show_on'       => array( 'key' => 'page-template', 'value' => "page-templates/page_aboutus.php" ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

		 $cmb->add_field(array(
         'name' => '1 изображение слайдера',
         'id'   => 'aboutus_gallery_1',
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
         'id'   => 'aboutus_gallery_2',
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
         'id'   => 'aboutus_gallery_3',
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
         'id'   => 'aboutus_gallery_4',
         'type' => 'file',
         'options' => array(
             'url' => false, // Hide the text input for the url
         ),
         'text'    => array(
             'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
         ),
         'preview_size' => 'medium', // Image size to use when previewing in the admin.
     ) );

		 $cmb->add_field( array(
         'name' => '1 направление деятельности',
         'id'   => 'aboutus_activity_1',
         'type' => 'textarea_small',
     ) );
		 $cmb->add_field( array(
         'name' => '2 направление деятельности',
         'id'   => 'aboutus_activity_2',
         'type' => 'textarea_small',
     ) );
		 $cmb->add_field( array(
					'name' => '3 направление деятельности',
					'id'   => 'aboutus_activity_3',
					'type' => 'textarea_small',
			) );
			$cmb->add_field( array(
					'name' => '4 направление деятельности',
					'id'   => 'aboutus_activity_4',
					'type' => 'textarea_small',
			) );

			$cmb->add_field( array(
				'name'       => __( 'Блок карты название', 'cmb2' ),
				'id'         => 'aboutus_card_block_name',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats',
			) );

			$cmb->add_field( array(
				'name'       => __( 'Блок карты адрес', 'cmb2' ),
				'id'         => 'aboutus_card_block_address',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats',
			) );

			$cmb->add_field( array(
				'name'       => __( 'Блок карты условие посещения', 'cmb2' ),
				'id'         => 'aboutus_card_block_visit_condition',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats',
			) );

			$cmb->add_field( array(
				'name'       => __( 'Рабочие дни', 'cmb2' ),
				'id'         => 'aboutus_working_days',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats',
			) );

			$cmb->add_field( array(
				'name'       => __( 'Выходные дни', 'cmb2' ),
				'id'         => 'aboutus_weekend',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats', 
			) );
}
