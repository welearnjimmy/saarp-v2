<?php

class Discrepancy {
    private $id;
    private $assetId;
    private $description;
    private $status;
    private $createdAt;
    private $updatedAt;
    private $auditorId;

    public function __construct($assetId, $description, $status, $auditorId) {
        $this->assetId = $assetId;
        $this->description = $description;
        $this->status = $status;
        $this->auditorId = $auditorId;
        $this->createdAt = date("Y-m-d H:i:s");
        $this->updatedAt = date("Y-m-d H:i:s");
    }

    public function getId() {
        return $this->id;
    }

    public function getAssetId() {
        return $this->assetId;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getAuditorId() {
        return $this->auditorId;
    }

    public function setStatus($status) {
        $this->status = $status;
        $this->updatedAt = date("Y-m-d H:i:s");
    }

    public function save() {
        // Code to save the discrepancy to the database
    }

    public static function find($id) {
        // Code to find a discrepancy by ID
    }

    public static function all() {
        // Code to retrieve all discrepancies
    }
}