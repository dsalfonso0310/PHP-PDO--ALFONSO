<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>View Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Movie List</h2>
    <link rel="stylesheet" href="style.css">
    <table>
        <tr>
            <th>ID</th><th>Title</th><th>Director</th><th>Year</th><th>Genre</th><th><th>Available</th>Action</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM movies");
        foreach ($stmt as $movie): ?>
        <tr>
            <td><?= $movie['id'] ?></td>
            <td><?= htmlspecialchars($movie['title']) ?></td>
            <td><?= htmlspecialchars($movie['director']) ?></td>
            <td><?= $movie['release_year'] ?></td>
            <td><?= htmlspecialchars($movie['genre']) ?></td>
            <td><?= htmlspecialchars($movie['available']) ?></td>
            <td><a href="?delete=<?= $movie['id'] ?>" onclick="return confirm('Delete this movie?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php
    if (isset($_GET['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM movie WHERE id = ?");
        $stmt->execute([$_GET['delete']]);
        echo "<p>Movie deleted!</p>";
        echo "<meta http-equiv='refresh' content='1'>";
    }
    ?>
    <p><a href="index.php">← Back to Dashboard</a></p>
</div>
</body>
</html>
