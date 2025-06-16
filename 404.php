<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header('header.php'); ?>

    <section class="container-404">
        <div id="clouds">
            <div class="cloud x1"></div>
            <div class="cloud x1_5"></div>
            <div class="cloud x2"></div>
            <div class="cloud x3"></div>
            <div class="cloud x4"></div>
            <div class="cloud x5"></div>
        </div>
        <div class="c">
            <div class="_404">404</div>
            <hr />
            <div class="_1">THE PAGE</div>
            <div class="_2">WAS NOT FOUND</div>
            <a class="btn" href="#">BACK TO MARS</a>
        </div>
    </section>
    
    <?php get_footer('footer.php'); ?>
</body>
<?php wp_footer(); ?>
</html>