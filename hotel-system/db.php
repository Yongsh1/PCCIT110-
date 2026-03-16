<?php
$host = "localhost";
$db = "hotel_system";  // ✅ database we just created
$user = "root";          // change if your MySQL username is different
$pass = "";              // change if your MySQL has a password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
?>