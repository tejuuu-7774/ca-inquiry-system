<?php
require_once "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // basic validation for the input fields
    if (!$name || !$email) {
        die("Name and Email are required");
    }

    // insert query used for data
    $sql = "INSERT INTO inquiries 
    (full_name, email, mobile, city, service, message) 
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $mobile, $city, $service, $message]);

    header("Location: index.php?success=1");
    exit();
}
?>