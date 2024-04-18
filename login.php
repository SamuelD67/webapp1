<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/index.css">.
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ab8888;
            margin: 0;
            padding: 0;
        }

        /* Stijl voor de navigatiebalk */
        nav {
            overflow: hidden;
            background-color: #333; /* Voeg een achtergrondkleur toe */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #111;
            border-radius: 19px;
        }

        /* Lettertype en Grootte */
        nav ul li a {
            font-family: Arial, sans-serif;
            font-size: 17px;
        }

        /* Stijl voor de inlogcontainer */
        .login-container {
            width: 300px;
            background-color: grey;
            margin: 100px auto;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Gebruik flexbox voor een betere layout */
            flex-direction: column; /* Stel de richting in op kolom */
            align-items: center; /* Centraal de items horizontaal */
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%; /* Zorg ervoor dat de groep een volledige breedte heeft */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%; /* Maak de input velden responsief */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%; /* Maak de knoppen responsief */
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #444;
        }

        /* Foutmelding */
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media screen and (max-width: 600px) {
            .login-container {
                width: 90%;
                margin: 50px auto;
            }
        }
    </style>
</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="login.php">login</a>
        <a href="contact.php">contact</a>
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