<?php
include "configure.php"; // Assuming this file contains your database connection setup

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $tel = isset($_POST['telephone']) ? $_POST['telephone'] : '';

    // Insert into database
    $insertquery = "INSERT INTO user (Fname, Lname, Tel) VALUES ('$first_name', '$last_name', '$tel')";
    $query = mysqli_query($connection, $insertquery);

    // Check if query executed successfully
    if ($query) {
        echo 'Registered successfully';
    } else {
        echo mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my website</title>
</head>

<body>
    <h1>welcome home</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="Fname">First Name</label>
        <input type="text" id="Fname" name="first_name">
        <br><br>
        <label for="Lname">Last Name</label>
        <input type="text" id="Lname" name="last_name">
        <br><br>
        <label for="Telephone">Telephone:</label>
        <input type="number" id="Telephone" name="telephone">
        <br><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>