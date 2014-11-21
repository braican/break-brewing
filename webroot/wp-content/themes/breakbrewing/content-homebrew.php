<?php
/**
 * @package Breakbrewing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header col-pad">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <section class="entry-content col-pad">
        <?php the_content(); ?>
    </section><!-- .entry-content -->

    <section class="brewstats breakbrewing-cf">
        <h3 class="col-pad">Brewstats</h3>
        <?php if($start_date = get_field('breakbrewing_initial_brew_date')) : ?>
            <?php $formatted_start_date = breakbrewing_format_date($start_date); ?>
            <div class="start-date column column-1-2 col-pad"><strong>Brew date:</strong> <?php echo $formatted_start_date; ?></div>
        <?php endif; ?>

        <?php if($end_date = get_field('breakbrewing_release_date')) : ?>
            <?php $formatted_end_date = breakbrewing_format_date($end_date); ?>
            <?php $date_label = breakbrewing_datelabel($end_date); ?>
            <div class="end-date column column-1-2 col-pad"><strong><?php echo $date_label; ?></strong> <?php echo $formatted_end_date; ?></div>
        <?php endif; ?>

        <?php if($abv = get_field('breakbrewing_abv')) : ?>
            <div class="abv column column-1-2 col-pad"><strong>ABV:</strong> <?php echo $abv; ?></div>
        <?php endif; ?>
        
        <?php if($yield = get_field('breakbrewing_yield')) : ?>
            <div class="yield column column-1-2 col-pad"><strong>Yield:</strong> <?php echo $yield; ?></div>
        <?php endif; ?>
    </section>
    
    <section class="brewstyle col-pad">
        <?php breakbrewing_get_the_terms($post->ID, 'beer_style', 'Style'); ?>
    </section>

    <section class="brewhops col-pad">
        <?php breakbrewing_get_the_terms($post->ID, 'hops', 'Hops'); ?>
    </section>

    
    <?php if($my_review = get_field('breakbrewing_my_review')) : ?>
        <section class="my-review col-pad">
            <h3>My (probably biased) review</h3>
            <div class="review-content"><?php echo $my_review; ?></div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('breakbrewing_other_comments') ): ?>
        <section class="other-reviews col-pad">
            <h3>What other people are saying</h3>
            <?php while ( have_rows('breakbrewing_other_comments') ) : the_row(); ?>
                <div class="review-content"><?php the_sub_field('breakbrewing_other_comment'); ?></div>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
    

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'breakbrewing' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
