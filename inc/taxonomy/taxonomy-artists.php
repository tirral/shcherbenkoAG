<?php

/**
 * Register the Artists taxonomy
 *
 */

 $labels_country = array(
     'name' => __('Художники', 'Taxonomy General Name', 'odev'),
     'singular_name' => __('Художник', 'Taxonomy Singular Name', 'odev'),
     'menu_name' => __('Художник', 'odev'),
     'add_new_item' => __('Добавить художника', 'odev'),
 );


 $args_country = array(
     'labels' => $labels_country,
     'hierarchical' => true,
     'public' => true,
     'show_ui' => true,
     'show_admin_column' => true,
     'show_in_nav_menus' => true,
     'show_tagcloud' => true,
     'rewrite' => false
 );


register_taxonomy('artists', array('works', 'project', 'publications'), $args_country);

 // register_taxonomy(
 //     'artists',
 //     array(
 //        'works'
 //
 //         // your other args...
 //         // 'rewrite' => array( 'slug' => 'artists', 'with_front' => true ),
 //     ),
 //     $args_country
 // );
