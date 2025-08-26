<?php
session_start();
require_once '../src/controllers/ReportController.php';

$reportController = new ReportController();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$reports = $reportController->getAllReports();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Asset Audit Reports</h1>
        <table>
            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Title</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($report['id']); ?></td>
                        <td><?php echo htmlspecialchars($report['title']); ?></td>
                        <td><?php echo htmlspecialchars($report['created_at']); ?></td>
                        <td>
                            <a href="view_report.php?id=<?php echo htmlspecialchars($report['id']); ?>">View</a>
                            <a href="download_report.php?id=<?php echo htmlspecialchars($report['id']); ?>">Download</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>