<?php
require_once "../../includes/lib.php";
include_once "../../includes/header.php";

$services = getMonitoredServices();
?>
<div class="container" role="main">
    <header class="hero">
        <h1>Service Status</h1>
        <p>Monitor the current state of configured services.</p>
    </header>
    <section class="status" aria-labelledby="status-title">
        <h2 id="status-title">Current Status</h2>
        <ul class="service-status" id="service-status-list">
            <?php foreach ($services as $service): ?>
                <li>
                    <strong><?php echo htmlspecialchars(strtoupper($service)); ?>:</strong>
                    <?php echo htmlspecialchars(getServiceStatus($service)); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <button id="toggle-status" class="btn" type="button" aria-expanded="true" aria-controls="service-status-list">Toggle System Status</button>
    </section>
</div>
<?php include_once "../../includes/footer.php"; ?>
