<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Breakbrewing
 */

get_header(); ?>
	

	<div class="legend">
		<div class="status-symbol in-progress">
			<span></span> In Progress
		</div>
		<div class="status-symbol currently-drinking">
			<span></span> Currently Drinking
		</div>
	</div>


	<div id="primary" class="content-area breakbrewing-cf">
		

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'beertile' ); ?>

			<?php endwhile; ?>

			<?php //breakbrewing_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #primary -->
<?php get_footer(); ?>
