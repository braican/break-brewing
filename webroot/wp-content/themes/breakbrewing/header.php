<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Breakbrewing
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="canonical" href="http://breakbrewing.com" />
<link rel="shortlink" href="http://breakbrewing.com" />
<meta name="description" content="A homebrewing experiment from Nick Braica." />

<meta property="og:title" content="Break Brewing Project" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://breakbrewing.com" />
<meta property="og:image" content="http://breakbrewing.com/wp-content/themes/breakbrewing/img/breakbrewing.png" />

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'breakbrewing' ); ?></a>
    
    <?php $main_menu = wp_get_nav_menu_items(8); ?>

    <div id="secondary" class="main-sidebar<?php echo $main_menu ? ' has-content-drawer' : ''; ?>" role="complementary">

        <div class="sidebar-handle breakbrewing-cf">

            <div class="logo"><?php include_svg('logo-2'); ?></div>

            <?php if($main_menu) : ?>
                <div class="secondary-content">
                    <ul class="main-nav">
                        <?php foreach($main_menu as $link) : ?>
                            <li>
                                <a href="#" class="js-launch-content-drawer" data-content="<?php echo $link->object_id; ?>"><?php echo $link->title; ?></a>
                                <?php $the_post = get_post($link->object_id); ?>
                                <div class="drawer-content" data-content="<?php echo $the_post->ID; ?>">
                                    <?php echo apply_filters('the_content', $the_post->post_content); ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

    </div><!-- #secondary -->

	<div id="content" class="site-content">
