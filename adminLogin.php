<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Malcolm Lismore Photography</title>
  <link rel="icon" type="image/png" href="logo head.png">
  <link rel="stylesheet" href="stylesAdmin.css">
</head>
<body>
    <div class="header-text">
    <h2>Welcome to Malcolm Lismore Photography Admin Login</h2>
    <p>Please enter your credentials to access the admin dashboard.</p>
    </div>
  <div class="login-container">
    <h1>Admin Login</h1>
    <form action="adminAuthenticate.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <button  type="submit" id = "login">Login</button>
    </form>
  </div>
</body>
</html>