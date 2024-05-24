<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$form_data = (object)($_SESSION['form_data'] ?? []);
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
};
unset($_SESSION['errors']);
unset($_SESSION['form_data']);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Register-Movie</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="add_user.php" method="POST">
            Username: <input name="name" required><br>
            Password: <input name="pword" type="password" required><br>
            Password again: <input name="pwordagain" type="password" required><br>
            <input type="submit">
        <?php if (!empty($errors)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>