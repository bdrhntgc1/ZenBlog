<?php
require 'db.php';

$username = $_POST['username'];
$password = md5($_POST['password']); // Parolan md5 hashlenmişse

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
   


    if ($user['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: index.php");
    }
    echo "Kullanıcı: $username <br>";
echo "Şifre: $password <br>";
echo "Rol: " . $user['role'] . "<br>";

    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
?>
