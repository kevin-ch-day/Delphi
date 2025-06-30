<?php
require_once "../../includes/lib.php";
include_once "../../includes/header.php";

$info = getServerInfo();
$timestamp = date("Y-m-d H:i:s");
?>
<div class="container" role="main">
    <header class="hero">
        <h1>System Information</h1>
        <p>Generated at <time datetime="<?php echo htmlspecialchars($timestamp); ?>"><?php echo htmlspecialchars($timestamp); ?></time></p>
    </header>
    <table class="info-table">
        <tbody>
        <?php foreach ($info as $key => $value): ?>
            <tr>
                <th><?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $key))); ?></th>
                <td><?php echo htmlspecialchars($value); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once "../../includes/footer.php"; ?>
