<?php
// includes/init.php
// Purpose: Bootstrap configuration and define BASE_URL for consistent asset resolution

// Load configuration
$config = include __DIR__ . '/config.php';

// Initialize from config or auto-detect
$baseUrl = rtrim($config['base_url'] ?? '', '/');

// Auto-detect base path if not explicitly defined
if ($baseUrl === '') {
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $basePath = str_replace('\\', '/', dirname($scriptName)); // Normalize slashes

    // Remove common routing folders like /pages or /api
    $basePath = preg_replace('#/(pages|api)(/.*)?$#', '', $basePath);

    // If /public is part of path (common in XAMPP), strip it
    if (substr($basePath, -7) === '/public') {
        $basePath = substr($basePath, 0, -7);
    }

    // Final fallback to root if path becomes '/' or empty
    $baseUrl = ($basePath === '/' || $basePath === '\\') ? '' : $basePath;
}

// Define globally once
if (!defined('BASE_URL')) {
    define('BASE_URL', $baseUrl);
}
