<?php
/*
     Template Name: Properties Page
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<?php get_header('header.php');?>

<?php include get_template_directory() . '/templates/properties-module/properties-hero.php'; ?>

<?php get_footer('footer.php');?>
</body>
<?php wp_footer(); ?>
</html>