<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/index.css">.

</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="menu.php" class="nav-link">menu</a></li>
        <li class="nav-item"><a href="login.php" class="nav-link">login</a></li>
    </ul>
</nav>
<div class="login-container">
    <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if(isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>

<?php
// Verbindingsinformatie
$host = '127.0.0.1';
$dbname = 'restaurant';
$dbUsername = 'root';
$dbPassword = '';

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        if ($username == "Saint.67" && $password == "QWEASD") {
            // Set session variables and redirect to admin.php if the credentials are correct
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: admin.php');
            exit;
        } else {
            $error = "Incorrect username or password.";
        }
    }
}
?>