<?php get_header(); ?>

<header class="t-home__hero">
    <div class="c-splash-card">
        <div class="c-splash-card__banner">
            <img src="<?php getImgDirectory(); ?>/home-banner-mobile.jpg" alt="Photograph of Thomas Groendal and Ben Lew facing off in a Jodo kata" width="320" />
        </div>

        <div class="c-splash-card__overlay">
            <h1>
                <span>Hoshu Dojo</span>
                <span class="u-visually-hidden">|</span>
                <span class="l-japanese u-white">豊州道場</span>
            </h1>

            <img src="<?php getImgDirectory(); ?>/logo-mobile.png" alt="Hoshu Dojo Logo" width="78" />
        </div>

        <div class="c-splash-card__content">
            <p class="c-h3 u-weight--light">Martial Arts, Shindo Muso Ryu Jodo, and Daito Ryu Aikijujutsu</p>
        </div>
    </div>
</header>

<nav>
    <ul class="c-nav-bar">
        <li class="c-nav-bar__item">
            <a href="#" class="c-nav-bar__link">Menu</a>
        </li>
        <li class="c-nav-bar__item">
            <a href="#" class="c-nav-bar__link">About</a>
        </li>
        <li class="c-nav-bar__item">
            <a href="#" class="c-nav-bar__link">Location</a>
        </li>
        <li class="c-nav-bar__item">
            <a href="#" class="c-nav-bar__link">Events</a>
        </li>
    </ul>
</nav>

<section class="t-home__about">
    <div class="c-text-content c-sheet">
        <h2 class="u-visually-hidden">About Hoshu Dojo</h2>
        <p class="c-h2 u-weight--light">Practice Moving Zen – Experience Traditional Japanese Martial Arts</p>

        <h3>Shindo Muso Ryu Jodo</h3>
        <p>Feel like a bad ass while weilding a stick. Crush your opponents and build your confidence, all at once!</p>

        <h3>Daito Ryu Aikijujutsu</h3>
        <p>Not unlike Jiu Jitsu, learn to tear enemies in half with your bare hands – old school style!</p>
    </div>
</section>

<section class="t-home__instructor">
    <img src="<?php getImgDirectory(); ?>/head-instructor-banner.jpg" alt="Photo of Hoshu Dojo head instructor Goto Sensei performing kata" />
    <div class="c-sheet">
        <h2>Head Instructor</h2>
        <p>Read <a href="#">about Goto Sensei</a> who spent ten years in Japan, including a year in Nagoya and Tokyo as something <a href="#">his Q&amp;A blog</a> for something and all that about.</p>
        <p><a href="#">View all instructors</a></p>
        <a href="#" class="c-button">Contact Instructor</a>
    </div>
</section>

<section class="t-home__locations">
    <img src="<?php getImgDirectory(); ?>/location-banner.jpg" alt="Photo of a classroom with students throughout" />
    <div class="c-sheet">
        <h2>Locations</h2>
        <ul>
            <li>Hoshu Jodokai – Oita, Japan</li>
            <li>Portland Dojo – Oregan, United States</li>
            <li>Vancouver Dojo – British Columbia, Canada</li>
            <li>Cancun Dojo – Quintana Roo, Mexico</li>
            <li>Long Distance Learning – North America</li>
        </ul>
        <a href="#" class="c-button">Find Location Near You</a>
    </div>
</section>

<section class="t-home__events">
    <div class="c-sheet">
        <h2>Upcoming Events</h2>

        <article>
            <div class="">
                <h3>Hoshu Vancouver Dojo Monthly Seminar</h3>
                <p>7:30am – 12:00pm</p>
            </div>
            <div class="">
                <a href="#">Dec 31</a>
            </div>
        </article>

        <article>
            <div class="">
                <h3>Hoshu Vancouver Dojo Monthly Seminar</h3>
                <p>7:30am – 12:00pm</p>
            </div>
            <div class="">
                <a href="#">Dec 31</a>
            </div>
        </article>

        <article>
            <div class="">
                <h3>Hoshu Vancouver Dojo Monthly Seminar</h3>
                <p>7:30am – 12:00pm</p>
            </div>
            <div class="">
                <a href="#">Dec 31</a>
            </div>
        </article>

        <a href="#" class="c-button">View All Events</a>
    </div>
</section>

<section class="t-home__blog">
    <div class="c-sheet">
        <h2>Blog</h2>

        <article class="">
            <h3>Hoshu Dojo Summer Camp...</h3>
            <p>February 4, 2014</p>
            <p>Three angles of Tom and Ed performing Monomi, the sixth kata from the Seitei Jodo curriculum of the ZNKR. Full list of ZNKR Seitei Jodo Kata with different angles... <a href="#">Read more</a></p>
        </article>

        <article class="">
            <h3>Hoshu Dojo Summer Camp...</h3>
            <p>February 4, 2014</p>
            <p>Three angles of Tom and Ed performing Monomi, the sixth kata from the Seitei Jodo curriculum of the ZNKR. Full list of ZNKR Seitei Jodo Kata with different angles... <a href="#">Read more</a></p>
        </article>

        <a href="#" class="c-button">View All Blog Posts</a>
    </div>
</section>

<section class="t-home__contact">
    <div class="c-sheet">
        <h2>Ask a Question</h2>

        <form class="" action="index.html" method="post">
            <div class="c-field-row">
                <div class="c-field"><input type="text"></div>
            </div>
            <div class="c-field-row">
                <div class="c-field"><input type="text"></div>
            </div>
            <div class="c-field-row">
                <div class="c-field">
                    <select type="text">
                        <option value="1">Jodo</option>
                        <option value="1">Daito Ryu</option>
                        <option value="1">Other</option>
                    </select>
                </div>
            </div>
            <div class="c-field-row">
                <div class="c-field">
                    <textarea name="name" rows="8"></textarea>
                </div>
            </div>

            <input type="submit" class="c-button"></a>
        </form>
    </div>
</section>

<?php get_footer(); ?>
