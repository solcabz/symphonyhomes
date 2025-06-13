<?php
/*
     Template Name: About Us
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header('header.php');?>

    <?php include get_template_directory() . '/templates/about-module/about-hero.php'; ?>
    <?php include get_template_directory() . '/templates/news-module/news-inquiry-form.php'; ?>

    <?php get_footer('footer.php');?>
</body>
<?php wp_footer(); ?>
</html>


