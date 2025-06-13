<?php
if (have_rows('news_hero_section')):
    while (have_rows('news_hero_section')) : the_row();
        $news_title = get_sub_field('news_title');
        $news_subtitle = get_sub_field('news_subtitle');
        $news_hero_image = get_sub_field('news_hero_image');
        $hero_image_url = is_array($news_hero_image) ? $news_hero_image['url'] : $news_hero_image;
        ?>
        
        <section class="news-hero-section">
            <?php if (function_exists('custom_breadcrumbs_with_svg')) custom_breadcrumbs_with_svg(); ?>
            <?php if ($hero_image_url): ?>
                <img class="news-hero-image" src="<?php echo esc_url($hero_image_url); ?>" alt="Hero Image">
            <?php endif; ?>

            <div class="news-hero-container">
                <?php if ($news_title): ?>
                    <h1 class="news-title"><?php echo esc_html($news_title); ?></h1>
                <?php endif; ?>

                <?php if ($news_subtitle): ?>
                    <p class="news-subtitle"><?php echo esc_html($news_subtitle); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php
    endwhile;
endif;
?>