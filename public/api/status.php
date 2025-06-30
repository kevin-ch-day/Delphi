<?php
// API endpoint returning JSON status of monitored services
require_once __DIR__ . '/../../includes/lib.php';

$statuses = getAllServiceStatus();

header('Content-Type: application/json');
echo json_encode($statuses);
?>
