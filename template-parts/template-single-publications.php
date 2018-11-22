<?php
/**
 * The template for displaying the single project page.
 *http://shcherbenko.odev.io/project/artists_1/project-1/
*/

 /**
  * Enqueue styles for single project page.
  */
 function shcherbenko_scripts_publicationsone() {
     wp_enqueue_style( 'shcherbenko-publicationsoneCSS', get_template_directory_uri() . '/css/styles_publicationsone.css', false, NULL, 'all');
     if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
     wp_enqueue_script( 'comment-reply' );
   }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_publicationsone' );

get_header();

// Передача слага художника в archive-works.php
$slug = get_query_var( 'post_slug', $default = '' );
$post_id = get_query_var( 'post_id', $default = '' );
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;

echo 'template-parts/template-single-publications.php';

$query = new WP_Query( array( 'post_type' => 'publications', 'name' => $slug ) );

while ( $query->have_posts() ) {
	$query->the_post();
  $postMainId = get_the_ID();
?>

<main>
        <div class="wrapper">
            <div class="main-nav">
                <h1 class="title-h1"><?php echo $artistsName; ?></h1>
                <a href="<?php echo  home_url( '/publications/'. $artistsSlug ); ?>" class="nk_to-all-projects linkOK" >Все публикации</a>


                <nav>
                    <ul>
                        <li class="nav_item"><a href="<?php echo  home_url( '/artists/'. $artistsSlug ); ?>" class="linkOK">биография художника</a></li>
                        <li class="nav_item"><a href="#">проекты</a></li>
                        <li class="nav_item"><a href="<?php echo  home_url( '/publications/'. $artistsSlug ); ?>" class="linkOK">публикации</a></li>
                        <li class="nav_item"><a href="#">каталоги</a></li>
                        <li class="nav_item"><a href="<?php echo  home_url( '/works/'. $artistsSlug ); ?>" class="linkOK">работы</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="full-width no-border">
            <div class="wrapper all-proj-page flx">
                <div class="flx">
                  <?php echo the_post_thumbnail(); ?>
                    <div class="proj-name">
                        <p class="h3-title"><?php echo the_title(); ?></p>
                        <p class="title-h3"><?php echo the_time('j F Y'); ?></p>
                    </div>
                </div>
                <div class="sidebar flx">
                    <div class="sidebar-bottom">
                        <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                        <div class="social-icons">
                            <a href="https://www.facebook.com/sharer.php?u=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                          </div>
                </div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
        <div class="full-width">
            <div class="wrapper proj-description-section flx">
                <div class="proj-description-title">
                    <!-- <h1 class="title-h1">Описание</h1> -->
                </div>
                <div class="proj-description-info">
                    <?php echo the_content(); ?>
                </div>
                <div class="sidebar"></div>
            </div>
        </div>
    </main>
<?php  } ?>
<?php get_footer(); ?>
