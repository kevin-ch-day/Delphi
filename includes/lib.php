<?php
// includes/lib.php - Delphi LAMP utility library

/**
 * List of monitored systemd services.
 *
 * @return array
 */
function getMonitoredServices(): array {
    return [
        'httpd',
        'mariadb',
        'sshd',
        'cockpit',
        'firewalld',
        'chronyd'
    ];
}

/**
 * Check the status of a systemd-managed service.
 *
 * @param string $serviceName
 * @return string
 */
function getServiceStatus(string $serviceName): string {
    if (!in_array($serviceName, getMonitoredServices(), true)) {
        return "Not Allowed";
    }

    $systemctl = trim(shell_exec('command -v systemctl'));
    if (!$systemctl || !is_executable($systemctl)) {
        return "Systemctl Unavailable";
    }

    $escapedService = escapeshellarg($serviceName);
    $status = trim(shell_exec("$systemctl is-active $escapedService 2>/dev/null"));

    return match ($status) {
        'active'   => "Running",
        'inactive',
        'failed'   => "Not Running",
        default    => "Unavailable"
    };
}

/**
 * Get comprehensive server diagnostics and identity.
 *
 * @return array
 */
function getServerInfo(): array {
    return [
        'hostname'     => gethostname() ?: 'Unknown',
        'server_ip'    => getPrivateIP(),
        'user'         => get_current_user(),
        'php_version'  => phpversion(),
        'os'           => php_uname(),
        'uptime'       => getSystemUptime(),
        'cpu'          => getCPUInfo(),
        'memory'       => getMemoryInfo()
    ];
}

/**
 * Get human-readable system uptime.
 *
 * @return string
 */
function getSystemUptime(): string {
    if (is_readable('/proc/uptime')) {
        [$uptime] = explode(' ', file_get_contents('/proc/uptime'));
        $seconds = (int)$uptime;
        $days = floor($seconds / 86400);
        $hours = floor(($seconds % 86400) / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        return "{$days}d {$hours}h {$minutes}m";
    }

    return trim(shell_exec('uptime -p 2>/dev/null')) ?: 'Unavailable';
}

/**
 * Attempt to detect the server's private network IP.
 *
 * @return string
 */
function getPrivateIP(): string {
    $cmd = "ip route get 1.1.1.1 2>/dev/null | awk '{print \$7}'";
    $ip = trim(shell_exec($cmd));

    if (filter_var($ip, FILTER_VALIDATE_IP) &&
        preg_match('/^(10\.|192\.168\.|172\.(1[6-9]|2[0-9]|3[0-1]))/', $ip)) {
        return $ip;
    }

    // Fallback: hostname lookup
    $fallback = gethostbyname(gethostname());
    return ($fallback && $fallback !== gethostname()) ? $fallback : "Unavailable";
}

/**
 * Return CPU model string (first CPU entry).
 *
 * @return string
 */
function getCPUInfo(): string {
    if (is_readable('/proc/cpuinfo')) {
        $cpuinfo = file_get_contents('/proc/cpuinfo');
        if (preg_match('/model name\s+:\s+(.+)/', $cpuinfo, $matches)) {
            return trim($matches[1]);
        }
    }
    return php_uname('m') ?: 'Unknown';
}

/**
 * Return total system memory in MB.
 *
 * @return string
 */
function getMemoryInfo(): string {
    if (is_readable('/proc/meminfo')) {
        $meminfo = file_get_contents('/proc/meminfo');
        if (preg_match('/MemTotal:\s+(\d+)\skB/', $meminfo, $matches)) {
            return round($matches[1] / 1024) . " MB";
        }
    }
    return "Unavailable";
}
