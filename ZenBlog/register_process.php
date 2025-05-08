<?php
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$created_at = date('Y-m-d H:i:s');

// Kullanıcı adı zaten var mı kontrolü (opsiyonel)
$result = $conn->query("SELECT * FROM users WHERE username = '$username'");
if ($result->num_rows > 0) {
    header("Location: register.php?error=1");
    exit();
}

// Kullanıcıyı ekle
$sql = "INSERT INTO users (username, password, email, created_at) 
        VALUES ('$username', '$password', '$email', '$created_at')";

if ($conn->query($sql) === TRUE) {
    header("Location: register.php?success=1");
} else {
    echo "Hata: " . $conn->error;
}
?>
