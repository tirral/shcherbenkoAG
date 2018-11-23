<?php


$page_type = get_query_var('page_type');

//echo $page_type;

switch ($page_type) {
    // Шаблон списка всех художников (архив термов)
    // $page = get_query_var('paged');
    // echo "<h2>Страница: $page</h2>";
    case 'term_archive':
        include_once('template-parts/template-all-artists.php');
        break;

// Шаблон одного художника (single терма)
// http://shcherbenko.odev.io/artists/artists_1/
    case 'term_single':
        include_once('template-parts/template-single-artists.php');
        break;

// Шаблон всех работ одного художника
// http://shcherbenko.odev.io/works/artists_1/
// echo "<h1>Шаблон списка постов (тип указан ниже) одного художника</h1>";
// $term_post_type = get_query_var('term_post_type');
// echo "<h2>Тип поста для загрузки: $term_post_type</h2>";
// $page = get_query_var('paged');
// echo "<h2>Страница: $page</h2>";
    case 'post_archive_by_term':
        include_once('template-parts/template-artist-all-work.php');
        break;

// Страница одного поста (тип указан ниже) одного художника
// echo "<h1>Страница одного поста (тип указан ниже) одного художника</h1>";
// $term_post_type = get_query_var('term_post_type');
// echo "<h2>Тип поста для загрузки: $term_post_type</h2>";
    case 'single_post_by_term':
        include_once('template-parts/template-single-work.php');
        break;

// Страница одного поста ПРОЕКТА одного художника (вывод одной записи)
    case 'single_project_post_by_term':
        include_once('template-parts/template-single-project.php');
        break;

// Шаблон всех ПРОЕКТОВ одного художника (вывод архива) http://shcherbenko.odev.io/project/artists_1/
    case 'post_project_archive_by_term':
        include_once('template-parts/template-artist-all-project.php');
        break;

    // Шаблон одной ПУБЛИКАЦИИ одного художника http://shcherbenko.odev.io/publications/artists_1/publications-2/
    case 'single_publications_post_by_term':
        include_once('template-parts/template-single-publications.php');
        break;

    // Шаблон всех ПУБЛИКАЦИЙ одного художника (вывод архива)
    case 'post_publications_archive_by_term':
        include_once('template-parts/template-artist-all-publications.php');
        break;

}



// $object = get_queried_object();
// echo "<h3>queried object:</h3>";
// echo "<pre>";
// var_dump($object);
// echo "</pre>";

// echo "<h3>Loop:</h3>";
// while( have_posts() ): the_post();
//   echo "[" . get_the_ID() . "] " . the_title() . "<br>";
// endwhile;
