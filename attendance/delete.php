<?php
require 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete book by ID
    $stmt = $pdo->prepare("DELETE FROM attendance WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
} else {
    echo "No ID provided.";
}
?>
   <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'conn.php';
// ...
