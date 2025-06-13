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

<section>
  <!-- Carousel Wrapper -->
  <div class="custom-carousel">
    <div class="carousel-slides">
      <?php 
      $slide_index = 0;
      while ($good_life_query->have_posts()): $good_life_query->the_post();
        $article_hero = get_field('article_hero');
        $locator = isset($article_hero['article_locator']) ? $article_hero['article_locator'] : '';
        $sub_heading = isset($article_hero['article_sub_heading']) ? $article_hero['article_sub_heading'] : '';
        $hero_img = isset($article_hero['article_hero']['url']) ? $article_hero['article_hero']['url'] : get_template_directory_uri() . '/assets/image/placeholder.png';
      ?>
        <div class="carousel-slide" style="background-image: url('<?php echo esc_url($hero_img); ?>');">
          <div class="carousel-content">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html($sub_heading); ?></p>
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