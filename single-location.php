<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<?php get_header(); ?>

<?php
$hero_path = get_template_directory() . '/templates/property-location-module/property-location-hero.php';
$grid_path = get_template_directory() . '/templates/property-location-module/property-location-grid.php';
$inquiry_path = get_template_directory() . '/templates/news-module/news-inquiry-form.php';

if (file_exists($hero_path)) {
    include $hero_path;
}
if (file_exists($grid_path)) {
    include $grid_path;
}
if (file_exists($inquiry_path)) {
    include $inquiry_path;
}
?>

<?php get_footer(); ?>
</body>
<?php wp_footer(); ?>
</html>