<div class="full-width no-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper flx">
        <div class="lecture-block-wrapper flx">
            <div class="lecture-block flx">
                <?php  the_post_thumbnail(); ?>
                <div class="lecture-content">
                    <div>
                        <p class="lecture-title"><?php the_title( ); ?></p>
                        <p class="lecture-date"><?php echo  get_post_meta(get_the_ID(), 'education_working_hours', true); ?></p>
                        <p class="lecture-theme"><?php echo  get_post_meta(get_the_ID(), 'education_short_description', true); ?></p>
                    </div>
                    <div>
                        <p class="lecture-author">Лектор: <?php echo  get_post_meta(get_the_ID(), 'education_lecturer', true); ?></p>
                        <p class="lecture-price">
                          <?php
                          $text = get_post_meta( get_the_ID(), 'education_visit_mode', true );
                          echo esc_html( $text );
                          ?>
                        </p>
                    </div>
                </div>







                    <a href="<?php the_permalink(); ?> " class="btn lecture-btn">Узнать больше</a>
            </div>

            <div class="sidebar">
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
    </div>
</div> <!-- end full-width -->
