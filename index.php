<?php
global $servername, $dbname, $username, $password, $sql;
include_once ("db_connect.php");
/**
 * @var mysqli $conn
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saintiolo</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="navbar-container">
    <nav class="navbar">
        <ul>
            <li class="main-box"><a href="index.php">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <form action="index.php" method="post">
            Search: <input type="text" name="search"><br>

        </form>
    </nav>
</div>
<div class="order-info">
    <h1>Welkom bij Saintiolo</h1>
</div>
<?php
// Check if the current page is not the home page
if ($_SERVER['PHP_SELF'] != '/index.php') {
    // Do not display the <h1> tag
} else {

}
?>
<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the search form has been submitted
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT id, titel, omschrijving, prijs FROM user WHERE titel LIKE :search OR omschrijving LIKE :search");
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();
    } else {
        // Default query if no search term is provided
        $stmt = $conn->prepare("SELECT id, titel, omschrijving, prijs FROM user");
        $stmt->execute();
    }

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

    if (empty($results)) {
        echo "<div class='result-box'><p>No results found.</div></p>";
    } else {
        foreach ($results as $row) {
            echo "<div class='title-box'>Titel: " . $row['titel'] . "</div>";
            echo "<div class='omschrijving-box'>Omschrijving: " . $row['omschrijving'] . "</div>";
            echo "<div class='prijs-box'>Prijs: " . $row['prijs'] . "</div><br><br>";
        }
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
</body>
</html>
