<?php
session_start();
require_once '../src/controllers/LocationController.php';

$locationController = new LocationController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_location'])) {
        $locationName = $_POST['location_name'];
        $locationDescription = $_POST['location_description'];
        $locationController->addLocation($locationName, $locationDescription);
    } elseif (isset($_POST['update_location'])) {
        $locationId = $_POST['location_id'];
        $locationName = $_POST['location_name'];
        $locationDescription = $_POST['location_description'];
        $locationController->updateLocation($locationId, $locationName, $locationDescription);
    }
}

$locations = $locationController->getAllLocations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Manage Locations</title>
</head>
<body>
    <h1>Manage Asset Locations</h1>
    <form method="POST">
        <input type="text" name="location_name" placeholder="Location Name" required>
        <textarea name="location_description" placeholder="Location Description" required></textarea>
        <button type="submit" name="add_location">Add Location</button>
    </form>

    <h2>Existing Locations</h2>
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
            <?php foreach ($locations as $location): ?>
                <tr>
                    <td><?php echo $location['id']; ?></td>
                    <td><?php echo $location['name']; ?></td>
                    <td><?php echo $location['description']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="location_id" value="<?php echo $location['id']; ?>">
                            <input type="text" name="location_name" value="<?php echo $location['name']; ?>" required>
                            <textarea name="location_description" required><?php echo $location['description']; ?></textarea>
                            <button type="submit" name="update_location">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>