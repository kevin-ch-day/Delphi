<?php
namespace App;

class ServiceManager {
    public static function getMonitoredServices(): array {
        $config = include __DIR__ . '/../includes/config.php';
        return $config['monitored_services'] ?? [];
    }

    public static function getServiceStatus(string $serviceName): string {
        if (!in_array($serviceName, self::getMonitoredServices(), true)) {
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

    public static function getAllServiceStatus(): array {
        $result = [];
        foreach (self::getMonitoredServices() as $service) {
            $result[$service] = self::getServiceStatus($service);
        }
        return $result;
    }
}
?>
