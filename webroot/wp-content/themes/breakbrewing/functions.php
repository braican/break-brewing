<?php
/**
 * Breakbrewing functions and definitions
 *
 * @package Breakbrewing
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'breakbrewing_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function breakbrewing_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Breakbrewing, use a find and replace
     * to change 'breakbrewing' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'breakbrewing', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'breakbrewing' ),
    ) );
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link'
    ) );

    // Setup the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'breakbrewing_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // breakbrewing_setup
add_action( 'after_setup_theme', 'breakbrewing_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function breakbrewing_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'breakbrewing' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'breakbrewing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function breakbrewing_scripts() {
    wp_enqueue_style( ' breakbrewing-style', get_stylesheet_uri() );

    wp_enqueue_script( ' breakbrewing-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '20140725', true );

    wp_enqueue_script( ' breakbrewing-main', get_template_directory_uri() . '/js/main.js', array('plugins', 'jquery'), '20140725', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'breakbrewing_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/* --------------------------------------------
 * --_s content types and taxonomies
 * -------------------------------------------- */

/**
 * breakbrewing_content_types
 *
 * http://codex.wordpress.org/Function_Reference/register_post_type
 */
function breakbrewing_content_types(){

    // register_post_type('type_name', array(

    // ));
}
add_action('init', 'breakbrewing_content_types');


/**
 * breakbrewing_taxonomies
 *
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function breakbrewing_taxonomies(){

    // register_taxonomy('taxonomy_name', array('content_types'), array(

    // ));
}
add_action('init', 'breakbrewing_taxonomies');


/* --------------------------------------------
 * --_s customizations
 * -------------------------------------------- */

//
// --structure
//

/**
 * breakbrewing_modify_wysiwyg
 * @param $init : the object that drives the wysiwyg
 * @return the modified object that represents the wysiwyg
 */
function breakbrewing_modify_wysiwyg( $init ) {
    $init['block_formats'] = 'Paragraph=p;Heading 3=h3';
    return $init;
}
add_filter('tiny_mce_before_init', 'breakbrewing_modify_wysiwyg');

//
// --functions
//

/**
 * include_svg
 * @param (string) svg : the svg to include
 * 
 * include an svg file inline into the theme
 */
function include_svg( $svg ){
    include( get_template_directory() . '/svg/' . $svg . '.svg' );
}

