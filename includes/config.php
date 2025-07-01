<?php
// Delphi LAMP Server Configuration File

return [

    /*
     |--------------------------------------------------------------------------
     | Base URL
     |--------------------------------------------------------------------------
     | This is used to construct relative paths to assets, pages, and API routes.
     | Leave this empty ('') to enable automatic base path detection at runtime.
     | Examples:
     |   '/'                         => Root directory
     |   '/delphi'                   => Subdirectory
     |   '/GitHub/Delphi/public'     => Nested path (for XAMPP, Codex, etc.)
     */
    'base_url' => '',


    /*
     |--------------------------------------------------------------------------
     | Monitored systemd services
     |--------------------------------------------------------------------------
     | These services are checked for status (Running / Not Running).
     | Modify this list based on what’s active on your Fedora or Ubuntu system.
     */
    'monitored_services' => [
        'httpd',        // Apache HTTP server
        'mariadb',      // MySQL/MariaDB
        'sshd',         // OpenSSH daemon
        'cockpit',      // Cockpit web UI
        'firewalld',    // Firewall service
        'chronyd'       // NTP time sync daemon
    ],


    /*
     |--------------------------------------------------------------------------
     | Future Configurable Options
     |--------------------------------------------------------------------------
     | These placeholders make it easy to expand configuration later.
     */
    // 'timezone' => 'UTC',
    // 'theme'    => 'dark',
    // 'debug'    => false,

];
