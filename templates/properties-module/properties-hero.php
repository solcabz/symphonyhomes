<?php
if (have_rows('properties_section')):
    while (have_rows('properties_section')) : the_row();
        $properties_title = get_sub_field('properties_title');
        $properties_subtitle = get_sub_field('properties_subtitle');
        $properties_image = get_sub_field('properties_image');
        $properties_hero_image_url = is_array($properties_image) ? $properties_image['url'] : $properties_image;
        ?>


        <section class="properties-hero-section">
            <?php if ($properties_hero_image_url): ?>
                <img class="properties-hero-image" src="<?php echo esc_url($properties_hero_image_url); ?>" alt="Hero Image">
            <?php endif; ?>

            <div class="properties-container">
                <?php if ($properties_title): ?>
                    <h1 class="properties-title"><?php echo esc_html($properties_title); ?></h1>
                <?php endif; ?>

                <?php if ($properties_subtitle): ?>
                    <p class="properties-subtitle"><?php echo esc_html($properties_subtitle); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php
    endwhile;
endif;
?>