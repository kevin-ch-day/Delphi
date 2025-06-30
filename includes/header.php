<?php
$config = include __DIR__ . '/config.php';
$baseUrl = rtrim($config['base_url'] ?? '', '/');

// Auto-detect base path if none provided in config. This relies on the
// current request URI so links remain valid even when the dashboard is served
// from a subdirectory or when pages/api scripts are executed directly.
if ($baseUrl === '') {
    $request = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
    $requestDir = rtrim(dirname($request), '/');
    // Fallback to SCRIPT_NAME when REQUEST_URI is not available (CLI)
    if ($requestDir === '' && !empty($_SERVER['SCRIPT_NAME'])) {
        $requestDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    }
    // Strip trailing /api or /pages so asset links work from those folders
    $baseUrl = preg_replace('#/(?:api|pages)$#', '', $requestDir);
}

if (!defined('BASE_URL')) {
    define('BASE_URL', $baseUrl);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delphi LAMP Server</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/navigation.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/table.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-3gJwYpjdvP8XbKPr7IGxh9OZ0bdF+3L+Fp8k1K+UJrc=" crossorigin="anonymous"></script>
    <script>const BASE_URL = '<?php echo BASE_URL; ?>';</script>
    <script src="<?php echo BASE_URL; ?>/js/script.js" defer></script>
</head>
<body>
    <nav class="sidebar" aria-label="Main navigation">
        <h2>Delphi Server</h2>
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/index.php" class="active">Dashboard</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/system_info.php">System Info</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/services.php">Services</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/php_diagnostics.php">PHP Diagnostics</a></li>
            <li><a href="https://github.com/kevin-ch-day/Delphi" target="_blank" rel="noopener noreferrer">GitHub</a></li>
        </ul>
    </nav>

    <main class="content" role="main">
