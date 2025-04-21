// diet-plan.js
document.getElementById("dietForm").addEventListener("submit", function(event) {
  event.preventDefault();

  // Get form data
  const age = parseInt(document.querySelector('input[name="age"]').value);
  const currentWeight = parseInt(document.querySelector('input[name="current_weight"]').value);
  const height = parseInt(document.querySelector('input[name="height"]').value);
  const sex = document.querySelector('select[name="sex"]').value;
  const goalWeight = parseInt(document.querySelector('input[name="goal_weight"]').value);
  const mealsPerDay = parseInt(document.querySelector('select[name="meals_per_day"]').value);
  const timeline = parseInt(document.querySelector('input[name="timeline"]').value);

  // Calculate BMR (Mifflin-St Jeor Equation)
  let BMR;
  if (sex === "Male") {
    BMR = (10 * currentWeight) + (6.25 * height) - (5 * age) + 5;
  } else {
    BMR = (10 * currentWeight) + (6.25 * height) - (5 * age) - 161;
  }

  // Get Activity Level (for simplicity, we'll assume sedentary)
  let activityFactor = 1.2; // Sedentary
  let TDEE = BMR * activityFactor;

  // Adjust calories based on goal (if goal weight is different from current weight)
  let calorieTarget = TDEE;
  if (goalWeight < currentWeight) {
    calorieTarget = TDEE - 500; // Creating a deficit of 500 calories for weight loss
  } else if (goalWeight > currentWeight) {
    calorieTarget = TDEE + 500; // Creating a surplus of 500 calories for weight gain
  }

  // Divide by meals per day to get per meal target
  const caloriesPerMeal = calorieTarget / mealsPerDay;

  // Display the result
  alert(`
    Diet Plan Generated:
    - Goal Weight: ${goalWeight} kg
    - Daily Calories: ${calorieTarget} kcal
    - Calories per Meal: ${Math.round(caloriesPerMeal)} kcal
    - Timeline: ${timeline} months

    We suggest:
    - Breakfast: ${Math.round(caloriesPerMeal)} kcal
    - Lunch: ${Math.round(caloriesPerMeal)} kcal
    - Dinner: ${Math.round(caloriesPerMeal)} kcal
    - Snacks: ${Math.round(caloriesPerMeal)} kcal (if meals per day >= 4)
    - Additional meals based on your preference.
  `);
});
