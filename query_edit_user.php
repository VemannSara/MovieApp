<?php

require_once 'queries.php';

$form_data = (object)[
    'name' => trim($_POST['name'] ?? ''),
    'role'  => trim($_POST['role'] ?? ''),
];


edit_user($form_data->name, $form_data->role);

redirect('users.php');
