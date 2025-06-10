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

// Helper function to format price as a range with peso sign, e.g., '₱2,000,000 - ₱1,800,000', or just '₱' if empty/null
function format_peso_range($price) {
    $peso_sign = '₱';
    if (empty($price)) {
        return $peso_sign;
    }
    // Check if price contains a dash (range)
    if (strpos($price, '-') !== false) {
        $parts = explode('-', $price);
        $min = trim($parts[0]);
        $max = trim($parts[1]);
        $min_clean = preg_replace('/[^0-9.]/', '', $min);
        $max_clean = preg_replace('/[^0-9.]/', '', $max);
        $min_fmt = $min_clean !== '' ? number_format((float)$min_clean) : '';
        $max_fmt = $max_clean !== '' ? number_format((float)$max_clean) : '';
        if ($min_fmt && $max_fmt) {
            return $peso_sign . $min_fmt . ' - ' . $peso_sign . $max_fmt;
        } elseif ($min_fmt) {
            return $peso_sign . $min_fmt;
        } elseif ($max_fmt) {
            return $peso_sign . $max_fmt;
        } else {
            return $peso_sign;
        }
    } else {
        // Single price
        $clean_price = preg_replace('/[^0-9.]/', '', $price);
        $formatted = $clean_price !== '' ? number_format((float)$clean_price) : '';
        return $formatted ? ($peso_sign . $formatted) : $peso_sign;
    }
}

?>