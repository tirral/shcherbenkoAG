<?php
/*
Template Name: About us page
*/
?>

<?php get_header(); ?>

<main>
  <?php
  while ( have_posts() ) :
    the_post();
?>
        <div class="wrapper">
            <h1 class="title-h1">О нас</h1>
            <div class="slider">
                <div class="swiper-slide slide-active" style="background:url(<?php echo  get_post_meta(get_the_ID(), 'aboutus_gallery_1', true); ?>) center / cover;"></div>
                <div class="swiper-slide" style="background:url(<?php echo  get_post_meta(get_the_ID(), 'aboutus_gallery_2', true); ?>) center / cover;"></div>
                <div class="swiper-slide" style="background:url(<?php echo  get_post_meta(get_the_ID(), 'aboutus_gallery_3', true); ?>) center / cover;"></div>
                <div class="swiper-slide" style="background:url(<?php echo  get_post_meta(get_the_ID(), 'aboutus_gallery_4', true); ?>) center / cover;"></div>
            </div> <!-- end slider -->
        </div>

        <div class="full-width no-border">
            <div class="wrapper">
                <div class="directions flx">
                    <div class="sidebar">
                        <p class="h3-title">Направления</p>
                        <ul class="direction-list">
                            <li class="direction-item"><?php echo  get_post_meta(get_the_ID(), 'aboutus_activity_1', true); ?> </li>
                            <li class="direction-item"><?php echo  get_post_meta(get_the_ID(), 'aboutus_activity_2', true); ?> </li>
                            <li class="direction-item"><?php echo  get_post_meta(get_the_ID(), 'aboutus_activity_3', true); ?></li>
                            <li class="direction-item"><?php echo  get_post_meta(get_the_ID(), 'aboutus_activity_4', true); ?> </li>
                        </ul>
                    </div>

                    <div class="direction-content">
                      <?php echo the_content(); ?>
                    </div>
                </div> <!-- end directions -->
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
        <div class="full-width">
            <div class="wrapper">
                <div class="team flx">

                    <div class="sidebar">



<div class="title-h1">Наша команда</div>

 <?php echo do_shortcode( '[contact-form-7 id="78" title="Без названия"]' ); ?>

                    </div>
                    <div class="team-content flx">
                      <!-- НАЧАЛО ЦЫКЛА ДЛЯ ВЫВОДА СОТРУДНИКОВ -->
                      					<?php
                      					$args = array(
                      					'order' => 'ASC',
                      					'post_type' => 'team',
                      					'posts_per_page' => 4,
                      					);
                      					$loop = new WP_Query( $args);
                      					if ( $loop->have_posts() ) {
                      					while ( $loop->have_posts() ) : $loop->the_post();
                      							get_template_part( 'template-parts/content', 'team' );
                      					endwhile;
                      					} else {
                      						echo __( 'No team found' );
                      					}
                      					wp_reset_postdata();
                      					?>
                      <!-- КОНЕЦ ЦЫКЛА ДЛЯ ВЫВОДА СОТРУДНИКОВ  -->

                    </div> <!-- end team-content -->
                </div> <!-- end team -->
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
        <div class="full-width">
            <div class="wrapper art-location-wrapper flx">
                <div class="art-location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.3029170660766!2d30.519448716438813!3d50.45408367947584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce454ceeee63%3A0xa85242a9f20ab684!2z0YPQuy4g0JzQuNGF0LDQudC70L7QstGB0LrQsNGPLCAyMiwg0JrQuNC10LIsIDAyMDAw!5e0!3m2!1sru!2sua!4v1539348888346" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <div class="art-address-block">
                        <p class="art-name"><?php echo  get_post_meta(get_the_ID(), 'aboutus_card_block_name', true); ?></p>
                        <p class="art-address"><?php echo  get_post_meta(get_the_ID(), 'aboutus_card_block_address', true); ?></p>
                        <p class="art-free"><?php echo  get_post_meta(get_the_ID(), 'aboutus_card_block_visit_condition', true); ?></p>
                    </div>
                </div>
                <div class="sidebar vertical-text">
                    <p class="h3-title"><?php echo  get_post_meta(get_the_ID(), 'aboutus_working_days', true); ?></p>
                    <p class="weekends"><?php echo  get_post_meta(get_the_ID(), 'aboutus_weekend', true); ?></p>
                </div>
            </div> <!-- end wrapper -->
        </div> <!-- end full-width -->
    </main>

<?php
    endwhile; // End of the loop.
    ?>

<?php get_footer(); ?>
