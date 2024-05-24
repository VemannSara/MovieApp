<?php
require_once 'queries.php';
session_start();
$db = db_connect('movieApp');
$movies = get_all_movies();
if(isset($_SESSION['username'])){
$user = $_SESSION['username'];
};
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
/*highlight_array($movies);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Movies</title>
</head>
<body>
    <h1>Movies &#127916;</h1>
     <?php if(isset($_SESSION['username'])){
        ?><h2>Szia <?=$user;};?>!</h2>
    <a href="signup_form.php"> Sign up </a>
    <a href="login.php"> Log in </a>
    <a href="logout.php"> Log out </a>
    <br>
    <?php if (empty($errors)): ?>
        <a href="users.php">Users &#128106;</a>
    <?php endif; ?>
    <h2>Send in a movie!</h2>
    <form action="query_add.php" method="POST">
        Title: <input name="Title" type="text" required>
        Year: <input name="Year" required>
        Director: <input name="Director" type="text" required>
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
    <table>
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Director</th>
        </tr>
        <?php foreach($movies as $movie): ?>
            <tr>
                <td><a href="movie.php?id=<?=$movie['Id']?>"><?=$movie['Title']?></a></td>
                <td><?=$movie['Year']?></td>
                <td><?=$movie['Director']?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>