<?php
include('../includes/config.php');

if ($_SESSION['usertype'] != 'librarian') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $quantity = (int)$_POST['quantity'];

    $query = "INSERT INTO books (title, author, quantity) VALUES ('$title', '$author', $quantity)";
    if (mysqli_query($conn, $query)) {
        echo "Book added successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a book</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="">
            Title: <input type="text" name="title" required><br>
            Author: <input type="text" name="author" required><br>
            Quantity: <input type="number" name="quantity" required><br>
            <input type="submit" value="Add Book">
            <a href="librarian_dashboard.php" class="cancel-btn">Cancel</a>
        </form>
    </div>


    <?php include '../includes/footer.php'; ?>
</body>

</html>