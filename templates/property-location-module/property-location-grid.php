<section class="properties-grid-section">
    <div class="properties-grid-title">
        <h2>Properties in <?php echo esc_html(get_the_title()); ?></h2>
        <p>Symphony Homes Properties located in <?php echo esc_html(get_the_title()); ?></p>
    </div>
    <div class="properties-grid-container">
        <?php
        $current_location_id = get_the_ID(); // Get the current location post ID

        $args = array(
            'post_type' => 'property',
            'posts_per_page' == 3,
            'meta_query' => array(
                array(
                    'key' => '_property_location', // match the meta key used in your metabox
                    'value' => $current_location_id,
                    'compare' => '=', // match by ID
                ),
            ),
        );

        $property_query = new WP_Query($args);

        if ($property_query->have_posts()) :
            while ($property_query->have_posts()) : $property_query->the_post();
                $location_id = get_post_meta(get_the_ID(), '_property_location', true);
                $location_title = get_the_title($location_id);
                $price = get_post_meta(get_the_ID(), '_property_price', true);
                $headline = get_the_excerpt();
        ?>
                <div class="properties-grid-image-container">
                    <div class="overlay">
                        <div class="info-top">
                            <p class="title"><?php echo esc_html(get_the_title()); ?></p>
                            <p class="location"><?php echo esc_html($location_title); ?></p>
                            <p class="price"><?php echo esc_html($price); ?></p>
                        </div>
                        <div class="info-expand">
                            <p class="description"><?php echo wp_trim_words($headline, 30, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="know-more">Know More</a>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No properties found for this location: <strong>' . esc_html(get_the_title()) . '</strong></p>';
        endif;
        ?>
    </div>
</section>
