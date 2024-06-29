<?php
/*
Plugin Name: Neo4j Query Handler
Description: Handles Neo4j queries securely via AJAX.
Version: 1.0
Author: LO Mouhamadou
*/

// Enregistrement des scripts
function enqueue_neo4j_scripts() {
    // Enregistrez votre script principal
    wp_enqueue_script('jquery');

    // Utilisez wp_localize_script pour passer des variables PHP à votre script JavaScript
    wp_localize_script('jquery', 'neo4jAjax', array(
        'ajax_url' => 'http://127.0.0.1:7474/db/neo4j/tx',
        'nonce' => wp_create_nonce('neo4j_query_nonce'),
        'username' => 'neo4j',
        'password' => 'rmc2024IAML'
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_neo4j_scripts');

// Handle Neo4j query AJAX request
function handle_neo4j_query() {
    check_ajax_referer('neo4j_query_nonce', 'nonce');

    $cypher_query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

    $neo4j_http_url = defined('NEO4J_HTTP_URL');
    $neo4j_username = defined('NEO4J_USERNAME') ;
    $neo4j_password = defined('NEO4J_PASSWORD'); 

    $payload = json_encode(array(
        'statements' => array(
            array(
                'statement' => $cypher_query,
                'resultDataContents' => array('graph', 'row')
            )
        )
    ));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $neo4j_http_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode("$neo4j_username:$neo4j_password")
    ));

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        wp_send_json_success(json_decode($response, true));
    } else {
        wp_send_json_error('Erreur de connexion à Neo4j : ' . $http_code);
    }

    wp_die();
}

// Add your existing actions for handling AJAX requests
add_action('wp_ajax_handle_neo4j_query', 'handle_neo4j_query');
add_action('wp_ajax_nopriv_handle_neo4j_query', 'handle_neo4j_query');
