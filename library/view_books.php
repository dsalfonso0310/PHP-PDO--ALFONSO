<?php
session_start();
require 'conn.php';
if (!isset($_SESSION['user']));

$stmt = $pdo->query("SELECT * FROM books");
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Book List</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th><th>Author</th><th>Year</th><th>Genre</th><th>Actions</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= $book['published_year'] ?></td>
            <td><?= htmlspecialchars($book['genre']) ?></td>
            <td>
                <a href="edit_book.php?id=<?= $book['id'] ?>">Edit</a> |
                <a href="delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><a href="index.php"><button>Back</button></a>
</div>
</body>
</html>
