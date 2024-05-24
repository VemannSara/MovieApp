<!--részletező oldal-->
<?php
session_start();
require_once 'queries.php';

$id = trim($_GET['id'] ?? -1);
$movie = get_movie_by_id($id)[0] ?? null;
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

if(is_null($movie)){
    redirect('index.php');
}

$omdbApiKey = '91de368b';
$omdbUrl = 'http://www.omdbapi.com/?apikey=' . $omdbApiKey . '&t=' . urlencode($movie['Title']);

$omdbResponse = file_get_contents($omdbUrl);
$omdbdata = json_decode($omdbResponse, true);
#var_dump($omdbdata)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Details</title>
</head>
<body>
<div class="container">
        <h1><?=$movie['Title']?> (<?=$movie['Year']?>)
            <?php if (empty($errors)): ?>
                <a href="query_delete.php?Id=<?=$movie['Id']?>"> &#128683;</a>
                <a href="update_form.php?Id=<?=$movie['Id']?>"> &#128221;</a>
            <?php endif; ?>
        </h1>
            <?php if (!empty($errors)): ?>
                <div class="errors">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>        
        <div>
            <p><strong>Directed by:</strong> <?=$movie['Director']?></p>
        </div>

        <?php if ($omdbdata): ?>
            <div class="movie-details">
                <div class="poster">
                    <img src="<?=$omdbdata['Poster']?>" alt="<?=$movie['Title']?> Poster">
                </div>
                <div class="info">
                    <h2>Plot: </h2>
                    <p><?=$omdbdata['Plot']?></p>
                    <h2>Actors: </h2>
                    <p><?=$omdbdata['Actors']?></p>
                    <h2>IMDB Rating: </h2>
                    <p><b><?=$omdbdata['imdbRating']?></b></p>
                </div>
            </div>
        <?php else: ?>
            <div>
                <p>Additional information is not available.</p>
            </div>
        <?php endif; ?>

    <!-- ha admin vagy -->
    <hr>
    <br><br>
</body>
</html>