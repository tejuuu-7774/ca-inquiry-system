<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM inquiries WHERE id = ?");
$stmt->execute([$id]);

header("Location: inquiries.php");
exit();
?>