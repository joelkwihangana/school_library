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
    <div class="dashboard">
        <div class="card">
            <div class="card-content">
                <h1 class="card-number">10</h1>
                <h2 class="card-title">Borrowed Books</h2>
                <a href="#" class="card-btn">View More</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h1 class="card-number">5</h1>
                <h2 class="card-title">Submitted Books</h2>
                <a href="#" class="card-btn">View More</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h1 class="card-number">2</h1>
                <h2 class="card-title">Total Books</h2>
                <a href="#" class="card-btn">View More</a>
            </div>
        </div>
    </div>
</body>

</html>