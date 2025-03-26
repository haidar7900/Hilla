<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = "news_default.jpg"; // يمكنك إضافة رفع الصور لاحقًا

    $sql = "INSERT INTO news (title, content, image) VALUES ('$title', '$content', '$image')";
    $conn->query($sql);
    echo "<script>alert('تمت إضافة الخبر بنجاح!');</script>";
}
?>

<h2>لوحة التحكم</h2>
<form method="POST">
    <label>عنوان الخبر:</label>
    <input type="text" name="title" required>
    <label>محتوى الخبر:</label>
    <textarea name="content" required></textarea>
    <button type="submit">إضافة الخبر</button>
</form>

<h3>الأخبار المضافة</h3>
<ul>
    <?php
    $result = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['title']} - <a href='delete_news.php?id={$row['id']}'>حذف</a></li>";
    }
    ?>
</ul>
