<?php
add_action( 'cmb2_admin_init', 'myxi_metabox' );
/**
 * Define the metabox and field configurations.
 */
function myxi_metabox() {


  /**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'myxi_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ВЫСТАВКИ', 'cmb2' ),
    'object_types'  => 'myxi',  // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$cmb->add_field(array(
		'name'       => __( 'Введите год проведения конкурса', 'cmb2' ),
		'id'         => 'myxi_year',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
	) );


	/**
	 *  НАЧАЛО Галерея
	 */

	$cmb->add_field( array(
		'name' => 'Рисунки для галереи',
		'id'   => 'myxi_gallery',
		'type' => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
			'remove_image_text' => 'Replacement', // default: "Remove Image"
			'file_text' => 'Replacement', // default: "File:"
			'file_download_text' => 'Replacement', // default: "Download"
			'remove_text' => 'Replacement', // default: "Remove"
		),
	) );
	/**
	 *  КОНЕЦ Галерея
	 */



	 /**
 	 *  НАЧАЛО Pаздела публикаций
 	 */

	$cmb->add_field(array(
		'name'       => __( 'Название раздела публикаций, посвящённое интервью с экспертами', 'cmb2' ),
		'id'         => 'myxi_publication_interview_name',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
	) );

	$cmb->add_field(array(
			'name' => 'Изображение раздела публикаций, посвящённое интервью с экспертами',
			'id'   => 'myxi_publication_interview_img',
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
		'name'       => __( 'Название раздела публикаций, посвящённое выставкам', 'cmb2' ),
		'id'         => 'myxi_publication_exhibition_name',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
	) );


	$cmb->add_field(array(
			'name' => 'Изображение раздела публикаций, посвящённое выставкам',
			'id'   => 'myxi_publication_exhibition_img',
			'type' => 'file',
			'options' => array(
					'url' => false, // Hide the text input for the url
			),
			'text'    => array(
					'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
			),
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );




	/**
  *  КОНЕЦ Pаздела публикаций
  */




	/**
	 *  НАЧАЛО Победитель конкурса МУХi
	 */
    $group_field_id = $cmb->add_field( array(
    	'id'          => 'myxi_winner',
    	'type'        => 'group',
      'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
    	'description' => __( 'Generates reusable form entries', 'cmb2' ),
      	'options'     => array(
    		'group_title'   => __( 'Победитель конкурса МУХi {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
    		'remove_button' => __( 'Remove Entry', 'cmb2' ),
    		'sortable'      => true, // beta
    	),
    ) );
    $cmb->add_group_field( $group_field_id, array(
      'name'       => __( 'Имя и фамилия победителя', 'cmb2' ),
      'id'         => 'winner_name',
      'type'       => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ) );
    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Фотография победителя',
      'id'   => 'winner_img',
      'type' => 'file',
      'options' => array(
          'url' => false, // Hide the text input for the url
      ),
      'text'    => array(
          'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
      ),
      'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );
    $cmb->add_group_field( $group_field_id, array(
    	'name' => 'Краткое описание',
    	'id'   => 'winner_description',
    	'type'       => 'text',
    ) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'Город проживания',
			'id'   => 'winner_location',
			'type'       => 'text',
		) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'Ссылка на публикацию',
			'id'   => 'winner_url',
			'type' => 'text',
		) );
		/**
		 *  КОНЕЦ  Победитель конкурса МУХi
		 */


		 /**
		  *  НАЧАЛО ПРИЗЕРЫ конкурса МУХi
		  */
		 	$group_field_id = $cmb->add_field( array(
		 		'id'          => 'myxi_prizewinner',
		 		'type'        => 'group',
		 		'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
		 		'description' => __( 'Generates reusable form entries', 'cmb2' ),
		 			'options'     => array(
		 			'group_title'   => __( 'Призеры конкурса МУХi {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		 			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
		 			'remove_button' => __( 'Remove Entry', 'cmb2' ),
		 			'sortable'      => true, // beta
		 		),
		 	) );
		 	$cmb->add_group_field( $group_field_id, array(
		 		'name'       => __( 'Имя и фамилия призера', 'cmb2' ),
		 		'id'         => 'prizewinner_name',
		 		'type'       => 'text',
		 		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		 	) );
		 	$cmb->add_group_field( $group_field_id, array(
		 		'name' => 'Фотография призера',
		 		'id'   => 'prizewinner_img',
		 		'type' => 'file',
		 		'options' => array(
		 				'url' => false, // Hide the text input for the url
		 		),
		 		'text'    => array(
		 				'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
		 		),
		 		'preview_size' => 'medium', // Image size to use when previewing in the admin.
		 	) );
		 	$cmb->add_group_field( $group_field_id, array(
		 		'name' => 'Краткое описание',
		 		'id'   => 'prizewinner_description',
		 		'type'       => 'text',
		 	) );
		 	$cmb->add_group_field( $group_field_id, array(
		 		'name' => 'Город проживания',
		 		'id'   => 'prizewinner_location',
		 		'type'       => 'text',
		 	) );
		 	$cmb->add_group_field( $group_field_id, array(
		 		'name' => 'Ссылка на публикацию',
		 		'id'   => 'prizewinner_url',
		 		'type' => 'text',
		 	) );
		 	/**
		 	 *  КОНЕЦ  ПРИЗЕРЫ конкурса МУХi
		 	 */



			 /**
			  *  НАЧАЛО ФИНАЛИСТЫ конкурса МУХi
			  */
			 	$group_field_id = $cmb->add_field( array(
			 		'id'          => 'myxi_finalists',
			 		'type'        => 'group',
			 		'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
			 		'description' => __( 'Generates reusable form entries', 'cmb2' ),
			 			'options'     => array(
			 			'group_title'   => __( 'Финалисты конкурса МУХi {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			 			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			 			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			 			'sortable'      => true, // beta
			 		),
			 	) );
				 	$cmb->add_group_field( $group_field_id, array(
				 		'name'       => __( 'Имя и фамилия призера', 'cmb2' ),
				 		'id'         => 'finalists_name',
				 		'type'       => 'text',
				 		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
				 	) );
				 	$cmb->add_group_field( $group_field_id, array(
				 		'name' => 'Ссылка на публикацию',
				 		'id'   => 'finalists_url',
				 		'type' => 'text',
				 	) );
			 	/**
			 	 *  КОНЕЦ ФИНАЛИСТЫ конкурса МУХi
			 	 */












	/**
	 *  НАЧАЛО Члени міжнародної експертної комісії
	 */
    $group_field_id = $cmb->add_field( array(
    	'id'          => 'myxi_experts',
    	'type'        => 'group',
      'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
    	'description' => __( 'Generates reusable form entries', 'cmb2' ),
      	'options'     => array(
    		'group_title'   => __( 'Члени міжнародної експертної комісії {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
    		'remove_button' => __( 'Remove Entry', 'cmb2' ),
    		'sortable'      => true, // beta
    	),
    ) );
    $cmb->add_group_field( $group_field_id, array(
      'name'       => __( 'Имя и фамилия експерта', 'cmb2' ),
      'id'         => 'experts_name',
      'type'       => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ) );
    $cmb->add_group_field( $group_field_id, array(
      'name' => 'Фотография експерта',
      'id'   => 'experts_img',
      'type' => 'file',
      'options' => array(
          'url' => false, // Hide the text input for the url
      ),
      'text'    => array(
          'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
      ),
      'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );
    $cmb->add_group_field( $group_field_id, array(
    	'name' => 'Короткое описание',
    	'id'   => 'experts_description',
    	'type' => 'textarea_small',
    ) );
		/**
		 *  КОНЕЦ Члени міжнародної експертної комісії
		 */



		 /**
	 	 *  НАЧАЛО Партнери конкурсу молодих українських художників
	 	 */

		$group_field_id = $cmb->add_field( array(
    	'id'          => 'myxi_partners',
    	'type'        => 'group',
      'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
    	'description' => __( 'Generates reusable form entries', 'cmb2' ),
      	'options'     => array(
    		'group_title'   => __( 'Партнери конкурсу молодих українських художників  {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
    		'remove_button' => __( 'Remove Entry', 'cmb2' ),
    		'sortable'      => true, // beta
    	),
    ) );
			$cmb->add_group_field( $group_field_id, array(
	      'name' => 'Логотип партнера',
	      'id'   => 'partners_img',
	      'type' => 'file',
	      'options' => array(
	          'url' => false, // Hide the text input for the url
	      ),
	      'text'    => array(
	          'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
	      ),
	      'preview_size' => 'medium', // Image size to use when previewing in the admin.
	    ) );
		/**
		*  КОНЕЦ Партнери конкурсу молодих українських художників
		*/



		/**
		*  НАЧАЛО Медіа партнери конкурсу молодих українських художників
		*/
		$group_field_id = $cmb->add_field( array(
    	'id'          => 'myxi_media_partners',
    	'type'        => 'group',
      'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
    	'description' => __( 'Generates reusable form entries', 'cmb2' ),
      	'options'     => array(
    		'group_title'   => __( 'Медіа партнери конкурсу молодих українських художників  {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
    		'remove_button' => __( 'Remove Entry', 'cmb2' ),
    		'sortable'      => true, // beta
    	),
    ) );
			$cmb->add_group_field( $group_field_id, array(
	      'name' => 'Логотип партнера',
	      'id'   => 'media_partners_img',
	      'type' => 'file',
	      'options' => array(
	          'url' => false, // Hide the text input for the url
	      ),
	      'text'    => array(
	          'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
	      ),
	      'preview_size' => 'medium', // Image size to use when previewing in the admin.
	    ) );
		/**
		*  КОНЕЦ Медіа партнери конкурсу молодих українських художників
		*/


		/**
		*  НАЧАЛО Институциональная поддержка
		*/
		$group_field_id = $cmb->add_field( array(
    	'id'          => 'myxi_institutional_support',
    	'type'        => 'group',
      'object_types'     => array( 'myxi' ), // Tells CMB2 to use term_meta vs post_meta
    	'description' => __( 'Generates reusable form entries', 'cmb2' ),
      	'options'     => array(
    		'group_title'   => __( 'Институциональная поддержка {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
    		'remove_button' => __( 'Remove Entry', 'cmb2' ),
    		'sortable'      => true, // beta
    	),
    ) );
		$cmb->add_group_field( $group_field_id, array(
      'name' => 'Логотип партнера',
      'id'   => 'institutional_img',
      'type' => 'file',
      'options' => array(
          'url' => false, // Hide the text input for the url
      ),
      'text'    => array(
          'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
      ),
      'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );
		/**
		*  КОНЕЦ Институциональная поддержка
		*/






}
