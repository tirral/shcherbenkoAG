<?php
/**
 * Template part for displaying artists all works in page archive-works.php
 *
 */
?>


<div class="artists-pics-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="artists-pics-item-img">
        <?php the_post_thumbnail( 'post-thumbnails' ); ?>
    </div>

    <div class="artists-pics-item-info">
      <a href="<?php echo the_permalink(); ?>" class="h3-title"><?php the_title(); ?></a>
        <p class="title-h3"><?php echo  get_post_meta(get_the_ID(), 'works_short_description', true); ?></p>



        <p class="pic-available">
          <?php
          $text = get_post_meta( get_the_ID(), 'works_sale_status', true );
          echo esc_html( $text );
          ?>
        </p>
    </div>

    <div class="share-wrapper">
        <img class="share" src="<?php echo get_template_directory_uri();?>/img/icon-share.png" alt="share">
        <div class="social-icons">
            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-fb.png" alt="facebook"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-insta.png" alt="instagram"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-google.png" alt="google"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri();?>/img/i-youtube.png" alt="youtube"></a>
        </div>
    </div>
</div>
