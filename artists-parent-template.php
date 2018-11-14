<?php
/**
 * Template Name: artists
 */
get_header();

$page_type = get_query_var('page_type');

switch($page_type){

  case 'term_archive':
    echo "<h1>Шаблон списка всех художников (архив термов)</h1>";
    $page = get_query_var('paged');
    echo "<h2>Страница: $page</h2>";
  break;

  case 'term_single':
    echo "<h1>Шаблон одного художника (single терма)</h1>";
  break;

  case 'post_archive_by_term':
    echo "<h1>Шаблон списка постов (тип указан ниже) одного художника</h1>";
    $term_post_type = get_query_var('term_post_type');
    echo "<h2>Тип поста для загрузки: $term_post_type</h2>";
    $page = get_query_var('paged');
    echo "<h2>Страница: $page</h2>";
  break;

  case 'single_post_by_term':
    echo "<h1>Страница одного поста (тип указан ниже) одного художника</h1>";
    $term_post_type = get_query_var('term_post_type');
    echo "<h2>Тип поста для загрузки: $term_post_type</h2>";
  break;

}

$object = get_queried_object();
echo "<h3>queried object:</h3>";
echo "<pre>";
var_dump($object);
echo "</pre>";

echo "<h3>Loop:</h3>";
while( have_posts() ): the_post();
  echo "[" . get_the_ID() . "] " . the_title() . "<br>";
endwhile;

get_footer();
