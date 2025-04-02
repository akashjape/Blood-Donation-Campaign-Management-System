<!DOCTYPE html>
<html>
<head>
  <title>Blood Donation Form</title>
</head>
<body>
  <h1>Blood Donation Form</h1>
  <form>
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required>

    <p id="age-validation-message" style="color: red; display: none;">You are not eligible for blood donation as you must be at least 18 years old.</p>

    <button type="submit" onclick="validateAge(event)">Submit</button>
  </form>

  <script>
    function validateAge(event) {
      event.preventDefault(); // prevent the form from submitting

      // Get the user's date of birth from the form
      const dob = new Date(document.getElementById('dob').value);

      // Calculate the user's age in years
      const ageInYears = Math.floor((Date.now() - dob) / (365.25 * 24 * 60 * 60 * 1000));

      // Check if the user is at least 18 years old
      if (ageInYears < 18) {
        // Display the validation message
        document.getElementById('age-validation-message').style.display = 'block';
      } else {
        // Submit the form
        event.target.form.submit();
      }
    }
  </script>
</body>
</html>