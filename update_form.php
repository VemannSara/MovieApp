<?php
require_once 'queries.php';

$id = trim($_GET['Id'] ?? -1);
$movie = get_movie_by_id($id)[0] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit-Movie</title>
</head>
<body>
    <h1>Edit movie</h1>
    <form action="query_edit.php" method="POST">
        <input type="hidden" name="Id" value="<?=$movie['Id']?>">
        Title: <input name="Title" value="<?=$movie['Title']?>">
        Year: <input name="Year" value="<?=$movie['Year']?>">
        Director: <input name="Director" value="<?=$movie['Director']?>">
        <input type="submit">
    </form>
</body>
</html>
