<?php
require 'conn.php';
$stmt = $pdo->query("SELECT * FROM timelogs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Logs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Employee Time Logs</h1>
    <a href="add.php">➕ Add New Log</a>
    <table>
        <tr>
            <th>Employee</th>
            <th>Clock In</th>
            <th>Clock Out</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= htmlspecialchars($row['employee_name']) ?></td>
            <td><?= $row['clock_in'] ?></td>
            <td><?= $row['clock_out'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'conn.php';
// ...
