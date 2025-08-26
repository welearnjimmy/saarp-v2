<?php
// Configuration settings for the Asset Audit System

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'asset_audit_db');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// Base URL of the application
define('BASE_URL', 'http://localhost/asset-audit-system/public/');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session settings
session_start();

// Role definitions
define('ROLE_FIELD_AGENT', 'Field Agent');
define('ROLE_AUDITOR', 'Auditor');
define('ROLE_FINANCE', 'Finance');
define('ROLE_ADMIN', 'Admin');

// Other configurations can be added here as needed
?>