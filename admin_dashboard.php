<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

// إضافة خبر جديد
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO news (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        $message = "تم إضافة الخبر بنجاح!";
    } else {
        $message = "خطأ في الإضافة: " . $conn->error;
    }
}

// جلب الأخبار
$sql = "SELECT * FROM news ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>لوحة التحكم</h2>
    <a href="logout.php">تسجيل الخروج</a>

    <form method="POST">
        <h3>إضافة خبر جديد</h3>
        <?php if(isset($message)) echo "<p>$message</p>"; ?>
        <label>عنوان الخبر:</label>
        <input type="text" name="title" required>
        <label>محتوى الخبر:</label>
        <textarea name="content" required></textarea>
        <button type="submit">إضافة</button>
    </form>

    <h3>جميع الأخبار</h3>
    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="news-item">
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo $row['content']; ?></p>
            <a href="delete_news.php?id=<?php echo $row['id']; ?>">حذف</a>
        </div>
    <?php } ?>
</body>
</html>
