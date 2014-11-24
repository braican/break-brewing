<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Breakbrewing
 */
?>

<div id="secondary" class="main-sidebar" role="complementary">
	<div class="logo"><?php include_svg('logo-2'); ?></div>    

    
    
    <?php
    error_log( print_r( wp_get_nav_menu_items(8) , true ) );
    ?>
</div><!-- #secondary -->
