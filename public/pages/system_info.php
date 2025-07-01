<?php
// pages/system_info.php

require_once "../../includes/lib.php";
include_once "../../includes/header.php";

// Gather server info
$info = getServerInfo();
$timestamp = date("Y-m-d H:i:s");
?>
<div class="container" role="main">
    <!-- Header -->
    <header class="hero" aria-labelledby="system-info-title">
        <h1 id="system-info-title">System Information</h1>
        <p class="subtitle">
            Collected on:
            <time datetime="<?php echo htmlspecialchars($timestamp); ?>">
                <?php echo htmlspecialchars($timestamp); ?>
            </time>
        </p>
    </header>

    <!-- Info Table -->
    <section class="card" aria-label="Server Details">
        <table class="info-table">
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($info as $key => $value): ?>
                    <tr>
                        <td class="label-cell"><?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $key))); ?></td>
                        <td class="value-cell"><?php echo htmlspecialchars($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
<?php include_once "../../includes/footer.php"; ?>