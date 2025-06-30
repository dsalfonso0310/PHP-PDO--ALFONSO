<?php
require_once '../db.php'; 

// Insert new attendance
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO attendance (student_name, date, status) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['student_name'], $_POST['date'], $_POST['status']]);

    header("Location: index.php");
    exit;
}

// Delete attendance
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM attendance WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
}

// Fetch all attendance
$stmt = $pdo->query("SELECT * FROM attendance");
$attendance = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Attendane Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Student Attendance Tracker</h2>

    <form method="post">
        <input type="text" name="student_name" placeholder="Student name" required><br>
        <input type="number" name="date" placeholder="Date" required><br>
        <input type="text" name="status" placeholder="Status" required><br>
        <button type="submit" name="add">Add Attendance</button>
    </form>

    <h3>Attendance List</h3>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Student Name</th><th>Date</th><th>Status</th><th>Action</th>
        <?php foreach ($attendance as $attendance): ?>
        <tr>
            <td><?= htmlspecialchars($attendance['id']) ?></td>
            <td><?= htmlspecialchars($attendance['student_name']) ?></td>
            <td><?= htmlspecialchars($attendance['date']) ?></td>
            <td><?= htmlspecialchars($attendance['status']) ?></td>
            <td><a href="?delete=<?= $attendance['id'] ?>" onclick="return confirm('Delete this attendance?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'conn.php';
?>
