<?php
session_start();
require '../db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_SESSION['username'];

$stmt = $conn->prepare("INSERT INTO posts (title, content, author) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $content, $author);

if ($stmt->execute()) {
    header("Location: post_list.php?success=1");
} else {
    echo "Yazı eklenirken hata oluştu: " . $conn->error;
}
?>
