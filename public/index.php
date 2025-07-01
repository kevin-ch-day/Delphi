<?php
/* filename: pages/index.php */

require_once "../includes/lib.php";
include_once "../includes/header.php";

// Collect server information
$info = getServerInfo();

// Format server times (Central and UTC)
$dtCentral = new DateTime("now", new DateTimeZone("America/Chicago"));
$dtUTC     = new DateTime("now", new DateTimeZone("UTC"));

$centralFormatted = $dtCentral->format("F j, Y g:i A") . " (Central)";
$utcFormatted     = $dtUTC->format("F j, Y g:i A") . " (UTC)";
$centralISO       = $dtCentral->format(DateTime::ATOM);
$utcISO           = $dtUTC->format(DateTime::ATOM);

// Determine client IP
function getClientIP(): string
{
    return $_SERVER['HTTP_CLIENT_IP']
        ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ? explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0] : ($_SERVER['REMOTE_ADDR'] ?? 'Unavailable'));
}

$clientIP = getClientIP();
$serverIP = $info['server_ip'];
?>

<div class="container" role="main">
    <!-- Hero -->
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

    <!-- About Delphi -->
    <section class="card summary-card" aria-labelledby="about-title">
        <h2 id="about-title">What is Delphi?</h2>
        <p>
            <strong>Delphi</strong> is a lightweight operational dashboard for:
        </p>
        <ul class="feature-list">
            <li>🔍 System diagnostics and performance visibility</li>
            <li>🛠️ Service monitoring for Apache, MariaDB, SSH, and more</li>
            <li>📦 PHP environment overview and extensions</li>
            <li>🧩 Future-ready modules for GeoIP, CVEs, and telemetry agents</li>
        </ul>
        <p>
            Start exploring via the sidebar or visit <a href="<?php echo BASE_URL; ?>/pages/system_info.php">System Info</a>.
        </p>
    </section>
</div>

<?php include_once "../includes/footer.php"; ?>