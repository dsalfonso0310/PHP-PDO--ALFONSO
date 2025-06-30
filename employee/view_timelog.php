<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM timelogs ORDER BY log_time DESC");
$timelogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">

    <title>View Timelogs</title>
    <style>
        body { font-family: Arial; background: #f8f8f8; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #007BFF; color: white; }
        a.button {
            display: inline-block; padding: 10px 15px; background: #28a745; color: white;
            text-decoration: none; margin-bottom: 15px; border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>Employee Timelog Records</h2>
<a href="add.php" class="button">Add Timelog</a>
<table>
    <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Action</th>
        <th>Log Time</th>
    </tr>
    <?php foreach ($timelogs as $log): ?>
    <tr>
        <td><?= htmlspecialchars($log['id']) ?></td>
        <td><?= htmlspecialchars($log['employee_name']) ?></td>
        <td><?= htmlspecialchars($log['action']) ?></td>
        <td><?= htmlspecialchars($log['log_time']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
