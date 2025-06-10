<?php

require_once get_template_directory() . '/functions/news-settings.php';
require_once get_template_directory() . '/functions/property-settings.php';
require_once get_template_directory() . '/functions/navigation-settings.php';
require_once get_template_directory() . '/functions/social-links.php';
require_once get_template_directory() . '/functions/logo-settings.php';
require_once get_template_directory() . '/functions/swiper-settings.php';
require_once get_template_directory() . '/functions/location-settings.php';

function my_theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . "/style.css", array(), '2.1', 'all');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function enqueue_all_styles() {
    $theme_dir = get_template_directory_uri();
    $style_dir = get_template_directory() . '/assets/css/';

    // Check if directory exists
    if (is_dir($style_dir)) {
        foreach (glob($style_dir . '*.css') as $file) {
            $filename = basename($file);
            wp_enqueue_style("custom-$filename", $theme_dir . "/assets/css/$filename", array(), filemtime($file));
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_all_styles');

// Enqueue all JS files from assets/js/
function enqueue_all_scripts() {
    $theme_dir = get_template_directory_uri();
    $script_dir = get_template_directory() . '/assets/js/';

    if (is_dir($script_dir)) {
        foreach (glob($script_dir . '*.js') as $file) {
            $filename = basename($file);
            wp_enqueue_script("custom-$filename", $theme_dir . "/assets/js/$filename", array('jquery'), filemtime($file), true);
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_all_scripts');

// Enqueue TTF font file as a style
function my_theme_enqueue_fonts() {
    $font_path = get_template_directory() . '/assets/fonts/myfont.ttf';
    $font_url = get_template_directory_uri() . '/assets/fonts/myfont.ttf';

    if (file_exists($font_path)) {
        $custom_css = "
        @font-face {
            font-family: 'MyCustomFont';
            src: url('{$font_url}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        body {
            font-family: 'MyCustomFont', Arial, sans-serif;
        }";
        wp_add_inline_style('theme-style', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_fonts');

?>