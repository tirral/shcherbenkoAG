<?php get_header(); ?>

    <main>
        <div class="wrapper flx">
            <div class="slider-wrapper">
                <div class="slider">
                    <div class="slider-item">
                        <img src="<?php echo get_template_directory_uri(); ?> /img/slider-img1.png" alt="photo">
                        <div class="slider-nav">
                            <span class="current-proj">1</span> \
                            <span class="all-proj">10</span>
                        </div>
                    </div>

                    <div class="slider-pagination">
                        <img src="<?php echo get_template_directory_uri(); ?> /img/arrow-next.png" class="arrow-next" alt="next">
                        <img src="<?php echo get_template_directory_uri(); ?> /img/arrow-prev.png" class="arrow-prev" alt="prev">
                    </div>

                    <div class="btn slider-btn">Посмотреть анонс</div>
                </div>
            </div>

            <div class="sidebar">
                <div class="vertical-text">
                    <p class="project-title">Название проекта</p>
                    <p class="pub-data">02 июня 2018 — 21 августа 2018</p>
                </div>
                <div class="sidebar-bottom">
                    <img class="share" src="<?php echo get_template_directory_uri(); ?> /img/icon-share.png" alt="share">
                    <div class="social-icons">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-fb.png" alt="facebook"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-insta.png" alt="instagram"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-google.png" alt="google"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-youtube.png" alt="youtube"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-width">
            <div class="wrapper flx artists-wrapper">
                <div class="artists-title">Художники</div>
                <div class="artists-list">

                    <div class="artists-search flx-align">
                        <input type="text" placeholder="Введите имя художника...">
                        <img src="<?php echo get_template_directory_uri(); ?> /img/search.png" alt="search">
                    </div>

                    <ul>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                        <li class="artists-item"><a href="#">Diane Arbus</a></li>
                    </ul>
                </div>
                <div class="sidebar"></div>
            </div>
        </div> <!-- end full-width -->

        <div class="full-width">
            <div class="publications-wrapper wrapper flx">
                <div class="publications">
                    <div class="pab-title">Публикации</div>
                    <div class="pub-item flx">
                        <img src="<?php echo get_template_directory_uri(); ?> /img/publication-img1.png" alt="photo">
                        <div class="pub-descr">
                            <h3>Арт-рынок в Украине: <br> как и где продается украинское искусство</h3>
                            <p>Попробуем разобраться, как функционирует арт-рынок в Украине, и кто его основные игроки. А также узнаем тенденции и перспективы развития украинского искусства в будущем.</p>

                            <div class="btn pub-btn">Читать больше</div>
                        </div>
                    </div>

                    <div class="pub-nav">
                        <span class="current-pub">1</span> \
                        <span class="all-pub">10</span>
                    </div>

                </div>
                <div class="sidebar">
                    <p class="pub-data vertical-text">02 июня 2018</p>
                    <div class="sidebar-bottom">
                        <img class="share" src="<?php echo get_template_directory_uri(); ?> /img/icon-share.png" alt="share">
                        <div class="social-icons">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-fb.png" alt="facebook"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-insta.png" alt="instagram"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-google.png" alt="google"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?> /img/i-youtube.png" alt="youtube"></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end publications-wrapper -->
        </div>
    </main>

    <?php get_footer(); ?>
