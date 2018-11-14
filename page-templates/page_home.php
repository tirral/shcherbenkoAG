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
                    <div class="swiper-slide" data-name="Название проекта" data-calendar="02 июня 2018 — 21 августа 2018" >
                        <img src="<?php echo get_template_directory_uri();?>/img/slider-img1.png" alt="artist project">
                    </div>
                    <div class="swiper-slide" data-name="Название проекта 2" data-calendar="12 июня 2018 — 25 августа 2018">
                        <img src="<?php echo get_template_directory_uri();?>/img/slider-img1.png" alt="artist project">
                    </div>
                    <div class="swiper-slide" data-name="Название проекта 3" data-calendar="22 июня 2018 — 30 августа 2018">
                        <img src="<?php echo get_template_directory_uri();?>/img/slider-img1.png"  alt="artist project">
                    </div>
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
            <p class="project-title">Название проекта</p>
            <p class="pub-data">02 июня 2018 — 21 августа 2018</p>
        </div>
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
                                          <div class="swiper-slide" data-calendar="02 июня 2018">
                                              <div class="pub-item flx">
                                                  <img src="<?php echo get_template_directory_uri();?>/img/publication-img1.png" alt="photo">
                                                  <div class="pub-descr">
                                                      <h3>Арт-рынок в Украине: <br> как и где продается украинское искусство</h3>
                                                      <p>Попробуем разобраться, как функционирует арт-рынок в Украине, и кто его основные игроки. А также узнаем тенденции и перспективы развития украинского искусства в будущем.</p>
                                                      <div class="btn pub-btn">Читать больше</div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="swiper-slide" data-calendar="18 августа 2018">
                                              <div class="pub-item flx">
                                                  <img src="<?php echo get_template_directory_uri();?>/img/publication-img1.png" alt="photo">
                                                  <div class="pub-descr">
                                                      <h3>Арт-рынок в Украине: <br> как и где продается украинское искусство</h3>
                                                      <p>Попробуем разобраться, как функционирует арт-рынок в Украине, и кто его основные игроки. А также узнаем тенденции и перспективы развития украинского искусства в будущем.</p>
                                                      <div class="btn pub-btn">Читать больше</div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="swiper-pagination"></div>
                              </div>
                          </div>

                      </div>
                      <div class="sidebar">
                          <p class="pub-data vertical-text">02 июня 2018</p>
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
                  </div> <!-- end publications-wrapper -->
              </div>



  </main>
    <?php get_footer(); ?>
