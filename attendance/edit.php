<?php
require 'conn.php';

// Check if ID is set and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid attendance ID.");
}

$id = (int)$_GET['id'];

// Fetch the current attendance record
$stmt = $pdo->prepare("SELECT * FROM attendance WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();

if (!$record) {
    die("Attendance record not found.");
}

// Update the attendance record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE attendance SET student_name = ?, attendance_date = ?, status = ? WHERE id = ?");
    $stmt->execute([$name, $date, $status, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Attendance</h2>

    <form method="post">
        <input type="text" name="name" value="<?= htmlspecialchars($record['student_name']) ?>" required><br>
        <input type="date" name="date" value="<?= $record['attendance_date'] ?>" required><br>
        <select name="status" required>
            <option value="Present" <?= $record['status'] == 'Present' ? 'selected' : '' ?>>Present</option>
            <option value="Absent" <?= $record['status'] == 'Absent' ? 'selected' : '' ?>>Absent</option>
        </select><br>
        <button type="submit" name="update">Update Attendance</button>
    </form>

    <p><a href="index.php">← Back to Attendance List</a></p>
</body>
</html>
