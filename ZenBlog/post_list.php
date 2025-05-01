<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yazıları Yönet</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        table { width: 100%; background: #fff; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        a.button {
            padding: 6px 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
        a.button.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<h2>Yazı Yönetimi</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Başlık</th>
        <th>Yazar</th>
        <th>Tarih</th>
        <th>İşlemler</th>
    </tr>

    <?php
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".htmlspecialchars($row['title'])."</td>";
        echo "<td>".$row['author']."</td>";
        echo "<td>".$row['created_at']."</td>";
        echo "<td>
                <a class='button' href='post_edit.php?id=".$row['id']."'>Düzenle</a>
                <a class='button delete' href='post_delete.php?id=".$row['id']."' onclick=\"return confirm('Silmek istediğinize emin misiniz?');\">Sil</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
