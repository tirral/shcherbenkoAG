<?php
/**
 * The template for displaying the artists taxonomy.
 *
 */

 /**
  * Enqueue styles for artists one page.
  */
 function shcherbenko_scripts_artists() {
     wp_enqueue_style( 'shcherbenko-artistsone', get_template_directory_uri() . '/css/styles_artistsone.css', false, NULL, 'all');
 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comment-reply' );
 	}
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_artists' );

get_header();

?>



<?php
// Передача слага художника в archive-works.php
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;
echo $artistsId;
echo $artistsId;
echo $artistsName;
?>



<main>
taxonomy-artists.php
<?php
$terms = get_terms('artists');
foreach ($terms as $term) {
	echo '<a href="' . get_term_link($term->slug, $term->taxonomy) . '">' . $term->name . '</a>';
}
?>



        <div class="wrapper">
                <div class="artists-represent">
                    <h1 class="title-h1"> <?php $taxonomy = get_queried_object(); echo  $taxonomy->name; ?></h1>
                    <h3 class="title-h3"><?php echo get_term_meta($artistsId, 'artists_date_of_birth', true); ?></h3>
                </div>
        </div>
        <div class="full-width no-border">
            <div class="wrapper artist-nav flx">
                <div class="artist-first-block">
                    <nav>
                        <ul class="artist-nav-list">
                            <li class="artist-nav-item"><a href="#">Проекты</a></li>
                            <li class="artist-nav-item"><a href="#">Публикации</a></li>
                            <li class="artist-nav-item"><a href="#">Каталоги</a></li>
                            <li class="artist-nav-item"><a href="#">Работы</a></li>
                        </ul>
                    </nav>

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
                                  'terms' => get_queried_object()->slug
                                  )
                              ),
                          );
                          $loop = new WP_Query( $args);
                          if ( $loop->have_posts() ) {
                          while ( $loop->have_posts() ) : $loop->the_post();
                            get_template_part( 'template-parts/content', 'artistlastwork' );
                          endwhile;
                          } else {
                            echo __( 'No team found' );
                          }
                          wp_reset_postdata();
                          ?>
                <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПОСЛЕДНЕЙ РАБОТЫ ХУДОЖНИКА  -->

            </div>
        </div> <!-- end full-width -->

        <div class="full-width">
            <div class="artist-info wrapper">
<?php
$entries_biography = get_term_meta($artistsId, 'artists_biography', true);
  if (!empty($entries_biography)) {
?>
                <div class="artist-bio flx">
                    <div class="vertical-text">
                        <p class="title-h1">Биография</p>
                    </div>
                    <div>
                      <p class="artist-bio-text">
                        <?php echo get_term_meta($artistsId, 'artists_biography', true); ?>
                      </p>
                    </div>
                </div> <!-- end artist-bio -->
<?php }?>

                <div class="artist-exhibitions flx">

                    <div class="flx">
                    <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПЕРСОНАЛЬНЫХ ВЫСТАВОК -->
                      <?php
                        $entries = get_term_meta($artistsId , 'artists_exhibitions', true );
                        if (!empty($entries)) {
                        ?>

                      <div class="vertical-text">
                          <p class="title-h1">Персональные выставки</p>
                      </div>
                      <div>
                          <div class="artist-exhibitions-list artist-exhibitions-list-individ">
<?php
                                  foreach ( (array) $entries as $key => $entry ) {
                                  $year =  '';
                                  $desc_1 =  '';
                                  $desc_2 =  '';
                                  $desc_3 =  '';
                              ?>

                              <div class="artist-exhibitions-item">
                              <?php
                                    if ( isset( $entry['artists_exhibitions_data'] ) ) {
                                      $year = wpautop( $entry['artists_exhibitions_data'] );
                                      ?>
                                      <div class="artist-exhibitions-item-year"><?php echo $year; ?></div>
                                      <?php
                                    }
                                    if ( isset( $entry['artists_exhibitions_name_1'] ) ) {
                                      $desc_1 = wpautop( $entry['artists_exhibitions_name_1'] );
                                      ?>
                                      <div><?php echo $desc_1; ?></div>
                                      <?php
                                    }
                                    if ( isset( $entry['artists_exhibitions_name_2'] ) ) {
                                      $desc_2 = wpautop( $entry['artists_exhibitions_name_2'] );
                                      ?>
                                      <div><?php echo $desc_2; ?></div>
                                      <?php
                                    }
                                    if ( isset( $entry['artists_exhibitions_name_3'] ) ) {
                                      $desc_3 = wpautop( $entry['artists_exhibitions_name_3'] );
                                      ?>
                                      <div><?php echo $desc_3; ?></div>
                                      <?php
                                    }
                                    ?>
                              </div>
                              <?php
                                  }
                              ?>
                                        </div>
<?php } ?>
                              <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПЕРСОНАЛЬНЫХ ВЫСТАВОК -->
</div>
</div> <!-- flx -->


<div class="flx">
<!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПЕРСОНАЛЬНЫХ ВЫСТАВОК -->
  <?php
    $entries = get_term_meta($artistsId , 'artists_group_exhibitions', true );
    if (!empty($entries)) {
    ?>

  <div class="vertical-text">
      <p class="title-h1">Групповые выставки</p>
  </div>

  <div>
      <div class="artist-exhibitions-list artist-exhibitions-list-individ">
<?php
              foreach ( (array) $entries as $key => $entry ) {
              $year =  '';
              $desc_1 =  '';
              $desc_2 =  '';
              $desc_3 =  '';
          ?>

          <div class="artist-exhibitions-item">
          <?php
                if ( isset( $entry['artists_group_exhibitions_data'] ) ) {
                  $year = wpautop( $entry['artists_group_exhibitions_data'] );
                  ?>
                  <div class="artist-exhibitions-item-year"><?php echo $year; ?></div>
                  <?php
                }
                if ( isset( $entry['artists_group_exhibitions_name_1'] ) ) {
                  $desc_1 = wpautop( $entry['artists_group_exhibitions_name_1'] );
                  ?>
                  <div><?php echo $desc_1; ?></div>
                  <?php
                }
                if ( isset( $entry['artists_group_exhibitions_name_2'] ) ) {
                  $desc_2 = wpautop( $entry['artists_group_exhibitions_name_2'] );
                  ?>
                  <div><?php echo $desc_2; ?></div>
                  <?php
                }
                if ( isset( $entry['artists_group_exhibitions_name_3'] ) ) {
                  $desc_3 = wpautop( $entry['artists_group_exhibitions_name_3'] );
                  ?>
                  <div><?php echo $desc_3; ?></div>
                  <?php
                }
                ?>
          </div>
          <?php
              }
          ?>
                    </div>
<?php } ?>
          <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПЕРСОНАЛЬНЫХ ВЫСТАВОК -->
</div>
</div> <!-- flx -->
                </div> <!-- end artist-exhibitions -->

                <div class="sidebar"></div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
    </main>


<?php get_footer(); ?>
