<?php
// Start the PHP session
session_start();
// Controleer of de gebruiker is ingelogd

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Display session messages
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

// Initialize $editMode and $currentDish
$editMode = false;
$currentDish = [];

// Verwerking van het wijzigingsverzoek
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];

    // Ophalen van de gegevens van het gerecht dat bewerkt moet worden
    $sql = "SELECT id, titel, omschrijving, prijs FROM gerechten WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $currentDish = $result->fetch_assoc();
            $editMode = true;
        } else {
            echo "Er is een fout opgetreden: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Er is een fout opgetreden: " . $conn->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $titel = $_POST['titel'];
    $omschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];

    $sql = "INSERT INTO gerechten (titel, omschrijving, prijs) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssd", $titel, $omschrijving, $prijs);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Nieuw gerecht succesvol toegevoegd.";
        } else {
            echo "Er is een fout opgetreden: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Er is een fout opgetreden: " . $conn->error;
    }
}

// Verwerking van het opslaan van wijzigingen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $omschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];

    $sql = "UPDATE gerechten SET titel = ?, omschrijving = ?, prijs = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssdi", $titel, $omschrijving, $prijs, $id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Gerecht succesvol bijgewerkt.";
        } else {
            echo "Er is een fout opgetreden: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Er is een fout opgetreden: " . $conn->error;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Haal gerechten op uit de database om weer te geven
$gerechten = [];
$sql = "SELECT id, titel, omschrijving, prijs FROM gerechten";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $gerechten[] = $row;
    }

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM gerechten WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Gerecht succesvol verwijderd.";
        } else {
            echo "Er is een fout opgetreden: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Er is een fout opgetreden: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<header>
</header>
<section>
    <h3>Voeg een nieuw gerecht toe</h3>
    <form action="admin.php" method="post">
        <input type="text" name="titel" placeholder="Naam van het gerecht" required>
        <input type="text" name="beschrijving" placeholder="Beschrijving" required>
        <input type="number" step="0.01" name="prijs" placeholder="Prijs" required>
        <input type="submit" name="submit" value="Toevoegen">
    </form>
</section>
<section>
    <?php if ($editMode): ?>
        <h3>Wijzig gerecht</h3>
        <form action="admin.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($currentDish['id']); ?>">
            <input type="text" name="titel" placeholder="Naam van het gerecht" value="<?php echo htmlspecialchars($currentDish['titel']); ?>" required>
            <input type="text" name="beschrijving" placeholder="Beschrijving" value="<?php echo htmlspecialchars($currentDish['omschrijving']); ?>" required>
            <input type="number" step="0.50" name="prijs" placeholder="Prijs" value="<?php echo htmlspecialchars($currentDish['prijs']); ?>" required>
            <input type="submit" name="update" value="Opslaan">
        </form>
    <?php endif; ?>
    <h2>Beschikbare Gerechten</h2>
    <?php foreach ($gerechten as $gerecht): ?>
        <form action="admin.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($gerecht['id']); ?>">
            <p><?php echo htmlspecialchars($gerecht['titel']); ?> <br> <?php echo htmlspecialchars($gerecht['omschrijving']); ?><br>
                - €<?php echo htmlspecialchars($gerecht['prijs']); ?></p>
            <input type="submit" name="edit" value="Wijzigen">
            <input type="submit" name="delete" value="Verwijder">
        </form>
    <?php endforeach; ?>
</section>

</body>
</html>
