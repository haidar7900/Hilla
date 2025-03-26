<?php
$host = "localhost";
$user = "root";  // اسم المستخدم لقاعدة البيانات
$pass = "";  // كلمة المرور (اتركها فارغة إذا كنت تعمل على Localhost)
$dbname = "babel_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
