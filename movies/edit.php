<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
$stmt->execute([$id]);
$movie = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $available = $_POST['available'];
    $rating = $_POST['rating'];

    $sql = "UPDATE movies SET title = ?, genre = ?, release_year = ?, available = ?, rating = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $genre, $release_year, $available, $rating, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Movie</h2>
<form method="post">
    <label>Title: <input type="text" name="title" value="<?= $movie['title'] ?>" required></label><br>
    <label>Genre: <input type="text" name="genre" value="<?= $movie['genre'] ?>"></label><br>
    <label>Release Year: <input type="number" name="release_year" value="<?= $movie['release_year'] ?>"></label><br>
    <label>Available: <input type="text" name="available" value="<?= $movie['available'] ?>"></label><br>
    <label>Rating: <input type="text" name="rating" value="<?= $movie['rating'] ?>"></label><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
