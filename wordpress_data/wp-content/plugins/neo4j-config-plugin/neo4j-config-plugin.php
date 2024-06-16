<?php
/*
Plugin Name: Neo4j Config Plugin
Description: A plugin to securely handle Neo4j configuration.
Version: 1.0
Author: lequipe
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define Neo4j Config Constants (use environment variables or secure storage)
define('NEO4J_HTTP_URL', 'http://127.0.0.1:7474/db/neo4j/tx');
define('NEO4J_USERNAME', 'neo4j');
define('NEO4J_PASSWORD', 'rmc2024IAML');

// Register REST API endpoint to expose Neo4j config
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/neo4j-config', array(
        'methods' => 'GET',
        'callback' => 'get_neo4j_config',
        'permission_callback' => '__return_true', // Consider adding proper permissions
    ));
});

function get_neo4j_config() {
    error_log('Neo4j config endpoint called');
    return [
        'url' => NEO4J_HTTP_URL,
        'username' => NEO4J_USERNAME,
        'password' => NEO4J_PASSWORD,
    ];
}