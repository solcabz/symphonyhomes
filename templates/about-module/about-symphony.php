<?php if (have_rows('about_section')) :
        while (have_rows('about_section')) : the_row();
            $content_title = get_sub_field('content_title');
            $sub_content = get_sub_field('sub_content');
            $content_description = get_sub_field('content_description');
            ?>
    <section>
        <div class="about-container">
            <div class="about-image-wrapper">
                <div class="about-row-image">
                    <?php
                    // Fetch the repeater field 'about_images'
                    if (have_rows('image_group')) {
                        $image_count = 0;
                        $outside_image = null;
                        while (have_rows('image_group') && $image_count < 3) {
                            the_row();
                            $image = get_sub_field('about_image');
                            if ($image) {
                                $img_url = is_array($image) ? $image['url'] : $image;
                                $img_alt = is_array($image) ? $image['alt'] : '';
                                if ($image_count < 2) {
                                    // First two images inside the div
                                    echo '<img src="' . esc_url($img_url) . '" alt="' . esc_attr($img_alt) . '">';
                                } else {
                                    // Third image saved for outside the div
                                    $outside_image = '<img src="' . esc_url($img_url) . '" alt="' . esc_attr($img_alt) . '">';
                                }
                            }
                            $image_count++;
                        }
                        // Output the third image outside the div if it exists
                        if ($outside_image) {
                            echo '</div>' . $outside_image . '<div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="about-wrapper-left">
                <h1><?php echo esc_html($content_title); ?></h1>
                <strong><?php echo esc_html($sub_content); ?></strong>
                <p><?php echo esc_html($content_description); ?></p>
    </section>
<?php
    endwhile;
endif;
?>