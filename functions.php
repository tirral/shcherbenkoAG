<?php
/**
 * shcherbenko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shcherbenko
 */


 /*
  * Redux support
 */
  if ( class_exists( 'Redux' ) && file_exists( get_template_directory() . '/inc/config.php' ) ) {
 	require_once( get_template_directory() . '/inc/config.php' );
 }

 global $thetirral_global;
 $opt_name = 'thetirral_global';


if ( ! function_exists( 'shcherbenko_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shcherbenko_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shcherbenko, use a find and replace
		 * to change 'shcherbenko' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shcherbenko', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shcherbenko' ),
			'menu-2' => esc_html__( 'Footer', 'shcherbenko' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shcherbenko_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'shcherbenko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 */
function shcherbenko_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shcherbenko_content_width', 640 );
}
add_action( 'after_setup_theme', 'shcherbenko_content_width', 0 );

/*
 * Register widget area.
 */
function shcherbenko_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shcherbenko' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shcherbenko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shcherbenko_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function shcherbenko_scripts() {
		wp_enqueue_style( 'shcherbenko-style', get_stylesheet_uri() );
    wp_enqueue_style( 'shcherbenko-swiperCSS', get_template_directory_uri() . '/css/swiper.css', false, NULL, 'all');
    wp_enqueue_style( 'shcherbenko-commonCSS', get_template_directory_uri() . '/css/common-styles.css', false, NULL, 'all');
    wp_enqueue_style( 'shcherbenko-fancyboxCSS', get_template_directory_uri() . '/css/jquery.fancybox.min.css', false, NULL, 'all');
    if (is_page_template('page-templates/page_home.php')) {
        	wp_enqueue_style( 'shcherbenko-homepageCss', get_template_directory_uri() . '/css/styles_home.css', false, NULL, 'all');
          wp_enqueue_script( 'shcherbenko-homepageJs', get_template_directory_uri() . '/js/homepage.js');
    }
    if (is_page_template('page-templates/page_aboutus.php')) {
        	wp_enqueue_style( 'shcherbenko-aboutusCss', get_template_directory_uri() . '/css/styles_aboutus.css', false, NULL, 'all');
          wp_enqueue_script( 'shcherbenko-aboutusJs', get_template_directory_uri() . '/js/aboutus.js');
    }
		wp_enqueue_script( 'shcherbenko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
		wp_enqueue_script( 'shcherbenko-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
		wp_enqueue_script('jquery');
    wp_enqueue_script( 'shcherbenko-swiperJS', get_template_directory_uri() . '/js/swiper.min.js');
    wp_enqueue_script( 'shcherbenko-fancyboxJS', get_template_directory_uri() . '/js/jquery.fancybox.min.js');
    wp_enqueue_script( 'shcherbenko-readmore', get_template_directory_uri() . '/js/readmore.min.js');
		wp_enqueue_script( 'shcherbenko-main', get_template_directory_uri() . '/js/main.js');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shcherbenko_scripts' );


/**
* Metaboxes for custom post types and pages
*/
require get_template_directory() . '/inc/metaboxes/home_page-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/aboutus_page-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/team-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/artists-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/works-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/project-metaboxes.php';


/**
* Register custom post types
*/
require get_template_directory() . '/inc/custom-post-type/post-type-team.php';
require get_template_directory() . '/inc/custom-post-type/post-type-works.php';
require get_template_directory() . '/inc/custom-post-type/post-type-project.php';

/**
* Register custom taxonomy
*/
require get_template_directory() . '/inc/taxonomy/taxonomy-artists.php';





/**
* Enable support for Post Thumbnails on posts and pages.
*/
if ( function_exists( 'add_theme_support' ) ) {
 add_theme_support( 'post-thumbnails' );
 set_post_thumbnail_size( 420, 300, true );
}
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'team-thumb', 150, 150, true );
add_image_size( 'member-thumb', 258, 279, true );
}


/*
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/*
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/*
* Main menu sub-menu class rename
*/

function new_submenu_class($menu, $args) {
    $menu = preg_replace('/ class="sub-menu"/','/ class="submenu" /',$menu);
  return $menu;
}
add_filter('wp_nav_menu','new_submenu_class');






add_action('init', 'artists_rewrites');

function artists_rewrites(){

	// Страница со списком постов терма определенного типа поста с номером страницы для пагинации
	add_rewrite_rule( '^(works)/([^/]*)/([0-9]+)/?', 'index.php?page_type=post_archive_by_term&term_post_type=$matches[1]&taxonomy=artists&term=$matches[2]&paged=$matches[3]', 'top' );

	// Страница с одним постом терма определенного типа поста
  add_rewrite_rule( '^(works)/([^/]*)/([^/]*)?', 'index.php?page_type=single_post_by_term&term_post_type=$matches[1]&taxonomy=artists&term=$matches[2]&post_slug=$matches[3]', 'top' );

	// Страница со списком постов терма определенного типа поста
	add_rewrite_rule( '^(works)/([^/]*)/?', 'index.php?page_type=post_archive_by_term&term_post_type=$matches[1]&taxonomy=artists&term=$matches[2]', 'top' );





  // Страница со списком постов терма определенного типа поста с номером страницы для пагинации
  add_rewrite_rule( '^(project)/([^/]*)/([0-9]+)/?', 'index.php?page_type=post_project_archive_by_term&term_post_type=$matches[1]&taxonomy=artists&term=$matches[2]&paged=$matches[3]', 'top' );

  // Страница с одним постом терма определенного типа поста
  add_rewrite_rule( '^(project)/([^/]*)/([^/]*)?', 'index.php?page_type=single_project_post_by_term&term_post_type=$matches[1]&taxonomy=artists&term=$matches[2]&post_slug=$matches[3]', 'top' );


  // Страница со списком постов терма определенного типа поста
	add_rewrite_rule( '^(project)/([^/]*)/?', 'index.php?page_type=post_project_archive_by_term&term_post_type=$matches[1]&taxonomy=artists&term=$matches[2]', 'top' );








	// Архивная страница таксономии с номером страницы для пагинации
	add_rewrite_rule( '^artists/([0-9]+)/?', 'index.php?page_type=term_archive&taxonomy=artists&paged=$matches[1]', 'top' );

	// Страница одного терма без постов
	add_rewrite_rule( '^artists/([^/]*)/?', 'index.php?page_type=term_single&taxonomy=artists&term=$matches[1]', 'top' );

	// Архивная страница таксономии
	add_rewrite_rule( '^artists/?', 'index.php?pagename=artists&page_type=term_archive&taxonomy=artists', 'top' );

}

add_filter( 'query_vars', 'artists_query_vars' );

function artists_query_vars($vars){

	$vars[] = 'page_type';
  $vars[] = 'post_slug';
	$vars[] = 'term_post_type';
	return $vars;

}

add_filter('template_include', 'artists_template_include', 1, 1);

function artists_template_include($template){

    global $wp_query;
    $taxonomy = $wp_query->query_vars['taxonomy'];

    if ($taxonomy === "artists") {
        return dirname(__FILE__).'/artists-parent-template.php';
    }

    return $template;

}

function places_permalinks_tat( $permalink, $post, $leavename ,$term, $taxonomy) {
    if (empty( $permalink ) || in_array( $post->post_status, array( 'draft', 'pending', 'auto-draft' ) ) ) {
        return $permalink;
    }
    switch($post->post_type) {

        case 'works':
	        $artists = wp_get_post_terms( $post->ID, 'artists' );
	        if( $artists ) {
				        $permalink = "/works/{$artists[0]->slug}/{$post->post_name}";
	        }
	        break;

          case 'project':
  	        $artists = wp_get_post_terms( $post->ID, 'artists' );
  	        if( $artists ) {
  				        $permalink = "/project/{$artists[0]->slug}/{$post->post_name}";
  	        }
  	        break;




    }
    return $permalink;
}

add_filter( 'post_type_link', 'places_permalinks_tat',11, 3 );

add_filter('term_link', 'term_link_filter', 10, 3);

function term_link_filter( $url, $term, $taxonomy ) {

       switch($taxonomy) {
        case 'artists':
	        $url = "/artists/{$term->slug}";
	        break;
    }
    return $url;
}
