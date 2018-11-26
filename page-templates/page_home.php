<?php
/*
Template Name: Home page
*/
?>

<?php get_header(); ?>
<main>

  <div class="wrapper project-slider flx">
    <div class="slider-wrapper">
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
          <?php
           $quantity_project_start = 1;
            $query = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => 10, 'order' => 'DESC' ) );

            while ( $query->have_posts() ) {
            	$query->the_post();
            if($quantity_project_start == 1){
               $first_project_title = get_the_title();
               $first_project_time = get_post_meta(get_the_ID(), 'project_time', true);
                }?>

            <div class="swiper-slide" data-name="<?php echo the_title(); ?>" data-calendar="<?php echo  get_post_meta(get_the_ID(), 'project_time', true); ?>">

                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>

                <div class="social-icons__wrapper_top" style="position: absolute;  bottom: 0; right: -0px;">
                <img class="social-icons__wrapper_share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                <div class="social-icons__container">
                  <a href="#"class="social-icons__container-link-hide"></a>
                  <a href="https://plus.google.com/share?url=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-gp"><img src="<?php echo get_template_directory_uri();?>/img/i-google.png" alt="google"></a>
                  <a href="https://www.facebook.com/sharer.php?u=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                </div>
                </div>

            </div>

            <?php
            $quantity_project_start++;
              }?>

          </div>
      </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
           <div class="btn slider-btn">Посмотреть анонс</div>
        </div>
    </div>

    <div class="sidebar">
        <div class="vertical-text">
            <p class="project-title"> <?php echo $first_project_title; ?></p>
            <p class="pub-data"><?php echo $first_project_time; ?></p>
        </div>
          <div class="sidebar-bottom">
          </div>
    </div>
</div>

      <div class="full-width">
                  <div class="wrapper flx artists-wrapper">
                      <div class="artists-title">Художники</div>
                      <div class="artists-list">
                        <div class="artists-search flx-align">
                            <input type="text" class="live-search-box" placeholder="Введите имя художника...">
                            <img src="<?php echo get_template_directory_uri();?>/img/search.png" alt="search">
                        </div>
                        <ul class="artists-container">
                        <?php $hiterms = get_terms("artists", array("orderby" => "slug", "parent" => 0, "hide_empty" => 0)); ?>
                        <?php foreach($hiterms as $key => $hiterm) : ?>
                        <li class="artists-item">
                        <?php $term_link = get_term_link( $hiterm ); ?>
                        <a href="<?php echo esc_url( $term_link ); ?>">
                        <span><?php echo $hiterm->name; ?></span>
                        </a>
                        </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                      <div class="sidebar"></div>
                  </div>
              </div> <!-- end full-width -->

              <div class="full-width">
                  <div class="publications-wrapper wrapper flx">
                      <div class="publications">
                          <div class="pab-title">Публикации</div>

                          <div class="slider-wrapper">
                              <div class="slider">
                                  <div class="swiper-container">
                                      <div class="swiper-wrapper">

                                        <?php
                                         $quantity_publications_start = 1;
                                          $query = new WP_Query( array( 'post_type' => 'publications', 'posts_per_page' => 10, 'order' => 'DESC' ) );
                                          while ( $query->have_posts() ) {
                                          	$query->the_post();
                                          if($quantity_publications_start == 1){
                                             $first_publications_time =  get_the_time('j F Y');
                                          }?>
                                          <div class="swiper-slide" data-calendar="<?php echo the_time('j F Y'); ?>">
                                              <div class="pub-item flx">
                                                  <?php echo get_the_post_thumbnail(); ?>
                                                  <div class="pub-descr">
                                                      <h3><?php echo the_title(); ?></h3>
                                                      <?php echo  get_post_meta(get_the_ID(), 'publications_description', true); ?>
                                                      <a href="<?php echo get_permalink(); ?>" class="btn pub-btn">Читать больше</a>

                                                      <div class="social-icons__wrapper_top" style="margin-left: -36px;">
                                                      <img class="social-icons__wrapper_share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                                                      <div class="social-icons__container">
                                                        <a href="#"class="social-icons__container-link-hide"></a>
                                                        <a href="https://plus.google.com/share?url=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-gp"><img src="<?php echo get_template_directory_uri();?>/img/i-google.png" alt="google"></a>
                                                        <a href="https://www.facebook.com/sharer.php?u=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                                                      </div>
                                                      </div>


                                                  </div>
                                              </div>
                                          </div>
                                          <?php
                                          $quantity_publications_start++;
                                            }?>
                                      </div>
                                  </div>

                                  <div class="swiper-pagination"></div>
                              </div>
                          </div>

                      </div>
                      <div class="sidebar">
                          <p class="pub-data vertical-text"><?php echo $first_publications_time; ?></p>
                            <div class="sidebar-bottom">
                            </div>
                      </div>
                  </div> <!-- end publications-wrapper -->
              </div>

  </main>
    <?php get_footer(); ?>
