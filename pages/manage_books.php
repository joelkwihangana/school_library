<?php include "sessions.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <?php include "librarian-header.php" ?>

    <div class="container" class="setBlue">
        <table class="setBlue">
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM books";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['bookId'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['author'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo "<a href='edit.php?editId=$row[bookId]'>edit</a>" ?>
                        <?php echo "<a href='delete.php?del Id=$row[bookId]'>delete</a>" ?>
                        <?php echo "<a href='issueBook.php?bid=$row[bookId]'>issue</a>" ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

    </div>

    <div class="chooseTheme">
        <button type="button" onclick="changeColor()">Blue</button>
        <button type="button" onclick="changeColor()" class="setGreen">Green</button>
        <button type="button" onclick="changeColor()" class="setRed">Red</button>
    </div>
</body>

<script>
    function changeColor() {
        var x = document.getElementsByClassName("setBlue");
        var y = document.getElementsByClassName("setGreen");
        var z = document.getElementsByClassName("setRed");
        x.style.backgroundColor = "blue";
        y.style.backgroundColor = "green";
        z.style.backgroundColor = "red";
    }
</script>

</html>