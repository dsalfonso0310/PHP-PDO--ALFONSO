<?php
require 'conn.php';

// Insert new book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO books (title, author, published_year, genre) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['year'], $_POST['genre']]);
}

// Delete book
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect after delete
    header("Location: index.php");
    exit;
}


// Fetch all books in the order they were added
$books = $pdo->query("SELECT * FROM books ORDER BY id ASC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
     <title>Library</title> 
    <title>Library Book Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h2>Library Book Management System</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="author" placeholder="Author" required><br>
        <input type="number" name="year" placeholder="Published Year" required><br>
        <input type="text" name="genre" placeholder="Genre" required><br>
        <button type="submit" name="add">Add Book</button>
    </form>

    <h3>Book List</h3>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Genre</th><th>Action</th></tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['id']) ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= $book['published_year'] ?></td>
            <td><?= htmlspecialchars($book['genre']) ?></td>
             <td>
                <a href="edit.php?id=<?= $book['id'] ?>">Edit</a> |
                <a href="?delete=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>

</td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

