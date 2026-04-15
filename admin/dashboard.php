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
    <p style="color:#666;">Overview of inquiry activity</p>

    <div class="cards">

        <div class="card total">
            <h3>Total</h3>
            <p><?php echo $total; ?></p>
        </div>

        <div class="card new">
            <h3>New</h3>
            <p><?php echo $new; ?></p>
        </div>

        <div class="card contacted">
            <h3>Contacted</h3>
            <p><?php echo $contacted; ?></p>
        </div>

        <div class="card closed">
            <h3>Closed</h3>
            <p><?php echo $closed; ?></p>
        </div>

    </div>

    <br>

    <div class="actions">
        <a href="inquiries.php" class="btn">View Inquiries</a>
        <a href="logout.php" class="btn danger">Logout</a>
    </div>

</div>

</body>
</html>