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

<h1><?php the_title(); ?></h1>

<?php
    if (have_rows('property_hero')):
        while (have_rows('property_hero')) : the_row();
            $property_hero = get_sub_field('property_image_hero');
            
?>
<img src="<?php echo esc_url( $property_hero ? $property_hero['url'] : get_template_directory_uri() . '/assets/image/about-bg.jpg' ); ?>" alt="">
<?php
        endwhile;
    endif;
?>
    
<?php include 'footer.php';?>
</body>
<?php wp_footer(); ?>
</html>