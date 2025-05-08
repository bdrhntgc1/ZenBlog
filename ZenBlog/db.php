<?php
$host = 'localhost';
$db   = 'zenblog';
$user = 'root';
$pass = ''; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
?>
