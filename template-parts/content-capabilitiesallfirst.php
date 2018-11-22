<div class="full-width no-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper capabilities-wrapper flx">
        <div class="c-aside-nav">
            <ul>
                <li><a href="#" class="c-title">Стажировка в ЩАЦ</a></li>
                <li><a href="#" class="c-title c-active">Художникам</a></li>
            </ul>
        </div>
        <div class="c-block-wrapper flx">
            <div class="c-block flx">
                <?php  the_post_thumbnail(); ?>
                <div class="c-content">
                    <div>
                        <p class="c-title"><?php the_title( ); ?></p>
                        <p class="title-h3"><?php echo  get_post_meta(get_the_ID(), 'capabilities_working_hours', true); ?></p>
                    </div>
                    <a href="<?php echo get_permalink(); ?>" class="btn c-btn">Узнать больше</a>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-bottom">
                    <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end full-width -->
