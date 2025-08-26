<?php

namespace App\Controllers;

use App\Models\Audit;
use App\Models\Asset;
use App\Models\User;
use App\Utils\PhotoUtil;
use App\Utils\GPSUtil;

class AuditController
{
    public function createAudit($data)
    {
        // Validate and create a new audit entry
        $audit = new Audit();
        $audit->user_id = $data['user_id'];
        $audit->asset_id = $data['asset_id'];
        $audit->location = $data['location'];
        $audit->description = $data['description'];
        $audit->timestamp = date('Y-m-d H:i:s');
        $audit->gps_coordinates = GPSUtil::getCurrentCoordinates();
        $audit->photo = PhotoUtil::uploadPhoto($data['photo']);

        if ($audit->save()) {
            return ['status' => 'success', 'message' => 'Audit created successfully.'];
        } else {
            return ['status' => 'error', 'message' => 'Failed to create audit.'];
        }
    }

    public function getAudits()
    {
        // Retrieve all audits
        return Audit::all();
    }

    public function getAuditById($id)
    {
        // Retrieve a specific audit by ID
        return Audit::find($id);
    }

    public function updateAudit($id, $data)
    {
        // Update an existing audit entry
        $audit = Audit::find($id);
        if ($audit) {
            $audit->description = $data['description'];
            $audit->location = $data['location'];
            $audit->photo = PhotoUtil::uploadPhoto($data['photo']);
            $audit->timestamp = date('Y-m-d H:i:s');

            if ($audit->save()) {
                return ['status' => 'success', 'message' => 'Audit updated successfully.'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to update audit.'];
            }
        }
        return ['status' => 'error', 'message' => 'Audit not found.'];
    }

    public function deleteAudit($id)
    {
        // Delete an audit entry
        $audit = Audit::find($id);
        if ($audit) {
            $audit->delete();
            return ['status' => 'success', 'message' => 'Audit deleted successfully.'];
        }
        return ['status' => 'error', 'message' => 'Audit not found.'];
    }

    public function flagDiscrepancy($auditId, $issue)
    {
        // Flag an audit for discrepancies
        $audit = Audit::find($auditId);
        if ($audit) {
            $audit->discrepancy_flag = $issue;
            $audit->save();
            return ['status' => 'success', 'message' => 'Discrepancy flagged successfully.'];
        }
        return ['status' => 'error', 'message' => 'Audit not found.'];
    }
}