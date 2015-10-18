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
            <?php component('hero-logo'); ?>

            <div class="c-sheet">
                <p class="c-h3">
                    <span class="u-weight--light">Martial Arts: Shindo Muso Ryu Jodo, and Daito Ryu Aikijujutsu</span>
                </p>
            </div>
        </div>
    </div>
</header>

<nav role="navigation">
    <h2 class="u-visually-hidden">Main Navigation</h2>
    <div class="c-nav-bar">
        <div class="c-frame">
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
</nav>

<section class="t-home__about">
    <div class="c-sheet u-text-content">
        <h2 class="u-visually-hidden">About Hoshu Dojo</h2>

        <p class="c-h2 u-weight--light">Practice Moving Zen – Experience Traditional Japanese Martial Arts</p>

        <div class="t-home__about-left">
            <h3>Shindo Muso Ryu Jodo</h3>
            <p>Shindo Muso Ryu is the art of the short staff. In this art, we use a simple short staff against a sword-armed opponent.</p>
            <p>In Jodo we rely on precision and the flexibility of the Jo to overcome the inherent advantages of a blade wielding opponent.</p>
        </div>

        <div class="t-home__about-right">
            <h3>Daito Ryu Aikijujutsu</h3>
            <p>Daito Ryu Aikijujutsu is the original “Aiki” art, an art of traditional Japanese jujutsu.</p>
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

                <p>Kei Goto Sensei, our head instructor is based in Beppu City, Japan, and holds the rank of Menkyo in Daito Ryu Aikijujutsu, and was a direct student of Takeda Tokimune Sensei, and holds a 7th dan Kyoshi in Jodo under the All Japan Kendo Federation, and was a direct student of Otofuji Ichizo sensei and Tsuneyuki Ihashi Sensei.</p>
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

                <p>Hoshu Aikijodokai, Oita, Japan</p>
                <!--p>Okinawa Dojo, Naha, Okinawa, Japan</p-->
                <p>Vancouver Dojo, Vancouver, Canada</p>
                <!--p>Seattle Dojo, Bellevue, Washington, United States</p-->
                <!--p>Tonbo Dojo, Silverdale, Washington, United States</p-->
                <p>Portland Dojo, Oregon, United States</p>
                <!--p>Los Angeles Dojo, Los Angeles, California, United States</p-->
                <p>Cancun Dojo, Quintana Roo, Mexico</p>
                <p>And more!</p>

                <footer class="c-sheet__footer">
                    <a href="/locations" class="c-button">See All Locations</a>
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
