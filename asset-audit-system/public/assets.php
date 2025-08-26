<?php
session_start();
require_once '../src/controllers/AssetController.php';

$assetController = new AssetController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_asset'])) {
        $assetController->addAsset($_POST);
    } elseif (isset($_POST['edit_asset'])) {
        $assetController->editAsset($_POST);
    } elseif (isset($_POST['delete_asset'])) {
        $assetController->deleteAsset($_POST['asset_id']);
    }
}

$assets = $assetController->getAllAssets();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Asset Management</h1>
    <form method="POST" action="">
        <input type="text" name="asset_name" placeholder="Asset Name" required>
        <input type="text" name="asset_description" placeholder="Asset Description" required>
        <button type="submit" name="add_asset">Add Asset</button>
    </form>

    <h2>Existing Assets</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assets as $asset): ?>
                <tr>
                    <td><?php echo htmlspecialchars($asset['id']); ?></td>
                    <td><?php echo htmlspecialchars($asset['name']); ?></td>
                    <td><?php echo htmlspecialchars($asset['description']); ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="asset_id" value="<?php echo htmlspecialchars($asset['id']); ?>">
                            <button type="submit" name="edit_asset">Edit</button>
                            <button type="submit" name="delete_asset">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>