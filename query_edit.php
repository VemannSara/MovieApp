<?php
session_start();
require_once 'queries.php';
$form_data = (object)[
    'Id' => trim($_POST['Id'] ?? ''),
    'Title' => trim($_POST['Title'] ?? ''),
    'Year'  => trim($_POST['Year'] ?? 1),
    'Director' => trim($_POST['Director'] ?? '')
];

$errors = [];

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    $role = get_userdata($user);
    if ($role[0]['role'] == 'admin' || $role[0]['role'] == 'moderator'){
        edit_movie(
            $form_data->Id,
            $form_data->Title,
            $form_data->Year,
            $form_data->Director
        );
    } else {
        $errors[] = 'Only moderators or admins can edit movies';
    }
}
else{
    $errors[] = 'You are not logged in';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;

}

redirect('index.php');