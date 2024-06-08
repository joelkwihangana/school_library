<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>School Library Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>School Library Management System</h1>
            <nav>
                <ul>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li><a href="/index.php">Home</a></li>
                        <?php if ($_SESSION['usertype'] == 'librarian') : ?>
                            <li><a href="../pages/manage_books.php">Manage Books</a></li>
                            <li><a href="../pages/view_students.php">View Students</a></li>
                            <li><a href="../pages/reports.php">Reports</a></li>
                        <?php elseif ($_SESSION['usertype'] == 'student') : ?>
                            <li><a href="../pages/borrow_history.php">Borrow History</a></li>
                        <?php endif; ?>
                        <li><a href="../auth/logout.php">Logout</a></li>
                    <?php else : ?>
                        <li><a href="../auth/login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">