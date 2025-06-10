<section class="feature-section">
    <div class="feature-container">
        <div class="feature-header">
            <h1>Featured Properties</h1>
            <p>We offer properties across various geographical locations, ensuring you find the ideal setting for your family. Choose from a diverse range of house and lot configurations, including townhouses and single-attached units. Each home is thoughtfully designed to cater to your family's needs, providing the security, warmth, and sense of community that you desire.</p>
        </div>

        <div class="feature-wrapper">
            <div class="RFO">
                <h4>Ready For Occcupancy</h4>
                <?php
                $args = array(
                    'post_type'      => 'property',
                    'posts_per_page' => -1,
                    'meta_key'       => '_property_featured',
                    'meta_value'     => '1'
                );
                $featured_query = new WP_Query($args);
                $rfo_count = 0;
                if ($featured_query->have_posts()) :
                    while ($featured_query->have_posts()) : $featured_query->the_post();
                        $is_rfo = get_post_meta(get_the_ID(), '_property_rfo', true);
                        if ($is_rfo !== '1') continue;
                        $background = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $title = get_the_title();
                        $selected_location_id = get_post_meta(get_the_ID(), '_property_location', true);
                        $location_title = '';
                        if ($selected_location_id) {
                            $location_post = get_post($selected_location_id);
                            if ($location_post) {
                                $location_title = $location_post->post_title;
                            }
                        }
                        ?>
                        <div class="feature-item" style="background-image: url('<?php echo esc_url($background); ?>'); background-size:cover; background-position:center; position:relative;">
                            <div class="feature-info">
                                <div class="flex-col-feat">
                                    <h1><?php echo esc_html($title); ?></h1>
                                    <div><p><?php echo esc_html($location_title ? $location_title : 'No Location'); ?></p></div>
                                    <!-- Add location and price here if needed -->
                                    <?php
                                    $price = get_post_meta(get_the_ID(), '_property_price', true);
                                    echo '<div><p>' . esc_html(format_peso_range($price)) . '</p></div>';
                                    ?>
                                </div>
                                <!-- Add more info if needed -->
                                 <div><p>ParagraphSMDC Cheerful Homes is a master-planned community with well-designed homes perfect for the modern Filipino family. With over a hectare of open space and a complete set of amenities, residents will find a lot of reasons to be cheerful for!</p></div>
                                <button>Read More</button>
                            </div>
                        </div>
                        <?php
                        $rfo_count++;
                        if ($rfo_count >= 2) break;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="pre-selling">
                <h4>Pre-Selling</h4>
                <?php
                $args = array(
                    'post_type'      => 'property',
                    'posts_per_page' => -1,
                    'meta_key'       => '_property_featured',
                    'meta_value'     => '1'
                );
                $featured_query = new WP_Query($args);
                $presell_count = 0;
                if ($featured_query->have_posts()) :
                    while ($featured_query->have_posts()) : $featured_query->the_post();
                        $is_preselling = get_post_meta(get_the_ID(), '_property_preselling', true);
                        if ($is_preselling !== '1') continue;
                        $background = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $title = get_the_title();
                        $selected_location_id = get_post_meta(get_the_ID(), '_property_location', true);
                        $location_title = '';
                        if ($selected_location_id) {
                            $location_post = get_post($selected_location_id);
                            if ($location_post) {
                                $location_title = $location_post->post_title;
                            }
                        }
                        ?>
                        <div class="feature-item" style="background-image: url('<?php echo esc_url($background); ?>'); background-size:cover; background-position:center; position:relative;">
                            <div class="feature-info">
                                <div class="flex-col-feat">
                                    <h1><?php echo esc_html($title); ?></h1>
                                    <div><p><?php echo esc_html($location_title ? $location_title : 'No Location'); ?></p></div>
                                    <!-- Add location and price here if needed -->
                                    <?php
                                    $price = get_post_meta(get_the_ID(), '_property_price', true);
                                    echo '<div><p>' . esc_html(format_peso_range($price)) . '</p></div>';
                                    ?>
                                </div>
                                <!-- Add more info if needed -->
                                 <div><p>ParagraphSMDC Cheerful Homes is a master-planned community with well-designed homes perfect for the modern Filipino family. With over a hectare of open space and a complete set of amenities, residents will find a lot of reasons to be cheerful for!</p></div>
                                <button>Read More</button>
                            </div>
                        </div>
                        <?php
                        $presell_count++;
                        if ($presell_count >= 2) break;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>