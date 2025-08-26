<?php
session_start();
require_once '../src/controllers/DiscrepancyController.php';

$discrepancyController = new DiscrepancyController();

if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

$discrepancies = $discrepancyController->getAllDiscrepancies();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Discrepancies</title>
</head>
<body>
    <div class="container">
        <h1>Discrepancies</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Asset ID</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($discrepancies as $discrepancy): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($discrepancy['id']); ?></td>
                        <td><?php echo htmlspecialchars($discrepancy['asset_id']); ?></td>
                        <td><?php echo htmlspecialchars($discrepancy['description']); ?></td>
                        <td><?php echo htmlspecialchars($discrepancy['status']); ?></td>
                        <td>
                            <a href="resolve_discrepancy.php?id=<?php echo htmlspecialchars($discrepancy['id']); ?>">Resolve</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>