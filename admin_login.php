<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('اسم المستخدم أو كلمة المرور غير صحيحة');</script>";
    }
}
?>

<form method="POST">
    <label>اسم المستخدم:</label>
    <input type="text" name="username" required>
    <label>كلمة المرور:</label>
    <input type="password" name="password" required>
    <button type="submit">تسجيل الدخول</button>
</form>
