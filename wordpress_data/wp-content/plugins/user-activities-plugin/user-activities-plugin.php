<?php
/**
 * Plugin Name: User Activities
 * Description: Save and retrieve user activities
 * Version: 1.0
 * Author: L'equipe
 */

// Save user activities
add_action('wp_ajax_save_user_activities', 'save_user_activities');
function save_user_activities() {
    if (!is_user_logged_in()) {
        wp_send_json_error('You must be logged in to perform this action.');
    }

    $user_id = get_current_user_id();
    $new_activities = json_decode(stripslashes($_POST['activities']), true);

    if (!is_array($new_activities) || !isset($new_activities['requetes'])) {
        wp_send_json_error('Invalid activities format.');
    }

    $existing_activities = get_user_meta($user_id, 'user_activities', true);
    
    if (!is_array($existing_activities)) {
        $existing_activities = array('requetes' => array());
    } elseif (!isset($existing_activities['requetes'])) {
        // If 'requetes' key doesn't exist, create it and move all existing activities into it
        $temp_requetes = array();
        foreach ($existing_activities as $activity) {
            if (is_array($activity) && isset($activity['requeteCypher'])) {
                $temp_requetes[] = $activity;
            }
        }
        $existing_activities = array('requetes' => $temp_requetes);
    }

    // Merge new requetes with existing ones
    $existing_activities['requetes'] = array_merge($existing_activities['requetes'], $new_activities['requetes']);

    update_user_meta($user_id, 'user_activities', $existing_activities);

    wp_send_json_success('User activities saved successfully. From Back brooo');
}

// Retrieve user activities
add_action('wp_ajax_get_user_activities', 'get_user_activities');
function get_user_activities() {
    if (!is_user_logged_in()) {
        wp_send_json_error('You must be logged in to perform this action.');
    }

    $user_id = get_current_user_id();
    $activities = get_user_meta($user_id, 'user_activities', true);

    if (!is_array($activities)) {
        $activities = array();
    }
   
    
    wp_send_json_success($activities);
}

add_action('wp_ajax_delete_user_activity', 'delete_user_activity');
function delete_user_activity() {
    if (!is_user_logged_in()) {
        wp_send_json_error('You must be logged in to perform this action.');
    }

    $user_id = get_current_user_id();
    $index = intval($_POST['index']);

    $activities = get_user_meta($user_id, 'user_activities', true);

    if (!is_array($activities) || !isset($activities['requetes'])) {
        wp_send_json_error('No activities found.');
    }

    if ($index < 0 || $index >= count($activities['requetes'])) {
        wp_send_json_error('Invalid activity index.');
    }

    // Remove the activity at the specified index
    array_splice($activities['requetes'], $index, 1);

    update_user_meta($user_id, 'user_activities', $activities);

    wp_send_json_success('User activity deleted successfully.');
}
/*add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_scripts() {
    $upload_dir = wp_upload_dir();
    $script_url = $upload_dir['baseurl'] . '/winp-css-js/96.js';
    $ajax_url = admin_url('admin-ajax.php');
    
    // Print the script URL in the console
    echo "<script>console.log('Script URL:', '$script_url');</script>";

    wp_enqueue_script('96.js', $script_url, array('jquery'), '1.0', true);

    wp_localize_script('96.js', 'ajax_object', array('ajax_url' => $ajax_url));
}*/