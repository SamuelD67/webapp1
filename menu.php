<?php
global $servername;
include_once("db_connect.php");

// Include database connection file
$host = '127.0.0.1';
$dbname = 'restaurant';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Controleer of het zoekformulier is ingediend
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT id, titel, omschrijving, prijs FROM gerechten WHERE titel LIKE :search OR omschrijving LIKE :search");
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Standaardquery als er geen zoekterm is ingevoerd
        $stmt = $conn->prepare("SELECT id, titel, omschrijving, prijs FROM gerechten");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="navbar-container">
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </nav>

</div>
<header>
    <h1>Menu</h1>
    <button id="checkout-btn">Check out</button>
    <div id="cart-info">
        <span id="cart-count">0</span>
    </div>
</header>
<main>
    <section id="products">
        <?php foreach ($results as $gerecht): ?>
            <div class="product">
                <h2><?php echo htmlspecialchars($gerecht['titel']); ?></h2>
                <p><?php echo htmlspecialchars($gerecht['omschrijving']); ?></p>
                <p>Prijs: <?php echo htmlspecialchars($gerecht['prijs']); ?></p>
                <button class="add-to-cart" data-id="<?php echo $gerecht['id']; ?>">Add</button>
            </div>
        <?php endforeach; ?>
    </section>
</main>
<footer class="line-1"></footer>
<footer class="copy-right">
    <h4>Copyright © 2024 | Saintiolo. All rights reserved.</h4>
</footer>
<script src="saint.js"></script>
<form action="menu.php" method="post" onsubmit="event.preventDefault(); searchMenu();">
</form>
</body>
</html>

