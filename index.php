<!DOCTYPE html>
<html>
<head>
    <title>CA Inquiry Form</title>
</head>
<body>

<h2>Inquiry Form</h2>

<?php
if (isset($_GET['success'])) {
    echo "<p style='color:green;'>Inquiry submitted successfully!</p>";
}
?>

<form method="POST" action="submit.php">

    <label>Full Name:</label><br>
    <input type="text" name="full_name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mobile:</label><br>
    <input type="text" name="mobile"><br><br>

    <label>City:</label><br>
    <input type="text" name="city"><br><br>

    <label>Service:</label><br>
    <input type="text" name="service"><br><br>

    <label>Message:</label><br>
    <textarea name="message"></textarea><br><br>

    <button type="submit">Submit</button>

</form>

</body>
</html>