# Delphi Server Dashboard

This project provides a lightweight dashboard for monitoring a Fedora based LAMP
server. It uses PHP and jQuery to display system information and the status of
common services.

## Features

 - Modular PHP utilities organized into classes under `app/`
 - Backward-compatible wrappers remain in `includes/`
- Configuration file `includes/config.php` defines services to monitor and can override the base URL if needed
- AJAX endpoint `api/status.php` returns live service status
- jQuery driven interface with periodic refresh of service status
- Basic pages for diagnostics and server information

To run locally place the repository inside your web root (e.g. `/var/www/html/delphi`) and ensure the web server has permission to execute `systemctl` for service checks. The dashboard will automatically determine the correct base path; only set `base_url` in `includes/config.php` if you need to override this detection. The auto-detection now uses the request URI so it works whether your document root is the repository itself or the `public/` subfolder and properly resolves links when serving pages from the `pages/` or `api/` directories or when running under a subdirectory.

For improved security set your web server's document root to the `public/`
directory so that PHP source files in `includes/` remain inaccessible from the
web. The new structure looks like:

```
public/
    index.php
    css/
    js/
    api/
    pages/
includes/
    *.php
app/
    SystemInfo.php
    ServiceManager.php
```

### Available Pages

After setting the document root to `public/`, the application is accessible at
the detected base path (or the value you specify in `base_url`). The following
pages are available:

- `/index.php` – Main dashboard with system overview and service status
- `/pages/system_info.php` – Detailed system information
- `/pages/services.php` – Live status of configured services
- `/pages/php_diagnostics.php` – PHP configuration and extensions
