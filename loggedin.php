<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect them to the login page
    header("Location: index.php");
    exit();
}

// User is logged in, display the logged-in content
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the Logged-In Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is the logged-in page. You have successfully logged in.</p>
    <!-- Add your logged-in content and functionality here -->
    <a href="logout.php">Logout</a> <!-- Provide a logout link -->
</body>
</html>
