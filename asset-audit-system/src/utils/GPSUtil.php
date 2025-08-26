<?php

class GPSUtil {
    public static function getCurrentLocation() {
        // This function would ideally interact with a GPS API to get the current location
        // For demonstration purposes, returning a mock location
        return [
            'latitude' => '0.0',
            'longitude' => '0.0',
            'timestamp' => time()
        ];
    }

    public static function validateCoordinates($latitude, $longitude) {
        // Validate latitude and longitude values
        if ($latitude < -90 || $latitude > 90 || $longitude < -180 || $longitude > 180) {
            return false;
        }
        return true;
    }

    public static function geoTagPhoto($photoPath, $latitude, $longitude, $userId) {
        // This function would attach GPS data to a photo
        // For demonstration purposes, returning a mock response
        return [
            'photoPath' => $photoPath,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'userId' => $userId,
            'timestamp' => time()
        ];
    }
}