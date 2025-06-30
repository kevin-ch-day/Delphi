<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delphi LAMP Server</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/delphi/css/style.css">
    <link rel="stylesheet" href="/delphi/css/navigation.css">
    <link rel="stylesheet" href="/delphi/css/table.css">

    <!-- jQuery (via CDN) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-3gJwYpjdvP8XbKPr7IGxh9OZ0bdF+3L+Fp8k1K+UJrc="
            crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script src="/delphi/js/script.js" defer></script>

    <!-- Optional: Favicon -->
    <!-- <link rel="icon" href="/delphi/favicon.ico" type="image/x-icon"> -->

    <!-- Open Graph Meta (for previews, optional) -->
    <!--
    <meta property="og:title" content="Delphi LAMP Server">
    <meta property="og:description" content="Secure PHP server dashboard and development portal.">
    <meta property="og:type" content="website">
    -->
</head>
<body>
    <nav class="sidebar" aria-label="Main navigation">
        <h2>Delphi Server</h2>
        <ul>
            <li><a href="/delphi/index.php" class="active">Dashboard</a></li>
            <li><a href="/delphi/pages/php_diagnostics.php">PHP Diagnostics</a></li>
            <li><a href="https://github.com/kevin-ch-day/Delphi" target="_blank" rel="noopener noreferrer">GitHub</a></li>
        </ul>
    </nav>

    <main class="content" role="main">
