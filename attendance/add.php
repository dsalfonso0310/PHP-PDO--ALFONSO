<?php require 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add Attendance</h2>
    <form method="post">
        <input type="text" name="student_name" placeholder="Student Name" required>
        <input type="number" name="date" placeholder="Date" required>
        <input type="text" name="status" placeholder="Status" required>
        <button type="submit" name="submit">Add Attendance</button>
        <button type="submit">Submit</button>
        <a href="index.php"><button type="button">Cancel</button></a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("INSERT INTO attendance (student_name, date, status,) VALUES (?, ?, ?)");
        $stmt->execute([
            $_POST['student_name'],
            $_POST['date'],
            $_POST['status'],
        ]);
        echo "<p>Attendance added successfully!</p>";
    }
    ?>
    <p><a href="index.php">← Back to Dashboard</a></p>
</div>
</body>
</html>