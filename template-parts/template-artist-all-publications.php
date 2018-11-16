<?php
/**
 * The template for displaying artists all works.
 * http://shcherbenko.odev.io/works/artists_1/
*/

 /**
  * Enqueue styles for artists all works.
  */
 function shcherbenko_scripts_artistallpublications() {
 		wp_enqueue_style( 'shcherbenko-artistallpublications', get_template_directory_uri() . '/css/styles_artistallpublications.css', false, NULL, 'all');
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 	 wp_enqueue_script( 'comment-reply' );
  }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_artistallpublications' );

get_header();

// Передача слага художника в archive-works.php
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;
echo 'template-parts/template-artist-all-publications.php';
?>
<main>
        <div class="wrapper">
            <h1 class="title-h1 c-margin"><?php echo $artistsName; ?></h1>
        </div>

        <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ ПУБЛИКАЦИЙ ОДНОГО ХУДОЖНИКА -->
        <?php
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $params = array(
         'posts_per_page' => 20, // количество постов на странице
         'post_type' => 'publications',
         'paged' => $current_page, // текущая страница
         'tax_query' => array(
             array(
                 'taxonomy' => 'artists',
                 'field' => 'slug',
                 'terms' => $artistsSlug //$artistSlug
                 )
             ),
        );
        query_posts($params);
        $wp_query->is_archive = true;
        $wp_query->is_home = false;
        while(have_posts()): the_post();

             get_template_part( 'template-parts/content', 'artistallpublications' );

        endwhile;
        ?>
      <div class="pagination">
      <?php wp_pagenavi(); ?>
      </div>
      <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ ПУБЛИКАЦИЙ ОДНОГО ХУДОЖНИКА-->




    </main>
<?php get_footer();?>
