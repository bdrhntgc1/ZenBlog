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
    <title>Yazı Ekle</title>
    <style>
        body { font-family: Arial; background: #f8f8f8; padding: 40px; }
        form { background: #fff; padding: 30px; border-radius: 12px; width: 600px; margin: auto; }
        input[type=text], textarea {
            width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ccc;
        }
        input[type=submit] {
            background: #28a745; color: white; padding: 10px 20px;
            border: none; border-radius: 6px; cursor: pointer;
        }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <form action="post_add_process.php" method="POST">
        <h2>Yeni Yazı Ekle</h2>
        <label>Başlık:</label>
        <input type="text" name="title" required>

        <label>İçerik:</label>
        <textarea name="content" rows="10" required></textarea>

        <input type="submit" value="Yazıyı Kaydet">
    </form>
</body>
</html>
