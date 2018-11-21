<?php
/**
 * The template for displaying the single capabilities page.
 * http://shcherbenko.odev.io/capabilities/%D0%BC%D0%B0%D1%81%D1%82%D0%B5%D1%80%D1%81%D0%BA%D0%B0%D1%8F-%D0%B8%D0%B7%D0%B2%D0%B5%D1%81%D1%82%D0%BD%D0%BE%D0%B3%D0%BE-%D1%85%D1%83%D0%B4%D0%BE%D0%B6%D0%BD%D0%B8%D0%BA%D0%B0-%D0%BE%D1%82%D0%BA/
*/

 /**
  * Enqueue styles for single capabilities page.
  */
 function shcherbenko_scripts_educationone() {
     wp_enqueue_style( 'shcherbenko-educationoneCSS', get_template_directory_uri() . '/css/styles_educationone.css', false, NULL, 'all');
     if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
     wp_enqueue_script( 'comment-reply' );
   }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_educationone' );

get_header();

// Получение слага
$slug = get_query_var( 'post_slug', $default = '' );
$post_id = get_query_var( 'post_id', $default = '' );
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;
echo 'single-education.php';
$postID = get_the_ID();
?>

<?php
$query = new WP_Query( array( 'post_type' => 'education', 'page_id' => $postID ) );
while ( $query->have_posts() ) {
	$query->the_post();
  $postMainId = get_the_ID();
?>
    <main>
        <div class="wrapper">
            <div class="main-nav">
                  <a href="<?php echo  home_url('/education/'); ?>" class="nk_to-all-projects linkOK" >Все лекции</a>
            </div>
        </div>
        <div class="full-width no-border">
            <div class="wrapper all-proj-page flx">
                <div class="flx">
                  <?php echo the_post_thumbnail(); ?>
                    <div class="proj-name">
                        <p class="h3-title"><?php echo the_title(); ?></p>
                        <p class="title-h3"><?php echo  get_post_meta(get_the_ID(), 'education_working_hours', true); ?></p>

                        <p class="lecture-author">Лектор: <?php echo  get_post_meta(get_the_ID(), 'education_lecturer', true); ?></p>
                        <p class="lecture-price">Вхід вільний</p>

                    </div>

                </div>
                <div class="sidebar flx">
                    <div class="sidebar-bottom">
                        <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                        <div class="social-icons">
                            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-insta.png" alt="instagram"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-google.png" alt="google"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-youtube.png" alt="youtube"></a>
                        </div>
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
