<?php

class PhotoController {
    private $photoUtil;

    public function __construct() {
        $this->photoUtil = new PhotoUtil();
    }

    public function uploadPhoto($request) {
        // Validate request and upload photo
        if (isset($request['photo']) && $this->isValidPhoto($request['photo'])) {
            $photoData = $this->photoUtil->savePhoto($request['photo'], $request['userId'], $request['gpsData']);
            return $photoData;
        }
        return ['error' => 'Invalid photo upload'];
    }

    public function getPhotosByAuditId($auditId) {
        // Retrieve photos associated with a specific audit
        return $this->photoUtil->getPhotosByAuditId($auditId);
    }

    private function isValidPhoto($photo) {
        // Implement validation logic for the photo
        return true; // Placeholder for actual validation
    }
}