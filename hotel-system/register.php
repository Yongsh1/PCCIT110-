<?php
include 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if(strlen($username) < 3 || strlen($password) < 8){
    echo "invalid";
    exit;
}

// check if username exists
$stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
$stmt->execute([$username]);
if($stmt->rowCount() > 0){
    echo "exists";
    exit;
}

// hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users(username, password) VALUES(?,?)");
if($stmt->execute([$username, $hash])){
    echo "success";
}else{
    echo "fail";
}
?>