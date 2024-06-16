<header>
    <div class="brand">
        <h1>S L M S | <?php echo ucfirst($_SESSION['usertype']); ?> Dashboard</h1>
    </div>

    <nav>
        <ul>
            <li><a href="./librarian_dashboard.php">Home</a></li>
            <li><a href="./manage_books.php">Manage Books</a></li>
            <li><a href="./addBook.php">Add a Book</a></li>
            <li><a href="./view_students.php">View Students</a></li>
            <li><a href="./reports.php" target="_blank">Reports</a></li>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </nav>
</header>