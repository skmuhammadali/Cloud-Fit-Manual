<?php
// Handle form submission and generate diet plan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the user input
  $age = $_POST['age'];
  $currentWeight = $_POST['current_weight'];
  $height = $_POST['height'];
  $sex = $_POST['sex'];
  $goalWeight = $_POST['goal_weight'];
  $mealsPerDay = $_POST['meals_per_day'];
  $timeline = $_POST['timeline'];

  // Sample diet plan logic (modify as needed based on user's details)
  $caloriesPerDay = 1800;  // Example daily calorie target
  $caloriesPerMeal = $caloriesPerDay / $mealsPerDay;

  // Sample meals based on calories
  $mealPlan = [
    'Breakfast' => 'Oatmeal, Eggs, Banana',
    'Lunch' => 'Chicken Breast, Rice, Broccoli',
    'Dinner' => 'Grilled Salmon, Sweet Potato, Spinach',
    'Snacks' => 'Greek Yogurt, Almonds',
  ];

  // Output generated diet plan
  echo "<h4>Your Custom Diet Plan</h4>";
  echo "<table class='table'>
    <tr><th>Meal</th><th>Food</th><th>Calories</th></tr>
    <tr><td>Breakfast</td><td>{$mealPlan['Breakfast']}</td><td>{$caloriesPerMeal} kcal</td></tr>
    <tr><td>Lunch</td><td>{$mealPlan['Lunch']}</td><td>{$caloriesPerMeal} kcal</td></tr>
    <tr><td>Dinner</td><td>{$mealPlan['Dinner']}</td><td>{$caloriesPerMeal} kcal</td></tr>
    <tr><td>Snacks</td><td>{$mealPlan['Snacks']}</td><td>{$caloriesPerMeal} kcal</td></tr>
  </table>";
}
?>
