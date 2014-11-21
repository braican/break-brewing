<?php
/**
 * @package Breakbrewing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="beerblock-pad">
		<?php if(has_post_thumbnail()) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
</article><!-- #post-## -->