<?php
 
 require_once 'handlers.php';

header('Content-type: application/json');
header('Access-Control-Allow-Mehtods: GET, POST, PUT, DELETE');
header('Access-COntrol-Allow-Header: Content-Type');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit(0);
}

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($path, '/');

$segments = explode('/', $path);
$resource = $segments[0] ?? '';
$id = $segments[1] ?? null;

$method = $_SERVER['REQUEST_METHOD'];

if (empty($resource)) {
    echo json_encode([
        'message' => 'Appliance Store User Management API',
        'endpoints' => [
            'GET /users' => 'Get all users',
            'GET /users/{id}' => 'Get user by ID',
            'POST /users' => 'Create new user',
            'PUT /users/{id}' => 'Update all user information',
            'DELETE /users{id}' => 'Delete user',
            'GET /users/pastpurchase' => 'Get users by pastpurchases',
            'DELETE /users/name' => 'Delete by name',
            'DELETE /users/pastpurchase' => 'Delete by pastpurchases'

        ]
        ]);
        exit;
}

echo "<br><br>";

if ($resource === 'users') {
    $user_id = isset($id) ? (int)$id: null;

    switch ($method) {
        case 'GET': 
            if ($user_id) {
                get_user($user_id);
            } elseif ($user_pastpurchase) {
                get_user_pastpurchase($user_pastpurchase);
            } else {
                get_all_users();
            }
            break;

        case 'POST':
            create_user();
            break;

        case 'PUT':
            if ($user_id) {
                update_user($user_id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'User ID required']);
            }
            break;

        case 'DELETE':
            if ($user_id) {
                delete_users($user_id);
            } elseif ($user_pastpurchase) {
                delete_users_pastpurchase($user_pastpurchase);
            } elseif ($user_name) {
                delete_users_name($user_name);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'User ID required']);
            }
            break;

        default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
}
?>