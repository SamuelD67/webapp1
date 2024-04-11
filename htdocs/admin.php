
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saintiolo</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="menu.php" class="nav-link">menu</a></li>
        <li class="nav-item"><a href="login.php" class="nav-link">login</a></li>
    </ul>
</nav>

<form class="add-box" action="" method="post">
    <label for="gerecht_naam">Naam van het gerecht:</label><br>
    <input type="text" id="gerecht_naam" name="gerecht_naam"><br>
    <label for="gerecht_beschrijving">Beschrijving:</label><br>
    <textarea id="gerecht_beschrijving" name="gerecht_beschrijving"></textarea><br>
    <label for="gerecht_prijs">Prijs:</label><br>
    <input type="text" id="gerecht_prijs" name="gerecht_prijs"><br>
    <input type="submit" value="Gerecht toevoegen">
</form>
<form class="delete-box" action="admin.php" method="post">
    <label for="gerecht_titel">Titel van het gerecht:</label><br>
    <input type="text" id="gerecht_titel" name="gerecht_titel"><br>
    <input type="submit" value="Gerecht verwijderen">
</form>
<form class="update-box" action="admin.php" method="post">
    <label for="gerecht_titel_update">Titel van het gerecht:</label><br>
    <input type="text" id="gerecht_titel_update" name="gerecht_titel_update"><br>
    <label for="gerecht_naam_update">Nieuwe naam van het gerecht:</label><br>
    <input type="text" id="gerecht_naam_update" name="gerecht_naam_update"><br>
    <label for="gerecht_beschrijving_update">Nieuwe beschrijving:</label><br>
    <textarea id="gerecht_beschrijving_update" name="gerecht_beschrijving_update"></textarea><br>
    <label for="gerecht_prijs_update">Nieuwe prijs:</label><br>
    <input type="text" id="gerecht_prijs_update" name="gerecht_prijs_update"><br>
    <input type="submit" value="Gerecht wijzigen">
</form>
</body>
</html>
<?php
$host = '127.0.0.1';
$dbname = 'restaurant';
$username = 'root';
$password = '';

session_start();

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == "Saint.67" && $password == "QWEASD") {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('Location: admin.php');
                exit;
            } else {
                $error = "Incorrect username or password.";
            }
        }
    }

} catch (PDOException $e) {
    echo "Fout bij het verbinden met de database: " . $e->getMessage();
}
?>
