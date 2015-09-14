<?php get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>

    <div class="c-page-header">
        <div class="c-frame">
            <div class="c-page-header__inner">
                <div class="c-page-header__logo">
                    <?php component('logo'); ?>
                </div>

                <div class="c-page-header__nav">
                    <div class="c-nav-bar">
                        <ul class="c-nav-bar__inner">
                            <li class="c-nav-bar__item">
                                <a href="/" class="c-nav-bar__link">Home</a>
                            </li>
                            <li class="c-nav-bar__item">
                                <a href="/locations" class="c-nav-bar__link">Locations</a>
                            </li>
                            <li class="c-nav-bar__item">
                                <a href="/events" class="c-nav-bar__link">Events</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="c-text-content c--padded">
        <div class="c-frame">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            <?php the_content(); ?>
        </div>
    </main>

<?php
// End the loop.
endwhile;
?>

<?php get_footer(); ?>
