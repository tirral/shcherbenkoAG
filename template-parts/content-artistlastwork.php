<?php
/**
 * Template part for displaying team custom post type content
 *
 */
?>

<div class="artist-work" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="artist-picture">
        <?php the_post_thumbnail( 'post-thumbnails' ); ?>
    </div>
    <div class="btn">
      <!-- ССЫЛКА НА СТРАНИЦУ АРХИВА -->
          <a href="<?php echo the_permalink(); ?>">ВСЕ РАБОТЫ ХУДОЖНИКА</a>


    </div>
</div>

<div class="sidebar">
    <div class="vertical-text">
        <p class="title-h1"><?php the_title(); ?></p>
        <p class="title-h3">холст, 2100 х 360 см</p>
    </div>
</div>
