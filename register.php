<?php
// Database connection settings
$host = "localhost";
$user = "root"; // Your phpMyAdmin username
$password = ""; // Your DB password (if any)
$dbname = "cloudfit"; // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get user input from the form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password before saving it
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Prepare SQL query to insert user into database
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

  if ($conn->query($sql) === TRUE) {
    // Redirect to login page after successful registration
    header("Location: login.html");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
}
?>
