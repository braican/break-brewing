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
<!-- <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'> -->
<!-- <link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'> -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'breakbrewing' ); ?></a>
    
    <?php $main_menu = wp_get_nav_menu_items(8); ?>

    <header class="site-header">

        <div class="logo"><?php include_svg('logo-2'); ?></div>

    </header><!-- #secondary -->

	<div id="content" class="site-content">
