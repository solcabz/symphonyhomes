<footer>
    <div class="footer-container">
        <div class="ft-wrapper-up">
            <div class="container">
                <div class="footer-info-wrapper">
                    <div class="footer-info">
                        <div class="footer-company-info">
                            <?php 
                                // $footer_logo = get_option('wp_footer_logo'); 
                                // if ($footer_logo) {
                                //     echo '<img src="' . esc_url($footer_logo) . '" alt="Footer Logo">';
                                // }else{
                                    
                                // }
                            ?>
                            <p>
                                15th Floor, Two E-com Center,
                                Harbor Drive, Mall of Asia Complex,
                                Pasay City, 1300 Philippines
                            </p>
                            <a class="b1">Contact US</a>
                            <a class="b2">Get A Quote </a>
                        </div>
                        <div class="footer-link-wrapper">
                            <div class="form-news">
                                <div class="title-wrapper">
                                    <h2>SMDC NEWSLETTER</h2>
                                    <p>Join our newsletter mailing list to receive the latest updates and information about our promos and properties.</p>
                                </div>
                                <form action="" method="post" class="cta-news">
                                    <input type="text" placeholder="Type your email here">
                                    <button>SUBMIT</button>
                                </form>
                            </div>
                            <div class="sitemap-warpper">
                                <?php
                                    $menu = wp_nav_menu([
                                        'theme_location' => 'secondary',
                                        'container'      => false,  // Remove the <nav> container
                                        'menu_class'     => 'nav-links-footer', // Set class for <ul>
                                        'fallback_cb'    => false, // Avoids showing a default menu if none is assigned
                                        'echo'           => false  // Get the menu as a string
                                    ]);

                                    // Force class on <ul> if not applied
                                    if ($menu) {
                                        $menu = preg_replace('/<ul(.*?)>/', '<ul class="sitemap"$1>', $menu, 1);
                                    } else {
                                        $menu = '<ul class="nav-links"><li><a href="' . esc_url(home_url('/')) . '">Home</a></li></ul>'; // Added fallback menu
                                    }

                                    echo $menu;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Copyright 2025 SMDC Symphony Homes. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ft-wrapper-down">
            <div class="container">
                <div class="footer-down">
                    <?php
                        $menu = wp_nav_menu([
                            'theme_location' => 'tertiary',
                            'container'      => false,  // Remove the <nav> container
                            'menu_class'     => 'link-footer', // Set class for <ul>
                            'fallback_cb'    => false, // Avoids showing a default menu if none is assigned
                            'echo'           => false  // Get the menu as a string
                        ]);

                        // Force class on <ul> if not applied
                        if ($menu) {
                            $menu = preg_replace('/<ul(.*?)>/', '<ul class="link-footer"$1>', $menu, 1);
                        } else {
                            $menu = '<ul class="link-footer"><li><a href="' . esc_url(home_url('/')) . '">Home</a></li></ul>'; // Added fallback menu
                        }

                        echo $menu;
                    ?>
                </div>
                <div class="social-menu">
                    <ul>
                        <?php
                        global $wpdb;
                        $table_name = $wpdb->prefix . 'social_links';
                        $socials = $wpdb->get_results("SELECT * FROM $table_name");
                        if ($socials) :
                            foreach ($socials as $social) :
                                if (!empty($social->link)) :
                        ?>
                            <li>
                                <a href="<?php echo esc_url($social->link); ?>" target="_blank">
                                    <?php if (!empty($social->img)) : ?>
                                        <img src="<?php echo esc_url($social->img); ?>" alt="<?php echo esc_attr($social->name); ?> Icon" class="social-icon">
                                    <?php else : ?>
                                        <?php echo esc_html($social->name); ?>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>