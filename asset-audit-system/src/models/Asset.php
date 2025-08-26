<?php

class Asset {
    private $id;
    private $name;
    private $description;
    private $barcode;
    private $locationId;
    private $status;
    private $createdAt;
    private $updatedAt;

    public function __construct($id, $name, $description, $barcode, $locationId, $status, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->barcode = $barcode;
        $this->locationId = $locationId;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getBarcode() {
        return $this->barcode;
    }

    public function getLocationId() {
        return $this->locationId;
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

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setBarcode($barcode) {
        $this->barcode = $barcode;
    }

    public function setLocationId($locationId) {
        $this->locationId = $locationId;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function save() {
        // Code to save asset to the database
    }

    public function update() {
        // Code to update asset in the database
    }

    public function delete() {
        // Code to delete asset from the database
    }

    public static function find($id) {
        // Code to find an asset by ID
    }

    public static function all() {
        // Code to retrieve all assets
    }
}