<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

echo "<h2>الرسائل الواردة</h2>";
$result = $conn->query("SELECT * FROM messages ORDER BY sent_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<div class='message'>";
    echo "<p><strong>من:</strong> {$row['name']} - {$row['email']}</p>";
    echo "<p>{$row['message']}</p>";
    echo "</div>";
}
?>
