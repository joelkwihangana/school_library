<header>

    <div class="brand">
        <h1>SLMS <?php if (isset($_SESSION['usertype'])) {
                        echo "| $_SESSION[usertype] Dashboard";
                    } else {
                        echo "";
                    } ?></h1>
    </div>
    <nav>
        <ul>
            <li><a href="./student_dashboard.php">Home</a></li>
            <li><a href="bollowHistory.php">Borrow History</a></li>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </nav>

</header>