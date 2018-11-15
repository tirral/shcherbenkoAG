<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shcherbenko
 */


 /**
  * Enqueue styles for artists all works.
  */
 function shcherbenko_scripts_allartist() {
 		wp_enqueue_style( 'shcherbenko-allartist', get_template_directory_uri() . '/css/styles_allartist.css', false, NULL, 'all');
    wp_enqueue_script( 'shcherbenko-allartists', get_template_directory_uri() . '/js/allartists.js');
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 	 wp_enqueue_script( 'comment-reply' );
  }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_allartist' );


get_header();

// Передача слага художника в archive-works.php
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;

echo 'template-parts/template-all-artists.php';
?>


<main>
        <div class="wrapper flx">
            <div class="artists-title">Художники</div>

            <div class="artists-search flx-align">
                <input type="text" class="live-search-box"  placeholder="Введите имя художника...">
                <img src="<?php echo get_template_directory_uri();?>/img/search.png" alt="search">
            </div>

        </div>
        <div class="full-width">
            <div class="wrapper">
                <ul class="artists-list">
                  <?php $hiterms = get_terms("artists", array("orderby" => "slug", "parent" => 0, "hide_empty" => 0)); ?>
                  <?php foreach($hiterms as $key => $hiterm) : ?>
                  <li class="artists-item">
                  <?php $term_link = get_term_link( $hiterm ); ?>
                  <a href="<?php echo esc_url( $term_link ); ?>">
                  <span><?php echo $hiterm->name; ?></span>
                  </a>
                  <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПОСЛЕДНЕЙ РАБОТЫ ХУДОЖНИКА -->
                            <?php
                            $args = array(
                            'order' => 'DESC', //ASC
                            'post_type' => 'works',
                            'posts_per_page' => 1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'artists',
                                    'field' => 'slug',
                                    'terms' => $hiterm->slug
                                    )
                                ),
                            );
                            $loop = new WP_Query( $args);
                            if ( $loop->have_posts() ) {
                            while ( $loop->have_posts() ) : $loop->the_post();
                              ?>
                              <div class="artist-pic-popUp">
                                <?php  echo get_the_post_thumbnail(); ?>
                              </div>
                          <?php
                            endwhile;
                            }
                            wp_reset_postdata();
                            ?>
                  <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПОСЛЕДНЕЙ РАБОТЫ ХУДОЖНИКА  -->
                  </li>
                  <?php endforeach; ?>
                  </ul>


                <div class="sidebar"></div>
            </div>
        </div>
    </main>



<?php get_footer();?>
