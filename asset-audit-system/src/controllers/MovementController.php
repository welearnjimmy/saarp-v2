<?php

namespace App\Controllers;

use App\Models\Movement;
use App\Models\Asset;
use App\Models\User;
use App\Utils\GPSUtil;

class MovementController
{
    public function logMovement($data)
    {
        // Validate and sanitize input data
        $assetId = $data['asset_id'];
        $userId = $data['user_id'];
        $location = $data['location'];
        $gpsData = GPSUtil::getGPSData(); // Get GPS data

        // Create a new movement record
        $movement = new Movement();
        $movement->asset_id = $assetId;
        $movement->user_id = $userId;
        $movement->location = $location;
        $movement->gps_data = json_encode($gpsData);
        $movement->timestamp = date('Y-m-d H:i:s');

        // Save the movement record to the database
        if ($movement->save()) {
            return ['status' => 'success', 'message' => 'Movement logged successfully.'];
        } else {
            return ['status' => 'error', 'message' => 'Failed to log movement.'];
        }
    }

    public function getMovements($assetId)
    {
        // Retrieve movements for a specific asset
        $movements = Movement::where('asset_id', $assetId)->get();
        return $movements;
    }

    public function getAllMovements()
    {
        // Retrieve all movements
        $movements = Movement::all();
        return $movements;
    }
}