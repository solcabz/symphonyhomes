<?php
if (have_rows('news_carousel_header')):
    while (have_rows('news_carousel_header')) : the_row();
        $news_title = get_sub_field('title');
        $news_subtitle = get_sub_field('subtitle');
        ?>

        <section class="news-carousel-header">
            <div class="news-carousel-header-container">
                <?php if ($news_title): ?>
                    <h1 class="news-carousel-header-title"><?php echo esc_html($news_title); ?></h1>
                <?php endif; ?>

                <?php if ($news_subtitle): ?>
                    <p class="news-carousel-header-subtitle"><?php echo esc_html($news_subtitle); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php
    endwhile;
endif;
?>