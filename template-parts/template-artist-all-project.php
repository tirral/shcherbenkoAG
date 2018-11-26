<?php
/**
 * The template for displaying artists all works.
 * http://shcherbenko.odev.io/works/artists_1/
 */

/**
 * Enqueue styles for artists all works.
 */
function shcherbenko_scripts_artistsallproject()
{
    wp_enqueue_style('shcherbenko-artistallproject', get_template_directory_uri() . '/css/styles_artistallproject.css', false, NULL, 'all');
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'shcherbenko_scripts_artistsallproject');


get_header();

// Передача слага художника в archive-works.php
$taxonomy = get_queried_object();
$artistsId = $taxonomy->term_id;
$artistsSlug = $taxonomy->slug;
$artistsName = $taxonomy->name;
echo 'template-parts/template-artist-all-project.php';
?>


<main>
       <div class="wrapper all-proj-title">
           <h1 class="title-h1">Проекты: <?php echo $artistsName; ?></h1>
           <!-- <p class="title-h3">2018</p> -->
       </div>

       <div class="full-width no-border">
           <div class="wrapper project-wrapper flx">
               <div class="projects-list">

                 <?php

                 $post_year = get_query_var('post_year');
                 global $query_string;

                 if( $post_year ){
                     $query_string .= '&meta_key=year&meta_value=' . intval($post_year).'&posts_per_page=2';
                 }

                 $query_string .= '&post_type=' . get_query_var('term_post_type').'&posts_per_page=2';

                 query_posts($query_string);

                 while (have_posts()): the_post();

                   get_template_part('template-parts/content', 'artistallproject');

                 endwhile;
             ?>

             <div class="pagination">
                 <?php
                 wp_pagenavi(); ?>
             </div>




             </div> <!-- end projects-list -->
               <div class="sidebar">
                   <ul class="data-nav-list">

                     <?php
                     $years = array();
                     $posts = get_posts(array(
                         'post_type'   => 'project',
                         'post_status' => 'publish',
                         'tax_query' => array(
                             array(
                                 'taxonomy' => 'artists',
                                 'field' => 'slug',
                                 'terms' => $artistsSlug //$artistSlug
                             )
                         ),
                         'posts_per_page' => -1,
                         'fields' => 'ids'
                         )
                     );

                     foreach($posts as $p){
                         $name = get_post_meta($p,"year",true);
                         array_push($years,  $name );
                     }

                     rsort($years);


                     $result = array_unique($years);
                     foreach ($result as $value) {
                     ?>

                      <li class="data-nav-item">
                        <a href="<?php echo  home_url( '/project/' . $artistsSlug . '/' .$value ); ?>">
                          <?php echo $value ?>
                        </a>
                      </li>

                   <?php }?>






                   </ul>
               </div>
           </div> <!-- end wrapper -->
       </div> <!-- end full-width -->
   </main>

<?php get_footer(); ?>
