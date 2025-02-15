<?php
header("Content-Type: application/json");

// Sample data
$items = [
    ['id' => 1, 'name' => 'Item 1'],
    ['id' => 2, 'name' => 'Item 2'],
];

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'GET':
        // GET all items or a single item
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $item = array_filter($items, fn($item) => $item['id'] == $id);
            echo json_encode($item ? array_values($item)[0] : ['message' => 'Item not found']);
        } else {
            echo json_encode($items);
        }
        break;

    case 'POST':
        // Create a new item
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data && isset($data['name'])) {
            $newItem = ['id' => count($items) + 1, 'name' => $data['name']];
            $items[] = $newItem;
            http_response_code(201);
            echo json_encode($newItem);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid input']);
        }
        break;

    case 'PUT':
        // Update an item
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = json_decode(file_get_contents('php://input'), true);
            foreach ($items as &$item) {
                if ($item['id'] == $id) {
                    $item['name'] = $data['name'];
                    echo json_encode($item);
                    break;
                }
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID is required']);
        }
        break;

    case 'DELETE':
        // Delete an item
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $items = array_filter($items, fn($item) => $item['id'] != $id);
            http_response_code(204);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID is required']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method not allowed']);
        break;
}
