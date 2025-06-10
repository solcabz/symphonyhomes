<?php
// 1. Register Custom Post Type
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

function flush_rewrite_rules_on_activation() {
    register_property_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_on_activation');

// 3. Add Metabox for Property Location
add_action('add_meta_boxes', 'add_property_location_metabox');
function add_property_location_metabox() {
    add_meta_box(
        'property_location_metabox',
        'Property Location',
        'render_property_location_metabox',
        'property',
        'side',
        'default'
    );
}

function render_property_location_metabox($post) {
    $selected_location = get_post_meta($post->ID, '_property_location', true);
    $locations = get_posts([
        'post_type' => 'location',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ]);

    echo '<label for="property_location_field">Select Location:</label><br />';
    echo '<select name="property_location_field" id="property_location_field" style="width:100%;">';
    echo '<option value="">— Select —</option>';
    foreach ($locations as $location) {
        $selected = ($selected_location == $location->ID) ? 'selected' : '';
        echo '<option value="' . esc_attr($location->ID) . '" ' . $selected . '>' . esc_html($location->post_title) . '</option>';
    }
    echo '</select>';
}

// 4. Save the selected location
add_action('save_post', 'save_property_location_metabox');
function save_property_location_metabox($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['property_location_field'])) {
        update_post_meta($post_id, '_property_location', sanitize_text_field($_POST['property_location_field']));
    }
}

?>