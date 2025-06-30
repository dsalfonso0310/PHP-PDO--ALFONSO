<?php
require 'conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $employee_name = $_POST['employee_name'] ?? '';
    $clock_in = $_POST['clock_in'] ?? null;
    $clock_out = $_POST['clock_out'] ?? null;

    
    $stmt = $pdo->prepare("INSERT INTO timelogs (employee_name, clock_in, clock_out) VALUES (?, ?, ?)");
    $stmt->execute([$employee_name, $clock_in, $clock_out]);

    // Redirect to index
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee Log</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add Employee Time Log</h1>
    <form method="post">
        <label>Employee Name:</label>
        <input type="text" name="employee_name" required><br>

        <label>Clock In:</label>
        <input type="datetime-local" name="clock_in" required><br>

        <label>Clock Out:</label>
        <input type="datetime-local" name="clock_out"><br>

        <button type="submit">Save Log</button>
    </form>
    <a href="index.php">⬅ Back</a>
</body>
</html>
