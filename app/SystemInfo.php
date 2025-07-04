<?php
namespace App;

class SystemInfo {
    public static function getServerInfo(): array {
        return [
            'hostname'     => gethostname() ?: 'Unknown',
            'server_ip'    => self::getPrivateIP(),
            'user'         => get_current_user(),
            'php_version'  => phpversion(),
            'os'           => php_uname(),
            'uptime'       => self::getSystemUptime(),
            'cpu'          => self::getCPUInfo(),
            'memory'       => self::getMemoryInfo(),
        ];
    }

    public static function getSystemUptime(): string {
        if (is_readable('/proc/uptime')) {
            [$uptime] = explode(' ', file_get_contents('/proc/uptime'));
            $seconds = (int)$uptime;
            $days = floor($seconds / 86400);
            $hours = floor(($seconds % 86400) / 3600);
            $minutes = floor(($seconds % 3600) / 60);
            return "{$days}d {$hours}h {$minutes}m";
        }
        $output = shell_exec('uptime -p 2>/dev/null');
        return trim($output) ?: 'Unavailable';
    }

    public static function getPrivateIP(): string {
        $cmd = "ip route get 1.1.1.1 2>/dev/null | awk '{print \$7}'";
        $ip = trim(shell_exec($cmd));
        if (filter_var($ip, FILTER_VALIDATE_IP) &&
            preg_match('/^(10\.|192\.168\.|172\.(1[6-9]|2[0-9]|3[0-1]))/', $ip)) {
            return $ip;
        }
        $fallback = gethostbyname(gethostname());
        return ($fallback && $fallback !== gethostname()) ? $fallback : 'Unavailable';
    }

    public static function getCPUInfo(): string {
        if (is_readable('/proc/cpuinfo')) {
            $cpuinfo = file_get_contents('/proc/cpuinfo');
            if (preg_match('/model name\s+:\s+(.+)/', $cpuinfo, $matches)) {
                return trim($matches[1]);
            }
        }
        return php_uname('m') ?: 'Unknown';
    }

    public static function getMemoryInfo(): string {
        if (is_readable('/proc/meminfo')) {
            $meminfo = file_get_contents('/proc/meminfo');
            if (preg_match('/MemTotal:\s+(\d+)\skB/', $meminfo, $matches)) {
                return round($matches[1] / 1024) . ' MB';
            }
        }
        return 'Unavailable';
    }
}
?>
