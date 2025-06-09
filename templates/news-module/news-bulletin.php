<?php
if (have_rows('news_section')):
    while (have_rows('news_section')) : the_row();
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
                <div class="news-card1"> 
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/placeholder.png" alt="">
                        <div class="news-info1">
                            <div class="flex-col">
                                <h3>locator</h3>
                                <h1>title</h1>
                                <p>paragraph</p>
                            </div>
                            <div class="flex-col">
                                <p>date</p>
                                <a>Read More</a>
                            </div>
                        </div></div>
                <div class="news-card-wrapper">
                    <div class="news-card2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/image/placeholder.png" alt="">
                        <div class="news-info2">
                            <div class="flex-col">
                                <h3>locator</h3>
                                <h1>title</h1>
                                <p>paragraph</p>
                            </div>
                            <div class="flex-col">
                                <p>date</p>
                                <a>Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="news-card2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/image/placeholder.png" alt="">
                        <div class="news-info2">
                            <div class="flex-col">
                                <h3>locator</h3>
                                <h1>title</h1>
                                <p>paragraph</p>
                            </div>
                            <div class="flex-col">
                                <p>date</p>
                                <a>Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="news-card2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/image/placeholder.png" alt="">
                        <div class="news-info2">
                            <div class="flex-col">
                                <h3>locator</h3>
                                <h1>title</h1>
                                <p>paragraph</p>
                            </div>
                            <div class="flex-col">
                                <p>date</p>
                                <a>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    endwhile;
endif;
?>

