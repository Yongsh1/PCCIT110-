<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['guest_name']; 
    $room = $_POST['room'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $total = $_POST['total'];
    $payment = $_POST['payment'];

    // Use logged-in user_id if available, fallback to 1
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

    try {
        $stmt = $pdo->prepare("INSERT INTO bookings 
            (name, room, checkin, checkout, total, payment, user_id) 
            VALUES (:name, :room, :checkin, :checkout, :total, :payment, :user_id)");

        $stmt->execute([
            ':name' => $name,
            ':room' => $room,
            ':checkin' => $checkin,
            ':checkout' => $checkout,
            ':total' => $total,
            ':payment' => $payment,
            ':user_id' => $user_id
        ]);

        echo "success";
    } catch (PDOException $e) {
        echo "error:" . $e->getMessage();
    }
}
?>
