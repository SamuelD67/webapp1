<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Saintiolo Pizza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #d35400;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: #e65c00;
        }

        .contact-info, .contact-form {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
        }

        .contact-info h2, .contact-form h2 {
            margin-bottom: 20px;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
        }

        .contact-form label {
            margin-bottom: 5px;
        }

        .contact-form input, .contact-form textarea {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .contact-form button {
            padding: 10px;
            background-color: #d35400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #e65c00;
        }

        footer {
            background-color: #d35400;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Saintiolo Pizza</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="contact-info">
        <h2>Contacteer ons</h2>
        <p>Voor vragen, bestellingen of feedback, neem contact met ons op via het onderstaande formulier of bel ons op 123-456-7890.</p>
        <address>
            <p>Saintiolo Pizza</p>
            <p>Straatnaam 123</p>
            <p>Stad, Postcode</p>
            <p>Email: info@saintiolopizza.com</p>
        </address>
    </section>

    <section class="contact-form">
        <h2>Neem contact op</h2>
        <form action="contact.php" method="post">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Bericht:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Verstuur</button>
        </form>
    </section>
</main>

<footer>
    <p>&copy; 2024 Saintiolo Pizza. Alle rechten voorbehouden.</p>
</footer>
</body>
</html>
