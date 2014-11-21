<?php
/**
 * @package Breakbrewing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('beer-tile'); ?>>
	<div class="beer-tile-pad tile-front">
		<?php if(has_post_thumbnail()) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>

		<div class="tile-hover beer-tile-pad">
			<header>
				<h2><?php the_title(); ?></h2>

				<?php if($abv = get_field('breakbrewing_abv')) : ?>
					<div class="abv">
						<h3>ABV:</h3>
						<?php echo $abv; ?>
					</div>
				<?php endif; ?>
			</header>

			<section class="style">
				<?php breakbrewing_get_the_terms($post->ID, 'beer_style', 'Style:'); ?>
			</section>

			<section class="hops">
				<?php breakbrewing_get_the_terms($post->ID, 'hops', 'Hops Used:'); ?>
			</section>

			<?php if($end_date = get_field('breakbrewing_release_date')) : ?>
			    <?php $formatted_end_date = breakbrewing_format_date($end_date); ?>
			    <?php $date_label = breakbrewing_datelabel($end_date); ?>
			    <section class="release-date">
			    	<h3><?php echo $date_label; ?>:</h3>
					<?php echo $formatted_end_date; ?>
				</section>
			<?php endif; ?>

			<section class="more">
				<a href="#" class="js-launch-beerdrawer">+ More</a>

				<div class="about-the-beer">
					<?php the_content(); ?>
				</div>
			</section>
		</div>
	</div>

	<div class="beerdrawer beer-tile-pad"></div>

	
</article><!-- #post-## -->