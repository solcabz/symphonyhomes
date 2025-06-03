<?php
if (have_rows('hero_section')):
    while (have_rows('hero_section')) : the_row();
        $hero_video = get_sub_field('hero_video'); // Could be a URL or file object
        $video_url = is_array($hero_video) ? $hero_video['url'] : $hero_video;
        ?>
        
        <section class="hero-section" loading="lazy" style="position: relative; overflow: hidden;">

            <!-- Video Background Home -->
            <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Selection Form -->
            <div class="container-wrap-form" style="position: relative; z-index: 1;">
                <div class="custom-select-wrapper">
                    <div class="custom-select-container">
                        <select class="custom-select">
                            <option value="" disabled selected>Search Location</option>
                            <option value="option1-1">Option 1</option>
                            <option value="option1-2">Option 2</option>
                            <option value="option1-3">Option 3</option>
                            <option value="option1-4">Option 4</option>
                        </select>
                    </div>

                    <div class="custom-select-container">
                        <select class="custom-select">
                            <option value="" disabled selected>Select Type of Property</option>
                            <option value="option2-1">Option 1</option>
                            <option value="option2-2">Option 2</option>
                            <option value="option2-3">Option 3</option>
                            <option value="option2-4">Option 4</option>
                        </select>
                    </div>

                    <div class="custom-select-container">
                        <select class="custom-select">
                            <option value="" disabled selected>Select Price Range</option>
                            <option value="option3-1">Option 1</option>
                            <option value="option3-2">Option 2</option>
                            <option value="option3-3">Option 3</option>
                            <option value="option3-4">Option 4</option>
                        </select>
                    </div>
                    <button class="property-btn">Search</button>
                </div>
            </div>
        </section>
<?php
    endwhile;
endif;
?>