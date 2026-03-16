<?php
include 'db.php';

$booking_id = $_POST['booking_id'];
$user_id = $_POST['user_id'];

$stmt = $pdo->prepare("DELETE FROM bookings WHERE id=? AND user_id=?");
if($stmt->execute([$booking_id, $user_id])){
    echo "success";
}else{
    echo "fail";
}
?>