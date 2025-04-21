<?php
include 'db.php';
include 'diet_logic.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $age = $_POST['age'];
  $current_weight = $_POST['current_weight'];
  $height = $_POST['height'];
  $diet_type = $_POST['diet_type'];
  $sex = $_POST['sex'];
  $goal_weight = $_POST['goal_weight'];
  $meals_per_day = $_POST['meals_per_day'];
  $timeline = $_POST['timeline'];

  $bmr = calculateBMR($sex, $current_weight, $height, $age);
  $tdee = calculateTDEE($bmr);
  $calories = round(getCalories($current_weight, $goal_weight, $tdee));

  // Save to DB
  $stmt = $conn->prepare("INSERT INTO submissions (age, current_weight, height, diet_type, sex, goal_weight, meals_per_day, timeline, calories) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("iddsssiii", $age, $current_weight, $height, $diet_type, $sex, $goal_weight, $meals_per_day, $timeline, $calories);
  $stmt->execute();

  // Redirect user based on calculated calories
  if ($calories <= 1200) {
    header("Location: Meals1000cal.html");
  } elseif ($calories <= 2200) {
    header("Location: Meals2000cal.html");
  } elseif ($calories <= 3200) {
    header("Location: Meals3000cal.html");
  } elseif ($calories <= 4200) {
    header("Location: Meals4000cal.html");
  } else {
    header("Location: Meals5000cal.html");
  }
  exit();
}
?>
