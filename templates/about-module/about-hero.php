<?php if (have_rows('hero_section')):
        while (have_rows('hero_section')) : the_row();
            $hero_background = get_sub_field('hero_background');
            $about_title = get_sub_field('about_title');
            $about_description = get_sub_field('hero_description');
            ?>
    <section class="about-hero-background" style="background-image: url('<?php echo esc_url($hero_background['url']); ?>');">
        <?php if (function_exists('custom_breadcrumbs_with_svg')) custom_breadcrumbs_with_svg(); ?>
        <div class="about-hero-wrapper"> 
            <h1><?php echo esc_html($about_title); ?></h1>
            <?php if (!empty($about_description)): ?>
                <?php
                // Convert newlines to <br> for textarea content
                $formatted_description = nl2br(esc_html($about_description));
                ?>
                <p><?php echo $formatted_description; ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php
    endwhile;
endif;
?>
