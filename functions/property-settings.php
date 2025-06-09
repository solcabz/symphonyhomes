<?php

function register_property_post_type() {
    $labels = array(
        'name'               => 'Properties',
        'singular_name'      => 'Property',
        'menu_name'          => 'Properties',
        'name_admin_bar'     => 'Property',
        'add_new'            => 'Add New',  
        'add_new_item'       => 'Add New Property',
        'new_item'           => 'New Property',
        'edit_item'          => 'Edit Property',
        'view_item'          => 'View Property',
        'all_items'          => 'All Properties',
        'search_items'       => 'Search Properties',
        'not_found'          => 'No properties found.',
        'not_found_in_trash' => 'No properties found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'properties'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-home',
        'supports'           => array('title', 'thumbnail', 'custom-fields'),
    );

    register_post_type('property', $args);
}
add_action('init', 'register_property_post_type'); 

// Flush permalinks when the theme is activated to apply the new rules
function flush_rewrite_rules_on_activation() {
    register_property_post_type(); // Ensure the post type is registered
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'flush_rewrite_rules_on_activation');

// Add Meta Box for Location
function add_property_location_meta_box() {
    add_meta_box(
        'property_location_box',
        'Location',
        'render_property_location_meta_box',
        'property',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_property_location_meta_box');

// Render the dropdown
function render_property_location_meta_box($post) {
    $value = get_post_meta($post->ID, '_property_location', true);
    $locations = array(
        'Mabalacat, Pampanga',
        'St. Ignacia, Tarlac',
        'Conception, Tarlac'
    );

    echo '<label for="property_location">Select Location:</label>';
    echo '<select name="property_location" id="property_location" class="widefat">';
    echo '<option value="">Select...</option>';
    foreach ($locations as $location) {
        $selected = ($value === $location) ? 'selected' : '';
        echo '<option value="' . esc_attr($location) . '" ' . $selected . '>' . esc_html($location) . '</option>';
    }
    echo '</select>';
}

// Save Meta Box Data
function save_property_location_meta_box($post_id) {
    // Skip autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check if our field is present
    if (isset($_POST['property_location'])) {
        update_post_meta($post_id, '_property_location', sanitize_text_field($_POST['property_location']));
    }
}
add_action('save_post', 'save_property_location_meta_box');
?>

?>