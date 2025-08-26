<?php
session_start();
require_once '../config/config.php';
require_once '../src/controllers/AuthController.php';
require_once '../src/controllers/AssetController.php';
require_once '../src/controllers/AuditController.php';
require_once '../src/controllers/MovementController.php';
require_once '../src/controllers/LocationController.php';
require_once '../src/controllers/DiscrepancyController.php';
require_once '../src/controllers/ReportController.php';
require_once '../src/controllers/PhotoController.php';

$authController = new AuthController();
$assetController = new AssetController();
$auditController = new AuditController();
$movementController = new MovementController();
$locationController = new LocationController();
$discrepancyController = new DiscrepancyController();
$reportController = new ReportController();
$photoController = new PhotoController();

if (!$authController->isLoggedIn()) {
    header('Location: signin.php');
    exit();
}

$userRole = $_SESSION['user_role'];
$assets = $assetController->getAllAssets();
$audits = $auditController->getAllAudits();
$movements = $movementController->getAllMovements();
$locations = $locationController->getAllLocations();
$discrepancies = $discrepancyController->getAllDiscrepancies();
$reports = $reportController->getAllReports();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Asset Audit System Dashboard</h1>
        <nav>
            <ul>
                <li><a href="assets.php">Assets</a></li>
                <li><a href="audits.php">Audits</a></li>
                <li><a href="movements.php">Movements</a></li>
                <li><a href="locations.php">Locations</a></li>
                <li><a href="discrepancies.php">Discrepancies</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="photos.php">Photos</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <section>
            <h3>Asset Overview</h3>
            <p>Total Assets: <?php echo count($assets); ?></p>
            <p>Total Audits: <?php echo count($audits); ?></p>
            <p>Total Movements: <?php echo count($movements); ?></p>
            <p>Total Locations: <?php echo count($locations); ?></p>
            <p>Total Discrepancies: <?php echo count($discrepancies); ?></p>
            <p>Total Reports: <?php echo count($reports); ?></p>
        </section>
        <section>
            <h3>Recent Activities</h3>
            <!-- Display recent activities or logs here -->
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Asset Audit System</p>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>