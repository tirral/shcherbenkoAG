
<div class="projects-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="projects-item-img">
        <?php echo the_post_thumbnail(); ?>
    </div>
    <div class="projects-item-info">
        <p class="h3-title"><?= get_the_term_list( get_the_ID(), 'artists' ) ?></p>
        <p class="title-h3">24.07.2018— 08.09.2018 </p>
        <a  href="<?php echo get_permalink(); ?>" class="bold-title"><?php the_title(); ?></a>
        <p>year: <?= get_post_meta(get_the_ID(), 'year', true) ?></p>
    </div>
    <div class="share-wrapper">
        <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
        <div class="social-icons">
<a href="https://www.facebook.com/sharer.php?u=<?php echo  esc_url( home_url( '/' ) );?><?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" class="social-fb" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
        </div>
    </div>
</div>
