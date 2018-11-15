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
 function shcherbenko_scripts_artistsallwokr() {
 		wp_enqueue_style( 'shcherbenko-artistallwork', get_template_directory_uri() . '/css/styles_artistallwork.css', false, NULL, 'all');
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 	 wp_enqueue_script( 'comment-reply' );
  }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_artistsallwokr' );


get_header();

// Передача слага художника в archive-works.php
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;

echo 'template-parts/template-artist-all-work.php';
?>

<main>
        <div class="wrapper">
            <div class="main-nav">
                <h1 class="title-h1">Работы: <?php echo $artistsName ?></h1>
  							<a href="<?php echo  home_url( '/artists/'. $artistsSlug ); ?>" class="nk_to-prev-page">Биография художника</a>
								<nav>
                    <ul>
                        <li class="nav_item"><a href="#">проекты</a></li>
                        <li class="nav_item"><a href="#">публикации</a></li>
                        <li class="nav_item"><a href="#">каталоги</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="full-width no-border">
            <div class="wrapper flx">
                <div class="artists-wrapp">
                    <div class="artists-pics-list">
                    	<!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ РАБОТ ОДНОГО ХУДОЖНИКА -->
                      <?php
                      $query = new WP_Query( array(
                        'post_type' => 'works',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'artists',
                                'field' => 'slug',
                                'terms' => $artistsSlug //$artistSlug
                                )
                            ),
                    ) );
                      while ( $query->have_posts() ) {
                        $query->the_post();
                        get_template_part( 'template-parts/content', 'artistallworks' );
                    }
                      ?>
                      <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ РАБОТ ОДНОГО ХУДОЖНИКА -->
							</div>
                <div class="sidebar"></div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
    </main>


<?php get_footer();?>
