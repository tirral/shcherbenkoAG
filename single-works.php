
<?php
/**
 * The template for displaying  artist one work
 *
 *
 * @package shcherbenko
 */


/**
 * Enqueue styles for artist one work
 */
function shcherbenko_scripts_artistonewokr() {
   wp_enqueue_style( 'shcherbenko-artistonework', get_template_directory_uri() . '/css/styles_onework.css', false, NULL, 'all');
 if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  wp_enqueue_script( 'comment-reply' );
 }
}
add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_artistonewokr' );

get_header();

$postMainId = get_the_ID();
?>

<?php
$taxonomy = get_term();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;
echo $artistsId;
echo $artistsId;
echo $artistsName;
?>


<main>
  single-works.php
      <div class="wrapper">
          <div class="main-nav">
              <h1 class="title-h1"><?php echo $artistName; ?></h1>
              <div class="flx">
                  <a href="<?php echo  home_url( '/artists/'. $artistSlug ); ?>" class="h4-title">Биография художника</a>
                  <nav>
                      <ul>
                          <li class="nav_item"><a href="#">проекты</a></li>
                          <li class="nav_item"><a href="#">публикации</a></li>
                          <li class="nav_item"><a href="#">каталоги</a></li>
                          <li class="nav_item"><a href="#">работы</a></li>
                      </ul>
                  </nav>
              </div>
          </div> <!-- end main-nav -->
      </div> <!-- end wrapper -->


      <div class="full-width no-border">
          <div class="wrapper one-work-wrapper">
              <div>
                  <form class="form">
                      <p class="h3-title">Запрос цены</p>
                      <input type="text" placeholder="Ваше имя">
                      <input type="email" placeholder="Ваш E-Mail">

                      <textarea placeholder="Ваше сообщение..."></textarea>

                      <label class="form-accept flx">
                          <input class="form-checkbox" type="checkbox">
                          <span class="form-checkbox-custom"></span>
                          <span class="form-checkbox-text"><strong>Я принимаю условия</strong> использования персональных данных</span>
                      </label>

                      <button class="btn form-btn">Отправить сообщение</button>

                      <div class="hint">
                          <p><strong>Заинтересовала работа?</strong></p>
                          <p>Свяжитесь с нашим менеджером.</p>

                          <div class="hint-close">
                              <img src="<?php echo get_template_directory_uri();?>/img/i-close.png" alt="close">
                          </div>
                      </div> <!-- end hint -->
                  </form>
              </div>

              <div class="one-work">
                  <div class="one-work-photo">
                      <a href="<?php echo get_template_directory_uri();?>/img/one-artist-work-big.png" class="fancy-photo" data-fancybox="fancy-photo">
                          <img src="<?php echo get_template_directory_uri();?>/img/one-artist-work.png">
                      </a>
                  </div>

                  <div class="artist-work-overlay">
                      <img src="<?php echo get_template_directory_uri();?>/img/image-on.png" class="fancy-btn artist-work-overlay-btn" alt="zoom">
                  </div>

                  <div class="proj-name">
                      <p class="h3-title"><?php the_title(); ?></p>
                      <p class="title-h3"><?php echo  get_post_meta(get_the_ID(), 'works_short_description', true); ?></p>
                  </div>








              </div> <!-- end one-work -->

              <div class="sidebar">
                  <div class="sidebar-bottom">
                      <div class="social-icons">
                          <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                          <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-insta.png" alt="instagram"></a>
                          <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-google.png" alt="google"></a>
                          <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-youtube.png" alt="youtube"></a>
                      </div>
                      <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                  </div>
              </div>
          </div> <!-- end wrapper -->
      </div> <!-- end full-width -->

      <div class="full-width">
          <div class="wrapper">
              <div class="artists-wrapp">
                   <h1 class="title-h1">другие работы фамилия художника</h1>


                  <div class="artists-pics-list">


                    <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ВСЕХ РАБОТ ХУДОЖНИКА -->
                    <?php
                  $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $params = array(
                   'posts_per_page' => 6, // количество постов на странице
                   'post_type' => 'works',
                   'tax_query' => array(
                       array(
                           'taxonomy' => 'artists',
                           'field' => 'slug',
                           'terms' => $artistSlug //$artistSlug
                           )
                       ),
                   'paged' => $current_page // текущая страница
                  );
                  query_posts($params);
                  $wp_query->is_archive = true;
                  $wp_query->is_home = false;
                  $workCounter = 0;

                  while(have_posts()): the_post();

                  $content = get_the_content();
                  $trimmed_content = wp_trim_words( $content, 40,  '' );


                  $postClosestID = get_the_ID();
                    if( $postMainId != $postClosestID){
                        get_template_part( 'template-parts/content', 'artistallworks' );
                      }

                      $workCounter++;
                      endwhile;

                if ($workCounter > 2){
                }
                else{
                echo '<p style="font-size: 26px; color: red"> Других работ нет</p>';
                }
                  ?>
                  </div> <!-- end artists-pics-list -->
              </div>
          </div> <!-- end wrapper -->
      </div> <!-- end full-width -->
  </main>

<?php
get_footer();
