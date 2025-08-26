<?php
session_start();

// Autoload classes
spl_autoload_register(function ($class_name) {
    include '../src/controllers/' . $class_name . '.php';
});

// Include configuration
require_once '../config/config.php';

// Routing
$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_uri) {
    case '/signup':
        include 'signup.php';
        break;
    case '/signin':
        include 'signin.php';
        break;
    case '/dashboard':
        include 'dashboard.php';
        break;
    case '/assets':
        include 'assets.php';
        break;
    case '/audits':
        include 'audits.php';
        break;
    case '/movements':
        include 'movements.php';
        break;
    case '/locations':
        include 'locations.php';
        break;
    case '/discrepancies':
        include 'discrepancies.php';
        break;
    case '/reports':
        include 'reports.php';
        break;
    case '/photos':
        include 'photos.php';
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>