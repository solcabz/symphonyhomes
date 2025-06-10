<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<?php include 'header.php';?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="location-hero" style="background: #f7f7f7; padding: 0;">
        <?php if (has_post_thumbnail()): ?>
            <div class="location-hero-img" style="width:100%; max-height:400px; overflow:hidden;">
                <?php the_post_thumbnail('large', ['style' => 'width:100%; object-fit:cover; max-height:400px;']); ?>
            </div>
        <?php endif; ?>
        <div class="location-hero-title" style="text-align:center; margin: 30px 0 10px 0; font-size:2.5rem; font-weight:700; letter-spacing:1px;">
            <?php the_title(); ?>
        </div>
        <?php
        $terms = get_the_terms(get_the_ID(), 'location_category');
        if ($terms && !is_wp_error($terms)) {
            echo '<div class="location-taxonomies" style="text-align:center; margin-bottom:20px;">';
            foreach ($terms as $term) {
                echo '<span class="location-taxonomy" style="display:inline-block; background:#e1e1e1; border-radius:4px; padding:4px 12px; margin:0 6px; font-size:1rem;">' . esc_html($term->name) . '</span>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <div class="location-content" style="max-width:800px; margin:40px auto; padding:0 20px; font-size:1.1rem; line-height:1.7; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>

<?php include 'footer.php';?>
</body>
<?php wp_footer(); ?>
</html>