<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Include the database connection
  require_once 'db_connect.php';

  // Get the form data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate the form data
  if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    header("Location: registration.php?error=empty_fields");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: registration.php?error=invalid_email");
    exit();
  } elseif ($password !== $confirm_password) {
    header("Location: registration.php?error=password_mismatch");
    exit();
  }

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the user into the database
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $hashed_password);
  $stmt->execute();

  // Check if the user is successfully registered
  if ($stmt->affected_rows > 0) {
    // Set session variable to indicate successful registration
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
  } else {
    header("Location: registration.php?error=registration_failed");
    exit();
  }
}
?>
