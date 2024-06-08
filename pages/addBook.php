<?php
include '../includes/config.php';
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books (title, author, quantity) VALUES ('$title', '$author', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        echo "New book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<h2>Add New Book</h2>
<form method="post" action="">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>
    <input type="submit" value="Add Book">
</form>

<?php include '../includes/footer.php'; ?>