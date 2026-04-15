<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";

$total = $conn->query("SELECT COUNT(*) FROM inquiries")->fetchColumn();
$new = $conn->query("SELECT COUNT(*) FROM inquiries WHERE status='new'")->fetchColumn();
$contacted = $conn->query("SELECT COUNT(*) FROM inquiries WHERE status='contacted'")->fetchColumn();
$closed = $conn->query("SELECT COUNT(*) FROM inquiries WHERE status='closed'")->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="stats">
        <div>Total: <?php echo $total; ?></div>
        <div>New: <?php echo $new; ?></div>
        <div>Contacted: <?php echo $contacted; ?></div>
        <div>Closed: <?php echo $closed; ?></div>
    </div>

    <br>
    <a href="inquiries.php">View Inquiries</a> |
    <a href="logout.php">Logout</a>
</div>

</body>
</html>