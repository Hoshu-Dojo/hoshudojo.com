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
                    <span class="u-weight--light">神道夢想流杖道・大東流合気武道</span>
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
                    <a href="/" class="c-nav-bar__link">ホームページ</a>
                </li>
                <li class="c-nav-bar__item">
                    <a href="/locations" class="c-nav-bar__link">ロケーション</a>
                </li>
                <li class="c-nav-bar__item">
                    <a href="/events" class="c-nav-bar__link">イベント</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="t-home__about">
    <div class="c-sheet u-text-content">
        <h2 class="u-visually-hidden">About Hoshu Dojo</h2>

        <p class="c-h2 u-weight--light">一般部・少年部会員随時受付中　体験入門1ヶ月無料</p>

        <div class="t-home__about-left">
            <h3>神道夢想流杖道</h3>
            <p>神道夢想流は「杖」の使い方を教える伝統的日本武術です。刀を持つ敵に４尺２寸の杖で対応します。</p>
            <p>杖道家は杖の柔軟性と鋭く技を使う事でもともと刃物として有利である太刀を勝利する。</p>
        </div>

        <div class="t-home__about-right">
            <h3>大東流合気武道</h3>
            <p>大東流は合気を使う日本の伝統的な柔術です。技には投げ、関節技、打撃も含まれています。</p>
            <p>年齢・性別を問わず誰でもできる古武道です。</p>
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
                    <h2>指導者の紹介</h2>
                </header>

                <p>豊州合気杖道会の指導者は後藤系と言います。大分県別府市に在住しています。大東流合気武道では教授を持ち、武田時宗先生の直弟子です。神道夢想流では全日本剣道連盟に所属し、七段教師をもち、乙藤市蔵先生及び伊橋典之先生の直弟子です。</p>
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
                    <h2>ロケーション</h2>
                </header>

                <p>大分県別府市　豊州合気杖道会（本部）</p>
                <p>沖縄県那覇市　豊州合気杖道会（支部）</p>
                <p>カナダ・バンクーバー　豊州バンクーバー道場</p>
                <p>米国・べレビュー　豊州シアトル道場</p>
                <p>米国・シルバデール　蜻蛉道場</p>
                <p>米国・ポートランド市　豊州ポートランド道場（北米支部）</p>
                <p>米国・ロスアンゼルス　豊州ロスアンゼルス道場</p>
                <p>メキシコ・カンクン　ぺぺエム道場</p>

                <footer class="c-sheet__footer">
                    <a href="/locations" class="c-button">傘下道場を見る</a>
                </footer>
            </div>
        </div>
    </div>
</section>

<section class="t-home__events">
    <div class="c-sheet">
        <header class="c-sheet__header">
            <h2>カレンダー</h2>
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
            <a href="/events" class="c-button">全てを見る</a>
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
        <h2>問い合わせ</h2>

        <div class="t-home__widget-area-2">
			<?php dynamic_sidebar( 'sidebar-2' ) ?>
		</div>
    </div>
</section>

<?php get_footer(); ?>
