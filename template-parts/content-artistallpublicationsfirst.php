<div class="full-width no-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper capabilities-wrapper flx">
        <div class="c-aside-nav">


        </div>
        <div class="c-block-wrapper  flx">
            <div class="c-block  remove-paddings flx">
                <?php  the_post_thumbnail(); ?>
                <div class="c-content">
                    <div>
                        <p class="c-title"><?php the_title( ); ?></p>
                        <p class="title-h3"><?php echo the_time('j F Y'); ?></p>
                    </div>
                      <a href="<?php echo get_permalink(); ?>" class="btn c-btn">Узнать больше</a>
                </div>
            </div>

            <div class="sidebar">
                <?php social_share_gorizontal(); ?>
          </div>
        </div>
    </div>
</div> <!-- end full-width -->
