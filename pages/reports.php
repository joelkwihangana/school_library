<?php
include('sessions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <?php
    $query = mysqli_query($conn, "SELECT books.title, users.username, borrowings.borrowDate, borrowings.returnDate, borrowings.quantity FROM borrowings inner join books on borrowings.bookId = books.bookId inner join users on borrowings.studentId = users.userId");
    if (mysqli_num_rows($query) == 0) {
        echo "<h1>No data found</h1>";
    } else {
    ?>

        <table>
            <tr>
                <th>book name</th>
                <th>student name</th>
                <th>borrow date</th>
                <?php
                $query = mysqli_query($conn, "SELECT books.title, users.username, borrowings.borrowDate, borrowings.returnDate, borrowings.quantity FROM borrowings inner join books on borrowings.bookId = books.bookId inner join users on borrowings.studentId = users.userId");
                $fetchData = mysqli_fetch_assoc($query);

                if ($fetchData['returnDate'] != Null) {
                    echo "<th>Return date</th>";
                }
                ?>
                <th>quantity</th>
                <th>action</th>
            </tr>
            <?php
            $select = mysqli_query($conn, "SELECT books.title, users.username, borrowings.borrowDate, borrowings.returnDate, borrowings.quantity FROM borrowings inner join books on borrowings.bookId = books.bookId inner join users on borrowings.studentId = users.userId");
            while ($row = mysqli_fetch_assoc($select)) {
            ?>

                <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['borrowDate'] ?></td>
                    <?php
                    if ($fetchData['returnDate'] != Null) {
                        echo "<td>$row[returnDate]</td>";
                    }  ?>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php if ($row['returnDate'] == null) {
                            echo "<a href='returnbook.php'>returnbook<a/>";
                        } else {
                            echo "<a href='issuebook.php'>issuebook<a/>";
                        } ?></td>
                </tr>

            <?php
            }

            ?>
        </table>
    <?php
    }
    ?>
</body>

</html>