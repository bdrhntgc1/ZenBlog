<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Paneli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 40px;
        }
        .panel {
            max-width: 600px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        a {
            display: block;
            margin: 10px 0;
            text-align: center;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="panel">
        <h2>Admin Paneli</h2>
        <p>Hoş geldin, <?php echo $_SESSION['username']; ?> 👋</p>
        <a href="post_add.php">➕ Yeni Yazı Ekle</a>
        <a href="post_list.php">📋 Yazıları Yönet</a>
        <a href="logout.php">🚪 Çıkış Yap</a>
    </div>
</body>
</html>
