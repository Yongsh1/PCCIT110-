<?php
session_start();
include 'db.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

$stmt = $pdo->prepare("SELECT * FROM bookings WHERE user_id = :user_id ORDER BY id DESC");
$stmt->execute([':user_id' => $user_id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
