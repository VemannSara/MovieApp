<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$username =  $_SESSION['username'] ?? '';
unset($_SESSION['errors']);
unset($_SESSION['username']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login-Movies</title>
</head>
<body>
<h1>Log in</h1>
        <form action="check.php" method="POST">
            Username: <input name="name" required><br>
            Password: <input name="pword" type="password" required><br>
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