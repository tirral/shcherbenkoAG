<?php
/**
 * The template for displaying the single project page.
 *http://shcherbenko.odev.io/project/artists_1/project-1/
*/

 /**
  * Enqueue styles for single project page.
  */
 function shcherbenko_scripts_projectone() {
     wp_enqueue_style( 'shcherbenko-projectoneCSS', get_template_directory_uri() . '/css/styles_projectone.css', false, NULL, 'all');
     wp_enqueue_script( 'shcherbenko-projectoneJS', get_template_directory_uri() . '/js/projectone.js');
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
     wp_enqueue_script( 'comment-reply' );
   }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_projectone' );

get_header();

// Передача слага художника в archive-works.php
$slug = get_query_var( 'post_slug', $default = '' );
$post_id = get_query_var( 'post_id', $default = '' );
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;

echo 'template-parts/template-single-project.php';

$query = new WP_Query( array( 'post_type' => 'project', 'name' => $slug ) );

while ( $query->have_posts() ) {
	$query->the_post();
  $postMainId = get_the_ID();
?>

    <main>
        <div class="wrapper">
            <div class="main-nav">
                <h1 class="title-h1"><?php echo $artistsName; ?></h1>
                <a href="<?php echo  home_url( '/project/' . $artistsSlug ); ?>" class="nk_to-all-projects">Все проекты</a>
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
          <?php echo  get_post_meta(get_the_ID(), 'aboutus_gallery_1', true); ?>
        <div class="full-width no-border">
            <div class="wrapper all-proj-page flx">
                <div class="flx">
                    <div class="all-proj-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="<?php echo  get_post_meta(get_the_ID(), 'project_gallery_1', true); ?>" alt="artist project"></div>
                                <div class="swiper-slide"><img src="<?php echo  get_post_meta(get_the_ID(), 'project_gallery_2', true); ?>" alt="artist project"></div>
                                <div class="swiper-slide"><img src="<?php echo  get_post_meta(get_the_ID(), 'project_gallery_3', true); ?>" alt="artist project"></div>
                                <div class="swiper-slide"><img src="<?php echo  get_post_meta(get_the_ID(), 'project_gallery_4', true); ?>" alt="artist project"></div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div> <!-- end all-proj-slider -->
                    <div class="proj-name">
                        <p class="h3-title"><?php the_title(); ?></p>
                        <p class="title-h3"><?php echo  get_post_meta(get_the_ID(), 'project_time', true); ?></p>
                    </div>
                </div>
                <div class="sidebar flx">
                    <div class="sidebar-bottom">
                        <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                        <div class="social-icons">
                            <a href="https://www.facebook.com/sharer.php?u=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
        <div class="full-width">
            <div class="wrapper proj-description-section flx">
                <div class="proj-description-title">
                    <h1 class="title-h1">Описание</h1>
                </div>
                <div class="proj-description-info">
                <?php the_content(); ?>
                </div>
                <div class="sidebar"></div>
            </div>
        </div>
    </main>
<?php } ?>

<?php get_footer(); ?>
