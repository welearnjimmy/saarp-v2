<?php

class PhotoUtil {
    public static function uploadPhoto($file, $auditId, $userId, $gpsCoordinates) {
        // Validate the photo file
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error.');
        }

        // Define the upload directory
        $uploadDir = __DIR__ . '/../../public/images/audits/';
        $fileName = uniqid('photo_', true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = $uploadDir . $fileName;

        // Move the uploaded file to the designated directory
        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            throw new Exception('Failed to move uploaded file.');
        }

        // Save photo metadata to the database (pseudo code)
        // Database::savePhotoMetadata($fileName, $auditId, $userId, $gpsCoordinates);

        return [
            'fileName' => $fileName,
            'auditId' => $auditId,
            'userId' => $userId,
            'gpsCoordinates' => $gpsCoordinates,
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }

    public static function getPhoto($fileName) {
        $filePath = __DIR__ . '/../../public/images/audits/' . $fileName;

        if (file_exists($filePath)) {
            return $filePath;
        }

        throw new Exception('Photo not found.');
    }

    public static function deletePhoto($fileName) {
        $filePath = __DIR__ . '/../../public/images/audits/' . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath);
            // Optionally remove metadata from the database
            // Database::removePhotoMetadata($fileName);
            return true;
        }

        throw new Exception('Photo not found for deletion.');
    }
}