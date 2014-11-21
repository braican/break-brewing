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
    set_post_thumbnail_size( 300, 300, true );

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
    wp_enqueue_style( 'breakbrewing-style', get_stylesheet_uri() );

    wp_enqueue_script( 'breakbrewing-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '20140725', true );

    wp_enqueue_script( 'breakbrewing-main', get_template_directory_uri() . '/js/main.js', array('breakbrewing-plugins', 'jquery'), '20140725', true );

    // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    //     wp_enqueue_script( 'comment-reply' );
    // }
}
add_action( 'wp_enqueue_scripts', 'breakbrewing_scripts' );

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
 * --hooks
 * -------------------------------------------- */

/**
 * breakbrewing_alter_query
 * @param $query : the query being run
 * 
 * @implements pre_get_posts
 */
function breakbrewing_alter_query( $query ) {
    if ( $query->is_home() ) {
        $query->set('post_type', 'homebrew' );
    }
}
add_action( 'pre_get_posts', 'breakbrewing_alter_query' );


/* --------------------------------------------
 * --content types and taxonomies
 * -------------------------------------------- */

/**
 * breakbrewing_content_types
 *
 * http://codex.wordpress.org/Function_Reference/register_post_type
 */
function breakbrewing_content_types(){

    register_post_type('homebrew', array(
        'labels'   => array(
            'name'         => 'Beer',
            'add_new_item' => 'Add New Beer'
        ),
        'public'   => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite'  => array(
            'slug' => 'beer'
        )
    ));
}
add_action('init', 'breakbrewing_content_types');


/**
 * breakbrewing_taxonomies
 *
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function breakbrewing_taxonomies(){

    register_taxonomy('hops', array('homebrew'), array(
        'label' => 'Hops Used'
    ));

    register_taxonomy('beer_style', array('homebrew'), array(
        'label' => 'Style'
    ));
}
add_action('init', 'breakbrewing_taxonomies');


/* --------------------------------------------
 * --customizations
 * -------------------------------------------- */



//
// --rendering
//

/**
 * breakbrewing_get_the_terms
 * @param $id       : the id of the post
 * @param $taxonomy : the name of the taxonomy
 * @param $label    : label for these terms
 * 
 * customized version of get_terms
 */
function breakbrewing_get_the_terms($id, $taxonomy, $label){
    $terms = get_the_terms( $id, $taxonomy ); ?>

    <?php if( $terms ) :
        $term_count = count($terms);
        $i = 1; ?>
        
        <div class="terms">
            <h3><?php echo $label; ?></h3>
            <?php foreach( $terms as $t ) : ?>
                <span><?php echo $t->name; echo $term_count != $i ? ',' : ''; ?></span>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    <?php endif;
}

/**
 * breakbrewing_format_date
 * @param $date : the date
 * 
 * format the date
 */
function breakbrewing_format_date($date){
    $php_date = DateTime::createFromFormat('Ymd', $date);
    return $php_date->format('m/d/Y');   
}


/**
 * breakbrewing_datelabel
 * @param $date : the date
 * 
 * checks to see if the date given is in the future or in the past
 *  and returns a string as a label
 */
function breakbrewing_datelabel($date){
    $now = new DateTime();

    // error_log(print_r(date()) );

    if($now < DateTime::createFromFormat('Ymd', $date)){
        return "Expected Release Date";
    }
    return "Release Date";
}



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

