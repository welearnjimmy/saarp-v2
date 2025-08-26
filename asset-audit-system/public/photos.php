<?php
session_start();
require_once '../src/controllers/PhotoController.php';

$photoController = new PhotoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $gpsData = $_POST['gps_data'];
        $description = $_POST['description'];
        $auditorId = $_SESSION['user_id']; // Assuming user ID is stored in session

        $uploadResult = $photoController->uploadPhoto($_FILES['photo'], $gpsData, $description, $auditorId);

        if ($uploadResult) {
            echo "Photo uploaded successfully.";
        } else {
            echo "Failed to upload photo.";
        }
    } else {
        echo "No photo uploaded or there was an upload error.";
    }
}

$photos = $photoController->getPhotos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Photo Upload</title>
</head>
<body>
    <h1>Upload Geo-tagged Photo</h1>
    <form action="photos.php" method="POST" enctype="multipart/form-data">
        <label for="photo">Select Photo:</label>
        <input type="file" name="photo" id="photo" required>
        <label for="gps_data">GPS Data:</label>
        <input type="text" name="gps_data" id="gps_data" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <button type="submit">Upload Photo</button>
    </form>

    <h2>Uploaded Photos</h2>
    <ul>
        <?php foreach ($photos as $photo): ?>
            <li>
                <img src="../images/<?php echo htmlspecialchars($photo['filename']); ?>" alt="Photo" width="100">
                <p>GPS: <?php echo htmlspecialchars($photo['gps_data']); ?></p>
                <p>Description: <?php echo htmlspecialchars($photo['description']); ?></p>
                <p>Uploaded by: <?php echo htmlspecialchars($photo['auditor_id']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>