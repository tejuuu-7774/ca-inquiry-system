<?php
$success = isset($_GET['success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CA Inquiry</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">

    <h2>CA Consultation Inquiry</h2>
    <p style="color:#666;">Submit your details and our team will get back to you.</p>

    <?php if ($success): ?>
        <p style="color:green;">Inquiry submitted successfully!</p>
    <?php endif; ?>

    <form method="POST" action="submit.php">

        <label>Full Name</label>
        <input type="text" name="full_name" placeholder="Enter your name" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Mobile</label>
        <input type="text" name="mobile" placeholder="Enter your number">

        <label>City</label>
        <input type="text" name="city" placeholder="Enter your city">

        <label>Service</label>
        <input type="text" name="service" placeholder="e.g. Tax Filing">

        <label>Message</label>
        <textarea name="message" placeholder="Write your query..."></textarea>

        <button type="submit">Submit Inquiry</button>

    </form>

</div>

</body>
</html>