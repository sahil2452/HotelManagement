<?php

include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO admins (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password); // Bind parameters

    // Execute the query
    if ($stmt->execute()) {
        header("Location: customer_login.php?success=1"); // Redirect on success
        exit();
    } else {
        $error = "Registration failed. Email might already be in use."; // Error message
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Registration</title>
  <link rel="stylesheet" href="style/register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Background video -->
  <video autoplay muted loop class="bg-video">
    <source src="includes/register.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <div class="register-container">
    <h2>Register</h2>
    <form method="POST" action="">
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Register</button>
    </form>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <p>Already have an account? <a href="customer_login.php">Login here</a></p>
  </div>

</body>
</html>
