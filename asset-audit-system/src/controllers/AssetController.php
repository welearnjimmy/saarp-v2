<?php

class AssetController {
    private $assetModel;

    public function __construct($assetModel) {
        $this->assetModel = $assetModel;
    }

    public function addAsset($data) {
        // Validate and add asset
        $this->assetModel->create($data);
    }

    public function editAsset($id, $data) {
        // Validate and update asset
        $this->assetModel->update($id, $data);
    }

    public function deleteAsset($id) {
        // Delete asset
        $this->assetModel->delete($id);
    }

    public function getAssets() {
        // Retrieve all assets
        return $this->assetModel->getAll();
    }

    public function getAssetById($id) {
        // Retrieve asset by ID
        return $this->assetModel->getById($id);
    }

    public function scanAsset($barcode) {
        // Scan asset using barcode
        return $this->assetModel->getByBarcode($barcode);
    }

    public function flagDiscrepancy($assetId, $discrepancyDetails) {
        // Flag an asset for discrepancies
        $this->assetModel->flagDiscrepancy($assetId, $discrepancyDetails);
    }
}