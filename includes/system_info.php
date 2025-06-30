<?php
// System information utilities for Delphi LAMP Server
require_once __DIR__ . '/autoload.php';

use App\SystemInfo;

function getServerInfo(): array {
    return SystemInfo::getServerInfo();
}

function getSystemUptime(): string {
    return SystemInfo::getSystemUptime();
}

function getPrivateIP(): string {
    return SystemInfo::getPrivateIP();
}

function getCPUInfo(): string {
    return SystemInfo::getCPUInfo();
}

function getMemoryInfo(): string {
    return SystemInfo::getMemoryInfo();
}
?>
