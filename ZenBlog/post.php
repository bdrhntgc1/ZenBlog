<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
    echo "Yazı ID'si yok.";
    exit();
}

$post_id = intval($_GET['id']);

// Yazıyı çek
$post_result = $conn->query("SELECT * FROM posts WHERE id = $post_id");
if ($post_result->num_rows === 0) {
    echo "Yazı bulunamadı.";
    exit();
}
$post = $post_result->fetch_assoc();

// Yorum gönderildiyse işle
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $author = $_SESSION['username'];
    $content = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO comments (post_id, author, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $post_id, $author, $content);
    $stmt->execute();
}

// Yorumları çek
$comments = $conn->query("SELECT * FROM comments WHERE post_id = $post_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($post['title']) ?></title>
    <style>
        body { font-family: Arial; padding: 40px; background: #f9f9f9; }
        .post, .comment, form { max-width: 800px; margin: auto; background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
        textarea { width: 100%; padding: 10px; }
        input[type=submit] { padding: 10px 20px; background: #007bff; color: #fff; border: none; border-radius: 6px; cursor: pointer; }
        .comment { border-left: 4px solid #007bff; }
        .comment-author { font-weight: bold; }
        .comment-date { color: #888; font-size: 12px; }
    </style>
</head>
<body>

<div class="post">
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <p><i><?= $post['author'] ?> - <?= $post['created_at'] ?></i></p>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<?php if (isset($_SESSION['username'])): ?>
<form method="POST">
    <h3>Yorum Ekle</h3>
    <textarea name="comment" rows="4" required></textarea><br>
    <input type="submit" value="Gönder">
</form>
<?php else: ?>
    <p style="text-align:center;">Yorum yapmak için <a href="login.php">giriş yapın</a>.</p>
<?php endif; ?>

<?php while ($comment = $comments->fetch_assoc()): ?>
<div class="comment">
    <p class="comment-author"><?= htmlspecialchars($comment['author']) ?></p>
    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
    <p class="comment-date"><?= $comment['created_at'] ?></p>
</div>
<?php endwhile; ?>

</body>
</html>
