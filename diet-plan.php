// diet-plan.php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $age = $_POST['age'];
    $currentWeight = $_POST['current_weight'];
    $height = $_POST['height'];
    $sex = $_POST['sex'];
    $goalWeight = $_POST['goal_weight'];
    $mealsPerDay = $_POST['meals_per_day'];
    $timeline = $_POST['timeline'];

    // Calculate BMR (Mifflin-St Jeor Equation)
    if ($sex == "Male") {
        $BMR = (10 * $currentWeight) + (6.25 * $height) - (5 * $age) + 5;
    } else {
        $BMR = (10 * $currentWeight) + (6.25 * $height) - (5 * $age) - 161;
    }

    // Activity level (assuming sedentary)
    $activityFactor = 1.2;
    $TDEE = $BMR * $activityFactor;

    // Adjust calorie target based on goal
    if ($goalWeight < $currentWeight) {
        $calorieTarget = $TDEE - 500;
    } else if ($goalWeight > $currentWeight) {
        $calorieTarget = $TDEE + 500;
    } else {
        $calorieTarget = $TDEE;
    }

    // Calories per meal
    $caloriesPerMeal = $calorieTarget / $mealsPerDay;

    // Output the diet plan
    echo "Diet Plan Generated:<br>";
    echo "Goal Weight: " . $goalWeight . " kg<br>";
    echo "Daily Calories: " . $calorieTarget . " kcal<br>";
    echo "Calories per Meal: " . round($caloriesPerMeal) . " kcal<br>";
    echo "Timeline: " . $timeline . " months<br>";
    echo "<br>We suggest:<br>";
    echo "Breakfast: " . round($caloriesPerMeal) . " kcal<br>";
    echo "Lunch: " . round($caloriesPerMeal) . " kcal<br>";
    echo "Dinner: " . round($caloriesPerMeal) . " kcal<br>";
    echo "Snacks: " . round($caloriesPerMeal) . " kcal<br>";
}
?>
