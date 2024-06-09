<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'librarian') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>School Library Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>

<body>
    <header>
        <div class="brand">
            <h1>S L M S | <?php echo "$_SESSION[usertype] Dashboard" ?></h1>
        </div>

        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/pages/manage_books.php">Manage Books</a></li>
                <li><a href="/pages/view_students.php">View Students</a></li>
                <li><a href="/pages/reports.php">Reports</a></li>
                <li><a href="../auth/logout.php">Logout</a></li>
            </ul>
        </nav>

    </header>
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

    <?php include("../includes/footer.php"); ?>