<?php

class Movement {
    private $id;
    private $assetId;
    private $fromLocation;
    private $toLocation;
    private $movedBy;
    private $timestamp;

    public function __construct($assetId, $fromLocation, $toLocation, $movedBy) {
        $this->assetId = $assetId;
        $this->fromLocation = $fromLocation;
        $this->toLocation = $toLocation;
        $this->movedBy = $movedBy;
        $this->timestamp = date("Y-m-d H:i:s");
    }

    public function getId() {
        return $this->id;
    }

    public function getAssetId() {
        return $this->assetId;
    }

    public function getFromLocation() {
        return $this->fromLocation;
    }

    public function getToLocation() {
        return $this->toLocation;
    }

    public function getMovedBy() {
        return $this->movedBy;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function save() {
        // Code to save movement record to the database
    }

    public static function getAllMovements() {
        // Code to retrieve all movement records from the database
    }

    public static function getMovementById($id) {
        // Code to retrieve a specific movement record by ID from the database
    }
}