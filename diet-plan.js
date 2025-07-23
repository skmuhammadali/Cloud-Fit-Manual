// diet-plan.js - Enhanced version for better integration
// This file is now integrated into the main HTML file and this standalone version is kept for backup

// Simple backup functionality
function generateSimpleDietPlan() {
  const form = document.getElementById("dietForm");
  if (!form) return;

  form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Basic form data extraction
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);

    // Simple BMR calculation
    const weight = parseFloat(data.current_weight) || 70;
    const height = parseInt(data.height) || 170;
    const age = parseInt(data.age) || 25;
    const gender = data.gender || 'male';

    let bmr;
    if (gender === 'male') {
      bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
    } else {
      bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
    }

    const activityMultipliers = {
      sedentary: 1.2,
      lightly_active: 1.375,
      moderately_active: 1.55,
      very_active: 1.725,
      extra_active: 1.9
    };

    const activityLevel = data.activity_level || 'moderately_active';
    const dailyCalories = Math.round(bmr * activityMultipliers[activityLevel]);

    // Display basic result
    const output = document.getElementById('dietPlanOutput');
    if (output) {
      output.innerHTML = `
        <h3>Your Basic Diet Plan</h3>
        <div style="background: rgba(26, 77, 58, 0.8); border-radius: 15px; padding: 25px; margin: 20px 0;">
          <h4>Daily Calorie Target: ${dailyCalories} calories</h4>
          <p>Based on your BMR: ${Math.round(bmr)} calories</p>
          <p>Activity Level: ${activityLevel.replace('_', ' ')}</p>
          <p><strong>Note:</strong> This is a basic calculation. Use the main form above for a detailed plan.</p>
        </div>
      `;
      output.style.display = 'block';
    }
  });
}

// Initialize if the main script hasn't loaded
document.addEventListener('DOMContentLoaded', function() {
  // Check if main DietPlanGenerator class exists, if not, use simple version
  setTimeout(() => {
    if (typeof DietPlanGenerator === 'undefined') {
      generateSimpleDietPlan();
    }
  }, 1000);
});
