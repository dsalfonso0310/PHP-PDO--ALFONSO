<?php
session_start();
require 'conn.php';
if (!isset($_GET['id'])){
    
}


$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, published_year = ?, genre = ? WHERE id = ?");
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['year'], $_POST['genre'], $id]);
    header("Location: books.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Edit Book</h2>
    <form method="POST">
        <input type="text" name="title" value="<?= $book['title'] ?>" required><br>
        <input type="text" name="author" value="<?= $book['author'] ?>" required><br>
        <input type="number" name="year" value="<?= $book['published_year'] ?>" required><br>
        <input type="text" name="genre" value="<?= $book['genre'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <br><a href="view_books.php"><button>Back</button></a>
</div>
</body>
</html>
