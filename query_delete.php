<?php
// AUTENTIKÁCIÓ
// AUTORIZÁCIÓ
session_start();
require_once 'queries.php';

$data = (object)[
    'Id' => trim($_GET['Id'] ?? '')
];

$errors = [];

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    $role = get_userdata($user);
    if ($role[0]['role'] == 'admin' || $role[0]['role'] == 'moderator'){
        delete_movie($data->Id);    
    } else {
        $errors[] = 'Only moderators or admins can delete movies';
    }
}
else{
    $errors[] = 'You are not logged in';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
}

#var_dump($data);
redirect('index.php');