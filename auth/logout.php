<?php
session_start();
session_destroy();
// Prevent caching of the logout page
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
// Redirect to login page
header("Location: ../auth/login.php");
exit;
