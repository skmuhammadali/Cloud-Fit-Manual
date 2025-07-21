# 🥗 FitLife - Personal Diet Plan Generator

A comprehensive web application that generates personalized diet plans based on user's health goals, lifestyle, and dietary preferences.

## ✨ Features

- **Personalized Diet Plans**: Custom nutrition plans based on individual user data
- **Age & Weight Validation**: Ensures diet plans are only available for users aged 20-70 years with weight between 30-100 kg
- **Scientific Calculations**: Uses Mifflin-St Jeor Equation for accurate BMR and TDEE calculations
- **Multiple Dietary Preferences**: Supports vegetarian, non-vegetarian, vegan, keto, and Mediterranean diets
- **Activity Level Consideration**: Adjusts calorie needs based on user's activity level
- **Comprehensive Validation**: Client-side form validation with user-friendly error messages
- **Responsive Design**: Modern, mobile-friendly interface
- **Meal Suggestions**: Provides specific meal recommendations for each diet type
- **Printable Plans**: Users can print their personalized diet plans

## 🎯 Target Audience

This application is designed for:
- Health-conscious individuals aged 20-70 years
- People with weight between 30-100 kg
- Users looking to lose, gain, or maintain weight
- Anyone seeking structured meal planning guidance

## 🚀 Getting Started

### Prerequisites
- Web browser (Chrome, Firefox, Safari, Edge)
- Web server (Apache, Nginx, or local development server)

### Installation

1. **Clone or download the repository**
   ```bash
   git clone <repository-url>
   cd fitlife-diet-planner
   ```

2. **Start a local web server**
   
   Using Python (if installed):
   ```bash
   python -m http.server 8000
   ```
   
   Using Node.js (if installed):
   ```bash
   npx http-server
   ```
   
   Or use any other local web server of your choice.

3. **Access the application**
   - Open your web browser
   - Navigate to `http://localhost:8000` (or your server's URL)
   - Click "Create My Diet Plan" to start

## 📱 Usage

1. **Landing Page**: Visit `index.html` for an overview of the application
2. **Fill the Form**: Complete all required fields in `diet_plan.html`:
   - Full Name
   - Age (20-70 years)
   - Current Weight (30-100 kg)
   - Height (cm)
   - Gender
   - Goal Weight (30-100 kg)
   - Activity Level
   - Meals per Day (3-6)
   - Dietary Preference

3. **Generate Plan**: Click "Generate My Personal Diet Plan"
4. **View Results**: Review your personalized nutrition plan with:
   - Daily calorie target
   - Macronutrient breakdown
   - Meal suggestions
   - Timeline estimation

## 🔧 Technical Details

### Validation Rules
- **Age**: Must be between 20-70 years
- **Weight**: Current and goal weight must be between 30-100 kg
- **All fields**: Required and validated for appropriate data types

### Calculations
- **BMR**: Calculated using Mifflin-St Jeor Equation
- **TDEE**: BMR adjusted for activity level
- **Calorie Target**: 
  - Weight Loss: TDEE - 500 calories
  - Weight Gain: TDEE + 300 calories
  - Maintenance: TDEE
- **Macronutrients**: 50% carbs, 25% protein, 25% fats

### Diet Types Supported
- **Vegetarian**: Plant-based with dairy and eggs
- **Non-Vegetarian**: Includes meat, fish, and poultry
- **Vegan**: Completely plant-based
- **Keto**: Low-carb, high-fat diet
- **Mediterranean**: Traditional Mediterranean diet patterns

## 📁 File Structure

```
fitlife-diet-planner/
├── index.html              # Landing page
├── diet_plan.html          # Main diet plan generator
├── assets/                 # CSS, JS, and image assets
│   └── vendor/
│       └── bootstrap/      # Bootstrap framework
├── README.md              # This file
└── [other legacy files]   # Previous application files
```

## 🎨 Design Features

- **Modern UI**: Clean, professional design with gradient backgrounds
- **Responsive Layout**: Works on desktop, tablet, and mobile devices
- **Interactive Elements**: Hover effects and smooth transitions
- **Error Handling**: Clear, user-friendly error messages
- **Accessibility**: Proper form labels and semantic HTML

## 🔒 Privacy & Disclaimers

- **Data Privacy**: All data processing happens client-side; no personal information is stored or transmitted
- **Medical Disclaimer**: This tool provides general dietary guidance only. Users should consult healthcare professionals before starting any new diet plan
- **Age & Weight Restrictions**: Diet plans are only available for individuals aged 20-70 years with weight between 30-100 kg

## 🤝 Contributing

This is a standalone web application. To contribute:
1. Fork the repository
2. Make your changes
3. Test thoroughly
4. Submit a pull request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🆘 Support

For support or questions:
- Check the form validation messages for input requirements
- Ensure you meet the age (20-70) and weight (30-100 kg) requirements
- Try refreshing the page if you encounter any issues

---

**Made with ❤️ for health-conscious individuals seeking personalized nutrition guidance.**