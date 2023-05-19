<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection
    require_once 'db_connect.php';

    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the form data
    if (empty($email) || empty($password)) {
        header("Location: index.php?error=empty_fields");
        exit();
    }

    // Prepare and execute the SQL query to retrieve the user's data
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists and the password is correct
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set the user's data in the session
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
            exit();
        }
    }

    // Redirect back to the login page with an error message
    header("Location: index.php?error=invalid_credentials");
    exit();
}
?>
