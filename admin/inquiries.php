<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
        exit();
    }

    require_once "../config/db.php";

    $search = $_GET['search'] ?? '';
    $status = $_GET['status'] ?? '';

    $sql = "SELECT * FROM inquiries WHERE 1";

    if ($search) {
        $sql .= " AND (full_name LIKE :search OR email LIKE :search OR mobile LIKE :search)";
    }

    if ($status) {
        $sql .= " AND status = :status";
    }

    $sql .= " ORDER BY created_at DESC";

    $stmt = $conn->prepare($sql);

    if ($search) {
        $stmt->bindValue(':search', "%$search%");
    }

    if ($status) {
        $stmt->bindValue(':status', $status);
    }

    $stmt->execute();
    $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Inquiries</title>
</head>
<body>
    <h2>All Inquiries</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="Search by name/email/mobile">

        <select name="status">
            <option value="">All</option>
            <option value="new">New</option>
            <option value="contacted">Contacted</option>
            <option value="closed">Closed</option>
        </select>

        <button type="submit">Filter</button>
    </form>
    <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>City</th>
            <th>Service</th>
            <th>Message</th>
            <th>Status</th>
            <th>Created</th>
        </tr>

        <?php foreach ($inquiries as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['service']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <a href="dashboard.php">Back to Dashboard</a>

</body>
</html>