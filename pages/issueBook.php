<?php
include('sessions.php');
if (isset($_GET['bid'])) {
    $id = $_GET['bid'];
    $select = mysqli_query($conn, "SELECT * FROM books WHERE bookId = $id ");
    $row = mysqli_fetch_assoc($select);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>issue book</title>
</head>

<body>
    <div class="container">
        <h1>issue book</h1>
        <form action="" method="post">
            <input type="text" value="<?php echo $row['title'] ?>" name="bookname" readonly>
            <select name="sname">
                <option value="" hidden>student name</option>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM users where usertype = 'student' ");
                while ($row = mysqli_fetch_assoc($select)) {
                ?>
                    <option value="<?php echo $row['userId'] ?>"><?php echo $row['username'] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="number" placeholder="quantity " min="1" name="quantiy">
            <input type="submit" name="enter" value="submit">
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['enter'])) {
    $bookname = $_GET['bid'];
    $sname = $_POST['sname'];
    $quantiy = $_POST['quantiy'];
    $select = mysqli_query($conn, "SELECT * FROM books");
    $row1 = mysqli_fetch_assoc($select);
    if ($row1['quantity'] > $quantiy) {
        $update = mysqli_query($conn, "UPDATE books SET quantity = quantity - '$quantiy' WHERE bookId = '$bookname'");
        if ($update) {
            echo "<script> alert('book issued'); window.location.href='manage_books.php' </script>";
        }
        $insert = mysqli_query($conn, "INSERT INTO borrowings (bookId, studentId, quantity) VALUES ('$bookname', '$sname', '$quantiy')");
        if ($insert) {
            echo "<script> alert('book issued'); window.location.href='manage_books.php' </script>";

            // echo "book issued ";
        } else {
            echo "<script> alert('book not issued'); window.location.href='manage_books.php' </script>";
            // echo "book not issued " . mysqli_error($conn);
        }
    } else {
        echo 'NO ENOUGH BOOKS';
    }
}
?>