<!DOCTYPE html>
<html>

<head>
  <title>Registration Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form-group .error {
      color: red;
      font-size: 14px;
    }

    .form-group .success {
      color: green;
      font-size: 14px;
    }

    .form-group .checkbox {
      margin-top: 10px;
    }

    .form-group .submit-btn {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .form-group .submit-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Registration Form</h2>
    <form method="POST" action="register.php">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <div class="form-group">
        <input type="submit" class="submit-btn" value="Register">
      </div>
    </form>
  </div>
</body>

</html>
