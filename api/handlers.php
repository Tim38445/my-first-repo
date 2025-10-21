<?php

require_once 'users.php';



//Utility Functions


function load_users() {
    $file_path = 'data/databse.php';

    if (!file_exists($file_path)) {
        return [];
    }

    $json_data = file_get_contents($file_path);
    $users = json_decode($json_data, true);

    return $users ?: [];

}

function save_users($users) {
    $file_path = 'data/database.php';
    $json_data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents($file_path, $json_data);
}


function get_next_id($users) {
    $max_id = 0;
    foreach ($users as $user) {
        if ($user['id'] > $max_id) {
            $max_id = $user['id'];
        }
    }
    return $max_id + 1;
}

function getRequestData(){
    $input = file_get_contents('php://input');
    return json_decode($input, true) ?? [];
}


//Handlers


function get_all_users() {
    $users = load_users();
    echo json_encode([
        'success' => true,
        'data' => $users,
        'count' => count($users)
    ]);
}

function get_user($id) {
    $users = load_users();

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            echo json_encode([
                'success' => true,
                'data' => $user
            ]);
            return;
        }
    }
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'error' => 'User not found'
    ]);
}


function create_user() {
    $input = getRequestData();

    if (!$input) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'Invalid JSON data'
        ]);
        return;
    }

    $users = load_users();
    $new_id = get_next_id($users);

    $new_user = new User();
    $new_user->setId($new_id);
    $new_user->setName($input['name'] ?? '');
    $new_user->setAge($input['age'] ?? '');
    $new_user->setPastpurchase($input['pastpurchase'] ?? '');

    $users[] = $new_user->toArray();

    save_users($users);
    http_response_code(201);
    echo json_encode([
        'success' => true,
        'message' => 'User created',
        'data' => $new_user->toArray()
    ]);
}

function update_user($id) {
    $input = getRequestData();

    if (!$input) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'Invalid JSON data'
        ]);
        return;
    }

    $users = load_users();

    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['id'] == $id) {
            if (isset($input['name'])) $users[$i]['name'] = $input['name'];
            if (isset($input['age'])) $users[$i]['age'] = $input['age'];
            if (isset($input['pastpurchase'])) $users[$i]['pastpurchase'] = $input['pastpurchase'];

            save_users($users);
            echo json_encode([
                'success' => true,
                'message' => 'User updated',
                'data' => $users[$i]
            ]);
            return;
        }
    }

    http_response_code(404);
    echo json_encode([
        'success' => false,
        'error' => 'User not found'
    ]);
}



function delete_users($id) {
    $users = load_users();

    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['id'] == $id) {
            $deleted_user = $users[$i];
            array_splice($users, $i, 1);

            save_users($users);

            echo json_encode([
                'success' => true,
                'message' => 'User deleted',
                'data' => $deleted_user
            ]);
            return;
        }
    }
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'error' => 'User not found'
    ]);
}


function get_user_pastpurchase($pastpurchase) {
    $users = load_users();

    foreach ($users as $user) {
        if ($user['pastpurchase'] == $pastpurchase) {
            echo json_encode([
                'success' => true,
                'data' => $user
            ]);
            return;
        }
    }
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'error' => 'User not found'
    ]);
}




function delete_users_pastpurchase($pastpurchase) {
    $users = load_users();

    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['pastpurchase'] == $pastpurchase) {
            $deleted_user = $users[$i];
            array_splice($users, $i, 1);

            save_users($users);

            echo json_encode([
                'success' => true,
                'message' => 'User deleted',
                'data' => $deleted_user
            ]);
            return;
        }
    }
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'error' => 'User not found'
    ]);
}


function delete_users_name($age) {
    $users = load_users();

    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['age'] == $age) {
            $deleted_user = $users[$i];
            array_splice($users, $i, 1);

            save_users($users);

            echo json_encode([
                'success' => true,
                'message' => 'User deleted',
                'data' => $deleted_user
            ]);
            return;
        }
    }
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'error' => 'User not found'
    ]);
}

?>