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
			<span></span> <strong>Currently Brewing</strong>
		</div>
		<div class="status-symbol currently-drinking">
			<span></span> <strong>Currently Drinking</strong>
		</div>
	</div>


	<div id="primary" class="content-area breakbrewing-cf">
		

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'beertile' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #primary -->

	<?php if( $the_post = get_page_by_title('About') ) : ?>
	    <div class="about-content">
	        <div class="about-container">
	            <?php echo apply_filters('the_content', $the_post->post_content); ?>
	        </div>
	    </div>
	<?php endif; ?>

	<div class="instagram-feed">
		<header>We hashtag a bunch too</header>
		<div id="instabeer"></div>
		
	</div>
<?php get_footer(); ?>
