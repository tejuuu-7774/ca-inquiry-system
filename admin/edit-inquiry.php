<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";

$id = $_GET['id'];

// fetches inquiry
$stmt = $conn->prepare("SELECT * FROM inquiries WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// updates the logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];

    $update = $conn->prepare("UPDATE inquiries SET status = ? WHERE id = ?");
    $update->execute([$status, $id]);

    header("Location: inquiries.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Inquiry</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">

    <h2>Edit Inquiry</h2>

    <p><strong><?php echo $data['full_name']; ?></strong></p>

    <form method="POST">
        <select name="status">
            <option value="new" <?php if($data['status']=='new') echo 'selected'; ?>>New</option>
            <option value="contacted" <?php if($data['status']=='contacted') echo 'selected'; ?>>Contacted</option>
            <option value="closed" <?php if($data['status']=='closed') echo 'selected'; ?>>Closed</option>
        </select>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="inquiries.php">← Back</a>

    </div>
</body>
</html>