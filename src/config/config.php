<?php
/**
 * Application Configuration
 * LBS Event Management System
 */

// Detect if we're running from command line or web
$isCLI = (php_sapi_name() === 'cli');

if (!$isCLI) {
    // Get the base URL dynamically
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    
    // Remove filename from path to get directory
    $dir = rtrim(dirname($script), '/\\');
    
    // Define base paths
    define('BASE_URL', $dir);
    define('BASE_PATH', dirname(dirname(__DIR__)));
    define('ASSETS_PATH', BASE_URL . '/assets');
    define('IMAGES_PATH', ASSETS_PATH . '/images');
    define('CSS_PATH', ASSETS_PATH . '/css');
    define('JS_PATH', ASSETS_PATH . '/js');
} else {
    // CLI mode
    define('BASE_URL', '');
    define('BASE_PATH', dirname(dirname(__DIR__)));
    define('ASSETS_PATH', '/assets');
    define('IMAGES_PATH', ASSETS_PATH . '/images');
    define('CSS_PATH', ASSETS_PATH . '/css');
    define('JS_PATH', ASSETS_PATH . '/js');
}

/**
 * Get asset URL
 */
function asset_url($path) {
    return ASSETS_PATH . '/' . ltrim($path, '/');
}

/**
 * Get image URL
 */
function image_url($path) {
    return IMAGES_PATH . '/' . ltrim($path, '/');
}

/**
 * Get CSS URL
 */
function css_url($path) {
    return CSS_PATH . '/' . ltrim($path, '/');
}

/**
 * Get JS URL
 */
function js_url($path) {
    return JS_PATH . '/' . ltrim($path, '/');
}

