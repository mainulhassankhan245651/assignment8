<!DOCTYPE html>
<html>
<head>
	<title>Registration and Login Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="firstname">First name:</label>
		<input type="text" id="firstname" name="firstname" required><br>

		<label for="lastname">Last name:</label>
		<input type="text" id="lastname" name="lastname" required><br>

		<label for="email">Email address:</label>
		<input type="email" id="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>

		<label for="confirmpassword">Confirm password:</label>
		<input type="password" id="confirmpassword" name="confirmpassword" required><br>

		<input type="submit" value="Register">
	</form>

	<?php
	// Check if the registration form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get the form data
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];

		// Validate the form data
		if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmpassword)) {
			echo "<p>All fields are required and must not be empty.</p>";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<p>The email address must be in a valid format.</p>";
		} elseif ($password != $confirmpassword) {
			echo "<p>The password and confirm password fields must match.</p>";
		} else {
			// Registration successful, display confirmation message
			echo "<p>Registration successful. Welcome, $firstname!</p>";
		}
	}
	?>

<h1>Login Form</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="email">Email address:</label>
		<input type="email" id="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>

		<input type="submit" value="Login">
	</form>

	<?php
	// Check if the login form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get the form data
		$email = $_POST["email"];
		$password = $_POST["password"];

		// Validate the form data
		if (empty($email) || empty($password)) {
			echo "<p>Both email and password fields are required and must not be empty.</p>";
		} else {
			// Authenticate the user
			// You would need to replace this code with your own authentication logic
			if ($email == "example@example.com" && $password == "password123") {
				// Redirect to welcome page with first name
				$firstname = "John"; // You would need to replace this with the actual first name of the user
				header("Location: welcome.php?firstname=$firstname");
				exit;
			} else {
				// Authentication failed, display error message
				echo "<p>Invalid email or password.</p>";
			}
		}
	}
	?>
</body>
</html>
