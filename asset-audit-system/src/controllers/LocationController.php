<?php

class LocationController {
    private $locationModel;

    public function __construct($locationModel) {
        $this->locationModel = $locationModel;
    }

    public function getAllLocations() {
        return $this->locationModel->fetchAll();
    }

    public function getLocationById($id) {
        return $this->locationModel->fetchById($id);
    }

    public function addLocation($data) {
        return $this->locationModel->create($data);
    }

    public function updateLocation($id, $data) {
        return $this->locationModel->update($id, $data);
    }

    public function deleteLocation($id) {
        return $this->locationModel->delete($id);
    }
}