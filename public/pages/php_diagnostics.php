<?php
/* filename: pages/php_diagnostics.php */
require_once "../../includes/lib.php";
include_once "../../includes/header.php";

// Environment data
$phpVersion = phpversion();
$loadedExtensions = get_loaded_extensions();
sort($loadedExtensions);

$iniSettings = [
    'memory_limit'     => ini_get('memory_limit'),
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'post_max_size'    => ini_get('post_max_size'),
    'max_execution_time' => ini_get('max_execution_time'),
    'max_input_vars'   => ini_get('max_input_vars'),
    'display_errors'   => ini_get('display_errors'),
    'error_reporting'  => error_reporting(),
    'default_charset'  => ini_get('default_charset')
];
?>

<div class="container">
    <section class="intro">
        <h1>PHP Diagnostics</h1>
        <p>This page provides key information about the current PHP runtime environment.</p>
        <p><strong>PHP Version:</strong> <?php echo htmlspecialchars($phpVersion); ?></p>
    </section>

    <section class="php-settings">
        <h2>Important PHP Configuration Settings</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Setting</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($iniSettings as $setting => $value): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($setting); ?></td>
                        <td><?php echo htmlspecialchars((string)$value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="php-extensions">
        <h2>Loaded PHP Extensions</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Extension</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loadedExtensions as $i => $ext): ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo htmlspecialchars($ext); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>

<?php include_once "../../includes/footer.php"; ?>