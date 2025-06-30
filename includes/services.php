<?php
// Service-related utilities for Delphi LAMP Server

// Load configuration each time to avoid globals
function getMonitoredServices(): array {
    $config = include __DIR__ . '/config.php';
    return $config['monitored_services'] ?? [];
}

// Check the status of a systemd-managed service
function getServiceStatus(string $serviceName): string {
    if (!in_array($serviceName, getMonitoredServices(), true)) {
        return 'Not Allowed';
    }

    $systemctl = trim(shell_exec('command -v systemctl'));
    if (!$systemctl || !is_executable($systemctl)) {
        return 'Systemctl Unavailable';
    }

    $escaped = escapeshellarg($serviceName);
    $status = trim(shell_exec("$systemctl is-active $escaped 2>/dev/null"));

    return match ($status) {
        'active'   => 'Running',
        'inactive',
        'failed'   => 'Not Running',
        default    => 'Unavailable'
    };
}

// Get status for all monitored services
function getAllServiceStatus(): array {
    $result = [];
    foreach (getMonitoredServices() as $service) {
        $result[$service] = getServiceStatus($service);
    }
    return $result;
}
?>
