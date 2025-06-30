<?php
session_start();
require 'conn.php';
if (!isset($_SESSION['user'])) header("Location: author.php");

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
$stmt->execute([$id]);

header("Location: books.php");
exit;
