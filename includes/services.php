<?php
// Service-related utilities for Delphi LAMP Server
require_once __DIR__ . '/autoload.php';

use App\ServiceManager;

function getMonitoredServices(): array {
    return ServiceManager::getMonitoredServices();
}

function getServiceStatus(string $serviceName): string {
    return ServiceManager::getServiceStatus($serviceName);
}

function getAllServiceStatus(): array {
    return ServiceManager::getAllServiceStatus();
}
?>
