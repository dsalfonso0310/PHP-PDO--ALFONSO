<?php
require 'db.php';

// Insert new movie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO movies (title, director, release_year, genre, available) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['title'],
        $_POST['director'],
        $_POST['year'],
        $_POST['genre'],
        $_POST['available']
    ]);
}

// Delete movie
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
}

// Fetch all movies
$stmt = $pdo->query("SELECT * FROM movies");
$movies = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Rental Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Movie Rental Store System</h2>

    <form method="post">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="director" placeholder="Director" required><br>
        <input type="number" name="year" placeholder="Release Year" required><br>
        <input type="text" name="genre" placeholder="Genre" required><br>
        <input type="text" name="available" placeholder="Available (Yes/No)" required><br>
        <button type="submit" name="add">Add Movie</button>
    </form>

    <h3>Movie List</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Director</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Available</th>
            <th>Action</th>
        </tr>
        <?php foreach ($movies as $movie): ?>
        <tr>
            <td><?= htmlspecialchars($movie['id']) ?></td>
            <td><?= htmlspecialchars($movie['title']) ?></td>
            <td><?= htmlspecialchars($movie['director']) ?></td>
            <td><?= htmlspecialchars($movie['release_year']) ?></td>
            <td><?= htmlspecialchars($movie['genre']) ?></td>
            <td><?= htmlspecialchars($movie['available']) ?></td>
            <td>
                <a href="?delete=<?= $movie['id'] ?>" onclick="return confirm('Delete this movie?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
