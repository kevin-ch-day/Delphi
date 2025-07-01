<?php
// includes/header.php
// Purpose: Global HTML header template with stylesheet and responsive sidebar navigation

require_once __DIR__ . '/init.php'; // Ensure BASE_URL is set
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delphi LAMP Server</title>

    <!-- Core Styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/navigation.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/table.css">

    <!-- jQuery & Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-3gJwYpjdvP8XbKPr7IGxh9OZ0bdF+3L+Fp8k1K+UJrc="
        crossorigin="anonymous"></script>

    <script>
        const BASE_URL = '<?php echo htmlspecialchars(BASE_URL); ?>';
    </script>
    <script src="<?php echo BASE_URL; ?>/js/script.js" defer></script>
</head>

<body>
    <nav class="sidebar" aria-label="Main navigation">
        <div class="sidebar-header">
            <h1 class="sidebar-title">Delphi Server</h1>
        </div>
        <ul class="nav-links">
            <li><a href="<?php echo BASE_URL; ?>/public/pages/index.php" class="active">
                    <span class="icon">🏠</span> <span class="label">Home</span>
                </a></li>
            <li><a href="<?php echo BASE_URL; ?>/public/pages/system_info.php">
                    <span class="icon">🖥️</span> <span class="label">System Info</span>
                </a></li>
            <li><a href="<?php echo BASE_URL; ?>/public/pages/services.php">
                    <span class="icon">⚙️</span> <span class="label">Services</span>
                </a></li>
            <li><a href="<?php echo BASE_URL; ?>/public/pages/php_diagnostics.php">
                    <span class="icon">📦</span> <span class="label">PHP Diagnostics</span>
                </a></li>
            <li><a href="https://github.com/kevin-ch-day/Delphi" target="_blank" rel="noopener noreferrer">
                    <span class="icon">🌐</span> <span class="label">GitHub</span>
                </a></li>
        </ul>
    </nav>

    <main class="content" role="main">