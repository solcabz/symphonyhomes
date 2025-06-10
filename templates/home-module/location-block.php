<section class="location-section">
  <div class="location-wrapper">
    <h1>Our Locations</h1>
    <p>
      Strategically situated near essential establishments, making life more convenient for residents. You’ll find schools, hospitals, government offices, grocery stores, and places of worship all within easy reach.
    </p>

    <div class="swiper location-swiper">
      <div class="swiper-wrapper">
        <?php
        $args = [
            'post_type' => 'location',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ];
        $locations = new WP_Query($args);

        if ($locations->have_posts()):
            while ($locations->have_posts()): $locations->the_post();
                $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
               <div class="swiper-slide location-item" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo esc_url($bg_image); ?>'); background-size: cover; background-position: center;">
                  <h3><?php echo str_replace(',', ',<br>', get_the_title()); ?></h3>
                  <a href="<?php the_permalink(); ?>" class="location-button">
                    Read More
                  </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else:
            echo '<p>No locations found.</p>';
        endif;
        ?>
      </div>

      <!-- Navigation buttons -->
      <div class="swiper-button-prev carousel-btn prev"></div>
      <div class="swiper-button-next carousel-btn next"></div>
    </div>
  </div>
</section>