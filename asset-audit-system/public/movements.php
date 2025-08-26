<?php
session_start();
require_once '../src/controllers/MovementController.php';

$movementController = new MovementController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assetId = $_POST['asset_id'];
    $fromLocation = $_POST['from_location'];
    $toLocation = $_POST['to_location'];
    $quantity = $_POST['quantity'];
    $userId = $_SESSION['user_id']; // Assuming user ID is stored in session

    $result = $movementController->logMovement($assetId, $fromLocation, $toLocation, $quantity, $userId);

    if ($result) {
        $message = "Movement logged successfully.";
    } else {
        $message = "Failed to log movement.";
    }
}

$movements = $movementController->getMovements();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Movements</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Asset Movements</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    
    <form method="POST" action="movements.php">
        <label for="asset_id">Asset ID:</label>
        <input type="text" id="asset_id" name="asset_id" required>
        
        <label for="from_location">From Location:</label>
        <input type="text" id="from_location" name="from_location" required>
        
        <label for="to_location">To Location:</label>
        <input type="text" id="to_location" name="to_location" required>
        
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        
        <button type="submit">Log Movement</button>
    </form>

    <h2>Movement History</h2>
    <table>
        <thead>
            <tr>
                <th>Asset ID</th>
                <th>From Location</th>
                <th>To Location</th>
                <th>Quantity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movements as $movement): ?>
                <tr>
                    <td><?php echo htmlspecialchars($movement['asset_id']); ?></td>
                    <td><?php echo htmlspecialchars($movement['from_location']); ?></td>
                    <td><?php echo htmlspecialchars($movement['to_location']); ?></td>
                    <td><?php echo htmlspecialchars($movement['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($movement['date']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>