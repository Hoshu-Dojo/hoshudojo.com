<?php get_header(); ?>

<header class="t-home__hero">
    <div class="c-splash-card">
        <aside class="c-splash-card__banner">
            <picture>
                <source srcset="<?php getImgDirectory(); ?>/home-banner-desktop.jpg" media="(min-width: 600px)" />
                <img src="<?php getImgDirectory(); ?>/home-banner-mobile.jpg" class="c-splash-card__image" alt="Photograph of Thomas Groendal and Ben Lew facing off in a Jodo kata" width="320" />
            </picture>
        </aside>

        <div class="c-splash-card__content">
            <?php component('logo'); ?>

            <div class="c-sheet">
                <p class="c-h3">
                    <span class="u-weight--light">Martial Arts, Shindo Muso Ryu Jodo, and Daito Ryu Aikijujutsu</span>
                </p>
            </div>
        </div>
    </div>
</header>

<nav role="navigation">
    <h2 class="u-visually-hidden">Main Navigation</h2>
    <ul class="c-nav-bar">
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
</nav>

<section class="t-home__about">
    <div class="c-sheet u-text-content">
        <h2 class="u-visually-hidden">About Hoshu Dojo</h2>

        <p class="c-h2 u-weight--light">Practice Moving Zen – Experience Traditional Japanese Martial Arts</p>

        <div class="t-home__about-left">
            <h3>Shindo Muso Ryu Jodo</h3>
            <p>Shindo Muso Ryu is the art of the short staff. In this art, we use a simple short staff against a sword-armed opponent.</p>
            <p>In Jodo we use the flexibility of the Jo to overcome the inherent advantages of a blade wielding opponent.</p>
        </div>

        <div class="t-home__about-right">
            <h3>Daito Ryu Aikijujutsu</h3>
            <p>Daito Ryu Aikijujutsu is the original “Aiki” art, an this art of traditional jujutsu.</p>
            <p>This art includes sophisticated throws, joint locks and strikes, offering a rich reserve of technical knowledge.</p>
        </div>

        <div class="u-clearfix"></div>
    </div>
</section>

<section class="t-home__instructor">
    <div class="c-overlay-card">
        <img src="<?php getImgDirectory(); ?>/head-instructor-banner.jpg" class="c-overlay-card__image" alt="Photo of Hoshu Dojo head instructor Goto Sensei performing kata" />

        <div class="c-overlay-card__content c--right">
            <div class="c-sheet">
                <header class="c-sheet__header">
                    <h2>Head Instructor</h2>
                </header>

                <p>Read about Goto Sensei who spent ten years in Japan, including a year in Nagoya and Tokyo as something his Q&amp;A blog for something and all that about.</p>
            </div>
        </div>
    </div>
</section>

<section class="t-home__locations">
    <div class="c-overlay-card">
        <img src="<?php getImgDirectory(); ?>/location-banner.jpg" class="c-overlay-card__image" alt="Photo of a classroom with students throughout" />

        <div class="c-overlay-card__content c--left">
            <div class="c-sheet">
                <header class="c-sheet__header">
                    <h2>Locations</h2>
                </header>

                <p><a href="/locations#oita">Hoshu Jodokai</a> – Oita, Japan</p>
                <p><a href="/locations#okinawa">Okinawa Dojo</a> – Okinawa, Japan</p>
                <p><a href="/locations#portland">Portland Dojo</a> – Oregan, United States</p>
                <p><a href="/locations#seattle">Seattle Dojo</a> – Washington, United States</p>
                <p><a href="/locations#vancouver">Vancouver Dojo</a> – British Columbia, Canada</p>
                <p><a href="/locations#cancun">Cancun Dojo</a> – Quintana Roo, Mexico</p>

                <footer class="c-sheet__footer">
                    <a href="/locations" class="c-button">See Locations</a>
                </footer>
            </div>
        </div>
    </div>
</section>

<section class="t-home__events">
    <div class="c-sheet">
        <header class="c-sheet__header">
            <h2>Upcoming Events</h2>
        </header>

        <div class="t-home__widget-area-1">
			<?php dynamic_sidebar( 'sidebar-1' ) ?>
		</div>

        <?php
        // <div class="c-event-list">
        //     <article class="c-event-list-item">
        //         <div class="c-event-list-item__date">
        //             <a href="#" class="c-event-list-item__link" aria-hidden="true">
        //                 <abbr class="c-event-list-item__month" title="December">Dec</abbr>
        //                 31
        //             </a>
        //         </div>
        //         <div class="c-event-list-item__content">
        //             <p><a href="#">Hoshu Vancouver Dojo Monthly Seminar</a></p>
        //             <p>December 13, 2014</p>
        //             <p>7:30am – 12:00pm</p>
        //         </div>
        //     </article>
        // </div>
        ?>

        <footer class="c-sheet__footer">
            <a href="/events" class="c-button">View All Events</a>
        </footer>
    </div>
</section>

<?php /*
<section class="t-home__blog">
    <div class="c-sheet">
        <header class="c-sheet__header">
            <h2>Blog</h2>
        </header>

        <div class="c-blog-list">

            <?php
            query_posts('posts_per_page=2');

			while (have_posts()) : the_post();

				get_template_part( '_blog-list-item' );

			endwhile;
            ?>

        </div>

        <footer class="c-sheet__footer">
            <a href="#" class="c-button">View All Blog Posts</a>
        </footer>
    </div>
</section>
*/ ?>

<section class="t-home__contact">
    <div class="c-sheet">
        <h2>Ask a Question</h2>

        <div class="t-home__widget-area-2">
			<?php dynamic_sidebar( 'sidebar-2' ) ?>
		</div>
    </div>
</section>

<?php get_footer(); ?>
