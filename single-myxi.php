<?php
/**
 * The template for displaying single artists page
 *
 */

 /**
  * Enqueue scripts and styles.
  */
 function shcherbenko_scripts_single_myxi() {
  wp_enqueue_style( 'shcherbenko-myxiCSS', get_template_directory_uri() . '/css/styles_myxi.css', false, NULL, 'all');
  wp_enqueue_script( 'shcherbenko-myxiJs', get_template_directory_uri() . '/js/myxi.js');
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_single_myxi' );
get_header();
echo 'single-myxi.php';

$cur_terms = get_the_terms( get_the_ID(), 'myxi_types' );
foreach( $cur_terms as $cur_term ){
	 $myxi_term = $cur_term->name;
}
$postID = get_the_ID();
?>

<?php
$query = new WP_Query( array( 'post_type' => 'myxi', 'page_id' => $postID ) );
while ( $query->have_posts() ) {
	$query->the_post();
  $postMainId = get_the_ID();
?>

<main>
        <div class="wrapper">
            <div class="m-wrapper-titles flx">
              <div>
                  <h2 class="title-h1">КОНКУРС МОЛОДИХ УКРАЇНСЬКИХ ХУДОЖНИКІВ МУХІ</h2>
                  <a href="#" class="title-h3"><?php echo  get_post_meta(get_the_ID(), 'myxi_year', true); ?></a>
              </div>

                <div class="m-search">
                    <input type="text" placeholder="Введите текст, что вы хотите найти...">
                    <img src="<?php echo get_template_directory_uri();?>/img/search.png" alt="search">
                </div>
            </div>
            <div class="sidebar"></div>
        </div>
        <div class="full-width no-border">
            <div class="wrapper m-wrapper flx">
                <div class="m-aside-nav">
                    <h3 class="h3-title">РЕЗУЛЬТАТИ КОНКУРСУ МУХІ <?php echo  get_post_meta(get_the_ID(), 'myxi_year', true); ?></h3>

                        <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПОБЕДИТЕЛЯ КОНКУРСА -->
                          <?php
                            $entries = get_post_meta( get_the_ID() , 'myxi_winner', true );
                            if (!empty($entries)) { ?>
                            <div class="m-winner">
                                <p class="m-aside-nav-section-title">Переможець</p>
                                <?php
                                      foreach ( (array) $entries as $key => $entry ) {
                                      $winner_img =  '';
                                      $winner_name =  '';
                                      $winner_description =  '';
                                      $winner_location =  '';
                                      $winner_url =  '';
                                    ?>
                                        <div class="winner-info flx">
                                        <div class="winner-photo">
                                  <?php

                                  if ( isset( $entry['winner_img'] ) ) {
                                    $winner_img = ( $entry['winner_img'] );
                                    ?>
                                    <img src="<?php echo $winner_img ?>" alt="member">
                                    <?php
                                  } ?>
                                     </div>
                                     <div>
                                       <?php
                                               if ( isset( $entry['winner_name'] ) ) {
                                                 $winner_name = esc_html( $entry['winner_name'] );
                                                 ?>
                                                 <p class="winner-name"><?php echo $winner_name ?></p>
                                              <?php
                                               }
                                               if ( isset( $entry['winner_description'] ) ) {
                                                 $winner_description = esc_html( $entry['winner_description'] );
                                                 ?>
                                                  <p class="title-h3"><?php echo $winner_description ?></p>
                                              <?php
                                               }
                                               if ( isset( $entry['winner_location'] ) ) {
                                                 $winner_location = esc_html( $entry['winner_location'] );
                                                 ?>
                                                  <p><?php echo $winner_location ?></p>
                                              <?php }
                                              if ( isset( $entry['winner_url'] ) ) {
                                                $winner_url = esc_html( $entry['winner_url'] );
                                                ?>
                                                 <a href="<?php  echo $winner_url ?>" class="btn m-btn">Больше</a>
                                             <?php } ?>
                                          </div>
                                        </div>
                                  <?php  } ?>
                                  </div>
                                    <?php  } ?>
                                  <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПОБЕДИТЕЛЯ КОНКУРСА -->



                                  <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПРИЗЕРОВ КОНКУРСА -->
                                    <?php
                                      $entries = get_post_meta( get_the_ID() , 'myxi_prizewinner', true );
                                      if (!empty($entries)) { ?>

                                        <div class="m-awardees">
                                            <p class="m-aside-nav-section-title">Призери</p>

                                          <?php
                                                foreach ( (array) $entries as $key => $entry ) {
                                                $prizewinner_img =  '';
                                                $prizewinner_name =  '';
                                                $prizewinner_description =  '';
                                                $prizewinner_location =  '';
                                                $prizewinner_url =  '';
                                              ?>
                                              <div class="awardees-item">
                                                  <div class="awardee-info flx">
                                            <?php

                                            if ( isset( $entry['prizewinner_img'] ) ) {
                                              $prizewinner_img = ( $entry['prizewinner_img'] );
                                              ?>
                                              <div class="awardee-photo">
                                                  <img src="<?php echo $prizewinner_img ?>" alt="member">
                                              </div>
                                              <?php
                                            } ?>

                                               <div>
                                                 <?php
                                                         if ( isset( $entry['prizewinner_name'] ) ) {
                                                           $prizewinner_name = esc_html( $entry['prizewinner_name'] );
                                                           ?>
                                                           <p class="awardee-name"><?php echo $prizewinner_name ?></p>
                                                        <?php
                                                         }
                                                         if ( isset( $entry['prizewinner_description'] ) ) {
                                                           $prizewinner_description = esc_html( $entry['prizewinner_description'] );
                                                           ?>
                                                            <p class="title-h3"><?php echo $prizewinner_description ?></p>
                                                        <?php
                                                         }
                                                         if ( isset( $entry['prizewinner_location'] ) ) {
                                                           $prizewinner_location = esc_html( $entry['prizewinner_location'] );
                                                           ?>
                                                            <p><?php echo $prizewinner_location ?></p>
                                                        <?php }
                                                        if ( isset( $entry['prizewinner_url'] ) ) {
                                                          $prizewinner_url = esc_html( $entry['prizewinner_url'] );
                                                          ?>
                                                           <a href="<?php  echo $prizewinner_url ?>" class="btn m-btn">Больше</a>
                                                       <?php } ?>
                                                    </div>
                                                  </div>
                                                  </div>
                                            <?php  } ?>
                                            </div>
                                              <?php } ?>
                                            <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПРИЗЕРОВ КОНКУРСА -->


                                            <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ФИНАЛИСТОВ КОНКУРСА -->
                                              <?php
                                                $entries = get_post_meta( get_the_ID() , 'myxi_finalists', true );
                                                if (!empty($entries)) { ?>
                                                  <div class="m-finalists">
                                                      <p class="m-aside-nav-section-title">Фіналісти</p>
                                                      <ul class="finalists-list">
                                                        <?php
                                                          foreach ( (array) $entries as $key => $entry ) {
                                                          $finalists_name =  '';
                                                          $finalists_url =  '';
                                                          //$prizewinner_name =  '';
                                                          ?>
                                                            <li class="finalists-item">
                                                            <?php
                                                              if ( isset( $entry['finalists_url'] ) ) {
                                                                $finalists_url = ( $entry['finalists_url'] );?>
                                                                <a href="<?php echo $finalists_url ?>">
                                                                <?php
                                                              } ?>
                                                            <?php
                                                          if ( isset( $entry['finalists_name'] ) ) {
                                                            $finalists_name = ( $entry['finalists_name'] );?>
                                                            <?php echo $finalists_name ?>
                                                            <?php } ?>
                                                        </a>
                                                        </li>
                                                      <?php } ?>
                                                      </ul>
                                                        </div> <!-- end m-finalists -->
                                                        <?php  } ?>
                                                      <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ФИНАЛИСТОВ КОНКУРСА -->

                                    </div> <!-- end m-aside-nav -->
                                      <div class="main-content">
                                          <div class="m-slider-wrapper">
                                              <div class="m-slider">
                                              <div class="swiper-container">
                                                  <div class="swiper-wrapper">

                                                    <?php
                                                    function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium' ) {
                                                    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
                                                    foreach ( (array) $files as $attachment_id => $attachment_url ) {
                                                    echo '<div class="swiper-slide">';?>
                                                    <?php echo wp_get_attachment_image( $attachment_id, $img_size ) ?>
                                                    <?php echo '</div>';
                                                    }
                                                  }?>
                                                    <?php cmb2_output_file_list( 'myxi_gallery', 'small' ); ?>

                                              </div>
                                          </div>

                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        </div> <!-- end m-slider -->

                        <div class="share-wrapper">
                            <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                            <div class="social-icons">
                                <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                            </div>
                        </div>

                    </div> <!-- end m-slider-wrapper -->
                    <div class="m-info">
                      <h2 class="title-h1">ПРО КОНКУРС МУХІ <?php echo  get_post_meta(get_the_ID(), 'myxi_year', true); ?></h2>
                      <?php  echo the_content(); ?>
                    </div>

                    <div class="m-pubs">
                        <h2 class="title-h1">ПУБЛІКАЦІЇ ПРО КОНКУРС МУХІ <?php echo  get_post_meta(get_the_ID(), 'myxi_year', true); ?></h2>
                        <div class="m-pubs-interviews flx">
                            <div class="m-pubs-photo">
                                <img src="<?php echo  get_post_meta(get_the_ID(), 'myxi_publication_interview_img', true); ?>" alt="photo">
                                <div class="m-pubs-photo-info">
                                    <p><?php echo  get_post_meta(get_the_ID(), 'myxi_publication_interview_name', true); ?></p>
                                </div>
                            </div>

                            <ul class="m-pubs-list">
                              <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПУБЛИКАЦИЙ ИНТЕРЬВЬЮ С ЕКСПЕРТАМИ-->
                                        <?php
                                        $args = array(
                                        'order' => 'ASC', //DESC
                                        'post_type' => 'myxi_publications',
                                        'posts_per_page' => 10,
                                        'tax_query' => array(
                                          array(
                                              'taxonomy' => 'myxi_year',
                                              'field' => 'slug',
                                              'terms' => $myxi_term
                                            ),
                                            array(
                                                'taxonomy' => 'publications_type',
                                                'field' => 'slug',
                                                'terms' => 'interview'
                                                )
                                            ),
                                        );
                                        $loop = new WP_Query( $args);
                                        if ( $loop->have_posts() ) {
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                        ?>
                                        <li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                        <?php
                                        endwhile;
                                        }
                                        wp_reset_postdata();
                                        ?>
                              <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПУБЛИКАЦИЙ ИНТЕРЬВЬЮ С ЕКСПЕРТАМИ-->
                            </ul>
                          </div>
                        <div class="m-pubs-exhibitions flx">
                            <div class="m-pubs-photo">
                                <img src="<?php echo  get_post_meta(get_the_ID(), 'myxi_publication_exhibition_img', true); ?>" alt="photo">
                                <div class="m-pubs-photo-info">
                                    <p><?php echo  get_post_meta(get_the_ID(), 'myxi_publication_exhibition_name', true); ?></p>
                                </div>
                            </div>
                            <ul class="m-pubs-list">
                              <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПУБЛИКАЦИЙ ПРО ВЫСТАВКУ-->
                                        <?php
                                        $args = array(
                                        'order' => 'ASC', //DESC
                                        'post_type' => 'myxi_publications',
                                        'posts_per_page' => 10,
                                        'tax_query' => array(
                                          array(
                                              'taxonomy' => 'myxi_year',
                                              'field' => 'slug',
                                              'terms' => $myxi_term
                                            ),
                                            array(
                                                'taxonomy' => 'publications_type',
                                                'field' => 'slug',
                                                'terms' => 'exhibition'
                                                )
                                            ),
                                        );
                                        $loop = new WP_Query( $args);
                                        if ( $loop->have_posts() ) {
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                        ?>
                                        <li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                        <?php
                                        endwhile;
                                        }
                                        wp_reset_postdata();
                                        ?>
                              <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПУБЛИКАЦИЙ ИНТЕРЬВЬЮ ПРО ВЫСТАВКУ -->
                            </ul>
                        </div>
                    </div> <!-- end m-pubs -->
                </div>
                <div class="sidebar flx">
                    <div class="vertical-text">
                      <?php
                      wp_nav_menu( array(
                        'theme_location' => 'menu-3',
                        'menu_id'        => 'menu-myxi',
                        'container'       => 'ul',
                        'menu_class'      => 'nav-data-list'
                      ) );
                      ?>
                    </div>
                </div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->

        <div class="full-width">
            <div class="wrapper committee-block">

                <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ПЕРСОНАЛЬНЫХ ВЫСТАВОК -->
                  <?php
                    $entries = get_post_meta( get_the_ID() , 'myxi_experts', true );
                if (!empty($entries)) {
                    ?>
                    <div class="commission-member-list"><h2 class="title-h1">МІЖНАРОДНА ЕКСПЕРТНА КОМІСІЯ КОНКУРСУ МУХІ <?php echo  get_post_meta(get_the_ID(), 'myxi_year', true); ?></h2>
                          <?php
                              foreach ( (array) $entries as $key => $entry ) {
                              $experts_name =  '';
                              $experts_img =  '';
                              $experts_description =  '';
                            ?>
                          <div class="commission-member-item">
                              <div class="member-photo flx">
                          <?php
                                if ( isset( $entry['experts_name'] ) ) {
                                  $experts_name = esc_html( $entry['experts_name'] );
                                  ?>
                                  <p class="member-name"><?php echo $experts_name; ?></p>
                                  <?php
                                }
                                if ( isset( $entry['experts_img'] ) ) {
                                  $experts_img = ( $entry['experts_img'] );
                                  ?>
                                  <img src="<?php echo $experts_img ?>" alt="member">;
                                  <?php
                                } ?>
                              </div>
                              <div class="member-info">
                                  <div class="read-more-1 readmore-js-toggle">
                              <?php
                                if ( isset( $entry['experts_description'] ) ) {
                                  $experts_description = esc_html( $entry['experts_description'] );
                               echo $experts_description;
                                }?>
                                </div>
                            </div>
                          </div>
                          <?php
                             }
                              } ?>
                          <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ПЕРСОНАЛЬНЫХ ВЫСТАВОК -->
                </div>
                <div class="sidebar"></div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->

        <div class="full-width">
            <div class="wrapper partners-wrapper flx">
                <div class="m-aside-nav flx">
                    <p class="vertical-text h3-title">Організатор</p>
                    <div class="logo-text">
                        <img src="<?php echo get_template_directory_uri();?>/img/logo-text.png" alt="logo">
                    </div>
                </div>
                <div class="m-partners-container flx">
                  <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ЛОГОТИПОВ ПАРТНЕРОВ -->
                  <?php
                  $entries = get_post_meta( get_the_ID() , 'myxi_partners', true );
                  if (!empty($entries)) {
                  ?>
                    <div class="m-partners">
                        <p class="vertical-text h3-title">Партнери</p>
                        <div class="flx partners-logo">
                          <?php
                              foreach ( (array) $entries as $key => $entry ) {
                              $partners_img =  '';
                            ?>
                            <div>
                            <?php
                            if ( isset( $entry['partners_img'] ) ) {
                              $partners_img = ( $entry['partners_img'] );
                              ?>
                              <img src="<?php echo $partners_img ?>" alt="partner">
                              <?php
                            } ?>
                          </div>
                            <?php
                          }?>
                               </div>
                           </div>
                         <?php  } ?>
                         <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ЛОГОТИПОВ ПАРТНЕРОВ -->
                         <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА ЛОГОТИПОВ МЕДИА ПАРТНЕРОВ -->
                         <?php
                         $entries = get_post_meta( get_the_ID() , 'myxi_media_partners', true );
                         if (!empty($entries)) {
                         ?>
                           <div class="m-media-partners">
                               <p class="vertical-text h3-title">Meдіа партнери</p>
                               <div class="flx partners-logo">
                                 <?php
                                     foreach ( (array) $entries as $key => $entry ) {
                                     $partners_img =  '';
                                   ?>
                                   <div>
                                   <?php
                                   if ( isset( $entry['media_partners_img'] ) ) {
                                     $media_partners_img = ( $entry['media_partners_img'] );
                                     ?>
                                     <img src="<?php echo $media_partners_img ?>" alt="partner">
                                     <?php
                                   } ?>
                                 </div>
                                   <?php
                                 }?>
                                      </div>
                                  </div>
                                <?php  } ?>
                                <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ЛОГОТИПОВ МЕДИА ПАРТНЕРОВ -->
                                <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА  ИНСТУЦИОНАЛЬНОЙ ПОДДЕРЖКИ -->
                                <?php
                                $entries = get_post_meta( get_the_ID() , 'myxi_institutional_support', true );
                                if (!empty($entries)) {
                                ?>
                                  <div class="m-suport-partners">
                                      <p class="vertical-text h3-title">Інституційна підтримка</p>
                                      <div class="suport-logo">
                                        <?php
                                            foreach ( (array) $entries as $key => $entry ) {
                                            $institutional_img =  '';
                                          ?>
                                          <div>
                                          <?php
                                          if ( isset( $entry['institutional_img'] ) ) {
                                            $institutional_img = ( $entry['institutional_img'] );
                                            ?>
                                            <img src="<?php echo $institutional_img ?>" alt="partner">
                                            <?php
                                          } ?>
                                        </div>
                                          <?php
                                        }?>
                                             </div>
                                         </div>
                                       <?php  } ?>
                                       <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА ИНСТУЦИОНАЛЬНОЙ ПОДДЕРЖКИ -->
                    </div>
                <div class="sidebar"></div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
    </main>
<?php } ?>


<?php get_footer(); ?>
