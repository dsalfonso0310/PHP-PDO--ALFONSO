<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Attendance List</h2>
    <link rel="stylesheet" href="style.css">
    <table>
        <tr>
            <th>ID</th><th>Student Name</th><th>Date</th><th>Status</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM books");
        foreach ($stmt as $attendance): ?>
        <tr>
            <td><?= $attendance['id'] ?></td>
            <td><?= htmlspecialchars($attendance['student_name']) ?></td>
            <td><?= $book['date'] ?></td>
            <td><?= htmlspecialchars($attendace['status']) ?></td>
            <td><a href="?delete=<?= $attendace['id'] ?>" onclick="return confirm('Delete this attendance?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php
    if (isset($_GET['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM attendance WHERE id = ?");
        $stmt->execute([$_GET['delete']]);
        echo "<p>Attendance deleted!</p>";
        echo "<meta http-equiv='refresh' content='1'>";
    }
    ?>
    <p><a href="index.php">← Back to Dashboard</a></p>
</div>
</body>
</html>
