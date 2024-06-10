<?php
include('../includes/config.php');

if ($_SESSION['usertype'] != 'librarian') {
    header("Location: login.php");
    exit();
}

$bookId = (int)$_GET['bookId'];

$deleteQuery = "DELETE FROM books WHERE bookId=$bookId";
if (mysqli_query($conn, $deleteQuery)) {
    header("Location: librarian_dashboard.php");
} else {
    echo "Error: " . $deleteQuery . "<br>" . mysqli_error($conn);
}
