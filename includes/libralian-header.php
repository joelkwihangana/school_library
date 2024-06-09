<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>School Library Management System</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>

<body>
    <header>
        <div class="container">
            <h1>School Library Management System</h1>
            <nav>
                <ul>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/pages/manage_books.php">Manage Books</a></li>
                    <li><a href="/pages/view_students.php">View Students</a></li>
                    <li><a href="/pages/reports.php">Reports</a></li>
                    <li><a href="/auth/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">