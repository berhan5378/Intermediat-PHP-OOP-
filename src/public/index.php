<?php
header("Content-Type: application/json");

// Simulate a simple router
$request = $_SERVER['REQUEST_METHOD'];
$url = isset($_GET['url']) ? $_GET['url'] : '';

switch ($url) {
    case 'items':
        require 'api/items.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(['message' => 'Endpoint not found']);
        break;
}
