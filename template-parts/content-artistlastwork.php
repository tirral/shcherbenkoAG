<?php
/**
 * Template part for displaying team custom post type content
 *
 */

// Получение слага художника для ссылки на странцу всех работ одного художника http://shcherbenko.odev.io/artists/artists_1/
$taxonomy = get_queried_object();
$artistsSlug = $taxonomy->slug;
?>


<div class="artist-work" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="artist-picture">
        <?php the_post_thumbnail( 'post-thumbnails' ); ?>
    </div>
    <div class="btn">
      <!-- ССЫЛКА НА СТРАНИЦУ АРХИВА ВСЕХ РАБОТ ОДНОГО ХУДОЖНИКА  -->
          <a href="<?php echo  home_url( '/works/'. $artistsSlug ); ?>">ВСЕ РАБОТЫ ХУДОЖНИКА</a>
    </div>
</div>

<div class="sidebar">
    <div class="vertical-text">
        <p class="title-h1"><?php the_title(); ?></p>
        <p class="title-h3">холст, 2100 х 360 см</p>
    </div>
</div>
