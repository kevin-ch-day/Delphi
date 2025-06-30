<?php
$config = include __DIR__ . '/includes/config.php';
$baseUrl = rtrim($config['base_url'] ?? '', '/');
header('Location: ' . $baseUrl . '/public/');
exit;
?>
