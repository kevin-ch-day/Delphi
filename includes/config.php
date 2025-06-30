<?php
// Delphi LAMP Server configuration
// Adjust monitored services for your Fedora server
return [
    // Base URL for links and assets, without trailing slash.
    // Leave empty to automatically detect the correct path
    'base_url' => '',

    'monitored_services' => [
        'httpd',
        'mariadb',
        'sshd',
        'cockpit',
        'firewalld',
        'chronyd'
    ]
];
?>
