<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM news WHERE id=$id";
$conn->query($sql);

header("Location: admin_dashboard.php");
?>
