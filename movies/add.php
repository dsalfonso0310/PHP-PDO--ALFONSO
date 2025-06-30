<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add a New Movie/h2>
    <form method="post">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="director" placeholder="Director" required>
        <input type="number" name="release_year" placeholder="Release Year" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <input type="text" name="available" placeholder="Available" required>
        <button type="submit" name="submit">Add Book</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("INSERT INTO movie (title, director, release_year, genre, available) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['title'],
            $_POST['director'],
            $_POST['releease_year'],
            $_POST['genre'],
            $_POST['available'],
        ]);
        echo "<p>Movie added successfully!</p>";
    }
    ?>
    <p><a href="index.php">← Back to Dashboard</a></p>
</div>
</body>
</html>
