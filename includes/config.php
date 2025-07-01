<?php
// includes/config.php

return [

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    | This is used to construct relative paths for assets, navigation links,
    | and AJAX requests. Leave it empty ('') to enable automatic detection.
    |
    | Examples:
    |   '/'                         => Root web directory
    |   '/delphi'                   => Application in subdirectory
    |   '/GitHub/Delphi/public'     => XAMPP-style nested path
    */
    'base_url' => '',

    /*
    |--------------------------------------------------------------------------
    | Monitored systemd Services
    |--------------------------------------------------------------------------
    | These services are checked for active/running status in the dashboard.
    | Customize based on your system configuration.
    */
    'monitored_services' => [
        'httpd',        // Apache HTTP Server
        'mariadb',      // MariaDB/MySQL
        'sshd',         // OpenSSH Daemon
        'cockpit',      // Cockpit Web UI
        'firewalld',    // Firewall Daemon
        'chronyd'       // NTP Time Sync
    ],
];
