<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="background-container"</div>
<div class="navbar-container">
    <nav class="navbar">
        <ul>
            <li class="main-box"><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </nav>
</div>
<div class="contact-container">
    <h1>Contact Us</h1>
    <form class="form-box" action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" id="submit">Submit</button>
    </form>
</div>

<script>
    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        alert('Uw bericht is verzonden!');
    });
</script>

</body>
</html>
