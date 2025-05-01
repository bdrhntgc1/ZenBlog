<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Hoş geldin, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Çıkış Yap</a>
</body>
</html>
