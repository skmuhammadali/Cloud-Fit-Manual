<?php
session_start();

// Check if the user is already logged in, if so, redirect to diet plan page
if (isset($_SESSION['user_id'])) {
    header("Location: diet_plan.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Database connection
  $conn = new mysqli("localhost", "root", "", "cloudfit");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query to check if the user exists
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Check password
    if (password_verify($password, $user['password'])) {
      // Successful login
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      $_SESSION['user_email'] = $user['email'];

      // Redirect to the diet plan page (diet_plan.html)
      header("Location: diet_plan.html");
      exit();
    } else {
      echo "Invalid credentials!";
    }
  } else {
    echo "User does not exist!";
  }

  $conn->close();
}
?>
