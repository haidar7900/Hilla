
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    $conn->query($sql);
    echo "<script>alert('تم إرسال رسالتك بنجاح!');</script>";
}
?>

<form method="POST">
    <label>الاسم:</label>
    <input type="text" name="name" required>
    <label>البريد الإلكتروني:</label>
    <input type="email" name="email" required>
    <label>الرسالة:</label>
    <textarea name="message" required></textarea>
    <button type="submit">إرسال</button>
</form>
