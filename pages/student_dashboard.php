<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'student') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include "../includes/student-header.php"; ?>
    <div class="container">
        <?php
        // Check if username session variable is set
        if (isset($_SESSION['username'])) {
            echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
        } else {
            echo "<h1>Welcome to Student Dashboard</h1>";
        }
        ?>
    </div>
</body>

</html>