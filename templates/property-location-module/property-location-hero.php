<?php
if (have_rows('location_hero_section')):
    while (have_rows('location_hero_section')) : the_row();
        $location_hero_title = get_sub_field('location_hero_title');
        $location_hero_subtitle = get_sub_field('location_hero_subtitle');
        $location_hero_image = get_sub_field('location_hero_image');
        $location_image_url = is_array($location_hero_image) ? $location_hero_image['url'] : $location_hero_image;
        ?>

        <section class="location-hero-section">
            <?php if (function_exists('custom_breadcrumbs_with_svg')) custom_breadcrumbs_with_svg(); ?>
            <?php if ($location_image_url): ?>
                <img class="location-hero-image" src="<?php echo esc_url($location_image_url); ?>" alt="Hero Image">
            <?php endif; ?>

            <div class="location-container">
                <?php if ($location_hero_title): ?>
                    <h1 class="location-title"><?php echo esc_html($location_hero_title); ?></h1>
                <?php endif; ?>

                <?php if ($location_hero_subtitle): ?>
                    <p class="location-subtitle"><?php echo esc_html($location_hero_subtitle); ?></p>
                <?php endif; ?>
            </div>
            <hr class="line-seperator">
        </section>

        <?php
    endwhile;
endif;
?>