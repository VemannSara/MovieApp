<?php
require_once 'functions.php';
require_once 'queries.php';
session_start();

$form_data = (object)[
    'username' => trim($_POST['name'] ?? ''),
    'enteredPassword' => trim($_POST['pword'] ?? '')
];
var_dump($form_data);
function verify_user_password($username, $enteredPassword) {
    
    $storedHash = get_userdata($username);
    var_dump($storedHash);
    var_dump($storedHash[0]['password']);
    var_dump($enteredPassword);
    var_dump($username);

    if (password_verify($enteredPassword, $storedHash[0]['password'])) {
        return true;
    } else {
        return false;
    }
}
if (verify_user_password($form_data->username, $form_data->enteredPassword)) {
    $_SESSION['username'] = $form_data->username;
    redirect('index.php');
} else {
    $errors[] = 'Username or password are incorrect!';
    $_SESSION['errors'] = $errors;
    #redirect('login.php');
}
?>