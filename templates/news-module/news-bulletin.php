    <?php echo '<!-- news-bulletin loaded -->'; ?>
    <?php
    if (have_rows('news_bulletin')):
        while (have_rows('news_bulletin')) : the_row();
            $news_background = get_sub_field('news_background');
            $news_title = get_sub_field('news_title');
            ?>
    <section class="news-section" loading="lazy" style="background-image: url('<?php echo esc_url( $news_background ? $news_background['url'] : get_template_directory_uri() . '/assets/image/placeholder.png' ); ?>');">
        <div class="news-container">
            <div class="news-header">
                <h1><?php echo esc_html($news_title); ?></h1>
                <a href="">View All</a>
            </div>
            <div class="news-wrapper">
                <?php
                // Example WP_Query for latest news articles
                $news_query = new WP_Query([
                    'post_type' => 'good_life', // or your custom post type
                    'posts_per_page' => 4,
                    'post_status' => 'publish'
                ]);
                if ($news_query->have_posts()) :
                    $i = 0;
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $article_hero = get_field('article_hero');
                        $locator = isset($article_hero['article_locator']) ? $article_hero['article_locator'] : '';
                        $sub_heading = isset($article_hero['article_sub_heading']) ? $article_hero['article_sub_heading'] : '';
                        $hero_img = isset($article_hero['article_hero']['url']) ? $article_hero['article_hero']['url'] : get_template_directory_uri() . '/assets/image/placeholder.png';

                        if ($i === 0) :
                            // Latest news in news-card1
                ?>
                    <div class="news-card1"> 
                        <img src="<?php echo esc_url($hero_img); ?>" alt="">
                        <div class="news-info1">
                            <div class="flex-col">
                                <h3>
                                    <?php 
                                    // If locator is a post ID, get its title
                                    echo $locator ? esc_html(get_the_title($locator)) : '';
                                    ?>
                                </h3>
                                <h1><?php the_title(); ?></h1>
                                <p><?php echo esc_html($sub_heading); ?></p>
                            </div>
                            <div class="flex-col">
                                <p><?php echo get_the_date(); ?></p>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="news-card-wrapper">
                <?php
                        else :
                            // Previous news in news-card2
                ?>
                            <div class="news-card2">
                                <img src="<?php echo esc_url($hero_img); ?>" alt="">
                                <div class="news-info2">
                                    <div class="flex-col">
                                        <h3>
                                            <?php 
                                            // If locator is a post ID, get its title
                                            echo $locator ? esc_html(get_the_title($locator)) : '';
                                            ?>
                                        </h3>
                                        <h1><?php the_title(); ?></h1>
                                        <p><?php echo esc_html($sub_heading); ?></p>
                                    </div>
                                    <div class="flex-col">
                                        <p><?php echo get_the_date(); ?></p>
                                        <a href="<?php the_permalink(); ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                <?php
                        endif;
                        $i++;
                    endwhile;
                    echo '</div>'; // Close .news-card-wrapper
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
<?php
    endwhile;
endif;
?>

