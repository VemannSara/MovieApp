<?php
session_start();
require_once 'queries.php';

$errors = [];

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    $role = get_userdata($user);
    if ($role[0]['role'] == 'admin'){
        $users = get_all_users();
    }
    else{
        $errors[] = 'You are not an admin';
    }
}
else{
    $errors[] = 'You are not logged in';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Users-Movie</title>
</head>
<body>
    <h1>Edit Users</h1>
    <form action="query_edit_user.php" method="POST">
        Name: <input name="name" type="text" required>
        Role: <input name="role" type="text" required>
    <input type="submit">
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?=$user['name']?></td>
                <td><?=$user['role']?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>