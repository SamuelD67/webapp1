<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Menu</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<header>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="login.php">login</a>
        <a href="contact.php">contact</a>
    </div>
    <form action="menu.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search for a dish...">
        <button type="submit">Search</button>
    </form>
    <nav>
        <div class="logo">
            <h1>Pizza Menu</h1>
        </div>
        <div class="cart-info">
            <span id="cart-count">0</span>
        </div>

    </nav>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th>Pizza</th>
            <th>Omschrijving</th>
            <th>prijs</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.add-to-cart-btn').click(function() {
                    // Verhoog de waarde van het cart-count element met 1
                    var currentCount = parseInt($('#cart-count').text());
                    $('#cart-count').text(currentCount + 1);
                });
            });
        </script>
        <?php
        session_start(); //  sessie om sessiegegevens te onderhouden

        // PDO-verbinding
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "restaurant";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        // Valideren van de GET-parameter
        $searchTerm = isset($_GET['search']) ? filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) : '';

        // PDO-statement voorbereiden
        $stmt = $conn->prepare("SELECT id, titel, omschrijving, prijs FROM gerechten WHERE titel LIKE :searchTerm");
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();

        // Resultaten ophalen
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Controleren of er resultaten zijn
        if (count($results) > 0) {
            foreach($results as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['titel']) . "</td>";
                echo "<td>" . htmlspecialchars($row['omschrijving']) . "</td>";
                echo "<td>" . htmlspecialchars($row['prijs']) . "</td>";
                echo "<td><button class='add-to-cart-btn' data-item-id='" . htmlspecialchars($row['id']) . "'>Add to Cart</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No items found.</td></tr>";
        }
        ?>

        </tbody>
    </table>
</main>
</body>
</html>