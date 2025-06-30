<?php require 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add a New Book</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="number" name="published_year" placeholder="Published Year" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <button type="submit" name="submit">Add Book</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("INSERT INTO books (title, author, published_year, genre) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $_POST['title'],
            $_POST['author'],
            $_POST['published_year'],
            $_POST['genre']
        ]);
        echo "<p>Book added successfully!</p>";
    }
    ?>
    <p><a href="index.php">← Back to Dashboard</a></p>
</div>
</body>
</html>
