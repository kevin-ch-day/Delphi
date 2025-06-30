<?php
// Delphi LAMP Server configuration
// Adjust monitored services for your Fedora server
return [
    // Base URL for links and assets, without trailing slash
    'base_url' => '/delphi',

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
