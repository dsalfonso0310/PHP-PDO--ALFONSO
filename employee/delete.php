<?php
require 'conn.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM timelogs WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>
