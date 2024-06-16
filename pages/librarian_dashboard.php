<?php
include('../includes/config.php');
if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'librarian') {
    header("Location: ../auth/login.php");
    exit;
}

// Query to get statistics
$booksQuery = "SELECT COUNT(*) AS totalBooks FROM books";
$borrowedQuery = "SELECT COUNT(*) AS totalBorrowed FROM borrowings WHERE returnDate IS NULL";
$returnedQuery = "SELECT COUNT(*) AS totalReturned FROM borrowings WHERE returnDate IS NOT NULL";

$booksResult = mysqli_query($conn, $booksQuery);
$borrowedResult = mysqli_query($conn, $borrowedQuery);
$returnedResult = mysqli_query($conn, $returnedQuery);

$totalBooks = mysqli_fetch_assoc($booksResult)['totalBooks'];
$totalBorrowed = mysqli_fetch_assoc($borrowedResult)['totalBorrowed'];
$totalReturned = mysqli_fetch_assoc($returnedResult)['totalReturned'];

// Query to get all books
$allBooksQuery = "SELECT * FROM books";
$allBooksResult = mysqli_query($conn, $allBooksQuery);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Library Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>

<body>
    <?php include "librarian-header.php" ?>

    <div class="container">
        <?php
        // Check if username session variable is set
        if (isset($_SESSION['username'])) {
            echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
        } else {
            echo "<h1>Welcome to the Librarian Dashboard</h1>";
        }
        ?>

        <div class="dashboard">
            <div class="card">
                <h1><?php echo $totalBooks; ?></h1>
                <p>Total Books</p>
            </div>
            <div class="card">
                <h1><?php echo $totalBorrowed; ?></h1>
                <p>Total Borrowed</p>
            </div>
            <div class="card">
                <h1><?php echo $totalReturned; ?></h1>
                <p>Total Returned</p>
            </div>
        </div>
        <?php if ($totalBooks > 0) : ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($allBooksResult)) { ?>
                            <tr>
                                <td><?php echo $row['bookId']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td class="action-buttons">
                                    <a href="edit_book.php?bookId=<?php echo $row['bookId']; ?>">Edit</a>
                                    <a href="delete_book.php?bookId=<?php echo $row['bookId']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <?php include("../includes/footer.php"); ?>
</body>

</html>