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

<section>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1 style="text-align:center; margin: 60px 0 40px 0; font-size:2.5rem; font-weight:700; letter-spacing:1px;">
        <?php the_title(); ?>
    </h1>
<?php endwhile; endif; ?>
</section>

<?php include 'footer.php';?>
</body>
<?php wp_footer(); ?>
</html>