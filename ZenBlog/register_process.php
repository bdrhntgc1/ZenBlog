<?php
require 'db.php';

$username = $_POST['username'];
$password = md5($_POST['password']);


$sql_check = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    header("Location: register.php?error=1");
} else {
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: register.php?success=1");
    } else {
        echo "Hata: " . $conn->error;
    }
}
?>
