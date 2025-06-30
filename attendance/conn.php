<?php
$host = 'localhost';
$db   = 'multisystem';
$user = 'root';     
$pass = '';         
$charset = 'utf8mb4';

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
die('Could not connext to MySQL: ' .mysqli_connect_error());
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
