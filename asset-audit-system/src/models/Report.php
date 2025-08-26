<?php

class Report {
    private $id;
    private $userId;
    private $auditId;
    private $reportData;
    private $createdAt;
    private $updatedAt;

    public function __construct($userId, $auditId, $reportData) {
        $this->userId = $userId;
        $this->auditId = $auditId;
        $this->reportData = $reportData;
        $this->createdAt = date("Y-m-d H:i:s");
        $this->updatedAt = date("Y-m-d H:i:s");
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getAuditId() {
        return $this->auditId;
    }

    public function getReportData() {
        return $this->reportData;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setReportData($reportData) {
        $this->reportData = $reportData;
        $this->updatedAt = date("Y-m-d H:i:s");
    }

    public function save() {
        // Code to save the report to the database
    }

    public static function find($id) {
        // Code to find a report by its ID
    }

    public static function all() {
        // Code to retrieve all reports
    }
}