<?php
session_start();
include "conn.php";
if (!isset($_SESSION['user'])) {
    header("Location: add.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Welcome to the Library, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>

    <div class="button-group">
        <a href="add_book.php"><button>Add Book</button></a><br><br>
        <a href="books.php"><button>View Book List</button></a><br><br>
        <a href="logout.php"><button>Logout</button></a>
    </div>
</div>

</body>
</html>
