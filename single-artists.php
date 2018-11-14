<?php
/**
 * The template for displaying single artists page
 *
 */

 /**
  * Enqueue scripts and styles.
  */
 function shcherbenko_scripts_single_artists() {
  wp_enqueue_style( 'shcherbenko-artistsone', get_template_directory_uri() . '/css/styles_artistsone.css', false, NULL, 'all');
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
 }
 add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts_single_artists' );
 
get_header();
?>
<main>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'artistssinglepage' );
			the_post_navigation();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
<?php
get_footer();
?>
