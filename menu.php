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
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "restaurant";

        // Create a new database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, titel, omschrijving, prijs FROM gerechten WHERE titel LIKE '%$searchTerm%'";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($results)) {
                echo "<tr>";
                echo "<td>" . $row['titel'] . "</td>";
                echo "<td>" . $row['omschrijving'] . "</td>";
                echo "<td>" . $row['prijs'] . "</td>";
                echo "<td><button class='add-to-cart-btn' data-item-id='" . $row['id'] . "'>Add to Cart</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No items found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
        </tbody>
    </table>
</main>
</body>
</html>