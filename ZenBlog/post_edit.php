<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Geçersiz istek.";
    exit();
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM posts WHERE id = $id");

if ($result->num_rows == 0) {
    echo "Yazı bulunamadı.";
    exit();
}

$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yazı Düzenle</title>
    <style>
        body { font-family: Arial; background: #f8f8f8; padding: 40px; }
        form { background: #fff; padding: 30px; border-radius: 12px; width: 600px; margin: auto; }
        input[type=text], textarea {
            width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ccc;
        }
        input[type=submit] {
            background: #007bff; color: white; padding: 10px 20px;
            border: none; border-radius: 6px; cursor: pointer;
        }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <form action="post_update.php" method="POST">
        <h2>Yazıyı Düzenle</h2>
        <input type="hidden" name="id" value="<?= $post['id'] ?>">

        <label>Başlık:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>

        <label>İçerik:</label>
        <textarea name="content" rows="10" required><?= htmlspecialchars($post['content']) ?></textarea>

        <input type="submit" value="Güncelle">
    </form>
</body>
</html>
