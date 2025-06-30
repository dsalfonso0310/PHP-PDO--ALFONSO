<?php
require 'conn.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM timelogs WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['employee_name'];
    $clock_in = $_POST['clock_in'];
    $clock_out = $_POST['clock_out'];

    $update = $pdo->prepare("UPDATE timelogs SET employee_name = ?, clock_in = ?, clock_out = ? WHERE id = ?");
    $update->execute([$name, $clock_in, $clock_out, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Log</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Employee Time Log</h1>
    <form method="post">
        <label>Employee Name:</label>
        <input type="text" name="employee_name" value="<?= $row['employee_name'] ?>" required><br>

        <label>Clock In:</label>
        <input type="datetime-local" name="clock_in" value="<?= date('Y-m-d\TH:i', strtotime($row['clock_in'])) ?>" required><br>

        <label>Clock Out:</label>
        <input type="datetime-local" name="clock_out" value="<?= date('Y-m-d\TH:i', strtotime($row['clock_out'])) ?>"><br>

        <button type="submit">Update</button>
    </form>
    <a href="index.php">⬅ Back</a>
</body>
</html>
