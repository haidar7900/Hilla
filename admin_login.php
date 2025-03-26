<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "12345") {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST">
        <h2>تسجيل الدخول</h2>
        <?php if(isset($error)) echo "<p>$error</p>"; ?>
        <label>اسم المستخدم:</label>
        <input type="text" name="username" required>
        <label>كلمة المرور:</label>
        <input type="password" name="password" required>
        <button type="submit">دخول</button>
    </form>
</body>
</html>
