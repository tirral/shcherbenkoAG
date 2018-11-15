<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shcherbenko
 */


 // Передача слага художника в archive-works.php
 $taxonomy = get_queried_object();
 $artistsId = $taxonomy->term_id;
 $artistsSlug = $taxonomy->slug;
 $artistsName = $taxonomy->name;
 echo $artistsId;
 echo $artistsId;
 echo $artistsName;
 echo 'archive-works.php </br>';
 echo 'такой страницы нет в дизайне';


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
?>



<main>
        <div class="wrapper">
            <div class="main-nav">
                <h1 class="title-h1">Работы: <?php echo $artistName ?></h1>
  							<a href="<?php echo  home_url( '/artists/'. $artistSlug ); ?>" class="nk_to-prev-page">Биография художника</a>
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
											<!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ РАБОТ ХУДОЖНИКА -->
                      <?php
                			/* Start the Loop */
                			while ( have_posts() ) :
                				the_post();

			              get_template_part( 'template-parts/content', 'artistallworks' );

			              endwhile;
			             ?>
                    </div> <!-- end artists-pics-list -->
										<div class="pagination">
											  <?php wp_pagenavi(); ?>
                </div>
							</div>

                <div class="sidebar"></div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
    </main>


<?php get_footer();?>
