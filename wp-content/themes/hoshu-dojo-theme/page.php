<?php get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>

    <div class="c-page-header">
        <?php component('logo'); ?>
    </div>

    <main class="c-text-content c--padded">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <?php the_content(); ?>
    </main>

<?php
// End the loop.
endwhile;
?>

<?php get_footer(); ?>
