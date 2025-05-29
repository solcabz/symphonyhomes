<header>
    <div class="container header-wrapper">
        <div class="image-logo">
            <?php
            $header_img = get_theme_mod('header_image');
            if ($header_img) : ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url($header_img); ?>" alt="Header Image">
                </a>
            <?php endif; ?>
        </div>
        <div class="menu-wrapper">
            <div class="list-menu">
            <?php
                $menu = wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,  // Remove the <nav> container
                    'menu_class'     => 'nav-links', // Set class for <ul>
                    'fallback_cb'    => false, // Avoids showing a default menu if none is assigned
                    'echo'           => false  // Get the menu as a string
                ]);

                // Force class on <ul> if not applied
                if ($menu) {
                    $menu = preg_replace('/<ul(.*?)>/', '<ul class="nav-links"$1>', $menu, 1);
                } else {
                    $menu = '<ul class="nav-links"><li><a href="' . esc_url(home_url('/')) . '">Home</a></li></ul>'; // Added fallback menu
                }

                echo $menu;
            ?>
            </div>
            <div class="cta-wrapper">
                <div class="search-container">
                    <input type="search" class="search-input" placeholder="Search..." style="display:none;">
                    <img class="search-toggle"  src="<?php echo get_template_directory_uri(); ?>/assets/image/search-icon.png" alt="Search">
                </div>
                <button>Get a Quote</button>
            </div>
        </div>
        <div class="hamburger" id="navbar-hamburger" aria-label="Open menu" tabindex="0">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>