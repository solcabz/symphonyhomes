
<section class="about-section">
        <?php
        if (have_rows('about-block')) :
            while (have_rows('about-block')) : the_row();
                $about_image_background = get_sub_field('about_background');
                $about_block_title = get_sub_field('about_title');
                $about_block_paragraph = get_sub_field('about_paragraph');
        ?>
            <div class="about-image" style="background-image: url('<?php echo esc_url( $about_image_background ? $about_image_background['url'] : get_template_directory_uri() . '/assets/image/about-bg.jpg' ); ?>');">
            </div>
            <div class="about-content">
                    <?php if ($about_block_title) : ?>
                        <h1><?php echo esc_html($about_block_title); ?></h1>
                    <?php endif; ?>

                    <?php if ($about_block_paragraph) : ?>
                        <p><?php echo esc_html($about_block_paragraph); ?></p>
                    <?php endif; ?>

                    <button>READ MORE</button>
                </div>
        <?php
            endwhile;
        endif;
        ?>
</section>

