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
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        
    <h2>All Inquiries</h2>

    <form method="GET" class="form-inline">
        <input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>">

        <select name="status">
            <option value="">All</option>
            <option value="new" <?php if($status=='new') echo 'selected'; ?>>New</option>
            <option value="contacted" <?php if($status=='contacted') echo 'selected'; ?>>Contacted</option>
            <option value="closed" <?php if($status=='closed') echo 'selected'; ?>>Closed</option>
        </select>

        <button type="submit">Filter</button>
    </form>

    <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php foreach ($inquiries as $row): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="edit-inquiry.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete-inquiry.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

    </table>

    <br>
    <a href="dashboard.php">← Back</a>
    </div>
</body>
</html>