<?php
// filename: /index.php
require_once "includes/lib.php";
include_once "includes/header.php";

$info = getServerInfo();
$timestamp = date("Y-m-d H:i:s");
$services = getMonitoredServices();
?>

<div class="container" role="main">

    <!-- Welcome Section -->
    <section class="intro" aria-labelledby="intro-title">
        <h1 id="intro-title">Welcome to the Delphi LAMP Server</h1>
        <p>This dashboard helps monitor and manage your secure PHP-based server environment.</p>
        <p><strong>Server Time:</strong>
            <time datetime="<?php echo htmlspecialchars($timestamp); ?>">
                <?php echo htmlspecialchars($timestamp); ?>
            </time>
        </p>
    </section>

    <!-- System Info -->
    <section class="server-info" aria-labelledby="env-info-title">
        <h2 id="env-info-title">Environment Information</h2>
        <table class="info-table" aria-describedby="env-info-title">
            <tbody>
                <tr><th scope="row">PHP Version</th><td><?php echo htmlspecialchars($info['php_version']); ?></td></tr>
                <tr><th scope="row">Hostname</th><td><?php echo htmlspecialchars($info['hostname']); ?></td></tr>
                <tr><th scope="row">Server IP</th><td><?php echo htmlspecialchars($info['server_ip']); ?></td></tr>
                <tr><th scope="row">Current User</th><td><?php echo htmlspecialchars($info['user']); ?></td></tr>
                <tr><th scope="row">Uptime</th><td><?php echo htmlspecialchars($info['uptime']); ?></td></tr>
                <tr><th scope="row">Operating System</th><td><?php echo htmlspecialchars($info['os'] ?? php_uname()); ?></td></tr>
                <tr><th scope="row">CPU</th><td><?php echo htmlspecialchars($info['cpu']); ?></td></tr>
                <tr><th scope="row">Memory</th><td><?php echo htmlspecialchars($info['memory']); ?></td></tr>
            </tbody>
        </table>
    </section>

    <!-- Services Status -->
    <section class="status" aria-labelledby="status-title">
        <h2 id="status-title">System Services Status</h2>
        <ul class="service-status" id="service-status-list">
            <?php foreach ($services as $service): ?>
                <li>
                    <strong><?php echo htmlspecialchars(strtoupper($service)); ?>:</strong>
                    <?php echo htmlspecialchars(getServiceStatus($service)); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <button id="toggle-status" class="btn" type="button" aria-expanded="true" aria-controls="service-status-list">
            Toggle System Status
        </button>
    </section>

    <!-- Developer Resources -->
    <section class="dev-links" aria-labelledby="dev-links-title">
        <h2 id="dev-links-title">Development Resources</h2>
        <ul class="dev-links-list">
            <li><a href="/delphi/pages/php_diagnostics.php" target="_blank" rel="noopener" title="Loaded PHP extensions and modules">PHP Diagnostics</a></li>
            <li><a href="/delphi/" target="_blank" rel="noopener" title="Browse Delphi root folder">Delphi Web Root</a></li>
            <li><a href="https://github.com/kevin-ch-day/Delphi" target="_blank" rel="noopener" title="GitHub repository for Delphi project">GitHub Repository</a></li>
        </ul>
    </section>

</div>

<?php include_once "includes/footer.php"; ?>
