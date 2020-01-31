<?php get_header(); ?>

<script>
    function setCookie(name,value,days) {
        var expires = "";

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }

        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        document.cookie = name+'=; Max-Age=-99999999;';
    }
</script>

<!-- Begin MailChimp Signup Form -->
<!--link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css"-->
<div id="mc_embed_signup" class="t-home__visor">
    <form action="//hoshudojo.us9.list-manage.com/subscribe/post?u=932de532d91ec18ef1f144adf&amp;id=f13bddc5a9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <h2 class="c-h3">Find out about Hoshu Dojo Events in your area:</h2>

        <div class="c-field-row">
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_932de532d91ec18ef1f144adf_f13bddc5a9" tabindex="-1" value=""></div>

            <div class="c-field mc-field-group">
                <label style="position: absolute; left: -5000px;" for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
            </div>

            <div class="c-field mc-field-group x-first-name">
                <label style="position: absolute; left: -5000px;" for="mce-FNAME">First Name </label>
                <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
            </div>

            <div class="c-field mc-field-group x-last-name">
                <label style="position: absolute; left: -5000px;" for="mce-LNAME">Last Name </label>
                <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name">
            </div>

            <div class="c-field c--shrink clear">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button c-button">
                <div><!-- this is hidden on purpose, so submit doesn't have top margin --></div>
            </div>

            <div class="c-field c--shrink clear">
                <button type="button" value="remove" class="button c-button t-home__no-thanks">
                    No thanks
                </button>
            </div>
        </div>

        <div class="c-field-row">
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>
        </div>
    </form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

<div class="js-visor-trigger"></div>

<script>
    // Visor Visibility
    // ===
    var visor = document.querySelector('.t-home__visor')
    var HIDE_FORM = 'hoshu-dojo-hide-form'
    var VISIBLE = 't--visible'
    var isVisorHidden = getCookie(HIDE_FORM)

    var hideVisor = function() { visor.classList.remove(VISIBLE) }
    var showVisor = function() {
        if (isVisorHidden && isVisorHidden.length) {
            return
        }

        visor.classList.add(VISIBLE)
    }
    showVisor()


    // No Thanks Button
    // ===
    var button = document.querySelector('.t-home__no-thanks')
    var noThanks = function() {
        setCookie(HIDE_FORM, 'true', 30)
        hideVisor()
        isVisorHidden = getCookie(HIDE_FORM)
    }
    button.addEventListener('click', noThanks)
</script>

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

        <div class="c-overlay-card__content">
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

        <div class="c-overlay-card__content">
            <div class="c-sheet">
                <header class="c-sheet__header">
                    <h2>Locations</h2>
                </header>

                <div class="t-home__locations-columns">
                    <p>Hoshu Aikijodokai, Oita, Japan</p>
                    <p>Okinawa Dojo, Naha, Okinawa, Japan</p>
                    <p>Portland Dojo, Oregon, United States</p>
                    <p>Vancouver Dojo, Vancouver, Canada</p>
                    <p>Seattle Dojo, Bellevue, Washington, United States</p>
                    <p>Tonbo Dojo, Silverdale, Washington, United States</p>
                    <p>Pasadena Dojo, Los Angeles, California, United States</p>
                    <p>Cancun Dojo, Quintana Roo, Mexico</p>
                </div>

                <footer class="c-sheet__footer">
                    <a href="/locations" class="c-button">See More Details</a>
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
