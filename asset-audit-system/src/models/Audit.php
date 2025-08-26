<?php

class Audit {
    private $id;
    private $assetId;
    private $userId;
    private $timestamp;
    private $location;
    private $description;
    private $photos = [];
    private $status;

    public function __construct($assetId, $userId, $location, $description) {
        $this->assetId = $assetId;
        $this->userId = $userId;
        $this->timestamp = date("Y-m-d H:i:s");
        $this->location = $location;
        $this->description = $description;
        $this->status = 'Pending';
    }

    public function addPhoto($photo) {
        $this->photos[] = $photo;
    }

    public function getAuditDetails() {
        return [
            'id' => $this->id,
            'assetId' => $this->assetId,
            'userId' => $this->userId,
            'timestamp' => $this->timestamp,
            'location' => $this->location,
            'description' => $this->description,
            'photos' => $this->photos,
            'status' => $this->status,
        ];
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function save() {
        // Code to save the audit details to the database
    }

    public static function getAllAudits() {
        // Code to retrieve all audits from the database
    }

    public static function getAuditById($id) {
        // Code to retrieve a specific audit by ID from the database
    }
}