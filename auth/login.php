<?php
include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['userId'] = $row['userId'];
            header("Location: /index.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
?>

<?php include '../includes/header.php'; ?>
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Login">
</form>
<?php include '../includes/footer.php'; ?>