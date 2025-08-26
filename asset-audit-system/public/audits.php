<?php
session_start();
require_once '../src/controllers/AuditController.php';

$auditController = new AuditController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['conduct_audit'])) {
        $auditData = [
            'asset_id' => $_POST['asset_id'],
            'auditor_id' => $_SESSION['user_id'],
            'location' => $_POST['location'],
            'description' => $_POST['description'],
            'photos' => $_FILES['photos'],
            'gps' => $_POST['gps'],
        ];
        
        $result = $auditController->conductAudit($auditData);
        if ($result) {
            $message = "Audit conducted successfully.";
        } else {
            $message = "Failed to conduct audit.";
        }
    }
}

$audits = $auditController->getAllAudits();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Audits</title>
</head>
<body>
    <div class="container">
        <h1>Audit Records</h1>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        
        <form action="audits.php" method="POST" enctype="multipart/form-data">
            <label for="asset_id">Asset ID:</label>
            <input type="text" name="asset_id" required>
            
            <label for="location">Location:</label>
            <input type="text" name="location" required>
            
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            
            <label for="photos">Upload Photos:</label>
            <input type="file" name="photos[]" multiple>
            
            <label for="gps">GPS Coordinates:</label>
            <input type="text" name="gps" required>
            
            <button type="submit" name="conduct_audit">Conduct Audit</button>
        </form>

        <h2>Previous Audits</h2>
        <table>
            <thead>
                <tr>
                    <th>Audit ID</th>
                    <th>Asset ID</th>
                    <th>Auditor ID</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($audits as $audit): ?>
                    <tr>
                        <td><?php echo $audit['id']; ?></td>
                        <td><?php echo $audit['asset_id']; ?></td>
                        <td><?php echo $audit['auditor_id']; ?></td>
                        <td><?php echo $audit['location']; ?></td>
                        <td><?php echo $audit['description']; ?></td>
                        <td><?php echo $audit['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>