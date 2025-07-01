<?php
// pages/index.php

require_once __DIR__ . '/../../includes/lib.php';
require_once __DIR__ . '/../../includes/header.php';

// Get server metadata
$info = getServerInfo();
$serverIP = $info['server_ip'] ?? 'Unavailable';

// Client IP detection with fallback
function getClientIP(): string
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    }
    return $_SERVER['REMOTE_ADDR'] ?? 'Unavailable';
}
$clientIP = getClientIP();

// Time formatting
$dtCentral = new DateTime("now", new DateTimeZone("America/Chicago"));
$dtUTC     = new DateTime("now", new DateTimeZone("UTC"));

$centralFormatted = $dtCentral->format("F j, Y g:i A") . " (Central)";
$utcFormatted     = $dtUTC->format("F j, Y g:i A") . " (UTC)";
$centralISO       = $dtCentral->format(DateTime::ATOM);
$utcISO           = $dtUTC->format(DateTime::ATOM);
?>

<div class="container" role="main">
    <!-- Welcome Section -->
    <header class="hero" aria-labelledby="page-title">
        <h1 id="page-title">Welcome to Delphi</h1>
        <p class="intro">
            Delphi is a modular and secure dashboard for Fedora-based LAMP server operations.
        </p>
    </header>

    <!-- Identity and Time Panel -->
    <section class="card identity-card" aria-labelledby="clock-identity-title">
        <h2 id="clock-identity-title">Clock & Identity</h2>
        <div class="clock-identity-wrapper">
            <div class="identity-column">
                <h3>Network</h3>
                <div class="identity-pair">
                    <span class="label">Server IP:</span>
                    <span class="value"><?php echo htmlspecialchars($serverIP); ?></span>
                </div>
                <div class="identity-pair">
                    <span class="label">Your IP:</span>
                    <span class="value"><?php echo htmlspecialchars($clientIP); ?></span>
                </div>
            </div>
            <div class="identity-column">
                <h3>Time</h3>
                <div class="identity-pair">
                    <span class="label">Central Time:</span>
                    <time class="value" datetime="<?php echo htmlspecialchars($centralISO); ?>">
                        <?php echo htmlspecialchars($centralFormatted); ?>
                    </time>
                </div>
                <div class="identity-pair">
                    <span class="label">UTC Time:</span>
                    <time class="value" datetime="<?php echo htmlspecialchars($utcISO); ?>">
                        <?php echo htmlspecialchars($utcFormatted); ?>
                    </time>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="card summary-card" aria-labelledby="about-title">
        <h2 id="about-title">What is Delphi?</h2>
        <p><strong>Delphi</strong> is a lightweight operational dashboard built for:</p>
        <ul class="feature-list">
            <li>🔍 System diagnostics and performance visibility</li>
            <li>🛠️ Real-time monitoring of Apache, MariaDB, SSH, and more</li>
            <li>📦 PHP environment introspection and runtime diagnostics</li>
            <li>🧩 Extensible support for GeoIP, CVE feeds, and telemetry agents</li>
        </ul>
        <p>
            Use the sidebar navigation or begin with
            <a href="<?php echo BASE_URL; ?>/pages/system_info.php">System Info</a>.
        </p>
    </section>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>