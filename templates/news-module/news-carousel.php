<?php
// Define the query for the "good_life" post type
$args = [
    'post_type' => 'good_life', 
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
];
$good_life_query = new WP_Query($args);
?>

<section class="news-section">
  <!-- Carousel Wrapper -->
  <div class="custom-carousel">
    <div class="carousel-slides">
      <?php 
      $slide_index = 0;
      while ($good_life_query->have_posts()): $good_life_query->the_post();
          $news_group = get_field('news_hero');
          $news_image = isset($news_group['news_image']) ? $news_group['news_image'] : null;
          $news_sub_headline = isset($news_group['sub_headline']) ? $news_group['sub_headline'] : get_the_date();
          $bg_url = $news_image ? esc_url($news_image['url']) : esc_url(get_template_directory_uri() . '/assets/image/default-image.jpg');
      ?>
        <div class="carousel-slide" style="background-image: url('<?php echo $bg_url; ?>');">
          <div class="carousel-content">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html($news_sub_headline); ?></p>
            <a href="<?php the_permalink(); ?>" class="read-more">READ MORE</a>
          </div>
        </div>
      <?php $slide_index++; endwhile; wp_reset_postdata(); ?>
    </div>

    <!-- Carousel Controls -->
    <div class="carousel-controls">
      <?php for ($i = 0; $i < $slide_index; $i++): ?>
        <span class="control-dot" data-index="<?php echo $i; ?>"></span>
      <?php endfor; ?>
    </div>
  </div>
</section>
