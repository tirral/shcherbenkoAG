<?php
/**
 * The template for displaying artists all works.
 * http://shcherbenko.odev.io/works/artists_1/
*/


 /**
  * Enqueue styles for artists all works.
  */
 function shcherbenko_scripts_capabilitiesall() {
 		wp_enqueue_style( 'shcherbenko-capabilitiesall', get_template_directory_uri() . '/css/styles_capabilitiesall.css', false, NULL, 'all');
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 	 wp_enqueue_script( 'comment-reply' );
  }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_capabilitiesall' );

get_header();

// Передача слага художника в archive-works.php
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;
echo 'archive-capabilities.php';
?>

    <main>
        <div class="wrapper">
            <h1 class="title-h1 c-margin">Возможности</h1>
        </div>

        <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ ВОЗМОЖНОСТЕЙ -->
        <?php
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $params = array(
         'posts_per_page' => 4, // количество постов на странице
         'post_type' => 'capabilities',
         'paged' => $current_page, // текущая страница
         // 'tax_query' => array(
         //     array(
         //         'taxonomy' => 'artists',
         //         'field' => 'slug',
         //         'terms' => $artistsSlug
         //         )
         //     ),
        );
        query_posts($params);
        $wp_query->is_archive = true;
        $wp_query->is_home = false;
        $a=1;
        while(have_posts()): the_post();
        if($a==1){
           get_template_part( 'template-parts/content', 'capabilitiesallfirst' );
        }else{
          get_template_part( 'template-parts/content', 'capabilitiesall' );
        }
        $a++;
        endwhile;
        ?>
        <div class="pagination">
        <?php wp_pagenavi(); ?>
        </div>
        <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ ВОЗМОЖНОСТЕЙ -->

    </main>

<?php get_footer();?>
