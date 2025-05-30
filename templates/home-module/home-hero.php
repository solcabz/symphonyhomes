<?php
if (have_rows('hero_section')):
    while (have_rows('hero_section')) : the_row();
        $hero_video = get_sub_field('hero_video'); // Could be a URL or file object
        $video_url = is_array($hero_video) ? $hero_video['url'] : $hero_video;
        ?>
        
        <section class="hero-section" style="position: relative; overflow: hidden;">
            <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <!-- <div class="container" style="position: relative; z-index: 1;">
                <h1>hero</h1>
            </div> -->
        </section>
        <?php
    endwhile;
endif;
?>