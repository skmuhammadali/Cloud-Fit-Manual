<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // If the user is not logged in, redirect them to the login page
  header("Location: login.html");
  exit();
}

// User is logged in, display the content
echo "<h1>Welcome, " . $_SESSION['user_name'] . "!</h1>";
echo "<p>You are logged in. This is the homepage.</p>";
echo "<a href='logout.php'>Logout</a>";
?>

