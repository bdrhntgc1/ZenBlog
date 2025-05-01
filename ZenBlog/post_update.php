<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = intval($_POST['id']);
$title = $_POST['title'];
$content = $_POST['content'];

$stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $content, $id);

if ($stmt->execute()) {
    header("Location: post_list.php?updated=1");
} else {
    echo "Güncelleme hatası: " . $conn->error;
}
?>
