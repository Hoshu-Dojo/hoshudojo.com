<article id="post-<?php the_ID(); ?>" class="c-blog-list-item u-text-content">

    <h3>
        <?php the_title( sprintf( '<a href="%s">', esc_url( get_permalink() ) ), '</a>' ); ?>
    </h3>

    <p>
        <small><?php the_time('F d, Y') ?></small>
    </p>

    <?php the_content('Read more'); ?>
</article>
