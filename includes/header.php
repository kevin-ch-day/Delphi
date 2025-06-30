<?php
$config = include __DIR__ . '/config.php';
$baseUrl = rtrim($config['base_url'] ?? '', '/');

// Auto-detect base path if none provided in config
// Handles cases where the web root is the repository or the public folder
if ($baseUrl === '') {
    $scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    // Remove subdirectories like /api or /pages so resources load correctly
    $baseUrl = preg_replace('#/(?:api|pages)$#', '', $scriptDir);
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
