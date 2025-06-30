<?php
require_once "../includes/lib.php";
include_once "../includes/header.php";

$info = getServerInfo();
$timestamp = date("Y-m-d H:i:s");
$services = getMonitoredServices();
?>
<div class="container" role="main">
    <header class="hero">
        <h1>Delphi LAMP Dashboard</h1>
        <p>Monitor your Fedora server and access helpful tools.</p>
        <p><strong>Server Time:</strong> <time datetime="<?php echo htmlspecialchars($timestamp); ?>"><?php echo htmlspecialchars($timestamp); ?></time></p>
    </header>

    <div class="dashboard-grid">
        <section class="card" aria-labelledby="env-info-title">
            <h2 id="env-info-title">System Overview</h2>
            <table class="info-table">
                <tbody>
                <tr><th>PHP Version</th><td><?php echo htmlspecialchars($info['php_version']); ?></td></tr>
                <tr><th>Hostname</th><td><?php echo htmlspecialchars($info['hostname']); ?></td></tr>
                <tr><th>Server IP</th><td><?php echo htmlspecialchars($info['server_ip']); ?></td></tr>
                <tr><th>Current User</th><td><?php echo htmlspecialchars($info['user']); ?></td></tr>
                <tr><th>Uptime</th><td><?php echo htmlspecialchars($info['uptime']); ?></td></tr>
                <tr><th>Operating System</th><td><?php echo htmlspecialchars($info['os']); ?></td></tr>
                <tr><th>CPU</th><td><?php echo htmlspecialchars($info['cpu']); ?></td></tr>
                <tr><th>Memory</th><td><?php echo htmlspecialchars($info['memory']); ?></td></tr>
                </tbody>
            </table>
        </section>

        <section class="card status" aria-labelledby="status-title">
            <h2 id="status-title">Service Status</h2>
            <ul class="service-status" id="service-status-list">
                <?php foreach ($services as $service): ?>
                    <li>
                        <strong><?php echo htmlspecialchars(strtoupper($service)); ?>:</strong>
                        <?php echo htmlspecialchars(getServiceStatus($service)); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button id="toggle-status" class="btn" type="button" aria-expanded="true" aria-controls="service-status-list">Toggle Service Status</button>
        </section>
    </div>

    <section class="dev-links" aria-labelledby="dev-links-title">
        <h2 id="dev-links-title">Tools & Resources</h2>
        <ul class="dev-links-list">
            <li><a href="<?php echo BASE_URL; ?>/pages/system_info.php">System Info</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/services.php">Services</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/php_diagnostics.php" target="_blank" rel="noopener">PHP Diagnostics</a></li>
            <li><a href="<?php echo BASE_URL; ?>/" target="_blank" rel="noopener">Delphi Web Root</a></li>
            <li><a href="https://github.com/kevin-ch-day/Delphi" target="_blank" rel="noopener">GitHub Repository</a></li>
        </ul>
    </section>
</div>
<?php include_once "../includes/footer.php"; ?>
