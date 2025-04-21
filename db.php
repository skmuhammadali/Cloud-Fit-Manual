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

// Get form data
$age = $_POST['age'];
$currentWeight = $_POST['current_weight'];
$height = $_POST['height']; // Height in feet (user input)
$sex = $_POST['sex'];
$goalWeight = $_POST['goal_weight'];
$mealsPerDay = $_POST['meals_per_day'];
$timeline = $_POST['timeline'];

// Convert height from feet to inches
$heightInches = $height * 12;

// Insert user data into the database
$sql = "INSERT INTO usersinput (age, current_weight, height_in_inches, sex, goal_weight, meals_per_day, timeline) 
        VALUES ('$age', '$currentWeight', '$heightInches', '$sex', '$goalWeight', '$mealsPerDay', '$timeline')";

// Execute query and check for errors
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
