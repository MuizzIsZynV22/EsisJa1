<?php
// logout.php

// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page after logout
header("Location: ./mainpage.php"); // Replace "login.php" with your desired redirect page
exit();
?>