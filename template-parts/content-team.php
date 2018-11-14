<?php
/**
 * Template part for displaying team custom post type content
 *
 */
?>

<div class="team-worker" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="worker-photo">
        <?php the_post_thumbnail( 'team-thumb' ); ?>
    </div>
    <div>
        <p class="h3-title"><?php the_title(); ?></p>
        <p class="team-position"><?php echo  get_post_meta(get_the_ID(), 'team_position', true); ?></p>
        <a class="worker-contacts" href="tel:<?php echo  get_post_meta(get_the_ID(), 'team_phone_number_1', true); ?>"><?php echo  get_post_meta(get_the_ID(), 'team_phone_number_1', true); ?></a>
        <a class="worker-contacts" href="tel:<?php echo  get_post_meta(get_the_ID(), 'team_phone_number_2', true); ?>"><?php echo  get_post_meta(get_the_ID(), 'team_phone_number_2', true); ?></a>
        <a class="worker-contacts" href="mailto:<?php echo  get_post_meta(get_the_ID(), 'team_email', true); ?>"><?php echo  get_post_meta(get_the_ID(), 'team_email', true); ?></a>
    </div>
</div> <!-- end team-worker -->
