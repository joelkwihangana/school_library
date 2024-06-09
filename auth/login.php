<?php
include '../includes/config.php';

$error = '';

function displayError($error)
{
    echo "<h2> $error</h2>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['userId'] = $row['userId'];
            if ($row['usertype'] == 'librarian') {
                header("Location: ../pages/librarian_dashboard.php");
            } elseif ($row['usertype'] == 'student') {
                header("Location:../pages/student_dashboard.php");
            } else {
                $error = "No user found";
            }
            exit;
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "No user found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="form-container ">
        <div class="login-form ">
            <h2 class="form title">Login</h2>
            <form method="post" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login" class="btn">
                <a href="../index.php" class="cancel-btn">Cancel</a>
            </form>
            <div class="display-error">
                <?php displayError($error); ?>
            </div>
        </div>
    </div>




</body>

</html>