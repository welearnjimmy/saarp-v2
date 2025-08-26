<?php

class DiscrepancyController {
    private $discrepancyModel;

    public function __construct() {
        $this->discrepancyModel = new Discrepancy();
    }

    public function index() {
        $discrepancies = $this->discrepancyModel->getAllDiscrepancies();
        include '../public/discrepancies.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'asset_id' => $_POST['asset_id'],
                'description' => $_POST['description'],
                'status' => 'Pending',
                'created_by' => $_SESSION['user_id'],
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->discrepancyModel->addDiscrepancy($data);
            header('Location: /discrepancies.php');
        } else {
            include '../public/create_discrepancy.php';
        }
    }

    public function resolve($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'status' => 'Resolved',
                'resolved_by' => $_SESSION['user_id'],
                'resolved_at' => date('Y-m-d H:i:s')
            ];
            $this->discrepancyModel->updateDiscrepancy($id, $data);
            header('Location: /discrepancies.php');
        } else {
            $discrepancy = $this->discrepancyModel->getDiscrepancyById($id);
            include '../public/resolve_discrepancy.php';
        }
    }

    public function delete($id) {
        $this->discrepancyModel->deleteDiscrepancy($id);
        header('Location: /discrepancies.php');
    }
}