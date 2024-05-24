<?php
session_start();
require_once 'queries.php';

$form_data = (object)[
    'name' => trim($_POST['name'] ?? ''),
    $password =  trim($_POST['pword'] ?? 1),
    $passwordAgain = trim($_POST['pwordagain'] ?? 1),
    'role' => trim($_POST['role'] ?? '')
];

$errors = [];

if ($password !== $passwordAgain) {
    $errors[] = "Passwords do not match.";
}

if (strlen($password) < 12) {
    $errors[] = "Password must be at least 12 characters long.";
}

if (!preg_match('/[A-Z]/', $password)) {
    $errors[] = "Password must contain at least one uppercase letter.";
}

if (!preg_match('/[a-z]/', $password)) {
    $errors[] = "Password must contain at least one lowercase letter.";
}

if (empty($errors)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION['username'] = $form_data->name;
    add_new_user(
        $form_data->name,
        $hashed_password,
    );    
    redirect('index.php');
} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = (array) $form_data;
    #var_dump($errors);
    redirect('signup_form.php');    
}

