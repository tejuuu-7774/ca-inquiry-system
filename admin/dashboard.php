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
</head>
<body>

<h2>Welcome to Admin Dashboard</h2>

<p>Total Inquiries: <?php echo $total; ?></p>
<p>New: <?php echo $new; ?></p>
<p>Contacted: <?php echo $contacted; ?></p>
<p>Closed: <?php echo $closed; ?></p>

<a href="logout.php">Logout</a>

</body>
</html>